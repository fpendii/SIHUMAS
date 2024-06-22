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
        $PermohonanPeliputan = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','peliputan')->get()->toArray();
        $PermohonanEditingVideo = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','editing video')->get()->toArray();
        $PermohonanEditFoto = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','edit foto')->get()->toArray();
        $PermohonanPasFoto = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','pas foto')->get()->toArray();


        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'level' => 'Petugas',
            'totalpeliputan' => count($PermohonanPeliputan),
            'totaleditingvideo' => count($PermohonanEditingVideo),
            'totaleditfoto' => count($PermohonanEditFoto),
            'totalpasfoto' => count($PermohonanPasFoto),

        ];
        return view('pages.petugas.beranda',$data);

 }
}