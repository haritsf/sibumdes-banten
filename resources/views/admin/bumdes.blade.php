@extends('layouts.admin')

@section('content')

@section('title','BUMDes')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">BUMDes</h3>
        </div>
    </div>

    {{-- Hidden Tables --}}
    <table style="display: none" id="hiddenTables">
        <thead class="text-center">
            <tr>
                <td>Nama</td>
                <td>Kabupaten</td>
                <td>Kecamatan</td>
                <td>Desa</td>
                <td>Alamat</td>
                <td>No. Telp</td>
                <td>Tanggal Musyawarah</td>
                <td>Peraturan Desa</td>
                <td>SK Kepala Desa</td>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datas as $data)
            <tr>
                <td>{{@$data->nama}}</td>
                <td>{{@$data->kabupaten}}</td>
                <td>{{@$data->kecamatan}}</td>
                <td>{{@$data->desa}}</td>
                <td>{{@$data->alamat}}</td>
                <td>{{@$data->telp}}</td>
                <td>{{@$data->musyawarah}}</td>
                <td>{{@$data->perdes}}</td>
                <td>{{@$data->sk}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="text-center">
            <tr>
                <td>Nama</td>
                <td>Kabupaten</td>
                <td>Kecamatan</td>
                <td>Desa</td>
                <td>Alamat</td>
                <td>No. Telp</td>
                <td>Tanggal Musyawarah</td>
                <td>Peraturan Desa</td>
                <td>SK Kepala Desa</td>
            </tr>
        </tfoot>
    </table>
    {{-- End of Hidden Tables --}}

    <div class="row">
        @foreach ($datas as $data)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <h4 class="m-0">Data {{@$data->id}}</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama</label>
                            <div class="form-control disabled">{{@$data->nama}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Kabupaten</label>
                            <div class="form-control disabled">{{@$data->kabupaten}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Kecamatan</label>
                            <div class="form-control disabled">{{@$data->kecamatan}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Desa</label>
                            <div class="form-control disabled">{{@$data->desa}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Alamat</label>
                            <div class="form-control disabled">{{@$data->alamat}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">No. Telp</label>
                            <div class="form-control disabled">{{@$data->telp}}</div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <h4>Pendirian</h4>
                        <div class="form-group">
                            <label class="label-control">Tanggal Musyawarah Desa</label>
                            <div class="form-control disabled">{{@$data->musyawarah}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Peraturan Desa</label>
                            <div class="form-control disabled">{{@$data->perdes}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">SK Kepala Desa</label>
                            <div class="form-control disabled">{{@$data->sk}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection