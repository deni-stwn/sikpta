<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratPengajuan = PengajuanSurat::where('status', 'updated')->with('user')->get();
        return view('pages.Petugas.SuratKeluar.index', compact('suratPengajuan'));
    }
}
