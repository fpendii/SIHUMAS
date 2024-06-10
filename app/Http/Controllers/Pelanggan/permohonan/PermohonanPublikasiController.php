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
        dd($request->all());
        $request->validate([
            'link_mentahan' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required',
            'tipe_desain' => 'required',
            'ukuran_gambar' => 'required',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
            'tipe_desain' => $request->tipe_desain,
            'ukuran_gambar' => $request->ukuran_gambar,
            'jenis_jasa' => 'desain'
        ]);


        // Simpan data ke tabel pertama
        DB::table('pesanan')->insert([
            'id_pelanggan' => 1,
            'id_jasa' => $jasa,
            'status' => 'pending',
            'link_mentahan' => $request->link_mentahan,
            'pesan' => $request->pesan,
            'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            'created_at' => now()
        ]);


        return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');

    }

}
