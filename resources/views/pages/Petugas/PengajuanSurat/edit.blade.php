@extends('layouts.app')
@section('content')
    <x-navbar title="Edit Surat Masuk"></x-navbar>
    <!-- Main content -->
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <form action="{{ route('pengajuan-surat.update', $surat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4">

                <div id="nama_perusahaan_field" class="flex flex-col gap-4">
                    {{-- nomor_surat --}}
                    <div id="nomor_surat_field" style="">
                        <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                        <input type="text" name="nomor_surat" id="nomor_surat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ $surat->nomor_surat }}">
                    </div>
                    @if ($surat->tempat_kerja === 'Alokasi Panitia')
                        <div id="nama_perusahaan" style="">
                            <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama
                                Perusahaan</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->nama_perusahaan }}">
                        </div>
                        {{-- bidang_usaha --}}
                        <div id="bidang_usaha_field" style="">
                            <label for="bidang_usaha" class="block text-sm font-medium text-gray-700">Bidang Usaha</label>
                            <input type="text" name="bidang_usaha" id="bidang_usaha" value="{{ $surat->bidang_usaha }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        {{-- alamat_kontak --}}
                        <div id="alamat_kontak_field" style="">
                            <label for="alamat_kontak" class="block text-sm font-medium text-gray-700">Alamat dan
                                Kontak</label>
                            <input type="text" name="alamat" id="alamat_kontak" value="{{ $surat->alamat }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div id="pembimbing_lapangan_field" style="">
                            <label for="pembimbing_lapangan" class="block text-sm font-medium text-gray-700">Pembimbing
                                Lapangan</label>
                            <input type="text" name="pembimbing_lapangan" id="pembimbing_lapangan"
                                value="{{ $surat->pembimbing_lapangan }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div id="nama_koordinator_field" style="">
                            <label for="nama_koordinator" class="block text-sm font-medium text-gray-700">Nama
                                Koordinator</label>
                            <input type="text" name="nama_kordinator" id="nama_koordinator"
                                value="{{ $surat->nama_kordinator }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    @elseif ($surat->tempat_kerja === 'Tempat Sendiri')
                        <div id="nama_koordinator_field" style="">
                            <label for="nama_koordinator" class="block text-sm font-medium text-gray-700">Nama
                                Koordinator</label>
                            <input type="text" name="nama_kordinator" id="nama_koordinator"
                                value="{{ $surat->nama_kordinator }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        {{-- nama_pembimbing --}}
                        <div id="pembimbing_lapangan_field" style="">
                            <label for="pembimbing_lapangan" class="block text-sm font-medium text-gray-700">Pembimbing
                                Lapangan</label>
                            <input type="text" name="pembimbing_lapangan" id="pembimbing_lapangan"
                                value="{{ $surat->pembimbing_lapangan }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    @elseif($surat->jenis_surat === 'Surat Seminar Kualifikasi')
                        <div id="judul" style="">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Penelitian</label>
                            <input type="text" name="judul" id="judul"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->judul }}" readonly>
                        </div>
                        <div id="ketua" style="">
                            <label for="ketua" class="block text-sm font-medium text-gray-700">Ketua</label>
                            <input type="text" name="ketua" id="ketua"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->ketua }}">
                        </div>
                        {{-- sekretaris --}}
                        <div id="sekretaris" style="">
                            <label for="sekretaris" class="block text-sm font-medium text-gray-700">Sekretaris</label>
                            <input type="text" name="sekretaris" id="sekretaris"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->sekretaris }}">
                        </div>
                        {{-- anggota_1 --}}
                        <div id="anggota_1" style="">
                            <label for="anggota_1" class="block text-sm font-medium text-gray-700">Anggota 1</label>
                            <input type="text" name="anggota_1" id="anggota_1"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->Anggota_1 }}">
                        </div>
                        {{-- anggota_2 --}}
                        <div id="anggota_2" style="">
                            <label for="anggota_2" class="block text-sm font-medium text-gray-700">Anggota 2</label>
                            <input type="text" name="anggota_2" id="anggota_2"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->Anggota_2 }}">
                        </div>
                        {{-- penanda tangang sk --}}
                        <div id="penanda_tangan_sk" style="">
                            <label for="penanda_tangan_sk" class="block text-sm font-medium text-gray-700">Penanda Tangan
                                SK</label>
                            <input type="text" name="penanda_tangan_sk" id="penanda_tangan_sk"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->penanda_tangan_sk }}">
                        </div>
                        {{-- nip penanda tangan sk --}}
                        <div id="nip_penanda_tangan_sk" style="">
                            <label for="nip_penanda_tangan_sk" class="block text-sm font-medium text-gray-700">NIP Penanda
                                Tangan SK</label>
                            <input type="text" name="nip_penanda_tangan_sk" id="nip_penanda_tangan_sk"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                value="{{ $surat->nip_penanda_tangan_sk }}">
                        </div>
                    @endif
                </div>
                <div class="mt-8 flex justify-end gap-4">
                    @if ($surat->jenis_surat == 'Surat Kerja Praktek' && $surat->status == 'updated')
                        <a target="_blank" href="{{ route('download.pdf', $surat->id) }}" class="btn-primary btn">
                            <i class="fas fa-print"></i> Print
                        </a>
                    @endif
                    @if ($surat->jenis_surat == 'Surat Seminar Kualifikasi' && $surat->status == 'updated')
                        <a target="_blank" href="{{ route('download.pdf.sk', $surat->id) }}" class="btn-primary btn">
                            <i class="fas fa-print"></i> Print
                        </a>
                    @endif

                    <button type="submit" class="btn-primary btn">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
        </form>
    </div>
@endsection

@push('scripts')
    @include('partials.alert')
@endpush
