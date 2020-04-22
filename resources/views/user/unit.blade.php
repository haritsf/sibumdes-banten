@extends('layouts.app')

@section('content')

@section('title','Unit')

<script>
$(document).ready(function () {
  let max_fields = 100;
  let wrapper = $(".input-fields-wrap");
  let add_button = $(".add-field-button");

  let x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append(
        '<div class="row"><div class="form-group col-lg-4 col-md-4 col-sm-12"><label class="label-control">Nama</label><input class="form-control" type="text" name="nama[]" required /></div><div class="form-group col-lg-4 col-md-4 col-sm-12"><label class="label-control">Jenis Usaha</label><select class="form-control" type="text" name="jenis[]" required><option value="Wirausaha">Wirausaha</option><option value="Agribisnis">Agribisnis</option><option value="Jasa">Pelayanan Jasa</option><option value="Pariwisata">Pariwisata</option></select></div><div class="form-group col-lg-4 col-md-4 col-sm-12"><label class="label-control">Omset</label><input class="form-control" type="number" name="omset[]" required /><a href="#" class="btn btn-outline-danger btn-pill remove-field my-2"><i class="fa fa-minus"></i></a></div></div>'
      );
    }
  });

  $(wrapper).on("click", ".remove-field", function (e) {
    e.preventDefault();
    $(this).parent('div').parent('div').remove();
    x--;
  })
});
</script>

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Unit Usaha</h3>
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
    
    @if (@$datas['unit']->count() == 0)
    <div class="alert alert-warning fade show alert-has-icon" role="alert" style="border-radius: 0.625rem">
        <div class="alert-icon">
            <i class="far fa-bell"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Perhatian</div>
            Unit Usaha anda belum terdaftar. Segera daftarkan Unit Usaha anda!
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

        @if (@$datas['check'] == true)
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card my-3">
                        <form action="{{route('unit.create')}}" method="POST">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-horizontal">
                                    <h4>Data</h4>
                                    <div class="form-group">
                                        <label class="label-control">Nama</label>
                                        <input class="form-control" type="text" name="nama[]" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Jenis Usaha</label>
                                        <select class="form-control" type="text" name="jenis[]" required>
                                            <option value="Wirausaha">Wirausaha</option>
                                            <option value="Agribisnis">Agribisnis</option>
                                            <option value="Jasa">Pelayanan Jasa</option>
                                            <option value="Pariwisata">Pariwisata</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Omset</label>
                                        <input class="form-control" type="number" name="omset[]" required />
                                    </div>
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-outline-primary btn-pill mr-0 ml-auto">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm 12"></div>
            </div>

        @else

        @endif

    @elseif (@$datas['unit']->count() != 0)
        @if (@$datas['check'] == true)
            <div class="row">
                <div class="col-lg col-md col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <form action="{{route('unit.create')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group-prepend">
                                    <h4>Unit Baru</h4>
                                    <button class="btn btn-outline-primary btn-pill add-field-button mr-0 ml-auto mb-2"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="input-fields-wrap">
                                    <div class="form-horizontal row">
                                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                            <label class="label-control">Nama</label>
                                            <input class="form-control" type="text" name="nama[]" required />
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                            <label class="label-control">Jenis Usaha</label>
                                            <select class="form-control" type="text" name="jenis[]" required>
                                                <option value="Wirausaha">Wirausaha</option>
                                                <option value="Agribisnis">Agribisnis</option>
                                                <option value="Jasa">Pelayanan Jasa</option>
                                                <option value="Pariwisata">Pariwisata</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                            <label class="label-control">Omset</label>
                                            <input class="form-control" type="number" name="omset[]" required />
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
                @foreach ($datas['unit'] as $data)
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <h4 class="m-0">Data</h4>
                                        {{-- <button class="btn btn-outline-warning btn-pill mr-0 ml-auto" data-toggle="modal"
                                            data-target="#modalEdit{{@$data['id']}}">Ubah</button> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Nama</label>
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
        @endif
    @endif
</div>

@endsection