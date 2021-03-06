@extends('layouts.user')

@section('content')

@section('title','Permodalan')

<script>
$(document).ready(function () {
  let max_fields = 10;
  let wrapper = $(".input-fields-wrap");
  let add_button = $(".add-field-button");

  let x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append(
        '<div class="form-horizontal"><div class="row"><div class="form-group col-lg-3 col-md-3 col-sm-12"><label class="label-control">Sumber</label><input class="form-control" type="text" name="sumber[]" required /></div><div class="form-group col-lg-3 col-md-3 col-sm-12"><label class="label-control">Bentuk Penyertaan</label><input class="form-control" type="text" name="bentuk[]" required /></div><div class="form-group col-lg-3 col-md-3 col-sm-12"><label class="label-control">Jumlah</label><input class="form-control" type="number" name="jumlah[]" required /></div><div class="form-group col-lg-3 col-md-3 col-sm-12"><label class="label-control">Tahun</label><input class="form-control" type="text" name="tahun[]" required /></div></div><a href="#" class="btn btn-outline-danger btn-pill remove-field my-2"><i class="fa fa-minus"></i></a></div>'
      );
    }
  });

  $(wrapper).on("click", ".remove-field", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});
</script>

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Permodalan</h3>
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
            Anda belum menyimpan modal
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

        @if(@$check == true)
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="card my-3">
                    <div class="card-body">
                        <form action="{{route('modal.create')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-fields-wrap">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <h4 class="m-0">Isi Permodalan</h4>
                                        <button class="btn btn-outline-primary btn-pill add-field-button mr-0 ml-auto"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                            <label class="label-control">Sumber</label>
                                            <input class="form-control" type="text" name="sumber[]" required />
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                            <label class="label-control">Bentuk Penyertaan</label>
                                            <input class="form-control" type="text" name="bentuk[]" required />
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                            <label class="label-control">Jumlah</label>
                                            <input class="form-control" type="number" name="jumlah[]" required />
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                            <label class="label-control">Tahun</label>
                                            <input class="form-control" type="text" name="tahun[]" required />
                                        </div>
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
            <div class="col-lg-4 col-md-4"></div>
        </div>
    @endif
    
    @else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card my-3">
                <div class="card-header">
                    <form action="{{route('modal.create')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="input-fields-wrap">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <h4 class="m-0">Tambah Permodalan</h4>
                                    <button class="btn btn-outline-primary btn-pill add-field-button mr-0 ml-auto"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                        <label class="label-control">Sumber</label>
                                        <input class="form-control" type="text" name="sumber[]" required />
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                        <label class="label-control">Bentuk Penyertaan</label>
                                        <input class="form-control" type="text" name="bentuk[]" required />
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                        <label class="label-control">Jumlah</label>
                                        <input class="form-control" type="number" name="jumlah[]" required />
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                        <label class="label-control">Tahun</label>
                                        <input class="form-control" type="text" name="tahun[]" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-outline-primary btn-pill mr-0 ml-auto">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="form-horizontal">
                        <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
                            <thead class="text-center">
                                <tr>
                                    <td>Sumber</td>
                                    <td>Bentuk</td>
                                    <td>Jumlah</td>
                                    <td>Tahun</td>
                                    <td>Opsi</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{@$data['sumber']}}</td>
                                    <td>{{@$data['bentuk']}}</td>
                                    <td>{{@$data['jumlah']}}</td>
                                    <td>{{@$data['tahun']}}</td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-pill" data-toggle="modal" data-target="#modalEdit{{@$data['id']}}"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-outline-danger btn-pill" data-toggle="modal" data-target="#modalDelete{{@$data['id']}}"><i class="fa fa-minus"></i></button>
                                    </td>
                                    <div class="modal fade" id="modalEdit{{@$data['id']}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('modal.update', $data['id'])}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ubah Data Permodalan</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal">
                                                            <div class="row">
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                                    <label class="label-control">Sumber</label>
                                                                    <input class="form-control" type="text" name="sumber" value="{{@$data['sumber']}}" />
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                                    <label class="label-control">Bentuk</label>
                                                                    <input class="form-control" type="text" name="bentuk" value="{{@$data['bentuk']}}" />
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                                    <label class="label-control">Jumlah</label>
                                                                    <input class="form-control" type="number" name="jumlah" value="{{@$data['jumlah']}}" />
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                                    <label class="label-control">Tahun</label>
                                                                    <input class="form-control" type="text" name="tahun" value="{{@$data['tahun']}}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <div style="display:none">
                                                            <input type="number" name="id" value="{{@$data['id']}}">
                                                            <input type="number" name="id_bumdes" value="{{@$data['id_bumdes']}}">
                                                        </div>
                                                        <button class="btn btn-outline-danger btn-pill"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-outline-success btn-pill">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalDelete{{@$data['id']}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('modal.delete', $data['id'])}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Permodalan</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus {{@$data['sumber']}}?
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <div style="display:none">
                                                            <input type="number" name="id" value="{{@$data['id']}}">
                                                        </div>
                                                        <button class="btn btn-outline-danger btn-pill" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-outline-success btn-pill">Iya</button>
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
                                    <td>Sumber Modal</td>
                                    <td>Bentuk</td>
                                    <td>Jumlah</td>
                                    <td>Tahun</td>
                                    <td>Opsi</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
@endsection