@extends('layouts.front')
@section('content')
@section('title','Pariwisata')

<div class="d-flex justify-content-center flex-column">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-smpx-0">
        <div class="container">
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
                    <li class="nav-item {{ Route::is('wirausaha') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('wirausaha')}}">Wirausaha</a>
                    </li>
                    <li class="nav-item {{ Route::is('agribisnis') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('agribisnis')}}">Agribisnis</a>
                    </li>
                    <li class="nav-item {{ Route::is('jasa') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('jasa')}}">Jasa</a>
                    </li>
                    <li class="nav-item {{ Route::is('pariwisata') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('pariwisata')}}">Pariwisata</a>
                    </li>
                </ul>
                <ul class="header-social-icons navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-success btn-pill" href="{{route('login')}}"><i class="fab fa-stumbleupon"></i> Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="testimonials section vh-100">
    <div class="container">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Produk</span>
                <h3 class="page-title">Pariwisata</h3>
            </div>
        </div>
    </div>
    
    <div class="row container mx-auto my-3">
        @foreach ($datas as $pariwisata)
        <div class="col-lg-6 col-md-6 col-sm-12 my-3">
            <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-post__image" @if ($pariwisata->foto != null) style="background-image: url('{{asset('images/jual/'.@$pariwisata->foto)}}');" @else style="background-image: url('{{asset('images/default.png')}}" @endif>
                    <a href="" class="card-post__category badge badge-pill badge-dark">Pariwisata</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-fiord-blue" href="#">{{$pariwisata->produk}}</a>
                    </h5>
                    <table class="table-hover table-condensed">
                        <tr>
                            <td>BUMDes</td>
                            @foreach ($bumdes as $data)
                                @if ($data->id == $pariwisata->id_bumdes)
                                    <td>: {{$data->nama}}</td>
                                @endif
                            @endforeach
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>: {{$pariwisata->lokasi}}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>: {{$pariwisata->harga}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>: {{$pariwisata->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td>Kontak</td>
                            <td>: {{$pariwisata->telp}}</td>
                        </tr>
                    </table>
                    {{-- <span class="text-muted">{{$pariwisata->created_at}}</span> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection