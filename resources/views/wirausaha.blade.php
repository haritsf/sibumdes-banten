@extends('layouts.front')
@section('content')
@section('title','Wirausaha')

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
                            <h4 class="card-title">Wirausaha</h4>
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

</body>

@endsection