@extends('layouts.layout')

@section('content')
    <style>
        :root {
            --jumbotron-padding-y: 3rem;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }
        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .box-shadow { box-shadow: 0 .35rem .95rem rgba(0, 0, 0, 1); }

        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        .delete{
            z-index: 10;
            display: inline-block;
            width: 15%;
            cursor: pointer;
            color: red;
            font-size: 16px;
        }

        .banks-card {
            cursor: pointer;
        }
        .bank-name {
            text-overflow: ellipsis;
            overflow: hidden;
            display:inline-block;
            width: 80%;
            height: 1.2em;
            white-space: nowrap;
            cursor: pointer;
        }
        .popover.top{
            width: fit-content;
        }
        .pagination.custom li > a, span{
            width: fit-content;
            margin: 0;
        }
        @media (min-width: 767px) {
            .pagination.alphabetical li > a, span{
                float: unset;
                margin: 0;
            }
            .pagination.custom li > a, span{
                width: 4%;
                margin: 0;
            }
        }
    </style>

    @include('helpers.breadcrumbs', ['title'=> "BLOGS", 'route' => ["Home"=> '/',"BLOG" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">

                    <div class=" ms-ua-box">
                            <h2>{{$blog->title}}</h2>

                    </div>
                    <div class="album py-5 bg-light">
                        <div class="container">
                            <?php  echo htmlspecialchars_decode(htmlspecialchars($blog->article, ENT_QUOTES))?>

                        </div>
                    </div>
                    <div class=ms-ua-social">

                        <a class="m-2" href="{{route('shear', [ 'url'=> $blog->url, 'social'=>'facebook'])}}" target="_blank"> <i class="fa fa-facebook-square" ></i></a>
                        <a class="m-2" href="{{route('shear', [ 'url'=> $blog->url, 'social'=>'twitter'])}}" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a class="m-2" href="{{route('shear', [ 'url'=> $blog->url, 'social'=>'linkedin'])}}" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection




