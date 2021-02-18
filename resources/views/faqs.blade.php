
@extends('layouts.layout1')

@section('meta')
    <title>Frequently asked questions about credit repair and scores</title>
    <meta name="description" content="Get answers about frequently asked questions about credit repair and scores.
        What is a late payment? What is a 'charge-off'? Can credit repair benefit me?">
@endsection

@section('content')


    <style>
        .hideShow{
            display: none;
            text-align: justify;
            color: #0c71c3;
        }
        .faqs-title {
            font-style: italic;
            /*font-size: 1.2rem;*/
        }
    </style>


    <section class="header">
        <img class="background-image"  src="{{asset("images/new/header-background.jpg")}}" alt="background">
        <div class="container header-banner">

        </div>

        <div class="container header-banner">
            <div class="container">
                    <div class="section-title">
                        <div class="wrapper-content" >
                            <div class="row  mr-0 ml-0">
                                <div class="col-md-8 pl-4">
                                    @foreach($faqs as $faq)

                                        <div class="row ml-0 mr-0">

                                            <span class="faqs-title col-md-9" style="font-size: 16px">{{$faq->title}}</span>
                                            <div class="align-right">
                                                <label class="col-md-1 show1 title1-{{$faq->id}}" style="display: block"> Append  <i class="fa fa-arrow-down"></i>  </label>
                                                <label class="col-md-1 hide1 title2-{{$faq->id}}" style="display: none">  Hide <i class="fa fa-arrow-up"></i>  </label>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 m-0 hideShow desc-{{$faq->id}}" >

                                            {{$faq->description}}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h2 >Send Your Question</h2>
                                    <form action="{{route('faqs')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p></p><input class="form-control" name="name" type="text" placeholder="Your name..."></p>

                                                <p><input class="form-control" name="email" type="email" placeholder="Email..."></p>
                                                <p><textarea  class="form-control" name="question" id="" style="height: 200px;"></textarea></p>
                                                <input type="submit" class="form-control" value="Send Messages">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- section-wrapper -->
                    </div>
                </div>

        </div>

    </section>



    <script>
        $(document).ready(function(){

            $('.show1').click(function(){
                $className = (this).className;
                $show = $className.replace('col-md-1 show1 title1-', '');
                console.log($show);


                $('.hideShow').css('display','none');
                $('.hide1').css('display','none');
                $('.show1').css('display','block');
                $('.desc-'+$show).css('display','block');
                $('.title1-'+$show).css('display','none');
                $('.title2-'+$show).css('display','block');

            })

            $('.hide1').click(function(){

                $className = (this).className;
                $show = $className.replace('col-md-1 hide1 title2-', '');
                $('.desc-'+$show).css('display','none');
                $('.title1-'+$show).css('display','block');
                $('.title2-'+$show).css('display','none');

            })


        })


    </script>

@endsection
