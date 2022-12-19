<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\ProgramkerjaController;
use App\Http\Controllers\KepengurusanController;
// use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/user-pengumuman', [PengumumanController::class, 'user']);
Route::get('/user-pengumumandetail/{showpengumuman}', [PengumumanController::class, 'showuser'])->name('showpengumuman');
Route::get('/user-dokumentasi', [DokumentasiController::class, 'user']);
Route::get('/user-dokumentasidetail/{showdokumentasi}', [DokumentasiController::class, 'showuser'])->name('showdokumentasi');
Route::get('/user-prestasi', [PrestasiController::class, 'user']);
Route::get('/user-prestasidetail/{showprestasi}', [PrestasiController::class, 'showuser'])->name('showprestasi');
Route::get('/change-status/{id}',[ServiceController::class,'changeStatus']);
Route::get('/status/{id}',[ProgramkerjaController::class,'status']);
Route::get('/', [HomeController::class, 'landingpage']);

//harus login
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/profil', ProfilController::class);
    // Route::resource('/user-service', ServiceController::class);
    Route::get('/user-service', [ServiceController::class, 'create'])->name('service');
    Route::post('/user-service', [ServiceController::class, 'store'])->name('serviceuser.store');
    Route::get('/user-pendaftaran', [AnggotaController::class, 'create']);
    Route::post('/user-pendaftaran', [AnggotaController::class, 'store'])->name('anggota');
    //role su, admin, teknisi
    Route::group(['middleware' => 'checkRole:su,admin,teknisi'], function () {
        Route::resource('/service', ServiceController::class);
        Route::resource('/teknisi', TeknisiController::class);
        Route::resource('/home', HomeController::class);
        Route::get('/riwayat', [ServiceController::class, 'riwayat'])->name('riwayat');
        Route::post('/riwayat', [ServiceController::class, 'riwayat']);
    });
    //role
    Route::group(['middleware' => 'checkRole:su,admin'], function () {
        Route::resource('/divisi', DivisiController::class);
        Route::resource('/proker', ProgramkerjaController::class);
        Route::resource('/dokumentasi', DokumentasiController::class);
        Route::resource('/pengumuman', PengumumanController::class);
        Route::resource('/prestasi', PrestasiController::class);
        Route::resource('/kepengurusan', KepengurusanController::class);
        Route::resource('/kelola', UserController::class);
        Route::resource('/pendaftaran', AnggotaController::class);
        Route::get('/wawancara', [AnggotaController::class, 'wawancara'])->name('wawancara');
        Route::post('/wawancara/{wawancari}', [AnggotaController::class, 'wawancari'])->name('wawancari');
        Route::post('/wawancara-3/{anggoti}', [AnggotaController::class, 'anggoti'])->name('anggoti');
        Route::post('/wawancari-2/{wawancari}', [AnggotaController::class, 'wawancari'])->name('gagal');
        Route::get('/pendaftaran', [AnggotaController::class, 'berkas'])->name('berkas');
        Route::resource('/anggota', AnggotaController::class);
        route::get('/monitoring', [ProgramkerjaController::class, 'monitoring'])->name('monitoring');
        route::get('/riwayatkerja', [ProgramkerjaController::class, 'riwayatkerja'])->name('riwayatkerja');
        route::patch('/proker/{id}/Update', [ProgramkerjaController::class, 'update'])->name('proker');
    });
});
require __DIR__.'/auth.php';