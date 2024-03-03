<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Profil | SIHUMAS',
            'page' => 'Profil',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_profil.profil',$data);
    }
}
