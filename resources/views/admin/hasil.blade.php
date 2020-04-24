@extends('layouts.admin')

@section('content')

@section('title','Hasil')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Pembagian Hasil</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <h4 class="m-0"></h4>
                            </div>
                        </div>
                        <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
                            <thead class="text-center">
                                <tr>
                                    <td>Nama BUMDes</td>
                                    <td>Peruntukkan</td>
                                    <td>Presentase</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->untuk}}</td>
                                    <td>{{$data->persen}}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td>Nama BUMDes</td>
                                    <td>Peruntukkan</td>
                                    <td>Presentase</td>
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