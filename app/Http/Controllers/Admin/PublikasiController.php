<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Publikasi | SIHUMAS',
            'page' => 'Publikasi',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_publikasi.publikasi',$data);
    }
}
