<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasPesananModel;
use App\Models\PetugasModel;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index(){
        $id_petugas = 1;
        $data = [
            'title' => 'Tugas | SIHUMAS',
            'page' => 'Tugas',
            'level' => 'Petugas',
            'petugas' => PetugasModel::all()
        ];


        $petugas_pesanan = PetugasPesananModel::join('pesanan','petugas_pesanan.id_pesanan','=','pesanan.id_pesanan')->where('id_petugas','=',$id_petugas)->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->get();
        return view('pages.petugas.kelola_tugas.tugas',$data,compact('petugas_pesanan'));
    }

}
