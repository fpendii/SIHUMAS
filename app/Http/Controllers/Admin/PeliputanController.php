<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeliputanController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'Peliputan',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_liputan.liputan',$data);
    }
}
