<?php

namespace App\Http\Controllers\Pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function submit(Request $request)
{
    // Validate input data
    $request->validate([
        'pilihan_publikasi' => 'required',
        'pesan' => 'required',
        'tenggat_pengerjaan' => 'required|date|after_or_equal:today',
        // 'tag_sosmed' => 'required',
        'link_mentahan' => 'required',
    ]);

    // Determine the type of publication
    if ($request->pilihan_publikasi == 'sosial media') {
        $publikasi = $request->platform_sosial_media;
    } else {
        $publikasi = $request->pilihan_publikasi;
    }

    // Insert data into 'jasa' table and get the inserted ID
    $jasa = DB::table('jasa')->insertGetId([
        'pilihan_publikasi' => $publikasi,
        'tag_sosmed' => $request->tag_sosmed,
        'jenis_jasa' => 'publikasi',
    ]);

    // Get user account information
    $akun = DB::table('akun')
        ->where('akun.id_akun', session('id_akun'))
        ->first();

    // Insert data into 'pesanan' table
    $simpanPesanan = DB::table('pesanan')->insert([
        'id_akun' => $akun->id_akun,
        'id_jasa' => $jasa,
        'status' => 'pending',
        'link_mentahan' => $request->link_mentahan,
        'pesan' => $request->pesan,
        'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
        'created_at' => now(),
        'unit' => $request->unit,
    ]);

    // Display appropriate message based on the result of the insertion
    if (!$simpanPesanan) {
        emotify('error', 'Maaf Permohonan tidak dapat terkirim, silahkan coba lagi atau hubungi pihak Silamas :(');
    } else {
        emotify('success', 'Permohonan berhasil dikirim, Silahkan tunggu konfirmasi selanjutnya dari pihak Silamas :)');
    }

    // Redirect to 'jasa' page with a success message
    return redirect()->to('jasa')->with('success', 'Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
}

}
