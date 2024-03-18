<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\desainModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;

class DesainControllert extends Controller
{
    public function index(){
        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('desain','pesanan.id_pesanan', '=', 'desain.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','desain.*')->get();


        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'desain',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_desain.desain',$data,compact('dataPermohonan'));
    }

    public function arsip(){
        $data = [
            'title' => 'Desain | SIHUMAS',
            'page' => 'desain',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('desain','pesanan.id_pesanan', '=', 'desain.id_pesanan')->where('pesanan.status','!=','pending')->select('pesanan.*','pelanggan.*','jasa.*','desain.*')->get();


        return view('pages.admin.kelola_desain.arsip_desain',$data,compact('dataPermohonan'));

    }

    public function detail($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('desain','pesanan.id_pesanan', '=', 'desain.id_pesanan')->where('pesanan.id_pesanan',$id)->select('pesanan.*','pelanggan.*','jasa.*','desain.*')->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Permohonan Desain | SIHUMAS',
            'page' => 'Permohonan Desain' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_desain.detail',$data,compact('dataPermohonan','dataPetugas'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas_pesanan = PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses']);

        return redirect()->to('admin/desain')->with('success', 'Data dikirim ke petugas');
    }

}
