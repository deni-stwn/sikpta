<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Http\Requests\StorePengajuanSuratRequest;
use App\Http\Requests\UpdatePengajuanSuratRequest;
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
        $request->validate([
            'nomor_surat' => 'required|unique:pengajuan_surats,nomor_surat',
            'jenis_surat' => 'required',
            'ditunjukan' => 'required',
            'no_hp' => 'required',
            'perihal' => 'required',
            'nama_nrp' => 'required',
            'keterangan' => 'nullable',
        ]);
        PengajuanSurat::create([
            'user_id' => auth()->id(),
            'jenis_surat' => $request->jenis_surat,
            'nomor_surat' => $request->nomor_surat,
            'ditunjukan' => $request->ditunjukan,
            'no_hp' => $request->no_hp,
            'perihal' => $request->perihal,
            'nama_nrp' => $request->nama_nrp,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('dashboard')->with('success', 'Surat pengajuan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanSurat $pengajuanSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanSurat $pengajuanSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanSuratRequest $request, PengajuanSurat $pengajuanSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PengajuanSurat::destroy($id);
        return redirect()->route('pengajuan-surat.index')->with('success', 'Surat pengajuan berhasil dihapus');
    }
}
