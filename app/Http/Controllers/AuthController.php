<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    // Proses Authentifikasi
    public function store(Request $request)
    {


        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = Auth::user()->role;
            $username = Auth::user()->username;
            $id_akun = Auth::user()->id_akun;

            $request->session()->put('role',$role);
            $request->session()->put('username',$username);
            $request->session()->put('id_akun',$id_akun);

            if ($user->role == 'admin') {
                return redirect()->intended('admin')->with('success', 'Login berhasil!');
            } elseif ($user->role == 'petugas') {
                return redirect()->intended('petugas')->with('success', 'Login berhasil!');
            } else {
                // Default redirection for other roles
                return redirect()->intended('jasa')->with('success', 'Login berhasil!');
            }

            return redirect()->intended('admin')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->with('loginError', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Mematikan sesi
        $request->session()->regenerateToken(); // Membuat token sesi yang baru
        return redirect('/login')->with('success', 'Logout berhasil!');
    }

    public function lupaPassword()
    {
        return view('pages.auth.lupa_password');
    }

    public function registrasi()
    {
        return view('pages.auth.registrasi');
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'email' => ['required', 'email:dns', 'unique:akun'],
            'username' => ['required', 'unique:akun'],
            'password' => ['required', 'min:5', 'max:255'],
            'no_hp' => ['required', 'min:12', 'numeric'],
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

        return redirect()->to('login')->with('success', 'Anda berhasil registrasi!! Silahkan lakukan login');
    }
}
