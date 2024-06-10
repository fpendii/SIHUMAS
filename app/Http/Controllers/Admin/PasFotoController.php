<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\Redis;

class PasFotoController extends Controller
{
    public function index(){
        // $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('pas_foto','pesanan.id_pesanan', '=', 'pas_foto.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','pas_foto.*')->get();
        $dataPermohonan = DB::table('pesanan')->join('pelanggan', 'pesanan.id_pelanggan', '=', 'pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('jasa.jenis_jasa','=','pas foto')->where('pesanan.status','=','pending')->get();

        $data = [
            'title' => 'Pas Foto | SIHUMAS',
            'page' => 'pas-foto',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_pasFoto.pasFoto',$data,compact('dataPermohonan','data'));
    }

    public function arsip(){
        $data = [
            'title' => 'Arsip Pas Foto | SIHUMAS',
            'page' => 'pas-foto',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.status','!=','pending')->where('jasa.jenis_jasa','=','pas foto')->get();


        return view('pages.admin.kelola_pasFoto.arsip_pasFoto',$data,compact('dataPermohonan','data'));

    }

    public function detail($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Detail Permohonan Pas Foto | SIHUMAS',
            'page' => 'Permohonan Pas Foto' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_PasFoto.detail',$data,compact('dataPermohonan','dataPetugas','data'));
    }
    public function detailarsip($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Detail Arsip Permohonan Pas Foto | SIHUMAS',
            'page' => 'Arsip Permohonan Pas Foto' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_PasFoto.detailarsip',$data,compact('dataPermohonan','dataPetugas','data'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas_pesanan = PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses','updated_at' => now()]);

        return redirect()->to('admin/pas-foto')->with('success', 'Data dikirim ke petugas');
    }


}
