<?php

namespace App\Http\Controllers\Pegawai;

use App\Charts\PermohonanBulananChart;
use App\Charts\GrafikPermohonanBulanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoorController extends Controller
{
    public function index(){
        $PermohonanPeliputan = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','peliputan')->get()->toArray();
        $PermohonanEditingVideo = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','editing video')->get()->toArray();


        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'level' => 'Petugas',
            'totalpeliputan' => count($PermohonanPeliputan),
            'totaleditingvideo' => count($PermohonanEditingVideo),
        ];
        return view('pages.koor.beranda',$data);

 }
}