@extends('owner.layouts.app')
@section('title')
<title>Subscribers</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
            </ol>
          </nav>
    </div>
  </div>

  <div class="container">
    <div class="row row-sm">
      <div class="col-md-2">

      </div>
      <div class="col-md-8">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Subscribers
            </div>
            <p class="mg-b-20">See list of subscribers here...</p>
            <div class="card-body">
              <table class="table">
                <thead>
                <tr>
                  <th  scope="col">#</th>
                  <th  scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $key=> $view)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{$view->email}}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-md-12 mt-3">
                <div class="row float-right">
                    {{$subscribers->links()}}
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
