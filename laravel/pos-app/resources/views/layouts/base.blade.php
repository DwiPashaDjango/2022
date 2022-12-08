<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  {{-- <link rel="stylesheet" href="{{asset('static/modules/bootstrap/css/bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap/css/bootstrap.min.css">
  {{-- <link rel="stylesheet" href="{{asset('static/modules/fontawesome/css/all.min.css')}}"> --}}
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/style.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('layouts.navbar')
      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('layouts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://demo.getstisla.com/assets/modules/jquery.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/datatables/datatables.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
  <script src="https://demo.getstisla.com/assets/js/stisla.js"></script>
  <script src="https://demo.getstisla.com/assets/js/scripts.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/popper.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/tooltip.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/moment.min.js"></script>
  @include('sweetalert::alert')
  @yield('scripts')
</body>
</html>