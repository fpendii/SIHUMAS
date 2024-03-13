<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArsipTugasController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Arsip Tugas | SIHUMAS',
            'page' => 'Arsip Tugas',
            'level' => 'Petugas'
        ];
        return view('pages.petugas.kelola_arsip_tugas.arsip_tugas',$data);
    }
}
