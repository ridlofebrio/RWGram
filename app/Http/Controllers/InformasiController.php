<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use App\Models\informasi;
use App\Models\User;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = InformasiModel::all();

        return view('informasi.index', ['informasi' => $informasi]);
    }

    public function indexPenduduk()
    {
        $informasi = InformasiModel::all();

        foreach ($informasi as $info) {
            // Mengonversi tanggal awal ke format yang diinginkan 'd F Y'
            $info->tanggal_informasi = date('d F Y', strtotime($info->tanggal_informasi));
        }

        return view('informasi.penduduk.index', ['informasi' => $informasi]);
    }

    public function create()
    {
        $user = User::all();
        return view('informasi.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate([
            'user_id' => 'required',
            'judul' => 'required|string',
            'deskrisi_informasi' => 'required|string',
            'foto_informasi' => 'required|string',
            'lokasi_informasi' => 'required|string',
            'tanggal_informasi' => 'required'
        ]);

        // fungsi eloquent untuk menambah data
        InformasiModel::create($request->all());
        return redirect()->route('informasi.index')
            ->with('success', 'Informasi Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        $informasi = InformasiModel::findOrFail($id);
        return view('informasi.show', compact('informasi'));
    }

    public function edit(string $id)
    {
        $informasi = InformasiModel::find($id);
        $user = User::all();
        return view('informasi.edit', ['informasi' => $informasi, 'user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'judul' => 'required|string',
            'deskrisi_informasi' => 'required|string',
            'foto_informasi' => 'required|string',
            'lokasi_informasi' => 'required|string',
            'tanggal_informasi' => 'required'
        ]);

        // fungsi eloquent untuk mengupdate data inputan kita
        InformasiModel::find($id)->update($request->all());

        // jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('informasi.index')
            ->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(string $id)
    {
        $informasi = InformasiModel::findOrFail($id)->delete();

        return redirect()->route('informasi.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
