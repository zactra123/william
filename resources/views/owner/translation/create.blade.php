@extends('owner.layouts.app')
@section('title')
<title>Translation</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('owner.translation.index') }}">Translation</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Translation</li>
      </ol>
    </nav>
  </div>
</div>
<section class="ms-user-account">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-12"></div>
      <div class="col-md-8 col-sm-12">
        <div class="ms-ua-box">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Add New Translation</h4>
                <p>Please enter followiing information to add new translation</p>
              </div>
              <div class="card-body pl-4 pr-4">
                <form class="" action="index.html" method="post">
                @csrf
                <div class="form-group row font">
                  <input type="text" name="" class="form-control" placeholder="Key" value="">
                </div>
                <div class="form-group row font">
                  <input type="text" name="" class="form-control" placeholder="In English" value="">
                </div>
                <div class="form-group row font">
                  <input type="text" name="" class="form-control" placeholder="In Spanish" value="">
                </div>
                <div class="form-group row mb-0 font">
                  <div class="col-md-12 text-right px-0">
                    <button type="submit" class="btn btn-primary pull-right">
                      Add Translation
                    </button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
