<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\Kriteria;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PDFBansosController extends Controller
{
    public function generatePDF()
    {
        $bansos = BansosModel::all();
        $bansos = BansosModel::orderBy('score', 'desc')->get();
        $kriteria = Kriteria::all();

        $date = Carbon::now()->isoFormat('D MMMM YYYY', 'id');

        $data = [
            'title' => 'Data Penerimaan Bantuan Sosial RW 06 Kelurahan Kalirejo, Kecamatan Lawang',
            'date' => $date,
            'bansos' => $bansos,
            'kriteria' => $kriteria,
        ];

        $pdf = PDF::loadView('dashboard.pdf.bansos_generate_pdf', $data)->setPaper('A4', 'landscape');
        return $pdf->download('data-penerimaan-bansos.pdf');
    }

    public function generateDetailPDF()
    {
        $bansosController = new BansosController();

        $sawSteps = $bansosController->sawMethod();
        $topsisSteps = $bansosController->topsisMethod();
        $kriteria = Kriteria::all();
        $bansos = BansosModel::all();

        $date = Carbon::now()->isoFormat('D MMMM YYYY', 'id');

        $data = [
            'title' => 'Detail Langkah Pengerjaan SAW dan TOPSIS',
            'date' => $date,
            'sawSteps' => $sawSteps,
            'topsisSteps' => $topsisSteps,
            'bansos' => $bansos,
            'kriteria' => $kriteria,
        ];

        $pdf = PDF::loadView('dashboard.detail_bansos_generate_pdf', $data)->setPaper('A4', 'portrait');
        return $pdf->download('detail-pengerjaan-saw-topsis.pdf');
    }
}
