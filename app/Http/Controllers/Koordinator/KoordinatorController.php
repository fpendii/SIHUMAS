<?php

namespace App\Http\Controllers\Koordinator;

use App\Charts\PermohonanBulananChart;
use App\Charts\GrafikPermohonanBulanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoordinatorController extends Controller
{
    public function index(GrafikPermohonanBulanan $chart){

       
        $PermohonanPeliputan = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','peliputan')->get()->toArray();
        $PermohonanEditingVideo = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','editing video')->get()->toArray();
        
        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'chart' => $chart->build(),
            'level' => 'Koordinator',
            'totalpeliputan' => count($PermohonanPeliputan),
            'totaleditingvideo' => count($PermohonanEditingVideo),

        ];
        
        return view('pages.koordinator.beranda',$data);
    }
    public function laporan_peliputan(GrafikPermohonanBulanan $chart){

       
        $PermohonanPeliputan = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','peliputan')->get()->toArray();
        //$PermohonanEditingVideo = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','editing video')->get()->toArray();
        
        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'chart' => $chart->build(),
            'level' => 'Koordinator',
            'totalpeliputan' => count($PermohonanPeliputan),
            //'totaleditingvideo' => count($PermohonanEditingVideo),

        ];

        return view('pages.koordinator.kelola_laporan.laporan',$data);
    }


}
