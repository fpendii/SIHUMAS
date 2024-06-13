<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // 
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;


class EditingVideoController extends Controller
{
    public function index(){
       // $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('peliputan','pesanan.id_pesanan', '=', 'peliputan.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','peliputan.*')->get();
        $dataPermohonan = DB::table('pesanan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.status','=','pending')->select('pesanan.*','jasa.*')->get();
    
        $data = [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'Editing Video',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_video_editing.video_editing',$data,compact('dataPermohonan'));
        
    }
    public function arsip(){
     $data =  [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'video-editing',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];
        //$dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('peliputan','pesanan.id_pesanan', '=', 'peliputan.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','peliputan.*')->get();
        $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('editing','pesanan.id_pesanan', '=', 'editing.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.*','pelanggan.*','jasa.*','editing.*')->get();
    
        return view('pages.admin.kelola_video_editing.video_editing',$data,compact('dataPermohonan'));

    }

    // public function detail(request $request, $id){
    //    // $dataPermohonan = DB::table('pesanan')->join('pelanggan','pesanan.id_pelanggan','=','pesanan.id_pelanggan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->join('peliputan','pesanan.id_pesanan', '=', 'peliputan.id_pesanan')->where('pesanan.status','=','pending')->select('pesanan.','pelanggan.','jasa.','peliputan.')->get()->first();
    //    $dataPermohonan = DB::table('pesanan')->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')->where('pesanan.status','=','pending')->select('pesanan.*','jasa.*')->get();

    //     $dataPetugas = PetugasModel::all();

    //     // dd(compact('dataPetugas'));

    //     $data = [
    //         'title' => 'Permohonan Peliputan | SIHUMAS',
    //         'page' => 'Permohonan Peliputan' ,
    //         'level' => 'Admin',
    //     ];
    //     return view('pages.admin.kelola_liputan.detail',$data,compact('dataPermohonan','dataPetugas'));
    // }

    public function detail(Request $request, $id)
    {
        $dataPermohonan = DB::table('pesanan')
            ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
            ->where('pesanan.status', '=', 'pending')
            ->select('pesanan.*', 'jasa.*')
            ->get();

        $dataPetugas = PetugasModel::all();

        $data = [
            'title' => 'Permohonan Editing Video | SIHUMAS',
            'page' => 'Permohonan Editing Video',
            'level' => 'Admin',
        ];

        return view('pages.admin.kelola_video_editing.detail_video_editing', $data, compact('dataPermohonan', 'dataPetugas'));
    }

    public function pilihPetugas(Request $request,$id){
        $petugas_pesanan = PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        $pesanan = DB::table('pesanan')->where('pesanan.id_pesanan',$id)->update(['status' => 'proses']);

        return redirect()->to('admin/video-editing')->with('success', 'Data dikirim ke petugas');
    }


}