@extends('layouts.admin')

@section('content')

@section('title','User')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">User</h3>
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
    @if ($message = Session::get('danger'))
    <div class="alert alert-danger alert-dismissible fade show alert-has-icon mt-3" role="alert">
        <div class="alert-icon">
            <i class="fas fa-trash"></i>
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
                    <div class="form-horizontal">
                        <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
                            <thead class="text-center">
                                <tr>
                                    <td>No.</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>Nama</td>
                                    <td>Created At</td>
                                    <td>Opsi</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{@$data->id}}</td>
                                    <td>{{@$data->username}}</td>
                                    <td>{{@$data->email}}</td>
                                    <td>{{@$data->name}}</td>
                                    <td>{{@$data->created_at}}</td>
                                    <td>
                                        @if (@$data->role != "admin")
                                        <button class="btn btn-outline-danger btn-pill" data-toggle="modal" data-target="#modalDelete{{@$data->id}}"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-outline-warning btn-pill" data-toggle="modal" data-target="#modalUpdate{{@$data->id}}"><i class="fa fa-unlock"></i></button>
                                        @endif
                                    </td>
                                    <div class="modal fade" id="modalDelete{{@$data->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('admin.user.delete', $data->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus User</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus {{@$data->name}}?
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <div style="display:none">
                                                            <input type="number" name="id" value="{{@$data->id}}">
                                                        </div>
                                                        <button class="btn btn-outline-danger btn-pill" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-outline-success btn-pill">Iya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalUpdate{{@$data->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('admin.user.update', $data->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ubah Password User</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-lg col-md col-sm">
                                                            <label class="label-control">Isi Password Baru</label>
                                                            <input class="form-control" name="password" type="password" required autofocus />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <div style="display:none">
                                                            <input type="number" name="id" value="{{@$data->id}}">
                                                        </div>
                                                        <button class="btn btn-outline-danger btn-pill" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-outline-success btn-pill">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td>No.</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>Name</td>
                                    <td>Created At</td>
                                    <td>Opsi</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection