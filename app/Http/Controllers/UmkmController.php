<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use Illuminate\Http\Request;
use App\Models\UmkmModel;


class UmkmController extends Controller
{
    public function index()
    {
        $umkm = UmkmModel::with('penduduk')->get();
        $active = 'pengajuan';
        return view('dashboard.pengajuan', compact('umkm', 'active'));
    }


    public function pengajuan()
    {
        $umkm = UmkmModel::with('penduduk')->get();

        return view('component.umkm', compact('umkm'));
    }

    public function find($value)
    {

        if ($value == 'kosong') {
            $umkm = UmkmModel::all();

            return view('component.umkm', compact('umkm'));

        } else {

            $umkm = UmkmModel::whereAny(['nama_umkm'], 'like', '%' . $value . '%')->get();

        }
        return view('component.umkm', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function indexPenduduk(Request $request)
    {
        // Mendapatkan semua data UMKM
        $umkm = UmkmModel::query();

        // Filter berdasarkan pencarian nama UMKM jika ada
        if ($request->has('search')) {
            $umkm->where('nama_umkm', 'like', '%' . $request->input('search') . '%');
        }

        // Ambil data UMKM setelah diterapkan filter
        $umkm = $umkm->get();

        $metadata = (object)[
            'title' => 'UMKM',
            'description' => 'UMKM untuk penduduk'
        ];

        return view('umkm.penduduk.index', [
            'umkm' => $umkm,
            'metadata' => $metadata,
            'activeMenu' => 'beranda'
        ]);
    }


    public function create()
    {
        $metadata = (object)[
            'title' => 'UMKM',
            'description' => 'Daftar UMKM'
        ];

        return view('umkm.penduduk.create')->with(['activeMenu' => 'beranda', 'metadata' => $metadata]);
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
            'no_wa' => 'required',
            'link_medsos' => 'required',
            'nama_medsos' => 'required',
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK)->first();

        if ($penduduk) {
            UmkmModel::create($request->all() + ['tanggal_umkm' => now(), 'penduduk_id' => $penduduk->penduduk_id]);

            return redirect()->route('umkm.penduduk.index')
                ->with('success', 'UMKM Berhasil Ditambahkan');
        } else {
            return redirect()->route('umkm.penduduk.create')
                ->with('error', 'NIK Anda belum terdaftar sebagai warga.');
        }
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
