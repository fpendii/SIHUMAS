<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\PeliputanController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\EditingVideoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LupaPassword;
use App\Http\Controllers\Pegawai\ArsipTugasController;
use App\Http\Controllers\Pegawai\PetugasController;
use App\Http\Controllers\Pegawai\TugasController;
use App\Http\Controllers\pelanggan\permohonan\DesainController;
use App\Http\Controllers\Pelanggan\LandingPageController;
use App\Http\Controllers\Pelanggan\PermohonanController;
use App\Http\Controllers\pelanggan\permohonan\desain;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DesainControllert;
use App\Http\Controllers\Admin\PasFotoController;
use App\Http\Controllers\Admin\EditFotoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPublikasiController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPasFotoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanEditFotoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanEditingVideoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPeliputanController;
use App\Http\Controllers\Pegawai\TugasPublikasiController;
use App\Http\Controllers\Pegawai\TugasDesainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'store']);

    Route::get('registrasi',[RegistrasiController::class, 'index']);
    Route::post('registrasi',[RegistrasiController::class, 'create']);


    Route::get('lupa-password',[LupaPassword::class, 'index']);
    Route::get('logout',[LogoutController::class, 'index']);
});


// Route Landing Page
Route::get('',[LandingPageController::class, 'index']);

// Route Pelanggan
Route::prefix('jasa')->group(function(){
    Route::get('',[PermohonanController::class, 'index']);

    // Route Desain
    Route::get('desain',[DesainController::class, 'index']);
    Route::post('desain/submit',[DesainController::class, 'submit']);

    // Route Peliputan
    Route::get('liputan',[PermohonanPeliputanController::class, 'index']);
    Route::post('liputan/submit',[PermohonanPeliputanController::class, 'submit']);

    // Route Pas Foto
    Route::get('pas-foto',[PermohonanPasFotoController::class, 'index']);
    Route::post('pas-foto/submit',[PermohonanPasFotoController::class, 'submit']);

    // Route editing Foto
    Route::get('editing-foto',[PermohonanEditFotoController::class, 'index']);
    Route::post('editing-foto/submit',[PermohonanEditFotoController::class, 'submit']);

     // Route editing Video
     Route::get('editing-video',[PermohonanEditingVideoController::class, 'index']);
     Route::post('editing-video/submit',[PermohonanEditingVideoController::class, 'submit']);

    // Route Publikasi
    Route::get('publikasi',[PermohonanPublikasiController::class, 'index']);
    Route::post('publikasi/submit',[PermohonanPublikasiController::class, 'submit']);
});

// <<<<<< ========== Route Admin ========== >>>>>>
Route::prefix('admin')->group(function(){
    Route::get('', [AdminController::class, 'index']);

    // Route Kelola Akun
    Route::get('kelola-akun', [AkunController::class, 'index']);
    Route::get('kelola_akun/tambah',[AkunController::class, 'tambah']);
    Route::post('kelola_akun/simpan',[AkunController::class, 'simpan']);

    // Ruote kelola peliputan
    Route::get('peliputan', [PeliputanController::class, 'index']);
    Route::get('Peliputan/arsip', [PeliputanController::class, 'arsip']);
    Route::get('peliputan/{id}', [PeliputanController::class, 'detail']);
    Route::put('peliputan/pilih-petugas/{id}',[PeliputanController::class,'pilihPetugas']);

    // Ruote kelola video editing
    Route::get('video-editing', [EditingVideoController::class, 'index']);
    Route::get('video-editing/arsip', [EditingVideoController::class, 'arsip']);
    Route::get('video-editing/{id}', [EditingVideoController::class, 'detail']);
    Route::put('video-editing/pilih-petugas/{id}',[EditingVideoController::class,'pilihPetugas']);

    //Route kelola pas foto
    Route::get('pas-foto', [PasFotoController::class, 'index']);
    Route::get('pas-foto/arsip', [PasFotoController::class, 'arsip']);
    Route::get('pas-foto/{id}', [PasFotoController::class, 'detail']);
    Route::get('pas-foto/{id}', [PasFotoController::class, 'detailarsip']);
    Route::put('pas-foto/pilih-petugas/{id}', [PasFotoController::class, 'pilihpetugas']);

    //Route kelola Editing foto
    Route::get('edit-foto', [EditFotoController::class, 'index']);
    Route::get('edit-foto/arsip', [EditFotoController::class, 'arsip']);
    Route::get('edit-foto/{id}', [EditFotoController::class, 'detail']);
    Route::get('edit-foto/{id}', [EditFotoController::class, 'detailarsip']);
    Route::put('edit-foto/pilih-petugas/{id}', [EditFotoController::class, 'pilihPetugas']);

    // Ruote kelola desain
    Route::get('desain', [DesainControllert::class, 'index'])->name('kembali');
    Route::get('desain/detail/{id}', [DesainControllert::class, 'detail']);
    Route::get('desain/arsip', [DesainControllert::class, 'arsip']);
    Route::get('desain/detail-arsip/{id}', [DesainControllert::class, 'detailArsip']);
    Route::get('desain/proses', [DesainControllert::class, 'proses']);
    Route::put('desain/pilih-petugas/{id}',[DesainControllert::class,'pilihPetugas']);
    Route::put('desain/tolak/{id}',[DesainControllert::class,'tolakPermohonan']);

    // Ruote kelola publikasi
    Route::get('publikasi', [PublikasiController::class, 'index']);
    Route::get('publikasi/detail/{id}', [PublikasiController::class, 'detail']);
    Route::get('publikasi/arsip', [PublikasiController::class, 'arsip']);
    Route::get('publikasi/detail-arsip/{id}', [PublikasiController::class, 'detailArsip']);
    Route::put('publikasi/pilih-petugas/{id}', [PublikasiController::class, 'pilihPetugas']);
    Route::get('publikasi/proses', [PublikasiController::class, 'proses']);
    Route::get('publikasi/detail-proses/{id}', [PublikasiController::class, 'detailProses']);

});

Route::prefix('petugas')->group(function(){

    Route::get('', [PetugasController::class, 'index']);

    // Route Kelola Tugas
    Route::get('tugas', [TugasController::class, 'index']);

    Route::get('tugas/publikasi/detail-tugas/{id}', [TugasPublikasiController::class, 'detailTugas']);
    Route::get('tugas/publikasi/submit/{id}', [TugasPublikasiController::class, 'submitTugas']);

    Route::get('tugas/desain/detail-tugas/{id}', [TugasDesainController::class, 'detailTugas']);
    Route::get('tugas/desain/submit/{id}', [TugasDesainController::class, 'submitTugas']);

    // Route Kelola Asip Tugas
    Route::get('arsip-tugas', [ArsipTugasController::class, 'index']);

});

