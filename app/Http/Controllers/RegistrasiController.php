<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akun;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    public function index(){
        return view('pages.auth.registrasi');
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'email' => ['required','email:dns','unique:akun'],
            'username' => ['required','unique:akun'],
            'password' => ['required','min:5','max:255'],
            'no_hp' => ['required','min:12','numeric'],
            'nama' => ['required']
        ]);

        $password = bcrypt($request->password);

        $id_akun = DB::table('akun')->insertGetId([
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => 'pelanggan',
            'password' => $password,
            'is_active' => true,
        ]);

        DB::table('pelanggan')->insert([
            'id_akun' => $id_akun,
            'nama_pelanggan' => $request->nama
        ]);

        return redirect()->to('login')->with('success','Anda berhasil registrasi!! Silahkan lakukan login');

    }

}
