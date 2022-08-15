<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AdmindaftarController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PendaftaranController;


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

Route::get('/user-anggota', function () {
    return view('user.anggota');
});
Route::get('/user-pengurus', function () {
    return view('user.pengurus');
});

Route::get('user-proker', function () {
    return view('user.proker.proker');
});

Route::get('admin-hrd', function () {
    return view('admin.proker.hrd');
});

Route::get('/admin-home', function () {
    return view('admin.home');
});

Route::get('/admin-pengurus', function () {
    return view('admin.pengurus');
});

Route::get('/admin-proker', function () {
    return view('admin.proker');
});

Route::get('/admin-teknisi', function () {
    return view('admin.teknisi.index');
});

Route::get('/user-pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/daftar', [AnggotaController::class, 'store'])->name('anggota.store');
Route::resource('/admin-anggota', (AnggotaController::class));

//prestasi

Route::post('/user-storeservice', [ServiceController::class, 'userstore'])->name('userservicestore');
Route::resource('/admin-service', (ServiceController::class));


Route::get('/user-pengumuman', [PengumumanController::class, 'user']);
Route::get('/user-pengumumandetail/{showpengumuman}', [PengumumanController::class, 'showpengumuman'])->name('pengumuman');
Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::resource('/admin-pengumuman', (PengumumanController::class));

Route::get('/user-dokumentasi', [DokumentasiController::class, 'user']);
Route::get('/user-dokumentasidetail/{showdokumentasi}', [PrestasiController::class, 'showuser'])->name('showdokumentasi');
Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');

//tanpa login
//route prestasi
Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
Route::get('/user-prestasi', [PrestasiController::class, 'user']);
Route::get('/user-prestasidetail/{showprestasi}', [PrestasiController::class, 'showuser'])->name('showprestasi');

//harus login
Route::group(['middleware' => 'auth'], function () {
    
    //role
    Route::group(['middleware' => 'checkRole:su, admin, teknisi, user'], function () {
        Route::get('/home', function(){
            return view('admin.dashboard');
        });
        Route::resource('/admin-prestasi', (PrestasiController::class));
        
    });
    //route service
    Route::get('/user-service', [ServiceController::class, 'usercreate']);
    
    //role
    Route::group(['middleware' => 'checkRole:su, admin'], function () {
        Route::get('/home', function(){
            return view('admin.dashboard');
        });
        //prestasi
        Route::resource('/admin-prestasi', (PrestasiController::class));
        //dokumentasi
        Route::resource('/admin-dokumentasi', (DokumentasiController::class));
    });
    //role
});



require __DIR__.'/auth.php';
