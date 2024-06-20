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
            'title' => 'Permohonan Peliputan | SIHUMAS',
            'page' => 'peliputan' ,
            'level' => 'Admin',
        ];

        return view('pages.petugas.kelola_tugas.tugas_peliputan', $data, compact('dataPermohonan', 'dataPetugas', 'dataPetugasPesanan'));
    }


    public function submitTugas(Request $request, $id)
    {
        $messages = [
            'required' => 'Link Hasil Wajib Diisi.',
            'url' => 'Link yang dimasukkan tidak valid'
        ];

        // Validasi request disini jika diperlukan
        $request->validate([
            'link_mentahan' => 'required',
            'link_hasil' => 'required',
        ], $messages);

        // Temukan pesanan berdasarkan ID
        $dataPermohonan = PesananModel::findOrFail($id);

        // Update data pesanan
        $dataPermohonan->update([
            'link_mentahan' => $request->link_mentahan,
            'link_hasil' => $request->link_hasil,
            'status' => 'selesai',
        ]);

        // Redirect dengan pesan sukses
        return redirect()->to('petugas/tugas')->with('success', 'Tugas berhasil diselesaikan');
    }
}