<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluargaModel;
use App\Models\KasDetailModel;
use App\Models\KasModel;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('sum(jumlah_kas)')->toArray();
        $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('MONTH(tanggal_kas)')->toArray();
        $jumlah = 0;
        $data = array_map('intval', $data);
        foreach ($data as $key) {
            $jumlah += $key;
        }


        $kas = KasDetailModel::with('kartuKeluarga')->get();
        // $kk = KartuKeluargaModel::all();




        $active = 'kas';
        return view("dashboard.kas", compact('data', 'active', 'tgl', 'jumlah', 'kas'));
    }


    public function pengeluaran()
    {
        //

        $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('sum(jumlah_kas)')->toArray();
        $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('MONTH(tanggal_kas)')->toArray();
        $jumlah = 0;
        $data = array_map('intval', $data);
        foreach ($data as $key) {
            $jumlah += $key;
        }


        $kas = KasDetailModel::with('kartuKeluarga')->get();
        // $kk = KartuKeluargaModel::all();




        $active = 'kas';
        return view("component.pengeluaran", compact('data', 'active', 'tgl', 'jumlah', 'kas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("kas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

        $kas = KasDetailModel::findOrFail($kk->kartu_keluarga_id);

        foreach ($request->cek as $key => $value) {


            KasModel::create([
                'id_kas' => $kas->id_kas,
                'jumlah_kas' => $request->$value[2],
                'tanggal_kas' => $request->$value[1]
            ]);
            $kas->$value = 1;
            $kas->save();

        }


        return redirect('/dashboard/kas')->with('flash', ['success', 'Data berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kas = KasModel::find($id);

        return view('kas.show', $data = ['data' => $kas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kas = KasModel::find($id);

        return view('kas.edit', $data = ['data' => $kas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = KasModel::find($id);

        $data->update([
            'kartu_keluarga_id' => $request->kartu_keluarga,
            'jumlah_kas' => $request->kas,
            'tanggal_kas' => $request->tanggal
        ]);

        return redirect('/kas')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            KasModel::destroy($id);

            return redirect('/kas')->with('success', 'Data berhasil dihapus');
        } catch (e) {
            return redirect('/kas')->with('error', 'Data Gagal dihapus');
        }
    }
}
