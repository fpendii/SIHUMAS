<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use App\Models\PetugasModel;
use App\Models\akun;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;



class EditingVideoController extends Controller
{
    public function index(){
        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('status', '=', 'pending')->where('jenis_jasa', '=', 'editing video')->orderBy('created_at', 'desc')->get();

        foreach ($dataPermohonan as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }
        $data = [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'editing-video',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_editing_video.editing_video',$data,compact('dataPermohonan'));

    }
    public function arsip(){
     $data =  [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'editing-video',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
        ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
        ->where('pesanan.status', '!=', 'pending')
        ->where('jasa.jenis_jasa', '=', 'editing video') 
        ->where('pesanan.status', '!=', 'proses')->get();
        
        foreach ($dataPermohonan as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }
        return view('pages.admin.kelola_editing_video.arsip_editing_video',$data,compact('dataPermohonan'));

    }

    public function proses()
    {
        $data = [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'editing-video',
            'sidebar' => 'proses',
            'level' => 'Admin',
            'dataPermohonan' => DB::table('pesanan')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->where('pesanan.status', '=', 'proses')
                ->where('jasa.jenis_jasa', '=', 'editing video') // menambahkan prefix 'jasa.' untuk kolom 'jenis_jasa'
                ->orderByDesc('pesanan.created_at') // menambahkan prefix 'pesanan.' untuk kolom 'created_at'
                ->get()
                ->toArray(),
        ];

        foreach ($data['dataPermohonan'] as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }

        return view('pages.admin.kelola_editing_video.proses_editing_video', $data);
    }


    public function detailProses($id){

        $dataPermohonan = DB::table('pesanan')->join('akun','pesanan.id_akun','=','akun.id_akun')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun','petugas_pesanan.id_akun','=','akun.id_akun')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Editing Video | SIHUMAS',
            'page' => 'editing-video',
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_editing_video.detail_proses_editing_video',$data,compact('dataPermohonan','dataPetugas','dataPetugasPesanan'));
    }

    public function detail(Request $request, $id)
    {
        $dataPermohonan = DB::table('pesanan')
        ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
        ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
        ->where('pesanan.id_pesanan', $id) // Menambahkan kondisi nilai 'proses' untuk kolom 'status'
        ->select('pesanan.*', 'akun.*', 'jasa.*') // Opsional: menambahkan select untuk memilih kolom yang diinginkan
        ->first();

       $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Editing Video| SIHUMAS',
            'page' => 'editing-video',
            'level' => 'Admin',
        ];

        return view('pages.admin.kelola_editing_video.detail_editing_video', $data, compact('dataPermohonan', 'dataPetugas', 'data'));

    }


    public function detailArsip($id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->get()->first();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan  Editing Video| SIHUMAS',
            'page' => 'editing-video',
            'level' => 'Admin',
        ];

        return view('pages.admin.kelola_editing_video.detail_arsip_editing_video', $data, compact('dataPermohonan', 'dataPetugas', 'data'));
    }



    public function pilihPetugas(Request $request, $id)
    {

        $request->validate([
            'tenggat_pengerjaan' => 'required|date',
            'petugas' => 'required|array'
        ]);

        $pesanan = PesananModel::findOrFail($id);
        $pesanan->tenggat_pengerjaan = Carbon::parse($request->tenggat_pengerjaan);
        $pesanan->status = 'proses';  
        $pesanan->save();
    
  
        foreach ($request->petugas as $petugasId) {
            PetugasPesananModel::create([
                'id_pesanan' => $id,
                'id_akun' => $petugasId,
            ]);
        }
    
        return redirect()->to('admin/editing-video')->with('success', 'Petugas berhasil dipilih dan tenggat pengerjaan telah diatur.');
    }
    

public function tolakPermohonan($id)
{
    DB::table('pesanan')->where('id_pesanan', $id)->update(['status' => 'ditolak']);

    // return redirect()->route('kembali')->with('success', 'Pesanan ditolak');
    return redirect()->to('admin/editing-video')->with('success', 'Pesanan ditolak');
}
}
