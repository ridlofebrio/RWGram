<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use App\Models\KasDetailModel;
use App\Models\KasModel;
use App\Models\LaporanModel;
use App\Models\PendudukModel;
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
        try {
            $umkm = UmkmModel::selectRaw('count(umkm_id) as jumlah')->first()->jumlah;
            $hidup = StatusHidupModel::selectRaw('count(id_status_hidup )as jumlah')->first()->jumlah;
            $nikah = StatusNikahModel::selectRaw('count(id_status_nikah )as jumlah')->first()->jumlah;
            $tinggal = StatusTinggalModel::selectRaw('count(id_status_tinggal  )as jumlah')->first()->jumlah;
            $laporan = LaporanModel::selectRaw('count(laporan_id) as jumlah')->first()->jumlah;
            $penduduk = PendudukModel::selectRaw('count(penduduk_id)as jumlah')->first()->jumlah;
            $informasi = InformasiModel::where('upload', 1)->get();
            $pengajuan = $hidup + $tinggal + $nikah;
            $semua = array('umkm' => $umkm, 'penduduk' => $penduduk, 'pengajuan' => $pengajuan, 'laporan' => $laporan);

            $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')->join('kas', 'kas.id_kas', 'detail_kas.id_kas')->whereRaw('kas.kartu_keluarga_id is null')->pluck('sum(jumlah_kas)')->toArray();
            // dd($data);
            $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')->join('kas', 'kas.id_kas', 'detail_kas.id_kas')->whereRaw('kas.kartu_keluarga_id is null')->pluck('MONTH(tanggal_kas)')->toArray();
            $kas = KasDetailModel::with('user')
                ->where('kartu_keluarga_id', null)
                ->get();
            $penduduk_laki = json_encode(PendudukModel::selectRaw('rt.nomor_rt  as x,count(penduduk_id) as y')->Join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', '=', 'penduduk.kartu_keluarga_id')->join('rt', 'rt.rt_id', '=', 'kartu_keluarga.rt_id')->where('penduduk.jenis_kelamin', 'L')->groupBy('rt.nomor_rt')->get());
            $penduduk_perempuan = json_encode(PendudukModel::selectRaw('rt.nomor_rt  as x,count(penduduk_id) as y')->Join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', '=', 'penduduk.kartu_keluarga_id')->join('rt', 'rt.rt_id', '=', 'kartu_keluarga.rt_id')->where('penduduk.jenis_kelamin', 'P')->groupBy('rt.nomor_rt')->get());
            $jumlah = 0;
            $data = array_map('intval', $data);
            foreach ($data as $key) {
                $jumlah += $key;
            }

        } catch (\Exception $e) {
            dd($e);
        }
        $active = 'beranda';

        return view('dashboard', compact('data', 'tgl', 'active', 'jumlah', 'penduduk_laki', 'penduduk_perempuan', 'semua', 'informasi'));
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
        $umkm = UmkmModel::where('terbaca', 0)->with('penduduk')->get();
        $hidup = StatusHidupModel::where('terbaca', 0)->with('penduduk')->get();
        $nikah = StatusNikahModel::where('terbaca', 0)->with('penduduk')->get();
        $tinggal = StatusTinggalModel::where('terbaca', 0)->with('penduduk')->get();
        $laporan = LaporanModel::where('terbaca', 0)->with('penduduk')->get();
        $jumlah = count($umkm) + count($hidup) + count($nikah) + count($tinggal) + count($laporan);

        return $jumlah;
    }
}
