@extends('layouts.app')
@section('content')
    <x-navbar title="Upload Arsip"></x-navbar>
    <!-- Main content -->
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <form action="{{ route('surat-upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4">

                <div id="nama_perusahaan_field" class="flex flex-col gap-4">
                    {{-- nomor_surat --}}
                    <div id="nomor_surat_field" style="">
                        <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                        <input disabled type="text" name="nomor_surat" id="nomor_surat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ $surat->nomor_surat }}">
                    </div>
                    <input type="" name="surat_id" value="{{ $surat->id }}" hidden>
                    {{-- jenis_surat --}}
                    <div id="jenis_surat_field" style="">
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                        <input disabled type="text" name="jenis_surat" id="jenis_surat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ $surat->jenis_surat }}">
                    </div>
                    <div>
                        <label for="file" class="block text-sm font-medium text-gray-700">File Surat Sesuai Nomor
                            Surat</label>
                        <div class="mt-1 flex justify-between items-center">
                            <input type="file" name="file_arsip" id="file_arsip"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-end gap-4">
                    {{-- @if ($surat->status == 'updated')
                        <a target="_blank" href="{{ route('download.pdf', $surat->id) }}" class="btn-warning btn">
                            <i class="fas fa-file-pdf"></i> Download PDF
                        </a>
                    @endif --}}
                    <button type="submit" class="btn-primary btn">
                        <i class="fas fa-save"></i> Upload Surat ke Arsip
                    </button>
                </div>
        </form>
    </div>
@endsection

@push('scripts')
    @include('partials.alert')
@endpush
