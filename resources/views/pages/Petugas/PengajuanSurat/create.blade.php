@extends('layouts.app')
@section('content')
    <x-navbar title="Pengajuan Surat"></x-navbar>
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl ">
        <form action="{{ route('surat-pengajuan.store') }}" method="POST" class="flex flex-col gap-5">
            @csrf
            {{-- select option jenis surat --}}
            <div class="flex gap-4 items-center">
                <label for="jenis_surat" class="form-label w-[15%] text-right">Jenis Surat</label>
                <select name="jenis_surat" id="jenis_surat" class="form-control rounded-md w-1/2 border-none bg-[#F4F4FA]">
                    <option value="" selected disabled>Pilih Surat</option>
                    <option value="Surat Kerja Praktek">Surat Kerja Praktek</option>
                    <option value="Surat Seminar Kualifikasi">Surat Seminar Kualifikasi</option>
                </select>
            </div>
            {{-- Tempat Kerja Praktek --}}
            <div id="form_surat_kerja_praktek" class="hidden flex-col gap-4">
                <div class="flex gap-4 items-center">
                    <label for="tempat_kerja_praktek" class="form-label w-[15%] text-right">Tempat Kerja Praktek</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center">
                            <input type="radio" id="alokasi_panitia" name="tempat_kerja_praktek" value="Alokasi Panitia"
                                class="mr-2">
                            <label for="Alokasi Panitia">Sesuai alokasi dari Panitia Kerja Praktek</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="tempat_sendiri" name="tempat_kerja_praktek" value="Tempat Sendiri"
                                class="mr-2">
                            <label for="Tempat Sendiri">Tempat sendiri</label>
                        </div>
                    </div>
                </div>
                <div id="tempat_kerja_praktek_details" class="hidden flex-col gap-4">
                    {{-- Nama Perusahaan --}}
                    <div class="flex gap-4 items-center">
                        <label for="nama_perusahaan" class="form-label w-[15%] text-right">Nama Perusahaan</label>
                        <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                            id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukan Nama Perusahaan">
                    </div>
                    {{-- Bidang Usaha --}}
                    <div class="flex gap-4 items-center mt-4">
                        <label for="bidang_usaha" class="form-label w-[15%] text-right">Bidang Usaha</label>
                        <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                            id="bidang_usaha" name="bidang_usaha" placeholder="Masukan Bidang Usaha">
                    </div>
                    {{-- Alamat dan Kontak --}}
                    <div class="flex gap-4 items-center mt-4">
                        <label for="alamat_kontak" class="form-label w-[15%] text-right">Alamat dan Kontak</label>
                        <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                            id="alamat_kontak" name="alamat_kontak" placeholder="Masukan Alamat dan Kontak">
                    </div>
                    {{-- Pembimbing Lapangan --}}
                    <div class="flex gap-4 items-center mt-4">
                        <label for="pembimbing_lapangan" class="form-label w-[15%] text-right">Pembimbing Lapangan</label>
                        <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                            id="pembimbing_lapangan" name="pembimbing_lapangan"
                            placeholder="Masukan Nama Pembimbing Lapangan">
                    </div>
                </div>
                {{-- Jenis Kerja Praktek --}}
                <div class="flex gap-4 items-center">
                    <label for="jenis_kerja_praktek" class="form-label w-[15%] text-right">Jenis Kerja Praktek</label>
                    <select name="jenis_kerja_praktek" id="jenis_kerja_praktek"
                        class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]">
                        <option value="" selected disabled>Pilih Jenis Kerja Praktek</option>
                        <option value="magang">Magang</option>
                        <option value="insidentil">Insidentil</option>
                        <option value="kkn">KKN</option>
                    </select>
                </div>
                {{-- Mulai Kerja Praktek --}}
                <div class="flex gap-4 items-center">
                    <label for="mulai_kerja_praktek" class="form-label w-[15%] text-right">Mulai Kerja Praktek</label>
                    <input type="date" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                        id="mulai_kerja_praktek" name="mulai_kerja_praktek"
                        placeholder="Masukan Tanggal Mulai Kerja Praktek">
                </div>
                {{-- Selesai Kerja Praktek --}}
                <div class="flex gap-4 items-center">
                    <label for="selesai_kerja_praktek" class="form-label w-[15%] text-right">Selesai Kerja Praktek</label>
                    <input type="date" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]"
                        id="selesai_kerja_praktek" name="selesai_kerja_praktek"
                        placeholder="Masukan Tanggal Selesai Kerja Praktek">
                </div>
            </div>
            {{-- Surat Seminar Kualifikasi --}}
            <div id="form_surat_seminar_kualifikasi" class="hidden flex-col gap-4">
                <div class="flex gap-4 items-center mt-4">
                    <label for="judul" class="form-label w-[15%] text-right">Judul Penelitian</label>
                    <input type="text" class="form-control rounded-md w-2/4 border-none bg-[#F4F4FA]" id="judul"
                        name="judul" placeholder="Masukan Judul Penelitian">
                </div>
            </div>
            <div class="flex flex-row justify-end">
                <button type="submit" class="bg-[#22B07D] text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tempatKerjaPraktek = document.querySelectorAll('input[name="tempat_kerja_praktek"]');
        const tempatKerjaPraktekDetails = document.getElementById('tempat_kerja_praktek_details');

        const jenisSurat = document.getElementById('jenis_surat');
        const formSuratKerjaPraktek = document.getElementById('form_surat_kerja_praktek');
        const formSuratSeminarKualifikasi = document.getElementById('form_surat_seminar_kualifikasi');

        jenisSurat.addEventListener('change', function() {
            if (this.value === 'Surat Kerja Praktek') {
                formSuratKerjaPraktek.classList.remove('hidden');
                formSuratKerjaPraktek.classList.add('flex');
                formSuratSeminarKualifikasi.classList.add('hidden');
                formSuratSeminarKualifikasi.classList.remove('flex');
            } else if (this.value === 'Surat Seminar Kualifikasi') {
                formSuratSeminarKualifikasi.classList.remove('hidden');
                formSuratSeminarKualifikasi.classList.add('flex');

                formSuratKerjaPraktek.classList.add('hidden');
                formSuratKerjaPraktek.classList.remove('flex');
            } else {
                formSuratKerjaPraktek.classList.add('hidden');
                formSuratSeminarKualifikasi.classList.add('hidden');
            }
        });

        tempatKerjaPraktek.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'Tempat Sendiri') {
                    tempatKerjaPraktekDetails.classList.remove('hidden');
                } else {
                    tempatKerjaPraktekDetails.classList.add('hidden');
                }
            });
        });
    });
</script>
