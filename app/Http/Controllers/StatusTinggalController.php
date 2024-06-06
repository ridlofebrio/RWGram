<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\StatusTinggalModel;
use Illuminate\Http\Request;
use Validator;


class StatusTinggalController extends Controller
{
    public function index(Request $request)
    {
        $metadata = (object) [
            'title' => 'Status Tinggal',
            'description' => 'Halaman Ubah Status Warga'
        ];

        $status = $request->query('status');
        $query = StatusTinggalModel::query();

        if ($request->has('search')) {
            $tinggal = $query->whereHas('penduduk', function ($query) use ($request) {
                $query->where('nama_penduduk', 'like', '%' . $request->search . '%');
            });
        }

        if ($status) {
            $query->where('status_pengajuan', $status);
        }

        $tinggal = $query->paginate(5);

        return view('statusTinggal.index', compact('tinggal'))->with(['metadata' => $metadata, 'activeMenu' => 'permohonan']);
    }



    public function create()
    {
        $metadata = (object) [
            'title' => 'Status Tinggal',
            'description' => 'Halaman Ubah tinggal Warga'
        ];
        return view('statusTinggal.create', ['activeMenu' => 'permohonan', 'metadata' => $metadata]);
    }

    public function pengajuan()
    {
        $data = StatusTinggalModel::with('penduduk')->paginate(3);
        StatusTinggalModel::where('terbaca', '=', '0')->update([
            'terbaca' => 1
        ]);

        return view('component.statusTinggal', ['data' => $data]);
    }

    public function sort($sort = 'menunggu')
    {
        $data = StatusTinggalModel::where('status_pengajuan', $sort)->with('penduduk')->paginate(3);

        return view('component.statusTinggal', ['data' => $data]);
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            $data = StatusTinggalModel::paginate(3);

            return view('component.statusTinggal', ['data' => $data]);
        } else {

            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->first();
            if ($id) {
                $data = StatusTinggalModel::whereAny(['penduduk_id'], $id->penduduk_id)->paginate(3);
            } else {
                $data = StatusTinggalModel::whereAny(['penduduk_id'], 0)->paginate(3);
            }
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
            'foto_umkm' => 'required',
            'asset_id' => 'required',
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK)->first();

        if ($penduduk) {
            StatusTinggalModel::create([
                'penduduk_id' => $penduduk->penduduk_id,
                'alamat_pindah' => $request->alamat_pindah,
                'status' => $request->status,
                'foto_bukti' => $request->foto_umkm,
                'asset_id' => $request->asset_id
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
        // dd($request);


        $validasi = Validator::make($request->all(), [

            'status_pengajuan' => 'required',
            'status_tinggal' => 'required',
            'status_pindah' => 'required',
            'id_penduduk' => 'required',

        ]);

        if ($validasi->fails()) {
            dd($validasi);
        }


        try {
            $model = StatusTinggalModel::findOrFail($id);
            $model->status_pengajuan = $request->status_pengajuan;
            $model->save();
        } catch (\Exception $e) {
            dd($e);
        }

        try {
            $penduduk = PendudukModel::findOrFail($request->id_penduduk);
            $penduduk->status_tinggal = $request->status_tinggal;
            $penduduk->alamat = $request->status_pindah;
            $penduduk->save();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('dashboard/pengajuan')->with('flash', ['success', 'Data berhasil dikonfirmasi']);
    }
    public function destroy(string $id)
    {
        $laporan = StatusTinggalModel::findOrFail($id)->delete();
    }


    public function indexFind(Request $request)
    {
        $metadata = (object) [
            'title' => 'Status Tinggal',
            'description' => 'Halaman Ubah Status Warga'
        ];

        $search = $request->input('search');
        if (empty($search)) {
            $data = StatusTinggalModel::paginate(5);
        } else {
            $data = StatusTinggalModel::whereHas('penduduk', function ($query) use ($search) {
                $query->where('nama_penduduk', 'like', '%' . $search . '%')
                    ->orWhere('NIK', 'like', '%' . $search . '%');
            })->paginate(3);
        }

        return view('statusTinggal.index', ['tinggal' => $data])->with(['metadata' => $metadata, 'activeMenu' => 'permohonan']);
    }
}
