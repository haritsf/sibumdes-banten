@extends('layouts.admin')

@section('content')

@section('title','Penjualan')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Penjualan</h3>
        </div>
    </div>
    <!-- End Page Header -->

    {{-- Hidden Tables --}}
    <table style="display: none" id="hiddenTables">
        <thead class="text-center">
            <tr>
                <td>Nama BUMDes</td>
                <td>Nama Unit Usaha</td>
                <td>Produk</td>
                <td>Harga</td>
                <td>Lokasi</td>
                <td>Telepon</td>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datas['jual'] as $data)
            <tr>
                <td>{{@$data->nama}}</td>
                <td>
                    @if ( $check = $datas['unit']->where('id', $data->id_unit)->first())
                        {{$check->nama}}
                    @endif
                </td>
                <td>{{@$data->produk}}</td>
                <td>Rp. {{@$data->harga}}</td>
                <td>{{@$data->lokasi}}</td>
                <td>{{@$data->telp}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="text-center">
            <tr>
                <td>Nama BUMDes</td>
                <td>Nama Unit Usaha</td>
                <td>Produk</td>
                <td>Harga</td>
                <td>Lokasi</td>
                <td>Telepon</td>
            </tr>
        </tfoot>
    </table>
    {{-- End of Hidden Tables --}}

    <div class="row">
        @foreach($datas['jual'] as $data)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <h4 class="m-0">List {{$data->id}}</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama BUMDes</label>
                            <div class="form-control disabled">{{@$data->nama}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Unit</label>
                            <div class="form-control disabled">
                                @if ( $check = $datas['unit']->where('id', $data->id_unit)->first())
                                    {{$check->nama}}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Produk</label>
                            <div class="form-control disabled">{{@$data->produk}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Gambar</label>
                            @if (@$data->foto == null)
                            <img class="input-group-middle mx-auto" src="{{asset('images/default.png')}}"
                                alt="{{@$data->produk}}" width="150rem" />
                            @else
                            <img class="input-group-middle mx-auto" src="{{asset('images/jual/'.@$data->foto)}}"
                                alt="{{@$data->produk}}" width="150rem" />
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="label-control">Harga</label>
                            <div class="form-control disabled">Rp. {{@$data->harga}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Lokasi</label>
                            <div class="form-control disabled">{{@$data->lokasi}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Telepon</label>
                            <div class="form-control disabled">{{@$data->telp}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection