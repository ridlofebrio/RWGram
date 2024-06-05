<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use App\Models\PendudukModel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index()
    {
        $informasi = InformasiModel::where('upload', 1)->get();
        $penduduk = PendudukModel::selectRaw("count('penduduk_id') as jumlah")
            ->join('kartu_keluarga', 'kartu_keluarga.kartu_keluarga_id', 'penduduk.kartu_keluarga_id')
            ->join('rt', 'kartu_keluarga.rt_id', 'rt.rt_id')
            ->where('isDelete', '=', '0')
            ->groupByRaw("rt.rt_id")
            ->pluck("jumlah")
            ->toArray()
        ;


        $metadata = (object) [
            'title' => 'Home',
            'description' => 'Landing Page RWGram'
        ];
        return view('welcome', ['activeMenu' => 'beranda', 'metadata' => $metadata], compact('informasi', 'penduduk'));

    }

    public function indexTim(){
        $metadata = (object) [
            'title' => 'Tim',
            'description' => 'Tim Pengembang'
        ];

    return view('tim',['activeMenu' => 'tim', 'metadata' => $metadata]);
    }
}
