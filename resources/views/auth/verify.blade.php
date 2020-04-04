@extends('layouts.client')




@section('content')
    <style>
        .design-process-section .text-align-center {
            line-height: 25px;
            margin-bottom: 12px;
        }
        .design-process-content {
            border: 1px solid #e9e9e9;
            position: relative;
            padding: 16px 34% 30px 30px;
        }
        .design-process-content img {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            max-height: 100%;
        }
        .design-process-content h3 {
            margin-bottom: 16px;
        }
        .design-process-content p {
            line-height: 26px;
            margin-bottom: 12px;
        }
        .process-model {
            list-style: none;
            padding: 0;
            position: relative;
            max-width: 600px;
            margin: 20px auto 26px;
            border: none;
            z-index: 0;
        }
        .process-model li::after {
            background: #e5e5e5 none repeat scroll 0 0;
            bottom: 0;
            content: "";
            display: block;
            height: 4px;
            margin: 0 auto;
            position: absolute;
            right: -30px;
            top: 33px;
            width: 85%;
            z-index: -1;
        }
        .process-model li.visited::after {
            background: #57b87b;
        }
        .process-model li:last-child::after {
            width: 0;
        }
        .process-model li {
            display: inline-block;
            width: 18%;
            text-align: center;
            float: none;
        }
        .nav-tabs.process-model > li.active > a, .nav-tabs.process-model > li.active > a:hover, .nav-tabs.process-model > li.active > a:focus, .process-model li a:hover, .process-model li a:focus {
            border: none;
            background: transparent;

        }
        .process-model li a {
            padding: 0;
            border: none;
            color: #606060;
        }
        .process-model li.active,
        .process-model li.visited {
            color: #57b87b;
        }
        .process-model li.active a,
        .process-model li.active a:hover,
        .process-model li.active a:focus,
        .process-model li.visited a,
        .process-model li.visited a:hover,
        .process-model li.visited a:focus {
            color: #57b87b;
        }
        .process-model li.active p,
        .process-model li.visited p {
            font-weight: 600;
        }
        .process-model li i {
            display: block;
            height: 68px;
            width: 68px;
            text-align: center;
            margin: 0 auto;
            background: #f5f6f7;
            border: 2px solid #e5e5e5;
            line-height: 65px;
            font-size: 30px;
            border-radius: 50%;
        }
        .process-model li.active i, .process-model li.visited i  {
            background: #fff;
            border-color: #57b87b;
        }
        .process-model li p {
            font-size: 14px;
            margin-top: 11px;
        }
        .process-model.contact-us-tab li.visited a, .process-model.contact-us-tab li.visited p {
            color: #606060!important;
            font-weight: normal
        }
        .process-model.contact-us-tab li::after  {
            display: none;
        }
        .process-model.contact-us-tab li.visited i {
            border-color: #e5e5e5;
        }



        @media screen and (max-width: 560px) {
            .more-icon-preocess.process-model li span {
                font-size: 23px;
                height: 50px;
                line-height: 46px;
                width: 50px;
            }
            .more-icon-preocess.process-model li::after {
                top: 24px;
            }
        }
        @media screen and (max-width: 380px) {
            .process-model.more-icon-preocess li {
                width: 16%;
            }
            .more-icon-preocess.process-model li span {
                font-size: 16px;
                height: 35px;
                line-height: 32px;
                width: 35px;
            }
            .more-icon-preocess.process-model li p {
                font-size: 8px;
            }
            .more-icon-preocess.process-model li::after {
                top: 18px;
            }
            .process-model.more-icon-preocess {
                text-align: center;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

            var href = $(e.target).attr('href');
            var $curr = $(".process-model  a[href='" + href + "']").parent();

            $('.process-model li').removeClass();

            $curr.addClass("active");
            $curr.prevAll().addClass("visited");
        });
        // end  script for tab step
    </script>


    <div class="page-content">
        <div class="fullwidth-block">

            <section class="design-process-section" id="process-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- design process steps-->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                                <li role="presentation" class="active"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-search" aria-hidden="true"></i>
                                        <p>Discover</p>
                                    </a></li>
                                <li role="presentation"><a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fa fa-send-o" aria-hidden="true"></i>
                                        <p>Strategy</p>
                                    </a></li>
                                <li role="presentation"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fa fa-qrcode" aria-hidden="true"></i>
                                        <p>Optimization</p>
                                    </a></li>
                                <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <p>Content</p>
                                    </a></li>
                                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                                        <p>Reporting</p>
                                    </a></li>
                            </ul>
                            <!-- end design process steps-->
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="discover">
                                    <div class="design-process-content">
                                        <h3 class="semi-bold">Discovery</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="strategy">
                                    <div class="design-process-content">
                                        <h3 class="semi-bold">Strategy</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="optimization">
                                    <div class="design-process-content">
                                        <h3 class="semi-bold">Optimization</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="content">
                                    <div class="design-process-content">
                                        <h3 class="semi-bold">Content</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="reporting">
                                    <div class="design-process-content">
                                        <h3>Reporting</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>








            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">

                            <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
