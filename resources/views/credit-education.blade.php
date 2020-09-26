@extends('layouts.layout')

@section('content')

    <style>
        .modal-body {
          max-height: 500px;
        }

        div.tab-content > div:nth-of-type(odd) {
            background: #f5f5f5;
            border-radius: 5px;
        }

        .striped {
            padding: 10px;
        }
        .ms-edu-tab-content .nav-tabs-wrapper {
            max-height: 90vh;
        }
        .scrolled-content {
            overflow-y: scroll;
        }
        .scrolled-content::-webkit-scrollbar {
            display: none;
        }
    </style>


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Credit Education</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Credit Education</span>
        </div>
    </section>

    <!-- Credit Education -->
    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>Credit Score Pie Chart</h2>
                <div class="border-2"></div>
            </div> <!-- section-title -->

            <div class="section-wrapper text-center">
                <div class="row justify-content-center">

                        <div class="wrapper-content">
                            <img width="55%" src="{{asset('images/chart1.jpg')}}"  alt="">
                        </div>

{{--                    <div class="col-md-3">--}}
{{--                        <div class="wrapper-content">--}}
{{--                            <img width="100%" src="{{asset('images/chart2.png')}}" alt="">--}}
{{--                            <h4 style="font-size: 20px">Credit & Debit History</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="wrapper-content">--}}
{{--                            <img width="100%" src="{{asset('images/chart3.jpg')}}" alt="">--}}
{{--                            <h4 style="font-size: 20px">Account Blance Ratio</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="wrapper-content">--}}
{{--                            <img width="100%" src="{{asset('images/chart4.jpg')}}" alt="">--}}
{{--                            <h4 style="font-size: 20px">Length of Credit Ratio</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                        </div>
                </div>
            </div> <!-- section-wrapper -->
        </div>
    </section>

    <section class="ms-edu ms-edu-desktop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 ms-edu-tab">
                    <div class="ms-edu-tab-content">
                        <!--<a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>-->
                        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                            @foreach($contents as  $content)
                            <li class="{{$content->id==1?'active':''}}"><a href="#{{$content->url}}" data-toggle="tab">{{$content->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 ">
                    <div class="ms-edu-tab-content">
                        <div class="tab-content nav-tabs-wrapper scrolled-content ">
                            @foreach($contents as $info)
                                <div role="tabpanel" class="striped" id="{{$info->url}}">
                                    <h3>{{$info->title}}</h3>
                                    <p><?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?></p>

                                </div>
                            @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ms-edu ms-edu-mobile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 ms-edu-tab">
                    <div class="ms-edu-tab-content">
                        <!--<a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>-->
                        <ul class="nav nav-tabs nav-pills nav-stacked well">
                            @foreach($contents as  $content)
                            <li><a href="#{{$content->url}}-1" data-toggle="modal">{{$content->title}}</a></li>

                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                        @foreach($contents as  $content)
                        <div class="modal fade" id="{{$content->url}}-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3>{{$content->title}}</h3>
                                        <p><?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/lib/jquery.mCustomScrollbar.min.js') }}" ></script>
    <script>
        $(document).ready(function(){
            $("a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 500, function(){
                        console.log(window.location.hash)
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>



@endsection


