<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desainModel;
use App\Models\PesananModel;

class DesainController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'form desain',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.desain',$data);
    }

    public function submit(Request $request){
        // echo $request->pesan;
        // echo $request->tipe_desain;
        // echo $request->ukuran_gambar;
        // echo $request->link_mentahan;


        PesananModel::create([
            'id_pelanggan' => 1,
            'id_jasa' => 1,
            'status' => 'proses',
            'link_mentahan' => $request->link_mentahan,
            'link_mentahan' => 'babi',
            'keterangan' => $request->pesan,
            'tenggat_pengerjaan' => $request->tenggat_waktu,
        ]);

        $pesanan = PesananModel::latest()->first();

        desainModel::create([
            'id_pesanan' => $pesanan->id_pesanan,
            'id_jasa' => 1,
            'tipe_desain' => $request->tipe_desain,
            'ukuran_gambar' => $request->ukuran_gambar,
        ]);

    }
}
