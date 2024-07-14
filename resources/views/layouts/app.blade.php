<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 3</title>

    {{-- light box --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('lte/DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/DataTables/datatables.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .dt-length,
        .dt-search {
            display: none;
        }

        /* .min-h-screen.flex.flex-col.sm:justify-center.items-center.pt-6.sm:pt-0.bg-gray-100 div a svg,
        svg.w-20.h-20.fill-current.text-gray-500 {
            display: none !important;
        } */

        div.dt-container .dt-paging .dt-paging-button.current {
            background-color: #22B07D;
            color: white !important;
            border-radius: 5px;
            padding: 5px 10px;
        }

        table.dataTable td.dt-type-numeric {
            text-align: left;
        }

        .nav-pills .nav-link:not(.active):hover {
            color: unset;
        }
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        {{-- @include('partials.navbar') --}}
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- datatables -->
    <script src="{{ asset('lte/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('lte/DataTables/datatables.js') }}"></script>
    <!-- select 2 -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte/dist/js/pages/dashboard3.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- @include('partials.sofdetelte') --}}
    @stack('scripts')
    {{-- softdelete --}}
    <!-- ./wrapper -->
    {{-- @include('partials.passingImgDropzoze')
    <script src="{{ asset('js/globalfunctionajax.js') }}"></script>
    <script>
        function openDrawer(drawerID) {
            let allDrawers = document.querySelectorAll('.drawer-slider');
            allDrawers.forEach(drawer => {
                if (drawer.id !== drawerID) {
                    closeDrawer(drawer.id);
                }
            });

            let drawer = document.getElementById(drawerID);
            if (!drawer) {
                console.error(`No element found with ID ${drawerID}`);
                return;
            }

            drawer.classList.remove('translate-x-full');
            drawer.classList.add('Active');

            // document.getElementById('main-content').classList.add('transform', '-translate-x-72', 'transition-transform');
        }

        function closeDrawer(drawerID) {
            let drawer = document.getElementById(drawerID);
            if (!drawer) {
                console.error(`No element found with ID ${drawerID}`);
                return;
            }

            drawer.classList.add('translate-x-full');
            drawer.classList.remove('Active');

            let otherDrawers = document.querySelectorAll('.drawer-slider');
            let isAnyDrawerActive = Array.from(otherDrawers).some(d => d.classList.contains('Active'));

            // if (!isAnyDrawerActive) {
            //     document.getElementById('main-content').classList.remove('transform', '-translate-x-72',
            //         'transition-transform');
            // }
        } --}}
    </script>
</body>

</html>
