@extends('layouts.auth')
@section('content')
  <section class="py-5 container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <form class="px-4 py-4 login-form-border" method="POST" action="{{ route('password.email') }}">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger flash">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  @foreach($errors->all()  as $message)
                      <strong>{{ $message }}</strong>
                  @endforeach
              </div>
          @endif

          <h1 class="fs-25 bold theme-color-dark">{{ zactra::translate_lang('Forgot Your Password?') }}</h1>
          <p>{{ zactra::translate_lang('Nothing to worry, Recover your password using your email address!') }}</p>
          <br>
          <div class="form-group">
            <input type="email" name="email"  class="@error('email')  is-invalid @enderror form-control fs-12" autofocus value="{{ old('email') }}" id="email" placeholder="{{ zactra::translate_lang('E-Mail-adress') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="basic-button login-box text-center">
              <input class="login" type="submit" value="{{ zactra::translate_lang('Reset Password') }}">
          </div>
        </form>
        <p class="pt-4 fs-12 text-center">
            {{ zactra::translate_lang('Remember Your Password?') }} <a class="fs-12 theme-color-dark" href="{{route('login')}}">{{ zactra::translate_lang('Sign In') }}</a>
        </p>
      </div>
    </div>
  </section>
@endsection
