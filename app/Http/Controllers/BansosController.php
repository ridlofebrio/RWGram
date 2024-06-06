<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KartuKeluargaModel;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;

class BansosController extends Controller
{
    public function index()
    {


        $allBansos = BansosModel::selectRaw('count(bansos_id) as jumlah')->first();

        $kriteria = Kriteria::all();

        $bansos = BansosModel::with('kartuKeluarga', 'kartuKeluarga.kartuKeluarga', 'kartuKeluarga.penduduk')->paginate(5);
        // dd($bansos[0]->kartuKeluarga->kartukeluarga->NKK);
        return view('dashboard.bansos', ['data' => $bansos, 'allData' => $allBansos, 'kriteria' => $kriteria, 'active' => 'bansos']);
    }

    public function sort($sort)
    {

        $allBansos = BansosModel::all();
        $kriteria = Kriteria::all();

        $bansos = BansosModel::where('status', $sort)->with('kartuKeluarga', 'kartuKeluarga.kartuKeluarga', 'kartuKeluarga.penduduk')->paginate(5);
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


    public function find($value)
    {
        if ($value == 'kosong') {
            return $this->index();
        } else {
            $allBansos = BansosModel::all();
            $kriteria = Kriteria::all();
            $bansos = BansosModel::whereAny(['nama_pengaju'], 'like', '%' . $value . '%')->with('kartuKeluarga', 'kartuKeluarga.kartuKeluarga', 'kartuKeluarga.penduduk')->paginate(5);
            return view('dashboard.bansos', ['data' => $bansos, 'allData' => $allBansos, 'kriteria' => $kriteria, 'active' => 'bansos']);
        }
    }

    public function normalize(Request $request)
    {
        // Menjalankan metode SAW dan TOPSIS
        $this->sawMethod();
        $this->topsisMethod();

        // Ambil semua data bansos setelah di-update oleh metode SAW dan TOPSIS
        $bansos = BansosModel::all();
        $kriteria = Kriteria::all();

        // Hitung nilai akhir (score) dengan rata-rata dari SAW dan TOPSIS
        foreach ($bansos as $item) {
            $item->score = ($item->saw + $item->preference) / 2;
            $item->save();
        }

        // Urutkan data berdasarkan nilai score secara descending
        $bansos = $bansos->sortByDesc('score');

        // Ubah status menjadi "menerima"
        $count = 0;
        foreach ($bansos as $item) {
            $count++;
            if ($count <= $request->jumlah_penerima) {
                $item->status = 'menerima';
            } else {
                $item->status = 'tidak menerima';
            }
            $item->save();
        }

        $allBansos = BansosModel::all();
        $bansos = BansosModel::with('kartuKeluarga')->paginate(5);

        // Kembalikan hasil normalisasi
        return view('dashboard.bansos', ['data' => $bansos, 'allData' => $allBansos, 'kriteria' => $kriteria, 'active' => 'bansos']);
    }

    public function sawMethod()
    {
        // Ambil semua data bansos dan kriteria
        $bansos = BansosModel::all();
        $kriteria = Kriteria::all();

        // Inisialisasi array untuk menyimpan nilai maksimum dan minimum dari setiap kriteria
        $maxValues = [];
        $minValues = [];

        // Inisialisasi array untuk menyimpan langkah-langkah
        $steps = [];

        // Cari nilai maksimum dan minimum dari setiap kolom c1 hingga c6
        foreach ($kriteria as $k) {
            $key = 'c' . $k->kriteria_id; // Asumsi id kriteria sesuai dengan urutan kolom c1, c2, ..., c6
            $maxValues[$key] = $bansos->max($key);
            $minValues[$key] = $bansos->min($key);
        }

        $steps[] = ['maxValues' => $maxValues, 'minValues' => $minValues];

        // Normalisasi setiap item dan hitung SAW
        $normalizedMatrix = [];
        $weightedMatrix = [];
        $sawScores = [];

        foreach ($bansos as $item) {
            $saw = 0; // Inisialisasi nilai SAW
            $normalizedValues = [];
            $weightedValues = [];

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

                // Tambahkan ke nilai SAW
                $saw += $weightedValue;

                // Simpan nilai ternormalisasi dan ternormalisasi berbobot
                $normalizedValues[$key] = $normalizedValue;
                $weightedValues[$key] = $weightedValue;
            }

            // Simpan nilai SAW
            $item->saw = $saw;
            $item->save();

            $normalizedMatrix[$item->bansos_id] = $normalizedValues;
            $weightedMatrix[$item->bansos_id] = $weightedValues;
            $sawScores[$item->bansos_id] = $saw;
        }

        $steps[] = [
            'normalizedMatrix' => $normalizedMatrix,
            'weightedMatrix' => $weightedMatrix,
            'sawScores' => $sawScores
        ];

        return $steps;
    }

    public function topsisMethod()
    {
        // Ambil semua data bansos dan kriteria
        $bansos = BansosModel::all();
        $kriteria = Kriteria::all();

        // Inisialisasi array untuk menyimpan nilai maksimum dan minimum dari setiap kriteria
        $sumSquares = [];
        $steps = [];

        // Menghitung jumlah kuadrat dari setiap kolom c1 hingga c6
        foreach ($kriteria as $k) {
            $key = 'c' . $k->kriteria_id; // Asumsi id kriteria sesuai dengan urutan kolom c1, c2, ..., c6
            $sumSquares[$key] = sqrt($bansos->sum(function ($item) use ($key) {
                return pow($item->$key, 2);
            }));
        }

        $steps[] = ['sumSquares' => $sumSquares];

        // Normalisasi setiap item dan hitung normalisasi terbobot
        $normalizedMatrix = [];
        foreach ($bansos as $item) {
            $normalizedItem = [];
            foreach ($kriteria as $k) {
                $key = 'c' . $k->kriteria_id;
                // Normalisasi
                $normalizedValue = $sumSquares[$key] != 0 ? $item->$key / $sumSquares[$key] : 0;
                // Kalikan dengan bobot
                $weightedValue = $normalizedValue * $k->bobot;
                $normalizedItem[$key] = $weightedValue;
            }
            $normalizedMatrix[] = $normalizedItem;
        }

        $steps[] = ['normalizedMatrix' => $normalizedMatrix];

        // Hitung Solusi Ideal Positif dan Negatif
        $idealPositive = [];
        $idealNegative = [];

        foreach ($kriteria as $k) {
            $key = 'c' . $k->kriteria_id;
            if ($k->attribut == 'cost') {
                $idealPositive[$key] = min(array_column($normalizedMatrix, $key));
                $idealNegative[$key] = max(array_column($normalizedMatrix, $key));
            } else {
                $idealPositive[$key] = max(array_column($normalizedMatrix, $key));
                $idealNegative[$key] = min(array_column($normalizedMatrix, $key));
            }
        }

        $steps[] = ['idealPositive' => $idealPositive, 'idealNegative' => $idealNegative];

        // Menghitung jarak terhadap solusi ideal positif dan negatif
        $distances = [];
        foreach ($normalizedMatrix as $index => $normalizedItem) {
            $distancePositive = 0;
            $distanceNegative = 0;
            foreach ($kriteria as $k) {
                $key = 'c' . $k->kriteria_id;
                $distancePositive += pow($normalizedItem[$key] - $idealPositive[$key], 2);
                $distanceNegative += pow($normalizedItem[$key] - $idealNegative[$key], 2);
            }
            $distances[$index] = [
                'positive' => sqrt($distancePositive),
                'negative' => sqrt($distanceNegative),
            ];
        }

        $steps[] = ['distances' => $distances];

        // Menghitung nilai preferensi untuk setiap alternatif
        $preferences = [];
        foreach ($distances as $index => $distance) {
            $preferences[$index] = $distance['negative'] / ($distance['positive'] + $distance['negative']);
        }

        // Menambahkan nilai preferensi ke dalam data bansos
        foreach ($bansos as $index => $item) {
            $item->preference = $preferences[$index];
            $item->save();
        }

        $steps[] = ['preferences' => $preferences];

        return $steps;
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
