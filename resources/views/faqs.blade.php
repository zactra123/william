
@extends('layouts.layout1')

@section('meta')
    <title>Frequently asked questions about credit repair and scores</title>
    <meta name="description" content="Get answers about frequently asked questions about credit repair and scores.
        What is a late payment? What is a 'charge-off'? Can credit repair benefit me?">
    <meta name="keywords" content="What do credit repair companies do, what are the three main credit bureaus, building better credit">

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
        {{-- <img class="background-image"  src="{{asset("images/new/header-background.jpg")}}" alt="background"> --}}
        <div class="container faq-page">
            <div class="container">
                <h1 class="text-center mb-5">Frequently Asked Questions - Prudent Scores</h1>
                    <div class="section-title">
                        <div class="wrapper-content" >
                            <div class="row  mr-0 ml-0">
                                <div class="col-md-8 pl-4">
                                    @foreach($faqs as $faq)
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="row ml-0 mr-0 faq-block" data-id="{{$faq->id}}">
                                                <span class="faqs-title col-9" style="font-size: 16px">{{$faq->title}}</span>
                                                <div class="align-right col-1">
                                                    <label><i class="fa fa-arrow-down"></i>  </label>
                                                </div>
                                            </div>
                                            <div class="faqs-body pt-0 m-0" data-id="{{$faq->id}}" >
                                                {{$faq->description}}
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                    @endforeach
                                </div>
                                <div class="col-md-4 question-form">
                                    <h2 >Send Your Question</h2>
                                    <form action="{{route('faqs')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 form-inner">
                                                <input class="form-control mb-2" name="name" type="text" placeholder="Your name...">
                                                <input class="form-control mb-2" name="email" type="email" placeholder="Email...">
                                                <textarea class="form-control mb-2" name="question" id="" style="height: 200px;"></textarea>
                                                <div class="basic-button">
                                                    <input type="submit" class="form-control" value="Send Messages">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- section-wrapper -->
                    </div>
                </div>

        </div>
        @include('helpers.chat')
    </section>


@endsection
