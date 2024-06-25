<?php
namespace App\Http\Controllers\Koordinator\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Bulanan | SIHUMAS',
            'page' => 'Laporan Bulanan',
            'level' => 'Koordinator',
            'Laporan' => DB::table('petugas_pesanan')
                ->join('pesanan', 'petugas_pesanan.id_pesanan', '=', 'pesanan.id_pesanan')
                ->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')
                ->join('akun','pesanan.id_akun','=','akun.id_akun')
                ->get()
                ->toArray()
        ];
        return view('pages.koordinator.kelola_laporan.laporan', $data);
    }
}
