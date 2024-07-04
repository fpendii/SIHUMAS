<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\peliputanModel;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PermohonanPeliputanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Form Permohonan Peliputan | SIHUMAS',
            'page' => 'form peliputan',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.liputan', $data);
    }


    public function submit(Request $request)
    {
        $request->validate([
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'pertanyaan_1' => $request->pertanyaan_1,
            'pertanyaan_2' => $request->pertanyaan_2,
            'pertanyaan_3' => $request->pertanyaan_3,
            'jenis_jasa' => 'peliputan',
        ]);

        $akun = DB::table('akun')
        ->where('akun.id_akun', session('id_akun'))
        ->first();

        $simpanPesanan = DB::table('pesanan')->insert([
            'id_akun' => $akun->id_akun,
            'id_jasa' => $jasa,
            'status' => 'pending',
            'link_mentahan' => 'link mentahan',
            'pesan' => 'pesan',
            'tenggat_pengerjaan' => $request->waktu_selesai, //dari link mentahan- tenggat
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if(!$simpanPesanan){
            emotify('error', 'Maaf Permohonan tidak dapat terkirim, silahkan coba lagi atau hubungi pihak Silamas :(');
        }else{
            emotify('success', 'Terima kasih banyak atas kerja sama untuk mengisi formulir Permohonan Bantuan Kehumasan Unit Humas Politeknik Negeri Tanah Laut. Semoga kegiatan di lingkungan Politeknik Negeri Tanah Laut dapat berjalan dengan baik, lancar, dan terarsipkan dengan baik.
Koordinasi lebih lanjut dan konfirmasi permohonan design grafis silahkan hubungi kontak WhatsApp kami');
        }


        return redirect()->to('jasa')->with('success','Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }

}
