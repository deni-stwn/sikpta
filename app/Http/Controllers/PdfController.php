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

    public function generatePdf1($id)
    {
        $surat = PengajuanSurat::where('id', $id)->where('status', 'updated')->with('user')->firstOrFail();
        $pdf = PDF::loadView('templateSurat.1', ['surat' => $surat]);
        return $pdf->download('document.pdf');
    }

    public function generatePdfGeneral($id, $viewName)
    {

        $surat = PengajuanSurat::where('id', $id)
            ->where('status', 'updated')
            ->with('user')
            ->firstOrFail();

        $pdf = PDF::loadView($viewName, ['surat' => $surat]);

        return $pdf->download($viewName . '.pdf');
    }

    public function generatePdfGeneral_example()
    {

        // $surat = PengajuanSurat::where('id', $id)
        //     ->where('status', 'updated')
        //     ->with('user')
        //     ->firstOrFail();

        $pdf = PDF::loadView('templateSurat.1');

        return $pdf->download('templateSurat.1.pdf');
    }

}
