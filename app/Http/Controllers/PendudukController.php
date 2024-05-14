<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluargaModel;
use App\Models\PendudukModel;
use App\Models\RtModel;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penduduk = PendudukModel::where('isDelete', '=', '0')->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(3);



        return view('dashboard.penduduk', ['data' => $penduduk, 'active' => 'penduduk']);
    }

    public function sort($sort)
    {
        //

        if ($sort == 'semua') {
            return $this->index();
        }
        $penduduk = PendudukModel::where([['isDelete', '=', '0'], ['jenis_kelamin', '=', $sort]])->with('kartuKeluarga', 'kartuKeluarga.rt')->get();




        return view('dashboard.penduduk', ['data' => $penduduk, 'active' => 'penduduk']);
    }



    /**
     * Show the form for creating a new resource.
     */


    public function find($value)
    {
        if ($value == 'kosong') {
            $data = PendudukModel::paginate(3);

            return view('dashboard.penduduk', ['data' => $data, 'active' => 'penduduk']);

        } else {

            $data = PendudukModel::whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->paginate(3);

        }

        return view('dashboard.penduduk', ['data' => $data, 'active' => 'penduduk']);
    }
    public function create()
    {
        //
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function list()
    {
        $penduduk = PendudukModel::all();

        return $penduduk;
    }
    public function store(Request $request)
    {
        //  

        $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

        if ($kk == null) {
            KartuKeluargaModel::create([
                'nkk' => $request->NKK,
                'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                'tanggal_kk' => now()
            ]);
        }

        $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

        PendudukModel::create([
            'kartu_keluarga_id' => $kk->kartu_keluarga_id,
            'NIK' => $request->NIK,
            'nama_penduduk' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'status_perkawinan' => $request->status_kawin,
            'pekerjaan' => $request->pekerjaan,
            'status_tinggal' => $request->status_tinggal,
            'status_kematian' => $request->status_meninggal

        ]);

        return redirect('/dashboard/penduduk')->with('flash', ['success', 'Data berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $penduduk = PendudukModel::find($id);

        return view('penduduk.show', ['data' => $penduduk]);
    }

    public function request()
    {
        $metadata = (object) [
            'title' => 'Data Diri',
            'description' => 'Data Diri Penduduk'
        ];
        return view('penduduk.penduduk.request', ['activeMenu' => 'dataDiri', 'metadata' => $metadata]);
    }

    public function showPenduduk(Request $request)
    {
        $penduduk = PendudukModel::where('NIK', $request->nik)->first();

        $metadata = (object) [
            'title' => 'Data Penduduk',
            'description' => $penduduk->nama_penduduk,
        ];

        $activeMenu = 'dataDiri';

        if ($penduduk !== null) {
            return view('penduduk.penduduk.show', compact('penduduk', 'metadata', 'activeMenu'));
        } else {
            return redirect()->route('data.penduduk.request')->with('error', 'Data diri tidak ditemukan.');
        }
    }

    public function edit(string $id)
    {
        //
        $penduduk = PendudukModel::with(
            array(
                'kartuKeluarga' => function ($query) {
                    $query->with('rt');
                }
            )
        )->find($id);

        return view('penduduk.edit', ['data' => $penduduk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $penduduk = PendudukModel::find($id);
        $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();
        $kkCek = false;
        if ($kk == null) {
            KartuKeluargaModel::create([
                'NKK' => $request->NKK,
                'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                'no_telepon' => $request->no_telp,
                'tanggal_kk' => now()
            ]);

            $kkCek = true;
        }

        $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

        $penduduk->update([
            'kartu_keluarga_id' => $kk->kartu_keluarga_id,
            'NIK' => $request->NIK,
            'nama_penduduk' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'status_perkawinan' => $request->status_kawin,
            'pekerjaan' => $request->pekerjaan,
            'status_tinggal' => $request->status_tinggal,
            'status_kematian' => $request->status_meninggal

        ]);

        if (!$kkCek) {
            $kk->update([
                'NKK' => $request->NKK,
                'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                'tanggal_kk' => now()
            ]);
        }

        return redirect('/dashboard/penduduk')->with('flash', ['success', 'data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            $penduduk = PendudukModel::findOrFail($id);
            $penduduk->isDelete = '1';
            $penduduk->save();


            return redirect('dashboard/penduduk')->with('flash', ['success', 'Data berhasil dihapus']);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('dashboard/penduduk')->with('flash', ['error', 'Data Gagal dihapus karena data terkait dengan tabel lain']);
        }
    }
}
