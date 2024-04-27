<?php

namespace App\Http\Controllers;

use App\Models\StatusNikahModel;
use Illuminate\Http\Request;

class StatusNikahController extends Controller
{
    public function create()
    {
        return view('statusNikah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK_pasangan' => 'required',
            'nama_pasangan' => 'required',
            'NIK_pengaju' => 'required',
            'status' => 'required',
            'foto_bukti' => 'required',
        ]);

        StatusNikahModel::create($request->all());
        return redirect()->route('');
    }
    public function edit(string $id)
    {
        $laporan = StatusNikahModel::find($id);
        return view('', compact(''));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK_pasangan' => 'required',
            'nama_pasangan' => 'required',
            'NIK_pengaju' => 'required',
            'status' => 'required',
            'foto_bukti' => 'required',
        ]);

        StatusNikahModel::find($id)->update($request->all());
        return redirect('');
    }
    public function destroy(string $id)
    {
        $laporan = StatusNikahModel::findOrFail($id)->delete();
    }
}
