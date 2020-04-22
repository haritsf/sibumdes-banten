@extends('layouts.app')

@section('content')

@section('title','BUMDes')

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
        '<div class="row"><div class="form-group col-lg-6 col-md-6 col-sm-12"><label class="label-control">Nama</label><input class="form-control" type="text" name="nama[]" required /></div><div class="form-group col-lg-6 col-md-6 col-sm-12"><label class="label-control">Jabatan</label><input class="form-control" type="text" name="jabatan[]" required /><a href="#" class="btn btn-outline-danger btn-pill remove-field my-2"><i class="fa fa-minus"></i></a></div></div>'
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
            <h3 class="page-title">BUMDes</h3>
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

    <!-- Belum Punya Data -->

    @if (@$data['bumdes'] == null && @$data['pengurus'] == null)

    <div class="alert alert-warning fade show alert-has-icon" role="alert" style="border-radius: 0.625rem">
        <div class="alert-icon">
            <i class="far fa-bell"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Perhatian</div>
            BUMDes anda belum terdaftar. Segera daftarkan BUMDes anda!
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="{{route('bumdes.create')}}" method="POST">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="form-horizontal">
                            <h4>Data</h4>
                            <div class="form-group">
                                <label class="label-control">Nama</label>
                                <div class="form-control disabled">{{Auth::user()->name}}</div>
                            </div>
                            <div class="form-group">
                                <label class="label-control">Kabupaten</label>
                                <select class="form-control" type="text" name="kabupaten" required />
                                    <option value="Serang">Serang</option>
                                    <option value="Lebak">Lebak</option>
                                    <option value="Pandeglang">Pandeglang</option>
                                    <option value="Tangerang">Tangerang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label-control">Kecamatan</label>
                                <input class="form-control" type="text" name="kecamatan" required />
                            </div>
                            <div class="form-group">
                                <label class="label-control">Desa</label>
                                <input class="form-control" type="text" name="desa" required />
                            </div>
                            <div class="form-group">
                                <label class="label-control">Alamat</label>
                                <input class="form-control" type="text" name="alamat" required />
                            </div>
                            <div class="form-group">
                                <label class="label-control">No. Telp</label>
                                <input class="form-control" type="text" name="telp" required />
                            </div>
                            <h4>Pendirian</h4>
                            <div class="form-group">
                                <label class="label-control">Tanggal Musyawarah Desa</label>
                                <input class="form-control" type="date" name="musyawarah" required />
                            </div>
                            <div class="form-group">
                                <label class="label-control">Peraturan Desa</label>
                                <input class="form-control" type="text" name="perdes" required />
                            </div>
                            <div class="form-group">
                                <label class="label-control">SK Kepala Desa</label>
                                <input class="form-control" type="text" name="sk" required />
                            </div>
                            <div style="display:none">
                                <input type="number" name="id_user" value="{{Auth::user()->id}}" required />
                                <input type="text" name="bumdes" value="{{Auth::user()->name}}" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm 12">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="input-group-prepend">
                            <h4 class="text-secondary">Isi Pengurus</h4>
                            <button class="btn btn-outline-primary btn-pill add-field-button mr-0 ml-auto mb-2"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="input-fields-wrap">
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label class="label-control">Nama</label>
                                        <input class="form-control" type="text" name="nama[]" required />
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label class="label-control">Jabatan</label>
                                        <input class="form-control" type="text" name="jabatan[]" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-outline-primary btn-pill mr-0 ml-auto">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- End Belum Punya Data -->

    @else

    <!-- Punya Data -->

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <h4 class="m-0">Data</h4>
                                <button class="btn btn-outline-warning btn-pill mr-0 ml-auto" data-toggle="modal" data-target="#modalEdit{{@$data['bumdes']->id}}"><i class="far fa-edit"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama</label>
                            <div class="form-control disabled">{{@$data['bumdes']['nama']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Kabupaten</label>
                            <div class="form-control disabled">{{@$data['bumdes']['kabupaten']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Kecamatan</label>
                            <div class="form-control disabled">{{@$data['bumdes']['kecamatan']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Kecamatan</label>
                            <div class="form-control disabled">{{@$data['bumdes']['desa']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Alamat</label>
                            <div class="form-control disabled">{{@$data['bumdes']['alamat']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">No. Telp</label>
                            <div class="form-control disabled">{{@$data['bumdes']['telp']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Email</label>
                            <div class="form-control disabled">{{@$data['user']['email']}}</div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <h4>Pendirian</h4>
                        <div class="form-group">
                            <label class="label-control">Tanggal Musyawarah Desa</label>
                            <div class="form-control disabled">{{@$data['bumdes']['musyawarah']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Peraturan Desa</label>
                            <div class="form-control disabled">{{@$data['bumdes']['perdes']}}</div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">SK Kepala Desa</label>
                            <div class="form-control disabled">{{@$data['bumdes']['sk']}}</div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalEdit{{@$data['bumdes']->id}}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('bumdes.update', @$data['bumdes']->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Data BUMDes</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="label-control">Nama</label>
                                            <input type="text" class="form-control" name="nama"
                                                value="{{@$data['bumdes']['nama']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Kabupaten</label>
                                            <select class="form-control" name="kabupaten">
                                                <option value="{{@$data['bumdes']['kabupaten']}}">
                                                    {{@$data['bumdes']['kabupaten']}}</option>
                                                <option value="Serang">Serang</option>
                                                <option value="Lebak">Lebak</option>
                                                <option value="Tangerang">Tangerang</option>
                                                <option value="Pandeglang">Pandeglang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Kecamatan</label>
                                            <input type="text" class="form-control" name="kecamatan"
                                                value="{{@$data['bumdes']['kecamatan']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Desa</label>
                                            <input type="text" class="form-control" name="desa"
                                                value="{{@$data['bumdes']['desa']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Alamat</label>
                                            <input type="text" class="form-control" name="alamat"
                                                value="{{@$data['bumdes']['alamat']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">No. Telp</label>
                                            <input type="text" class="form-control" name="telp"
                                                value="{{@$data['bumdes']['telp']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{@$data['user']['email']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Tanggal Musyawarah Desa</label>
                                            <input type="date" class="form-control" name="musyawarah"
                                                value="{{@$data['bumdes']['musyawarah']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Peraturan Desa</label>
                                            <input type="text" class="form-control" name="perdes"
                                                value="{{@$data['bumdes']['perdes']}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">SK Kepala Desa</label>
                                            <input type="text" class="form-control" name="sk"
                                                value="{{@$data['bumdes']['sk']}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-whitesmoke br">
                                        <div style="display:none">
                                            <input type="number" name="id" value="{{@$data['bumdes']['id']}}">
                                            <input type="number" name="id_user" value="{{@$data['bumdes']['id_user']}}">
                                        </div>
                                        <button class="btn btn-outline-danger btn-pill"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-outline-success btn-pill">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm 12">
            <div class="card my-3">
                <div class="card-body">

                    {{-- Buat Nambah Pengurus --}}
                    <form action="{{route('bumdes.create.pengurus')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="input-fields-wrap">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <h4 class="m-0">Daftar Pengurus</h4>
                                    <button class="btn btn-outline-primary btn-pill add-field-button mr-0 ml-auto"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label class="label-control">Nama</label>
                                        <input class="form-control" type="text" name="nama[]" required />
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label class="label-control">Jabatan</label>
                                        <input class="form-control" type="text" name="jabatan[]" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-prepend mb-3">
                            <button type="submit" class="btn btn-outline-primary btn-pill mr-0 ml-auto">Simpan</button>
                        </div>
                    </form>
                    {{-- End of Buat Nambah Pengurus --}}

                    <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
                        <thead class="text-center">
                            <tr>
                                <td>Nama Pengurus</td>
                                <td>Jabatan</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($data['pengurus'] as $data)
                            <tr>
                                <td>{{@$data->nama}}</td>
                                <td>{{@$data->jabatan}}</td>
                                <td>
                                    <button class="btn btn-sm btn-pill btn-outline-warning" data-toggle="modal" data-target="#pengurusEdit{{@$data->id}}"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-sm btn-pill btn-outline-danger" data-toggle="modal" data-target="#pengurusDelete{{@$data->id}}"><i class="fa fa-minus"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="pengurusEdit{{@$data->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('bumdes.update.pengurus', @$data->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Data Pengurus</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-horizontal row">
                                                    <div class="form-group col">
                                                        <label class="label-control">Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="{{@$data->nama}}">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label class="label-control">Jabatan</label>
                                                        <input type="text" class="form-control" name="jabatan" value="{{@$data->jabatan}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                                <div style="display:none">
                                                    <input type="number" name="id" value="{{@$data->id}}">
                                                    <input type="number" name="id_bumdes" value="{{@$data->id_bumdes}}">
                                                </div>
                                                <button class="btn btn-outline-danger btn-pill"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-outline-success btn-pill">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pengurusDelete{{@$data->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('bumdes.delete.pengurus', @$data->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data Pengurus</h5>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus {{@$data->nama}}?
                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                                <div style="display:none">
                                                    <input type="number" name="id" value="{{@$data->id}}">
                                                </div>
                                                <button class="btn btn-outline-danger btn-pill"
                                                    data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-outline-success btn-pill">Iya</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot class="text-center">
                            <tr>
                                <td>Nama Pengurus</td>
                                <td>Jabatan</td>
                                <td>Opsi</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- End Punya Data -->

    @endif

</div>
@endsection