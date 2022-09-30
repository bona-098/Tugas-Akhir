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
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;


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

//user
Route::get('/', function () {
    return view('user.home');
});
Route::get('/user-pendaftaran', [PendaftaranController::class, 'index']);
// Route::post('/daftar', [AnggotaController::class, 'store'])->name('anggota.store');
Route::post('/user-storeservice', [ServiceController::class, 'userstore'])->name('userservicestore');
Route::get('/user-pengumuman', [PengumumanController::class, 'user']);
Route::get('/user-pengumumandetail/{showpengumuman}', [PengumumanController::class, 'showpengumuman'])->name('pengumuman');
Route::get('/user-proker', [ProgramkerjaController::class, 'user']);
Route::get('/user-dokumentasi', [DokumentasiController::class, 'user']);
Route::get('/user-dokumentasidetail/{showdokumentasi}', [DokumentasiController::class, 'showuser'])->name('showdokumentasi');
Route::get('/user-prestasi', [PrestasiController::class, 'user']);
Route::get('/user-prestasidetail/{showprestasi}', [PrestasiController::class, 'showuser'])->name('showprestasi');
Route::resource('/anggota', (AnggotaController::class));
//harus login
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/profil', ProfilController::class);
    Route::get('/user-service', [ServiceController::class, 'usercreate']);
    //role su, admin, teknisi
    Route::group(['middleware' => 'checkRole:su,admin,teknisi'], function () {
        Route::resource('/teknisi', TeknisiController::class);
        Route::resource('/service', (ServiceController::class));
        Route::get('/admin-home', function () {
            return view('admin.home');
        });
    });
    //role
    Route::group(['middleware' => 'checkRole:su, admin'], function () {
        Route::resource('/divisi', DivisiController::class);
        Route::resource('/proker', ProgramkerjaController::class);
        Route::resource('/dokumentasi', (DokumentasiController::class));
        Route::resource('/pengumuman', (PengumumanController::class));
        Route::resource('/prestasi', (PrestasiController::class));
        Route::resource('/kepengurusan', KepengurusanController::class);
        Route::resource('/kelola', UserController::class);
    });
});
require __DIR__.'/auth.php';