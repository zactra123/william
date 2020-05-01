@extends('layouts.layout')

@section('content')

    <style>
        .modal {
            position: fixed;
            top: 150px;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;

            outline: 0;
        }
        .modal.in .modal-dialog {

            transform: translate(0,0);
        }

        .fade {
            transition: opacity .15s linear;
        }
        .in {
            opacity: 1;
        }
        .modal-dialog {

            transition: transform .3s ease-out;

        }

        .modal-body {
            position: relative;
            width: auto;
            margin: 10px;
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
                <h2>Financial Scenarior</h2>
                <div class="border-2"></div>
            </div> <!-- section-title -->

            <div class="section-wrapper text-center">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="wrapper-content">
                            <img width="100%" src="{{asset('images/chart1.jpg')}}" alt="">
                            <h4 style="font-size: 20px">Credit & Payment Ratio</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wrapper-content">
                            <img width="100%" src="{{asset('images/chart2.png')}}" alt="">
                            <h4 style="font-size: 20px">Credit & Debit History</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wrapper-content">
                            <img width="100%" src="{{asset('images/chart3.jpg')}}" alt="">
                            <h4 style="font-size: 20px">Account Blance Ratio</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wrapper-content">
                            <img width="100%" src="{{asset('images/chart4.jpg')}}" alt="">
                            <h4 style="font-size: 20px">Length of Credit Ratio</h4>
                        </div>
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
                <div class="col-sm-9">
                    <div class="tab-content">
                        @foreach($contents as $info)
                        <div role="tabpanel" class="tab-pane fade in {{$info->id==1?'active':''}}" id="{{$info->url}}">
                            <h3>{{$info->title}}</h3>
                            <p><?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?></p>

                        </div>
                        @endforeach

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;
                    $(hash).addClass('in')
                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 500, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });

            $("li").on('click', function(event) {
                $("li").removeClass('active')
                $(this).addClass('active')

            });
        });
    </script>



@endsection


