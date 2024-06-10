<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;
use Illuminate\Support\Facades\Redis;

class EditFotoController extends Controller
{
    public function index(){
        // $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('editing','pesanan.id_pesanan', '=', 'editing.id_pesanan')->where('pesanan.status','=','pending')->where('editing.tipe_editing','=','foto')->select('pesanan.*','pelanggan.*','jasa.*','editing.*')->get();
        $dataPermohonan = DB::table('pesanan')->join('pelanggan', 'pesanan.id_pelanggan', '=', 'pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('jasa.jenis_jasa','=','edit foto')->get();


        $data = [
            'title' => 'Editing Foto | SIHUMAS',
            'page' => 'edit-foto',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_editFoto.editFoto',$data,compact('dataPermohonan', 'data'));
    }

    public function arsip(){
        $data = [
            'title' => 'Arsip Edit Foto | SIHUMAS',
            'page' => 'edit-foto',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('editing','pesanan.id_pesanan', '=', 'editing.id_pesanan')->where('pesanan.status','!=','pending')->where('editing.tipe_editing','=','foto')->select('pesanan.*','pelanggan.*','jasa.*','editing.*')->get();


        return view('pages.admin.kelola_editFoto.arsip_editFoto',$data,compact('dataPermohonan','data'));

    }

    public function detail($id){

        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.id_pesanan',$id)->get()->first();

        $dataPetugas = PetugasModel::all();

        // dd(compact('dataPetugas'));

        $data = [
            'title' => 'Detail Permohonan Edit Foto | SIHUMAS',
            'page' => 'Permohonan Edit Foto' ,
            'level' => 'Admin',
        ];
        return view('pages.admin.kelola_editFoto.detail',$data,compact('dataPermohonan','dataPetugas','data'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas_pesanan = PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses']);

        return redirect()->to('admin/editing')->with('success', 'Data dikirim ke petugas');
    }


}
