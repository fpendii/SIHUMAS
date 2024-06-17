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
        $request->validate([
            'pilihan_publikasi' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required',
            'tag_sosmed' => 'required',
            'link_mentahan' => 'required',
            'tenggat_pengerjaan' => 'required'
        ]);



        if($request->pilihan_publikasi == 'sosial media'){
            $publikasi = $request->platform_sosial_media;
        } else {
            $publikasi = $request->pilihan_publikasi;
        }

        $jasa = DB::table('jasa')->insertGetId([
            'pilihan_publikasi' => $publikasi,
            'tag_sosmed' => $request->tag_sosmed,
            'jenis_jasa' => 'publikasi'
        ]);

        $akun = DB::table('akun')
        ->where('akun.id_akun', session('id_akun'))
        ->first();

        // Simpan data ke tabel pertama
        DB::table('pesanan')->insert([
            'id_akun' => $akun->id_akun,
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
