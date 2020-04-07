
@extends('layouts.login')

@section('content')
    <style>
        .hideShow{
            display: none;
            text-align: justify;
            color: #0c71c3;
        }
        .faqs-title {
            font-style: italic;
            font-size: 1.2rem;
        }
    </style>



    <div class="mt-5 pt-5" id="site-content">

        <div class="row  mr-0 ml-0">
            <div class="col-md-8 pl-4">
                <h1>FAQs</h1>
                @foreach($faqs as $faq)

                    <div class="row ml-0 mr-0">

                        <span class="faqs-title">{{$faq->title}}</span>
                        <div class="align-right">
                            <label class="col-md-1 show title1-{{$faq->id}}" style="display: block">   <i class="fa fa-arrow-down"></i>  </label>
                            <label class="col-md-1 hide title2-{{$faq->id}}" style="display: none">   <i class="fa fa-arrow-up"></i>  </label>
                        </div>
                    </div>
                    <div class="card-body pt-0 m-0 hideShow desc-{{$faq->id}}" >

                       {{$faq->description}}
                    </div>


                @endforeach


            </div>
            <div class="col-md-4">
                <h1 >Send Your Question</h1>
                <form action="{{route('faqs.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <p ><input name="name" type="text" placeholder="Your name..."></p>

                            <p ><input name="email" type="email" placeholder="Email..."></p>
                            <p ><textarea name="question" id=""></textarea></p>
                            <input type="submit" class="button pull-right wow fadeInRight" value="Send Messages">
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>


    <script>
        $(document).ready(function(){

            $('.show').click(function(){
                console.log('dasdasda');
                $className = (this).className;
                $show = $className.replace('col-md-1 show title1-', '');


                $('.hideShow').css('display','none');
                $('.hide').css('display','none');
                $('.show').css('display','block');
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
