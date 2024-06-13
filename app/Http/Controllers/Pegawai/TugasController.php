<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $dataPermohonan = DB::table('pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.status', '=', 'proses')
            ->select('pesanan.*', 'jasa.*')
            ->get();

        $data = [
            'title' => 'Tugas | SIHUMAS',
            'page' => 'Tugas',
            'level' => 'Petugas',
            'dataPermohonan' => $dataPermohonan
        ];

        return view('pages.petugas.kelola_tugas.tugas', $data);
    }
}
