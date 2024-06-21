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
            'title' => 'Form Permohonan Editing | SIHUMAS',
            'page' => 'form Editing Video',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.editingVideo', $data);
    }
    public function submit(Request $request)
    {
        $request->validate([
            'link_mentahan' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
           'jenis_jasa' => 'editing video',
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
            'created_at' => now(),
        ]);

        return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }
   
}
