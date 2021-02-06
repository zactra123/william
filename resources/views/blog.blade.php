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
            height: 250px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: auto;
            object-fit: contain;
            width: 100%;
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
                    <div class="row m-2  pt-4">


                    </div>
                    <div class="container">

                    </div>
                    <div class="album py-5 bg-light">
                        <div class="container">
                            <div class="row ">
                                @foreach($blogs as  $blog)
                                    <div class="col-md-4 pt-5" title="{{strtoupper($blog->title)}}">
                                        <div class="card mb-8 box-shadow" >
                                            <img class="card-img-top banks-card" src="{{$blog->path}}"  onclick="location.href='{{route("home.blog.show", $blog->url)}}'" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="card-text p-2 mt-3">
                                                    <div class="bank-name b"  onclick="location.href='{{route("home.blog.show", $blog->url)}}'" >
                                                        <label>{{strtoupper($blog->title)}}</label>
                                                    </div>
                                                    <div class="bank-name b"  onclick="location.href='{{route("home.blog.show", $blog->url)}}'" >
                                                        <label>{{date("F j, Y", strtotime($blog->published_date))}}</label>
                                                    </div>



                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center">
                                {{$blogs->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection




