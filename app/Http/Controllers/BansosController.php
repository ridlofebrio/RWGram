<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KartuKeluargaModel;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    public function index()
    {


        $allBansos = BansosModel::all();
        $kriteria = Kriteria::all();

        $bansos = BansosModel::with('kartuKeluarga', 'kartuKeluarga.kartuKeluarga', 'kartuKeluarga.penduduk')->paginate(3);


        return view('dashboard.bansos', ['data' => $bansos, 'allData' => $allBansos, 'kriteria' => $kriteria, 'active' => 'bansos']);
    }

    public function create()
    {
        $metadata = (object) [
            'title' => 'Bantuan Sosial',
            'description' => 'Pengajuan Bantuan Sosial'
        ];
        $kriteria = Kriteria::all();

        return view('bansos.penduduk.create')->with(['activeMenu' => 'permohonan', 'kriteria' => $kriteria, 'metadata' => $metadata]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomer_kk' => 'required',
            'nama_pengaju' => 'required',
            'c1' => 'required|numeric',
            'c2' => 'required|numeric',
            'c3' => 'required|numeric',
            'c4' => 'required|numeric',
            'c5' => 'required|numeric',
            'c6' => 'required|numeric',
            'depan_rumah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kamar_tidur' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kamar_mandi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ruang_tamu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dapur' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $depanRumah = cloudinary()->upload($request->file('depan_rumah')->getRealPath())->getSecurePath();
            $kamarTidur = cloudinary()->upload($request->file('kamar_tidur')->getRealPath())->getSecurePath();
            $kamarMandi = cloudinary()->upload($request->file('kamar_mandi')->getRealPath())->getSecurePath();
            $ruangTamu = cloudinary()->upload($request->file('ruang_tamu')->getRealPath())->getSecurePath();
            $dapur = cloudinary()->upload($request->file('dapur')->getRealPath())->getSecurePath();
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('flash', ['error', $e]);
        }

        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        if ($kartuKeluarga) {
            $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)->first();

            if ($existingBansos) {
                // Jika bansos sudah ada, tambahkan jumlah bansos baru ke jumlah bansos yang sudah ada
                $existingBansos->update([
                    'nama_pengaju' => $request->nama_pengaju,
                    'c1' => $request->c1,
                    'c2' => $request->c2,
                    'c3' => $request->c3,
                    'c4' => $request->c4,
                    'c5' => $request->c5,
                    'c6' => $request->c6,
                    'status' => 'menunggu',
                    'foto_depan_rumah' => $depanRumah,
                    'foto_kamar_tidur' => $kamarTidur,
                    'foto_kamar_mandi' => $kamarMandi,
                    'foto_ruang_tamu' => $ruangTamu,
                    'foto_dapur' => $dapur,
                    'tanggal_bansos' => now(),
                ]);
            } else {
                BansosModel::create([
                    'kartu_keluarga_id' => $kartuKeluarga->kartu_keluarga_id,
                    'nama_pengaju' => $request->nama_pengaju,
                    'c1' => $request->c1,
                    'c2' => $request->c2,
                    'c3' => $request->c3,
                    'c4' => $request->c4,
                    'c5' => $request->c5,
                    'c6' => $request->c6,
                    'foto_depan_rumah' => $depanRumah,
                    'foto_kamar_tidur' => $kamarTidur,
                    'foto_kamar_mandi' => $kamarMandi,
                    'foto_ruang_tamu' => $ruangTamu,
                    'foto_dapur' => $dapur,
                    'tanggal_bansos' => now(),
                ]);
            }
            return redirect()->route('bansos.penduduk.request')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('bansos.penduduk.create')
                ->with('error', 'Kartu keluarga tidak ditemukan.');
        }
    }

    public function normalize(Request $request)
    {
        // Ambil semua data bansos dan kriteria
        $bansos = BansosModel::all();
        $kriteria = Kriteria::all();

        // Inisialisasi array untuk menyimpan nilai maksimum dan minimum dari setiap kriteria
        $maxValues = [];
        $minValues = [];

        // Cari nilai maksimum dan minimum dari setiap kolom c1 hingga c6
        foreach ($kriteria as $k) {
            $key = 'c' . $k->kriteria_id; // Asumsi id kriteria sesuai dengan urutan kolom c1, c2, ..., c6
            $maxValues[$key] = $bansos->max($key);
            $minValues[$key] = $bansos->min($key);
        }

        // Normalisasi setiap item dan hitung WSM
        foreach ($bansos as $item) {
            $wsm = 0; // Inisialisasi nilai WSM

            foreach ($kriteria as $k) {
                $key = 'c' . $k->kriteria_id;

                if ($k->attribut == 'cost') {
                    // Normalisasi untuk attribut cost
                    $normalizedValue = $item->$key != 0 ? $minValues[$key] / $item->$key : 0;
                } else {
                    // Normalisasi untuk attribut benefit
                    $normalizedValue = $maxValues[$key] != 0 ? $item->$key / $maxValues[$key] : 0;
                }

                // Kalikan dengan bobot
                $weightedValue = $normalizedValue * $k->bobot;

                // Tambahkan ke nilai WSM
                $wsm += $weightedValue;
            }

            // Simpan nilai WSM
            $item->wsm = $wsm;
            $item->save();
        }

        // Urutkan data berdasarkan nilai WSM secara descending
        $bansos = $bansos->sortByDesc('wsm');

        // Ubah status menjadi "menerima" untuk tiga item pertama
        $count = 0;
        foreach ($bansos as $item) {
            $count++;
            if ($count <= $request->jumlah_penerima) {
                $item->status = 'menerima';
                $item->save();
            } else {
                $item->status = 'tidak menerima';
                $item->save();
            }
        }

        $allBansos = BansosModel::all();
        $bansos = BansosModel::with('kartuKeluarga')->paginate(3);

        // Kembalikan hasil normalisasi
        return view('dashboard.bansos', ['data' => $bansos, 'allData' => $allBansos, 'kriteria' => $kriteria, 'active' => 'bansos']);
    }

    public function show(string $id)
    {
        $bansos = BansosModel::findOrFail($id);
        return view('bansos.show', compact('bansos'));
    }

    public function request()
    {
        $metadata = (object) [
            'title' => 'Bantuan Sosial',
            'description' => 'Pengajuan Bantuan Sosial'
        ];

        return view('bansos.penduduk.request')->with(['activeMenu' => 'permohonan', 'metadata' => $metadata]);
    }

    public function showPenduduk(Request $request)
    {
        $metadata = (object) [
            'title' => 'Bantuan Sosial',
            'description' => 'Cek Pengajuan Bantuan Sosial'
        ];
        $kriteria = Kriteria::all();

        $kartuKeluarga = KartuKeluargaModel::where('NKK', $request->nomer_kk)->first();

        if ($kartuKeluarga !== null) {
            $existingBansos = BansosModel::where('kartu_keluarga_id', $kartuKeluarga->kartu_keluarga_id)->first();

            if ($existingBansos !== null) {
                $bansos = $existingBansos;
                return view('bansos.penduduk.show')->with(['bansos' => $bansos, 'activeMenu' => 'permohonan', 'kriteria' => $kriteria, 'metadata' => $metadata]);
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
