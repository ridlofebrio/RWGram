<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PersuratanController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\Auth\AuthSessionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('bansos', BansosController::class); //-> jo
Route::group(['prefix' => 'bansos-penduduk'], function () {
    Route::post('/show', [BansosController::class, 'showPenduduk'])->name('bansos.penduduk.show');
    Route::get('/request', [BansosController::class, 'request'])->name('bansos.penduduk.request');
    Route::get('/create', [BansosController::class, 'create'])->name('bansos.penduduk.create');
});

Route::resource('informasi', InformasiController::class); //-> jo
Route::group(['prefix' => 'informasi-penduduk'], function () {
    Route::post('/show', [InformasiController::class, 'showPenduduk'])->name('informasi.penduduk.show');
    Route::get('/index', [InformasiController::class, 'indexPenduduk'])->name('informasi.penduduk.index');
});

Route::resource('penduduk', PendudukController::class); //-> krisna
Route::group(['prefix' => 'data-penduduk'], function () {
    Route::post('/show', [PendudukController::class, 'showPenduduk'])->name('data.penduduk.show');
    Route::get('/request', [PendudukController::class, 'request'])->name('data.penduduk.request');
});

Route::resource('kas', KasController::class)->middleware('auth'); //-> krisna
Route::resource('umkm', UmkmController::class); //-> febrio
Route::resource('persuratan', PersuratanController::class); //->albian
Route::resource('laporan', LaporanController::class); //-> albian   
Route::group(['prefix' => 'pengaduan'], function () {
    Route::get('/', [LaporanController::class, 'indexPenduduk'])->name('laporan.penduduk.index');
});


Route::get('coba', [PendudukController::class, 'list']);

Route::get('login', [AuthSessionController::class, 'create'])->name('login');
Route::post('login', [AuthSessionController::class, 'store']);
Route::get('logout', [AuthSessionController::class, 'logout']);


Route::get('/dashboard', function () {
    return view("dashboard");
});
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/pengajuan', [UmkmController::class, 'index'])->name('laporan.penduduk.index');
    Route::get('/pengaduan', [LaporanController::class, 'keluhan']);
    Route::get('/penduduk', [PendudukController::class, 'index']);
    Route::get('/', function () {
        return view('dashboard', ['active' => 'beranda']);
    });

});
