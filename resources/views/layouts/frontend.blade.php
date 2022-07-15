<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bethany Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- ini style --}}
  @include('includes.public.style')
  @yield('costum.style')

  <!-- =======================================================
  * Template Name: Bethany - v4.7.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('includes.public.header')
  <!-- End Header -->

  <!-- End #main -->
{{-- ini konten --}}
  @yield('content')
  <!-- ======= Footer ======= -->
  @include('includes.public.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

{{-- ini script --}}
  @include('includes.public.script')

</body>

</html>