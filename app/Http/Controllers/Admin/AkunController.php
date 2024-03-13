<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasModel;
use App\Models\akun;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Kelola Akun | SIHUMAS',
            'page' => 'Kelola Akun',
            'level' => 'Admin',
        ];

        $data_pegawai = DB::table('petugas')
                            ->join('akun', 'petugas.id_akun','=','akun.id_akun')
                            ->select('petugas.*','akun.*')
                            ->get();

        // dd(compact('data_pegawai'));
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

        DB::transaction(function () use ($request){
            // Sisipkan data ke tabel kedua
            $id_akun = DB::table('akun')->insertGetId([
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'role' => $request->level,
                'password' => $request->password,
                'is_active' => true,

            ]);

            DB::table('petugas')->insert([
                'id_akun' => $id_akun,
                'nama_petugas' => $request->nama_petugas,
                'foto' => 'default.png'
            ]);
        });

        // PetugasModel::create([
        //     'nama' => $request->nama,
        //     'nomer_hp' => $request->nomer_hp
        // ]);

        return redirect()->to('admin/kelola-akun')->with('success','Data '.$request->nama.' Berhasil Ditambah');
    }
}
