<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermohonanController extends Controller
{
    public function index(){
        if (!Session::has('id_akun')) {
            return redirect()->route('login')->with('error', 'Anda belum login');
        }
        $data = [
            'title' => 'Jasa | Humas',
            'page' => 'Pilih Jasa',
            'hak_akses' => 'Pelanggan'
        ];

        return view('pages.pelanggan.pilih_jasa',$data);
    }
}
