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
        $laporan = LaporanModel::with('penduduk')->where('status_laporan', $sort)->paginate(3);

        return $laporan;
    }

    public function keluhan($sort = 'Menunggu')
    {
        $laporan = LaporanModel::with('penduduk')->where('status_laporan', $sort)->paginate(3);

        return view('dashboard.pengaduan', ['data' => $laporan, 'active' => 'pengaduan']);
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
            'NIK_pengaju' => 'required',
            'deskripsi_laporan' => 'required',
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK_pengaju)->first();

        if ($penduduk) {
            $data = [
                'penduduk_id' => $penduduk->penduduk_id,
                'deskripsi_laporan' => $request->deskripsi_laporan,
                'status_laporan' => 'menunggu',
                'tanggal_laporan' => now()
            ];

            LaporanModel::create($data);
            return redirect()->route('laporan.penduduk.index')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('laporan.penduduk.create')
                ->with('error', 'NIK Anda tidak ditemukan.');
        }
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            $data = LaporanModel::paginate(3);

            return view('dashboard.pengaduan', ['data' => $data, 'active' => 'pengaduan']);
        } else {

            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->paginate(3);
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
