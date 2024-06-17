<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasPesananModel;
use App\Models\PetugasModel;
use App\Models\akun;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $petugas = Akun::where('akun.id_akun', session('id_akun'))
            ->first();
        $id_akun = $petugas->id_akun;
        $data = [
            'title' => 'Tugas | SIHUMAS',
            'page' => 'Tugas',
            'level' => 'Petugas',
            'petugas' => akun::where('role','=','petugas')->get()
        ];

        // Mengambil data pesanan yang terkait dengan petugas
        $petugas_pesanan = PetugasPesananModel::join('pesanan', 'petugas_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->where('id_akun', '=', $id_akun)
            ->where('status', '=', 'proses')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->get();

        // Mengirim data ke view
        return view('pages.petugas.kelola_tugas.tugas', $data, compact('petugas_pesanan'));
    }
}
