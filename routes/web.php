<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PersuratanController;
use App\Http\Controllers\UmkmController;
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


Route::resource('bansos', BansosController::class);
Route::resource('kas', KasController::class);
Route::resource('umkm', UmkmController::class);
Route::resource('penduduk', PendudukController::class);
Route::resource('persuratan', PersuratanController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('informasi', InformasiController::class);

