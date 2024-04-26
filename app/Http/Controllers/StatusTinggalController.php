<?php

namespace App\Http\Controllers;

use App\Models\StatusTinggalModel;
use Illuminate\Http\Request;

class StatusTinggalController extends Controller
{
    
    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK' => 'required',
            'alamat_asal' => 'required',
            'alamat_pindah' => 'required',
            'status' => 'required',
            'foto_bukti' => 'required',
        ]);

        StatusTinggalModel::create($request->all());
        return redirect()->route('');

    }

    public function edit(string $id)
    {
        $laporan = StatusTinggalModel::find($id);
        return view('', compact(''));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK' => 'required',
            'alamat_asal' => 'required',
            'alamat_pindah' => 'required',
            'status' => 'required',
            'foto_bukti' => 'required',
        ]);

        StatusTinggalModel::find($id)->update($request->all());
        return redirect('');
    }
    public function destroy(string $id)
    {
        $laporan = StatusTinggalModel::findOrFail($id)->delete();
    }
}
