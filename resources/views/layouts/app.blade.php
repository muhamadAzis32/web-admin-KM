<!DOCTYPE html>
<html lang="en">

@include('partials.head')
{{-- @include('notify::components.notify')
@notifyCss --}}
<body class="g-sidenav-show  bg-gray-100">

  <!-- sidebar -->
  @include('partials.sidebar')
  <!-- end sidebar -->

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

  <!-- Navbar -->
    @include('partials.navbar')
  <!-- End Navbar -->

  <!-- container -->
    <div class="container-fluid py-4">      
      
       <!-- isi konten -->
        {{$slot}}
        @yield('content')

       <!-- end isi konten -->

      <!-- footer -->
        @include('partials.footer')
      <!-- end isi footer -->

    </div>
  <!-- end container -->


  </main>

  <div class="fixed-plugin">
    @include('partials.plugin')
  </div>
  

  @include('partials.scripts')
  {{-- @notifyJs --}}
</body>

</html>