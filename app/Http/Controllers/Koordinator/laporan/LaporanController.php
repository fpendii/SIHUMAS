<?php

namespace App\Http\Controllers\Koordinator\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf; 

class LaporanController extends Controller
{
    public function index()      
    {
        $data = [
            'title' => 'Laporan Bulanan | SIHUMAS',
            'page' => 'Laporan Bulanan',
            'level' => 'Koordinator',
            'Laporan' => DB::table('pesanan')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->select(
                    'jasa.jenis_jasa', 
                    'akun.nama', 
                    'pesanan.status', 
                    DB::raw('COUNT(pesanan.id_pesanan) as total')
                )
                ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
                ->get()
                ->toArray()
        ];

        return view('pages.koordinator.kelola_laporan.laporan', $data);
    }

    public function cetakPDF()
    {
        $data = [
            'title' => 'Laporan Bulanan | SIHUMAS',
            'page' => 'Laporan Bulanan',
            'level' => 'Koordinator',
            'Laporan' => DB::table('pesanan')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->select(
                    'jasa.jenis_jasa', 
                    'akun.nama', 
                    'pesanan.status', 
                    DB::raw('COUNT(pesanan.id_pesanan) as total')
                )
                ->where('pesanan.status', 'selesai')
                ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
                ->get()
                ->toArray()
        ];

        $pdf = PDF::loadView('pages.koordinator.kelola_laporan.cetak_laporan', $data);
        return $pdf->download('laporan_bulanan.pdf');
    }

    public function review_laporan()
    {
        $data = [
            'title' => 'Review Laporan Bulanan | SIHUMAS',
            'page' => 'Review Laporan Bulanan',
            'level' => 'Koordinator',
            'Laporan' => DB::table('pesanan')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->select(
                    'jasa.jenis_jasa', 
                    'akun.nama', 
                    'pesanan.status', 
                    DB::raw('COUNT(pesanan.id_pesanan) as total')
                )
                
                ->where('pesanan.status', 'selesai')
                ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
                ->get()
                ->toArray()
        ];
        // dd($data);
      
        return view('pages.koordinator.kelola_laporan.review', $data);
    }
    

}

  

