@extends('layouts.app')
@section('content')
    <x-navbar title="Pengajuan Surat"></x-navbar>
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl ">
        <form action="{{ route('surat-pengajuan.store') }}" method="POST" class="flex flex-col gap-5">
            @csrf
            {{-- select option jenis surat --}}
            <div class="flex gap-4 items-center">
                <label for="jenis_surat" class="form-label w-[15%] text-right
                    ">Jenis Surat</label>
                <select name="jenis_surat" id="jenis_surat" class="form-control rounded-md  w-1/2 border-none bg-[#F4F4FA]">
                    <option value="Surat Keterangan">Surat Keterangan</option>
                    <option value="Surat Izin">Surat Izin</option>
                    <option value="Surat Pernyataan">Surat Pernyataan</option>
                </select>
            </div>
            {{-- No surat --}}
            <div class="flex gap-4 items-center">
                <label for="nomor_surat" class="form-label w-[15%] text-right
                    ">No</label>
                <input type="text" class="form-control rounded-md  w-2/4 border-none bg-[#F4F4FA]" id="nomor_surat"
                    name="nomor_surat" placeholder="Masukan No Surat">
            </div>
            {{-- Ditunjukan --}}
            <div class="flex gap-4 items-center">
                <label for="ditunjukan" class="form-label w-[15%] text-right
                    ">Ditunjukan</label>
                <input type="text" class="form-control rounded-md  border-none bg-[#F4F4FA] w-2/4" id="ditunjukan"
                    name="ditunjukan" placeholder="Masukan Ditunjukan">
            </div>
            {{-- Perihal --}}
            <div class="flex gap-4 items-center">
                <label for="perihal" class="form-label w-[15%] text-right
                    ">Perihal</label>
                <input type="text" class="form-control rounded-md border-none bg-[#F4F4FA]  w-2/4" id="perihal"
                    name="perihal" placeholder="Masukan Perihal">
            </div>
            {{-- Nomor hp --}}
            <div class="flex gap-4 items-center">
                <label for="no_hp" class="form-label w-[15%] text-right
                    ">Nomor HP</label>
                <input type="text" class="form-control rounded-md border-none bg-[#F4F4FA]  w-2/4" id="no_hp"
                    name="no_hp" placeholder="Masukan Nomor HP">
            </div>
            {{-- nama/nrp --}}
            <div class="flex gap-4 items-center">
                <label for="nama_nrp" class="form-label w-[15%] text-right
                    ">Nama/NRP</label>
                <input type="text" class="form-control rounded-md border-none bg-[#F4F4FA]  w-2/4" id="nama_nrp"
                    name="nama_nrp" placeholder="Masukan Nama/NRP">
            </div>
            {{-- keterangan --}}
            <div class="flex gap-4 items-center">
                <label for="keterangan" class="form-label w-[15%] text-right">Keterangan</label>
                <textarea class="form-control rounded-md border-none bg-[#F4F4FA]  w-2/4" id="keterangan" name="keterangan"
                    placeholder="Masukan Keterangan" rows="4"></textarea>
            </div>
            <div class="flex flex-row justify-end">
                <button type="submit" class="bg-[#22B07D] text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
@endsection
