<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} • @yield('title')</title>
  <link rel="icon" type="image/png" href="{{asset('images/favicon-32x32.png')}}" sizes="32x32">
  <link rel="icon" type="image/png" href="{{asset('images/favicon-16x16.png')}}" sizes="16x16">

  <!-- CSS Dependencies -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('css/shards.css')}}">
  <link rel="stylesheet" href="{{asset('css/shards-extras.css')}}">
  <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">

  <!-- JavaScript Dependencies -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/datatables.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('fonts/fontawesome/js/all.js')}}"></script>

  {{-- <script src="{{asset('js/shards.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script> --}}
  <script>
    $(document).ready(function() {
          $('#dataTables').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
        });
  </script>
</head>

<body class="shards-app-promo-page--1">

  @yield('content')

  <!-- Footer Section -->
  <footer class="main-footer py-3 bg-dark">
    <div class="container pl-0 pr-0">
      <div class="col-lg-12 col-md-12 col-sm-12 ml-auto mr-auto text-left">
        <h4 class="text-light mt-3"><b>SIBUMDES</b></h4>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <p class="text-secondary text-justify">SIBUMDEs adalah Sistem Informasi Badan Usaha Milik Desa
              yang berisi
              data dan informasi tentang BUMDes, serta sebagai <i>market place</i> BUMDesa yang ada di
              Provinsi
              Banten.<br>
              Jika Anda ingin bantuan atau memiliki masukan, silahkan hubungi kami</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <h6 class="text-secondary mb-0"><b>Bantuan</b></h6>
            <ul class="list-unstyled">
              <li><a href="{{asset('files/cara-penggunaan.pdf')}}" target="_blank" class="text-secondary">Cara Mendaftar</a></li>
              <li><a href="#" class="text-secondary">Cara Mengupdate Data</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <h6 class="text-secondary mb-0"><b>Dinas Pemberdayaan Masyarakat dan Desa Provinsi Banten</b></h6>
            <table class="text-secondary">
              <tr>
                <td>Email</td>
                <td>: dpmd@bantenprov.go.id</td>
              </tr>
            </table><br />
            <h6 class="text-secondary mb-0"><b>Forum BUMDEs Indonesia Provinsi Banten</b></h6>
            <table class="text-secondary">
              <tr>
                <td>Kontak</td>
                <td>: +6281906000006</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
      <p class="text-center pb-4 my-0">&copy; Copyright — SIBUMDes DPMD Provinsi Banten. All Rights Reserved 2020
      </p>
    </div>
  </footer>
  <!-- / Footer Section -->

</body>

</html>