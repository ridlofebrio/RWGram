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
    return view('layouts.template');
});

Route::resource('bansos', BansosController::class); //-> jo
Route::group(['prefix' => 'bansos-penduduk'], function () {
    Route::post('/show', [BansosController::class, 'showPenduduk'])->name('bansos.penduduk.show');
    Route::get('/request', [BansosController::class, 'request'])->name('bansos.penduduk.request');
});

Route::resource('informasi', InformasiController::class); //-> jo
Route::group(['prefix' => 'informasi-penduduk'], function () {
    Route::post('/show', [InformasiController::class, 'showPenduduk'])->name('informasi.penduduk.show');
    Route::get('/index', [InformasiController::class, 'indexPenduduk'])->name('informasi.penduduk.index');
});

Route::resource('kas', KasController::class)->middleware('auth'); //-> krisna
Route::resource('umkm', UmkmController::class); //-> febrio
Route::resource('penduduk', PendudukController::class); //-> krisna
Route::resource('persuratan', PersuratanController::class); //->albian
Route::resource('laporan', LaporanController::class); //-> albian   


Route::get('login', [AuthSessionController::class, 'create'])->name('login');
Route::post('login', [AuthSessionController::class, 'store']);
