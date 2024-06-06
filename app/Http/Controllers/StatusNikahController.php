<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\StatusNikahModel;
use Illuminate\Http\Request;

class StatusNikahController extends Controller
{

    public function pengajuan()
    {
        $data = StatusNikahModel::with('penduduk')->paginate(3);
        StatusNikahModel::where('terbaca', '=', '0')->update([
            'terbaca' => 1
        ]);
        return view('component.statusNikah', ['data' => $data]);
    }

    public function sort($sort = 'menunggu')
    {
        $data = StatusNikahModel::where('status_pengajuan', $sort)->with('penduduk')->paginate(3);

        return view('component.statusNikah', ['data' => $data]);
    }
    public function find($value)
    {
        if ($value == 'kosong') {
            $data = StatusNikahModel::paginate(3);

            return view('component.statusNikah', ['data' => $data]);
        } else {

            $data = StatusNikahModel::whereAny(['penduduk_id', 'nama_pasangan', 'status', 'id_status_nikah'], 'like', '%' . $value . '%')->paginate(3);
        }

        return view('component.statusNikah', ['data' => $data]);
    }

    public function index(Request $request)
    {
        $metadata = (object) [
            'title' => 'Status Nikah',
            'description' => 'Halaman Ubah Status Warga'
        ];

        
        $status = $request->query('status');
        $query = StatusNikahModel::query();

        if ($request->has('search')) {
            $nikah = $query->whereHas('penduduk', function ($query) use ($request) {
                $query->where('nama_penduduk', 'like', '%' . $request->search . '%');
            });
        }

        if ($status) {
            $query->where('status_pengajuan', $status);
        }

        $nikah = $query->paginate(5);

        return view('statusNikah.index', compact('nikah'))->with(['metadata' => $metadata, 'activeMenu' => 'permohonan']);
    }



    public function create()
    {
        $metadata = (object) [
            'title' => 'Status Nikah',
            'description' => 'Halaman Ubah Status Nikah Warga'
        ];
        return view('statusNikah.create', ['activeMenu' => 'permohonan', 'metadata' => $metadata]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK_pengaju' => 'required',
            'NIK_pasangan' => 'required',
            'nama_pasangan' => 'required',
            'status' => 'required',
            // 'foto_bukti' => 'required',
            'foto_umkm' => 'required',
            'asset_id' => 'required',
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK_pengaju)->first();

        if ($penduduk) {
            StatusNikahModel::create([
                'penduduk_id' => $penduduk->penduduk_id,
                'NIK_pasangan' => $request->NIK_pasangan,
                'nama_pasangan' => $request->nama_pasangan,
                'status' => $request->status,
                'foto_bukti' => $request->foto_umkm,
                'asset_id' => $request->asset_id
            ]);
            return redirect()->route('nikah.penduduk.index')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('nikah.penduduk.create')
                ->with('error', 'NIK Anda tidak ditemukan.');
        }
    }

    public function edit(string $id)
    {
        $laporan = StatusNikahModel::find($id);
        return view('', compact(''));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_pengajuan' => 'required'
        ]);

        StatusNikahModel::find($id)->update($request->all());
        return redirect('dashboard/pengajuan')->with('flash', ['success', 'Data berhasil dikonfirmasi']);
    }

    public function destroy(string $id)
    {
        $laporan = StatusNikahModel::findOrFail($id)->delete();
    }


}
