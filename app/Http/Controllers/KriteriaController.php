<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();

        return view('dashboard.bansos', ['kriteria' => $kriteria, 'active' => 'bansos']);
    }

    public function update(Request $request, string $id)
    {
        $kriteria = Kriteria::find($id);

        $validatedData = $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'attribut' => 'required',
        ]);

        $kriteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'attribut' => $request->attribut,
        ]);

        return redirect('/dashboard/bansos')->with('flash', ['success', 'data berhasil diupdate']);
    }
}
