<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmkmModel;


class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkm = UmkmModel::with('penduduk')->get();
        $active = 'pengajuan';
        return view('dashboard.pengajuan', compact('umkm', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'deskripsi_umkm' => 'required',
            'lokasi_umkm' => 'required',
            'link_medsos' => 'required',
        ]);
        UmkmModel::create($request->all() + ['tanggal_umkm' => now()]);

        return redirect()->route('umkm.index')
            ->with('success', 'UMKM Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $umkm = UmkmModel::findOrFail($id);
        return view('umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $umkm = UmkmModel::find($id);
        return view('umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penduduk_id' => 'string|max:20',
            'nama_umkm' => 'required',
            'deskripsi_umkm' => 'required',
            'lokasi_umkm' => 'required',
            'link_medsos' => 'required',
        ]);
        UmkmModel::find($id)->update($request->all());
        return redirect()->route('umkm.index')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $umkm = UmkmModel::findOrFail($id)->delete();
        return \redirect()->route('umkm.index')
            ->with('success', 'data Berhasil Dihapus');
    }
}
