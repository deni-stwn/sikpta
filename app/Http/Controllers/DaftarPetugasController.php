<?php

namespace App\Http\Controllers;

use App\Models\DaftarPetugas;
use App\Http\Requests\StoreDaftarPetugasRequest;
use App\Http\Requests\UpdateDaftarPetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersPetugas = User::where('role', 'petugas')->get();
        return view('pages.DaftarPetugas.index', compact('usersPetugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.DaftarPetugas.create');
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
            'password' => 'required|min:8',
        ]);
        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'petugas',
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('daftar-petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarPetugas $daftarPetugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.DaftarPetugas.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::find($id);

        $updateData = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);

        return redirect()->route('daftar-petugas.index')->with('success', 'Petugas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('daftar-petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
