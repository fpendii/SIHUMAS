<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desainModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;

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

                // Buat pesanan baru
                $pesanan = DB::table('pesanan')->insertGetId([
                    'id_pelanggan' => 1,
                    'id_jasa' => 1,
                    'status' => 'proses',
                    'link_mentahan' => $request->link_mentahan,
                    'keterangan' => $request->pesan,
                    'tenggat_pengerjaan' => $request->tenggat_waktu,
                ]);

                // Buat jasa desain baru sesuai dengan pesanan yang baru dibuat
                desainModel::create([
                    'id_pesanan' => $pesanan,
                    'id_jasa' => 1,
                    'tipe_desain' => $request->tipe_desain,
                    'ukuran_gambar' => $request->ukuran_gambar,
                ]);

                return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }

}
