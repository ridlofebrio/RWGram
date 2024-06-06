<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\PendudukModel;
use Illuminate\Http\Request;
use Exception;

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
        LaporanModel::where('terbaca', '=', '0')->update([
            'terbaca' => 1
        ]);
        return view('dashboard.pengaduan', ['data' => $laporan, 'active' => 'pengaduan']);
    }

    public function indexPenduduk(Request $requets)
    {
        $laporan = LaporanModel::with('penduduk', 'penduduk.kartuKeluarga.rt')->get();

        if ($requets->has('search')) {
            $laporan->whereHas('penduduk', function ($query) use ($requets) {
                $query->where('nama_penduduk', 'like', '%' . $requets->search . '%');
            });
        }
        // if ($status) {
        //     $laporan->where('status_laporan', $status);
        // }
        // $laporan = $laporan->get();

        $metadata = (object) [
            'title' => 'Pengaduan',
            'description' => 'Halaman Pengaduan Warga'
        ];

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
            'foto_umkm' => 'required',
            'asset_id' => 'required',
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK_pengaju)->first();

        if ($penduduk) {
            $data = [
                'penduduk_id' => $penduduk->penduduk_id,
                'deskripsi_laporan' => $request->deskripsi_laporan,
                'status_laporan' => 'menunggu',
                'tanggal_laporan' => now(),
                'foto_laporan' => $request->foto_umkm,
                'asset_id' => $request->asset_id
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
        try {
            if ($value == 'kosong') {
                $data = LaporanModel::paginate(3);

                return view('dashboard.pengaduan', ['data' => $data, 'active' => 'pengaduan']);
            } else {

                $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->firstOrFail();
                if ($id) {

                    $data = LaporanModel::where('penduduk_id', '=', $id->penduduk_id)->paginate(3);
                } else {
                    $data = LaporanModel::where('penduduk_id', '=', 0)->paginate(3);
                }

            }
        } catch (\Exception $e) {
            dd($e);
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

        try {
            $laporan = LaporanModel::find($id);
            $laporan->status_laporan = $request->status_laporan;
            if (isset($request->pesan)) {
                $laporan->pesan = $request->pesan;
            }
            $laporan->save();
        } catch (\Exception $e) {
            dd($e);
        }

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
