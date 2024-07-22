<?php

namespace App\Http\Controllers\Redaktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PesananModel;
use App\Models\JasaModel;
use App\Models\AkunModel;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\DB;

class PeriksaPublikasiController extends Controller
{
    public function index()
{
    // Mengambil data pesanan yang terkait dengan status 'redaktur' dan jenis jasa 'publikasi'
    $pesanan = DB::table('pesanan')
        ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
        ->where('pesanan.status', '=', 'belum-acc')
        ->where('jasa.jenis_jasa', '=', 'publikasi')
        ->select('pesanan.*', 'jasa.jenis_jasa')
        ->get();

    $data = [
        'title' => 'Periksa | SIHUMAS',
        'page' => 'Periksa Publikasi',
        'level' => 'Redaktur',
    ];

    // Mengirim data ke view
    return view('pages.redaktur.periksa_publikasi.periksa', $data, compact('pesanan'));
}

public function detailTugas($id)
{
    // Ambil data permohonan dengan join tabel akun dan jasa
    $dataPermohonan = DB::table('pesanan')
        ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
        ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
        ->where('pesanan.id_pesanan', $id)
        ->select(
            'pesanan.*',
            'akun.username',
            'jasa.*',
        )
        ->first();

    // Ambil data petugas yang mengerjakan pesanan
    $dataPetugasPesanan = DB::table('petugas_pesanan')
        ->join('akun', 'petugas_pesanan.id_akun', '=', 'akun.id_akun')
        ->where('id_pesanan', '=', $dataPermohonan->id_pesanan)
        ->select('akun.username')
        ->get();

    // Ambil data semua petugas
    $dataPetugas = DB::table('akun')
        ->where('role', '=', 'petugas')
        ->get();

    // Data untuk dikirim ke view
    $data = [
        'title' => 'Permohonan Publikasi | SIHUMAS',
        'page' => 'publikasi',
        'level' => 'Redaktur',
    ];

    // Mengirim data ke view
    return view('pages.redaktur.periksa_publikasi.detail_periksa_publikasi', $data, compact('dataPermohonan', 'dataPetugas', 'dataPetugasPesanan'));
}

public function submitPemeriksaan(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'catatan_redaktur' => 'nullable|string|max:255',
    ]);

    // Tentukan status berdasarkan catatan redaktur
    $status = empty($request->catatan_redaktur) ? 'selesai' : 'proses';

    // Update catatan_redaktur dan status di tabel jasa
    DB::table('jasa')
        ->join('pesanan', 'jasa.id_jasa', '=', 'pesanan.id_jasa')
        ->where('pesanan.id_pesanan', $id)
        ->update([
            'jasa.catatan_redaktur' => $request->catatan_redaktur,
            'pesanan.status' => $status,
        ]);

    // Redirect dengan pesan sukses
    return redirect('redaktur/periksa_publikasi')->with('success', 'Catatan redaktur berhasil diperbarui.');
}


}
