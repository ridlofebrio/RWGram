<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\PendudukModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort)
    {
        $laporan = LaporanModel::where('status_laporan', $sort)->get();

        return $laporan;
    }

    public function keluhan($sort = 'Menunggu')
    {

        return view('dashboard.pengaduan', ['data' => $this->index($sort), 'active' => 'pengaduan']);
    }

    public function indexPenduduk()
    {
        $metadata = (object) [
            'title' => 'Pengaduan',
            'description' => 'Halaman Pengaduan Warga'
        ];
        $laporan = LaporanModel::with('penduduk')->get();

        return view('laporan.penduduk.index', compact('laporan'))->with(['metadata' => $metadata, 'activeMenu' => 'pengaduan']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $metadata = (object) [
            'title' => 'Pengaduan',
            'description' => 'Halaman Pengajuan Pengaduan'
        ];
        
        return view('laporan.penduduk.create')->with(['metadata' => $metadata, 'activeMenu' => 'pengaduan']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK_pengaju' => 'required',
            'jenis_keluhan' => 'required',
            'deskripsi' => 'required',
        ]);
        $penduduk_id = PendudukModel::where('NIK', $request->NIK_pengaju)->first();
        $data =[
            'penduduk_id' => $penduduk_id->penduduk_id,
            'jenis_laporan' => $request->jenis_keluhan,
            'deskripsi_laporan' => $request->deskripsi,
            'status_laporan' => 'Menunggu',
            'tanggal_laporan'=> now()
        ];
        LaporanModel::create($data);
        return redirect()->route('laporan.penduduk.index');
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
