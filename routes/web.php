<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\CloudinaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PersuratanController;
use App\Http\Controllers\StatusHidupController;
use App\Http\Controllers\StatusNikahController;
use App\Http\Controllers\StatusTinggalController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PDFBansosController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LandingController::class, 'index'])->name('/');
Route::get('tim', [LandingController::class, 'indexTim'])->name('tim');

Route::group(['prefix' => 'bansos-penduduk'], function () {
    Route::post('/show', [BansosController::class, 'showPenduduk'])->name('bansos.penduduk.show');
    Route::get('/request', [BansosController::class, 'request'])->name('bansos.penduduk.request');
    Route::get('/create', [BansosController::class, 'create'])->name('bansos.penduduk.create');
    Route::post('/store', [BansosController::class, 'store'])->name('bansos.penduduk.store');
});

Route::group(['prefix' => 'informasi-penduduk'], function () {
    Route::get('/show/{id}', [InformasiController::class, 'showPenduduk'])->name('informasi.penduduk.show');
    Route::get('/index', [InformasiController::class, 'indexPenduduk'])->name('informasi.penduduk.index');
    Route::get('/search', [InformasiController::class, 'search'])->name('informasi.penduduk.search');
});

Route::group(['prefix' => 'data-penduduk'], function () {
    Route::post('/show', [PendudukController::class, 'showPenduduk'])->name('data.penduduk.show');
    Route::get('/request', [PendudukController::class, 'request'])->name('data.penduduk.request');
});

Route::group(['prefix' => 'umkm-penduduk'], function () {
    Route::get('/index', [UmkmController::class, 'indexPenduduk'])->name('umkm.penduduk.index');
    Route::get('/request', [UmkmController::class, 'request'])->name('umkm.penduduk.request');
    Route::get('/create', [UmkmController::class, 'create'])->name('umkm.penduduk.create');
    Route::post('/store', [UmkmController::class, 'store'])->name('umkm.penduduk.store');
});

Route::group(['prefix' => 'nikah-penduduk'], function () {
    Route::get('/', [StatusNikahController::class, 'index'])->name('nikah.penduduk.index');
    Route::get('/create', [StatusNikahController::class, 'create'])->name('nikah.penduduk.create');
    Route::get('/request', [StatusNikahController::class, 'request'])->name('nikah.penduduk.request');
    Route::post('/store', [StatusNikahController::class, 'store'])->name('nikah.penduduk.store');
    Route::get('/find', [StatusNikahController::class, 'indexFind'])->name('nikah.penduduk.find');
});

Route::group(['prefix' => 'hidup-penduduk'], function () {
    Route::get('/', [StatusHidupController::class, 'index'])->name('hidup.penduduk.index');
    Route::get('/create', [StatusHidupController::class, 'create'])->name('hidup.penduduk.create');
    Route::get('/request', [StatusHidupController::class, 'request'])->name('hidup.penduduk.request');
    Route::post('/store', [StatusHidupController::class, 'store'])->name('hidup.penduduk.store');
    Route::get('/find', [StatusHidupController::class, 'indexFind'])->name('hidup.penduduk.find');
});

Route::group(['prefix' => 'tinggal-penduduk'], function () {
    Route::get('/', [StatusTinggalController::class, 'index'])->name('tinggal.penduduk.index');
    Route::get('/create', [StatusTinggalController::class, 'create'])->name('tinggal.penduduk.create');
    Route::post('/store', [StatusTinggalController::class, 'store'])->name('tinggal.penduduk.store');
    Route::get('/request', [StatusTinggalController::class, 'request'])->name('tinggal.penduduk.request');
    Route::get('/find', [StatusTinggalController::class, 'indexFind'])->name('tinggal.penduduk.find');
});

Route::group(['prefix' => 'cloudinary'], function () {
    Route::post('/upload', [CloudinaryController::class, 'upload']);
    Route::get('/delete/{asset_id}', [CloudinaryController::class, 'removeImage']);
});

Route::group(['prefix' => 'pengaduan'], function () {
    Route::get('/', [LaporanController::class, 'indexPenduduk'])->name('laporan.penduduk.index'); 
    Route::get('/filter', [LaporanController::class, 'request'])->name('laporan.penduduk.filter');
    Route::get('/create', [LaporanController::class, 'create'])->name('laporan.penduduk.create');
    Route::post('/create', [LaporanController::class, 'store'])->name('laporan.store');
});

Route::get('login', [AuthSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [AuthSessionController::class, 'store'])->name('proses_login');
Route::get('logout', [AuthSessionController::class, 'logout']);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::group(['middleware' => 'antikt'], function () {
        Route::get('/pengajuan', [UmkmController::class, 'index'])->middleware('RW');

        Route::get('/pengaduan/{sort}', [LaporanController::class, 'keluhan'])->middleware('RW');
        Route::get('/pengaduan', [LaporanController::class, 'keluhan'])->middleware('RW');
        Route::get('/penduduk', [PendudukController::class, 'index']);
        Route::get('/bansos', [BansosController::class, 'index'])->middleware('RW');
        Route::post('/bansos', [BansosController::class, 'normalize'])->middleware('RW')->name('normalize');
        Route::get('/bansos/generate-pdf', [PDFBansosController::class, 'generatePDF'])->middleware('RW')->name('generatePDF');
        Route::get('/generate-detail-pdf', [PDFBansosController::class, 'generateDetailPDF'])->name('generateDetailPDF');
        Route::get('/akun', [UserController::class, 'index'])->middleware('RW');
        Route::get('/persuratan', [PersuratanController::class, 'index'])->middleware('RW');
        Route::get('/kas', [KasController::class, 'index']);
        Route::get('/', [DashboardController::class, 'index']);
    });
    Route::get('/detail-akun', [UserController::class, 'show']);
});

Route::group(['middleware' => 'auth', 'prefix' => 'karangTaruna'], function () {
    Route::get('/', [InformasiController::class, 'dashboard']);
    Route::get('/informasi', [InformasiController::class, 'informasi']);
    Route::get('/pengumuman', [InformasiController::class, 'pengumuman']);
    Route::get('/list', [InformasiController::class, 'getUpload']);
});

Route::post('/penduduk-import', [PendudukController::class, 'import'])->name('import');

Route::group(['prefix' => 'data'], function () {
    Route::get('/umkm/{sort}', [UmkmController::class, 'sort'])->middleware('RW');
    Route::get('/umkm', [UmkmController::class, 'pengajuan']);
    Route::get('/nikah/{sort}', [StatusNikahController::class, 'sort'])->middleware('RW');
    Route::get('/nikah', [StatusNikahController::class, 'pengajuan']);
    Route::get('/tinggal/{sort}', [StatusTinggalController::class, 'sort'])->middleware('RW');
    Route::get('/tinggal', [StatusTinggalController::class, 'pengajuan']);
    Route::get('/meninggal/{sort}', [StatusHidupController::class, 'sort'])->middleware('RW');
    Route::get('/meninggal', [StatusHidupController::class, 'pengajuan']);
    Route::get('/notif', [DashboardController::class, 'notif']);
    Route::get('/notifcount', [DashboardController::class, 'notifcount']);
    Route::get('/pengeluaran', [KasController::class, 'pengeluaran']);
    Route::get('/chart/pengeluaran', [KasController::class, 'pengeluaranChart']);
    Route::get('/pemasukan', [KasController::class, 'index']);
    Route::get('/bansos/{sort}', [BansosController::class, 'sort']);
});

Route::group(['prefix' => 'image'], function () {
    Route::get('/umkm/{id}', [UmkmController::class, 'loadImage']);
});

Route::group(['prefix' => 'search', 'middleware' => 'auth'], function () {
    Route::get('/nikah/{value}', [StatusNikahController::class, 'find']);
    Route::get('/umkm/{value}', [UmkmController::class, 'find']);
    Route::get('/tinggal/{value}', [StatusTinggalController::class, 'find']);
    Route::get('/meninggal/{value}', [StatusHidupController::class, 'find']);
    Route::get('/penduduk/type/{type}/{value}', [PendudukController::class, 'find']);
    Route::get('/pengaduan/{value}', [LaporanController::class, 'find']);
    Route::get('/kas/{value}', [KasController::class, 'find']);
    Route::get('/bansos/{value}', [BansosController::class, 'find']);
    Route::get('/surat/{value}', [PersuratanController::class, 'find']);
});

Route::get('/', [LandingController::class, 'index'])->name('/');
Route::get('tim', [LandingController::class, 'indexTim'])->name('tim');

Route::group(['prefix' => 'akun'], function () {
    Route::delete('{id}', [UserController::class, 'destroy']);
    Route::put('/gambar/{id}', [UserController::class, 'gantiGambar']);
    Route::put('{id}', [UserController::class, 'update']);
});

Route::group(['prefix' => 'persuratan'], function () {
    Route::post('/', [PersuratanController::class, 'store']);
    Route::delete('/{id}', [PersuratanController::class, 'destroy']);
});

Route::group(['prefix' => 'penduduk'], function () {
    Route::post('/', [PendudukController::class, 'store']);
    Route::get('/pdf', [PendudukController::class, 'viewPDF']);
    Route::post('/kepalaKeluarga', [PendudukController::class, 'storeKepala']);
    Route::put('/{id}', [PendudukController::class, 'update']);
    Route::delete('{id}', [PendudukController::class, 'destroy']);
    Route::delete('/kepalaKeluarga/{id}', [PendudukController::class, 'destroyKepala']);
    Route::get('{id}', [PendudukController::class, 'find']);
    Route::get('sort/{sort}', [PendudukController::class, 'sort']);
    Route::get('rt/{id}', [PendudukController::class, 'rt'])->middleware('RW');
});

Route::group(['prefix' => 'informasi'], function () {
    Route::post('/tambahInformasi', [InformasiController::class, 'tambahInformasi'])->name('informasi.tambah.informasi');
    Route::post('/arsip/{id}', [InformasiController::class, 'arsip'])->name('informasi.arsip.informasi');
    Route::delete('{id}', [InformasiController::class, 'destroy'])->middleware('auth');
    Route::post('/', [InformasiController::class, 'store'])->middleware('auth');
});

Route::group(['prefix' => 'kas'], function () {
    Route::post('/', [KasController::class, 'store']);
    Route::get('/pdf', [KasController::class, 'viewPDF']);
    Route::get('/{kk}', [KasController::class, 'detailKas']);
    Route::delete('pengeluaran/{kk}', [KasController::class, 'destroyPengeluaran']);
    Route::post('pengeluaran', [KasController::class, 'storePengeluaran']);
    Route::delete('/{kk}', [KasController::class, 'destroy']);
});

Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->middleware('RW');

Route::group(['prefix' => 'konfirmasi'], function () {
    Route::put('/umkm/{id}', [UmkmController::class, 'update']);
    Route::put('/pengaduan/{status}/{id}', [LaporanController::class, 'update']);
    Route::put('/pengaduan/{id}', [LaporanController::class, 'update']);
    Route::put('/nikah/{id}', [StatusNikahController::class, 'update']);
    Route::put('/tinggal/{id}', [StatusTinggalController::class, 'update']);
    Route::put('/hidup/{id}', [StatusHidupController::class, 'update']);
});
