@extends('layouts.front')
@section('content')
@section('title','Pariwisata')

<body class="shards-app-promo-page--1">

    <div class="welcome d-flex justify-content-center flex-column">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark pt-4 px-0">
                <a class="navbar-brand mr-5" href="{{route('landing')}}">
                    <img src="{{asset('images/prov-banten.png')}}" class="mr-2" width="50em">
                    SIBUMDes
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Route::is('landing') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('landing')}}">Beranda</a>
                        </li>
                    </ul>
                    <ul class="header-social-icons navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-outline-success btn-pill" href="{{route('login')}}"><i
                                    class="fab fa-stumbleupon"></i> Masuk</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="inner-wrapper mt-auto mb-auto container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Pariwisata</h4>
                            <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
                                <thead class="text-center">
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama</td>
                                        <td>Jenis Usaha</td>
                                        <td>Omset</td>
                                        <td>Telp</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="main-footer py-3 bg-dark">
        <div class="container pl-0 pr-0">
            <div class="col-lg-12 col-md-12 col-sm-12 ml-auto mr-auto text-left">
                <h4 class="text-light mt-3"><b>SIBUMDES</b></h4>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <p class="text-secondary text-justify">SIBUMDEs adalah Sistem Informasi Badan Usaha Milik Desa
                            yang berisi
                            data dan informasi tentang BUMTHES, serta sebagai <i>market place</i> BUMDesa yang ada di
                            Provinsi
                            Banten.<br>
                            Jika Anda ingin bantuan atau memiliki masukan, silahkan hubungi kami</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h6 class="text-secondary mb-0"><b>Bantuan</b></h6>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-secondary">Cara Mendaftar</a></li>
                            <li><a href="" class="text-secondary">Cara Mengupdate Data</a></li>
                            <li><a href="" class="text-secondary">Cara Pembelian Produk</a></li>
                            <li><a href="" class="text-secondary">Pembatalan Transaksi</a></li>
                        </ul>
                        <h6 class="text-secondary mb-0"><b>Layanan</b></h6>
                        <ul class="list-unstyled">
                            <li>Kantor Kami</li>
                            <li>Hubungi Kami</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h6 class="text-secondary mb-0"><b>Dinas Pemberdayaan Masyarakat dan Desa Provinsi Banten</b>
                        </h6>
                        <p class="text-secondary">Telp<br>Email</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('landing')}}">SIBUMDes</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Route::is('landing') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('landing')}}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <p class="text-center pb-4 my-0">&copy; Copyright — SIBUMDes DPMD Provinsi Banten. All Rights Reserved 2020
            </p>
        </div>
    </footer>
    <!-- / Footer Section -->

</body>

@endsection