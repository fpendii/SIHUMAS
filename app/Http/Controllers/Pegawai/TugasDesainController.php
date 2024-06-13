<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;

class TugasDesainController extends Controller
{
    public function detailTugas($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('petugas','petugas_pesanan.id_petugas','=','petugas.id_petugas')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = PetugasModel::all();
        $data = [
            'title' => 'Permohonan Desain | SIHUMAS',
            'page' => 'Permohonan Desain' ,
            'level' => 'Admin',
        ];

        return view('pages.petugas.kelola_tugas.tugas_desain',$data,compact('dataPermohonan','dataPetugas','dataPetugasPesanan'));
    }
}
