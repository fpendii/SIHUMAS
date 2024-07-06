<?php

namespace App\Http\Controllers\pelanggan\permohonan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JasaModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PermohonanDesainController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'form desain',
            'level' => 'Pelanggan'
        ];
        return view('pages.pelanggan.permohonan.desain', $data);
    }

    public function submit(Request $request)
    {
        if ($request->get('ukuran_gambar') == 'custom') {
            $ukuran_gambar = $request->get('ukuran_gambar_costum');
        } else {
            $ukuran_gambar = $request->get('ukuran_gambar');
        }

        $request->validate([
            'link_mentahan' => 'required',
            'pesan' => 'required',
            'tenggat_pengerjaan' => 'required',
            'tipe_desain' => 'required',
            'ukuran_gambar' => 'required',
            'tema' => 'required',
        ]);

        $jasa = DB::table('jasa')->insertGetId([
            'tipe_desain' => $request->tipe_desain,
            'ukuran_gambar' => $ukuran_gambar,
            'jenis_jasa' => 'desain',
            'tema' => $request->tema,

        ]);

        $akun = DB::table('akun')
            ->where('akun.id_akun', session('id_akun'))
            ->first();





        // Simpan data ke tabel pertama
        $simpanPesanan = DB::table('pesanan')->insert([
            'id_akun' => $akun->id_akun,
            'id_jasa' => $jasa,
            'status' => 'pending',
            'link_mentahan' => $request->link_mentahan,
            'pesan' => $request->pesan,
            'tenggat_pengerjaan' => $request->tenggat_pengerjaan,
            'created_at' => now(),
            'unit' => $request->unit
        ]);

        if (!$simpanPesanan) {
            emotify('error', 'Maaf Permohonan tidak dapat terkirim, silahkan coba lagi atau hubungi pihak Silamas :(');
        } else {
            emotify('success', 'Terima kasih banyak atas kerja sama untuk mengisi formulir Permohonan Bantuan Kehumasan Unit Humas Politeknik Negeri Tanah Laut. Semoga kegiatan di lingkungan Politeknik Negeri Tanah Laut dapat berjalan dengan baik, lancar, dan terarsipkan dengan baik.
Koordinasi lebih lanjut dan konfirmasi permohonan design grafis silahkan hubungi kontak WhatsApp kami');
        }

        return redirect()->to('jasa')->with('success', 'Permohonan berhasil dikirim. Tunggu Konfirmasi dari pihak humas');
    }
}
