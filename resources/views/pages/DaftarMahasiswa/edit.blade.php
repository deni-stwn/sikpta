@extends('layouts.app')
@section('content')
    <x-navbar title="Edit Mahasiswa"></x-navbar>
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <form action="{{ route('daftar-mahasiswa.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="name" name="name"
                    value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username/NRP Mahasiswa</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="username" name="username"
                    value="{{ $user->username }}">
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="fakultas" name="fakultas"
                    value="{{ $user->fakultas }}">
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="prodi" name="prodi"
                    value="{{ $user->prodi }}">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Hp Mahasiswa</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="no_hp" name="no_hp"
                    value="{{ $user->no_hp }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-md border-gray-700 border" id="email" name="email"
                    value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-md border-gray-700 border" id="password" name="password"
                    value="">
            </div>
            <button type="submit" class="bg-[#22B07D] text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
@endsection
