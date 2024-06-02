<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index()
    {
        $informasi = InformasiModel::where('upload', 1)->get();
        $metadata = (object) [
            'title' => 'Home',
            'description' => 'Landing Page RWGram'
        ];
        return view('welcome', ['activeMenu' => 'beranda', 'metadata' => $metadata], compact('informasi'));

    }
}
