<?php

namespace App\Http\Controllers\Pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EditingModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

class PermohonanEditFotoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form Permohonan Edit Foto | SIHUMAS',
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
            'tenggat_pengerjaan' => 'required',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke tabel pertama
            $pesanan = DB::table('pesanan')->insertGetId([
                'id_pelanggan' => 2,
                'id_jasa' => 2,
                'status' => 'pending',
                'link_mentahan' => $request->link_mentahan,
                'keterangan' => $request->pesan,
                'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            ]);

            // Simpan data ke tabel kedua
            EditingModel::create([
                'id_pesanan' => $pesanan,
                'id_jasa' => 5,
                'tipe_editing' => 'foto',
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
