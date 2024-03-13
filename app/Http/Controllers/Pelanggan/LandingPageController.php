<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $data = [
            'title' => 'SIHUMAS',
            'page' => 'Landing Page',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.landing_page',$data);
    }
}
