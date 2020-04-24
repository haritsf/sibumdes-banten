<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} • @yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('images/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('images/favicon-16x16.png')}}" sizes="16x16">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/shards-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard-extras.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">

    <style>
        .checkHide {
            display: none;
        }
    </style>

    <!-- Scripts -->
    <script src="{{asset('fonts/fontawesome/js/all.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/chartjs.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/jquery.sharrre.js')}}"></script>
    <script src="{{asset('js/extras-dashboard.js')}}"></script>
    <script src="{{asset('js/shards-dashboard.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script>
        $(document).ready(function() {
          $('#dataTables').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
        });
    </script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                                    src="{{asset('images/prov-banten.png')}}">
                                <span class="d-none d-md-inline ml-1">SIBUMDes</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none"><i class="fab fa-stumbleupon"></i></a>
                    </nav>
                </div>
                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">

                    </div>
                </form>
                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.home') ? 'active' : '' }}" href="{{route('admin.home')}}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.bumdes.view') ? 'active' : '' }}" href="{{route('admin.bumdes.view')}}">BUMDes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.unit.view') ? 'active' : '' }}" href="{{route('admin.unit.view')}}">Unit Usaha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.modal.view') ? 'active' : '' }}" href="{{route('admin.modal.view')}}">Permodalan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.hasil.view') ? 'active' : '' }}" href="{{route('admin.hasil.view')}}">Hasil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.jual.view') ? 'active' : '' }}" href="{{route('admin.jual.view')}}">Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.user.view') ? 'active' : '' }}" href="{{route('admin.user.view')}}">User</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                {{-- Kosong Untuk Search Bar --}}
                            </div>
                        </form>
                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="{{asset('images/avatar.png')}}"
                                        alt="User Avatar">
                                    <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item {{ Route::is('profile.view') ? 'text-primary' : '' }}" href="{{route('profile.view')}}">Profile</a>
                                    <a class="dropdown-item {{ Route::is('home') ? 'text-primary' : '' }}" href="{{route('home')}}">Overview</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" style="font-size:1.25rem"
                                class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                                aria-controls="header-navbar">
                                <i class="fab fa-stumbleupon"></i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->

                <!-- Start Content -->
                <div class="main-content-container container-fluid px-2 py-2">
                    @yield('content')
                </div>
                <!-- / End Content -->

                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <span class="copyright ml-auto my-auto mr-2">&copy; Copyright — SIBUMDes DPMD Provinsi Banten. All
                        Rights Reserved 2020
                    </span>
                </footer>
            </main>
        </div>
    </div>
</body>

</html>