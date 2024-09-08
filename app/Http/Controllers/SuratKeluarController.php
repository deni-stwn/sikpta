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
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->selesai_kerja_praktek,
            'judul' => $request->judul,
            //? semua surat status updated
            'status' => 'updated',
            //! surat 1
            'nomor_surat' => $request->no_surat,
            // 'jenis_surat' => $request->jenis_surat,
            'semester' => $request->semester,
            // 'tgl_mulai' => $request->tgl_surat,
            'NPM_Name' => $request->NPM_Name,
            // 'judul' => $request->judul,
            'nilai_laporan_pembimbing_1' => $request->nilai_laporan_pembimbing_1,
            'nilai_laporan_pembimbing_2' => $request->nilai_laporan_pembimbing_2,
            'nilai_laporan_penguji_1' => $request->nilai_laporan_penguji_1,
            'nilai_laporan_penguji_2' => $request->nilai_laporan_penguji_2,
            'nilai_skp_pembimbing_1' => $request->nilai_skp_pembimbing_1,
            'nilai_skp_pembimbing_2' => $request->nilai_skp_pembimbing_2,
            'nilai_skp_penguji_1' => $request->nilai_skp_penguji_1,
            'nilai_skp_penguji_2' => $request->nilai_skp_penguji_2,
            'nilai_pembimbingan_pembimbing_1' => $request->nilai_pembimbingan_pembimbing_1,
            'nilai_pembimbingan_pembimbing_2' => $request->nilai_pembimbingan_pembimbing_2,
            'nilai_pembimbingan_penguji_1' => $request->nilai_pembimbingan_penguji_1,
            'nilai_pembimbingan_penguji_2' => $request->nilai_pembimbingan_penguji_2,
            'nilai_lapangan' => $request->nilai_lapangan,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan');
    }
}
