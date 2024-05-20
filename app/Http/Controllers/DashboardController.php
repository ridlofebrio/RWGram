<?php

namespace App\Http\Controllers;

use App\Models\KasModel;
use App\Models\LaporanModel;
use App\Models\StatusHidupModel;
use App\Models\StatusNikahModel;
use App\Models\StatusTinggalModel;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('sum(jumlah_kas)')->toArray();
        $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('MONTH(tanggal_kas)')->toArray();
        $jumlah = 0;
        $data = array_map('intval', $data);
        foreach ($data as $key) {
            $jumlah += $key;
        }

        $active = 'beranda';
        return view('dashboard', compact('data', 'tgl', 'active', 'jumlah'));
    }

    public function notif()
    {
        $umkm = UmkmModel::where('terbaca', 0)->with('penduduk')->get();
        $hidup = StatusHidupModel::where('terbaca', 0)->with('penduduk')->get();
        $nikah = StatusNikahModel::where('terbaca', 0)->with('penduduk')->get();
        $tinggal = StatusTinggalModel::where('terbaca', 0)->with('penduduk')->get();
        $laporan = LaporanModel::where('terbaca', 0)->with('penduduk')->get();
        $jumlah = count($umkm) + count($hidup) + count($nikah) + count($tinggal) + count($laporan);
        return view('component.notif', compact('umkm', 'hidup', 'nikah', 'tinggal', 'laporan', 'jumlah'));
    }
    public function notifcount()
    {
        $data = UmkmModel::where('terbaca', 0)->with('penduduk')->get();

        return $data;
    }
}
