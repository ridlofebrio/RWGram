<?php

namespace App\Http\Controllers;

use App\Models\KasModel;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data = KasModel::selectRaw('sum(jumlah_kas)')->groupBy('tanggal_kas')->pluck('sum(jumlah_kas)')->toArray();
        $tgl = KasModel::selectRaw('DAYOFMONTH(tanggal_kas)')->groupBy('tanggal_kas')->pluck('DAYOFMONTH(tanggal_kas)')->toArray();
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
        $data = UmkmModel::where('terbaca', 0)->with('penduduk')->get();
        return view('component.notif', compact('data'));
    }
    public function notifcount()
    {
        $data = UmkmModel::where('terbaca', 0)->with('penduduk')->get();

        return $data;
    }
}
