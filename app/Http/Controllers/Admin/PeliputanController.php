<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PeliputanModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // 
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;


class PeliputanController extends Controller
{
    public function index(){
        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('peliputan','pesanan.id_pesanan', '=', 'peliputan.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','peliputan.*')->get();
    
        $data = [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'Peliputan',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_liputan.liputan',$data,compact('dataPermohonan'));
        
    }
    public function arsip(){
     $data =  [
            'title' => 'Peliputan | SIHUMAS',
            'page' => 'peliputan',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];
        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('peliputan','pesanan.id_pesanan', '=', 'peliputan.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','peliputan.*')->get();
    
        return view('pages.admin.kelola_liputan.liputan',$data,compact('dataPermohonan'));

    }

    public function detail($id){
        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('peliputan','pesanan.id_pesanan', '=', 'peliputan.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.','pelanggan.','jasa.','peliputan.')->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Permohonan Peliputan | SIHUMAS',
            'page' => 'Permohonan Peliputan' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_peliputan.detail',$data,compact('dataPermohonan','dataPetugas'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas_pesanan = PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses']);

        return redirect()->to('admin/peliputan')->with('success', 'Data dikirim ke petugas');
    }


}