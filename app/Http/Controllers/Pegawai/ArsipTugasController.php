<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipTugasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Arsip Tugas | SIHUMAS',
            'page' => 'Arsip Tugas',
            'level' => 'Petugas',
            'ArsipTugas' => DB::table('petugas_pesanan')
                ->join('pesanan', 'petugas_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
                ->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')
                ->join('akun','pesanan.id_akun','=','akun.id_akun')
                ->where('petugas_pesanan.id_akun', session('id_akun'))

                ->get()
                ->toArray()
        ];
        return view('pages.petugas.kelola_arsip_tugas.arsip_tugas', $data);
    }
}
