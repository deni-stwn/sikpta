@extends('layouts.app')
@section('content')
    <x-navbar title="Surat Keluar"></x-navbar>
    <!-- Main content -->
    <div class="m-[40px] bg-white py-10 px-11 rounded-xl">
        <div class="flex justify-between items-center">
            <div class="flex items-center bg-[#F4F4FA] border-2 border-[#DCDCDC] max-w-[326px] rounded-3xl">
                <button class="btn">
                    <img src="{{ asset('assets/images/search.svg') }}" alt="">
                </button>
                <input id="customSearchBox"
                    class="form-control focus:outline-none focus:ring-0 bg-transparent border-none text-black pl-0"
                    type="search" placeholder="Search" aria-label="Search">
            </div>
            <a href="{{ route('surat-keluar.create') }}"
                class="btn bg-[#22B07D] text-white font-normal py-2 rounded-full flex justify-center items-center">
                <i class="fas fa-plus"></i>
                <span class="ml-2 text-[14px]">Tambah Surat</span>
            </a>
        </div>
        <div class="container-fluid">
            <table id="table-pengajuan" class="min-w-full leading-normal">
                <thead class="bg-[#F4F4FA]">
                    <tr class="text-center">
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            No</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            No Surat</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Nama Mahasiswa</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Jenis Surat</th>
                        {{-- <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Tempat Kerja</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Nama Perusahaan</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Jenis Kerja</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Pembimbing Lapangan</th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Nama Kordinator</th> --}}

                        {{-- <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Tgl Buat</th> --}}
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suratPengajuan as $item)
                        <tr>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $loop->iteration }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->nomor_surat }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->user->name }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->jenis_surat }}</td>
                            {{-- <td class="border-b border-gray-200 bg-white text-sm">{{ $item->tempat_kerja }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->nama_perusahaan }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->jenis_kerja }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->pembimbing_lapangan }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $item->nama_kordinator }}</td> --}}
                            {{-- <td class="border-b border-gray-200 bg-white text-sm">
                                {{ $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }} WIB</td> --}}
                            <td class="border-b border-gray-200 bg-white text-sm">
                                <div class="flex gap-4">

                                    {{-- <form action="{{ route('pengajuan-surat.destroy', $item->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 font-bold py-2 rounded flex justify-center items-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> --}}
                                    <a title="Arsip" href="{{ route('surat-upload', $item->id) }}"
                                        class="btn-arsip text-blue-500 font-bold py-2 rounded flex justify-center items-center">
                                        <i class="fas fa-upload"></i>
                                    </a>
                                    {{-- print pdf --}}
                                    {{-- {{ route('download.pdf.1', $id) }} --}}
                                    <a title="Print" target="_blank" href="{{ route('download.pdf.1', $item->id) }}"
                                        class="text-blue-500 font-bold py-2 rounded flex justify-center items-center">
                                        <i class="fas fa-print"></i>
                                    </a>

                                </div>
                                {{-- <a target="_blank" href="{{ route('download.pdf') }}"
                                    class="text-blue-500 font-bold py-2 rounded flex justify-center items-center">
                                    <i class="fas fa-print"></i>
                                </a> --}}
                                {{-- <a href="{{ route('pengajuan-surat.edit', $item->id) }}"
                                    class="text-yellow-500 font-bold py-2 rounded flex justify-center items-center">
                                    <i class="fas fa-edit"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')
    @include('partials.alert')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#table-pengajuan', {
                pagingType: 'full_numbers', // Use 'full_numbers' for numbered pagination with 'Prev' and 'Next'
                language: {
                    paginate: {
                        previous: 'Previous',
                        next: 'Next'
                    }
                }
            });

            // Custom search input binding
            $('#customSearchBox').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('.btn-arsip').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan mengarsipkan surat ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, arsipkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #007bff;
            /* Blue background */
            color: white !important;
            /* White text */
            border: 1px solid transparent;
            border-radius: 4px;
            margin: 2px;
            padding: 6px 12px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #0056b3 !important;
            /* Darker blue for current page */
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background-color: #004085 !important;
            /* Even darker blue for active state */
            color: white !important;
        }
    </style>
@endpush
