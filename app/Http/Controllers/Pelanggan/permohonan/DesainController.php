<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DesainController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'form desain',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.desain', $data);
    }

    public function submit(Request $request)
    {


        $request->validate([
            'link_mentahan' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required',
            'tipe_desain' => 'required',
            'ukuran_gambar' => 'required',
            'tema' => 'required',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
            'tipe_desain' => $request->tipe_desain,
            'ukuran_gambar' => $request->ukuran_gambar,
            'jenis_jasa' => 'desain',
            'tema' => $request->tema,
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


        return redirect()->to('jasa')->with('success', 'Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }
}
