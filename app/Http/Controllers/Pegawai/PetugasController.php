<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'Beranda',
            'level' => 'Petugas'
        ];
        return view('pages.petugas.beranda',$data);
    }
}
