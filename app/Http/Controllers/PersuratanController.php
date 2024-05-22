<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\PersuratanModel;
use Illuminate\Http\Request;
use Validator;

class PersuratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PersuratanModel::with('penduduk')->paginate(3);
        $active = 'persuratan';
        return view('dashboard.persuratan', compact('data', 'active'));
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
        $validator = Validator::make($request->all(), [

            'NIK' => 'required|min:16:max:16',
            'keterangan' => 'required',

        ], [
            'keterangan.required' => 'Keterangan harus diisi'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->with('flash', ['error', $validator->messages()->get('keterangan')[0]]);
        }
        $penduduk = PendudukModel::select('penduduk_id')->where('NIK', $request->NIK)->first();


        PersuratanModel::create([
            'penduduk_id' => $penduduk->penduduk_id,
            'nomor_surat' => '14.011/DP-KM/X/2022',
            'keterangan' => $request->keterangan,
            'tanggal_persuratan' => now()
        ]);
        return redirect('dashboard/persuratan')->with('flash', ['success', 'Data Berhasil Ditambah']);
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
