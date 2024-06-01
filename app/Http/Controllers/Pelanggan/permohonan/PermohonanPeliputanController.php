<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peliputanModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

class PermohonanPeliputanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'form peliputan',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.liputan', $data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'link_mentahan' => 'required',
            'link_hasil' => 'required',
            'keterangan' => 'required',
            'tenggat_pengerjaan' => 'required',
            'jadwal_mulai' => 'required',
            'jadwal_selesai' => 'required',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke tabel pertama
            $pesanan = DB::table('pesanan')->insertGetId([
                'id_pelanggan' => 2,
                'id_jasa' => 1,
                'status' => 'pending',
                'link_mentahan' => $request->link_mentahan,
                'link_hasil' => $request->link_hasil,
                'keterangan' => $request->pesan,
                'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            ]);

            // Simpan data ke tabel kedua
            desainModel::create([
                'id_pesanan' => $pesanan,
                'id_jasa' => 1,
                'jadwal_mulai' => $request->tenggat_mulai,
                'jadwal_selesai' => $request->tenggat_selesai,
                'pertanyaan_1' => $request->pertanyaan_1,
                'pertanyaan_2' => $request->pertanyaan_2,
                'pertanyaan_3' => $request->pertanyaan_3,
            ]);

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            // Redirect atau berikan respons gagal kepada pengguna
            return redirect()->to('jasa')->with('error','Permohonan gagal dikirim. Mohon coba lagi');
        }
    }
}
