<?php

namespace App\Http\Controllers\Redaktur;

use App\Charts\PermohonanBulananChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedakturController extends Controller
{
    public function index(){
        $PermohonanPublikasi = DB::table('pesanan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('jenis_jasa','=','publikasi')->get()->toArray();

        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'level' => 'Redaktur',
            'totalPublikasi' => count($PermohonanPublikasi),
        ];

        return view('pages.redaktur.beranda',$data);
    }
}
