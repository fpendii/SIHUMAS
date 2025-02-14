<?php

namespace App\Http\Controllers\Pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

class PermohonanPasFotoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form Permohonan Pas Foto | LinePro',
            'page' => 'form pas foto',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.pasFoto', $data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            // 'link_mentahan' => 'required',
            'pesan' => 'required',
            // 'tenggat_pengerjaan' => 'required',
            'jadwal_foto' => 'required|date|after_or_equal:today',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
            'jenis_jasa' => 'pas_foto',
            'jadwal_foto' => $request->jadwal_foto,
         ]);

         $akun = DB::table('akun')
         ->where('akun.id_akun', session('id_akun'))
         ->first();

         // Simpan data ke tabel pertama
         $simpanPesanan = DB::table('pesanan')->insert([
            'id_akun' => $akun->id_akun,
            'id_jasa' => $jasa,
            'unit' => $request->unit,
            'status' => 'pending',
            // 'link_mentahan' => $request->link_mentahan,
            'pesan' => $request->pesan,
            // 'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            // 'unit' => $request->unit,
            'created_at' => now(),
        ]);

        if(!$simpanPesanan){
            emotify('error', 'Maaf Permohonan tidak dapat terkirim, silahkan coba lagi atau hubungi pihak Silamas :(');
        }else{
            emotify('success', 'Permohonan berhasil dikirim, Silahkan tunggu konfirmasi selanjutnya dari pihak Silamas :)');
        }

         return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');

        // // Mulai transaksi database
        // DB::beginTransaction();

        // try {
        //     // Simpan data ke tabel pertama
        //     $pesanan = DB::table('pesanan')->insertGetId([
        //         'id_pelanggan' => 1,
        //         'id_jasa' => 2,
        //         'status' => 'pending',
        //         'link_mentahan' => $request->link_mentahan,
        //         'keterangan' => $request->pesan,
        //         'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
        //     ]);

        //     // Simpan data ke tabel kedua
        //     pasFotoModel::create([
        //         'id_pesanan' => $pesanan,
        //         'id_jasa' => 2,
        //         'jadwal_foto' => $request->jadwal_foto,
        //     ]);

        //     // Commit transaksi jika berhasil
        //     DB::commit();

        //     return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
        // } catch (\Exception $e) {
        //     // Rollback transaksi jika terjadi kesalahan
        //     DB::rollback();

        //     // Redirect atau berikan respons gagal kepada pengguna
        //     return redirect()->to('jasa')->with('error','Permohonan gagal dikirim. Mohon coba lagi');
        // }
    }
}
