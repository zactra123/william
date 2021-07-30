@extends('owner.layouts.app')
@section('title')
<title>Admin</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('owner.admin.index') }}">Admins</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
    </div>

  </div>


  <div class="container">
    <div class="row row-sm">
        <div class="col-md-12">
          <div class="text-center">
              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
          </div>
        </div>
          <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <a href="{{ route('owner.admin.index') }}"> <h5 class="text-dark"><i class="ti-angle-left"></i> Edit Admin</h5> </a>

                  {!! Form::open(['route' => ['owner.admin.update', $admin->id], 'method' => 'POST', 'class' => 'mt-5 m-form m-form label-align-right admin-form',  'novalidate'=> 'novalidate']) !!}
                  @method('PUT')
                  @csrf
                  <div class="form-group row font">
                    <div class="col-md-6">
                        {{ Form::text('admin[first_name]', $admin->first_name, ['class' => 'form-control', 'placeholder' =>'First Name', 'required']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('admin[last_name]', $admin->last_name, ['class' => 'form-control', 'placeholder'=>'Last Name', 'required']) }}
                    </div>
                  </div>

                  <div class="form-group row font">
                    <div class="col-md-6">
                        {{ Form::email('admin[email]', $admin->email, ['class' => 'form-control','placeholder'=>'Email',  'required']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::select('admin[negative_types][]',$negativeType, $admin->adminSpecifications->pluck('id')->all(), ['class' => 'form-control',  'required', 'multiple' => 'multiple']) }}
                    </div>
                  </div>

                  @foreach($admin->ipAddress as $value)
                  <div class="form-group row font" id="delete-{{$value->id}}">
                    <div class="col-sm-12 col-12 col-md-11 col-lg-11 form-group">
                        {{Form::hidden('admin[ip_address]['.$value->id.'][id]', $value->id)}}
                        {{ Form::text('admin[ip_address]['.$value->id.'][ip_address]', $value->ip_address, ['class' => 'form-control', 'placeholder'=>'IP Address', 'required']) }}
                    </div>
                    <div class="col-sm-12 col-12 col-md-1 col-lg-1 form-group pl-0">
                        <input class="remove-ip-address btn btn-danger " type="button" data-target={{$value->id}} value="Delete"/>
                    </div>
                  </div>
                  @endforeach
                  <div id="newIp">
                  </div>
                  <div class="form-group row">
                      <div class="col-md-2">
                          <input class="btn btn-primary add-ip-address" type="button" value="Add IP"/>
                      </div>
                  </div>

                  <div class="form-group row mb-0 font pull-right">
                      <div class="col-md-12">
                          <input type="submit" class="btn btn-primary" value="Update" class="ms-ua-submit">
                      </div>
                  </div>
                  {!! Form::close() !!}

                </div>
            </div>
          </div>
    </div>
  </div>

@endsection

@section('js')
  <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
  <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
  <script src="{{ asset('js/site/owner/admins.js') }}"></script>
@endsection
