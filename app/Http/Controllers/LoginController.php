<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use app\helpers\CustomHelper;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }

    // Proses Authentifikasi
    public function store(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        // $crentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);


        if(Auth::attempt(['email' => $email ,'password'=> $password] )){
            $level = Auth::Akun()->role;
            dd($level);
            $request->session()->regenerate();

            return redirect('admin')->with('success','Anda berhasil login');
        }

        return back()->with('loginError','Login Gagal');
    }
}
