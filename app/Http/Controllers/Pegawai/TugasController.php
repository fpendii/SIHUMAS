<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\PetugasPesananModel;
use App\Models\PetugasModel;
>>>>>>> e7710443a88a17716aab165e2ced744c4a084f3d
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $dataPermohonan = DB::table('pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.status', '=', 'proses')
            ->select('pesanan.*', 'jasa.*')
            ->get();

=======
    public function index(){
        $id_petugas = 1;
>>>>>>> e7710443a88a17716aab165e2ced744c4a084f3d
        $data = [
            'title' => 'Tugas | SIHUMAS',
            'page' => 'Tugas',
            'level' => 'Petugas',
<<<<<<< HEAD
            'dataPermohonan' => $dataPermohonan
        ];

        return view('pages.petugas.kelola_tugas.tugas', $data);
=======
            'petugas' => PetugasModel::all()
        ];


        $petugas_pesanan = PetugasPesananModel::join('pesanan','petugas_pesanan.id_pesanan','=','pesanan.id_pesanan')->where('id_petugas','=',$id_petugas)->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->get();
        return view('pages.petugas.kelola_tugas.tugas',$data,compact('petugas_pesanan'));
>>>>>>> e7710443a88a17716aab165e2ced744c4a084f3d
    }

}
