
@extends('layouts.login')

@section('content')

    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container fon">
                <div class="card m-0 pb-4">
                            <div class="breadcrumbs">
                                <div class="container">
                                    <a href="{{url('/')}}">Home</a> &rarr;
                                    <a href="#">FAQs</a>
                                </div>
                            </div>

                            <div id="site-content">

                                    <div class="row mr-0 ml-0">
                                        <div class="col-md-8">
                                            <h1 class="wow fadeInLeft">FAQs</h1>
                                            @foreach($faqs as $faq)

                                                <div class="row ml-0 mr-0">

                                                    {{$faq->title}}
                                                    <div class="align-right">
                                                        <label for="password" class="col-md-1 show title1-{{$faq->id}}" style="display: block">   <i class="fa fa-arrow-down"></i>  </label>
                                                        <label for="password" class="col-md-1 hide title2-{{$faq->id}}" style="display: none">   <i class="fa fa-arrow-up"></i>  </label>
                                                    </div>
                                                </div>
                                                <div class="card-body hideShow desc-{{$faq->id}}" style="display: none">

                                                    {{$faq->description}}
                                                </div>


                                            @endforeach


                                        </div>
                                        <div class="col-md-4">
                                            <h1 class="wow fadeInRight">Send Your Question</h1>
                                            <form action="{{route('faqs.store')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="wow fadeInRight"><input name="name" type="text" placeholder="Your name..."></p>

                                                        <p class="wow fadeInRight"><input name="email" type="email" placeholder="Email..."></p>
                                                        <p class="wow fadeInRight"><textarea name="question" id=""></textarea></p>
                                                        <input type="submit" class="button pull-right wow fadeInRight" value="Send Messages">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.show').click(function(){
                console.log('dasdasda');
                $className = (this).className;
                $show = $className.replace('col-md-1 show title1-', '');

                $('.desc-'+$show).css('display','block');
                $('.title1-'+$show).css('display','none');
                $('.title2-'+$show).css('display','block');

            })

            $('.hide').click(function(){

                $className = (this).className;
                $show = $className.replace('col-md-1 hide title2-', '');
                $('.desc-'+$show).css('display','none');
                $('.title1-'+$show).css('display','block');
                $('.title2-'+$show).css('display','none');

            })


        })


    </script>

@endsection