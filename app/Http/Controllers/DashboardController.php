<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $findUser = auth()->user();
        $surat = PengajuanSurat::where('user_id', $findUser->id)->get();
        // dd($surat);
        return view('dashboard', compact('surat'));
    }
}
