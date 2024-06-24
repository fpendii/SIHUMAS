<?php

namespace App\Http\Controllers\Pegawai;

use App\Charts\PermohonanBulananChart;
use App\Charts\GrafikPermohonanBulanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index(){

        $PermohonanDesain = DB::table('pesanan')->join('akun','pesanan.id_akun','=','akun.id_akun')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','desain')->where('akun.id_akun',session('id_akun'))->select('id_pesanan')->get()->toArray();
        $PermohonanPublikasi = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','publikasi')->select('id_pesanan')->get()->toArray();
        $PermohonanPeliputan = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','peliputan')->select('id_pesanan')->get()->toArray();
        $PermohonanPasFoto = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','pas_foto')->select('id_pesanan')->get()->toArray();
        $PermohonanEditFoto = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','edit_foto')->select('id_pesanan')->get()->toArray();
        $PermohonanEditingVideo = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','editing_video')->select('id_pesanan')->get()->toArray();

        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'level' => 'Petugas',
            'totalpeliputan' => count($PermohonanPeliputan),
            'totalpasfoto' => count($PermohonanPasFoto),
            'totaleditfoto' => count($PermohonanEditFoto),
            'totaleditingvideo' => count($PermohonanEditingVideo),
            'totaldesain' => count($PermohonanDesain),
            'totalpublikasi' => count($PermohonanPublikasi),
        ];
        return view('pages.petugas.beranda',$data);

 }
}
