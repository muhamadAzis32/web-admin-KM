<!DOCTYPE html>
<html lang="en">


  @include('landingPage.partials.head')
<body>

  <!-- ======= Header ======= -->
  @include('landingPage.partials.navbar')
  <!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  {{-- @include('landingPage.partials.slide') --}}
  @yield('slide')
  <!-- End Hero -->
  <main id="main">
  {{-- main --}}
  {{$slot}}
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('landingPage.partials.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('landingPage.partials.scripts')
</body>

</html>