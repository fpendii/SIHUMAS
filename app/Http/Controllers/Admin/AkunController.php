<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PegawaiModel;

class AkunController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Kelola Akun | SIHUMAS',
            'page' => 'Kelola Akun',
            'level' => 'Admin',
            'data_pegawai' => PegawaiModel::all()
        ];

        $data_pegawai = PegawaiModel::all();



        return view('pages.admin.kelola_akun.akun',compact('data_pegawai'),$data);
    }

    public function tambah(){
        $data = [
            'title' => 'Tambah Akun | SIHUMAS',
            'page' => 'Tambah Akun',
            'level' => 'Admin'
        ];

        return view('pages.admin.kelola_akun.form_tambah',$data);
    }
}
