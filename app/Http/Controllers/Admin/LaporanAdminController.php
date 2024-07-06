<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf; 

class LaporanAdminController extends Controller
{
    public function index()      
    {
        $data = [
            'title' => 'Laporan Bulanan | SIHUMAS',
            'page' => 'Laporan Bulanan',
            'level' => 'Admin',
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

        return view('pages.admin.laporan_admin.laporan_admin', $data);
    }

    public function cetakPDF()
    {
        $data = [
            'title' => 'Laporan Bulanan | SIHUMAS',
            'page' => 'Laporan Bulanan',
            'level' => 'Admin',
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

        $pdf = PDF::loadView('pages.admin.laporan_admin.cetak_laporan_admin', $data);
        return $pdf->download('laporan_bulanan.pdf');
    }
}




