<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\StatusHidupModel;
use Illuminate\Http\Request;

class StatusHidupController extends Controller
{
    public function index()
    {
        $metadata = (object) [
            'title' => 'Status Hidup',
            'description' => 'Halaman Ubah Status Warga'
        ];
        $hidup = StatusHidupModel::all();
        return view('statusHidup.index', compact('hidup'))->with(['metadata' => $metadata, 'activeMenu' => 'hidup']);
    }
    public function create()
    {
        $metadata = (object) [
            'title' => 'Status Hidup',
            'description' => 'Halaman Ubah Status Hidup Warga'
        ];
        return view('statusHidup.create', ['activeMenu' => 'hidup', 'metadata' => $metadata]);
    }


    public function pengajuan()
    {
        $data = StatusHidupModel::with('Penduduk', 'PendudukM')->get();

        return view('component.statusHidup', ['data' => $data]);
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            $data = StatusHidupModel::all();

            return view('component.statusHidup', ['data' => $data]);

        } else {

            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->first();

            $data = StatusHidupModel::whereAny(['penduduk_id', 'id_penduduk_meninggal'], $id->penduduk_id)->get();

        }

        return view('component.statusHidup', ['data' => $data]);
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
