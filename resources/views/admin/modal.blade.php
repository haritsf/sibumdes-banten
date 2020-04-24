@extends('layouts.admin')

@section('content')

@section('title','Permodalan')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Permodalan</h3>
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
                                    <td>Nama BUMDes</td>
                                    <td>Sumber</td>
                                    <td>Bentuk</td>
                                    <td>Jumlah</td>
                                    <td>Tahun</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{@$data->nama}}</td>
                                    <td>{{@$data->sumber}}</td>
                                    <td>{{@$data->bentuk}}</td>
                                    <td>{{@$data->jumlah}}</td>
                                    <td>{{@$data->tahun}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td>Nama BUMDes</td>
                                    <td>Sumber</td>
                                    <td>Bentuk</td>
                                    <td>Jumlah</td>
                                    <td>Tahun</td>
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