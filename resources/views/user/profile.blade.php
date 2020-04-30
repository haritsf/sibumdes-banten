@extends('layouts.user')

@section('content')

@section('title','Profile')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Profile</h3>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show alert-has-icon mt-3" role="alert">
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
    <!-- End Page Header -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <form action="{{route('profile.update', @$data['id'])}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-horizontal">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 pl-0">
                                <div class="input-group-prepend">
                                    <h4 class="m-0">Data</h4>
                                    <button type="submit" class="btn btn-primary btn-pill mr-0 ml-auto">Simpan</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Username</label>
                                    <input class="form-control" disabled type="text" value="{{$data['username']}}" />
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Password Baru</label>
                                    <input class="form-control" name="password" type="password" required />
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Email</label>
                                    <input class="form-control" disabled type="text" value="{{$data['email']}}" />
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Nama BUMDes</label>
                                    <input class="form-control" disabled type="text" value="{{$data['name']}}" />
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Tanggal Verified</label>
                                    <input class="form-control" disabled type="datetime" value="{{$data['username_verified_at']}}" />
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Tanggal Pendaftaran</label>
                                    <input class="form-control" disabled type="datetime" value="{{$data['created_at']}}" />
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                    <label class="label-control">Terakhir Di Update</label>
                                    <input class="form-control" disabled type="datetime" value="{{$data['updated_at']}}" />
                                </div>
                                <div style="display:none">
                                    <input type="number" name="id" value="{{$data['id']}}" required />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection