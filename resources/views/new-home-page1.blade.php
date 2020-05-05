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
                            <h3><a href="#bankruptcies" data-toggle="modal">Bankruptcies</a></h3>
{{--                            <li><a href="#{{$content->url}}-1" data-toggle="modal">{{$content->title}}</a></li>--}}
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
                            <h3><a  href="#mortgage" data-toggle="modal">Mortgage Negatives</a></h3>
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
                            <h3><a href="#collections" data-toggle="modal">Collections</a></h3>
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
                            <h3><a href="#late" data-toggle="modal">Late Remarks</a></h3>
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
                            <h3><a href="#inquiries" data-toggle="modal">Inquiries</a></h3>
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
                            <h3><a href="#student" data-toggle="modal">Student Loans</a></h3>
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
                            <h3><a href="#judgments" data-toggle="modal">Judgments</a></h3>
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
                            <h3><a href="#fraud" data-toggle="modal">Fraud Accounts</a></h3>
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
                            <h3><a href="#charge" data-toggle="modal">Charge Offs</a></h3>
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
                            <h3><a href="#repossessions" data-toggle="modal">Repossessions</a></h3>
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
                            <h3><a href="#mixed" data-toggle="modal">Mixed Files</a></h3>
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
                            <h3><a href="#general" data-toggle="modal">General Delinquencies</a></h3>
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

    <div class="modal fade" id="bankruptcies" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Bankruptcy</h3>
                    <p style="text-align: justify">
                        Bankruptcy is a court proceeding in which a judge and court trustee examine the assets and
                        liabilities of individuals and businesses who can’t pay their bills and decide whether to
                        discharge those debts so they are no longer legally required to pay them. Bankruptcy will have
                        a devastating impact on your credit health. The exact effects will vary. But according to the
                        top-scoring model FICO, filing for bankruptcy can send a good credit score of 700 or above
                        plummeting by at least 200 points. If your score is a bit lower—around 680—you can lose between
                        130 and 150 points.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mixed" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Mixed Files</h3>
                    <p style="text-align: justify">
                        A mixed credit file occurs whenever a CRA inadvertently commingles the credit
                        histories of two different individuals into a single report. The result is a credit report
                        that contains information belonging to two different consumers, bundled together as if those
                        two people were the same person.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inquiries" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Inquiries</h3>
                    <p style="text-align: justify">
                        An inquiry refers to a request to look at your credit file and falls into one of two
                        camps: hard or soft. A credit inquiry occurs when you apply for a credit card or loan and permit
                        the issuer or lender to check your credit. Some inquiries, such as soft inquiries, do not affect
                        your credit score, but others, such as hard inquiries can lower your credit score. In general,
                        hard credit inquiries have a small impact on your FICO Scores. For most people, one additional
                        hard credit inquiry will take less than five points off their FICO Scores. For perspective, the
                        full range for FICO Scores is 300-850. Hard Inquiries can have a greater impact if you have few
                        accounts or short credit history.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="charge" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Charge Offs</h3>
                    <p style="text-align: justify">
                        A charge-off is a declaration by a creditor (usually a credit card account) that an
                        amount of debt is unlikely to be collected. This occurs when a consumer becomes severely
                        delinquent on a debt. Traditionally, creditors make this declaration at the point of six months
                        without payment. If you have a loan marked as charged off, it will hurt your credit score
                        drastically. A charge-off will remain on your credit report for seven years. Even if an account
                        is charged off, you still owe the money. And, as it turns out, it may even make it more
                        challenging to repay the debt afterward.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mortgage" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Mortgage Negatives</h3>
                    <p style="text-align: justify">
                        A delinquent mortgage is a home loan for which the borrower has failed to
                        make payments as required in the loan documents. A mortgage will be considered delinquent or
                        late when a scheduled payment is not made on or before the due date. If the borrower can't bring
                        the payments on a delinquent mortgage current within a certain time period, the lender may begin
                        foreclosure proceedings. A lender may also offer a borrower a number of options to help prevent
                        foreclosure when a mortgage becomes delinquent.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="student" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Student Loans</h3>
                    <p style="text-align: justify">
                        Some borrowers may not realize it, but student loan debt is a personal financial
                        liability that needs to be viewed like any other financial obligation – and with the same sense
                        of urgency as other payments. The reality is that missing student loan payments can hold you
                        back financially, just like missing credit card or car payments will. A student loan is
                        considered delinquent the first day after you miss a payment; if the delinquency lasts more
                        than 90 days, your loan servicer, which handles the billing and other services for your loan,
                        will report it to the three major national credit bureaus, which will lower your credit score.

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="repossessions" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Repossessions</h3>
                    <p style="text-align: justify">
                         The simple definition of repossession is reclaiming ownership of something that
                        has not been paid off but still has value. In most cases, cars are the primary asset involved in
                        repossession, but it could be real estate, jewelry, artwork, or any tangible asset that can be
                        sold to recoup money for the unpaid loan balance. In all, a repo could cause a 100-point drop
                        in your credit score, Sanford says. And late payments, collections, and public records generally
                        all stay on your credit for about seven years, according to
                        <a href="myFICO.com" target="_blank">myFICO.com.</a> You can stop a repo. The
                        key is to communicate with the lender.

                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="collections" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Collections</h3>
                    <p style="text-align: justify">
                         Once an account is sold to a collection agency, the collection account can then be
                        reported as a separate account on your credit report. Collection accounts have a significant
                        negative impact on your credit scores. Collections can appear from unsecured accounts, such as
                        credit cards and personal loans. Collections have a negative effect on your credit score. The
                        older a collection is, the less it hurts you. Collections remain on your credit report for seven
                        years past the date of delinquency. In the newest versions of FICO® and VantageScore®, paid
                        collections don't hurt your score but unpaid collections do.

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="judgments" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Judgments</h3>
                    <p style="text-align: justify">
                         A judgment is a court order that is the decision in a lawsuit. If a judgment is
                        entered against you, a debt collector will have stronger tools, like garnishment, to collect
                        the debt. Judgments are no longer factored into credit scores, though they are still public r
                        ecords and can still impact your ability to qualify for credit or loans. Lenders may still check
                        to see whether any outstanding judgments against a potential borrower exist.

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="late" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Late Payment Remarks</h3>
                    <p style="text-align: justify">
                         If you're late paying a bill, your creditor might report it to the consumer
                        credit bureaus — and that could hurt your credit. But you might be able to get the late payment
                        removed if you paid on time or other factors are present, or if it's more than seven years old.
                        On-time payments are the biggest factor affecting your credit score, so missing a payment can
                        sting. If you have otherwise spotless credit, a payment that's more than 30 days past due can
                        knock as many as 100 points off your credit score. If your score is already low, it won't hurt
                        it as much but will still do damage.

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="fraud" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Fraud Accounts</h3>
                    <p style="text-align: justify">
                         Fraudulent accounts can damage your credit scores, mainly because the identity
                        thief is highly unlikely to make any payments on the account. So, in addition to reporting the
                        fraud to the credit card issuer and the police, dispute the unauthorized account with the credit
                        bureaus. While having your credit card or debit card account information stolen can undeniably
                        be quite frustrating, the good news is that fraudulent charges generally will not impact your
                        credit reports and scores at all.

                    </p>
                </div>
            </div>
        </div>
    </div>


{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("a").on('click', function(event) {--}}
{{--                if (this.hash !== "") {--}}
{{--                    event.preventDefault();--}}

{{--                    var hash = this.hash;--}}

{{--                    $('html, body').animate({--}}
{{--                        scrollTop: $(hash).offset().top--}}
{{--                    }, 500, function(){--}}
{{--                        console.log(window.location.hash)--}}
{{--                        window.location.hash = hash;--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}



@endsection
