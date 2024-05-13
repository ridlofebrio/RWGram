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
        $laporan = LaporanModel::with('penduduk')->where('status_laporan', $sort)->get();

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


    public function find($value)
    {
        if ($value == 'kosong') {
            $data = LaporanModel::all();

            return view('dashboard.pengaduan', ['data' => $data, 'active' => 'pengaduan']);

        } else {

            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->get();
            $data = LaporanModel::findMany($id);

        }

        return view('dashboard.pengaduan', ['data' => $data, 'active' => 'pengaduan']);
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


        $laporan = LaporanModel::find($id);
        $laporan->status_laporan = $request->status_laporan;
        if (isset($request->pesan)) {
            $laporan->pesan = $request->pesan;
        }
        $laporan->save();
        return redirect('/dashboard/pengaduan')->with('flash', ['success', 'Data berhasil Dikonfirmasi']);
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
