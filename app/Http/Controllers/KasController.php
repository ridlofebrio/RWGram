<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluargaModel;
use App\Models\KasDetailModel;
use App\Models\KaslogModel;
use App\Models\KasModel;
use App\Models\PendudukModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Barryvdh\DomPDF\Facade\PDF;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')->join('kas', 'kas.id_kas', 'detail_kas.id_kas')->whereRaw('kas.')->pluck('sum(jumlah_kas)')->toArray();
        // $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')->pluck('MONTH(tanggal_kas)')->toArray();




        $auth = Auth::user()->user_id;
        switch ($auth) {
            case '1':
                # code...

                $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')->join('kas', 'kas.id_kas', 'detail_kas.id_kas')->whereRaw('kas.kartu_keluarga_id is null')->pluck('sum(jumlah_kas)')->toArray();
                // dd($data);
                $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')->join('kas', 'kas.id_kas', 'detail_kas.id_kas')->whereRaw('kas.kartu_keluarga_id is null')->pluck('MONTH(tanggal_kas)')->toArray();
                $kas = KasDetailModel::with('user')
                    ->where('kartu_keluarga_id', null)
                    ->get();

                break;
            case '3':
                # code...
                $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 1')
                    ->pluck('sum(jumlah_kas)')
                    ->toArray();
                // dd($data);
                $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 1')
                    ->pluck('MONTH(tanggal_kas)')
                    ->toArray();

                $kas = KasDetailModel::with('user')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->with('kartuKeluarga.penduduk', 'kartuKeluarga.kartuKeluarga')
                    ->whereRaw('kartu_keluarga.rt_id = 1')
                    ->get();
                // dd($kas);
                break;
            case '5':
                # code...

                $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 2')
                    ->pluck('sum(jumlah_kas)')
                    ->toArray();
                // dd($data);
                $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id =2')
                    ->pluck('MONTH(tanggal_kas)')
                    ->toArray();

                $kas = KasDetailModel::with('user')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->with('kartuKeluarga.penduduk', 'kartuKeluarga.kartuKeluarga')
                    ->whereRaw('kartu_keluarga.rt_id = 2')
                    ->get();

                break;
            case '6':
                # code...
                $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 3')
                    ->pluck('sum(jumlah_kas)')
                    ->toArray();
                // dd($data);
                $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 3')
                    ->pluck('MONTH(tanggal_kas)')
                    ->toArray();

                $kas = KasDetailModel::with('user')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->with('kartuKeluarga.penduduk', 'kartuKeluarga.kartuKeluarga')
                    ->whereRaw('kartu_keluarga.rt_id = 3')
                    ->get();

                break;

            case '4':
                # code...

                $data = KasModel::selectRaw('sum(jumlah_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 4')
                    ->pluck('sum(jumlah_kas)')
                    ->toArray();
                // dd($data);
                $tgl = KasModel::selectRaw('MONTH(tanggal_kas)')->groupByRaw('Month(tanggal_kas)')
                    ->join('kas', 'kas.id_kas', 'detail_kas.id_kas')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 4')
                    ->pluck('MONTH(tanggal_kas)')
                    ->toArray();

                $kas = KasDetailModel::with('user')
                    ->with('kartuKeluarga.penduduk', 'kartuKeluarga.kartuKeluarga')
                    ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'kas.kartu_keluarga_id')
                    ->whereRaw('kartu_keluarga.rt_id = 4')
                    ->get();

                break;

            default:
                # code...
                break;
        }
        // $kk = KartuKeluargaModel::all();

        $data = array_map('intval', $data);

        $jumlah = intval(KasModel::selectRaw('sum(jumlah_kas) as total')->first()->total);

        $active = 'kas';
        return view("dashboard.kas", compact('data', 'active', 'tgl', 'jumlah', 'kas'));
    }

    public function detailKas($kk)
    {


        try {

            $data = KasModel::where('id_kas', $kk)->with('kas')->get();

        } catch (\Exception $e) {
            dd($e);
        }

        // dd($data);
        return view('component.detail_kas', compact('data'));
    }

    public function pengeluaran()
    {
        //



        $kas = KaslogModel::where('user_id', Auth::user()->user_id)->get();


        $data = KasLogModel::selectRaw('sum(jumlah)')->groupByRaw('Month(created_at)')->where('user_id', Auth::user()->user_id)->pluck('sum(jumlah)')->toArray();
        $tgl = KasLogModel::selectRaw('MONTH(created_at)')->groupByRaw('Month(created_at)')->pluck('MONTH(created_at)')->toArray();
        // $jumlah = intval(KasModel::selectRaw('sum(jumlah_kas) as total')->first()->total);
        $data = array_map('intval', $data);
        $active = 'kas';
        return view("component.pengeluaran", compact('kas', 'data', 'tgl', 'active'));
    }

    public function pengeluaranChart()
    {
        //



        $kas = KaslogModel::where('user_id', Auth::user()->user_id)->get();


        $data = KasLogModel::selectRaw('sum(jumlah)')->groupByRaw('Month(created_at)')->where('user_id', Auth::user()->user_id)->pluck('sum(jumlah)')->toArray();
        $tgl = KasLogModel::selectRaw('MONTH(created_at)')->groupByRaw('Month(created_at)')->pluck('MONTH(created_at)')->toArray();
        // $jumlah = intval(KasModel::selectRaw('sum(jumlah_kas) as total')->first()->total);
        $data = array_map('intval', $data);
        $merge = array('data' => $data, 'tgl' => $tgl);


        return response($merge);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("kas.create");
    }

    public function viewPDF()
    {

        $pdf = PDF::loadView('dashboard.pdf.kas')
            ->setPaper('a4', 'portrait');

        return $pdf->stream();
    }


    public function find($value)
    {
        if ($value == 'kosong') {


            return $this->index();
        } else {
            $user = Auth::user();
            try {

                $id = PendudukModel::with('kartuKeluarga', 'kartuKeluarga.rt')->whereAny(['nama_penduduk', 'NIK'], 'like', '%' . $value . '%')->firstOrFail();
            } catch (\Exception $e) {
                return '<p class="text-center font-bold text-xl text-neutral-10" id="umkm">Data Tidak Ditemukan <p>';
            }
            // dd($id);

            if ($id->kartuKeluarga->rt->rt_id == $user->role_id) {
                if ($id) {

                    $kas = KasDetailModel::where('kartu_keluarga_id', '=', $id->kartu_keluarga_id)->paginate(3);

                } else {
                    $kas = KasDetailModel::where('kartu_keluarga_id', '=', 0)->paginate(3);
                }
            }


        }

        return view("component.kas", compact('kas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);

        $kas = '';

        $auth = Auth::user()->user_id;
        switch ($auth) {
            case '1':
                # code...

                $kk = User::where('nama_user', '=', $request->nama_user)->first();
                // dd($request->nama_user);
                $kas = KasDetailModel::where('user_id', $kk->user_id)->first();

                break;

            default:
                try {

                    $kk = KartuKeluargaModel::where('NKK', '=', $request->NKK)->first();

                    $kas = KasDetailModel::where('kartu_keluarga_id', $kk->kartu_keluarga_id)->firstOrFail();

                    break;
                } catch (\Exception $e) {
                    return $e;
                }
        }

        foreach ($request->cek as $key => $value) {

            KasModel::create([
                'id_kas' => $kas->id_kas,
                'bulan' => $request->$value[0],
                'jumlah_kas' => $request->$value[2],
                'tanggal_kas' => $request->$value[1]
            ]);
            $kas->$value = 1;
            $kas->save();

        }


        return redirect('/dashboard/kas')->with('flash', ['success', 'Data berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kas = KasModel::with('kas', 'kartuKeluarga')->find($id);

        return view('kas.show', ['data' => $kas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kas = KasModel::find($id);

        return view('kas.edit', $data = ['data' => $kas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = KasModel::find($id);

        $data->update([
            'kartu_keluarga_id' => $request->kartu_keluarga,
            'jumlah_kas' => $request->kas,
            'tanggal_kas' => $request->tanggal
        ]);

        return redirect('/kas')->with('success', 'Data berhasil diupdate');
    }

    public function storePengeluaran(Request $request)
    {

        // dd($request);
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'keterangan_kas_log' => 'required',
            'Jumlah' => 'required'
        ]);

        if ($validate->fails()) {

            return redirect()->back()->with('flash', ['error', 'data gagal ditambah']);
        }

        try {
            KaslogModel::create([
                'user_id' => $request->user_id,
                'keterangan_kas_log' => $request->keterangan_kas_log,
                'jumlah' => $request->Jumlah
            ]);
        } catch (\Exception $e) {
            return $e;
        }

        return redirect(url('/dashboard/kas'))->with('flash', ['success', 'Data berhasil ditambah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            KasModel::where('id_kas', $id)->delete();
            KasDetailModel::destroy($id);

            return redirect('/dashboard/kas')->with('flash', ['success', 'Data berhasil dihapus']);
        } catch (e) {
            return redirect('/dashboard/kas')->with('flash', ['error', 'Data gagal dihapus']);
        }
    }
    public function destroyPengeluaran($kk)
    {
        //

        try {

            KaslogModel::destroy($kk);

            return redirect('/dashboard/kas')->with('flash', ['success', 'Data berhasil dihapus']);
        } catch (e) {
            return redirect('/dashboard/kas')->with('flash', ['error', 'Data gagal dihapus']);
        }
    }
}
