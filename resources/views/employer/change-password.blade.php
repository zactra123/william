@extends('owner.layouts.app')
@section('title')
<title>Change Password</title>
@endsection
@section('body')

<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
      </ol>
    </nav>
  </div>
</div>
@if ($errors->any())

<div class="alert alert-danger flash">
  <button type="button" class="close" data-dismiss="alert">×</button>
  @foreach($errors->all() as $message)
  <strong>{{ $message }}</strong>
  @endforeach
</div>
@endif
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    {!! Form::open(['route'=>['adminRec.changePassword'],'method' => 'POST']) !!}
    @method('PUT')
    @csrf
    <div class="card">
      <div class="card-header text-center">
        {{ ucfirst($admin->full_name) }} - {{ $admin->email }}
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="current-password" data-toggle="password" />
        </div>
        <div class="col-md-12 mt-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" />
        </div>
      </div>

      <div class="card-footer text-right">
        <input type="submit" value="Change Password" class="ms-ua-submit btn btn-primary" />
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function () {
    $(".pass_show").append('<span class="ptxt"><i class="fa fa-eye"></span>');
  });

  $(document).on("click", ".pass_show .ptxt", function () {
    $(this)
      .prev()
      .attr("type", function (index, attr) {
        return attr == "password" ? "text" : "password";
      });
  });
</script>

<script id="password-requirements" type="text/html">
  <div>
      <ul>
          <li><i class="fa {length-class}"></i> Must be between 8 and 20</li>
          <li><i class="fa {letters-class}"></i> Must contain both upper and lower case letters</li>
          <li><i class="fa {digit-class}"></i> Must contain at least one number digit</li>
          <li><i class="fa {special-class}"></i> Must contain at least one special characters</li>
      </ul>
  </div>
</script>

<style>
  .popover {
    width: fit-content;
  }
</style>

<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/site/clients/changePassword.js?v=2') }}" defer></script>

@endsection
