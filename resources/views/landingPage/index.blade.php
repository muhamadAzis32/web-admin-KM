<x-guest-layout>
   <!-- ======= Hero Section ======= -->
   @include('landingPage.partials.slide')
   <!-- End Hero -->
  <main id="main">
    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">
        <div class="section-title">
          <h2>Why Us</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Gratis</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Gratis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Grtis</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Gratis</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="{{asset('tlandingPage/assets/img/why-us.jpg')}}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Facts Section ======= -->
    <section class="facts section-bg" data-aos="fade-up">
      <div class="container">
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengguna</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengajar</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Jurusan</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Program Studi</p>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Berbagai Manfaat yang Didapatkan</h2>
          {{-- <p>Berbagai Manfaat Yang Didapatkan</p> --}}
        </div>
        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-user"></i></div>
              <h4><a>LMS Dapat Menampung Jutaan Mahasiswa</a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-book"></i></div>
              <h4><a>Ribuan E-Book & Video Dengan Bebas Unduh</a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-desktop"></i></div>
              <h4><a>Menunjang Karir dan
                  Cita-cita</a></h4>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- ======= Events Section ======= -->
    <section class="portfolio">
      <div class="container">
        <div class="section-title">
          <h2>Upcoming Events</h2>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Launching</li>
              <li data-filter=".filter-card">Courses</li>
              <li data-filter=".filter-web">Webinar</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
            <div class="portfolio-item">
              <img src="{{asset('tlandingPage/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>App 1</h3>
                <div>
                  <a href="{{asset('tlandingPage/assets/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
            <div class="portfolio-item">
              <img src="{{asset('tlandingPage/assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>Web 3</h3>
                <div>
                  <a href="{{asset('tlandingPage/assets/img/portfolio/portfolio-2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
            <div class="portfolio-item">
              <img src="{{asset('tlandingPage/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>App 2</h3>
                <div>
                  <a href="{{asset('tlandingPage/assets/img/portfolio/portfolio-3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
            <div class="portfolio-item">
              <img src="{{asset('tlandingPage/assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>Card 2</h3>
                <div>
                  <a href="{{asset('tlandingPage/assets/img/portfolio/portfolio-4.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
            <div class="portfolio-item">
              <img src="{{asset('tlandingPage/assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>Web 2</h3>
                <div>
                  <a href="{{asset('tlandingPage/assets/img/portfolio/portfolio-5.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
            <div class="portfolio-item">
              <img src="{{asset('tlandingPage/assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3>App 3</h3>
                <div>
                  <a href="{{asset('tlandingPage/assets/img/portfolio/portfolio-6.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->
    

    <!-- ======= Features Section ======= -->
    <section class="service-details">
      <div class="container">
        <div class="section-title">
          <h2>Program Studi</h2>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('tlandingPage/assets/img/service-details-1.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Credit</a></h5>
                {{-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> --}}
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('tlandingPage/assets/img/service-details-2.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Sales</a></h5>
                {{-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> --}}
              </div>
            </div>

          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('tlandingPage/assets/img/service-details-3.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Collection</a></h5>
                {{-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> --}}
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======= Features Section ======= -->
    <section class="service-details">
      <div class="container">
        <div class="section-title">
          <h2>Article</h2>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('tlandingPage/assets/img/service-details-1.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Mission</a></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('tlandingPage/assets/img/service-details-2.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Plan</a></h5>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>

          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('tlandingPage/assets/img/service-details-3.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Vision</a></h5>
                <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main>
</x-guest-layout>