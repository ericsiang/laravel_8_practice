<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('school','')</title>
    @include('front.layouts.head')
    @yield('add_head','')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('front.layouts.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('front.layouts.slider')
  <!-- End Hero -->

  <main id="main">
        @yield('main_content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('front.layouts.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  @include('front.layouts.last_js')
  @yield('last_add_js','')

</body>

</html>
