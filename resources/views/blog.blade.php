@extends('layouts.layout1')

@section('meta')
    <title>Prudent Credit Solutions: News Room</title>
    <meta name="description" content="We resolve inaccuracies with - Bankruptcy, Mortgage Negatives, Late Payment
        Remarks, Student Loans, Fraud Accounts, Charge Offs, Mixed Files, ChexSystems.">
    <meta name="keywords" content="credit repair blogs, list of credit repair blogs, credit repair strategies blogs, credit repair companies blog, credit repair business blog">
@endsection

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
    <section class="header">
        <img class="background-image"  src="{{asset("images/new/header-background.jpg")}}" alt="background">
        <div class="container header-banner blog-page">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">


                    </div>
                    <div class="container">

                    </div>
                    <div class="album py-5 ">
                        <div class="container">
                            <h1 class="text-center">The Official Prudent Scores Credit Repair Blog</h1>
                            <div class="row ">
                                @foreach($blogs as  $blog)
                                    <div class="col-md-4 pt-5" title="{{strtoupper($blog->title)}}">
                                        <div class="card mb-8" >
                                            <div class="img-block">
                                                <img class="card-img banks-card" src="{{$blog->path}}"  onclick="location.href='{{route("home.blog.show", $blog->url)}}'" alt="Card image cap">
                                            </div>
                                            <div class="card-body">
                                                <div class="card-text p-2">
                                                    <div class="title"  onclick="location.href='{{route("home.blog.show", $blog->url)}}'" >
                                                        <label>{{strtoupper($blog->title)}}</label>
                                                    </div>
                                                    <div class="date"  onclick="location.href='{{route("home.blog.show", $blog->url)}}'" >
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

        @include('helpers.chat')
    </section>
@endsection




