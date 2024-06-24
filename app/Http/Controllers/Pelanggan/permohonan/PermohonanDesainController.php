<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PermohonanDesainController extends Controller
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

            $akun = DB::table('akun')
            ->where('akun.id_akun', session('id_akun'))
            ->first();


        // Simpan data ke tabel pertama
        $simpanPesanan = DB::table('pesanan')->insert([
            'id_akun' => $akun->id_akun,
            'id_jasa' => $jasa,
            'status' => 'pending',
            'link_mentahan' => $request->link_mentahan,
            'pesan' => $request->pesan,
            'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            'created_at' => now()
        ]);

        if(!$simpanPesanan){
            emotify('error', 'Maaf Permohonan tidak dapat terkirim, silahkan coba lagi atau hubungi pihak Silamas :(');
        }else{
            emotify('success', 'Permohonan berhasil dikirim, Silahkan tunggu konfirmasi selanjutnya dari pihak Silamas :)');
        }

        return redirect()->to('jasa')->with('success', 'Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }
}
