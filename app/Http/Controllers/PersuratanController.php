<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\PersuratanModel;
use Illuminate\Http\Request;
use Validator;

class PersuratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PersuratanModel::with('penduduk')->paginate(5);
        $dataAll = PersuratanModel::selectRaw('count(persuratan_id) as jumlah')->first();
        $active = 'persuratan';
        return view('dashboard.persuratan', compact('data', 'dataAll', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persuratan.create');
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            return $this->index();
        } else {
            try {
                $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk'], 'like', '%' . $value . '%')->firstOrFail();

                $data = PersuratanModel::whereAny(['penduduk_id'], $id->penduduk_id)->paginate(3);
            } catch (\Exception $e) {
                return '<p class="text-center font-bold text-xl text-neutral-10" id="umkm">Data Tidak Ditemukan <p>';
            }


            $active = 'persuratan';
        }

        return view('dashboard.persuratan', compact('data', 'active'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NIK' => 'required',
            'keterangan' => 'required',
        ], [
            'keterangan.required' => 'Keterangan harus diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('flash', ['error', $validator->messages()->get('keterangan')[0]]);
        }

        $penduduk = PendudukModel::select('penduduk_id')->where('NIK', $request->NIK)->first();

        if ($penduduk) {
            // Get the last nomor_surat from the database
            $lastSurat = PersuratanModel::orderBy('nomor_surat', 'desc')->first();
            if ($lastSurat) {
                // Extract the number part (assumes format is '09.006/RW06/VI/2024')
                $lastNumber = (int) substr(explode('/', $lastSurat->nomor_surat)[0], 3);
                $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); // Increment and pad to 3 digits
            } else {
                $newNumber = '001'; // Starting number if no records exist
            }

            // Convert the current month to Roman numerals
            $romanMonths = [
                1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
                5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
                9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
            ];
            $currentMonth = $romanMonths[date('n')];

            // Get the current year
            $currentYear = date('Y');

            // Generate the new nomor_surat
            $nomorSurat = '09.' . $newNumber . '/RW06/' . $currentMonth . '/' . $currentYear;

            // Create the new record
            PersuratanModel::create([
                'penduduk_id' => $penduduk->penduduk_id,
                'nomor_surat' => $nomorSurat,
                'keterangan' => $request->keterangan,
                'tanggal_persuratan' => now()
            ]);

            return redirect('dashboard/persuratan')->with('flash', ['success', 'Data Berhasil Ditambah']);
        } else {
            return redirect('dashboard/persuratan')->with('flash', ['error', 'NIK tidak ditemukan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $persuratan = PersuratanModel::findOrFail($id);
        return view('persuratan.show', compact('persuratan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persuratan = PersuratanModel::find($id);
        return view('persuratan.edit', compact('persuratan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'nomor_surat' => 'required',
            'keterangan' => 'required',
            'tanggal_persuratan' => 'required'
        ]);

        PersuratanModel::find($id)->update($request->all());
        return redirect()->route('persuratan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = PersuratanModel::findOrFail($id)->delete();
        return redirect('dashboard/persuratan')->with('flash', ['success', 'Data Berhasil Dihapus']);
    }
}
