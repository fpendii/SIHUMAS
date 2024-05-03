<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peliputanModel;

class PeliputanController extends Controller
{
    public function index(){
        $dataPermohonan = peliputanModel::all();
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'Peliputan',
            'level' => 'Admin',
            'sidebar'=> 'inbox'
        ];
        return view('pages.admin.kelola_liputan.liputan',$data);
    }
}
