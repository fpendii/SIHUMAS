<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublikasiController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Publikasi | SIHUMAS',
            'page' => 'publikasi',
            'level' => 'Admin',
            'sidebar' => 'inbox',
            'dataPermohonan' => DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('status','=','pending')->where('jenis_jasa','=','publikasi')->get()->toArray()
        ];
        return view('pages.admin.kelola_publikasi.publikasi',$data);
    }

    public function arsip(){
        $data = [
            'title' => 'Publikasi | SIHUMAS',
            'page' => 'publikasi',
            'sidebar' => 'arsip',
            'level' => 'Admin',
            'dataPermohonan' => DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.status','!=','pending')->where('jenis_jasa','=','publikasi')->get()->toArray()
        ];

        return view('pages.admin.kelola_desain.arsip_desain',$data);

    }
}
