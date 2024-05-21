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

        // Menggunakan pagination, dengan 10 item per halaman
        $hidup = StatusHidupModel::paginate(3);
        StatusHidupModel::where('terbaca', '=', '0')->update([
            'terbaca' => 1
        ]);

        return view('statusHidup.index', compact('hidup'))->with(['metadata' => $metadata, 'activeMenu' => 'permohonan']);
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
        $data = StatusHidupModel::with('Penduduk', 'PendudukM')->paginate(3);
        $hidup = StatusHidupModel::paginate(3);
        StatusHidupModel::where('terbaca', '=', '0')->update([
            'terbaca' => 1
        ]);
        return view('component.statusHidup', ['data' => $data]);
    }

    public function sort($sort = 'menunggu')
    {
        $data = StatusHidupModel::where('status_pengajuan', $sort)->with('penduduk')->paginate(3);


        return view('component.statusHidup', ['data' => $data]);
    }

    public function find($value)
    {
        if ($value == 'kosong') {
            $data = StatusHidupModel::paginate(3);

            return view('component.statusHidup', ['data' => $data]);
        } else {

            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->first();

            $data = StatusHidupModel::whereAny(['penduduk_id', 'id_penduduk_meninggal'], $id->penduduk_id)->paginate(3);
        }

        return view('component.statusHidup', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK_pengaju' => 'required',
            'NIK_meninggal' => 'required',
            // 'foto_bukti' => 'required', // Uncomment if needed
        ]);

        $penduduk_pengaju = PendudukModel::where('NIK', $request->NIK_pengaju)->first();
        $penduduk_meninggal = PendudukModel::where('NIK', $request->NIK_meninggal)->first();

        if ($penduduk_pengaju && $penduduk_meninggal) {
            StatusHidupModel::create([
                'penduduk_id' => $penduduk_pengaju->penduduk_id,
                'id_penduduk_meninggal' => $penduduk_meninggal->penduduk_id,
            ]);

            return redirect()->route('hidup.penduduk.index')
                ->with('success', 'Data Berhasil Ditambahkan');
        } else {
            $error = !$penduduk_pengaju ? 'NIK Anda tidak ditemukan.' : 'NIK orang yang meninggal tidak ditemukan.';
            return redirect()->route('hidup.penduduk.create')->with('error', $error);
        }
    }

    public function edit(string $id)
    {
        $laporan = StatusHidupModel::find($id);
        return view('', compact(''));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_pengajuan' => 'required'
        ]);


        $status = StatusHidupModel::find($id);
        $status->status_pengajuan = $request->status_pengajuan;
        $status->save();
        return redirect('dashboard/pengajuan')->with('flash', ['success', 'Data berhasil dikonfirmasi']);
    }

    public function destroy(string $id)
    {
        $laporan = StatusHidupModel::findOrFail($id)->delete();
    }
}
