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
		<style media="screen">
		  .ls-hidden {
		    display: none;
		  }
		  .mb-hidden {
		    display: block !important;
		  }
		  @media (max-width: 576px) {
		    .ls-hidden {
		      display: block !important;
		    }
		    .mb-hidden {
		      display: none !important;
		    }
		    .msw-100 {
		      width: 100% !important;
		    }
		    .navbar-mobile {
		      background-color: #ffffff !important;
		      height: 1000px;
		    }
		  }
		</style>
	</head>
	<body>
		<section>
			<header class="theme-background py-2 fixed-top">
				<div class="container">
					<div class="phone-block contact-info">
						<div class="col-md-12 col-lg-12 col-sm-12 col-12">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12 col-12">
									<a href="tel:1-844-337-8336" class="text-white">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0)">
												<path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z" stroke="#F63664" />
											</g>
											<defs>
												<clipPath id="clip0">
													<rect width="16" height="16" fill="white" />
												</clipPath>
											</defs>
										</svg>
										<span class="fs-12">{{ zactra::translate_lang('1-844-337-8336') }}</span>
									</a>
									<a href="mailto:info@prudentscores.com" class="ml-4 text-white">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M13.9779 2.13989H2.02209C0.90713 2.13989 0 3.04702 0 4.16198V11.8377C0 12.9527 0.90713 13.8598 2.02209 13.8598H13.9779C15.0929 13.8598 16 12.9527 16 11.8377V4.16198C16 3.04702 15.0929 2.13989 13.9779 2.13989ZM13.662 3.44424L8 7.81807L2.338 3.44424H13.662ZM13.9779 12.5555H2.02209C1.62635 12.5555 1.30435 12.2335 1.30435 11.8378V4.29398L7.6013 9.15833C7.7187 9.24902 7.85939 9.29433 8 9.29433C8.14061 9.29433 8.2813 9.24902 8.3987 9.15833L14.6957 4.29398V11.8377C14.6957 12.2335 14.3737 12.5555 13.9779 12.5555Z" fill="#F63664" />
										</svg>
										<span class="fs-12">{{ zactra::translate_lang('info@prudentscores.com') }}</span>
									</a>
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12 col-12 text-right sm-hidden">
									@if (Auth::check())
									<a href="{{ route('logout') }}" class="ml-4 text-white">
										<span class="fs-12">{{ zactra::translate_lang('Logout') }}</span>
									</a>
									@else
									<a href="{{ route('login') }}" class="ml-4 text-white">
										<span class="fs-12">{{ zactra::translate_lang('Login') }}</span>
									</a>
									<a href="{{ route('register') }}" class="text-white">
										<span class="fs-12">{{ zactra::translate_lang(' / Sign up') }}</span>
									</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</section>
		<!-- ======= Header ======= -->
		<header id="header" class="fixed-top pt-5">
			<div class="container align-items-center justify-content-between pt-2">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="row" style="display:block !important;">
							<h1 class="logo"><a href="#"> <img src="https://prudentscores.com/images/new/logo.png" width="200px" alt="logo"> </a></h1>
							<i class="fa fa-bars mobile-nav-toggle ls-hidden text-right pr-3" style="color:black;"></i>
						</div>
					</div>
					<!-- Uncomment below if you prefer to use an image logo -->
					<!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
					<div class="col-md-8 col-sm-12 col-12">
						<nav id="navbar" class="navbar">
							<ul class="msw-100">
								@if(Auth::user())
  								@if(Auth::user()->role == 'client')
  				          @include('helpers.urls.nav_bar_client')
  								@elseif(Auth::user()->role == 'affiliate')
  				          @include('helpers.urls.nav_bar_affiliate')
  								@elseif(Auth::user()->role == 'super admin')
  				          @include('helpers.urls.nav_bar_owner')
  								@elseif(Auth::user()->role == 'admin')
  				          @include('helpers.urls.nav_bar_admin')
  								@elseif(Auth::user()->role == 'receptionist')
  				          @include('helpers.urls.nav_bar_receptionist')
  								@elseif(Auth::user()->role == 'seo')
  				          @include('helpers.urls.nav_bar_seo')
  								@endif
								@else
				          @include('helpers.urls.nav_bar_guest')
								@endif
								{{-- <i class="fa fa-bars mobile-nav-toggle ls-hidden text-right" style="color:black;"></i> --}}
							</ul>
						</nav>
						<!-- .navbar -->
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->
		<!-- ======= Hero Section ======= -->
		<section id="hero">
			<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
				<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
				<div class="carousel-inner" role="listbox">
					<!-- Slide 1 -->
					<div class="carousel-item active" style="background-image: url({{ asset('/images/slide-1.jpg') }})">
						<div class="carousel-container mb-10px">
							<div class="container">
								@php
									$first_slider_title = zactra::site('first_slider_title');
									$first_slider_text = zactra::site('first_slider_text');
									$first_slider_button_text = zactra::site('first_slider_button_text');
								@endphp
								<h3 class="animate__animated animate__fadeInDown text-white" style="color:white"> {{ zactra::translate_lang($first_slider_title) }} </h3>
								<p class="animate__animated animate__fadeInUp"> {{ zactra::translate_lang($first_slider_text) }} </p>
								<a href="{{ zactra::site('first_slider_button_link') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ zactra::translate_lang($first_slider_button_text) }}</a>
							</div>
						</div>
					</div>
					<!-- Slide 2 -->
					<div class="carousel-item" style="background-image: url({{ asset('/images/slide-2.jpg') }})">
						<div class="carousel-container">
							<div class="container">
								@php
									$second_slider_title = zactra::site('second_slider_title');
									$second_slider_text = zactra::site('second_slider_text');
									$second_slider_button_text = zactra::site('second_slider_button_text');
								@endphp
								<h3 class="animate__animated animate__fadeInDown text-white">{{ zactra::translate_lang($second_slider_title) }}</h3>
								<p class="animate__animated animate__fadeInUp">{{ zactra::translate_lang($second_slider_text) }}</p>
								<a href="{{ zactra::site('second_slider_button_link') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ zactra::translate_lang($second_slider_button_text) }}</a>
							</div>
						</div>
					</div>
					<!-- Slide 3 -->
					<div class="carousel-item" style="background-image: url({{ asset('/images/slide-3.jpg') }})">
						<div class="carousel-container">
							<div class="container">
								@php
									$third_slider_title = zactra::site('third_slider_title');
									$third_slider_text = zactra::site('third_slider_text');
									$third_slider_button_text = zactra::site('third_slider_button_text');
								@endphp
								<h3 class="animate__animated animate__fadeInDown text-white">{{ zactra::translate_lang($third_slider_title) }}</h3>
								<p class="animate__animated animate__fadeInUp">{{ zactra::translate_lang($third_slider_text) }}</p>
								<a href="{{ zactra::site('third_slider_button_link') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ zactra::translate_lang($third_slider_button_text) }}</a>
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
						<h2>{{ zactra::translate_lang('About') }}</h2>
						<p>{{ zactra::translate_lang('About Us') }}</p>
					</div>
					<div class="row content">
						<div class="col-lg-6">
							<p class="text-align">
								{{ zactra::translate_lang('At Prudent Credit Solutions, we have over eighteen years of experience in the credit repair industry. As a superior credit restoration firm, we set the industry standards. Prudent Credit Solutions employs experts who work diligently on acquiring new and superb knowledge concerning the credit restoration industry and use that knowledge to help you strategically dispute and correct inaccuracies on your credit reports, build better credit, and enhance borrowing power for your personal or professional needs.') }}
							</p>
						</div>
						<div class="col-lg-6 pt-4 pt-lg-0">
							<p class="text-align">
								{{ zactra::translate_lang('We know the stress that bankruptcies, foreclosures, and other financial hardship can create – and we are proud to help our clients escape those stressful situations. We combine timing, technique, services, and practical solutions in helping our clients to improve their credit history and achieve all their reasonable credit-fitness goals and enhance their borrowing power.') }}
							</p>
							<a href="{{ route('whoWeAre') }}" class="btn-learn-more">{{ zactra::translate_lang('Learn More') }}</a>
						</div>
					</div>
				</div>
			</section><!-- End About Section -->

			<!-- ======= Counts Section ======= -->
			<section id="counts" class="counts py-5">
				<div class="container" data-aos="fade-up">
					<div class="row">
						<div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
							<div class="count-box text-center">
								<i class="fa fa-emoji-smile"></i>
								<span data-purecounter-start="0" data-purecounter-end="2763" data-purecounter-duration="1" class="purecounter"></span>
								<p>{{ zactra::translate_lang('The number of') }} <strong>{{ zactra::translate_lang('satisfied clients') }}</strong>{{ zactra::translate_lang('served as of today.') }} </p>
								{{-- <a href="#">Find out more &raquo;</a> --}}
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
							<div class="count-box text-center">
								<i class="fa fa-journal-richtext"></i>
								<span data-purecounter-start="0" data-purecounter-end="34608" data-purecounter-duration="1" class="purecounter"></span>
								<p>{{ zactra::translate_lang('The number of') }} <strong>{{ zactra::translate_lang('inaccuracies') }}</strong>{{ zactra::translate_lang('removed or corrected as of today.') }} </p>
								{{-- <a href="#">Find out more &raquo;</a> --}}
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
							<div class="count-box text-center">
								<i class="fa fa-people"></i>
								<span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1" class="purecounter"></span>
								<p>{{ zactra::translate_lang('The number of') }} <strong>{{ zactra::translate_lang('Credit Experts') }}</strong>{{ zactra::translate_lang('to Serve you.') }} </p>
								{{-- <a href="#">Find out more &raquo;</a> --}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Counts Section -->
			<!-- ======= Why Us Section ======= -->
			<section id="why-us" class="why-us section-bg">
				<div class="container-fluid" data-aos="fade-up">
					<div class="row">
						<div class="col-lg-5 align-items-stretch" style="background-image: url({{ asset('/images/video-img2.png') }});background-repeat: no-repeat;background-size: auto;" data-aos="zoom-in" data-aos-delay="100" data-toggle="modal" data-target="#exampleModalCenter">
							{{-- <a href="https://prudentscores.com/images/howItWorks.mp4" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> --}}
							<span class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></span>
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content" style="background:transparent;">
										<div class="modal-body px-0 py-0 mx-0 my-0">
											<video id="home_video" style=" width:600px;" src="https://prudentscores.com/images/howItWorks.mp4" controls=""></video>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
							<div class="content">
								<h3>{{ zactra::translate_lang('Prudent Scores - Improving credit ratings and score, fast credit repair') }}</h3>
								<p class="fs-15">{{ zactra::translate_lang('In the 1800s, most credit transactions were conducted by businesses, not by consumers. As business transactions increased, commercial lenders needed to create a way to standardize credit evaluation. In 1841, the Mercantile Agency solicited information from correspondents throughout the United States to systemize a borrowers "character and assets." However, this data considered too subjective by many as the opinions noted racial, class, and gender biases. Subscribers to the Mercantile Agency (renamed R.G.') }}</p>
								<p class="fs-15">{{ zactra::translate_lang('We know the stress that bankruptcies, foreclosures, and other financial hardship can create – and we are proud to help our clients escape those stressful situations. We combine timing, technique, services, and practical solutions in helping our clients to improve their credit history and achieve all their reasonable credit-fitness goals and enhance their borrowing power.') }}</p>
								<p class="fs-15">{{ zactra::translate_lang('Most of the other credit repair firms are in letter writing business. Writing dispute letters is a “lazy man’s” approach to credit repair – one with minimal results and the constant danger of removed items being re-inserted into credit reports. Those firms usually charge consumers a monthly fee for their services, making any dishonest firm drag dispute process longer because the longer they keep you as a client, the more money they will “earn.”In comparison, we do not charge monthly fees and always strive to complete the process in the shortest time possible. We will bill you only when we correct or remove an incomplete, unverifiable, misleading, frivolous, erroneous, obsolete, inaccurate, unauthorized, or fraudulent credit item from your credit reports.') }}</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Why Us Section -->
			<!-- ======= Reviews Section ======= -->
			<section id="services" class="services">
				<div class="container" data-aos="fade-up">
					<div class="section-title mt-5 pb-3">
						<h2>{{ zactra::translate_lang('Reviews') }} ({{ isset($totalreviews) ? count($totalreviews) : '0' }}) <span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></h2>
						<p>{{ zactra::translate_lang('Trusted for over 15 years') }}</p>
					</div>
					<div class="row mb-5 pr-3">
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
														<span class="pt-2" style="color:yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
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
													" {{ zactra::limit_words($value->review,200)}} "
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
						<div class="col-md-12 mt-4">
							<div class="row pull-right">
								<a href="{{ route('review.list') }}"><button type="button" class="revirewmorebtn" name="button">{{ zactra::translate_lang('More Reviews') }}</button></a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ======= Services Section ======= -->
			<section id="services" class="services">
				<div class="container" data-aos="fade-up">
					<div class="section-title mt-5">
						<h2>{{ zactra::translate_lang('Services') }}</h2>
						<p>{{ zactra::translate_lang('Check our Services') }}</p>
					</div>
					<div class="row  mb-5">
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch p-2" data-aos="zoom-in" data-aos-delay="100">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-university"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Bankruptcies') }}</a></h4>
								<p>{{ zactra::translate_lang('Bankruptcy is a court proceeding in which a judge and court trustee examine the assets and liabilities of individuals and businesses who can’t pay their bills and decide whether to discharge those debts so they are no longer legally required to pay them. Bankruptcy will have a devastating impact on your credit health. The exact effects will vary. But according to the top-scoring model FICO, filing for bankruptcy can send a good credit score of 700 or above plummeting by at least 200 points. If your score is a bit lower—around 680—you can lose between 130 and 150 points.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-minus-square"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Mortgage Negative') }}</a></h4>
								<p>{{ zactra::translate_lang('A delinquent mortgage is a home loan for which the borrower has failed to make payments as required in the loan documents. A mortgage will be considered delinquent or late when a scheduled payment is not made on or before the due date. If the borrower cannot bring the payments on a delinquent mortgage current within a certain time period, the lender may begin foreclosure proceedings. A lender may also offer a borrower a number of options to help prevent foreclosure when a mortgage becomes delinquent.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-tachometer"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Late Remarks') }}</a></h4>
								<p>{{ zactra::translate_lang('If you are late paying a bill, your creditor might report it to the consumer credit bureaus — and that could hurt your credit. But you might be able to get the late payment removed if you paid on time or other factors are present, or if it is more than seven years old. On-time payments are the biggest factor affecting your credit score, so missing a payment can sting. If you have otherwise spotless credit, a payment that is more than 30 days past due can knock as many as 100 points off your credit score. If your score is already low, it will not hurt it as much but will still do damage.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-plus-square"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Collections') }}</a></h4>
								<p>{{ zactra::translate_lang('Once an account is sold to a collection agency, the collection account can then be reported as a separate account on your credit report. Collection accounts have a significant negative impact on your credit scores. Collections can appear from unsecured accounts, such as credit cards and personal loans. Collections have a negative effect on your credit score. The older a collection is, the less it hurts you. Collections remain on your credit report for seven years past the date of delinquency. In the newest versions of FICO® and VantageScore®, paid collections do not hurt your score but unpaid collections do.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-balance-scale"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Judgments') }}</a></h4>
								<p>{{ zactra::translate_lang('A judgment is a court order that is the decision in a lawsuit. If a judgment is entered against you, a debt collector will have stronger tools, like garnishment, to collect the debt. Judgments are no longer factored into credit scores, though they are still public records and can still impact your ability to qualify for credit or loans. Lenders may still check to see whether any outstanding judgments against a potential borrower exist.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-list-alt"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Inquiries') }}</a></h4>
								<p>{{ zactra::translate_lang('An inquiry refers to a request to look at your credit file and falls into one of two camps: hard or soft. A credit inquiry occurs when you apply for a credit card or loan and permit the issuer or lender to check your credit. Some inquiries, such as soft inquiries, do not affect your credit score, but others, such as hard inquiries can lower your credit score. In general, hard credit inquiries have a small impact on your FICO Scores. For most people, one additional hard credit inquiry will take less than five points off their FICO Scores. For perspective, the full range for FICO Scores is 300-850. Hard Inquiries can have a greater impact if you have few accounts or short credit history.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-paper-plane"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Repossessions') }}</a></h4>
								<p>{{ zactra::translate_lang('The simple definition of repossession is reclaiming ownership of something that has not been paid off but still has value. In most cases, cars are the primary asset involved in repossession, but it could be real estate, jewelry, artwork, or any tangible asset that can be sold to recoup money for the unpaid loan balance. In all, a repo could cause a 100-point drop in your credit score, Sanford says. And late payments, collections, and public records generally all stay on your credit for about seven years, according to myFICO.com. You can stop a repo. The key is to communicate with the lender.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-graduation-cap"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Student Loans') }}</a></h4>
								<p>{{ zactra::translate_lang('Some borrowers may not realize it, but student loan debt is a personal financial liability that needs to be viewed like any other financial obligation – and with the same sense of urgency as other payments. The reality is that missing student loan payments can hold you back financially, just like missing credit card or car payments will. A student loan is considered delinquent the first day after you miss a payment; if the delinquency lasts more than 90 days, your loan servicer, which handles the billing and other services for your loan, will report it to the three major national credit bureaus, which will lower your credit score.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-file"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Mixed Files') }}</a></h4>
								<p>{{ zactra::translate_lang('A mixed credit file occurs whenever a CRA inadvertently commingles the credit histories of two different individuals into a single report. The result is a credit report that contains information belonging to two different consumers, bundled together as if those two people were the same person.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-credit-card"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Charge Offs') }}</a></h4>
								<p>{{ zactra::translate_lang('A charge-off is a declaration by a creditor (usually a credit card account) that an amount of debt is unlikely to be collected. This occurs when a consumer becomes severely delinquent on a debt. Traditionally, creditors make this declaration at the point of six months without payment. If you have a loan marked as charged off, it will hurt your credit score drastically. A charge-off will remain on your credit report for seven years. Even if an account is charged off, you still owe the money. And, as it turns out, it may even make it more challenging to repay the debt afterward.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-address-card"></i></div>
								<h4><a href="">{{ zactra::translate_lang('Fraud Accounts') }}</a></h4>
								<p>{{ zactra::translate_lang('Fraudulent accounts can damage your credit scores, mainly because the identity thief is highly unlikely to make any payments on the account. So, in addition to reporting the fraud to the credit card issuer and the police, dispute the unauthorized account with the credit bureaus. While having your credit card or debit card account information stolen can undeniably be quite frustrating, the good news is that fraudulent charges generally will not impact your credit reports and scores at all.') }}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
							<div class="icon-box">
								<div class="icon"><i class="fa fa-building"></i></div>
								<h4><a href="">{{ zactra::translate_lang('ChexSystems') }}</a></h4>
								<p>{{ zactra::translate_lang('ChexSystems reports are a record of your bank account history. Depending on the type of account activity or public record that has been reported, a negative mark could remain on your ChexSystems report for up to 10 years.') }}</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Services Section -->
		</main>
		<!-- End #main -->
		@include('helpers.chat')
		<!-- ======= Footer ======= -->
		@include('includes.footer')
		<div id="preloader"></div>
		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-arrow-up"></i></a>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{ asset('js/app.js?v='.env('ASSET_VERSION') ) }}"></script>
</html>
