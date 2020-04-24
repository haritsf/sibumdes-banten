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
                                    {{-- <td>Password</td> --}}
                                    <td>Email</td>
                                    <td>Nama</td>
                                    <td>Created At</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{@$data->id}}</td>
                                    <td>{{@$data->username}}</td>
                                    {{-- <td>{{@$data->password}}</td> --}}
                                    <td>{{@$data->email}}</td>
                                    <td>{{@$data->name}}</td>
                                    <td>{{@$data->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td>No.</td>
                                    <td>Username</td>
                                    {{-- <td>Password</td> --}}
                                    <td>Email</td>
                                    <td>Name</td>
                                    <td>Created At</td>
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