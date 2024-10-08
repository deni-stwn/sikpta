<aside class="main-sidebar bg-white border-[#E4E4E4] border fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link align-items-center flex">
        <img src="{{ asset('assets/images/svg/ICONLOGO.svg') }}" alt="AdminLTE Logo" class="brand-image"
            style="opacity: .8">
        <div class="flex flex-col brand-text">
            <span class="font-bold text-[22px]">SIKPTA</span>
            <span class="text-[12.64px] text-[#A8A8A8] -mt-2">INFORMATIKA UNPAS</span>
        </div>
    </a>
    <hr class="mx-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link flex items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        @if (request()->routeIs('dashboard'))
                            <img src="{{ asset('assets/images/svg/Command1.svg') }}" alt="" class="nav-icon ">
                        @else
                            <img src="{{ asset('assets/images/svg/Command.svg') }}" alt="" class="nav-icon ">
                        @endif
                        <p class="page-name ml-1">
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('daftar-petugas.index') }}"
                            class="nav-link {{ request()->routeIs('daftar-petugas.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p class="page-name">
                                Daftar Petugas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftar-mahasiswa.index') }}"
                            class="nav-link {{ request()->routeIs('daftar-mahasiswa.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p class="page-name">
                                Daftar Mahasiswa
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'petugas')
                    <li class="nav-item">
                        <a href="{{ route('pengajuan-surat.index') }}"
                            class="nav-link {{ request()->routeIs('pengajuan-surat.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p class="page-name">
                                Surat Masuk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('surat-keluar.index') }}"
                            class="nav-link {{ request()->routeIs('surat-keluar.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope-open"></i>
                            <p class="page-name">
                                Surat Keluar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('arsip.index') }}"
                            class="nav-link {{ request()->routeIs('arsip.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-archive"></i>
                            <p class="page-name">
                                Arsip Surat
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('surat-pengajuan.create') }}"
                            class="nav-link {{ request()->routeIs('surat-pengajuan.create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pen"></i>
                            <p class="page-name">
                                Buat Pengajuan Surat
                            </p>
                        </a>
                    </li> --}}
                @endif
                @if (Auth::user()->role == 'mahasiswa')
                    <li class="nav-item">
                        <a href="{{ route('surat-pengajuan.create') }}"
                            class="nav-link {{ request()->routeIs('surat-pengajuan.create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pen"></i>
                            <p class="page-name">
                                Pengajuan Surat
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
