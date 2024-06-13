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

        $PermohonanDesain = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','desain')->get()->toArray();
        $PermohonanPublikasi = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','publikasi')->get()->toArray();

        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'chart' => $chart->build(),
            'level' => 'Admin',
            'totalDesain' => count($PermohonanDesain),
            'totalPublikasi' => count($PermohonanPublikasi)
        ];

        return view('pages.admin.beranda',$data);
    }
}
