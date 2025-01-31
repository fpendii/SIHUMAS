<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\Validator;

class TugasPeliputanController extends Controller
{
    public function detailTugas($id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun','pesanan.id_akun','=','akun.id_akun')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun','petugas_pesanan.id_akun','=','akun.id_akun')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = DB::table('akun')->where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Peliputan | LinePro',
            'page' => 'peliputan' ,
            'level' => 'Admin',
        ];

        return view('pages.petugas.kelola_tugas.tugas_peliputan', $data, compact('dataPermohonan', 'dataPetugas', 'dataPetugasPesanan'));
    }


    public function submitTugas(Request $request, $id) {
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
