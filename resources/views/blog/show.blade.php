@extends('layouts.layout')
@section('content')
<style>
  :root {
    --jumbotron-padding-y: 3rem;
  }

  .jumbotron p:last-child {
    margin-bottom: 0;
  }

  .jumbotron .container {
    max-width: 40rem;
  }

  footer {
    padding-top: 3rem;
    padding-bottom: 3rem;
  }

  footer p {
    margin-bottom: 0.25rem;
  }

  .pagination.custom li > a,
  span {
    width: fit-content;
    margin: 0;
  }
  @media (min-width: 767px) {
    .pagination.alphabetical li > a,
    span {
      float: unset;
      margin: 0;
    }
    .pagination.custom li > a,
    span {
      width: 4%;
      margin: 0;
    }
  }
</style>
@include('helpers.breadcrumbs', ['title'=> "BLOG", 'route' => ["Home"=> '/admins/blogs',"BLOG" => "#"]])
<section class="ms-user-account">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-12 col-sm-12">
        <div class="container">
          <h2>{{$blog->title}}</h2>
        </div>
        <div class="album py-5 bg-light">
          <div class="container"><?php  echo htmlspecialchars_decode(htmlspecialchars($blog->article, ENT_QUOTES))?></div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
