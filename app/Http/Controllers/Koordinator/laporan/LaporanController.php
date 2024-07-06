<?php

namespace App\Http\Controllers\Koordinator\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;  

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
                ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
                ->get()
                ->toArray()
        ];

        $pdf = PDF::loadView('pages.koordinator.kelola_laporan.cetak_laporan', $data);
        return $pdf->download('laporan_bulanan.pdf');
    }
}


//     public function index()
//     {
//         $data = [
//             'title' => 'Laporan Bulanan | SIHUMAS',
//             'page' => 'Laporan Permohonan',
//             'level' => 'Koordinator',
//             'Laporan' => DB::table('pesanan')
//                 ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
//                 ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
//                 ->select(
//                     'jasa.jenis_jasa',
//                     'akun.nama',
//                     'pesanan.status',
//                     DB::raw('COUNT(pesanan.id_pesanan) as total'),
//                     DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as total_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as total_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as total_pertahun"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as proses_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as proses_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as proses_pertahun"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as tolak_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as tolak_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as tolak_pertahun"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as selesai_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as selesai_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as selesai_pertahun")
//                 )
//                 ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
//                 ->get()
//                 ->toArray()
//         ];

//         return view('pages.koordinator.kelola_laporan.laporan', $data);
//     }

//     // Metode cetakPDF ditambahkan di sini
//     public function cetakPDF()
//     {
//         $data = [
//             'title' => 'Laporan Bulanan | SIHUMAS',
//             'page' => 'Laporan ',
//             'level' => 'Koordinator',
//             'Laporan' => DB::table('pesanan')
//                 ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
//                 ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
//                 ->select(
//                     'jasa.jenis_jasa',
//                     'akun.nama',
//                     'pesanan.status',
//                     DB::raw('COUNT(pesanan.id_pesanan) as total'),
//                     DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as total_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as total_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as total_pertahun"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as proses_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as proses_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as proses_pertahun"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as tolak_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as tolak_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as tolak_pertahun"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as selesai_perminggu"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as selesai_perbulan"),
//                     DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as selesai_pertahun")
//                 )
//                 ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
//                 ->get()
//                 ->toArray()
//         ];

//         $pdf = PDF::loadView('pages.koordinator.kelola_laporan.cetak_laporan', $data);
//         return $pdf->download('laporan_bulanan.pdf');
//     }
// }


    // Metode index sudah ada di sini      ini sum total perbulan minggu tahun
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Laporan Bulanan | SIHUMAS',
    //         'page' => 'Laporan Bulanan',
    //         'level' => 'Koordinator',
    //         'Laporan' => DB::table('pesanan')
    //             ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
    //             ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
    //             ->select(
    //                 'jasa.jenis_jasa',
    //                 'akun.nama',
    //                 'pesanan.status',
    //                 DB::raw('COUNT(pesanan.id_pesanan) as total'),
    //                 DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as total_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as total_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as total_pertahun"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as proses_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as proses_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as proses_pertahun"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as tolak_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as tolak_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as tolak_pertahun"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as selesai_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as selesai_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as selesai_pertahun")
    //             )
    //             ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
    //             ->get()
    //             ->toArray()
    //     ];

    //     return view('pages.koordinator.kelola_laporan.laporan', $data);
    // }

    // // Metode cetakPDF ditambahkan di sini
    // public function cetakPDF()
    // {
    //     $data = [
    //         'title' => 'Laporan Bulanan | SIHUMAS',
    //         'page' => 'Laporan Bulanan',
    //         'level' => 'Koordinator',
    //         'Laporan' => DB::table('pesanan')
    //             ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
    //             ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
    //             ->select(
    //                 'jasa.jenis_jasa',
    //                 'akun.nama',
    //                 'pesanan.status',
    //                 DB::raw('COUNT(pesanan.id_pesanan) as total'),
    //                 DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as total_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as total_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as total_pertahun"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as proses_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as proses_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'proses' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as proses_pertahun"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as tolak_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as tolak_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'tolak' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as tolak_pertahun"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) THEN 1 ELSE 0 END) as selesai_perminggu"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN 1 ELSE 0 END) as selesai_perbulan"),
    //                 DB::raw("SUM(CASE WHEN pesanan.status = 'selesai' AND pesanan.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN 1 ELSE 0 END) as selesai_pertahun")
    //             )
    //             ->groupBy('jasa.jenis_jasa', 'akun.nama', 'pesanan.status')
    //             ->get()
    //             ->toArray()
    //     ];

    //     $pdf = PDF::loadView('pages.koordinator.kelola_laporan.cetak_laporan', $data);
    //     return $pdf->download('laporan_bulanan.pdf');
    // }


    //ini sum total aja

  

