<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\akun;

class PermohonanController extends Controller
{
    public function index(){

        $data = [
            'title' => 'Jasa | Humas',
            'page' => 'Pilih Jasa',
            'hak_akses' => 'Pelanggan'
        ];

        $PermohonanPelanggan = DB::table('pesanan')->where('id_akun',session('id_akun'))->orderBy('created_at', 'desc')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->get();

        foreach ($PermohonanPelanggan as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }


        return view('pages.pelanggan.pilih_jasa',$data,compact('PermohonanPelanggan'));
    }

    public function cekPermohonan($id, $type){
        $dataPermohonan = DB::table('pesanan')
            ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.id_pesanan', $id)
            ->first();

        $dataPetugasPesanan = DB::table('petugas_pesanan')
            ->join('akun', 'petugas_pesanan.id_akun', '=', 'akun.id_akun')
            ->where('id_pesanan', '=', $dataPermohonan->id_pesanan)
            ->get();

        $dataPetugas = akun::where('role', '=', 'petugas')->get();

        $data = [
            'title' => 'Permohonan ' . ucfirst($type) . ' | SIHUMAS',
            'page' => 'Permohonan ' . ucfirst($type),
            'level' => 'Admin',
        ];

        if ($type == 'desain') {
            return view('pages.pelanggan.detail_permohonan.detail_desain', $data, compact('dataPermohonan', 'dataPetugasPesanan'));
        } elseif ($type == 'publikasi') {
            return view('pages.pelanggan.detail_permohonan.detail_publikasi', $data, compact('dataPermohonan', 'dataPetugasPesanan'));
        } else {
            abort(404);
        }
    }

}
