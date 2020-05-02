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

</body>

</html>