@extends('layouts.layout')

@section('content')

    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Reset Password</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Setup Password</span>
        </div>
    </section>


    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="ms-ua-box">

                        <div class="fullwidth-block">
                                <div class="row justify-content-center">
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="POST" >
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="PASSWORD">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="CONFIRM PASSWORD">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-12">
                                                            <input type="submit" value="Register" class="ms-ua-submit">
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
        </div>
    </section>




@endsection
