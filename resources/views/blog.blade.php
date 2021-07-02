@extends('layouts.layout1')

@section('meta')
    <title>Prudent Credit Solutions: News Room</title>
    <meta name="description" content="We resolve inaccuracies with - Bankruptcy, Mortgage Negatives, Late Payment
        Remarks, Student Loans, Fraud Accounts, Charge Offs, Mixed Files, ChexSystems.">
    <meta name="keywords" content="credit repair blogs, list of credit repair blogs, credit repair strategies blogs, credit repair companies blog, credit repair business blog">
@endsection

@section('content')


  <div class="container-fluid pt-1">
    <div class="px-3 mt-5  pt-3">
        <div class="row">
          <div class="col-md-12  py-4">
            <div class="alert alert-danger">
              <b>Important Note</b>
              <p>This page is under development yet and you can see only dimmy data here yet.</p>
            </div>
            <h1 class="text-center fs-25">OUR NEWS ROOM</h1>
            <p class="text-center">lorum ipsum dolit norim amit lorum ipsum dolit norim amit lorum ipsum dolit norim amit lorum ipsum dolit norim amit</p>
          </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="Search Results"></div>
                        <form class="mt-5 p-r" action="" method="GET">
                            <input type="text" value="" required="" class="blog-search-field shadow-sm" placeholder="Search tags,keywords" name="query" />
                        </form>

                        <div class="mt-5 shadow-sm px-4 py-4">
                            <h4 class="h6">Most Viewed Blogs</h4>
                            <div class="latest-products mt-4"></div>
                            <p  class="text-danger">This section is under development</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">

                  @foreach($blogs as  $blog)

                    <div class="col-md-6">
                        <div class="blog-box shadow-sm">
                            <div class="row mt-4 p-r">
                                <div class="col-md-12">
                                    <div class="entry-thumb">
                                        <a class="entry-hover" href="#" title="#">
                                            <img width="100%" height="300" src="{{$blog->path}}" data-src="{{$blog->path}}" alt="{{strtoupper($blog->title)}}" class="img-fluid img-responsive ls-is-cached lazyloaded" />
                                        </a>
                                        <div class="blog-media text-center">
                                            <span class="entry-date latest_post_date">
                                                <span class="day-time bold fw-600 fs-15">{{date("d M", strtotime($blog->published_date))}}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3 py-3">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h4 class="h6 fw-600 theme-color">{{strtoupper($blog->title)}}</h4>
                                  </div>
                              </div>

                              <div class="row mt-1">
                                  <div class="col-md-12">
                                    <p> lorum ipsum dolit norim amit lorum ipsum dolit norim amit lorum ipsum dolit norim amit lorum ipsum dolit norim amit...</p>
                                  </div>

                                  <div class="col-md-12">
                                    <a href="#" class="pull-right">
                                        <b class="text-danger"> <i class="la la-caret-right"></i> Read More</b>
                                    </a>
                                  </div>
                              </div>


                            </div>
                        </div>
                    </div>


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

                <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="text-center">
                          {{$blogs->links()}}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




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
                            <div class="row">


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
