<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoordinatorController extends Controller
{
    public function index()
    {
       
        $totalpeliputan = DB::table('pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.status', '=', 'proses')
            ->where('jasa.jenis_jasa', '=', 'peliputan')
            ->count();

      
        $totaleditingvideo = DB::table('pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.status', '=', 'proses')
            ->where('jasa.jenis_jasa', '=', 'video editing')
            ->count();

        $data = [
            'title' => 'Koordinator | Humas',
            'page' => 'Koordinator',
            'level' => 'Koordinator',
            'totalpeliputan' => $totalpeliputan,
            'totaleditingvideo' => $totaleditingvideo,
        ];

        return view('pages.koordinator.beranda', $data);
    }

    public function proses()
    {
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'peliputan',
            'sidebar' => 'proses',
            'level' => 'Koordinator',
            'dataPermohonan' => DB::table('pesanan')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->where('pesanan.status', '=', 'proses')
                ->where('jasa.jenis_jasa', '=', 'peliputan')
                ->orderByDesc('pesanan.created_at')
                ->get()
                ->toArray(),
        ];

        foreach ($data['dataPermohonan'] as $item) {
            $item->time_ago = \Carbon\Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }

        return view('pages.koordinator.kelola_liputan.proses_liputan', $data);
    }

    public function detailProses($id)
    {
        $dataPermohonan = DB::table('pesanan')
            ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.id_pesanan', $id)
            ->first();

        $data = [
            'title' => 'Permohonan Peliputan | SIHUMAS',
            'page' => 'Permohonan Peliputan',
            'level' => 'Koordinator',
        ];

        return view('pages.koordinator.kelola_liputan.detail-proses', compact('dataPermohonan', 'data'));
    }

    public function arsip()
    {
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'peliputan',
            'sidebar' => 'arsip',
            'level' => 'Koordinator',
        ];

        $dataPermohonan = DB::table('pesanan')
            ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.status', '!=', 'pending')
            ->where('pesanan.status', '!=', 'proses')
            ->where('jasa.jenis_jasa', '=', 'peliputan')
            ->get();

        return view('pages.koordinator.kelola_liputan.arsip_liputan', compact('dataPermohonan', 'data'));
    }

    public function detailArsip($id)
    {
        $dataPermohonan = DB::table('pesanan')
            ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.id_pesanan', $id)
            ->first();

        $data = [
            'title' => 'Permohonan Peliputan | SIHUMAS',
            'page' => 'Permohonan Peliputan',
            'level' => 'Koordinator',
        ];

        return view('pages.koordinator.kelola_liputan.detail-arsip', compact('dataPermohonan', 'data'));
    }

   
}
