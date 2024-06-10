<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\desainModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\Redis;

class DesainControllert extends Controller
{
    public function index(){

        // $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('desain','pesanan.id_pesanan', '=', 'desain.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','desain.*')->get();
        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('status','=','pending')->where('jenis_jasa','=','desain')->get();

        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'desain',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_desain.desain',$data,compact('dataPermohonan','data'));
    }

    public function arsip(){
        $data = [
            'title' => ' Arsip Desain | SIHUMAS',
            'page' => 'desain',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.status','!=','pending')->get();


        return view('pages.admin.kelola_desain.arsip_desain',$data,compact('dataPermohonan','data'));

    }

    public function detail($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Permohonan Desain | SIHUMAS',
            'page' => 'Permohonan Desain' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_desain.detail',$data,compact('dataPermohonan','dataPetugas','data'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas_pesanan = PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses']);

        return redirect()->to('admin/desain')->with('success', 'Data dikirim ke petugas');
    }

    public function TolakPermohonan($id)
    {
        DB::table('pesanan')->where('id_pesanan', $id)->update(['status' => 'ditolak']);

        return redirect()->route('kembali')->with('success', 'Pesanan ditolak');
    }


}
