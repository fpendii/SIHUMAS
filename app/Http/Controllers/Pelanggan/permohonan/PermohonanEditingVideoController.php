<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

class PermohonanEditingVideoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form Permohonan Editing | SIHUMAS',
            'page' => 'form Editing',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.editingVideo', $data);
    }

    // public function submit(Request $request)
    // {
    //     $request->validate([
    //         'jadwal_mulai' => 'required',
    //         'jadwal_selesai' => 'required',
    //     ]);

    //     // Mulai transaksi database
    //     DB::beginTransaction();

    //     try {
    //         // Simpan data ke tabel pertama
    //         $pesanan = DB::table('pesanan')->insertGetId([
    //             'id_pelanggan' => 1,
    //             'id_jasa' => 3,
    //             'status' => 'pending',
    //           'jadwal_mulai' => $request->jadwal_mulai,
    //           'jadwal_selesai' => $request->jadwal_selesai,
    //           'pertanyaan_1' => $request->pertanyaan_1,
    //           'pertanyaan_2' => $request->pertanyaan_2,
    //           'pertanyaan_3' => $request->pertanyaan_3,
    //         ]);

    //         // Simpan data ke tabel kedua
    //         peliputanModel::create([
    //             'id_pesanan' => $pesanan,
    //             'id_jasa' => 3,
    //             'jadwal_mulai' => $request->jadwal_mulai,
    //             'jadwal_selesai' => $request->jadwal_selesai,
                
                

    //         ]);

    //         // Commit transaksi jika berhasil
    //         DB::commit();

    //         return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    //     } catch (\Exception $e) {
    //         // Rollback transaksi jika terjadi kesalahan
    //         DB::rollback();

    //         // Redirect atau berikan respons gagal kepada pengguna
    //         return redirect()->to('jasa')->with('error','Permohonan gagal dikirim. Mohon coba lagi');
    //     }
    // }

    public function submit(Request $request)
    {
        $request->validate([
            'link_mentahan' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required',
        ]);
    
        $jasa = DB::table('jasa')->insertGetId([
            'link_mentahan' => $request->link_mentahan,
            'tenggat_pengerjaan' => $request->waktu_selesai,
            'jenis_jasa' => 'editing',
        ]);

        DB::table('pesanan')->insert([
            'id_pelanggan' => null,
            'id_jasa' => $jasa,
            'status' => 'pending',
            'link_mentahan' => null,
            'pesan' => $request->pesan,
            'tenggat_pengerjaan' => $request->waktu_selesai, //dari link mentahan- tenggat 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    
        return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }
    
}
