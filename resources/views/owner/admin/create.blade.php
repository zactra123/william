@extends('layouts.layout')

@section('content')


    @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN CREATE" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                </div>
                                <div class="row " style="margin: 10px">
                                    <a class="btn btn-light"  href="{{route('owner.admin.index')}}">Back</a>
                                </div>
                            </div>

                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.admin.store'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right admin-form', 'novalidate'=> 'novalidate']) !!}

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[first_name]', old('admin.first_name'), ['class' => 'form-control', 'placeholder' =>'FIRST NAME','required']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[last_name]', old('admin.last_name'), ['class' => 'form-control', 'placeholder'=>'LAST NAME', 'required']) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::email('admin[email]', old('admin.email'), ['class' => 'form-control','placeholder'=>'E-MAIL',  'required'=>"email"]) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::select('admin[negative_types][]',$negativeType, old('admin.negative_types'), ['class' => 'form-control',  'required autocomplete'=>"negative_types", 'multiple' => 'multiple']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">
                                        <div class="col-md-10 form-group">
                                            {{ Form::text('admin[ip_address][][ip_address]', old('admin.ip_address'), ['class' => 'form-control ip-address', 'placeholder'=>'IP ADDRESS']) }}
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input class="btn btn-block add-ip-address" type="button" value="Add"/>
                                        </div>
                                    </div>
                                </div>


                                    <div id="newIp">
                                    </div>

                                <div class="form-group row font">
                                    <div class="col-md-12 tab-selector">
                                        <input type="submit" value="ADD ADMIN" class="ms-ua-submit">
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
    <script src="{{ asset('js/site/owner/admins.js') }}"></script>

@endsection


