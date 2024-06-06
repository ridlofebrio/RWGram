<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use App\Models\informasi;
use Carbon\Carbon;
use App\Models\User;
use Cloudinary\Api\Admin\AdminApi;
use Illuminate\Http\Request;
use \Validator;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = InformasiModel::all();

        return view('informasi.index', ['informasi' => $informasi]);
    }

    public function dashboard()
    {
        $informasi = InformasiModel::where('upload', 1)->get();
        $pengumuman = InformasiModel::all();
        return view('dashboard.KarangTaruna.index', ['active' => 'beranda'], compact('informasi', 'pengumuman'));
    }

    public function getUpload()
    {
        $pengumuman = InformasiModel::where('upload', 0)->get();

        return view('component.informasi', compact('pengumuman'));
    }

    public function informasi()
    {
        $pengumuman = InformasiModel::where('upload', 1)->get();

        return view('dashboard.KarangTaruna.informasi', ['active' => 'informasi'], compact('pengumuman'));
    }

    public function pengumuman()
    {
        $informasi = InformasiModel::all();

        return view('dashboard.KarangTaruna.pengumuman', ['active' => 'pengumuman'], compact('informasi'));
    }

    public function informasiDetail()
    {
    }

    public function indexPenduduk()
    {
        // Mendapatkan tanggal 7 hari ke belakang dari hari ini
        $sevenDaysAgo = Carbon::today()->subDays(7);

        // Menghapus informasi yang memiliki tanggal lebih dari 7 hari sebelum hari ini
        InformasiModel::whereDate('tanggal_informasi', '<', $sevenDaysAgo)->delete();

        $informasi = InformasiModel::query();
        if (request()->has('search')) {
            $informasi->where('judul', 'like', '%' . request('search') . '%');
        }

        $informasi = $informasi->get();
        $metadata = (object) [
            'title' => 'Pengumuman',
            'description' => 'Pengumuman untuk penduduk'
        ];

        // Mengonversi format tanggal informasi
        foreach ($informasi as $info) {
            $info = date('d F Y', strtotime($info->tanggal_informasi));
        }


        return view('informasi.penduduk.index')->with(['informasi' => $informasi, 'activeMenu' => 'pengumuman', 'metadata' => $metadata]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $informasi = InformasiModel::where('judul', 'like', "%$search%")->get();
        return view('informasi.penduduk.index', compact('informasi'));
    }

    public function create()
    {
        $user = User::all();
        return view('informasi.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        // melakukan validasi data
        // dd($request);
        $validator = Validator::make($request->all(), [

            'judul' => 'required|string',
            'deskripsi_informasi' => 'required|string',
            'foto_informasi' => 'required',
            'lokasi_informasi' => 'required|string',
            'tanggal_informasi' => 'required',

        ]);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->with('flash', ['error', $validator]);
        }
        try {
            $file = (array) cloudinary()->uploadApi()->upload($request->file('foto_informasi')->getRealPath(), $options = []);


            // fungsi eloquent untuk menambah data
            InformasiModel::create([
                'user_id' => $request->user_id,
                'judul' => $request->judul,
                'deskripsi_informasi' => $request->deskripsi_informasi,
                'foto_informasi' => $file['secure_url'],
                'lokasi_informasi' => $request->lokasi_informasi,
                'tanggal_informasi' => $request->tanggal_informasi,
                'asset_id' => $file['asset_id'],
            ]);
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('karangTaruna/pengumuman')
            ->with('flash', ['success', 'Informasi Berhasil Ditambahkan']);
    }

    public function show(string $id)
    {
        $informasi = InformasiModel::findOrFail($id);
        // Mengonversi format tanggal informasi
        foreach ($informasi as $info) {
            $info = date('d F Y', strtotime($info->tanggal_informasi));
        }

        return view('informasi.show', compact('informasi'));
    }

    public function showPenduduk($id)
    {
        $informasi = InformasiModel::findOrFail($id);

        $metadata = (object) [
            'title' => $informasi->judul,
            'description' => $informasi->deskripsi_informasi,
        ];

        $activeMenu = 'pengumuman';

        return view('informasi.penduduk.show', compact('informasi', 'metadata', 'activeMenu'));
    }

    public function edit(string $id)
    {
        $informasi = InformasiModel::find($id);
        $user = User::all();
        return view('informasi.edit')->with(['informasi' => $informasi, 'user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'judul' => 'required|string',
            'deskripsi_informasi' => 'required|string',
            'foto_informasi' => 'required|string',
            'lokasi_informasi' => 'required|string',
            'tanggal_informasi' => 'required'
        ]);

        // fungsi eloquent untuk mengupdate data inputan kita
        InformasiModel::find($id)->update($request->all());

        // jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('informasi.index')
            ->with('success', 'Data Berhasil Diupdate');
    }

    public function tambahInformasi(Request $request)
    {
        // dd($request);

        foreach ($request->cek as $key => $value) {

            try {
                $informasi = InformasiModel::find($value);
                $informasi->upload = 1;
                $informasi->save();
            } catch (\Exception $e) {
                dd($e);
            }
        }


        return redirect('/karangTaruna/informasi')->with('flash', ['success', 'Informasi Berhasil Di Upload']);
    }

    public function arsip(string $id)
    {
        try {
            $informasi = InformasiModel::findOrFail($id);
            $informasi->upload = 0;
            $informasi->save();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('/karangTaruna/informasi')->with('flash', ['success', 'Informasi Berhasil Di Arsipkan']);
    }

    public function destroy(string $id)
    {
        try {
            $informasi = InformasiModel::findOrFail($id);

            if ($informasi->asset_id != null) {
                $result = (array) (new AdminApi())->assetByAssetId($informasi->asset_id);

                $public_ids = $result['public_id'];
                $result = (new AdminApi())->deleteAssets(
                    $public_ids,
                    ["resource_type" => "image", "type" => "upload"]
                );

            }

            $informasi->delete();
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('karangTaruna')
            ->with('flash', ['success', 'Data Berhasil Dihapus']);
    }
}
