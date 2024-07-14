@extends('layouts.app')
@section('content')
    <x-navbar title="Tambah Petugas"></x-navbar>
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <form action="{{ route('daftar-petugas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Petugas</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="name" name="name"
                    placeholder="Masukan Nama Petugas">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username Petugas</label>
                <input type="text" class="form-control rounded-md border-gray-700 border" id="username" name="username"
                    placeholder="Masukan Username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-md border-gray-700 border" id="email" name="email"
                    placeholder="Masukan Email Petugas">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-md border-gray-700 border" id="password" name="password"
                    placeholder="Masukan Password ">
            </div>
            <button type="submit" class="bg-[#22B07D] text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
@endsection
