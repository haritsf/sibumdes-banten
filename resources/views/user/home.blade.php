@extends('layouts.user')
@section('content')
@section('title','Overview')
<div class="main-content-container container-fluid px-4">
    {{-- @if (session('status')) --}}
    <div class="alert alert-success alert-dismissible fade show alert-has-icon mt-3" role="alert">
        <div class="alert-icon">
            <i class="far fa-check-circle"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Sukses</div>
            Selamat Datang {{Auth::user()->name}}. Anda berhasil Masuk.
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {{-- @endif --}}

    @if ($message = Session::get('success'))
    <div class="alert alert-info alert-dismissible fade show alert-has-icon mt-3" role="alert">
        <div class="alert-icon">
            <i class="far fa-check-circle"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Sukses</div>
            {{$message}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Overview</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="row">
        <div class="col-lg col-md col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Pengurus</span>
                            <h6 class="stats-small__value count my-3">{{$datas['pengurus']->count()}} Orang</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Jenis Usaha</span>
                            <h6 class="stats-small__value count my-3">{{$datas['unit']->count()}} Unit</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Total Modal</span>
                            <h6 class="stats-small__value count my-3">Rp. {{$datas['sumModal']}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Pembagian Hasil</span>
                            <h6 class="stats-small__value count my-3">{{$datas['sumHasil']}}%</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg col-md col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Penjualan</span>
                            <h6 class="stats-small__value count my-3">{{$datas['jual']}} Produk</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection