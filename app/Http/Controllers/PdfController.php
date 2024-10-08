<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $surat = PengajuanSurat::where('id', $id)->where('status', 'updated')->with('user')->firstOrFail();
        $pdf = PDF::loadView('exampleSurat', ['surat' => $surat]);
        return $pdf->download('document.pdf');
    }
    public function generatePdfSK($id)
    {
        $surat = PengajuanSurat::where('id', $id)->where('status', 'updated')->with('user')->firstOrFail();
        $pdf = PDF::loadView('PDFseminarKualifikasi', ['surat' => $surat]);
        return $pdf->download('document.pdf');
    }
}
