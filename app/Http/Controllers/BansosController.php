<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bansos = BansosModel::all();

        return view('bansos.index', ['bansos' => $bansos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bansos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)
            ->first();

        if ($kartuKeluarga) {
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
            return redirect()->route('bansos.index')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('bansos.create')
                ->with('error', 'Kartu keluarga tidak ditemukan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bansos = BansosModel::findOrFail($id);
        return view('bansos.show', compact('bansos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bansos = BansosModel::findOrFail($id)->delete();

        return redirect()->route('bansos.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
