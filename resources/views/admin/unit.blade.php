@extends('layouts.admin')

@section('content')

@section('title','Unit')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Unit Usaha</h3>
        </div>
    </div>

    <div class="row">
        @foreach ($datas['unit'] as $data)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <h4 class="m-0">Data</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama BUMDes</label>
                            <div class="form-control disabled">
                                @if ( $check = $datas['bumdes']->where('id_user', $data->id_user)->first())
                                    {{$check->nama}}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama Unit Usaha</label>
                            <div class="form-control disabled">{{@$data->nama}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Jenis Usaha</label>
                            <div class="form-control disabled">{{@$data->jenis}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Omset</label>
                            <div class="form-control disabled">Rp. {{@$data->omset}}</div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalEdit{{@$data->id}}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="route('bumdes.update', $data['bumdes']['id'])" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Data BUMDes</h5>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection