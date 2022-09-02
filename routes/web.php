<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\KepengurusanController;
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

Route::get('admin-hrd', function () {
    return view('admin.proker.hrd');
});

Route::get('tes', function () {
    return view('test');
});

Route::get('/admin-home', function () {
    return view('admin.home');
});

Route::get('/user-proker', function () {
    return view('user.proker.hrd');
});

Route::get('/user-pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/daftar', [AnggotaController::class, 'store'])->name('anggota.store');
Route::resource('/anggota', (AnggotaController::class));

//prestasi

Route::post('/user-storeservice', [ServiceController::class, 'userstore'])->name('userservicestore');
Route::resource('/service', (ServiceController::class));

//pengumuman
Route::get('/user-pengumuman', [PengumumanController::class, 'user']);
Route::get('/user-pengumumandetail/{showpengumuman}', [PengumumanController::class, 'showpengumuman'])->name('pengumuman');

//dkumentasi
Route::get('/user-dokumentasi', [DokumentasiController::class, 'user']);
Route::get('/user-dokumentasidetail/{showdokumentasi}', [DokumentasiController::class, 'showuser'])->name('showdokumentasi');
// Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');

//teknisi
Route::resource('/teknisi', TeknisiController::class);

Route::resource('/kepengurusan', KepengurusanController::class);

//tanpa login
//route prestasi
Route::get('/user-prestasi', [PrestasiController::class, 'user']);
Route::get('/user-prestasidetail/{showprestasi}', [PrestasiController::class, 'showuser'])->name('showprestasi');

//harus login
Route::group(['middleware' => 'auth'], function () {
    
    //role su, admin, teknisi
    Route::group(['middleware' => 'checkRole:su, admin, teknisi'], function () {
        Route::get('/home', function(){
            return view('admin.dashboard');
        });        
    });
    //route service
    Route::get('/user-service', [ServiceController::class, 'usercreate']);
    
    //role
    Route::group(['middleware' => 'checkRole:su, admin'], function () {
        Route::get('/home', function(){
            return view('admin.dashboard');
        });
        //prestasi
        Route::resource('/prestasi', (PrestasiController::class));
        // Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
        //dokumentasi
        Route::resource('/dokumentasi', (DokumentasiController::class));
        //pengumuman
        // Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::resource('/pengumuman', (PengumumanController::class));
    });
    //role
});



require __DIR__.'/auth.php';
