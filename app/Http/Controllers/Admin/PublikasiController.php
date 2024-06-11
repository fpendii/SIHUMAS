<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;

class PublikasiController extends Controller
{
    public function index(){

        $data = [
            'title' => 'Publikasi | SIHUMAS',
            'page' => 'publikasi',
            'level' => 'Admin',
            'sidebar' => 'inbox',
            'dataPermohonan' => DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa','pesanan.id_jasa','=','jasa.id_jasa')->where('status','=','pending')->where('jenis_jasa','=','publikasi')->get()->toArray(),
        ];
        return view('pages.admin.kelola_publikasi.publikasi',$data);
    }

    public function arsip(){
        $data = [
            'title' => 'Publikasi | SIHUMAS',
            'page' => 'publikasi',
            'sidebar' => 'arsip',
            'level' => 'Admin',
            'dataPermohonan' => DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.status','!=','pending')->where('jenis_jasa','=','publikasi')->get()->toArray(),
        ];

        return view('pages.admin.kelola_publikasi.arsip_publikasi',$data);

    }

    public function detail($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Permohonan Publikasi | SIHUMAS',
            'page' => 'Permohonan Publikasi' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_publikasi.detail',$data,compact('dataPermohonan','dataPetugas','data'));
    }

    public function detailArsip($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('petugas','petugas_pesanan.id_petugas','=','petugas.id_petugas')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = PetugasModel::all();



        $data = [
            'title' => 'Permohonan Publikasi | SIHUMAS',
            'page' => 'Permohonan Publikasi' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_publikasi.detail_arsip_publikasi',$data,compact('dataPermohonan','dataPetugas','dataPetugasPesanan'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas = $request->petugas;
        $jumlahPetugas = count($petugas);

        for($i = 0;$i < $jumlahPetugas; $i++){
            PetugasPesananModel::create([
                'id_petugas' => $request->petugas[$i],
                'id_pesanan' => $id
            ]);
        };

        DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses']);

        return redirect()->to('admin/publikasi')->with('success', 'Data dikirim ke petugas');
    }
}
