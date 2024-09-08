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

    public function create()
    {
        return view('pages.Petugas.SuratKeluar.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'no_surat' => 'required|string|max:255',
        //     'tgl_surat' => 'required|date',
        //     'pengirim' => 'required|string|max:255',
        //     'perihal' => 'required|string|max:255',
        //     'lampiran' => 'required|string|max:255',
        //     'tujuan' => 'required|string|max:255',
        //     'isi' => 'required|string|max:255',
        // ]);

        PengajuanSurat::create([
            'user_id' => auth()->id(),
            'jenis_surat' => $request->jenis_surat,
            'tempat_kerja' => $request->tempat_kerja_praktek,
            'nama_perusahaan' => $request->tempat_kerja_praktek === 'Tempat Sendiri' ? $request->nama_perusahaan : null,
            'bidang_usaha' => $request->tempat_kerja_praktek === 'Tempat Sendiri' ? $request->bidang_usaha : null,
            'alamat' => $request->tempat_kerja_praktek === 'Tempat Sendiri' ? $request->alamat_kontak : null,
            'pembimbing_lapangan' => $request->tempat_kerja_praktek === 'Tempat Sendiri' ? $request->pembimbing_lapangan : null,
            'jenis_kerja' => $request->jenis_kerja_praktek,
            'tgl_mulai' => $request->mulai_kerja_praktek,
            'tgl_selesai' => $request->selesai_kerja_praktek,
            'judul' => $request->judul,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan');
    }
}
