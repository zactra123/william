@extends('layouts.layout')

{{--@section('meta')--}}
{{--    <title>Superior credit restoration firm - Prudent Credit Solutions </title>--}}
{{--    <meta name="description" content="We resolve inaccuracies with - Bankruptcy, Mortgage Negatives, Late Payment--}}
{{--        Remarks, Student Loans, Fraud Accounts, Charge Offs, Mixed Files, ChexSystems.">--}}
{{--@endsection--}}

@section('content')

    <section class="slider-section">
        <h2 class="hidden">title</h2>

        <div class="rev_slider_wrapper">
            <div id="rev_slider_4" class="rev_slider" style="display:none">
                <ul>
                    <?php $k = 1;?>
                    @foreach($slogans as $key=> $value)
                        <li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="{{asset('images/slider-1.jpg')}}">
                            <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                            <img src="{{asset("images/slider-{$k}.jpg")}}" alt="Sky" class="rev-slidebg">
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                                 data-x="center" data-hoffset="0"
                                 data-y="top" data-voffset="300"
                                 data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[100%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                                {{$value['author']}}
                            </div>


                            <!-- LAYER NR. 2 -->
                            @foreach( $value['slogan'] as $key=> $slogan)
                            <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4"
                                 data-x="center" data-hoffset="0"
                                 data-y="top" data-voffset="{{340 + $key*40 }}"
                                 data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogan}}

                            </div>
                            @endforeach

                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption sfr tp-resizeme letter-space-4"
                                 data-x="center" data-hoffset="0"
                                 data-y="center" data-voffset="180"
                                 data-frames='[{"delay":2200,"speed":2000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'><a href="{{route('whoWeAre')}}" class="el-btn-regular slider-btn-left btn btn-primary">About Us</a>
                            </div>
                        </li>
                        <?php $k = $k ==5 ? 1: $k+1;?>
                    @endforeach

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
                            <h3><a href="#chexsystems" data-toggle="modal">ChexSystems</a></h3>
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


{{--    <section class="research-section section-padding">--}}
{{--        <div class="container">--}}
{{--            <div class="row mx-auto">--}}
{{--                <div class="col-md-8 col-md-offset-2">--}}
{{--                    <div class="section-title">--}}
{{--                        <h2>Testimonials</h2>--}}
{{--                        <div class="border-2"></div>--}}
{{--                    </div> <!-- section-title -->--}}

{{--                    <div id="research-carousel" class="carousel slide" data-ride="carousel">--}}
{{--                        <div class="carousel-inner" role="listbox">--}}
{{--                            <div class="item">--}}
{{--                                <div class="carousel-wrapper">--}}
{{--                                    <img src="{{asset('images/t2.jpg')}}" alt="image">--}}

{{--                                    <div class="content">--}}
{{--                                        <h3>Larry Barry</h3>--}}
{{--                                        <span class="position">CEO, Finance World</span>--}}
{{--                                        <p>Knowledge is spread out across the organization. It can take too long to find the asset with the information needed. Great people, great clients, and you get to be a part of an organization.</p>--}}

{{--                                        <ul>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="item active">--}}
{{--                                <div class="carousel-wrapper">--}}
{{--                                    <img src="{{asset('images/t2.jpg')}}" alt="image">--}}

{{--                                    <div class="content">--}}
{{--                                        <h3>Larry Barry123</h3>--}}
{{--                                        <span class="position">CEO, Finance World</span>--}}
{{--                                        <p>Knowledge is spread out across the organization. It can take too long to find the asset with the information needed. Great people, great clients, and you get to be a part of an organization.</p>--}}

{{--                                        <ul>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="item">--}}
{{--                                <div class="carousel-wrapper">--}}
{{--                                    <img src="{{asset('images/t2.jpg')}}" alt="image">--}}

{{--                                    <div class="content">--}}
{{--                                        <h3>Larry Barry</h3>--}}
{{--                                        <span class="position">CEO, Finance World</span>--}}
{{--                                        <p>Knowledge is spread out across the organization. It can take too long to find the asset with the information needed. Great people, great clients, and you get to be a part of an organization.</p>--}}

{{--                                        <ul>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <a class="left carousel-control" href="#research-carousel" role="button" data-slide="prev"><img src="{{asset('images/left-angel.png')}}" alt=""></a>--}}

{{--                        <a class="right carousel-control" href="#research-carousel" role="button" data-slide="next"><img src="{{asset('images/right-angel.png')}}" alt=""></a>--}}

{{--                        <div class="link text-center">--}}
{{--                            <a href="#" class="btn btn-primary"><i class="fa fa-th" aria-hidden="true"></i> View All</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

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
    <div class="modal fade" id="chexsystems" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>ChexSystems</h3>
                    <p style="text-align: justify">
                        ChexSystems reports are a record of your bank account history.
                        Depending on the type of account activity or public record that's been reported,
                        a negative mark could remain on your ChexSystems report for up to 10 years.
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







<div align="center" class="MsoNormal" style="text-align: left; line-height: 1.5;" data-custom-class="title">
    <strong>
        <span style="line-height: 22.5px; font-size: 26px;"><bdt class="block-component"></bdt>PRIVACY POLICY<bdt class="statement-end-if-in-editor"></bdt></span>
    </strong>
</div>
<p style="font-size: 15px;">
    <span style="color: rgb(127, 127, 127);">
        <strong>
            <span data-custom-class="subtitle">Last updated <bdt class="question">January 01, 2020</bdt></span>
        </strong>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;"><br /></p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text">
            Thank you for choosing to be part of our community at <bdt class="question">PRUDENT CREDIT SOLUTIONS</bdt><bdt class="block-component"></bdt> (“<bdt class="block-component"></bdt><strong>Company</strong>
            <bdt class="statement-end-if-in-editor"></bdt>”, “<strong>we</strong>”, “<strong>us</strong>”, or “<strong>our</strong>”). We are committed to protecting your personal information and your right to privacy. If you have any
            questions or concerns about our
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
            </span>
            , or our practices with regards to your personal information, please contact us at <bdt class="question">info@prudentscores.com</bdt>.
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text">
            When you visit our <bdt class="block-component"></bdt>website <bdt class="question"><a href="http://www.prudentscores.com" target="_blank" data-custom-class="link">http://www.prudentscores.com</a></bdt>,
            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt><bdt class="forloop-component"></bdt><bdt class="block-component"></bdt> mobile application,<bdt class="statement-end-if-in-editor"></bdt>
            <bdt class="block-component"></bdt><bdt class="forloop-component"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt> <bdt class="statement-end-if-in-editor"></bdt><bdt class="forloop-component"></bdt>
            <bdt class="statement-end-if-in-editor"></bdt> and use our services, you trust us with your personal information. We take your privacy very seriously. In this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
            </span>
            , we seek to explain to you in the clearest way possible what information we collect, how we use it and what rights you have in relation to it. We hope you take some time to read through it carefully, as it is important. If
            there are any terms in this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
                &nbsp;
            </span>
            that you do not agree with, please discontinue use of our <bdt class="block-component"></bdt>Sites<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
            <bdt class="statement-end-if-in-editor"></bdt> <bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> and our services.
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text">
            This
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
                &nbsp;
            </span>
            applies to all information collected through our <bdt class="block-component"></bdt><bdt class="forloop-component"></bdt><bdt class="question">website</bdt><bdt class="forloop-component"></bdt> (such as
            <bdt class="question"><a href="http://www.prudentscores.com" target="_blank" data-custom-class="link">http://www.prudentscores.com</a></bdt>), <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>
            <bdt class="forloop-component"></bdt><bdt class="block-component"></bdt> mobile application,<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt><bdt class="forloop-component"></bdt>
            <bdt class="block-component"></bdt><bdt class="block-component"></bdt> <bdt class="statement-end-if-in-editor"></bdt> and/or any related services, sales, marketing or events (we refer to them collectively in this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
                &nbsp;
            </span>
            as the "<strong>Services</strong>").
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <span data-custom-class="body_text">
                Please read this
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text">
                        <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                    </span>
                    &nbsp;
                </span>
                carefully as it will help you make informed decisions about sharing your personal information with us.
            </span>
        </strong>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">TABLE OF CONTENTS</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <a href="#infocollect" data-custom-class="link"><span style="color: rgb(89, 89, 89);">1. WHAT INFORMATION DO WE COLLECT?</span></a> <span style="color: rgb(89, 89, 89);"><bdt class="block-component"></bdt></span>
</p>
<p style="font-size: 15px;">
    <a href="#infouse" data-custom-class="link"><span style="color: rgb(89, 89, 89);">2. HOW DO WE USE YOUR INFORMATION?</span></a>
    <span style="color: rgb(89, 89, 89);">
        <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <a href="#infoshare" data-custom-class="link">3. WILL YOUR INFORMATION BE SHARED WITH ANYONE?</a><bdt class="block-component"><span data-custom-class="body_text"></span></bdt>
    </span>
    <span style="color: rgb(89, 89, 89); font-size: 15px;"><bdt class="block-component"></bdt></span>
</p>
<p style="font-size: 15px;">
    <a href="#cookies" data-custom-class="link"><span style="color: rgb(89, 89, 89); font-size: 15px;">4. DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</span></a>
    <span style="color: rgb(89, 89, 89); font-size: 15px;"><bdt class="statement-end-if-in-editor"></bdt></span>
    <span style="color: rgb(89, 89, 89);">
        <span style="color: rgb(89, 89, 89);"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <a href="#googlemaps" data-custom-class="link"><span style="color: rgb(89, 89, 89);">5. DO WE USE GOOGLE MAPS?</span></a>
    <span style="color: rgb(89, 89, 89);">
        <span style="color: rgb(89, 89, 89);">
            <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <a href="#sociallogins" data-custom-class="link">
        <span style="color: rgb(89, 89, 89);">
            <span style="color: rgb(89, 89, 89);"><span style="color: rgb(89, 89, 89);">6. HOW DO WE HANDLE YOUR SOCIAL LOGINS?</span></span>
        </span>
    </a>
    <span style="color: rgb(89, 89, 89);">
        <span style="color: rgb(89, 89, 89);">
            <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
        </span>
        <bdt class="block-component"></bdt><bdt class="block-component"></bdt>
    </span>
</p>
<p style="font-size: 15px;">
    <a href="#3pwebsites" data-custom-class="link"><span style="color: rgb(89, 89, 89);">7. WHAT IS OUR STANCE ON THIRD-PARTY WEBSITES?</span></a><span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
</p>
<p style="font-size: 15px;">
    <a href="#inforetain" data-custom-class="link"><span style="color: rgb(89, 89, 89);">8. HOW LONG DO WE KEEP YOUR INFORMATION?</span></a>
    <span style="color: rgb(89, 89, 89);">
        <span style="color: rgb(89, 89, 89);"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <a href="#infosafe" data-custom-class="link"><span style="color: rgb(89, 89, 89);">9. HOW DO WE KEEP YOUR INFORMATION SAFE?</span></a>
    <span style="color: rgb(89, 89, 89);">
        <span style="color: rgb(89, 89, 89);">
            <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
        </span>
        <bdt class="block-component"></bdt>
    </span>
</p>
<p style="font-size: 15px;">
    <a href="#infominors" data-custom-class="link"><span style="color: rgb(89, 89, 89);">10. DO WE COLLECT INFORMATION FROM MINORS?</span></a><bdt class="statement-end-if-in-editor"></bdt>
</p>
<p style="font-size: 15px;">
    <a href="#privacyrights" data-custom-class="link">
        <span style="color: rgb(89, 89, 89);">11. WHAT ARE YOUR PRIVACY RIGHTS?<bdt class="block-component"></bdt></span>
    </a>
</p>
<p style="font-size: 15px;">
    <a href="#DNT" data-custom-class="link"><span style="color: rgb(89, 89, 89);">12. CONTROLS FOR DO-NOT-TRACK FEATURES</span></a>
</p>
<p style="font-size: 15px;">
    <a href="#caresidents" data-custom-class="link"><span style="color: rgb(89, 89, 89);">13. DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?</span></a>
</p>
<p style="font-size: 15px;">
    <a href="#policyupdates" data-custom-class="link"><span style="color: rgb(89, 89, 89);">14. DO WE MAKE UPDATES TO THIS POLICY?</span></a>
</p>
<p style="font-size: 15px;">
    <a href="#contact" data-custom-class="link"><span style="color: rgb(89, 89, 89);">15. HOW CAN YOU CONTACT US ABOUT THIS POLICY?</span></a>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="infocollect" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">1. WHAT INFORMATION DO WE COLLECT?</span></span>
        </strong>
        <span style="font-size: 19px;">
            <span data-custom-class="heading_1">
                <span style="color: rgb(89, 89, 89);"><bdt class="block-component"></bdt></span>
            </span>
        </span>
    </span>
</p>
<div style="line-height: 1.1;"><br /></div>
<div>
    <span style="color: rgb(0, 0, 0);">
        <strong><span data-custom-class="heading_2">Personal information you disclose to us</span></strong>
    </span>
</div>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em><span data-custom-class="body_text">In Short:</span></em> &nbsp;
        </strong>
        <span data-custom-class="body_text"><em>We collect personal information that you provide to us.</em></span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;" data-custom-class="body_text">
            We collect personal information that you voluntarily provide to us when <bdt class="block-component"></bdt>registering at the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt>
            <bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps,<bdt class="statement-end-if-in-editor"></bdt><bdt class="statement-end-if-in-editor"></bdt> expressing
            an interest in obtaining information about us or our products and services, when participating in activities on the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt>
            <bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or otherwise
            contacting us
        </span>
        <span data-custom-class="body_text">.</span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text">
            The personal information that we collect depends on the context of your interactions with us and the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>, the choices you make and the products and features you use. The personal information we collect
            can include the following:
        </span>
        <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong><span data-custom-class="body_text">Publicly Available Personal Information.</span></strong>
        <span data-custom-class="body_text">
            &nbsp;We collect <bdt class="forloop-component"></bdt><bdt class="question">first name, maiden name, last name, and nickname</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">ID</bdt>;
            <bdt class="forloop-component"></bdt><bdt class="question">driver's license number</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">passport number</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">current and former address</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">phone numbers</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">email addresses</bdt>;
            <bdt class="forloop-component"></bdt><bdt class="question">business email</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">business phone number</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">birth, marriage, divorce, and death records</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">real estate records including purchase and sale prices and neighbour info</bdt>;
            <bdt class="forloop-component"></bdt><bdt class="question">business entity filings, corporate affiliations, and business associates</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">court records, lien filings, foreclosures, and UCC filings (forms filed by a creditor to give notice of interest in debtor's personal property)</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">family member names and their related information</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">criminal records and mugshots</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">government licenses, professional licenses, hunting/fishing permits, and weapons permits</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">voter registration</bdt>;
            <bdt class="forloop-component"></bdt><bdt class="question">social media</bdt>; <bdt class="forloop-component"></bdt>and other similar data.
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
            </span>
            &nbsp;
        </span>
        <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong><span data-custom-class="body_text">Personal Information Provided by You.</span></strong>
        <span data-custom-class="body_text">
            &nbsp;We collect <bdt class="forloop-component"></bdt><bdt class="question">taxation, pension, and maternity leave</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">CV and other job application data such as background checks</bdt>; <bdt class="forloop-component"></bdt><bdt class="question">purchase history</bdt>; <bdt class="forloop-component"></bdt>
            <bdt class="question">financial information (credit card number, purchase history, invoices)</bdt>; <bdt class="forloop-component"></bdt>and other similar data.
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
            </span>
        </span>
    </span>
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong><span data-custom-class="body_text">Payment Data.</span></strong>
        <span data-custom-class="body_text">
            &nbsp;We collect data necessary to process your payment if you make purchases, such as your payment instrument number (such as a credit card number), and the security code associated with your payment instrument. All payment
            data is stored by
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="forloop-component"></bdt> <bdt class="question">Paycertify</bdt>
                    <span style="color: rgb(89, 89, 89);">
                        <span data-custom-class="body_text">
                            <span style="color: rgb(89, 89, 89);">
                                <span data-custom-class="body_text"><bdt class="forloop-component"></bdt></span>
                            </span>
                            . You may find their privacy policy link(s) here:
                            <span style="color: rgb(89, 89, 89);">
                                <bdt class="forloop-component"></bdt> <bdt class="question"><a href="https://paycertify.com/privacy-policy/" target="_blank" data-custom-class="link">https://paycertify.com/privacy-policy/</a></bdt>
                                <span style="color: rgb(89, 89, 89);">
                                    <span data-custom-class="body_text">
                                        <span style="color: rgb(89, 89, 89);"><bdt class="forloop-component"></bdt></span>.
                                        <span style="color: rgb(89, 89, 89);">
                                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                                        </span>
                                    </span>
                                    <bdt class="block-component"><span data-custom-class="body_text"></span></bdt>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong><span data-custom-class="body_text">Social Media Login Data.</span></strong>
        <span data-custom-class="body_text">
            &nbsp;We may provide you with the option to register using social media account details, like your Facebook, Twitter or other social media account. If you choose to register in this way, we will collect the Information described
            in the section called "
        </span>
    </span>
    <span data-custom-class="body_text">
        <a href="#sociallogins" data-custom-class="link"><span style="color: rgb(89, 89, 89);">HOW DO WE HANDLE YOUR SOCIAL LOGINS</span></a>
    </span>
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text">" below.</span>
        <span style="color: rgb(89, 89, 89);">
            <bdt class="statement-end-if-in-editor"><span data-custom-class="body_text"></span></bdt>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span data-custom-class="body_text">
            All personal information that you provide to us must be true, complete and accurate, and you must notify us of any changes to such personal information.
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                </span>
            </span>
        </span>
        <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="font-size: 15px;">
    <strong>
        <span data-custom-class="heading_2">
            <br />
            <span style="font-size: 16px;">Information automatically collected</span>
        </span>
    </strong>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:&nbsp;</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <em>
            <span style="font-size: 15px;">
                <span data-custom-class="body_text">
                    Some information — such as IP address and/or browser and device characteristics — is collected automatically when you visit our <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt>
                    <bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>.
                </span>
            </span>
        </em>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;">
            <span data-custom-class="body_text">
                We automatically collect certain information when you visit, use or navigate the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
                <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>. This information does not reveal your specific identity (like your name or contact
                information) but may include device and usage information, such as your IP address, browser and device characteristics, operating system, language preferences, referring URLs, device name, country, location, information
                about how and when you use our <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt>
                <bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> and other technical information. This information is primarily needed to maintain the security and operation of our
                <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
                <bdt class="statement-end-if-in-editor"></bdt>, and for our internal analytics and reporting purposes.<bdt class="block-component"></bdt>
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;">
            <span data-custom-class="body_text">
                Like many businesses, we also collect information through cookies and similar technologies. <bdt class="block-component"></bdt><bdt class="block-component"></bdt><bdt class="statement-end-if-in-editor"></bdt>
                <bdt class="block-component"></bdt>
            </span>
        </span>
    </span>
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
        <span data-custom-class="body_text">
            <bdt class="statement-end-if-in-editor"><bdt class="block-component"></bdt></bdt>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <strong>
        <span style="font-size: 16px;">
            <span data-custom-class="heading_2">
                <strong>
                    <span data-custom-class="heading_2">
                        <br />
                        Information collected through our Apps
                    </span>
                </strong>
            </span>
        </span>
    </strong>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em>
                <span data-custom-class="body_text">
                    We may collect information regarding your<bdt class="block-component"></bdt> geo-location,<bdt class="statement-end-if-in-editor"><bdt class="block-component"></bdt></bdt> mobile device,
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <em>
                                <span data-custom-class="body_text">
                                    <bdt class="statement-end-if-in-editor"><bdt class="statement-end-if-in-editor"></bdt></bdt>
                                </span>
                            </em>
                        </span>
                    </span>
                    <bdt class="block-component"></bdt> push notifications,<bdt class="statement-end-if-in-editor"></bdt><bdt class="forloop-component"></bdt>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <em>
                                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                            </em>
                        </span>
                    </span>
                    <bdt class="forloop-component"></bdt>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <em>
                                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                            </em>
                            <span data-custom-class="body_text">&nbsp;</span>
                        </span>
                    </span>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <em><span data-custom-class="body_text">and Facebook permissions</span></em>
                        </span>
                    </span>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <em>
                                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                            </em>
                        </span>
                    </span>
                    <bdt class="forloop-component"></bdt>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <em><span data-custom-class="body_text">when you use our apps.</span></em>
                        </span>
                    </span>
                </span>
            </em>
        </span>
    </span>
</p>
<div>
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">If you use our Apps, we may also collect the following information:<bdt class="block-component"></bdt></span>
    </span>
</div>
<ul>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <em>Geo-Location Information.</em> We may request access or permission to and track location-based information from your mobile device, either continuously or while you are using our mobile application, to provide
                    location-based services. If you wish to change our access or permissions, you may do so in your device's settings.
                    <span style="color: rgb(89, 89, 89); font-size: 15px;">
                        <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                    </span>
                    <bdt class="block-component"></bdt>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <em>Mobile Device Access.</em> We may request access or permission to certain features from your mobile device, including your mobile device's <bdt class="forloop-component"></bdt><bdt class="question">contacts</bdt>,
                    <bdt class="forloop-component"></bdt><bdt class="question">sms messages</bdt>, <bdt class="forloop-component"></bdt><bdt class="question">social media accounts</bdt>, <bdt class="forloop-component"></bdt>
                    <bdt class="question">reminders</bdt>, <bdt class="forloop-component"></bdt><bdt class="question">calendar</bdt>, <bdt class="forloop-component"></bdt>and other features. If you wish to change our access or permissions,
                    you may do so in your device's settings.
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span data-custom-class="body_text">
                                <bdt class="statement-end-if-in-editor"><bdt class="block-component"></bdt></bdt>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <em>Mobile Device Data.</em> We may automatically collect device information (such as your mobile device ID, model and manufacturer), operating system, version information and IP address.
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span data-custom-class="body_text">
                                <bdt class="statement-end-if-in-editor"><bdt class="block-component"></bdt></bdt>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <em>Push Notifications.</em> We may request to send you push notifications regarding your account or the mobile application. If you wish to opt-out from receiving these types of communications, you may turn them off in
                    your device's settings.
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                    </span>
                    <bdt class="forloop-component"></bdt>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                    </span>
                    <bdt class="forloop-component"></bdt>
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text"><em>Facebook Permissions.</em> We by default access your&nbsp;</span>
            </span>
        </span>
        <a href="https://www.facebook.com/about/privacy/" target="_blank" rel="noopener noreferrer" data-custom-class="link">
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">Facebook</span></span>
            </span>
        </a>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    &nbsp;basic account information, including your name, email, gender, birthday, current city, and profile picture URL, as well as other information that you choose to make public. We may also request access to other
                    permissions related to your account, such as friends, checkins, and likes, and you may choose to grant or deny us access to each individual permission. For more information regarding Facebook permissions, refer to
                    the&nbsp;
                </span>
            </span>
        </span>
        <a href="https://developers.facebook.com/docs/facebook-login/permissions" target="_blank" rel="noopener noreferrer" data-custom-class="link">
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">Facebook Permissions Reference</span></span>
            </span>
        </a>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    &nbsp;page.
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                    </span>
                    <bdt class="forloop-component"></bdt>
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </li>
</ul>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            <span style="color: rgb(89, 89, 89); font-size: 15px;">
                <span data-custom-class="body_text">
                    <bdt class="statement-end-if-in-editor"><bdt class="block-component"></bdt></bdt>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <strong>
        <span style="font-size: 16px;">
            <span data-custom-class="heading_2">
                <strong>
                    <span data-custom-class="heading_2">
                        <br />
                        Information collected from other sources
                    </span>
                </strong>
            </span>
        </span>
    </strong>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em>
                <span data-custom-class="body_text">
                    We may collect limited data from public databases, marketing partners, <bdt class="block-component"></bdt>social media platforms, <bdt class="statement-end-if-in-editor"></bdt>and other outside sources.
                </span>
            </em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;">
            <span data-custom-class="body_text">
                We may obtain information about your from other sources, such as public databases, joint marketing partners,<bdt class="block-component"></bdt> social media platforms (such as Facebook),
                <bdt class="statement-end-if-in-editor"></bdt> as well as from other third parties. Examples of the information we receive from other sources include: social media profile information<bdt class="block-component"></bdt> (your
                name, gender, birthday, email, current city, state and country, user identification numbers for your contacts, profile picture URL, and any other information that you choose to make public)
                <bdt class="statement-end-if-in-editor"></bdt>; marketing leads and search results and links, including paid listings (such as sponsored links). We will inform you about the source of information and the type of information
                and the type of information we have collected about you within a reasonable period after obtaining the personal data, but at the latest within one month.
            </span>
        </span>
        <span style="color: rgb(89, 89, 89);">
            <bdt class="block-component">
                <span style="color: rgb(89, 89, 89); font-size: 15px;">
                    <span data-custom-class="body_text">
                        <span style="color: rgb(89, 89, 89); font-size: 15px;">
                            <span data-custom-class="body_text">
                                <bdt class="statement-end-if-in-editor"><bdt class="statement-end-if-in-editor"></bdt></bdt>
                            </span>
                        </span>
                    </span>
                </span>
            </bdt>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;"><br /></p>
<p id="infouse" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">2. HOW DO WE USE YOUR INFORMATION?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em>
                <span data-custom-class="body_text">
                    We process your information for purposes based on legitimate business interests, the fulfillment of our contract with you, compliance with our legal obligations, and/or your consent.
                </span>
            </em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                We use personal information collected via our <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt>
                <bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> for a variety of business purposes described below. We process your personal information for these purposes in reliance on our legitimate
                business interests, in order to enter into or perform a contract with you, with your consent, and/or for compliance with our legal obligations. We indicate the specific processing grounds we rely on next to each purpose
                listed below.
            </span>
            <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">We use the information we collect or receive:<bdt class="block-component"></bdt></span>
        </span>
    </span>
</p>
<ul>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">To facilitate account creation and logon process.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;If you choose to link your account with us to a third party account (such as your Google or Facebook account), we use the information you allowed us to collect from those third parties to facilitate account
                    creation and logon process for the performance of the contract. <bdt class="block-component"></bdt>See the section below headed "
                </span>
            </span>
        </span>
        <span data-custom-class="body_text">
            <a href="#sociallogins" data-custom-class="link">
                <span style="font-size: 15px;"><span style="color: rgb(89, 89, 89);">HOW DO WE HANDLE YOUR SOCIAL LOGINS</span></span>
            </a>
        </span>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    " for further information.
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                    </span>
                </span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">To send you marketing and promotional communications.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We and/or our third party marketing partners may use the personal information you send to us for our marketing purposes, if this is in accordance with your marketing preferences. You can opt-out of our marketing
                    emails at any time (see the "
                </span>
            </span>
        </span>
        <span data-custom-class="body_text">
            <a href="#privacyrights" data-custom-class="link">
                <span style="font-size: 15px;"><span style="color: rgb(89, 89, 89);">WHAT ARE YOUR PRIVACY RIGHTS</span></span>
            </a>
        </span>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">" below).</span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">To send administrative information to you.&nbsp;</span></strong>
                <span data-custom-class="body_text">We may use your personal information to send you product, service and new feature information and/or information about changes to our terms, conditions, and policies.</span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">Fulfill and manage your orders.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We may use your information to fulfill and manage your orders, payments, returns, and exchanges made through the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt>
                    <bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>.
                </span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span data-custom-class="body_text">
                                                    <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt>
                                                    <bdt class="block-component"></bdt>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">To protect our Services.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We may use your information as part of our efforts to keep our <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
                    <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> safe and secure (for example, for fraud monitoring and prevention).
                </span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span data-custom-class="body_text">
                                                                                            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">To enforce our terms, conditions and policies for Business Purposes, Legal Reasons and Contractual.</span></strong>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">To respond to legal requests and prevent harm.&nbsp;</span></strong>
                <span data-custom-class="body_text">If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond.</span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span style="font-size: 15px;">
                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                <span style="font-size: 15px;">
                                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                                        <span style="font-size: 15px;">
                                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span style="font-size: 15px;">
                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                <span style="font-size: 15px;">
                                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                                        <span style="font-size: 15px;">
                                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                                <span data-custom-class="body_text">
                                                                                                                    <strong>To manage user accounts</strong>. We may use your information for the purposes of managing our account and keeping
                                                                                                                    it in working order.
                                                                                                                    <span style="font-size: 15px;">
                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                                <span
                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                        color: rgb(89, 89, 89);
                                                                                                                                                                                                                    "
                                                                                                                                                                                                                >
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        style="font-size: 15px;"
                                                                                                                                                                                                                    >
                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                );
                                                                                                                                                                                                                            "
                                                                                                                                                                                                                        >
                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                data-custom-class="body_text"
                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                <bdt
                                                                                                                                                                                                                                    class="statement-end-if-in-editor"
                                                                                                                                                                                                                                ></bdt>
                                                                                                                                                                                                                                <bdt
                                                                                                                                                                                                                                    class="block-component"
                                                                                                                                                                                                                                ></bdt>
                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                </span>
                                                                                                                                                                                                            </span>
                                                                                                                                                                                                        </span>
                                                                                                                                                                                                    </span>
                                                                                                                                                                                                </span>
                                                                                                                                                                                            </span>
                                                                                                                                                                                        </span>
                                                                                                                                                                                    </span>
                                                                                                                                                                                </span>
                                                                                                                                                                            </span>
                                                                                                                                                                        </span>
                                                                                                                                                                    </span>
                                                                                                                                                                </span>
                                                                                                                                                            </span>
                                                                                                                                                        </span>
                                                                                                                                                    </span>
                                                                                                                                                </span>
                                                                                                                                            </span>
                                                                                                                                        </span>
                                                                                                                                    </span>
                                                                                                                                </span>
                                                                                                                            </span>
                                                                                                                        </span>
                                                                                                                    </span>
                                                                                                                </span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span style="font-size: 15px;">
                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                <span style="font-size: 15px;">
                                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                                        <span style="font-size: 15px;">
                                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                                <span data-custom-class="body_text"><br /></span>
                                                                                                            </span>
                                                                                                            &nbsp;
                                                                                                        </span>
                                                                                                        &nbsp;
                                                                                                    </span>
                                                                                                    &nbsp;
                                                                                                </span>
                                                                                                &nbsp;
                                                                                            </span>
                                                                                            &nbsp;
                                                                                        </span>
                                                                                        &nbsp;
                                                                                    </span>
                                                                                    &nbsp;
                                                                                </span>
                                                                                &nbsp;
                                                                            </span>
                                                                            &nbsp;
                                                                        </span>
                                                                        &nbsp;
                                                                    </span>
                                                                    &nbsp;
                                                                </span>
                                                                &nbsp;
                                                            </span>
                                                            &nbsp;
                                                        </span>
                                                        &nbsp;
                                                    </span>
                                                    &nbsp;
                                                </span>
                                                &nbsp;
                                            </span>
                                            &nbsp;
                                        </span>
                                        &nbsp;
                                    </span>
                                    &nbsp;
                                </span>
                                &nbsp;
                            </span>
                            &nbsp;
                        </span>
                        &nbsp;
                    </span>
                    &nbsp;
                </span>
                &nbsp;
            </span>
            &nbsp;
        </span>
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span style="font-size: 15px;">
                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                <span style="font-size: 15px;">
                                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                                        <span style="font-size: 15px;">
                                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                                <span data-custom-class="body_text">
                                                                                                                    <strong>To deliver services to the user.</strong> We may use your information to provide you with the requested service.
                                                                                                                    <span style="font-size: 15px;">
                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                                <span
                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                        color: rgb(89, 89, 89);
                                                                                                                                                                                                                    "
                                                                                                                                                                                                                >
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        style="font-size: 15px;"
                                                                                                                                                                                                                    >
                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                );
                                                                                                                                                                                                                            "
                                                                                                                                                                                                                        >
                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                data-custom-class="body_text"
                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                    color: rgb(
                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                        89
                                                                                                                                                                                                                                                    );
                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                    color: rgb(
                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                        89
                                                                                                                                                                                                                                                                    );
                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                    color: rgb(
                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                        89
                                                                                                                                                                                                                                                                                    );
                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                    color: rgb(
                                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                                        89
                                                                                                                                                                                                                                                                                                    );
                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                                    color: rgb(
                                                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                                                        89
                                                                                                                                                                                                                                                                                                                    );
                                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                                                    color: rgb(
                                                                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                                                                        89,
                                                                                                                                                                                                                                                                                                                                        89
                                                                                                                                                                                                                                                                                                                                    );
                                                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                                                        font-size: 15px;
                                                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                                                            data-custom-class="body_text"
                                                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                                                            <bdt
                                                                                                                                                                                                                                                                                                                                                class="statement-end-if-in-editor"
                                                                                                                                                                                                                                                                                                                                            ></bdt>
                                                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                </span>
                                                                                                                                                                                                            </span>
                                                                                                                                                                                                        </span>
                                                                                                                                                                                                    </span>
                                                                                                                                                                                                </span>
                                                                                                                                                                                            </span>
                                                                                                                                                                                        </span>
                                                                                                                                                                                    </span>
                                                                                                                                                                                </span>
                                                                                                                                                                            </span>
                                                                                                                                                                        </span>
                                                                                                                                                                    </span>
                                                                                                                                                                </span>
                                                                                                                                                            </span>
                                                                                                                                                        </span>
                                                                                                                                                    </span>
                                                                                                                                                </span>
                                                                                                                                            </span>
                                                                                                                                        </span>
                                                                                                                                    </span>
                                                                                                                                </span>
                                                                                                                            </span>
                                                                                                                        </span>
                                                                                                                    </span>
                                                                                                                </span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <bdt class="block-component"></bdt><br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span style="font-size: 15px;">
                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                <span style="font-size: 15px;">
                                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                                        <span style="font-size: 15px;">
                                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                                <span data-custom-class="body_text">
                                                                                                                    <strong>To respond to user inquiries/offer support to users.</strong> We may use your information to respond to your
                                                                                                                    inquiries and solve any potential issues you might have with the use of our Services.
                                                                                                                    <bdt class="statement-end-if-in-editor"></bdt>
                                                                                                                </span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                    <span style="color: rgb(89, 89, 89);">
                                        <span style="font-size: 15px;">
                                            <span style="color: rgb(89, 89, 89);">
                                                <span style="font-size: 15px;">
                                                    <span style="color: rgb(89, 89, 89);">
                                                        <span style="font-size: 15px;">
                                                            <span style="color: rgb(89, 89, 89);">
                                                                <span style="font-size: 15px;">
                                                                    <span style="color: rgb(89, 89, 89);">
                                                                        <span style="font-size: 15px;">
                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                <span style="font-size: 15px;">
                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                        <span style="font-size: 15px;">
                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                <span style="font-size: 15px;">
                                                                                                    <span style="color: rgb(89, 89, 89);">
                                                                                                        <span style="font-size: 15px;">
                                                                                                            <span style="color: rgb(89, 89, 89);">
                                                                                                                <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <strong><span data-custom-class="body_text">For other Business Purposes.</span></strong>
            <span data-custom-class="body_text">
                &nbsp;We may use your information for other Business Purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our
                <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
                <bdt class="statement-end-if-in-editor"></bdt>, products, marketing and your experience.&nbsp;
            </span>
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);">
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span style="font-size: 15px;">
                                <span style="color: rgb(89, 89, 89);">
                                    <span style="font-size: 15px;">
                                        <span style="color: rgb(89, 89, 89);">
                                            <span style="font-size: 15px;">
                                                <span style="color: rgb(89, 89, 89);">
                                                    <span style="font-size: 15px;">
                                                        <span style="color: rgb(89, 89, 89);">
                                                            <span style="font-size: 15px;">
                                                                <span style="color: rgb(89, 89, 89);">
                                                                    <span style="font-size: 15px;">
                                                                        <span style="color: rgb(89, 89, 89);">
                                                                            <span style="font-size: 15px;">
                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                    <span style="font-size: 15px;">
                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                            <span style="font-size: 15px;">
                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                    <span style="font-size: 15px;">
                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                            <span style="font-size: 15px;">
                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                    <span data-custom-class="body_text">
                                                                                                                        We may use and store this information in aggregated and anonymized form so that it is not associated with individual end
                                                                                                                        users and does not include personal information. We will not use identifiable personal information without your consent.
                                                                                                                        <span style="color: rgb(89, 89, 89); font-size: 15px;">
                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                                <span
                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                        color: rgb(89, 89, 89);
                                                                                                                                                                                                                    "
                                                                                                                                                                                                                >
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        style="font-size: 15px;"
                                                                                                                                                                                                                    >
                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                );
                                                                                                                                                                                                                            "
                                                                                                                                                                                                                        >
                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                "
                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                        data-custom-class="body_text"
                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                font-size: 15px;
                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                                                                                                                                );
                                                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                                                                                                                                            data-custom-class="body_text"
                                                                                                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                                                                                                            <bdt
                                                                                                                                                                                                                                                                                                                                                                class="statement-end-if-in-editor"
                                                                                                                                                                                                                                                                                                                                                            ></bdt>
                                                                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                </span>
                                                                                                                                                                                                            </span>
                                                                                                                                                                                                        </span>
                                                                                                                                                                                                    </span>
                                                                                                                                                                                                </span>
                                                                                                                                                                                            </span>
                                                                                                                                                                                        </span>
                                                                                                                                                                                    </span>
                                                                                                                                                                                </span>
                                                                                                                                                                            </span>
                                                                                                                                                                        </span>
                                                                                                                                                                    </span>
                                                                                                                                                                </span>
                                                                                                                                                            </span>
                                                                                                                                                        </span>
                                                                                                                                                    </span>
                                                                                                                                                </span>
                                                                                                                                            </span>
                                                                                                                                        </span>
                                                                                                                                    </span>
                                                                                                                                </span>
                                                                                                                            </span>
                                                                                                                        </span>
                                                                                                                    </span>
                                                                                                                </span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <span style="font-size: 15px;">
                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                    <span style="font-size: 15px;">
                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                            <span style="font-size: 15px;">
                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                    <span style="font-size: 15px;">
                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                            <span style="font-size: 15px;">
                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                    <span data-custom-class="body_text">
                                                                                                                        <span style="color: rgb(89, 89, 89); font-size: 15px;">
                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                    <span style="font-size: 15px;">
                                                                                                                                                                                                        <span style="color: rgb(89, 89, 89);">
                                                                                                                                                                                                            <span style="font-size: 15px;">
                                                                                                                                                                                                                <span
                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                        color: rgb(89, 89, 89);
                                                                                                                                                                                                                    "
                                                                                                                                                                                                                >
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        style="font-size: 15px;"
                                                                                                                                                                                                                    >
                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                color: rgb(
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89,
                                                                                                                                                                                                                                    89
                                                                                                                                                                                                                                );
                                                                                                                                                                                                                            "
                                                                                                                                                                                                                        >
                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                    font-size: 15px;
                                                                                                                                                                                                                                "
                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                <span
                                                                                                                                                                                                                                    style="
                                                                                                                                                                                                                                        color: rgb(
                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                            89,
                                                                                                                                                                                                                                            89
                                                                                                                                                                                                                                        );
                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                >
                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                            color: rgb(
                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                89,
                                                                                                                                                                                                                                                89
                                                                                                                                                                                                                                            );
                                                                                                                                                                                                                                            font-size: 15px;
                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                            data-custom-class="body_text"
                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                            <bdt
                                                                                                                                                                                                                                                class="statement-end-if-in-editor"
                                                                                                                                                                                                                                            ></bdt>
                                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                        </span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                </span>
                                                                                                                                                                                                            </span>
                                                                                                                                                                                                        </span>
                                                                                                                                                                                                    </span>
                                                                                                                                                                                                </span>
                                                                                                                                                                                            </span>
                                                                                                                                                                                        </span>
                                                                                                                                                                                    </span>
                                                                                                                                                                                </span>
                                                                                                                                                                            </span>
                                                                                                                                                                        </span>
                                                                                                                                                                    </span>
                                                                                                                                                                </span>
                                                                                                                                                            </span>
                                                                                                                                                        </span>
                                                                                                                                                    </span>
                                                                                                                                                </span>
                                                                                                                                            </span>
                                                                                                                                        </span>
                                                                                                                                    </span>
                                                                                                                                </span>
                                                                                                                            </span>
                                                                                                                        </span>
                                                                                                                    </span>
                                                                                                                </span>
                                                                                                            </span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </li>
</ul>
<p style="line-height: 1.5; font-size: 15px;"><br /></p>
<p id="infoshare" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">3. WILL YOUR INFORMATION BE SHARED WITH ANYONE?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">We only share information with your consent, to comply with laws, to provide you with services, to protect your rights, or to fulfill business obligations.</span></em>
        </span>
    </span>
</p>
<div>
    <span style="color: rgb(89, 89, 89); font-size: 15px;"><span data-custom-class="body_text">We may process or share data based on the following legal basis:</span></span>
</div>
<ul>
    <li>
        <span data-custom-class="body_text">
            <span style="color: rgb(89, 89, 89); font-size: 15px;"><strong>Consent:</strong> We may process your data if you have given us specific consent to use your personal information in a specific purpose.</span><br />
            <br />
        </span>
    </li>
    <li>
        <span data-custom-class="body_text">
            <span style="color: rgb(89, 89, 89); font-size: 15px;"><strong>Legitimate Interests:</strong> We may process your data when it is reasonably necessary to achieve our legitimate business interests.</span><br />
            <br />
        </span>
    </li>
    <li>
        <span data-custom-class="body_text">
            <span style="color: rgb(89, 89, 89); font-size: 15px;">
                <strong>Performance of a Contract:&nbsp;</strong>Where we have entered into a contract with you, we may process your personal information to fulfill the terms of our contract.
            </span>
            <br />
            <br />
        </span>
    </li>
    <li>
        <span data-custom-class="body_text">
            <span style="color: rgb(89, 89, 89); font-size: 15px;">
                <strong>Legal Obligations:</strong> We may disclose your information where we are legally required to do so in order to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal process,
                such as in response to a court order or a subpoena (including in response to public authorities to meet national security or law enforcement requirements).
            </span>
            <br />
            <br />
        </span>
    </li>
    <li>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <span data-custom-class="body_text">
                <strong>Vital Interests:</strong> We may disclose your information where we believe it is necessary to investigate, prevent, or take action regarding potential violations of our policies, suspected fraud, situations
                involving potential threats to the safety of any person and illegal activities, or as evidence in litigation in which we are involved.
            </span>
        </span>
    </li>
</ul>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">More specifically, we may need to process your data or share your personal information in the following situations:</span>
            <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
        </span>
    </span>
</p>
<ul>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">Vendors, Consultants and Other Third-Party Service Providers.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We may share your data with third party vendors, service providers, contractors or agents who perform services for us or on our behalf and require access to such information to do that work. Examples include:
                    payment processing, data analysis, email delivery, hosting services, customer service and marketing efforts. We may allow selected third parties to use tracking technology on the
                    <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
                    <bdt class="statement-end-if-in-editor"></bdt>, which will enable them to collect data about how you interact with the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt>
                    <bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> over time. This information may be used to, among
                    other things, analyze and track data, determine the popularity of certain content and better understand online activity. Unless described in this Policy, we do not share, sell, rent or trade any of your information with
                    third parties for their promotional purposes. <bdt class="block-component"></bdt>
                </span>
            </span>
        </span>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">Business Transfers.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.
                    <bdt class="block-component"></bdt>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">Third-Party Advertisers.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We may use third-party advertising companies to serve ads when you visit the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
                    <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>. These companies may use information about your visits to our Website(s) and other
                    websites that are contained in web cookies and other tracking technologies in order to provide advertisements about goods and services of interest to you. <bdt class="block-component"></bdt>
                    <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">Affiliates.</span></strong>
                <span data-custom-class="body_text">
                    &nbsp;We may share your information with our affiliates, in which case we will require those affiliates to honor this
                    <span style="color: rgb(89, 89, 89);">
                        <span data-custom-class="body_text">
                            <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                        </span>
                    </span>
                    . Affiliates include our parent company and any subsidiaries, joint venture partners or other companies that we control or that are under common control with us.
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span style="font-size: 15px;">
                                <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
                            </span>
                        </span>
                    </span>
                    <bdt class="block-component"></bdt>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <strong><span data-custom-class="body_text">Business Partners.</span></strong>
                <span data-custom-class="body_text">&nbsp;We may share your information with our business partners to offer you certain products, services or promotions.</span>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                    </span>
                </span>
                <span data-custom-class="body_text"><bdt class="block-component"></bdt><bdt class="block-component"></bdt></span>
                <span style="color: rgb(89, 89, 89);">
                    <bdt class="block-component"><span data-custom-class="body_text"></span></bdt>
                </span>
            </span>
        </span>
        <br />
        <br />
    </li>
    <li>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <strong><span data-custom-class="body_text">Offer Wall.</span></strong>
            <span data-custom-class="body_text">
                &nbsp;Our Apps may display a third-party hosted “offer wall.” Such an offer wall allows third-party advertisers to offer virtual currency, gifts, or other items to users in return for acceptance and completion of an
                advertisement offer. Such an offer wall may appear in our mobile application and be displayed to you based on certain data, such as your geographic area or demographic information. When you click on an offer wall, you will
                leave our mobile application. A unique identifier, such as your user ID, will be shared with the offer wall provider in order to prevent fraud and properly credit your account.
            </span>
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt><bdt class="statement-end-if-in-editor"></bdt></span>
                </span>
            </span>
        </span>
    </li>
</ul>
<div>
    <bdt class="block-component"><span data-custom-class="body_text"></span></bdt>
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span style="font-size: 15px;">
            <span style="color: rgb(89, 89, 89);">
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <bdt class="block-component"><span data-custom-class="heading_1"></span></bdt>
                    </span>
                </span>
            </span>
        </span>
    </span>
</div>
<p style="font-size: 15px;"><br /></p>
<div>
    <span id="cookies" style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">4. DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</span></span>
        </strong>
    </span>
</div>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">We may use cookies and other tracking technologies to collect and store your information.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            We may use cookies and similar tracking technologies (like web beacons and pixels) to access or store information. Specific information about how we use such technologies and how you can refuse certain cookies is set out in our
            Cookie Policy<bdt class="block-component"></bdt>.
        </span>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);">
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
                        </span>
                        <span style="color: rgb(89, 89, 89);">
                            <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;"><br /></p>
<p id="googlemaps" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">5. DO WE USE GOOGLE MAPS?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">Yes, we use Google Maps for the purpose of providing better service.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">This website, mobile application uses Google Maps APIs. You may find the Google Maps APIs Terms of Service&nbsp;</span></span>
        <span data-custom-class="body_text">
            <span style="color: rgb(48, 48, 241);"><a href="https://developers.google.com/maps/terms" target="_blank" data-custom-class="link">here</a></span>
            <span style="color: rgb(89, 89, 89);">. To better understand Google’s Privacy Policy, please refer to this&nbsp;</span>
            <span style="color: rgb(48, 48, 241);"><a href="https://policies.google.com/privacy" target="_blank" data-custom-class="link">link</a></span>
        </span>
        <span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">.</span></span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                By using our Maps API Implementation, you agree to be bound by Google’s Terms of Service. <bdt class="block-component"></bdt> <bdt class="block-component"></bdt>You agree to allow us to obtain or cache your location. You may
                revoke your consent at anytime. <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt>
            </span>
        </span>
    </span>
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <span style="color: rgb(89, 89, 89); font-size: 15px;">
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="sociallogins" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">6. HOW DO WE HANDLE YOUR SOCIAL LOGINS?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">If you choose to register or log in to our services using a social media account, we may have access to certain information about you.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                Our <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
                <bdt class="statement-end-if-in-editor"></bdt> offer you the ability to register and login using your third party social media account details (like your Facebook or Twitter logins). Where you choose to do this, we will
                receive certain profile information about you from your social media provider. The profile Information we receive may vary depending on the social media provider concerned, but will often include your name, e-mail address,
                friends list, profile picture as well as other information you choose to make public. <bdt class="block-component"></bdt><bdt class="forloop-component"></bdt><bdt class="block-component"></bdt>
                <bdt class="forloop-component"></bdt><bdt class="block-component"></bdt>If you login using Facebook, we may also request access to other permissions related to your account, such as friends, check-ins, and likes, and you may
                choose to grant or deny us access to each individual permission.
            </span>
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt><bdt class="forloop-component"></bdt></span>
                        </span>
                    </span>
                    <bdt class="statement-end-if-in-editor"><span data-custom-class="body_text"></span></bdt>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            We will use the information we receive only for the purposes that are described in this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
                &nbsp;
            </span>
            or that are otherwise made clear to you on the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt>
            <bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>. Please note that we do not control, and are not responsible for, other uses of your personal information by your third party social media
            provider. We recommend that you review their privacy policy to understand how they collect, use and share your personal information, and how you can set your privacy preferences on their sites and apps.
        </span>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <span style="color: rgb(89, 89, 89); font-size: 15px;">
                <span style="color: rgb(89, 89, 89); font-size: 15px;">
                    <span style="font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span style="font-size: 15px;">
                                <span style="color: rgb(89, 89, 89);">
                                    <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span><bdt class="block-component"><span data-custom-class="body_text"></span></bdt><bdt class="block-component"></bdt>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="3pwebsites" style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">7. WHAT IS OUR STANCE ON THIRD-PARTY WEBSITES?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">We are not responsible for the safety of any information that you share with third-party providers who advertise, but are not affiliated with, our websites.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            The <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
            <bdt class="statement-end-if-in-editor"></bdt> may contain advertisements from third parties that are not affiliated with us and which may link to other websites, online services or mobile applications. We cannot guarantee the
            safety and privacy of data you provide to any third parties. Any data collected by third parties is not covered by this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
            </span>
            . We are not responsible for the content or privacy and security practices and policies of any third parties, including other websites, services or applications that may be linked to or from the
            <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
            <bdt class="statement-end-if-in-editor"></bdt>. You should review the policies of such third parties and contact them directly to respond to your questions.
        </span>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <span style="color: rgb(89, 89, 89); font-size: 15px;">
                <span style="color: rgb(89, 89, 89); font-size: 15px;">
                    <span style="color: rgb(89, 89, 89); font-size: 15px;">
                        <span style="color: rgb(89, 89, 89);">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="color: rgb(89, 89, 89);">
                                    <bdt class="statement-end-if-in-editor"><span data-custom-class="body_text"></span></bdt>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="inforetain" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">8. HOW LONG DO WE KEEP YOUR INFORMATION?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em>
                <span data-custom-class="body_text">
                    We keep your information for as long as necessary to fulfill the purposes outlined in this
                    <span style="color: rgb(89, 89, 89);">
                        <span data-custom-class="body_text">
                            <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                        </span>
                        &nbsp;
                    </span>
                    unless otherwise required by law.
                </span>
            </em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                We will only keep your personal information for as long as it is necessary for the purposes set out in this
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text">
                        <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                    </span>
                </span>
                , unless a longer retention period is required or permitted by law (such as tax, accounting or other legal requirements). No purpose in this policy will require us keeping your personal information for longer than
                <bdt class="block-component"></bdt><bdt class="question">the period of time in which users have an account with us</bdt><bdt class="else-block"></bdt>.
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymize it, or, if this is not possible (for example, because your personal information has been stored in backup
            archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.
        </span>
    </span>
    <span style="color: rgb(89, 89, 89);"><bdt class="block-component"></bdt></span>
</p>
<div style="line-height: 1.5;"><br /></div>
<p id="infosafe" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">9. HOW DO WE KEEP YOUR INFORMATION SAFE?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">We aim to protect your personal information through a system of organizational and technical security measures.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            We have implemented appropriate technical and organizational security measures designed to protect the security of any personal information we process. However, please also remember that we cannot guarantee that the internet
            itself is 100% secure. Although we will do our best to protect your personal information, transmission of personal information to and from our <bdt class="block-component"></bdt>Services
            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> is at your
            own risk. You should only access the services within a secure environment.
        </span>
    </span>
    <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="infominors" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">10. DO WE COLLECT INFORMATION FROM MINORS?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">We do not knowingly collect data from or market to children under 18 years of age.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            We do not knowingly solicit data from or market to children under 18 years of age. By using the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>, you represent that you are at least 18 or that you are the parent or guardian of such a minor
            and consent to such minor dependent’s use of the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt>
            <bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>. If we learn that personal information from users less than 18 years of age has been collected, we will deactivate the account and take
            reasonable measures to promptly delete such data from our records. If you become aware of any data we have collected from children under age 18, please contact us at <bdt class="block-component"></bdt>
            <bdt class="question">info@prudentscores.com</bdt><bdt class="else-block"></bdt>.
        </span>
        <span style="color: rgb(89, 89, 89); font-size: 15px;">
            <span data-custom-class="body_text"><bdt class="statement-end-if-in-editor"></bdt></span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="privacyrights" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">11. WHAT ARE YOUR PRIVACY RIGHTS?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <span data-custom-class="body_text">
                <em><bdt class="block-component"></bdt>You may review, change, or terminate your account at any time.</em>
            </span>
            <bdt class="block-component"><span data-custom-class="body_text"></span></bdt>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                If you are resident in the European Economic Area and you believe we are unlawfully processing your personal information, you also have the right to complain to your local data protection supervisory authority. You can find
                their contact details here:
            </span>
        </span>
        &nbsp;
    </span>
    <span data-custom-class="body_text">
        <span style="color: rgb(48, 48, 241);">
            <span style="font-size: 15px;">
                <a href="http://ec.europa.eu/justice/data-protection/bodies/authorities/index_en.htm" target="_blank" data-custom-class="link">http://ec.europa.eu/justice/data-protection/bodies/authorities/index_en.htm</a>.
            </span>
        </span>
    </span>
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <bdt class="block-component"><span data-custom-class="body_text"></span></bdt><bdt class="block-component"></bdt>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">If you have questions or comments about your privacy rights, you may email us at <bdt class="question">info@prudentscores.com</bdt>.</span><bdt class="statement-end-if-in-editor"></bdt>
        </span>
    </span>
</p>
<div style="line-height: 1.1;"><br /></div>
<div>
    <span style="font-size: 16px;">
        <span style="color: rgb(0, 0, 0);">
            <strong><span data-custom-class="heading_2">Account Information</span></strong>
        </span>
    </span>
</div>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">If you would at any time like to review or change the information in your account or terminate your account, you can:<bdt class="forloop-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    &nbsp; &nbsp; ■ &nbsp;
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text"><bdt class="question">Log into your account settings and update your user account.</bdt> <bdt class="forloop-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    &nbsp; &nbsp; ■ &nbsp;
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text"><bdt class="question">Contact us using the contact information provided.</bdt> <bdt class="forloop-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, some information may be retained in our files to prevent fraud, troubleshoot
                problems, assist with any investigations, enforce our Terms of Use and/or comply with legal requirements.
            </span>
            <span style="font-size: 15px;">
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt></span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <strong>
                <u><span data-custom-class="body_text">Cookies and similar technologies:</span></u>&nbsp;
            </strong>
            <span data-custom-class="body_text">
                Most Web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove cookies and to reject cookies. If you choose to remove cookies or reject cookies, this could affect
                certain features or services of our <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt>
                <bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>. To opt-out of interest-based advertising by advertisers on our <bdt class="block-component"></bdt>Services
                <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt>
            </span>
            <span data-custom-class="body_text"><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt> visit</span>
        </span>
        &nbsp;
    </span>
    <span style="color: rgb(48, 48, 241);">
        <span data-custom-class="body_text">
            <a href="http://www.aboutads.info/choices/" target="_blank" rel="noopener noreferrer" data-custom-class="link"><span style="font-size: 15px;">http://www.aboutads.info/choices/</span></a>
        </span>
    </span>
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                . <bdt class="block-component"></bdt>
                <span style="font-size: 15px;">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span style="color: rgb(89, 89, 89);">
                                <span style="font-size: 15px;">
                                    <span style="color: rgb(89, 89, 89);"><bdt class="statement-end-if-in-editor"></bdt></span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
            <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;">
            <strong>
                <u><span data-custom-class="body_text">Opting out of email marketing:</span></u>&nbsp;
            </strong>
            <span data-custom-class="body_text">
                You can unsubscribe from our marketing email list at any time by clicking on the unsubscribe link in the emails that we send or by contacting us using the details provided below. You will then be removed from the marketing
                email list – however, we will still need to send you service-related emails that are necessary for the administration and use of your account. To otherwise opt-out, you may:<bdt class="forloop-component"></bdt>
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    &nbsp; &nbsp; ■
    <span style="color: rgb(89, 89, 89);">
        &nbsp;
        <span style="font-size: 15px;">
            <span data-custom-class="body_text"><bdt class="question">Note your preferences when you register an account with the site.</bdt> <bdt class="forloop-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    &nbsp; &nbsp; ■
    <span style="color: rgb(89, 89, 89);">
        &nbsp;
        <span style="font-size: 15px;">
            <span data-custom-class="body_text"><bdt class="question">Access your account settings and update preferences.</bdt> <bdt class="forloop-component"></bdt></span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    &nbsp; &nbsp; ■
    <span style="color: rgb(89, 89, 89);">
        &nbsp;
        <span style="font-size: 15px;">
            <span data-custom-class="body_text">
                <bdt class="question">Contact us using the contact information provided.</bdt> <bdt class="forloop-component"></bdt>
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text">
                        <span style="font-size: 15px;">
                            <span style="font-size: 15px;">
                                <bdt class="statement-end-if-in-editor"><bdt class="block-component"></bdt></bdt>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;"><br /></p>
<p id="DNT" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">12. CONTROLS FOR DO-NOT-TRACK FEATURES</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;">
            <span data-custom-class="body_text">
                Most web browsers and some mobile operating systems and mobile applications include a Do-Not-Track (“DNT”) feature or setting you can activate to signal your privacy preference not to have data about your online browsing
                activities monitored and collected. No uniform technology standard for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that
                automatically communicates your choice not to be tracked online. If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this
                <span style="color: rgb(89, 89, 89);">
                    <span data-custom-class="body_text">
                        <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                    </span>
                </span>
                .
            </span>
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;"><br /></p>
<p id="caresidents" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">13. DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">Yes, if you are a resident of California, you are granted specific rights regarding access to your personal information.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="font-size: 15px;">
        <span style="color: rgb(89, 89, 89);">
            <span data-custom-class="body_text">
                California Civil Code Section 1798.83, also known as the “Shine The Light” law, permits our users who are California residents to request and obtain from us, once a year and free of charge, information about categories of
                personal information (if any) we disclosed to third parties for direct marketing purposes and the names and addresses of all third parties with which we shared personal information in the immediately preceding calendar year.
                If you are a California resident and would like to make such a request, please submit your request in writing to us using the contact information provided below.
            </span>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            If you are under 18 years of age, reside in California, and have a registered account with the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>, you have the right to request removal of unwanted data that you publicly post on the
            <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps
            <bdt class="statement-end-if-in-editor"></bdt>. To request removal of such data, please contact us using the contact information provided below, and include the email address associated with your account and a statement that you
            reside in California. We will make sure the data is not publicly displayed on the <bdt class="block-component"></bdt>Services<bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt> or
            <bdt class="statement-end-if-in-editor"></bdt><bdt class="block-component"></bdt>Apps<bdt class="statement-end-if-in-editor"></bdt>, but please be aware that the data may not be completely or comprehensively removed from our
            systems.
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="policyupdates" style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">14. DO WE MAKE UPDATES TO THIS POLICY?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89);">
        <strong>
            <em>
                <span style="font-size: 15px;"><span data-custom-class="body_text">In Short:</span></span>&nbsp;
            </em>
            &nbsp;
        </strong>
        <span style="font-size: 15px;">
            <em><span data-custom-class="body_text">Yes, we will update this policy as necessary to stay compliant with relevant laws.</span></em>
        </span>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            We may update this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
                &nbsp;
            </span>
            from time to time. The updated version will be indicated by an updated “Revised” date and the updated version will be effective as soon as it is accessible. If we make material changes to this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
            </span>
            , we may notify you either by prominently posting a notice of such changes or by directly sending you a notification. We encourage you to review this
            <span style="color: rgb(89, 89, 89);">
                <span data-custom-class="body_text">
                    <bdt class="block-component"></bdt><span style="color: rgb(89, 89, 89);"><span data-custom-class="body_text">privacy policy</span></span><bdt class="statement-end-if-in-editor"></bdt>
                </span>
                &nbsp;
            </span>
            frequently to be informed of how we are protecting your information.
        </span>
    </span>
</p>
<p style="line-height: 1.5; font-size: 15px;">
    <span style="color: rgb(89, 89, 89);"><br /></span>
</p>
<p id="contact" style="font-size: 15px;">
    <span style="color: rgb(0, 0, 0);">
        <strong>
            <span style="font-size: 19px;"><span data-custom-class="heading_1">15. HOW CAN YOU CONTACT US ABOUT THIS POLICY?</span></span>
        </strong>
    </span>
</p>
<p style="font-size: 15px;">
    <span style="color: rgb(89, 89, 89); font-size: 15px;">
        <span data-custom-class="body_text">
            If you have questions or comments about this policy, you may <bdt class="block-component"></bdt>email us at <bdt class="question">info@prudentscores.com</bdt><bdt class="statement-end-if-in-editor"></bdt> or by post to:
        </span>
    </span>
</p>
<div>
    <span style="color: rgb(89, 89, 89);">
        <bdt class="question">
            <span style="font-size: 15px;"><span data-custom-class="body_text">PRUDENT CREDIT SOLUTIONS, Inc</span></span>&nbsp;
        </bdt>
        <span data-custom-class="body_text">
            <span style="font-size: 15px;">
                <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
            </span>
        </span>
    </span>
</div>
<div>
    <span data-custom-class="body_text">
        <span style="color: rgb(89, 89, 89);">
            <span style="font-size: 15px;"><bdt class="question">5800 S. Eastern Ave.</bdt><bdt class="block-component"></bdt></span>
        </span>
    </span>
</div>
<div>
    <span data-custom-class="body_text">
        <span style="color: rgb(89, 89, 89);">
            <span style="font-size: 15px;">
                <bdt class="question">Suite 500 COMMERCE</bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt>, <bdt class="question">CA</bdt><bdt class="statement-end-if-in-editor"></bdt>
                <bdt class="block-component"></bdt><bdt class="block-component"></bdt> <bdt class="question">90040</bdt><bdt class="statement-end-if-in-editor"></bdt>
            </span>
        </span>
    </span>
    <span data-custom-class="body_text">
        <span style="color: rgb(89, 89, 89);">
            <span style="font-size: 15px;"><bdt class="block-component"></bdt><bdt class="block-component"></bdt><bdt class="block-component"></bdt></span>
        </span>
    </span>
</div>
<div>
    <span data-custom-class="body_text">
        <span style="color: rgb(89, 89, 89);">
            <span style="font-size: 15px;">
                <bdt class="question"></bdt>
                <span data-custom-class="body_text">
                    <span style="color: rgb(89, 89, 89);">
                        <span style="font-size: 15px;">
                            <span data-custom-class="body_text">
                                <span style="color: rgb(89, 89, 89);">
                                    <span style="font-size: 15px;"><bdt class="statement-end-if-in-editor"></bdt></span>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
                <bdt class="else-block"></bdt>
            </span>
        </span>
    </span>
    <span data-custom-class="body_text">
        <span style="color: rgb(89, 89, 89);">
            <span style="font-size: 15px;"><bdt class="statement-end-if-in-editor"></bdt><bdt class="statement-end-if-in-editor"></bdt></span>
        </span>
    </span>
    <span style="color: rgb(89, 89, 89);">
        <span style="font-size: 15px;">
            <span data-custom-class="body_text"><bdt class="block-component"></bdt></span>
        </span>
    </span>
    <bdt class="block-component"></bdt>
</div>
<p id="contact" style="line-height: 1.5; font-size: 15px;"><br /></p>
<p id="contact" style="font-size: 15px;">
    <strong><span data-custom-class="heading_1">HOW CAN YOU REVIEW, UPDATE, OR DELETE THE DATA WE COLLECT FROM YOU?</span></strong>
</p>
<div>
    <span data-custom-class="body_text">
        To request to review, update, or delete your personal information, please email us at <a href="mailto:info@prudentscores.com">info@prudentscores.com</a>and we will respond to your request within 30 day.
    </span>
</div>
<style>
    ul {
        list-style-type: square;
    }
    ul > li > ul {
        list-style-type: circle;
    }
    ul > li > ul > li > ul {
        list-style-type: square;
    }
    ol li {
        font-family: Arial;
    }
</style>
