<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use App\Models\informasi;
use Carbon\Carbon;
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
        // Mendapatkan tanggal hari ini
        $today = Carbon::today();

        // Menghitung tanggal 7 hari ke belakang dari hari ini
        $startDate = $today->copy()->subDays(7);

        // Mengambil informasi yang memiliki tanggal antara 7 hari sebelum hari ini dan hari ini
        $informasi = InformasiModel::whereDate('tanggal_informasi', '>=', $startDate)
            ->whereDate('tanggal_informasi', '>=', $today)
            ->get();

        // Mengonversi format tanggal informasi
        foreach ($informasi as $info) {
            $info->tanggal_informasi = date('d F Y', strtotime($info->tanggal_informasi));
        }

        return view('informasi.penduduk.index', ['informasi' => $informasi]);
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $informasi = InformasiModel::where('judul', 'like', "%$search%")->get();
        return view('informasi.penduduk.index', compact('informasi'));
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
            'deskripsi_informasi' => 'required|string',
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

    public function showPenduduk($id)
    {
        $informasi = InformasiModel::findOrFail($id);
        return view('informasi.penduduk.show', compact('informasi'));
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
            'deskripsi_informasi' => 'required|string',
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
