<?php

namespace App\Http\Controllers\Pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

class PermohonanEditFotoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form Permohonan Edit Foto | LinePro',
            'page' => 'Form Edit foto',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.editFoto', $data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'link_mentahan' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required|date|after_or_equal:today',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
           'jenis_jasa' => 'edit_foto',
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
            'unit' => $request->unit,
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
        //     JasaModel::create([
        //         'id_pesanan' => $pesanan,
        //         'jenis_jasa' => 'edit foto',
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
