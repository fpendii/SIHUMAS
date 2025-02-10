<?php

namespace App\Http\Controllers\SendEmail;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TesEmail extends Controller
{
    public function index(){

        // send email
        $akun = akun::all();
        Mail::to('nurependi@mhs.politala.ac.id')->send(new VerifikasiEmail($akun));
    }
}
