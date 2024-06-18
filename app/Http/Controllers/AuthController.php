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
            $role = Auth::user()->role;
            $username = Auth::user()->username;
            $id_akun = Auth::user()->id_akun;

            $request->session()->put('role', $role);
            $request->session()->put('username', $username);
            $request->session()->put('id_akun', $id_akun);

            event(new Registered($user));

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

    public function registerProses(Request $request)
    {
        $akun = akun::create([
            'username' => $request->username,
            'email' => $request->email,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
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
