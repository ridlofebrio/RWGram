<?php

namespace App\Http\Controllers;

use App\Models\PersuratanModel;
use Illuminate\Http\Request;

class PersuratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persuratan = PersuratanModel::all();
        $active = 'persuratan';
        return view('dashboard.persuratan', compact('persuratan', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persuratan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'nomor_surat' => 'required',
            'keterangan' => 'required',
            'tanggal_persuratan' => 'required'
        ]);

        PersuratanModel::create($request->all());
        return redirect()->route('persuratan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $persuratan = PersuratanModel::findOrFail($id);
        return view('persuratan.show', compact('persuratan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persuratan = PersuratanModel::find($id);
        return view('persuratan.edit', compact('persuratan'));
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
            'tanggal_persuratan' => 'required'
        ]);

        PersuratanModel::find($id)->update($request->all());
        return redirect()->route('persuratan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = PersuratanModel::findOrFail($id)->delete();
        return redirect()->route('persuratan.index');
    }
}
