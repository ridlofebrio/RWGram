<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    public function index()
    {
        $bansos = BansosModel::with('kartuKeluarga')->get();

        return view('dashboard.bansos', ['bansos' => $bansos, 'active' => 'bansos']);
    }

    public function create()
    {
        $metadata = (object)[
            'title' => 'Bantuan Sosial',
            'description' => 'Pengajuan Bantuan Sosial'
        ];

        return view('bansos.penduduk.create')->with(['activeMenu' => 'beranda', 'metadata' => $metadata]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomer_kk' => 'required',
            'nama_pengaju' => 'required',
            'total_pendapatan' => 'required|numeric',
            'jumlah_tanggungan' => 'required|numeric',
            'jumlah_kendaraan' => 'required|numeric',
            'luas_rumah' => 'required|numeric',
            'luas_tanah' => 'required|numeric',
            'jumlah_watt' => 'required|numeric',
        ]);

        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        if ($kartuKeluarga) {
            $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)->first();

            if ($existingBansos) {
                // Jika bansos sudah ada, tambahkan jumlah bansos baru ke jumlah bansos yang sudah ada
                $existingBansos->update([
                    'nama_pengaju' => $request->nama_pengaju,
                    'total_pendapatan' => $request->total_pendapatan,
                    'jumlah_tanggungan' => $request->jumlah_tanggungan,
                    'jumlah_kendaraan' => $request->jumlah_kendaraan,
                    'luas_rumah' => $request->luas_rumah,
                    'luas_tanah' => $request->luas_tanah,
                    'jumlah_watt' => $request->jumlah_watt,
                    'tanggal_bansos' => now(),
                ]);
            } else {
                // Jika bansos belum ada, buat bansos baru
                BansosModel::create([
                    'kartu_keluarga_id' => $kartuKeluarga->kartu_keluarga_id,
                    'nama_pengaju' => $request->nama_pengaju,
                    'total_pendapatan' => $request->total_pendapatan,
                    'jumlah_tanggungan' => $request->jumlah_tanggungan,
                    'jumlah_kendaraan' => $request->jumlah_kendaraan,
                    'luas_rumah' => $request->luas_rumah,
                    'luas_tanah' => $request->luas_tanah,
                    'jumlah_watt' => $request->jumlah_watt,
                    'tanggal_bansos' => now(),
                ]);
            }
            return redirect()->route('bansos.penduduk.request')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('bansos.penduduk.create')
                ->with('error', 'Kartu keluarga tidak ditemukan.');
        }
    }

    public function show(string $id)
    {
        $bansos = BansosModel::findOrFail($id);
        return view('bansos.show', compact('bansos'));
    }

    public function request()
    {
        return view('bansos.penduduk.request');
    }

    public function showPenduduk(Request $request)
    {
        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        if ($kartuKeluarga !== null) {
            $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)->first();

            if ($existingBansos !== null) {
                $bansos = $existingBansos;
                return view('bansos.penduduk.show', compact('bansos'));
            } else {
                return redirect()->route('bansos.index')->with('error', 'Anda belum melakukan pengajuan bansos');
            }
        } else {
            return redirect()->route('bansos.penduduk.request')->with('error', 'Kartu keluarga tidak ditemukan.');
        }
    }

    public function destroy(string $id)
    {
        $bansos = BansosModel::findOrFail($id)->delete();

        return redirect()->route('bansos.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
