<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function home()
    {
        try {
            // Coba ambil data nomor hp admin
            $noHpAdmin = DB::table('akun')->where('role', 'admin')->select('no_hp')->first();

            // Jika data tidak ditemukan
            if (!$noHpAdmin) {
                // Mengembalikan response dengan status 303
                return response()->json([
                    'error' => 'Tidak dapat terhubung ke database.'
                ], 303);
            }

            // Pastikan bahwa $noHpAdmin->no_hp ada dan merupakan string
            $no_hp = isset($noHpAdmin->no_hp) ? (string) $noHpAdmin->no_hp : '';
        } catch (\Exception $e) {
            // Tangani kesalahan jika tidak bisa terhubung ke database
            // Mengembalikan response dengan status 303
            return response()->json([
                'error' => 'Tidak dapat terhubung ke database.'
            ], 303);
        }

        $data = [
            'title' => 'SILAMAS',
            'page' => 'home',
            'no_hp' => $no_hp,
        ];

        return view('pages.landing_page.home', $data);
    }


    public function tentangKami()
    {
        $data = [
            'title' => 'Tentang Kami | SILAMAS',
            'page' => 'tentang_kami'
        ];
        return view('pages.landing_page.tentang_kami', $data);
    }

    public function layanan()
    {

        $data = [
            'title' => 'Layanan | SILAMAS',
            'page' => 'layanan'
        ];
        return view('pages.landing_page.layanan', $data);
    }
}
