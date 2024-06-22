<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\akun;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;


class PasFotoController extends Controller
{
    public function index()
    {
        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('status', '=', 'pending')->where('jenis_jasa', '=', 'pas_foto')->orderBy('created_at', 'desc')->get();

        foreach ($dataPermohonan as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }

        $data = [
            'title' => 'Pas Foto | SIHUMAS',
            'page' => 'pas-foto',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_pasFoto.pasFoto',$data,compact('dataPermohonan','data'));
    }

    public function detail($id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->select('pesanan.*', 'akun.*', 'jasa.*')->first();

        $dataPetugas = akun::where('role','=','petugas')->get();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Detail Permohonan Pas Foto | SIHUMAS',
            'page' => 'pas-foto',
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_pasFoto.detail', $data, compact('dataPermohonan', 'dataPetugas', 'data'));
    }


    public function arsip()
    {
        $data = [
            'title' => 'Arsip Pas Foto | SIHUMAS',
            'page' => 'pas-foto',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.status', '!=', 'pending')->where('pesanan.status', '!=', 'proses')->where('jasa.jenis_jasa', '=', 'pas_foto')->get();


        return view('pages.admin.kelola_pasfoto.arsip_pasFoto', $data, compact('dataPermohonan', 'data'));
    }

    public function proses()
    {
        $data = [
            'title' => 'pas foto | SIHUMAS',
            'page' => 'pas-foto',
            'sidebar' => 'proses',
            'level' => 'Admin',
            'dataPermohonan' => DB::table('pesanan')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->where('pesanan.status', '=', 'proses')
                ->where('jasa.jenis_jasa', '=', 'pas_foto') // menambahkan prefix 'jasa.' untuk kolom 'jenis_jasa'
                ->orderByDesc('pesanan.created_at') // menambahkan prefix 'pesanan.' untuk kolom 'created_at'
                ->get()
                ->toArray(),

        ];

        foreach ($data['dataPermohonan'] as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }

        return view('pages.admin.kelola_pasFoto.proses_pasFoto', $data);
    }

    public function detailProses($id){

        $dataPermohonan = DB::table('pesanan')->join('akun','pesanan.id_akun','=','akun.id_akun')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun','petugas_pesanan.id_akun','=','akun.id_akun')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Detail Proses Permohonan Pas Foto | SIHUMAS',
            'page' => 'pas-foto' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_pasFoto.detail_proses_pasFoto',$data,compact('dataPermohonan','dataPetugas','dataPetugasPesanan'));
    }


    public function detailArsip($id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->select('pesanan.*', 'akun.*', 'jasa.*')->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun','petugas_pesanan.id_akun','=','akun.id_akun')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Pas Foto | SIHUMAS',
            'page' => 'pas-foto',
            'level' => 'Admin',
        ];

        return view('pages.admin.kelola_pasFoto.detail_arsip_pasFoto', $data, compact('dataPermohonan', 'dataPetugas', 'dataPetugasPesanan'));
    }

    public function pilihPetugas(Request $request, $id)
    {
        $petugas = $request->petugas;
        $jumlahPetugas = count($petugas);

        for ($i = 0; $i < $jumlahPetugas; $i++) {
            $petugas_pesanan = PetugasPesananModel::create([
                'id_akun' => $request->petugas[$i],
                'id_pesanan' => $id
            ]);
        };

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan', $id)->update(['status' => 'proses']);

        return redirect()->to('admin/pas-foto')->with('success', 'Data dikirim ke petugas');
    }

    public function TolakPermohonan($id)
    {
        DB::table('pesanan')->where('id_pesanan', $id)->update(['status' => 'ditolak']);

        return redirect()->route('kembali')->with('success', 'Pesanan ditolak');
    }
}
