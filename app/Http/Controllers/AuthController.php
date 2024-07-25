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
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

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

    // Menangani permintaan lupa password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:akun,email',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.exists' => 'Email tidak ditemukan dalam sistem kami.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Tautan reset password sudah dikirim ke email Anda.'])
            : back()->withErrors(['email' => 'Gagal mengirimkan tautan reset password.']);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('pages/auth/reset-password')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:akun,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
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
