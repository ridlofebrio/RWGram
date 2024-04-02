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



Route::resource('bansos', BansosController::class); //-> jo
Route::resource('kas', KasController::class); //-> krisna
Route::resource('umkm', UmkmController::class); //-> febrio
Route::resource('penduduk', PendudukController::class); //-> krisna
Route::resource('persuratan', PersuratanController::class); //->albian
Route::resource('laporan', LaporanController::class); //-> albian
Route::resource('informasi', InformasiController::class); //-> jo

