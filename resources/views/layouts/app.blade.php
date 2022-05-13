<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alhamdulillah Mart</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('penjualan/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('penjualan/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('penjualan/libs/css/semantic.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('penjualan/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('penjualan/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('penjualan/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('penjualan/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
        href="{{ asset('penjualan/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('penjualan/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('penjualan/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">

    <link href="{{ asset('css/datatable/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">



    <script src="{{ asset('penjualan/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('penjualan/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('penjualan/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('penjualan/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('penjualan/libs/js/main-js.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('penjualan/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('penjualan/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('penjualan/vendor/datatables/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ asset('js/excanvas.min.js') }}"></script>
    <script src="{{ asset('js/autoNumeric.js') }}"></script>
    <script src="{{ asset('js/datatable/datatables.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script src="{{ asset('js/base.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}


    <style>
        tbody {
            display: block;
            height: 100%;
            overflow: auto;
        }

        .body150 {
            height: 200px;
        }

        .body350 {
            height: 350px;
        }

        .body500 {
            height: 500px;
        }
        .bg {
            background-image: url("{{ asset('penjualan/images/sidebar.jpg') }}");
            /* min-height: 500px; */
            background-color: #0c1e35;
            display: block;
            height: 100%;
            display: flex;
            flex-direction: column;
            z-index: 2;
        }

        .resize50 {
            height:50px;
            font-size: 18px;
        }

        .resize75 {
            height:75px;
            font-size: 40px;
        }

        thead,
        tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        thead {
            width: calc(100% - 1em)
        }

        table {
            width: 100%;
        }

    </style>

</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-light fixed-top">
                <a class="navbar-brand text-dark" style="font-size: 20px" href="{{ route('home.index') }}">Alhamdulillah Mart</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('penjualan/images/avatar.png') }}" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                </div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    {{ __('Logout') }}>
                                    <i class="fas fa-power-off mr-2"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="sidebar-dark nav-left-sidebar text-white bg">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg">
                    <a class="d-xl-none d-lg-none" href="{{ route('home.index') }}">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('home.index') }}"><i
                                        class="fas fa-chart-line text-white"></i>DASHBOARD</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1" aria-controls="submenu-1"><i
                                        class="fas fa-book text-white"></i>PENJUALAN</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('penjualan.index') }}">PENJUALAN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('riwayat.index') }}" class="nav-link text-white">RIWAYAT PENJUALAN</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#"><i class="fas fa-cart-plus text-white"></i>PEMBELIAN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-2"><i
                                        class="fas fa-book text-white"></i>LAPORAN</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('report') }}">LAPORAN PENJUALAN</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-bold text-white"></i>BARANG</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('barang.index') }}">DATA BARANG</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('opname.index') }}">UPDATE STOK BARANG</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('stok.index') }}">
                                    <i class="fas fa-chart-line text-white"></i>SISA STOK
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        @yield('content')

        {{-- <script type="text/javascript">
            $('#example').DataTable();

        </script> --}}
</body>

</html>
