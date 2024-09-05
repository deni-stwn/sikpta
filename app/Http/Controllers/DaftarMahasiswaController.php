<?php

namespace App\Http\Controllers;

use App\Models\DaftarMahasiswa;
use App\Http\Requests\StoreDaftarMahasiswaRequest;
use App\Http\Requests\UpdateDaftarMahasiswaRequest;
use App\Models\PengajuanSurat;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersMahasiswa = User::where('role', 'mahasiswa')->get();
        return view('pages.DaftarMahasiswa.index', compact('usersMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.DaftarMahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required',
            'password' => 'required|min:8',
            'fakultas' => 'required',
            'prodi' => 'required',
        ],);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => 'mahasiswa',
            'password' => bcrypt($request->password),
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
        ]);
        return redirect()->route('daftar-mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.DaftarMahasiswa.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'fakultas' => 'required',
            'prodi' => 'required',
        ]);

        $user = User::find($id);

        $updateData = [
            'username' => $request->username,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);

        return redirect()->route('daftar-mahasiswa.index')->with('success', 'Mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // Check if the user has any related PengajuanSurat records
        $suratCount = PengajuanSurat::where('user_id', $id)->count();

        if ($suratCount > 0) {
            // If related records exist, redirect back with an error message
            return redirect()->route('daftar-mahasiswa.index')->with('error', 'Mahasiswa tidak dapat dihapus karena memiliki pengajuan surat.');
        }

        // If no related records exist, proceed with deletion
        $user->delete();
        return redirect()->route('daftar-mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
