@extends('layouts.app')

@section('content')

@section('title','Hasil')

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
        '<div class="form-horizontal"><div class="row"><div class="form-group col-lg-6 col-md-6 col-sm-12"><label class="label-control">Peruntukan</label><input class="form-control" type="text" name="untuk[]" required /></div><div class="form-group col-lg-6 col-md-6 col-sm-12"><label class="label-control">Persentase</label><input class="form-control" type="number" name="persen[]" required /></div></div><a href="#" class="text-danger remove-field mt-2"><b>Hapus<b></a></div>'
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
            <h3 class="page-title">Pembagian Hasil</h3>
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
            Anda belum melampirkan Pembagian Hasil.
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
                    <form action="{{route('hasil.create')}}" method="POST">
                        {{ csrf_field() }}
                        <h4>Isi Pembagian Hasil</h4>
                        <div class="input-fields-wrap">
                            <button class="btn btn-outline-primary btn-pill add-field-button mb-2">Tambah</button>
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label class="label-control">Peruntukan</label>
                                        <input class="form-control" type="text" name="untuk[]" required />
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label class="label-control">Persentase</label>
                                        <input class="form-control" type="number" name="persen[]" required />
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

    @elseif (@$data != null)
        @if (@$check == true)
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <h4 class="m-0"></h4>
                                {{-- <button class="btn btn-outline-warning btn-pill mr-0 ml-auto" data-toggle="modal"
                                    data-target="#modalEdit{{@$data['id']}}">Ubah</button> --}}
                            </div>
                        </div>
                        
                        <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
                            <thead class="text-center">
                                <tr>
                                    <td>No.</td>
                                    <td>Peruntukkan</td>
                                    <td>Presentase</td>
                                    {{-- <td>Opsi</td> --}}
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $n = 1; @endphp
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{@$data['untuk']}}</td>
                                    <td>{{@$data['persen']}}%</td>
                                    {{-- <td><a href="#id-hasil={{@$data['id']}}" class="btn btn-sm btn-pill btn-outline-warning"><i
                                                class="fa fa-edit"></i></a>
                                    </td> --}}
                                </tr>
                                @php $n++; @endphp
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td>No.</td>
                                    <td>Peruntukkan</td>
                                    <td>Presentase</td>
                                    {{-- <td>Opsi</td> --}}
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <div class="modal fade" id="modalEdit{{@$data['id']}}" role="dialog">
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
    </div>
        @endif
    @endif
</div>
@endsection