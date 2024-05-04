<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\PeliputanController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\VideoEditingController;
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
use App\Http\Controllers\Pelanggan\permohonan\PermohonanPublikasiController;

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

    // Route Publikasi
    Route::get('publikasi',[PermohonanPublikasiController::class, 'index']);
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

    // Ruote kelola publikasi
    Route::get('publikasi', [PublikasiController::class, 'index']);

    // Ruote kelola video editing
    Route::get('video-editing', [VideoEditingController::class, 'index']);

    //Route kelola pas foto
    Route::get('pas-foto', [PasFotoController::class, 'index']);
    Route::get('pas-foto/arsip', [PasFotoController::class, 'arsip']);
    Route::get('pas-foto/{id}', [PasFotoController::class, 'detail']);
    Route::get('pas-foto/pilih-petugas/{id}', [PasFotoController::class, 'detail']);

    //Route kelola Editing foto
    Route::get('edit-foto', [EditFotoController::class, 'index']);
    Route::get('edit-foto/arsip', [EditFotoController::class, 'arsip']);
    Route::get('edit-foto/{id}', [EditFotoController::class, 'detail']);
    Route::get('edit-foto/pilih-petugas/{id}', [EditFotoController::class, 'detail']);

    // Ruote kelola desain
    Route::get('desain', [DesainControllert::class, 'index']);
    Route::get('desain/arsip', [DesainControllert::class, 'arsip']);
    Route::get('desain/{id}', [DesainControllert::class, 'detail']);
    Route::put('desain/pilih-petugas/{id}',[DesainControllert::class,'pilihPetugas']);
});

Route::prefix('petugas')->group(function(){

    Route::get('', [PetugasController::class, 'index']);

    // Route Kelola Tugas
    Route::get('tugas', [TugasController::class, 'index']);

    // Route Kelola Asip Tugas
    Route::get('arsip-tugas', [ArsipTugasController::class, 'index']);
});
