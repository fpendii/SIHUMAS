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

    public function simpan(Request $request){


        PegawaiModel::create([
            'nama' => $request->nama,
            'nomer_hp' => $request->nomer_hp
        ]);

        return redirect()->to('admin/kelola-akun')->with('success','Data '.$request->nama.' Berhasil Ditambah');
    }
}
