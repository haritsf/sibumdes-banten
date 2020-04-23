@extends('layouts.user')

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

    @if (@$data == null)
    <div class="alert alert-warning fade show alert-has-icon" role="alert" style="border-radius: 0.625rem">
        <div class="alert-icon">
            <i class="far fa-bell"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Perhatian</div>
            Anda belum memiliki Data Penjualan
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

        @if(@$check == true)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <form action="{{route('jual.create')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="input-group-prepend">
                                    <h4>Isi Penjualan</h4>
                                </div>
                                <div class="input-fields-wrap">
                                    <div class="form-horizontal">
                                        <div class="row">
                                            <div class="form-group col-lg col-md col-sm-12">
                                                <label class="label-control">Unit</label>
                                                <select class="form-control" type="text" name="id_unit[]" required>
                                                    @foreach ($unit as $unit)
                                                        @if ($unit->id_user == Auth::user()->id)
                                                            <option value="{{@$unit->id}}">{{@$unit->nama}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg col-md col-sm-12">
                                                <label class="label-control">Produk</label>
                                                <input class="form-control" type="text" name="produk[]" required />
                                            </div>
                                            <div class="form-group col-lg col-md col-sm-12">
                                                <label class="label-control">Foto</label>
                                                <input class="form-control" type="file" name="file[]" required />
                                                <div class="invalid-feedback" style="display: flex">Maksimal Ukuran 2MB</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg col-md col-sm-12">
                                                <label class="label-control">Harga</label>
                                                <input class="form-control" type="number" name="harga[]" required />
                                            </div>
                                            <div class="form-group col-lg col-md col-sm-12">
                                                <label class="label-control">Lokasi</label>
                                                <input class="form-control" type="text" name="lokasi[]" required />
                                            </div>
                                            <div class="form-group col-lg col-md col-sm-12">
                                                <label class="label-control">Telp</label>
                                                <input class="form-control" type="text" name="telp[]" required />
                                            </div>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-outline-primary btn-pill mr-0 ml-auto">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @else
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <form action="{{route('jual.create')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="input-group-prepend">
                            <h4>Isi Penjualan</h4>
                        </div>
                        <div class="input-fields-wrap">
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group col-lg col-md col-sm-12">
                                        <label class="label-control">Unit</label>
                                        <select class="form-control" type="text" name="id_unit[]" required>
                                            @foreach ($unit as $unit)
                                                @if ($unit->id_user == Auth::user()->id)
                                                    <option value="{{@$unit->id}}">{{@$unit->nama}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg col-md col-sm-12">
                                        <label class="label-control">Produk</label>
                                        <input class="form-control" type="text" name="produk[]" required />
                                    </div>
                                    <div class="form-group col-lg col-md col-sm-12">
                                        <label class="label-control">Foto</label>
                                        <input class="form-control" type="file" name="file[]" required />
                                        <div class="invalid-feedback" style="display: flex">Maksimal Ukuran 2MB</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg col-md col-sm-12">
                                        <label class="label-control">Harga</label>
                                        <input class="form-control" type="number" name="harga[]" required />
                                    </div>
                                    <div class="form-group col-lg col-md col-sm-12">
                                        <label class="label-control">Lokasi</label>
                                        <input class="form-control" type="text" name="lokasi[]" required />
                                    </div>
                                    <div class="form-group col-lg col-md col-sm-12">
                                        <label class="label-control">Telp</label>
                                        <input class="form-control" type="text" name="telp[]" required />
                                    </div>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                </div>
                            </div>
                        </div>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-outline-primary btn-pill mr-0 ml-auto">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($data as $jual)
            @if ($jual->id_bumdes == $bumdes->id)
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <h4 class="m-0">List</h4>
                                        <button class="btn btn-outline-primary btn-pill mr-0 ml-auto" data-toggle="modal"
                                            data-target="#modalEdit{{@$jual->id}}">Ubah</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Unit</label>
                                    <div class="form-control disabled">{{@$jual->nama}}</div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Produk</label>
                                    <div class="form-control disabled">{{@$jual->produk}}</div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Gambar</label>
                                    @if (@$jual->foto == null)
                                    <img class="input-group-middle mx-auto" src="{{asset('images/default.png')}}"
                                        alt="{{@$jual->produk}}" width="150rem"/>
                                    @else
                                    <img class="input-group-middle mx-auto" src="{{asset('images/jual/'.@$jual->foto)}}"
                                        alt="{{@$jual->produk}}" width="150rem"/>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Harga</label>
                                    <div class="form-control disabled">Rp. {{@$jual->harga}}</div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Lokasi</label>
                                    <div class="form-control disabled">{{@$jual->lokasi}}</div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Telepon</label>
                                    <div class="form-control disabled">{{@$jual->telp}}</div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalEdit{{@$jual->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('jual.update', $jual->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Data Penjualan</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="label-control">Produk</label>
                                                        <input class="form-control" type="text" name="produk"
                                                            value="{{@$jual->produk}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="label-control">Gambar</label><br>
                                                        @if (@$jual->foto == null)
                                                        <img class="input-group-middle mx-auto my-3"
                                                            src="{{asset('images/default.png')}}" alt="{{@$jual->produk}}"
                                                            width="300rem" />
                                                        @else
                                                        <img class="input-group-middle mx-auto my-3"
                                                            src="{{asset('images/jual/'.@$jual->foto)}}" alt="{{@$jual->produk}}"
                                                            width="300rem" />
                                                        @endif
                                                        <input class="form-control" type="file" name="file" />
                                                        <div class="invalid-feedback" style="display: flex">Maksimal Ukuran 2MB</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="label-control">Harga</label>
                                                        <input class="form-control" type="number" name="harga"
                                                            value="{{@$jual->harga}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="label-control">Lokasi</label>
                                                        <input class="form-control" type="text" name="lokasi"
                                                            value="{{@$jual->lokasi}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="label-control">Telepon</label>
                                                        <input class="form-control" type="text" name="telp"
                                                            value="{{@$jual->telp}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                                <div style="display:none">
                                                    <input type="number" name="id" value="{{@$jual->id}}">
                                                    <input type="number" name="id_unit" value="{{@$jual->id_unit}}">
                                                </div>
                                                <button class="btn btn-outline-danger btn-pill" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-outline-success btn-pill">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @endif
</div>
@endsection