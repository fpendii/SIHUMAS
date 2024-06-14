<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasPesananModel;
use App\Models\PetugasModel;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $id_petugas = 1; // Pastikan Anda menyesuaikan ID petugas sesuai kebutuhan
        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Tugas | SIHUMAS',
            'page' => 'Tugas',
            'level' => 'Petugas',
            'petugas' => PetugasModel::all()
        ];

        // Mengambil data pesanan yang terkait dengan petugas
        $petugas_pesanan = PetugasPesananModel::join('pesanan', 'petugas_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->where('id_petugas', '=', $id_petugas)
            ->where('status', '=', 'proses')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->get()
            ;

        // Mengirim data ke view
        return view('pages.petugas.kelola_tugas.tugas', $data, compact('petugas_pesanan'));
    }
}
