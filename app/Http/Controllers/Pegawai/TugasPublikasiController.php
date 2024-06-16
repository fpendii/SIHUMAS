<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\Validator;

class TugasPublikasiController extends Controller
{
    public function detailTugas($id)
    {

        $dataPermohonan = DB::table('pesanan')->join('pelanggan', 'pesanan.id_pelanggan', '=', 'pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('petugas', 'petugas_pesanan.id_petugas', '=', 'petugas.id_petugas')->where('id_pesanan', '=', $dataPermohonan->id_pesanan)->get();

        $dataPetugas = PetugasModel::all();
        $data = [
            'title' => 'Permohonan Publikasi | SIHUMAS',
            'page' => 'publikasi',
            'level' => 'Admin',
        ];

        return view('pages.petugas.kelola_tugas.tugas_publikasi', $data, compact('dataPermohonan', 'dataPetugas', 'dataPetugasPesanan'));
    }

    public function submitTugas($id,Request $request)
    {
        $messages = [
            'required' => 'Link Hasil Wajib Diisi.',
            'url' => 'Link yang dimasukkan tidak valid'
        ];

        // Validasi input
        $validator = Validator::make(request()->all(), [
            'link_hasil' => 'required|url',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Temukan pesanan berdasarkan ID
        $dataPermohonan = PesananModel::findOrFail($id);

        // Update status pesanan dan periksa apakah update berhasil
        $updateSuccessful = $dataPermohonan->update([
            'status' => 'selesai'
        ]);

        if (!$updateSuccessful) { // Menggunakan ! untuk mengecek apakah false
            return redirect()->to('petugas/tugas')->with('error', 'Tugas Gagal Dikirim');
        }

        return redirect()->to('petugas/tugas')->with('success', 'Tugas Berhasil Diselesaikan');
    }
}
