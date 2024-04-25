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
        return $laporan;
    }

    public function keluhan()
    {
        return view('dashboard.pengaduan', ['data' => $this->index(), 'active' => 'pengaduan']);
    }

    public function indexPenduduk()
    {
        $laporan = LaporanModel::leftJoin('penduduk', 'laporan.penduduk_id', '=', 'penduduk.penduduk_id')
                            ->select('laporan.*', 'penduduk.nama_penduduk as nama_penduduk')
                            ->get();
        return view('laporan.penduduk.index', compact('laporan'));
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
            'jenis_laporan' => 'required',
            'deskripsi_laporan' => 'required',
            'tanggal_laporan' => 'required',
            'status_laporan' => 'required'
        ]);

        LaporanModel::find($id)->update([
            'penduduk_id' => $request->penduduk_id,
            'jenis_laporan' => $request->jenis_laporan,
            'deskripsi_laporan' => $request->deskripsi_laporan,
            'status_laporan' => $request->status_laporan,
            'tanggal_laporan' => $request->tanggal_laporan
        ]);
        return redirect('/laporan');
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
