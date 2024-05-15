<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    public function index()
    {
        $bansos = BansosModel::with('kartuKeluarga')->paginate(3);

        return view('dashboard.bansos', ['data' => $bansos, 'active' => 'bansos']);
    }

    public function create()
    {
        $metadata = (object) [
            'title' => 'Bantuan Sosial',
            'description' => 'Pengajuan Bantuan Sosial'
        ];

        return view('bansos.penduduk.create')->with(['activeMenu' => 'beranda', 'metadata' => $metadata]);
    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . rand(1, 99) . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $validatedData = $request->validate([
            'nomer_kk' => 'required',
            'nama_pengaju' => 'required',
            'total_pendapatan' => 'required|numeric',
            'jumlah_tanggungan' => 'required|numeric',
            'jumlah_kendaraan' => 'required|numeric',
            'luas_rumah' => 'required|numeric',
            'luas_tanah' => 'required|numeric',
            'jumlah_watt' => 'required|numeric',
            // 'file_upload.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        if ($kartuKeluarga) {
            $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)->first();

            if ($existingBansos) {
                // Jika bansos sudah ada, tambahkan jumlah bansos baru ke jumlah bansos yang sudah ada
                $existingBansos->update([
                    'nama_pengaju' => $request->nama_pengaju,
                    'total_pendapatan' => $request->total_pendapatan,
                    'jumlah_tanggungan' => $request->jumlah_tanggungan,
                    'jumlah_kendaraan' => $request->jumlah_kendaraan,
                    'luas_rumah' => $request->luas_rumah,
                    'luas_tanah' => $request->luas_tanah,
                    'jumlah_watt' => $request->jumlah_watt,
                    'tanggal_bansos' => now(),
                ]);
            } else {
                // // Jika bansos belum ada, buat bansos baru
                // if ($request->hasFile('file_upload')) {
                //     foreach ($request->file('file_upload') as $file) {
                //         // Simpan file ke dalam storage
                //         $path = $file->store('public/images'); // Simpan di dalam folder 'images' di dalam direktori 'public'

                //         // Anda juga bisa menyimpan path ke database jika diperlukan
                //         $image = $path;
                //         $image->save();
                //     }
                // }

                BansosModel::create([
                    'kartu_keluarga_id' => $kartuKeluarga->kartu_keluarga_id,
                    'nama_pengaju' => $request->nama_pengaju,
                    'total_pendapatan' => $request->total_pendapatan,
                    'jumlah_tanggungan' => $request->jumlah_tanggungan,
                    'jumlah_kendaraan' => $request->jumlah_kendaraan,
                    'luas_rumah' => $request->luas_rumah,
                    'luas_tanah' => $request->luas_tanah,
                    'jumlah_watt' => $request->jumlah_watt,
                    'tanggal_bansos' => now(),
                    'foto_dapur' => $imageName,
                ]);
            }
            return redirect()->route('bansos.penduduk.request')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('bansos.penduduk.create')
                ->with('error', 'Kartu keluarga tidak ditemukan.');
        }
    }

    public function show(string $id)
    {
        $bansos = BansosModel::findOrFail($id);
        return view('bansos.show', compact('bansos'));
    }

    public function request()
    {
        $metadata = (object)[
            'title' => 'Bantuan Sosial',
            'description' => 'Pengajuan Bantuan Sosial'
        ];

        return view('bansos.penduduk.request')->with(['activeMenu' => 'beranda', 'metadata' => $metadata]);
    }

    public function showPenduduk(Request $request)
    {
        $metadata = (object)[
            'title' => 'Bantuan Sosial',
            'description' => 'Cek Pengajuan Bantuan Sosial'
        ];

        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        if ($kartuKeluarga !== null) {
            $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)->first();

            if ($existingBansos !== null) {
                $bansos = $existingBansos;
                return view('bansos.penduduk.show')->with(['bansos' => $bansos, 'activeMenu' => 'beranda', 'metadata' => $metadata]);
            } else {
                return redirect()->route('bansos.penduduk.request')->with('error', 'Anda belum melakukan pengajuan bansos');
            }
        } else {
            return redirect()->route('bansos.penduduk.request')->with('error', 'Kartu keluarga tidak ditemukan.');
        }
    }

    public function destroy(string $id)
    {
        $bansos = BansosModel::findOrFail($id)->delete();

        return redirect()->route('bansos.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
