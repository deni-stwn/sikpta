@extends('layouts.app')
@section('content')
    <x-navbar title="Tambah Mahasiswa"></x-navbar>
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <form action="{{ route('daftar-mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="name" name="name"
                    placeholder="Masukan Nama Mahasiswa" required>
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username/NRP Mahasiswa</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="username" name="username"
                    placeholder="Masukan Username" required>
                @error('username')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            {{-- fakultas --}}
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="fakultas" name="fakultas"
                    placeholder="Masukan Fakultas" required>
                @error('fakultas')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            {{-- prodi --}}
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="prodi" name="prodi"
                    placeholder="Masukan Prodi" required>
                @error('prodi')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="no_hp" name="no_hp"
                    placeholder="Masukan No HP" required>
                @error('no_hp')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-md border-gray-700 border" id="email" name="email"
                    placeholder="Masukan Email Mahasiswa" required>
                @error('email')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-md border-gray-700 border" id="password" name="password"
                    placeholder="Masukan Password " required>
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-[#22B07D] text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
@endsection
