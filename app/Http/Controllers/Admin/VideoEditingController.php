<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\EditingModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasModel;
use App\Models\PetugasPesananModel;

class VideoEditingController extends Controller
{
    public function index(){
        $dataPermohonan = DB::table('pesanan')
            ->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')
            ->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')
            ->join('editing','pesanan.id_pesanan', '=', 'editing.id_pesanan')
            ->where('pesanan.status','=','pending')
            ->where('editing.tipe_editing','=','video_editing')
            ->select('pesanan.*','pelanggan.*','jasa.*','editing.*')
            ->get();

        $data = [
            'title' => 'Video Editing | SIHUMAS',
            'page' => 'Video Editing',
            'sidebar' => 'inbox',
            'level' => 'Admin'
        ];
        return view('pages.admin.kelola_video_editing.video_editing',$data, compact('dataPermohonan', 'data'));

    }

    public function arsip(){
        $dataPermohonan = DB::table('pesanan')
            ->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')
            ->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')
            ->join('editing','pesanan.id_pesanan', '=', 'editing.id_pesanan')
            ->where('pesanan.status','!=','pending')
            ->where('editing.tipe_editing','=','video_editing')
            ->select('pesanan.*','pelanggan.*','jasa.*','editing.*')
            ->get();

        $data = [
            'title' => 'Arsip Video Editing | SIHUMAS',
            'page' => 'Video Editing',
            'sidebar' => 'arsip',
            'level' => 'Admin'
        ];

        return view('pages.admin.kelola_video_editing.arsip_video_editing', compact('dataPermohonan', 'data'));
    }

    public function detail($id){
        $dataPermohonan = DB::table('pesanan')
            ->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')
            ->join('jasa', 'pesanan.id_jasa','=','jasa.id_jasa')
            ->join('editing','pesanan.id_pesanan', '=', 'editing.id_pesanan')
            ->where('pesanan.id_pesanan',$id)
            ->select('pesanan.*','pelanggan.*','jasa.*','editing.*')
            ->first();

        $dataPetugas = PetugasModel::all();

        $data = [
            'title' => 'Detail Permohonan Video Editing | SIHUMAS',
            'page' => 'Permohonan Video Editing',
            'level' => 'Admin',
        ];

        return view('pages.admin.kelola_video-editing.detail', compact('dataPermohonan', 'dataPetugas', 'data'));
    }

    public function pilihPetugas(Request $request, $id){
        PetugasPesananModel::create([
            'id_petugas' => $request->petugas,
            'id_pesanan' => $id
        ]);

        DB::table('pesanan')
            ->where('pesanan.id_pesanan',$id)
            ->update(['status' => 'proses']);

        return redirect()->to('admin/editing')->with('success', 'Data dikirim ke petugas');
    }
}
