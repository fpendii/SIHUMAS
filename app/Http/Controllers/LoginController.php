<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use app\helpers\CustomHelper;

class LoginController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }
}
