<?php

namespace App\Http\Controllers;

use App\Models\StatusNikahModel;
use Illuminate\Http\Request;

class StatusNikahController extends Controller
{
    public function pengajuan()
    {
        $data = StatusNikahModel::all();

        return view('component.statusNikah', ['data' => $data]);
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            $data = StatusNikahModel::all();

            return view('component.statusNikah', ['data' => $data]);

        } else {

            $data = StatusNikahModel::whereAny(['nama_pengaju', 'nama_pasangan', 'status', 'id_status_nikah'], 'like', '%' . $value . '%')->get();

        }

        return view('component.statusNikah', ['data' => $data]);
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
