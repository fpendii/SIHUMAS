<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function home()
    {
        // Ambil data nomor hp admin
        $noHpAdmin = DB::table('akun')->where('role', 'admin')->select('no_hp')->first();

        // Pastikan bahwa $noHpAdmin->no_hp ada dan merupakan string
        $no_hp = isset($noHpAdmin->no_hp) ? (string) $noHpAdmin->no_hp : '';

        $data = [
            'title' => 'SILAMAS',
            'page' => 'home',
            'no_hp' => $no_hp,
        ];

        return view('pages.landing_page.home', $data);
    }


    public function tentangKami(){
        $data = [
            'title' => 'Tentang Kami | SILAMAS',
            'page' => 'tentang_kami'
        ];
        return view('pages.landing_page.tentang_kami',$data);
    }

    public function layanan(){

        $data = [
            'title' => 'Layanan | SILAMAS',
            'page' => 'layanan'
        ];
        return view('pages.landing_page.layanan',$data);
    }
}
