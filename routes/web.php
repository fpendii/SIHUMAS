<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\PeliputanController;
use App\Http\Controllers\Admin\EditingVideoController;
use App\Http\Controllers\Redaktur\RedakturController;
use App\Http\Controllers\Redaktur\PeriksaPublikasiController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PublikasiController;
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
use App\Http\Controllers\Pegawai\TugasPeliputanController;
use App\Http\Controllers\Pegawai\TugasEditingVideoController;
use App\Http\Controllers\Pegawai\TugasEditFotoController;
use App\Http\Controllers\Pegawai\TugasPasFotoController;
use App\Http\Controllers\pelanggan\permohonan\PermohonanDesainController;
use App\Http\Controllers\Koordinator\KoordinatorController;
use App\Http\Controllers\Koordinator\laporan\LaporanController;
use App\Http\Controllers\Koordinator\KoorPeliputanController;
use App\Http\Controllers\Koordinator\KoorEditingVideoController;
use App\Http\Controllers\SendEmail\TesEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/store', [AuthController::class, 'store']);

// Registrasi
Route::get('registrasi', [AuthController::class, 'registrasi']);
Route::post('registrasi', [AuthController::class, 'registerProses']);
Route::get('email/verify', function () {
    return view('pages.auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');




Route::get('lupa-password', [AuthController::class, 'lupaPassword']);
Route::get('logout', [AuthController::class, 'logout']);


// Route Landing Page
Route::get('', [LandingPageController::class, 'home']);
Route::get('home', [LandingPageController::class, 'home']);
Route::get('tentang-kami', [LandingPageController::class, 'tentangKami']);
Route::get('layanan', [LandingPageController::class, 'layanan']);

// Route Pelanggan
Route::prefix('jasa')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [PermohonanController::class, 'index']);

    // Route Desain
    Route::get('desain', [PermohonanDesainController::class, 'index']);
    Route::post('desain/submit', [PermohonanDesainController::class, 'submit']);

    // Route Peliputan
    Route::get('liputan', [PermohonanPeliputanController::class, 'index']);
    Route::post('liputan/submit', [PermohonanPeliputanController::class, 'submit']);

    // Route Pas Foto
    Route::get('pas-foto', [PermohonanPasFotoController::class, 'index']);
    Route::post('pas-foto/submit', [PermohonanPasFotoController::class, 'submit']);

    // Route editing Foto
    Route::get('editing-foto', [PermohonanEditFotoController::class, 'index']);
    Route::post('editing-foto/submit', [PermohonanEditFotoController::class, 'submit']);

    // Route editing Video
    Route::get('editing-video', [PermohonanEditingVideoController::class, 'index']);
    Route::post('editing-video/submit', [PermohonanEditingVideoController::class, 'submit']);

    // Route Publikasi
    Route::get('publikasi', [PermohonanPublikasiController::class, 'index']);
    Route::post('publikasi/submit', [PermohonanPublikasiController::class, 'submit']);
});

// <<<<<< ========== Route Admin ========== >>>>>>
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {

    // Halaman Dashboard Admin
    Route::get('', [AdminController::class, 'index'])->name('admin');

    // Route Kelola Akun
    Route::get('kelola-akun', [AkunController::class, 'index']);
    Route::get('kelola-akun/tambah', [AkunController::class, 'tambah']);
    Route::post('kelola-akun/simpan', [AkunController::class, 'simpan']);
    Route::get('kelola-akun/edit/{id}', [AkunController::class, 'edit']);
    Route::put('kelola-akun/update/{id}', [AkunController::class, 'update']);

    // Ruote kelola peliputan
    Route::get('peliputan', [PeliputanController::class, 'index']);
    Route::get('peliputan/detail/{id}', [PeliputanController::class, 'detail']);
    Route::get('peliputan/arsip', [PeliputanController::class, 'arsip']);
    Route::get('peliputan/detail-arsip/{id}', [PeliputanController::class, 'detailArsip']);
    Route::get('peliputan/proses', [PeliputanController::class, 'proses']);
    Route::get('peliputan/detail-proses/{id}', [PeliputanController::class, 'detailProses']);
    Route::put('peliputan/pilih-petugas/{id}', [PeliputanController::class, 'pilihPetugas']);
    Route::put('peliputan/tolak/{id}', [PeliputanController::class, 'tolakPermohonan']);

    // Ruote kelola editing video
    Route::get('editing-video', [EditingVideoController::class, 'index']);
    Route::get('editing-video/detail/{id}', [EditingVideoController::class, 'detail']);
    Route::get('editing-video/arsip', [EditingVideoController::class, 'arsip']);
    Route::get('editing-video/detail-arsip/{id}', [EditingVideoController::class, 'detailArsip']);
    Route::get('editing-video/proses', [EditingVideoController::class, 'proses']);
    Route::get('editing-video/detail-proses/{id}', [EditingVideoController::class, 'detailProses']);
    Route::put('editing-video/pilih-petugas/{id}', [EditingVideoController::class, 'pilihPetugas']);
    Route::put('editing-video/tolak/{id}', [EditingVideoController::class, 'tolakPermohonan']);

    Route::get('desain', [DesainControllert::class, 'index']);
    Route::get('desain/detail/{id}', [DesainControllert::class, 'detail']);
    Route::get('desain/arsip', [DesainControllert::class, 'arsip']);
    Route::get('desain/detail-arsip/{id}', [DesainControllert::class, 'detailArsip']);
    Route::get('desain/proses', [DesainControllert::class, 'proses']);
    Route::get('desain/detail-proses/{id}', [DesainControllert::class, 'detailProses']);
    Route::put('desain/pilih-petugas/{id}', [DesainControllert::class, 'pilihPetugas']);
    Route::put('desain/tolak/{id}', [DesainControllert::class, 'tolakPermohonan']);

    // Route Kelola Pas Foto
    Route::get('pas-foto', [PasFotoController::class, 'index']);
    Route::get('pas-foto/detail/{id}', [PasFotoController::class, 'detail']);
    Route::get('pas-foto/arsip', [PasFotoController::class, 'arsip']);
    Route::get('pas-foto/detail-arsip/{id}', [PasFotoController::class, 'detailArsip']);
    Route::get('pas-foto/proses', [PasFotoController::class, 'proses']);
    Route::get('pas-foto/detail-proses/{id}', [PasFotoController::class, 'detailProses']);
    Route::put('pas-foto/pilih-petugas/{id}', [PasFotoController::class, 'pilihPetugas']);
    Route::put('pas-foto/tolak/{id}', [PasFotoController::class, 'tolakPermohonan']);

    // Route Kelola Editing Foto
    Route::get('edit-foto', [EditFotoController::class, 'index']);
    Route::get('edit-foto/detail/{id}', [EditFotoController::class, 'detail']);
    Route::get('edit-foto/arsip', [EditFotoController::class, 'arsip']);
    Route::get('edit-foto/detail-arsip/{id}', [EditFotoController::class, 'detailArsip']);
    Route::get('edit-foto/proses', [EditFotoController::class, 'proses']);
    Route::get('edit-foto/detail-proses/{id}', [EditFotoController::class, 'detailProses']);
    Route::put('edit-foto/pilih-petugas/{id}', [EditFotoController::class, 'pilihPetugas']);
    Route::put('edit-foto/tolak/{id}', [EditFotoController::class, 'tolakPermohonan']);

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

// Route Redaktur
Route::prefix('redaktur')->middleware(['auth', 'verified'])->group(function () {

    Route::get('', [RedakturController::class, 'index']);

    // Route periksa
    Route::get('periksa_publikasi', [PeriksaPublikasiController::class, 'index']);
    Route::get('periksa/publikasi/detail-tugas/{id}', [PeriksaPublikasiController::class, 'detailTugas'])->name('detail-tugas');
    Route::post('periksa/publikasi/detail-tugas/submit/{id}', [PeriksaPublikasiController::class, 'submitPemeriksaan']);
});

Route::prefix('petugas')->middleware(['auth', 'verified'])->group(function () {

    Route::get('', [PetugasController::class, 'index']);

    // Route Kelola Tugas
    Route::get('tugas', [TugasController::class, 'index']);

    Route::get('tugas/publikasi/detail-tugas/{id}', [TugasPublikasiController::class, 'detailTugas']);
    Route::get('tugas/publikasi/submit/{id}', [TugasPublikasiController::class, 'submitTugas']);

    Route::get('tugas/desain/detail-tugas/{id}', [TugasDesainController::class, 'detailTugas']);
    Route::get('tugas/desain/submit/{id}', [TugasDesainController::class, 'submitTugas']);

    Route::get('tugas/peliputan/detail-tugas/{id}', [TugasPeliputanController::class, 'detailTugas']);
    Route::get('tugas/peliputan/submit/{id}', [TugasPeliputanController::class, 'submitTugas']);

    Route::get('tugas/edit_foto/detail-tugas/{id}', [TugasEditFotoController::class, 'detailTugas']);
    Route::post('tugas/edit-foto/submit/{id}', [TugasEditFotoController::class, 'submitTugas']);

    Route::get('tugas/pas_foto/detail-tugas/{id}', [TugasPasFotoController::class, 'detailTugas']);
    Route::post('tugas/pas-foto/submit/{id}', [TugasPasFotoController::class, 'submitTugas']);

    Route::get('tugas/editing-video/detail-tugas/{id}', [TugasEditingVideoController::class, 'detailTugas']);
    Route::post('tugas/editing-video/submit/{id}', [TugasEditingVideoController::class, 'submitTugas']);

    // Route Kelola Asip Tugas
    Route::get('arsip-tugas', [ArsipTugasController::class, 'index']);
});
// Route Koordinator
Route::prefix('koordinator')->middleware(['auth', 'verified'])->group(function () {

    Route::get('', [KoordinatorController::class, 'index']);

    // Route Kelola Peliputan
    Route::get('peliputan', [KoorPeliputanController::class, 'index']);
    Route::get('peliputan/detail_peliputan/{id}', [KoorPeliputanController::class, 'detail']);
    Route::get('peliputan/arsip_peliputan', [KoorPeliputanController::class, 'arsip']);
    Route::get('peliputan/detail-arsip-peliputan/{id}', [KoorPeliputanController::class, 'detailArsip']);
    Route::get('peliputan/proses_peliputan', [KoorPeliputanController::class, 'proses']);
    Route::get('peliputan/detail-proses_liputan/{id}', [KoorPeliputanController::class, 'detailProses']);

    Route::get('laporan-bulanan', [LaporanController::class, 'index']);

    Route::get('/koordinator/laporan/cetak-pdf', [App\Http\Controllers\Koordinator\Laporan\LaporanController::class, 'cetakPDF'])->name('koordinator.laporan.cetakPDF');

    // Ruote kelola editing video
    Route::get('editing-video', [KoorEditingVideoController::class, 'index']);
    Route::get('editing-video/detail_editing_video/{id}', [koorEditingVideoController::class, 'detail']);
    Route::get('editing-video/arsip', [KoorEditingVideoController::class, 'arsip']);
    Route::get('editing-video/detail-arsip-editing-video/{id}', [KoorEditingVideoController::class, 'detailArsip']);
    Route::get('editing-video/proses', [KoorEditingVideoController::class, 'proses']);
    Route::get('editing-video/detail-proses_editing_video/{id}', [KoorEditingVideoController::class, 'detailProses']);
});
