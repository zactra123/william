@extends('layouts.admin')

@section('content')


    {{-- @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"ADD RECEPTIONIST" => "#"]]) --}}

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5"></div>
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="ms-ua-box">

                        <div class="card">



                            @foreach ($errors->all() as $error)

                                <div class="alert alert-danger">{{ $error }}</div>

                            @endforeach
                            <div class="card-header">
                              <div class="row">
                                <div class="col-md-6">
                                  <h4>Create Receptionist</h4>
                                </div>
                                <div class="col-md-6 pull-right">
                                    <a class="btn btn-primary pull-right"  href="{{route('owner.receptionist.index')}}">Back</a>
                                </div>

                              </div>
                            </div>
                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.receptionist.store'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right  admin-form', 'novalidate'=> 'novalidate']) !!}

                                <div class="form-group row font">
                                  <div class="col-md-4">
                                      {{ Form::text('receptionist[first_name]', old('receptionist.first_name'), ['class' => 'form-control', 'placeholder' =>'First Name', 'required']) }}
                                  </div>
                                  <div class="col-md-4">
                                      {{ Form::text('receptionist[last_name]', old('receptionist.last_name'), ['class' => 'form-control', 'placeholder'=>'Last Name', 'required']) }}
                                  </div>
                                  <div class="col-md-4">
                                      {{ Form::email('receptionist[email]', old('receptionist.email'), ['class' => 'form-control','placeholder'=>'Email', 'required']) }}
                                  </div>
                                </div>


                                <div class="form-group row font">

                                </div>

                                <div class="form-group row font">
                                  <div class="col-sm-12 col-md-11 form-group">
                                      {{ Form::text('receptionist[ip_address][]', old('receptionist.ip_address'), ['class' => 'form-control', 'placeholder'=>'IP Address']) }}
                                  </div>
                                  <div class="col-sm-12 col-md-1 form-group pl-0">
                                      <input class="btn btn-primary add-ip-address" type="button" value="Add IP"/>
                                  </div>
                                </div>


                                <div id="newIp">
                                </div>

                                <div class="form-group row mb-0 font pull-right">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary" value="Create Receptionist" class="ms-ua-submit">

                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/owner/receptionists.js') }}"></script>




@endsection
