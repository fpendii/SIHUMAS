<?php

namespace App\Http\Controllers\Pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanPublikasiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Publikasi | SIHUMAS',
            'page' => 'form publikasi',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.publikasi', $data);
    }

}
