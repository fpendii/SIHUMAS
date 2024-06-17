<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function home(){
        $data = [
            'title' => 'SILAMAS',
            'page' => 'home'
        ];
        return view('pages.landing_page.home',$data);
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
