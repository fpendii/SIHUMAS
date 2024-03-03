<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesainControllert extends Controller
{
    public function index(){
        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'Desain',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_desain.desain',$data);
    }
}
