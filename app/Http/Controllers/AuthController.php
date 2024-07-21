<?php

namespace App\Http\Controllers;

use App\Models\akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

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
            $role = $user->role;
            $username = $user->username;
            $id_akun = $user->id_akun;
            $nama = $user->nama;

            $request->session()->put('role', $role);
            $request->session()->put('username', $username);
            $request->session()->put('id_akun', $id_akun);
            $request->session()->put('nama', $nama);


            event(new Registered($user));

            if ($role == 'admin') {
                return redirect()->intended('admin')->with('success', 'Login berhasil!');
            } elseif ($role == 'petugas') {
                return redirect()->intended('petugas')->with('success', 'Login berhasil!');
            } elseif ($role == 'redaktur') {
                return redirect()->intended('redaktur')->with('success', 'Login berhasil!');
            } elseif ($role == 'koordinator') {
                return redirect()->intended('koordinator')->with('success', 'Login berhasil!');
            } else {
                return redirect()->intended('jasa')->with('success', 'Login berhasil!');
            }
        }

        return redirect()->back()->with('loginError', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Mematikan sesi
        $request->session()->regenerateToken(); // Membuat token sesi yang baru
        return redirect('/')->with('success', 'Logout berhasil!');
    }

    public function lupaPassword()
    {
        return view('pages.auth.lupa_password');
    }

    public function registrasi()
    {
        return view('pages.auth.registrasi');
    }

    public function registerProses(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'username' => 'required|string|max:255|unique:akun',
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:akun',
            'regex:/@(mhs\.politala\.ac\.id|politala\.ac\.id)$/'
        ],
        'nama' => 'required|string|max:255',
        'no_hp' => 'required|string|max:15',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'email.regex' => 'Email harus menggunakan domain @mhs.politala.ac.id atau @politala.ac.id',
    ]);

    // Buat akun jika validasi sukses
    $akun = akun::create([
        'username' => $validatedData['username'],
        'email' => $validatedData['email'],
        'nama' => $validatedData['nama'],
        'no_hp' => $validatedData['no_hp'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'pelanggan',
        'is_active' => 1
    ]);

    event(new Registered($akun));

    Auth::login($akun);

    return redirect('email/verify');
}



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:akun', 'regex:/(.*)@mhs\.polital\.ac\.id$/i'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
