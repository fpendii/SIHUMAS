<?php

namespace App\Http\Controllers\Admin;

use App\Charts\PermohonanBulananChart;
use App\Charts\GrafikPermohonanBulanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(GrafikPermohonanBulanan $chart){

        $PermohonanDesain = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','desain')->where('pesanan.status','=','pending')->get()->toArray();
        $PermohonanPublikasi = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','publikasi')->where('pesanan.status','=','pending')->get()->toArray();
        $PermohonanPasFoto = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','pas_foto')->where('pesanan.status','=','pending')->get()->toArray();
        $PermohonanEditFoto = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','edit_foto')->where('pesanan.status','=','pending')->get()->toArray();
        $PermohonanPeliputan = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','peliputan')->where('pesanan.status','=','pending')->get()->toArray();
        $PermohonanEditingVideo = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','editing video')->where('pesanan.status','=','pending')->get()->toArray();

        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'chart' => $chart->build(),
            'level' => 'Admin',
            'totalDesain' => count($PermohonanDesain),
            'totalPublikasi' => count($PermohonanPublikasi),
            'totalpasFoto' => count($PermohonanPasFoto),
            'totaleditFoto' => count($PermohonanEditFoto),
            'totalpeliputan' => count($PermohonanPeliputan),
            'totaleditingvideo' => count($PermohonanEditingVideo),

        ];

        return view('pages.admin.beranda',$data);
    }
}
