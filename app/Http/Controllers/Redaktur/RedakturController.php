<?php

namespace App\Http\Controllers\Redaktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Jasa;
use App\Models\PetugasPesananModel;
use App\Models\Akun;
use Illuminate\Support\Facades\DB;

class RedakturController extends Controller
{
    public function index()
    {
        $PermohonanPublikasi = DB::table('pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('jenis_jasa', '=', 'publikasi')
            ->get()
            ->toArray();

        $data = [
            'title' => 'Beranda | SIHUMAS',
            'page' => 'index',
            'level' => 'Redaktur',
            'totalPublikasi' => count($PermohonanPublikasi),
        ];

        return view('pages.redaktur.beranda', $data);
    }
}
