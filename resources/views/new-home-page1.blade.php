@extends('layouts.layout')

@section('content')

    <section class="slider-section">
        <h2 class="hidden">title</h2>

        <div class="rev_slider_wrapper">
            <div id="rev_slider_4" class="rev_slider" style="display:none">
                <ul>
                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="{{asset('images/slider-1.jpg')}}">
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{asset('images/slider-1.jpg')}}" alt="Sky" class="rev-slidebg">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="center" data-hoffset="0"
                             data-y="top" data-voffset="300"
                             data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[100%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            {{$slogans['0']->author}}
                        </div>


                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="center" data-hoffset="0"
                             data-y="top" data-voffset="360"
                             data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            {{$slogans['0']->slogan}}
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption sfr tp-resizeme letter-space-4"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="180"
                             data-frames='[{"delay":2200,"speed":2000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'><a href="{{route('whoWeAre')}}" class="el-btn-regular slider-btn-left btn btn-primary">About Us</a>
                        </div>
                    </li>

                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="assets/images/slider-2.jpg">
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{asset('images/slider-2.jpg')}}" alt="Sky" class="rev-slidebg">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="300"
                             data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['1']->author}}
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="360"
                             data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            {{$slogans['1']->slogan}}
                        </div>
                    </li>

                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="{{asset('images/slider-1.jpg')}}">
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{asset('images/slider-3.jpg')}}" alt="Sky" class="rev-slidebg">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="300"
                             data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['2']->slogan}}
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="360"
                             data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['2']->author}}
                        </div>
                    </li>

                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="{{asset('images/slider-4.png')}}">
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{asset('images/slider-4.png')}}" alt="Sky" class="rev-slidebg">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4  wrapper-contant"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="300"
                             data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['3']->author}}
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="360"
                             data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['3']->slogan}}
                        </div>
                    </li>

                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="{{asset('images/slider-5.png')}}">
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{asset('images/slider-5.png')}}" alt="Sky" class="rev-slidebg">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="300"
                             data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['4']->slogan}}
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                             data-x="left" data-hoffset="0"
                             data-y="top" data-voffset="360"
                             data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogans['4']->author}}
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>

    <section class="startup-section section-padding">
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>We work with all three major <br> credit reporting agencies</h3>
                    </div>

                    <div class="col-sm-6">
                        <p>We work with credit bureaus and your creditors to challenge the inaccurate credit reporting that affects your credit score and financial fitness. We'll ensure your credit history reflects accurate information.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="multi-section">
            <div class="container text-center">
                <div class="client-section">
                    <ul class="logo client-carousel owl-carousel owl-theme">
                        <li class="wow fadeIn item"><img src="{{asset('images/p-2.png')}}" alt=""></li>

                        <li class="wow fadeIn item" data-wow-delay="0.2s"><img src="{{asset('images/p-3.png')}}" alt=""></li>

                        <li class="wow fadeIn item" data-wow-delay="0.3s"><img src="{{asset('images/p-4.png')}}" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="service-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>We Can Help you Resolve Inaccuracies with</h2>
                <div class="border-2"></div>
            </div> <!-- section-title -->

            <div class="row first-row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Bankruptcies</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Mortgage Negatives</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Collections</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 ">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Late Remarks</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Inquiries</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Student Loans</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Judgments</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Fraud Accounts</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Charge Offs</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-wrapper">
                        <div class="wrapper-content">
                            <h3><a href="#">Repossessions</a></h3>
                        </div>

                        <div class="hover">
                            <span class="hover-one"></span>
                            <span class="hover-two"></span>
                            <span class="hover-three"></span>
                            <span class="hover-four"></span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <section class="finance-service-section section-padding">
        <div class="container text-center">
            <div class="section-title">
                <h2>CREDIT REPORT</h2>
                <div class="border-2"></div>
            </div> <!-- section-title -->

            <div class="finance-carousel owl-carousel owl-theme">
                <div class="finance-wrapper item">
                    <div class="icon"><img src="{{asset('images/service/1.png')}}" alt=""></div>

                    <div class="wrapper-content">
                        <h4><a href="#">Analyze your finances and credit score to identify areas for improvement</a></h4>
                    </div>

                    <div class="border">
                        <span class="border-one"></span>
                        <span class="border-two"></span>
                        <span class="border-three"></span>
                        <span class="border-four"></span>
                    </div>
                </div>
                <div class="finance-wrapper item">
                    <div class="icon"><img src="{{asset('images/service/2.png')}}" alt=""></div>

                    <div class="wrapper-content">
                        <h4><a href="#">Highlight errors on your credit report and make a plan to dispute them</a></h4>
                    </div>

                    <div class="border">
                        <span class="border-one"></span>
                        <span class="border-two"></span>
                        <span class="border-three"></span>
                        <span class="border-four"></span>
                    </div>
                </div>

                <div class="finance-wrapper item">
                    <div class="icon"><img src="{{asset('images/service/3.png')}}" alt=""></div>

                    <div class="wrapper-content">
                        <h4><a href="#">Identify bad debts that have opportunities to negotiate for lower payments</a></h4>
                    </div>

                    <div class="border">
                        <span class="border-one"></span>
                        <span class="border-two"></span>
                        <span class="border-three"></span>
                        <span class="border-four"></span>
                    </div>
                </div>

                <div class="finance-wrapper item">
                    <div class="icon"><img src="{{asset('images/service/4.png')}}" alt=""></div>

                    <div class="wrapper-content">
                        <h4><a href="#">Help you build good habits to keep your credit score in tip top shape</a></h4>
                    </div>

                    <div class="border">
                        <span class="border-one"></span>
                        <span class="border-two"></span>
                        <span class="border-three"></span>
                        <span class="border-four"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="working-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>About Company</h2>
                <div class="border-2"></div>
            </div> <!-- section-title -->

            <div class="section-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="wrapper-content">
                            <h4> We have over 18 years of experience in the credit repair industry</h4>
                            <p> As a superior credit restoration firm, Prudent Credit Solutions sets the industry standards. Prudent Credit Solutions employs experts who work diligently on acquiring new and superb knowledge concerning the credit restoration industry and use that knowledge to help you strategically dispute and correct inaccuracies on your credit reports, build better credit, and enhance borrowing power for your personal or professional needs. </p>

                            <a href="{{route('whoWeAre')}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="video-wrapper">
                            <video controls="">
                                <source src="{{asset('images/howItWorks.mp4')}}" type="video/mp4">
                            </video>
                        </div> <!-- video-wrapper -->
                    </div>
                </div>
            </div> <!-- section-wrapper -->
        </div>
    </section>


    <section class="research-section section-padding">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Testimonials</h2>
                        <div class="border-2"></div>
                    </div> <!-- section-title -->

                    <div id="research-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item">
                                <div class="carousel-wrapper">
                                    <img src="{{asset('images/t2.jpg')}}" alt="image">

                                    <div class="content">
                                        <h3>Larry Barry</h3>
                                        <span class="position">CEO, Finance World</span>
                                        <p>Knowledge is spread out across the organization. It can take too long to find the asset with the information needed. Great people, great clients, and you get to be a part of an organization.</p>

                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="item active">
                                <div class="carousel-wrapper">
                                    <img src="{{asset('images/t2.jpg')}}" alt="image">

                                    <div class="content">
                                        <h3>Larry Barry123</h3>
                                        <span class="position">CEO, Finance World</span>
                                        <p>Knowledge is spread out across the organization. It can take too long to find the asset with the information needed. Great people, great clients, and you get to be a part of an organization.</p>

                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="carousel-wrapper">
                                    <img src="{{asset('images/t2.jpg')}}" alt="image">

                                    <div class="content">
                                        <h3>Larry Barry</h3>
                                        <span class="position">CEO, Finance World</span>
                                        <p>Knowledge is spread out across the organization. It can take too long to find the asset with the information needed. Great people, great clients, and you get to be a part of an organization.</p>

                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="left carousel-control" href="#research-carousel" role="button" data-slide="prev"><img src="{{asset('images/left-angel.png')}}" alt=""></a>

                        <a class="right carousel-control" href="#research-carousel" role="button" data-slide="next"><img src="{{asset('images/right-angel.png')}}" alt=""></a>

                        <div class="link text-center">
                            <a href="#" class="btn btn-primary"><i class="fa fa-th" aria-hidden="true"></i> View All</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section class="secure-section">
        <div class="container">
            <h2>We plan to make your business secure & reliable</h2>
            <a href="#" class="btn btn-primary pull-right">Know More</a>
        </div>
    </section> <!-- secure-section -->



@endsection
