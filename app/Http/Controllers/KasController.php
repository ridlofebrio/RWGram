<?php

namespace App\Http\Controllers;

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
        $data = KasModel::all();

        return view("kas.index", $data = ['data' => $data]);
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
        KasModel::create([
            'kartu_keluarga_id' => $request->kartu_keluarga,
            'jumlah_kas' => $request->kas,
            'tanggal_kas' => $request->tanggal
        ]);

        return redirect('/kas')->with('success', 'Data berhasil ditambah');
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
