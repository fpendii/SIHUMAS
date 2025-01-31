<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PesananModel;
use Illuminate\Support\Facades\Validator;

class TugasEditingVideoController extends Controller
{
    public function detailTugas($id)
    {
        $dataPermohonan = DB::table('pesanan')
            ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.id_pesanan', $id)
            ->first();

        $dataPetugasPesanan = DB::table('petugas_pesanan')
            ->join('akun', 'petugas_pesanan.id_akun', '=', 'akun.id_akun')
            ->where('id_pesanan', '=', $dataPermohonan->id_pesanan)
            ->get();

        $data = [
            'title' => 'Permohonan Editing Video | LinePro',
            'page' => 'editing video',
            'level' => 'Admin',
        ];

        return view('pages.petugas.kelola_tugas.tugas_editing_video', compact('dataPermohonan', 'dataPetugasPesanan'))->with($data);
    }


    public function submitTugas(Request $request, $id)
{
    $messages = [
        'required' => 'Link Hasil Wajib Diisi.',
        'url' => 'Link yang dimasukkan tidak valid'
    ];

    $validator = Validator::make($request->all(), [
        'link_hasil' => 'required|url',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $dataPermohonan = PesananModel::findOrFail($id);

    $updateSuccessful = $dataPermohonan->update([
        'status' => 'selesai',
        'link_hasil' => $request->input('link_hasil')
    ]);

    if (!$updateSuccessful) {
        return redirect()->to('petugas/tugas')->with('error', 'Tugas Gagal Dikirim');
    }

    return redirect()->to('petugas/tugas')->with('success', 'Tugas Berhasil Diselesaikan');
}

}
