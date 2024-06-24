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
            'page' => 'Beranda',
            'level' => 'Redaktur',
            'totalPublikasi' => count($PermohonanPublikasi),
        ];

        return view('pages.redaktur.beranda', $data);
    }

    public function periksaPublikasi()
    {
        $petugas = Akun::where('akun.id_akun', session('id_akun'))->first();
        $id_akun = $petugas->id_akun;

        $data = [
            'title' => 'Periksa Publikasi | SIHUMAS',
            'page' => 'Periksa Publikasi',
            'level' => 'Redaktur',
        ];

        $periksa_publikasi = PetugasPesananModel::join('pesanan', 'petugas_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('petugas_pesanan.id_akun', '=', $id_akun)
            ->where('pesanan.status', '=', 'proses')
            ->where('jasa.jenis_jasa', '=', 'publikasi') // Filter by jenis_jasa
            ->get();

        return view('pages.redaktur.periksa_publikasi.periksa', $data, compact('periksa_publikasi'));
    }
}
