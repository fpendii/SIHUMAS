<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasPesananModel;
use App\Models\PetugasModel;
use App\Models\Akun;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $petugas = Akun::where('akun.id_akun', session('id_akun'))->first();
        $id_akun = $petugas->id_akun;

        $data = [
            'title' => 'Tugas | LinePro',
            'page' => 'Tugas',
            'level' => 'Petugas',
            'petugas' => Akun::where('role', '=', 'petugas')->get()
        ];

        // Mengambil data pesanan yang terkait dengan petugas
        $petugas_pesanan = PetugasPesananModel::join('pesanan', 'petugas_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('petugas_pesanan.id_akun', '=', $id_akun) // Menambahkan alias tabel
            ->where('pesanan.status', '=', 'proses') // Menambahkan alias tabel
            ->get();

        // Mengirim data ke view
        return view('pages.petugas.kelola_tugas.tugas', $data, compact('petugas_pesanan'));
    }
}
