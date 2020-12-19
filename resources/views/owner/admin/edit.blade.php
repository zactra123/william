@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN UPDATE" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        <div class="card">
                            <div class="text-center">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="row pt-4 m-2">
                                <a class="btn btn-light"  href="{{route('owner.admin.index')}}">Back</a>
                            </div>

                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.admin.update', $admin->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right admin-form',  'novalidate'=> 'novalidate']) !!}
                                @method('PUT')
                                @csrf
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[first_name]', $admin->first_name, ['class' => 'form-control', 'required']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[last_name]', $admin->last_name, ['class' => 'form-control', 'required']) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::email('admin[email]', $admin->email, ['class' => 'form-control',  'required']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::select('admin[negative_types][]',$negativeType, $admin->adminSpecifications->pluck('id')->all(), ['class' => 'form-control',  'required', 'multiple' => 'multiple']) }}
                                        </div>
                                    </div>
                                </div>
                                @foreach($admin->ipAddress as $value)
                                <div class="form-group row font justify-content-center" id="delete-{{$value->id}}">
                                    <div class="col-md-12 tab-selector">

                                        <div class="col-sm-10 form-group">
                                            {{Form::hidden('admin[ip_address]['.$value->id.'][id]', $value->id)}}
                                            {{ Form::text('admin[ip_address]['.$value->id.'][ip_address]', $value->ip_address, ['class' => 'form-control col-10', 'placeholder'=>'IP ADDRESS']) }}
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input class="remove-ip-address form-control btn btn-block " type="button" data-target={{$value->id}} value="Delete"/>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div id="newIp">
                                </div>
                                <div class="form-group row m-1">
                                    <div class="col-md-2">
                                        <input class="btn btn-block add-ip-address" type="button" value="Add IP"/>

                                    </div>
                                </div>

                                <div class="form-group row mb-0 font">
                                    <div class="col-md-12">
                                        <input type="submit" value="UPDATE" class="ms-ua-submit">
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

