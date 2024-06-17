<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\PeliputanController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\EditingVideoController;
use App\Http\Controllers\Pegawai\ArsipTugasController;
use App\Http\Controllers\Pegawai\PetugasController;
use App\Http\Controllers\Pegawai\TugasController;
use App\Http\Controllers\pelanggan\permohonan\PermohonanDesainControllerDesainController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\Pelanggan\PermohonanController;
use App\Http\Controllers\pelanggan\permohonan\desain;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DesainControllert;
use App\Http\Controllers\Admin\PasFotoController;
use App\Http\Controllers\Admin\EditFotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPublikasiController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPasFotoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanEditFotoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanEditingVideoController;
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPeliputanController;
use App\Http\Controllers\Pegawai\TugasPublikasiController;
use App\Http\Controllers\Pegawai\TugasDesainController;
use App\Http\Controllers\pelanggan\permohonan\PermohonanDesainController;

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


    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login/store',[AuthController::class, 'store']);

    Route::get('registrasi',[AuthController::class, 'regitrasi']);
    Route::post('registrasi',[AuthController::class, 'create']);


    Route::get('lupa-password',[AuthController::class, 'lupaPassword']);
    Route::get('logout',[AuthController::class, 'logout']);



// Route Landing Page
Route::get('',[LandingPageController::class, 'home']);
Route::get('home',[LandingPageController::class, 'home']);
Route::get('tentang-kami',[LandingPageController::class, 'tentangKami']);
Route::get('layanan',[LandingPageController::class, 'layanan']);

// Route Pelanggan
Route::prefix('jasa')->middleware('auth')->group(function(){
    Route::get('',[PermohonanController::class, 'index']);

    // Route Desain
    Route::get('desain',[PermohonanDesainController::class, 'index']);
    Route::post('desain/submit',[PermohonanDesainController::class, 'submit']);

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
Route::prefix('admin')->middleware('admin')->group(function () {

    // Halaman Dashboard Admin
    Route::get('', [AdminController::class, 'index'])->name('admin');

    // Route Kelola Akun
    Route::get('kelola-akun', [AkunController::class, 'index']);
    Route::get('kelola-akun/tambah', [AkunController::class, 'tambah']);
    Route::post('kelola-akun/simpan', [AkunController::class, 'simpan']);

    // Route Kelola Peliputan
    Route::get('peliputan', [PeliputanController::class, 'index']);
    Route::get('peliputan/arsip', [PeliputanController::class, 'arsip']);
    Route::get('peliputan/{id}', [PeliputanController::class, 'detail']);
    Route::put('peliputan/pilih-petugas/{id}', [PeliputanController::class, 'pilihPetugas']);

    // Route Kelola Video Editing
    Route::get('video-editing', [EditingVideoController::class, 'index']);
    Route::get('video-editing/arsip', [EditingVideoController::class, 'arsip']);
    Route::get('video-editing/{id}', [EditingVideoController::class, 'detail']);
    Route::put('video-editing/pilih-petugas/{id}', [EditingVideoController::class, 'pilihPetugas']);

    // Route Kelola Pas Foto
    Route::get('pas-foto', [PasFotoController::class, 'index']);
    Route::get('pas-foto/arsip', [PasFotoController::class, 'arsip']);
    Route::get('pas-foto/detail-arsip/{id}', [PasFotoController::class, 'detailArsip']);
    Route::get('pas-foto/detail/{id}', [PasFotoController::class, 'detail']);
    Route::put('pas-foto/pilih-petugas/{id}', [PasFotoController::class, 'pilihPetugas']);
    Route::put('pas-foto/tolak/{id}', [PasFotoController::class, 'tolakPermohonan']);

    // Route Kelola Editing Foto
    Route::get('edit-foto', [EditFotoController::class, 'index']);
    Route::get('edit-foto/arsip', [EditFotoController::class, 'arsip']);
    Route::get('edit-foto/{id}', [EditFotoController::class, 'detail']);
    Route::put('edit-foto/pilih-petugas/{id}', [EditFotoController::class, 'pilihPetugas']);

    // Route Kelola Desain
    Route::get('desain', [DesainControllert::class, 'index']);
    Route::get('desain/detail/{id}', [DesainControllert::class, 'detail']);
    Route::get('desain/arsip', [DesainControllert::class, 'arsip']);
    Route::get('desain/detail-arsip/{id}', [DesainControllert::class, 'detailArsip']);
    Route::get('desain/proses', [DesainControllert::class, 'proses']);
    Route::get('desain/detail-proses/{id}', [DesainControllert::class, 'detailProses']);
    Route::put('desain/pilih-petugas/{id}', [DesainControllert::class, 'pilihPetugas']);
    Route::put('desain/tolak/{id}', [DesainControllert::class, 'tolakPermohonan']);

    // Route Kelola Publikasi
    Route::get('publikasi', [PublikasiController::class, 'index']);
    Route::get('publikasi/detail/{id}', [PublikasiController::class, 'detail']);
    Route::get('publikasi/arsip', [PublikasiController::class, 'arsip']);
    Route::get('publikasi/detail-arsip/{id}', [PublikasiController::class, 'detailArsip']);
    Route::put('publikasi/pilih-petugas/{id}', [PublikasiController::class, 'pilihPetugas']);
    Route::get('publikasi/proses', [PublikasiController::class, 'proses']);
    Route::get('publikasi/detail-proses/{id}', [PublikasiController::class, 'detailProses']);

});



Route::prefix('petugas')->middleware('petugas')->group(function(){

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

