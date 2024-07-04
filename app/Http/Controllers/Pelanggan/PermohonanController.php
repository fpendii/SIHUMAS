<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

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
}
