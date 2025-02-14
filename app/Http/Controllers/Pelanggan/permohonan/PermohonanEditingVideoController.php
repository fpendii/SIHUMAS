<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PermohonanEditingVideoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form Permohonan Editing | LinePro',
            'page' => 'form Editing Video',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.editingVideo', $data);
    }
    public function submit(Request $request)
    {
        $request->validate([
            'link_mentahan' => 'required',

        ]);

        $jasa = DB::table('jasa')->insertGetId([
           'jenis_jasa' => 'editing video',
           'waktu_mulai' => $request->waktu_mulai,
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
            'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            'pesan' => $request->pesan,
            'created_at' => now(),
            'unit' => $request->unit
        ]);


        if(!$simpanPesanan){
            emotify('error', 'Maaf Permohonan tidak dapat terkirim, silahkan coba lagi atau hubungi pihak Silamas :(');
        }else{
            emotify('success', 'Permohonan berhasil dikirim, Silahkan tunggu konfirmasi selanjutnya dari pihak Silamas :)');
        }

        return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }

}
