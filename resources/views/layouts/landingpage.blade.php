<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Credit Repair</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/icons/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('/icons/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/icons/favicon-16x16.png')}}">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="{{ asset('css/new_style.min.css?v='.env('ASSET_VERSION') ) }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

</head>

<body>
  <section>
    <header class="theme-background py-2 fixed-top">
      <div class="container">
        <div class="phone-block contact-info">
          <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="row">
              <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <a href="tel:1-844-337-8336" class="text-white"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z" stroke="#F63664"/>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="16" height="16" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
              <span class="fs-12">1-844-337-8336</span>
             </a>

              <a href="mailto:info@prudentscores.com" class="ml-4 text-white">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.9779 2.13989H2.02209C0.90713 2.13989 0 3.04702 0 4.16198V11.8377C0 12.9527 0.90713 13.8598 2.02209 13.8598H13.9779C15.0929 13.8598 16 12.9527 16 11.8377V4.16198C16 3.04702 15.0929 2.13989 13.9779 2.13989ZM13.662 3.44424L8 7.81807L2.338 3.44424H13.662ZM13.9779 12.5555H2.02209C1.62635 12.5555 1.30435 12.2335 1.30435 11.8378V4.29398L7.6013 9.15833C7.7187 9.24902 7.85939 9.29433 8 9.29433C8.14061 9.29433 8.2813 9.24902 8.3987 9.15833L14.6957 4.29398V11.8377C14.6957 12.2335 14.3737 12.5555 13.9779 12.5555Z" fill="#F63664"/>
                </svg>
                <span class="fs-12">info@prudentscores.com</span>
                </a>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-12 text-right sm-hidden">

                @if (Auth::check())
                  <a href="{{ route('logout') }}" class="ml-4 text-white">
                    <span class="fs-12">Logout</span>
                    </a>
                @else
                  <a href="{{ route('login') }}" class="ml-4 text-white">
                    <span class="fs-12">Login</span>
                    </a>

                    <a href="{{ route('register') }}" class="text-white">
                      <span class="fs-12"> / Sign up</span>
                      </a>

                @endif

                {{-- <div class="dropdown">
                    <a class="btn dropdown-toggle fs-12" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        My Account

                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item">
                            Logout
                        </a>

                    </div>
                </div> --}}
              </div>
            </div>
          </div>

        </div>
      </div>

    </header>
  </section>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="top:40px !important;">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="#"> <img src="https://prudentscores.com/images/new/logo.png" width="200px" alt="logo"> </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          @include('helpers.urls.nav_bar_guest')

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('/images/slide-1.jpg') }})">
          <div class="carousel-container mb-10px">
            <div class="container">
              <h3 class="animate__animated animate__fadeInDown text-white">WE NOT ONLY <span class="bold">HELP CLIENTS</span> TO FIX THEIR CREDIT</h3>
              <p class="animate__animated animate__fadeInUp">BUT WE ALSO EDUCATE THEM TO KEEP THEIR <span class="bold">GOOD CREDIT</span> IN HEALTHY SHAPE.</p>
              <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Start</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('/images/slide-2.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h3 class="animate__animated animate__fadeInDown text-white">WE NOT ONLY <span class="bold">HELP CLIENTS</span> TO FIX THEIR CREDIT</h3>
              <p class="animate__animated animate__fadeInUp">BUT WE ALSO EDUCATE THEM TO KEEP THEIR <span class="bold">GOOD CREDIT</span> IN HEALTHY SHAPE.</p>
              <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Start</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('/images/slide-3.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h3 class="animate__animated animate__fadeInDown text-white">WE NOT ONLY <span class="bold">HELP CLIENTS</span> TO FIX THEIR CREDIT</h3>
              <p class="animate__animated animate__fadeInUp">BUT WE ALSO EDUCATE THEM TO KEEP THEIR <span class="bold">GOOD CREDIT</span> IN HEALTHY SHAPE.</p>
              <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Start</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon fa fa-chevron-left bold" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon fa fa-chevron-right bold" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title mt-5">
          <h2 >About</h2>
          <p>About Us</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p class="text-align">
              At Prudent Credit Solutions, we have over eighteen years of experience in the credit repair industry. As a superior credit restoration firm, we set the industry standards. Prudent Credit Solutions employs experts who work diligently on acquiring new and superb knowledge concerning the credit restoration industry and use that knowledge to help you strategically dispute and correct inaccuracies on your credit reports, build better credit, and enhance borrowing power for your personal or professional needs.
            </p>

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p class="text-align">
            We know the stress that bankruptcies, foreclosures, and other financial hardship can create – and we are proud to help our clients escape those stressful situations. We combine timing, technique, services, and practical solutions in helping our clients to improve their credit history and achieve all their reasonable credit-fitness goals and enhance their borrowing power.
            </p>
            <a href="{{ route('whoWeAre') }}" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts py-5">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa fa-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="2763" data-purecounter-duration="1" class="purecounter"></span>
              <p>The number of <strong>satisfied clients</strong> served as of today.</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa fa-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="34608" data-purecounter-duration="1" class="purecounter"></span>
              <p>The number of <strong>inaccuracies</strong> removed or corrected as of today.</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>



          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa fa-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1" class="purecounter"></span>
              <p>The number of <strong>Credit Experts</strong> to Serve you.</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-5 align-items-stretch" style="background-image: url({{ asset('/images/video-img2.png') }});background-repeat: no-repeat;
          background-size: auto;" data-aos="zoom-in" data-aos-delay="100" data-toggle="modal" data-target="#exampleModalCenter">
            {{-- <a href="https://prudentscores.com/images/howItWorks.mp4" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> --}}
            <span class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></span>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background:transparent;">
                  {{-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div> --}}
                  <div class="modal-body px-0 py-0 mx-0 my-0">
                    <video id="home_video" style=" width:600px;" src="https://prudentscores.com/images/howItWorks.mp4" controls=""></video>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>Prudent Scores - Improving credit ratings and score, fast credit repair</h3>
              <p class="fs-15">In the 1800s, most credit transactions were conducted by businesses, not by consumers. As business transactions increased, commercial lenders needed to create a way to standardize credit evaluation. In 1841, the Mercantile Agency solicited information from correspondents throughout the United States to systemize a borrower's "character and assets." However, this data considered too subjective by many as the opinions noted racial, class, and gender biases. Subscribers to the Mercantile Agency (renamed R.G.</p>

              <p class="fs-15">We know the stress that bankruptcies, foreclosures, and other financial hardship can create – and we are proud to help our clients escape those stressful situations. We combine timing, technique, services, and practical solutions in helping our clients to improve their credit history and achieve all their reasonable credit-fitness goals and enhance their borrowing power.</p>

              <p class="fs-15">Most of the other credit repair firms are in letter writing business. Writing dispute letters is a “lazy man’s” approach to credit repair – one with minimal results and the constant danger of removed items being re-inserted into credit reports. Those firms usually charge consumers a monthly fee for their services, making any dishonest firm drag dispute process longer because the longer they keep you as a client, the more money they will “earn.”In comparison, we do not charge monthly fees and always strive to complete the process in the shortest time possible. We will bill you only when we correct or remove an incomplete, unverifiable, misleading, frivolous, erroneous, obsolete, inaccurate, unauthorized, or fraudulent credit item from your credit reports.</p>
            </div>



          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->
    @php

    @endphp
    <!-- ======= Reviews Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-title mt-5 pb-3">
          <h2>Reviews ({{ count($totalreviews) }}) <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></h2>
          <p>Trusted for over 15 years</p>
        </div>

        <div class="row mb-5">

            @if (isset($reviews))
              @foreach ($reviews as $key => $value)
              <div class="col-lg-4 col-md-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="px-4 {{ $key != '2' ? 'reviewborder' : '' }}">
                      <div class="row">
                        @if ($value->rating=='5')
                          <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                        @elseif($value->rating=='4')
                          <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span><span class="pt-2 ml-1"><i class="fa fa-star"></i></span>
                        @elseif($value->rating=='3')
                          <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                          <span class="pt-2"><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i></span>
                        @elseif($value->rating=='2')
                          <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i>  </span>
                          <span class="pt-2"><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i></span>
                        @elseif($value->rating=='1')
                          <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> </span>
                          <span class="pt-2"><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i></span>
                        @endif
                      </div>
                      <div class="row mt-2">
                        <strong>{{ ucfirst($value->name) }}</strong>
                      </div>
                      <div class="row mt-2">
                        {{ zactra::convertDay($value->created_by) }}
                      </div>
                      <div class="row mt-2">
                        " {{ zactra::limit_words($value->review,215)}} "
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @endif

          <div class="col-md-12 mt-4">
            <div class="row pull-right">
              <a href="{{ route('review.list') }}"><button type="button" class="revirewmorebtn" name="button">More Reviews</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title mt-5">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row  mb-5">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-globe"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-tv"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-building"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>Credit Repair</h3>

                  5800 S. Eastern Ave., Suite 500 Commerce, CA 90040<br><br>
                  <strong>Phone:</strong> 1-844-337-8336<br>
                  <strong>Email: </strong> info@prudentscores.com<br>
                </p>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="fa fa-skype"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('whoWeAre') }}">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('credit.education') }}">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('faqs') }}">Faqs</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('pravicy') }}">Privacy policy</a></li>
              </ul>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Other Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('credit.repair') }}">Credit Repair Resources </a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('legalityCreditRepair') }}">Legality Credit Repair</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('howItWorks') }}">How It Work</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('credit.free.repair') }}">Free Credit Repair</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('review.list') }}">Reviews</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Subscribe Us</h4>
              <p>You can any time unsubcribe your email address from your mail if this become annoying.</p>
              <form action="#" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>

              <div class="feature-box15 bmargin mt-5 px-3 py-2" style="border: 3px solid #37c6f5">
                <h4 style="color: white; font-family: corbel">how can we help you?</h4>
                <p class="text-light">Feel free to contact us at any time. We feel happy to serve for our customers.</p>
                <a href="" class="text-white"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0)">
                      <path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z" stroke="#F63664"></path>
                  </g>
                  <defs>
                      <clipPath id="clip0">
                          <rect width="16" height="16" fill="white"></rect>
                      </clipPath>
                  </defs>
              </svg> Contact Us</a>

              </div>

            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          <p>2020 &copy; All Rights Reserved by <a href="/" class="fs-14">PRUDENT CREDIT SOLUTION</a></p>
        </div>

      </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-arrow-up"></i></a>


<script src="{{ asset('js/app.js?v='.env('ASSET_VERSION') ) }}"></script>

</body>

</html>
