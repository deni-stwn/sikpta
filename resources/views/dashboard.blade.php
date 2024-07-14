@extends('layouts.app')
@section('content')
    <x-navbar title="Dashboard"></x-navbar>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <ol class="breadcrumb float-sm-right ml-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="bg-[#22B07D] py-[50px] px-[40px] rounded-xl">
                <h1
                    class="text-white
                    font-bold
                    text-[36px]
                    leading-[44px]">
                    Hallo, {{ Auth::user()->name }}!
                </h1>
                <p class="text-white
                    text-[18px]
                    leading-[22px]">
                    Hari ini {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </p>
                @if (Auth::user()->role == 'mahasiswa')
                    <div class="pt-10">
                        <a href="{{ route('surat-pengajuan.index') }}"
                            class="bg-[#0D243C] py-[18px] px-[27px] text-white rounded-xl">Lihat
                            Pengajuan Surat</a>
                    </div>
                @endif
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@push('scripts')
    @include('partials.alert')
@endpush
