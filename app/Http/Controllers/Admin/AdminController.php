<?php

namespace App\Http\Controllers\Admin;

use App\Charts\PermohonanBulananChart;
use App\Charts\GrafikPermohonanBulanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(GrafikPermohonanBulanan $chart){
        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'chart' => $chart->build(),
            'level' => 'Admin'
        ];
        return view('pages.admin.beranda',$data);
    }
}
