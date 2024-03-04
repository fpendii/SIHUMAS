<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\DesainControllert;
use App\Http\Controllers\Admin\PeliputanController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\VideoEditingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LupaPassword;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginController::class, 'index']);
Route::get('login',[LoginController::class, 'index']);
Route::get('registrasi',[RegistrasiController::class, 'index']);
Route::get('lupa-password',[LupaPassword::class, 'index']);
Route::get('logout',[LogoutController::class, 'index']);




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

    // Ruote kelola desain
    Route::get('desain', [DesainControllert::class, 'index']);

});
