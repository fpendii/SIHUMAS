<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Tugas | SIHUMAS',
            'page' => 'Tugas',
            'level' => 'Petugas'
        ];
        return view('pages.petugas.kelola_tugas.tugas',$data);
    }
}
