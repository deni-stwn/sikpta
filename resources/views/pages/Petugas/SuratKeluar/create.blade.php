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
        </form>
    </div>
@endsection

