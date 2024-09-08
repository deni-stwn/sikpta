@extends('layouts.app')
@section('content')
    <x-navbar title="Surat Keluar"></x-navbar>
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <form action="{{ route('surat-keluar.store') }}" method="POST" class="flex flex-col gap-5">
            @csrf
            {{-- select option jenis surat --}}
            <div class="flex gap-4 items-center">
                <label for="jenis_surat" class="form-label w-[15%] text-right">Jenis Surat</label>
                <select name="jenis_surat" id="jenis_surat" class="form-control rounded-md w-1/2 border-none bg-[#F4F4FA]">
                    <option value="" selected disabled>Pilih Surat</option>
                    <option value="Berita Acara Seminar Kualifikasi Penelitian">Berita Acara Seminar Kualifikasi Penelitian
                    </option>
                    <option value="Pengangkatan Panitia Seminar Kualifikasi Penelitian">Pengangkatan Panitia Seminar
                        Kualifikasi Penelitian</option>
                    <option value="Form Catatan Perbaikan Seminar Kerja Praktek">Form Catatan Perbaikan Seminar Kerja
                        Praktek</option>
                    <option value="Form Catatan Perbaikan Seminar/Sidang KP/TA">Form Catatan Perbaikan Seminar/Sidang KP/TA
                    </option>
                    <option value="Form Catatan Perbaikan Seminar Kualifikasi Penelitian">Form Catatan Perbaikan Seminar
                        Kualifikasi Penelitian
                    </option>
                    <option value="Formulir Nilai Pembimbingan Kualifikasi Penelitian">Formulir Nilai Pembimbingan
                        Kualifikasi Penelitian
                    </option>
                    <option value="Form Nilai Seminar Kerja Praktek">Form Nilai Seminar Kerja Praktek
                    </option>
                    <option value="Form Nilai Seminar Kualifikasi Penelitian">Form Nilai Seminar Kualifikasi Penelitian
                    </option>
                    <option value="Pengangkatan Panitia Seminar Kerja Praktek">Pengangkatan Panitia Seminar Kerja Praktek
                    </option>
                    <option value="Pengangkatan Panitia Seminar Kualifikasi Penelitian">Pengangkatan Panitia Seminar
                        Kualifikasi Penelitian
                    </option>
                    <option value="Pengangkatan Pembimbing Tugas Akhir">Pengangkatan Pembimbing Tugas Akhir
                    </option>
                </select>
            </div>
            <div class="flex gap-4 items-center">
                <label for="no_surat" class="form-label w-[15%] text-right">No Surat</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="no_surat"
                    name="no_surat" placeholder="Masukan Nama No Surat">
            </div>
            <div class="flex gap-4 items-center">
                <label for="NPM_Name" class="form-label w-[15%] text-right">NPM / Nama</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="NPM_Name"
                    name="NPM_Name" placeholder="Masukan Nama NPM / Nama">
            </div>
            <div class="flex gap-4 items-center">
                <label for="semester" class="form-label w-[15%] text-right">Semester</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="semester"
                    name="semester" placeholder="Masukan Semester">
            </div>
            <div class="flex gap-4 items-center">
                <label for="tgl_mulai" class="form-label w-[15%] text-right">Tanggal Mulai</label>
                <input type="date" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="tgl_mulai"
                    name="tgl_mulai" placeholder="Masukan Tanggal Mulai">
            </div>
            <div class="flex gap-4 items-center">
                <label for="judul" class="form-label w-[15%] text-right">Judul</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="judul"
                    name="judul" placeholder="Masukan Judul">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_laporan_pembimbing_1" class="form-label w-[15%] text-right">Nilai Laporan Pembimbing
                    1</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_laporan_pembimbing_1" name="nilai_laporan_pembimbing_1"
                    placeholder="Masukan Nilai Laporan Pembimbing 1">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_laporan_pembimbing_2" class="form-label w-[15%] text-right">Nilai Laporan Pembimbing
                    2</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_laporan_pembimbing_2" name="nilai_laporan_pembimbing_2"
                    placeholder="Masukan Nilai Laporan Pembimbing 2">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_laporan_penguji_1" class="form-label w-[15%] text-right">Nilai Laporan Penguji 1</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_laporan_penguji_1" name="nilai_laporan_penguji_1"
                    placeholder="Masukan Nilai Laporan Penguji 1">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_laporan_penguji_2" class="form-label w-[15%] text-right">Nilai Laporan Penguji 2</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_laporan_penguji_2" name="nilai_laporan_penguji_2"
                    placeholder="Masukan Nilai Laporan Penguji 2">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_skp_pembimbing_1" class="form-label w-[15%] text-right">Nilai SKP Pembimbing 1</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_skp_pembimbing_1" name="nilai_skp_pembimbing_1"
                    placeholder="Masukan Nilai SKP Pembimbing 1">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_skp_pembimbing_2" class="form-label w-[15%] text-right">Nilai SKP Pembimbing 2</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_skp_pembimbing_2" name="nilai_skp_pembimbing_2"
                    placeholder="Masukan Nilai SKP Pembimbing 2">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_skp_penguji_1" class="form-label w-[15%] text-right">Nilai SKP Penguji 1</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_skp_penguji_1" name="nilai_skp_penguji_1" placeholder="Masukan Nilai SKP Penguji 1">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_skp_penguji_2" class="form-label w-[15%] text-right">Nilai SKP Penguji 2</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_skp_penguji_2" name="nilai_skp_penguji_2" placeholder="Masukan Nilai SKP Penguji 2">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_pembimbingan_pembimbing_1" class="form-label w-[15%] text-right">Nilai Pembimbingan
                    Pembimbing 1</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_pembimbingan_pembimbing_1" name="nilai_pembimbingan_pembimbing_1"
                    placeholder="Masukan Nilai Pembimbingan Pembimbing 1">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_pembimbingan_pembimbing_2" class="form-label w-[15%] text-right">Nilai Pembimbingan
                    Pembimbing 2</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_pembimbingan_pembimbing_2" name="nilai_pembimbingan_pembimbing_2"
                    placeholder="Masukan Nilai Pembimbingan Pembimbing 2">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_pembimbingan_penguji_1" class="form-label w-[15%] text-right">Nilai Pembimbingan Penguji
                    1</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_pembimbingan_penguji_1" name="nilai_pembimbingan_penguji_1"
                    placeholder="Masukan Nilai Pembimbingan Penguji 1">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_pembimbingan_penguji_2" class="form-label w-[15%] text-right">Nilai Pembimbingan Penguji
                    2</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                    id="nilai_pembimbingan_penguji_2" name="nilai_pembimbingan_penguji_2"
                    placeholder="Masukan Nilai Pembimbingan Penguji 2">
            </div>
            <div class="flex gap-4 items-center">
                <label for="nilai_lapangan" class="form-label w-[15%] text-right">Nilai Lapangan</label>
                <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="nilai_lapangan"
                    name="nilai_lapangan" placeholder="Masukan Nilai Lapangan">
            </div>
            {{-- submit btn --}}
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary mt-4">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
        {{-- <div class="flex justify-end">
            <a href="{{ route('download.pdf.1', $id) }}" class="btn btn-primary mt-4">
                <i class="fas fa-file-pdf"></i> Generate PDF
            </a>
        </div> --}}
    </div>
@endsection
