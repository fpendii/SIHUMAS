<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\Validator;
use App\Models\akun;
use Illuminate\Support\Str;

class TugasPublikasiController extends Controller
{
    public function detailTugas($id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun', 'petugas_pesanan.id_akun', '=', 'akun.id_akun')->where('id_pesanan', '=', $dataPermohonan->id_pesanan)->get();

        $dataPetugas = DB::table('akun')->where('role', '=', 'petugas')->get();
        $data = [
            'title' => 'Permohonan Publikasi | LinePro',
            'page' => 'publikasi',
            'level' => 'Admin',
        ];

        return view('pages.petugas.kelola_tugas.tugas_publikasi', $data, compact('dataPermohonan', 'dataPetugas', 'dataPetugasPesanan'));
    }

    public function submitTugas($id, Request $request)
{
    $messages = [
        'required' => 'Ringkasan Publikasi wajib diisi.',
        'file' => 'Ringkasan Publikasi harus berupa file PDF.',
        'max' => 'Ringkasan Publikasi tidak boleh lebih dari 200 KB.'
    ];

    $validator = Validator::make($request->all(), [
        'ringkasan_publikasi' => 'required|file|max:200',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if ($request->hasFile('ringkasan_publikasi')) {
        $file = $request->file('ringkasan_publikasi');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/ringkasan_publikasi', $fileName); // Simpan di storage/app/public/ringkasan_publikasi

        // Update atribut pada model PesananModel
        $dataPermohonan = PesananModel::findOrFail($id);
        $dataPermohonan->ringkasan_publikasi = 'storage/ringkasan_publikasi/' . $fileName; // Simpan path file relatif dari public
        $dataPermohonan->status = 'belum-acc';
        $updateSuccessful = $dataPermohonan->save();

        if (!$updateSuccessful) {
            return redirect()->to('petugas/tugas')->with('error', 'Tugas Gagal Dikirim');
        }
    }

    return redirect()->to('petugas/tugas')->with('success', 'Tugas Berhasil Diselesaikan');
}

}
