<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PeliputanModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // 
use App\Models\PetugasModel;
use App\Models\akun;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;



class PeliputanController extends Controller
{
    public function index(){
        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('status', '=', 'pending')->where('jenis_jasa', '=', 'peliputan')->orderBy('created_at', 'desc')->get();

        foreach ($dataPermohonan as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'Peliputan',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_liputan.liputan',$data, compact('dataPermohonan', 'data'));
        
    }
    public function arsip(){
     $data =  [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'peliputan',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];
        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.status', '!=', 'pending')->where('pesanan.status', '!=', 'proses')->get();

        return view('pages.admin.kelola_liputan.arsip_liputan',$data,compact('dataPermohonan','data'));
    }

    public function proses()
    {
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'peliputan',
            'sidebar' => 'proses',
            'level' => 'Admin',
            'dataPermohonan' => DB::table('pesanan')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->where('pesanan.status', '=', 'proses')
                ->where('jasa.jenis_jasa', '=', 'peliputan') // menambahkan prefix 'jasa.' untuk kolom 'jenis_jasa'
                ->orderByDesc('pesanan.created_at') // menambahkan prefix 'pesanan.' untuk kolom 'created_at'
                ->get()
                ->toArray(),

        ];

        foreach ($data['dataPermohonan'] as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }

        return view('pages.admin.kelola_liputan.proses_liputan', $data);
    }

    public function detailProses($id){

        $dataPermohonan = DB::table('pesanan')->join('akun','pesanan.id_akun','=','akun.id_akun')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun','petugas_pesanan.id_akun','=','akun.id_akun')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Peliputan | SIHUMAS',
            'page' => 'Permohonan Peliputan' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_liputan.detail_proses_liputan',$data,compact('dataPermohonan','dataPetugas','dataPetugasPesanan'));
    }


    public function detail(Request $request, $id)
    {
      
        $dataPermohonan = DB::table('pesanan')
            ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.id_pesanan', $id) // Menambahkan kondisi nilai 'proses' untuk kolom 'status'
            ->select('pesanan.*', 'akun.*', 'jasa.*') // Opsional: menambahkan select untuk memilih kolom yang diinginkan
            ->first();
    
        // Mengambil semua petugas
        $dataPetugas = akun::where('role','=','petugas')->get();
    
        $data = [
            'title' => 'Permohonan Desain | SIHUMAS',
            'page' => 'Permohonan Desain',
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_liputan.detail', $data, compact('dataPermohonan', 'dataPetugas', 'data'));
    
    }
    

    public function detailArsip(Request $request, $id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->get()->first();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Peliputan| SIHUMAS',
            'page' => 'Permohonan Peliputan',
            'level' => 'Admin',
        ];

        return view('pages.admin.kelola_liputan.detail-arsip', $data, compact('dataPermohonan', 'dataPetugas', 'data'));
    }


    public function pilihPetugas(Request $request, $id)
    {
        $petugas = $request->petugas;
        $jumlahPetugas = count($petugas);

        for ($i = 0; $i < $jumlahPetugas; $i++) {
            PetugasPesananModel::create([
                'id_akun' => $request->petugas[$i],
                'id_pesanan' => $id
            ]);
        };

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan', $id)->update(['status' => 'proses']);

        return redirect()->to('admin/peliputan')->with('success', 'Data dikirim ke petugas');
    }

    public function tolakPermohonan($id)
    {
        DB::table('pesanan')->where('id_pesanan', $id)->update(['status' => 'ditolak']);
    
        return redirect()->route('kembali')->with('success', 'Pesanan ditolak');
    }
    
}