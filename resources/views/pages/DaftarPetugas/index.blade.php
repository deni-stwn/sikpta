@extends('layouts.app')
@section('content')
    <x-navbar title="Daftar Petugas"></x-navbar>
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
            <div class="flex justify-end">
                <a href="{{ route('daftar-petugas.create') }}"
                    class="bg-[#22B07D] text-white font-bold py-2 px-4 rounded">Tambah Petugas</a>
            </div>
        </div>
        <div class="container-fluid">
            <table id="table-user" class="min-w-full leading-normal">
                <thead class="bg-[#F4F4FA]">
                    <tr class="text-center">
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            No
                        </th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            USER_ID
                        </th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            email
                        </th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            NAMA USER
                        </th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            ROLE
                        </th>
                        <th
                            class="border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersPetugas as $user)
                        <tr>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $loop->iteration }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">Petugas_{{ $user->id }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $user->email }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $user->name }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm">{{ $user->role }}</td>
                            <td class="border-b border-gray-200 bg-white text-sm flex gap-3">
                                <a href="{{ route('daftar-petugas.edit', $user->id) }}"
                                    class="text-blue-500 font-bold py-2 rounded flex justify-center items-center">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('daftar-petugas.destroy', $user->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" text-red-500 font-bold py-2 rounded"
                                        onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
            let table = new DataTable('#table-user', {
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
        });

        // Function to handle deletion confirmation with SweetAlert
        function confirmDelete() {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.form.submit();
                }
            });
        }
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
