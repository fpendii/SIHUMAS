<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desainModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

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
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke tabel pertama
            $pesanan = DB::table('pesanan')->insertGetId([
                'id_pelanggan' => 1,
                'id_jasa' => 1,
                'status' => 'pending',
                'link_mentahan' => $request->link_mentahan,
                'keterangan' => $request->pesan,
                'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            ]);

            // Simpan data ke tabel kedua
            desainModel::create([
                'id_pesanan' => $pesanan,
                'id_jasa' => 1,
                'tipe_desain' => $request->tipe_desain,
                'ukuran_gambar' => $request->ukuran_gambar,
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
