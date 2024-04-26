<?php

namespace App\Http\Controllers;

use App\Models\StatusHidupModel;
use Illuminate\Http\Request;

class StatusHidupController extends Controller
{
    public function create()
    {
        return view('');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK_pengaju' => 'required',
            'nama_meninggal' => 'required',
            'NIK_meninggal' => 'required',
            'foto_bukti' => 'required',
            'status_pengajuan' => 'required'
        ]);

        StatusHidupModel::create($request->all());
    }
    public function edit(string $id)
    {
        $laporan = StatusHidupModel::find($id);
        return view('', compact(''));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK_pengaju' => 'required',
            'nama_meninggal' => 'required',
            'NIK_meninggal' => 'required',
            'foto_bukti' => 'required',
            'status_pengajuan' => 'required'
        ]);

        StatusHidupModel::find($id)->update($request->all());
        return redirect('');
       
    }
    public function destroy(string $id)
    {
        $laporan = StatusHidupModel::findOrFail($id)->delete();
    }
}
