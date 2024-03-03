<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LupaPassword extends Controller
{
    public function index(){
        return view('pages.auth.lupa_password');
    }
}
