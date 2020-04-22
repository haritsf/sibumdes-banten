@extends('layouts.front')
@section('content')
@section('title', 'Landing')

<!-- Head Section -->
<div class="welcome d-flex justify-content-center flex-column">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark px-0">
      <a class="navbar-brand mr-5" href="{{route('landing')}}">
        <img src="{{asset('images/prov-banten.png')}}" class="mr-2" width="50em">
        SIBUMDes
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item {{ Route::is('landing') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('landing')}}">Beranda</a>
          </li>
          <li class="nav-item {{ Route::is('landing/#information') ? 'active' : '' }}">
            <a class="nav-link" href="#information" data-scroll-to="#information">Informasi</a>
          </li>
          <li class="nav-item {{ Route::is('landing/#data') ? 'active' : '' }}">
            <a class="nav-link" href="#data" data-scroll-to="#data">Data</a>
          </li>
        </ul>
        <ul class="header-social-icons navbar-nav ml-auto">
          <li class="nav-item">
            <a class="btn btn-outline-success btn-pill" href="{{route('login')}}"><i class="fab fa-stumbleupon"></i>
              Masuk</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="inner-wrapper mt-auto mb-auto container">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-12 mt-auto mb-auto mr-3">
        <h1 class="welcome-heading display-4 text-white animated fadeInUp delay-1s">Sistem Informasi Badan Usaha Milik Desa</h1>
        <p class="text-muted"></p>
        <a href="#introduction" class="btn btn-outline-success btn-pill align-self-center animated fadeInUp delay-3s"
          data-scroll-to="#introduction" id="scroll-to-content"><i class="fas fa-angle-double-right"></i> Lihat Lebih
          Lanjut</a>
        <div class="d-block mt-4">
        </div>
      </div>

      <div class="col-lg-4 col-md-5 col-sm-12 ml-auto">
        <img class="iphone-mockup ml-auto animated fadeInUp delay-2s" src="{{asset('images/sibumdes.png')}}">
      </div>
    </div>
  </div>
</div>
<!-- / Head Section -->

<!-- Statistics Section -->
<div id="app-features" class="app-features section-invert">
  <div class="container-fluid">
    <div class="row">
      <div class="app-screenshot col-lg-4 col-md-12 col-sm-12 px-0 py-5"></div>
      <div id="information" class="app-features-wrapper col-lg-6 col-md-6 col-sm-12 py-5 ml-2">
        <div class="container">
          <h3 class="section-title underline--left my-5">Jumlah Tiap Kecamatan</h3>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="feature py-4 d-flex">
                <img src="{{asset('images/kab.png')}}" width="65em" height="65em" alt="Serang"
                  style="display:inline-block; margin-right: 3rem">
                <div>
                  <h5 class="my-0 py-0">Serang</h5>
                  <h3 class="my-0 py-0">{{$datas['countSerang']}} Unit</h3>
                </div>
              </div>
              <div class="feature py-4 d-flex">
                <img src="{{asset('images/kab.png')}}" width="65em" height="65em" alt="Tangerang"
                  style="display:inline-block; margin-right: 3rem">
                <div>
                  <h5 class="my-0 py-0">Tangerang</h5>
                  <h3 class="my-0 py-0">{{$datas['countTangerang']}} Unit</h3>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="feature py-4 d-flex">
                <img src="{{asset('images/kab.png')}}" width="65em" height="65em" alt="Lebak"
                  style="display:inline-block; margin-right: 3rem">
                <div>
                  <h5 class="my-0 py-0">Lebak</h5>
                  <h3 class="my-0 py-0">{{$datas['countLebak']}} Unit</h3>
                </div>
              </div>
              <div class="feature py-4 d-flex">
                <img src="{{asset('images/kab.png')}}" width="65em" height="65em" alt="Pandeglang"
                  style="display:inline-block; margin-right: 3rem">
                <div>
                  <h5 class="my-0 py-0">Pandeglang</h5>
                  <h3 class="my-0 py-0">{{$datas['countPandeglang']}} Unit</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Statistics Section -->

<!-- BUMDes Section -->
<div class="testimonials section py-4">
  <h3 class="section-title text-center m-5">Badan Usaha Milik Desa</h3>
  <div id="introduction" class="container py-5">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table width="100%" class="table table-striped table-hover table-sm" id="dataTables">
          <thead class="text-center">
            <tr>
              <td>Nama</td>
              <td>Kabupaten</td>
              <td>Telp</td>
              <td>Opsi</td>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($datas['allBumdes'] as $data)
            <tr>
              <td>{{$data['nama']}}</td>
              <td>{{$data['kabupaten']}}</td>
              <td>{{$data['telp']}}</td>
              <td><button class="btn btn-sm btn-outline-warning btn-pill" data-toggle="modal"
                  data-target="#modalDetail{{$data['id']}}"><i class="far fa-edit"></i> Detail</button></td>
            </tr>
            <div class="modal fade" id="modalDetail{{$data['id']}}" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <h5 class="">Detail</h5>
                    <div class="form-group">
                      <label class="label-control">Nama</label>
                      <div class="form-control disabled">{{$data['nama']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Kabupaten</label>
                      <div class="form-control disabled">{{$data['kabupaten']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Kecamatan</label>
                      <div class="form-control disabled">{{$data['kecamatan']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Desa</label>
                      <div class="form-control disabled">{{$data['desa']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Alamat</label>
                      <div class="form-control disabled">{{$data['alamat']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Telepon</label>
                      <div class="form-control disabled">{{$data['telp']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Musyawarah</label>
                      <div class="form-control disabled">{{$data['musyawarah']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Peraturan Desa</label>
                      <div class="form-control disabled">{{$data['perdes']}}</div>
                    </div>
                    <div class="form-group">
                      <label class="label-control">SK Kepala Desa</label>
                      <div class="form-control disabled">{{$data['sk']}}</div>
                    </div>
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                    <button class="btn btn-outline-danger btn-pill" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </tbody>
          <tfoot class="text-center">
            <tr>
              <td>Nama</td>
              <td>Kabupaten</td>
              <td>Telp</td>
              <td>Opsi</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- / BUMDes Section -->

<!-- Unit Usaha Section -->
<div id="data" class="blog section py-4 bg-dark">
  <h3 class="section-title text-center text-light m-5">Unit Usaha</h3>
  <div class="container">
    <div class="py-4">
      <div class="row">
        <div class="card-deck">
          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="card mb-4">
              <img class="card-img-top" src="{{asset('images/wirausaha.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Wirausaha</h4>
                <a class="btn btn-outline-success btn-pill" href="{{route('wirausaha')}}"><i
                    class="fas fa-angle-double-right"></i> Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="card mb-4">
              <img class="card-img-top" src="{{asset('images/agribisnis.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Agribisnis</h4>
                <a class="btn btn-outline-success btn-pill" href="{{route('agribisnis')}}"><i
                    class="fas fa-angle-double-right"></i> Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="card mb-4">
              <img class="card-img-top" src="{{asset('images/jasa.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Pelayanan Jasa</h4>
                <a class="btn btn-outline-success btn-pill" href="{{route('jasa')}}"><i
                    class="fas fa-angle-double-right"></i> Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="card mb-4">
              <img class="card-img-top" src="{{asset('images/pariwisata.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Pariwisata</h4>
                <a class="btn btn-outline-success btn-pill" href="{{route('pariwisata')}}"><i
                    class="fas fa-angle-double-right"></i> Lihat</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Unit Usaha Section -->

<!-- Contact Section -->
<div class="contact section-invert py-4">
  <h3 class="section-title text-center m-2">Pendaftaran</h3>
  <div class="container py-1">
    <div class="row justify-content-md-center px-4">
      <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4">
        <p class="text-center">Daftarkan Akun dan BUMDes anda pada situs SIBUMDes</p>
        <center><a class="btn btn-outline-primary btn-pill" href="{{route('register')}}"><i
              class="fas fa-angle-double-right"></i> Daftar</a></center>
      </div>
    </div>
  </div>
</div>
<!-- / Contact Section -->

@endsection