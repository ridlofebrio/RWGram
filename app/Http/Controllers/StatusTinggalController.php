<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\StatusTinggalModel;
use Illuminate\Http\Request;


class StatusTinggalController extends Controller
{
    public function index()
    {
        $metadata = (object) [
            'title' => 'Status Tinggal',
            'description' => 'Halaman Ubah Status Warga'
        ];
    
        // Menggunakan pagination, dengan 10 item per halaman
        $tinggal = StatusTinggalModel::paginate(5);
    
        return view('statusTinggal.index', compact('tinggal'))->with(['metadata' => $metadata, 'activeMenu' => 'permohonan']);
    }

    public function create()
    {
        $metadata = (object) [
            'title' => 'Status Tinggal',
            'description' => 'Halaman Ubah tinggal Warga'
        ];
        return view('statusTinggal.create', ['activeMenu' => 'tinggal', 'metadata' => $metadata]);
    }

    public function pengajuan()
    {
        $data = StatusTinggalModel::with('penduduk')->paginate(3);

        return view('component.statusTinggal', ['data' => $data]);
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            $data = StatusTinggalModel::paginate(3);

            return view('component.statusTinggal', ['data' => $data]);
        } else {

            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->paginate(3);
            $data = StatusTinggalModel::findMany($id);
        }

        return view('component.statusTinggal', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
            'alamat_pindah' => 'required',
            'status' => 'required',
            // 'foto_bukti' => 'required',
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK)->first();

        if ($penduduk) {
            StatusTinggalModel::create([
                'penduduk_id' => $penduduk->penduduk_id,
                'alamat_pindah' => $request->alamat_pindah,
                'status' => $request->status,
            ]);
            return redirect()->route('tinggal.penduduk.index')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('tinggal.penduduk.create')
                ->with('error', 'NIK Anda tidak ditemukan.');
        }
    }

    public function edit(string $id)
    {
        $laporan = StatusTinggalModel::find($id);
        return view('', compact(''));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_pengajuan' => 'required'
        ]);

        StatusTinggalModel::find($id)->update($request->all());
        return redirect('dashboard/pengajuan')->with('flash', ['success', 'Data berhasil dikonfirmasi']);
    }
    public function destroy(string $id)
    {
        $laporan = StatusTinggalModel::findOrFail($id)->delete();
    }
}
