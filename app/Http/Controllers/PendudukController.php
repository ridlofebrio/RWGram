<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluargaModel;
use App\Models\PendudukModel;
use App\Models\RtModel;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penduduk = PendudukModel::all();

        return view('penduduk.index', ['data' => $penduduk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  

        $kk = KartuKeluargaModel::where('NKK', '=', $request->nkk)->first();

        if ($kk == null) {
            KartuKeluargaModel::create([
                'NKK' => $request->nkk,
                'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                'no_telepon' => $request->no_telp,
                'tanggal_kk' => now()
            ]);
        }

        $kk = KartuKeluargaModel::where('NKK', '=', $request->nkk)->first();

        PendudukModel::create([
            'kartu_keluarga_id' => $kk->kartu_keluarga_id,
            'NIK' => $request->nik,
            'nama_penduduk' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_perkawinan' => $request->perkawinan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'status_tinggal' => $request->status_tinggal,
            'status_kematian' => $request->status_kematian
        ]);

        return redirect('/penduduk')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $penduduk = PendudukModel::find($id);

        return view('penduduk.show', ['data' => $penduduk]);
    }

    public function request()
    {
        return view('penduduk.penduduk.request');
    }

    public function showPenduduk(Request $request)
    {
        $penduduk = PendudukModel::where('NIK', $request->nik)->first();

        if ($penduduk !== null) {
            return view('penduduk.penduduk.show', compact('penduduk'));
        } else {
            return redirect()->route('data.penduduk.request')->with('error', 'Data diri tidak ditemukan.');
        }
    }

    public function edit(string $id)
    {
        //
        $penduduk = PendudukModel::with(
            array(
                'kartuKeluarga' => function ($query) {
                    $query->with('rt');
                }
            )
        )->find($id);

        return view('penduduk.edit', ['data' => $penduduk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $penduduk = PendudukModel::find($id);
        $kk = KartuKeluargaModel::where('NKK', '=', $request->nkk)->first();
        $kkCek = false;
        if ($kk == null) {
            KartuKeluargaModel::create([
                'NKK' => $request->nkk,
                'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                'no_telepon' => $request->no_telp,
                'tanggal_kk' => now()
            ]);

            $kkCek = true;
        }

        $kk = KartuKeluargaModel::where('NKK', '=', $request->nkk)->first();

        $penduduk->update([
            'kartu_keluarga_id' => $kk->kartu_keluarga_id,
            'NIK' => $request->nik,
            'nama_penduduk' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_perkawinan' => $request->perkawinan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'status_tinggal' => $request->status_tinggal,
            'status_kematian' => $request->status_kematian
        ]);

        if (!$kkCek) {
            $kk->update([
                'NKK' => $request->nkk,
                'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                'no_telepon' => $request->no_telp,
                'tanggal_kk' => now()
            ]);
        }

        return redirect('/penduduk')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            PendudukModel::destroy($id);
            return redirect('/penduduk')->with('success', 'Data berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penduduk')->with('error', 'Data Gagal dihapus karena data terkait dengan tabel lain');
        }
    }
}
