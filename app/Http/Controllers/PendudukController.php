<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluargaModel;
use App\Models\KasDetailModel;
use App\Models\KepalaKeluargaModel;
use App\Models\PendudukModel;
use App\Models\RtModel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = Auth::user();
        try {
            $penduduk = PendudukModel::with('kartuKeluarga', 'kartuKeluarga.rt')
                ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'penduduk.kartu_keluarga_id')
                ->join('rt', 'kartu_keluarga.rt_id', 'rt.rt_id')
                ->where('isDelete', '=', '0')
                ->where('rt.rt_id', $user->role_id)
                ->paginate(3);
            $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')->paginate(3);

            if ($user->user_id == 1) {
                $penduduk = PendudukModel::with('kartuKeluarga', 'kartuKeluarga.rt')


                    ->where('isDelete', '=', '0')

                    ->paginate(3);
                $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')->paginate(3);
            } else {
                $penduduk = PendudukModel::with('kartuKeluarga', 'kartuKeluarga.rt')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'penduduk.kartu_keluarga_id')
                    ->join('rt', 'kartu_keluarga.rt_id', 'rt.rt_id')
                    ->where('isDelete', '=', '0')
                    ->where('rt.rt_id', $user->role_id)
                    ->paginate(3);
                $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kepala_keluarga.kartu_keluarga_id')
                    ->join('rt', 'kartu_keluarga.rt_id', 'rt.rt_id')
                    ->where('rt.rt_id', $user->role_id)->paginate(3);
            }





        } catch (\Exception $error) {
            dd($error);
        }



        return view('dashboard.penduduk', ['data' => $penduduk, 'active' => 'penduduk'], compact('kartuKeluarga'));
    }

    public function viewPDF()
    {

        $pdf = PDF::loadView('dashboard.pdf.penduduk', array('data' => PendudukModel::all()))
            ->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function rt($id)
    {
        if ($id == 'rw') {

            return $this->index();
        } else {
            $penduduk = PendudukModel::with('kartuKeluarga', 'kartuKeluarga.rt')
                ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'penduduk.kartu_keluarga_id')
                ->join('rt', 'kartu_keluarga.rt_id', 'rt.rt_id')
                ->where('isDelete', '=', '0')
                ->where('rt.rt_id', $id)
                ->paginate(3);
            $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')
                ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kepala_keluarga.kartu_keluarga_id')
                ->join('rt', 'kartu_keluarga.rt_id', 'rt.rt_id')
                ->where('rt.rt_id', $id)->paginate(3);
        }

        return view('dashboard.penduduk', ['data' => $penduduk, 'active' => 'penduduk'], compact('kartuKeluarga'));
    }

    public function sort($sort)
    {
        //

        if ($sort == 'semua') {
            return $this->index();
        }
        $penduduk = PendudukModel::where([['isDelete', '=', '0'], ['jenis_kelamin', '=', $sort]])->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(3);

        $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')->paginate(1);


        return view('dashboard.penduduk', ['data' => $penduduk, 'active' => 'penduduk'], compact('kartuKeluarga'));
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        $csv = array_map('str_getcsv', file($file));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        // dd($csv);




        foreach ($csv as $line) {


            $validate = Validator::make($line, [
                'NKK' => 'required',
                'NIK' => 'required',
                'nama' => 'required',
                'Tempat_Lahir' => 'required',
                'Tanggal_Lahir' => 'required',
                'Jenis_Kelamin' => 'required',
                'golongan_darah' => 'required',
                'Agama' => 'required',
                'Alamat' => 'required',
                'rt' => 'required',
                'Status_Perkawinan' => 'required',
                'Pekerjaan' => 'required',
                'status_tinggal' => 'required',

            ]);


            if ($validate->fails()) {
                dd($validate->messages());
            }

            try {
                $penduduk = PendudukModel::where('NIK', $request->NIK)->firstOrFail();
                return redirect()->back()->with('flash', ['error', 'Data sudah ada']);
            } catch (\Exception $e) {
                if (PendudukModel::where('NIK', '=', $line['NIK'])->first()) {

                    continue;
                }



                $kk = KartuKeluargaModel::where('NKK', '=', $line['NKK'])->first();

                if ($kk == null) {
                    $kk = KartuKeluargaModel::create([
                        'NKK' => $line['NKK'],
                        'rt_id' => RtModel::where('nomor_rt', '=', $line['rt'])->first()->rt_id,
                        'tanggal_kk' => now(),
                        'no_telepon' => '+62'
                    ]);

                    try {
                        $kas = KasDetailModel::create([
                            'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                            'tahun' => date("Y"),
                        ]);
                    } catch (\Exception $e) {
                        dd($e);
                    }

                }





                $data = PendudukModel::create([
                    'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                    'NIK' => $line['NIK'],
                    'nama_penduduk' => $line['nama'],
                    'tempat_lahir' => $line['Tempat_Lahir'],
                    'tanggal_lahir' => date('Y-m-d', strtotime($line['Tanggal_Lahir'])),
                    'jenis_kelamin' => $line['Jenis_Kelamin'],
                    'golongan_darah' => $line['golongan_darah'],
                    'agama' => $line['Agama'],
                    'alamat' => $line['Alamat'],
                    'status_perkawinan' => $line['Status_Perkawinan'],
                    'pekerjaan' => $line['Pekerjaan'],
                    'status_tinggal' => $line['status_tinggal'],

                ]);

                $kepalaKeluarga = KepalaKeluargaModel::where('kartu_keluarga_id', $kk->kartu_keluarga_id)->first();
                if ($kepalaKeluarga == null) {
                    KepalaKeluargaModel::create([
                        'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                        'penduduk_id' => $data->penduduk_id
                    ]);
                }
            }
        }


        return redirect()->back()->with('flash', ['success', 'Data CSV Berhasil Di import']);
    }



    /**
     * Show the form for creating a new resource.
     */


    public function find($type, $value)
    {

        if ($value == 'kosong') {
            $data = PendudukModel::where('isDelete', '=', '0')->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(3);
            $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')->paginate(3);


            return view('dashboard.penduduk', ['data' => $data, 'active' => 'penduduk', 'kartuKeluarga' => $kartuKeluarga]);
        }

        if ($type == 'umkm') {

            $kartuKeluarga = KepalaKeluargaModel::with('penduduk', 'kartuKeluarga')->paginate(1);
            $data = PendudukModel::where('isDelete', '=', '0')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(3);

            return view('dashboard.penduduk', ['data' => $data, 'active' => 'penduduk'], compact('kartuKeluarga'));

        } elseif ($type == 'umkm1') {
            $data = PendudukModel::where('isDelete', '=', '0')->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(1);
            $id = PendudukModel::select('penduduk_id')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->first();

            if ($id) {

                $kartuKeluarga = KepalaKeluargaModel::whereAny(['penduduk_id'], $id->penduduk_id)->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(3);
            } else {
                $kartuKeluarga = KepalaKeluargaModel::whereAny(['penduduk_id'], 0)->with('kartuKeluarga', 'kartuKeluarga.rt')->paginate(3);
            }
            return view('dashboard.penduduk', ['data' => $data, 'active' => 'penduduk'], compact('kartuKeluarga'));

        }



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

        try {
            $penduduk = PendudukModel::where('NIK', $request->NIK)->firstOrFail();
            return redirect()->back()->with('flash', ['error', 'Data sudah ada']);
        } catch (\Exception $e) {
            $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

            if ($kk == null) {
                $kk = KartuKeluargaModel::create([
                    'NKK' => $request->NKK,
                    'rt_id' => RtModel::where('nomor_rt', '=', $request->rt)->first()->rt_id,
                    'tanggal_kk' => now(),
                    'no_telepon' => '+62'
                ]);


                try {
                    $kas = KasDetailModel::create([
                        'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                        'tahun' => date("Y"),
                    ]);
                } catch (\Exception $e) {
                    dd($e);
                }

            }

            $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

            $data = PendudukModel::create([
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
            $kepalaKeluarga = KepalaKeluargaModel::where('kartu_keluarga_id', $kk->kartu_keluarga_id)->first();
            if ($kepalaKeluarga == null) {
                KepalaKeluargaModel::create([
                    'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                    'penduduk_id' => $data->penduduk_id
                ]);
            }


        }


        return redirect('/dashboard/penduduk')->with('flash', ['success', 'Data berhasil ditambah']);
    }

    public function storeKepala(Request $request)
    {
        //  

        $validator = Validator::make($request->all(), [
            'NKK' => 'required',
            'NIK' => 'required'
        ]);

        $penduduk = PendudukModel::where('NIK', $request->NIK)->first()->penduduk_id;
        $kartu_keluarga = KartuKeluargaModel::where('NKK', $request->NKK)->first()->kartu_keluarga_id;

        KepalaKeluargaModel::create([
            'kartu_keluarga_id' => $kartu_keluarga,
            'penduduk_id' => $penduduk,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('flash', ['error', $validator->messages()]);
        }

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
            'description' => 'Data Penduduk',
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

    public function destroyKepala(string $id)
    {
        //

        try {
            $penduduk = KepalaKeluargaModel::findOrFail($id)->deleteOrFail();



            return redirect('dashboard/penduduk')->with('flash', ['success', 'Data berhasil dihapus']);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('dashboard/penduduk')->with('flash', ['error', 'Data Gagal dihapus karena data terkait dengan tabel lain']);
        }
    }
}
