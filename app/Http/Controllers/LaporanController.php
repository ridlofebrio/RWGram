<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = LaporanModel::all();
        return view('laporan.index', compact('laporan'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'jenis_laporan' => 'required',
            'deskripsi_laporan' => 'required',
            'tanggal_laporan' => 'required',
            'status_laporan' => 'required'
        ]);

        LaporanModel::create($request->all());
        return redirect()->route('laporan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = LaporanModel::findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = LaporanModel::find($id);
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'nomor_surat' => 'required',
            'keterangan' => 'required',
            'tanggal_persuratan' => 'required',
            'status_laporan' => 'required'
        ]);

        LaporanModel::find($id)->update($request->all());
        return redirect()->route('laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = LaporanModel::findOrFail($id)->delete();
        return redirect()->route('laporan.index');
    }
}
