<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Jasa | Humas',
            'page' => 'Pilih Jasa',
            'hak_akses' => 'Pelanggan'
        ];

        return view('pages.pelanggan.pilih_jasa',$data);
    }
}
