<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratPengajuan = PengajuanSurat::with('user')->get();
        return view('pages.Petugas.PengajuanSurat.index', compact('suratPengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Petugas.PengajuanSurat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        // $request->validate([
        //     'jenis_surat' => 'required|string|max:255',
        //     'tempat_kerja_praktek' => 'required|string|max:255',
        //     'nama_perusahaan' => 'nullable|string|max:255',
        //     'bidang_usaha' => 'nullable|string|max:255',
        //     'alamat_kontak' => 'nullable|string|max:255',
        //     'pembimbing_lapangan' => 'nullable|string|max:255',
        //     'jenis_kerja_praktek' => 'required|string|max:255',
        //     'rencana_lama_kerja_praktek' => 'required|string|max:255',
        //     'mulai_kerja_praktek' => 'required|date',
        //     'selesai_kerja_praktek' => 'required|date',
        // ]);

        // Buat data pengajuan surat baru
        $pengajuanSurat = PengajuanSurat::create([
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

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Surat pengajuan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        return view('pages.Petugas.PengajuanSurat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        // $request->validate([
        //     'jenis_surat' => 'required|string|max:255',
        //     'tempat_kerja_praktek' => 'required|string|max:255',
        //     'nama_perusahaan' => 'nullable|string|max:255',
        //     'bidang_usaha' => 'nullable|string|max:255',
        //     'alamat_kontak' => 'nullable|string|max:255',
        //     'pembimbing_lapangan' => 'nullable|string|max:255',
        //     'jenis_kerja_praktek' => 'required|string|max:255',
        //     'rencana_lama_kerja_praktek' => 'required|string|max:255',
        //     'mulai_kerja_praktek' => 'required|date',
        //     'selesai_kerja_praktek' => 'required|date',
        // ]);

        $pengajuanSurat = PengajuanSurat::findOrFail($id);
        $pengajuanSurat->update([
            // 'jenis_surat' => $request->jenis_surat,
            // 'tempat_kerja' => $request->tempat_kerja_praktek,
            // 'jenis_kerja' => $request->jenis_kerja_praktek,
            'nomor_surat' => $request->nomor_surat ? $request->nomor_surat : $pengajuanSurat->nomor_surat,
            'nama_perusahaan' =>  $request->nama_perusahaan ?  $request->nama_perusahaan : $pengajuanSurat->nama_perusahaan,
            'bidang_usaha' =>  $request->bidang_usaha ?  $request->bidang_usaha : $pengajuanSurat->bidang_usaha,
            'alamat' =>  $request->alamat  ?  $request->alamat : $pengajuanSurat->alamat,
            'pembimbing_lapangan' =>  $request->pembimbing_lapangan ?  $request->pembimbing_lapangan : $pengajuanSurat->pembimbing_lapangan,
            'nama_kordinator' => $request->nama_kordinator ? $request->nama_kordinator : $pengajuanSurat->nama_kordinator,
            'status' => 'updated',
            'judul' => $request->judul ? $request->judul : $pengajuanSurat->judul,
            'ketua' => $request->ketua ? $request->ketua : $pengajuanSurat->ketua,
            'sekretaris' => $request->sekretaris ? $request->sekretaris : $pengajuanSurat->sekretaris,
            'Anggota_1' => $request->anggota_1 ? $request->anggota_1 : $pengajuanSurat->anggota_1,
            'Anggota_2' => $request->anggota_2 ? $request->anggota_2 : $pengajuanSurat->anggota_2,
            'penanda_tangan_sk' => $request->penanda_tangan_sk ? $request->penanda_tangan_sk : $pengajuanSurat->penanda_tangan_sk,
            'nip_penanda_tangan_sk' => $request->nip_penanda_tangan_sk ? $request->nip_penanda_tangan_sk : $pengajuanSurat->nip_penanda_tangan_sk,
        ]);

        return redirect()->route('pengajuan-surat.edit', $pengajuanSurat->id)->with('success', 'Surat pengajuan berhasil diupdate');
    }

    public function upload($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        return view('pages.Petugas.SuratKeluar.uploadArsip', compact('surat'));
    }

    public function uploadStore(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|file|mimes:pdf|max:2048',
        // ]);
        if ($request->hasFile('file_arsip')) {
            $fileName = time() . '_' . $request->file('file_arsip')->getClientOriginalName();
            $filePath = $request->file('file_arsip')->storeAs('public/arsip', $fileName);
            $arsip = Arsip::create([
                'pengajuan_surats_id' => $request->surat_id,
                'file' => $filePath,
            ]);

            return redirect()->route('arsip.index')->with('success', 'Surat pengajuan berhasil diupload');
        }

        return redirect()->route('arsip.index')->with('error', 'Surat pengajuan gagal diupload');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $arsip = Arsip::where('pengajuan_surats_id', $id)->first();
        if ($arsip) {
            // If there's a related Arsip record, prevent deletion and return an error message.
            return redirect()->route('pengajuan-surat.index')->with('error', 'Surat pengajuan tidak bisa dihapus karena memiliki relasi dengan arsip.');
        } else {
            // If there's no related Arsip record, proceed with deletion.
            PengajuanSurat::destroy($id);
            return redirect()->route('pengajuan-surat.index')->with('success', 'Surat pengajuan berhasil dihapus');
        }
    }
}
