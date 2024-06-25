<?php

namespace App\Http\Controllers\Koordinator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; 
use App\Models\akun;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class KoorEditingVideoController extends Controller
{
    public function index(){
        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
        ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('status', '=', 'pending')
        ->where('jenis_jasa', '=', 'peliputan')->orderBy('created_at', 'desc')->get();

        foreach ($dataPermohonan as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }
        $data = [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'editing video',
            'sidebar' => 'inbox',
            'level' => 'Koordinator'
        ];
        return view('pages.koordinator.kelola_editing_video.editing_video',$data, compact('dataPermohonan', 'data'));
        
    }

    public function proses()
    {
        $data = [
            'title' => 'Editing Video | SIHUMAS',
            'page' => 'editing video',
            'sidebar' => 'proses',
            'level' => 'Koordinator',
            'dataPermohonan' => DB::table('pesanan')
                ->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')
                ->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')
                ->where('pesanan.status', '=', 'proses')
                ->where('jasa.jenis_jasa', '=', 'peliputan') // menambahkan prefix 'jasa.' untuk kolom 'jenis_jasa'
                ->orderByDesc('pesanan.created_at') // menambahkan prefix 'pesanan.' untuk kolom 'created_at'
                ->get()
                ->toArray(),

        ];

        foreach ($data['dataPermohonan'] as $item) {
            $item->time_ago = Carbon::createFromTimeString($item->created_at)->locale('id')->diffForHumans();
        }

        return view('pages.koordinator.kelola_editing_video.proses-editing_video', $data);

    }

    public function detailProses($id){

        $dataPermohonan = DB::table('pesanan')->join('akun','pesanan.id_akun','=','akun.id_akun')
        ->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')
        ->where('pesanan.id_pesanan',$id)->get()->first();
        
        $dataPetugasPesanan = DB::table('petugas_pesanan')->join('akun','petugas_pesanan.id_akun','=','akun.id_akun')->where('id_pesanan','=',$dataPermohonan->id_pesanan)->get();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Editing Video| SIHUMAS',
            'page' => 'Permohonan Editing Video' ,
            'level' => 'Koordinator',
        ];
        return view('pages.koordinator.kelola_editing_video.detail-proses_editing_video',$data,compact('dataPermohonan'));
    }




    public function arsip(){
        $data =  [
               'title' => 'Peliputan | SIHUMAS',
               'page' => 'editing video',
               'sidebar' => 'arsip',
               'level' => 'Koordinator'
           ];
           $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.status', '!=', 'pending')->where('pesanan.status', '!=', 'proses')->get();
   
           return view('pages.koordinator.kelola_editing_video.arsip_editing-video',$data,compact('dataPermohonan','data'));
       }
    

    public function detailArsip(Request $request, $id)
    {

        $dataPermohonan = DB::table('pesanan')->join('akun', 'pesanan.id_akun', '=', 'akun.id_akun')->join('jasa', 'pesanan.id_jasa', '=', 'jasa.id_jasa')->where('pesanan.id_pesanan', $id)->get()->first();

        $dataPetugas = akun::where('role','=','petugas')->get();

        $data = [
            'title' => 'Permohonan Koordinator| SIHUMAS',
            'page' => 'Permohonan Koordinator',
            'level' => 'Koordinator',
        ];

        return view('pages.koordinator.kelola_editing_video.detail-arsip-editing-video', $data, compact('dataPermohonan'));
    }


    
}