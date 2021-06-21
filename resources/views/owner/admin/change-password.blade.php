@extends('layouts.admin')

@section('content')

    <style>
        .pass_show{position: relative}

        .pass_show .ptxt {

            position: absolute;
            top: 50%;
            right: 10px;
            z-index: 1;
            color: black;
            font-weight: bold;
            margin-top: -10px;
            cursor: pointer;
            transition: .3s ease all;
        }

        .pass_show .ptxt:hover{color: #333333;}
    </style>
    {{-- <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Change Password</span> --}}




    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Reset Password</h2>
        </div>
    </section>



    <section class="ms-user-account">
        <div class="container">
            <div class="row">

              <div class="col-md-3 col-sm-12 mt-5"></div>
              <div class="col-md-6 mt-5">
                @if ($errors->any())

                    <div class="alert alert-danger flash">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @foreach($errors->all()  as $message)
                            <strong>{{ $message }}</strong>
                        @endforeach
                    </div>
                @endif
                <div class="ms-ua-box">
                  <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-6">
                          <h4>Reset Password</h4>
                        </div>
                        <div class="col-md-6 pull-right">
                          <a class="btn btn-primary pull-right"  href="{{route('owner.admin.index')}}">Back</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="ms-ua-form">
                          {!! Form::open(['route'=>['owner.admin.changePassword', $admin->id],'method' => 'POST', "id"=>"change-password"]) !!}
                          @method('PUT')
                          @csrf

                              <div class="form-group pass_show">
                                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="current-password" data-toggle="password">

                              </div>

                              <div class="form-group">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-block" value="Change Password" class="ms-ua-submit">
                                </div>
                              </div>
                          {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
        </div>
    </section>

    <script type="text/javascript">

        $(document).ready(function(){
            $('.pass_show').append('<span class="ptxt"><i class="fa fa-eye"></span>');
        });

        $(document).on('click','.pass_show .ptxt', function(){

            $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

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
