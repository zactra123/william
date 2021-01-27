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
            width: 100%;
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

    @include('helpers.breadcrumbs', ['title'=> "BLOGS", 'route' => ["Home"=> '/admins/blogs',"BLOG" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">
                        <div class="col-md-3 pull-left">
                            <a class="btn btn-primary pull-left" href="{{ route('blog.create')}}" role="button">
                                ADD BLOG
                            </a>
                        </div>

                    </div>
                    <div class="container">

                    </div>
                    <div class="album py-5 bg-light">
                        <div class="container">
                            <div class="row">
                                @foreach($blogs as  $blog)
                                    <div class="col-md-4 pt-5" title="{{strtoupper($blog->title)}}">
                                        <div class="card mb-8 box-shadow" >
                                                <img class="card-img-top banks-card" src="{{$blog->path}}"  onclick="location.href='{{route("blog.edit", $blog->id)}}'" alt="Card image cap">


                                            <div class="card-body">
                                                <div class="card-text p-2 mt-3">
                                                    <div class="bank-name b"  onclick="location.href='{{route("blog.edit", $blog->id)}}'" >
                                                        <label>{{strtoupper($blog->title)}}</label>
                                                    </div>
                                                    <div class="bank-name b"  onclick="location.href='{{route("blog.edit", $blog->id)}}'" >
                                                        <label>{{date("M/d/Y", strtotime($blog->published_date))}}</label>
                                                    </div>



                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card-text mt-5">

                                                    <div class=" text-right" >
                                                        <a href="{{route("blog.show", $blog->url)}}"><span> READ MORE </span></a>
                                                        <div class="delete " data-toggle="popover" data-placement="top" data-id="{{ $blog->id}}" >
                                                            <span> <i class="fa fa-trash"></i> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/html" id="confirmation">
        <div>
            <button class="cancel btn btn-secondary ">cancel</button>
            <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
        </div>
    </script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                html:true,
                title: "ARE YOU SURE?",
                content: function() {
                    var $this = $(this);
                    return $("#confirmation").html().replace('{bank_id}', $($this).attr('data-id'))
                }
            }).click(function (e) {
                $('[data-toggle=popover]').not(this).popover('hide');
            });

            $(document).click(function (e) {
                if ($('[data-toggle=popover]').has(e.target).length == 0 && (($('.popover').has(e.target).length == 0) || $(e.target).is('.cancel'))) {
                    $('[data-toggle=popover]').popover('hide');
                }
            });

            $(document).on('click',".delete-bank", function (e) {
                var id = $(this).attr('data-id'),
                    token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: "/admins/blog/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        location.reload();
                    }
                });
            })

            $(".selectize").selectize({plugins: ['remove_button']})
        })

    </script>

@endsection




