@extends('layouts.admin')

@section('content')

    {{-- @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN UPDATE" => "#"]]) --}}

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5"></div>
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="ms-ua-box">
                      <div class="text-center">
                          @foreach ($errors->all() as $error)
                              <div class="alert alert-danger">{{ $error }}</div>
                          @endforeach
                      </div>
                        <div class="card">

                            <div class="card-header">
                              <div class="row ">
                                  <div class="col-md-6">
                                    <h4>Edit Admin</h4>
                                  </div>
                                  <div class="col-md-6 pull-right">
                                    <a class="btn btn-primary pull-right"  href="{{route('owner.admin.index')}}">Back</a>
                                  </div>
                              </div>
                            </div>

                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.admin.update', $admin->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right admin-form',  'novalidate'=> 'novalidate']) !!}
                                @method('PUT')
                                @csrf
                                <div class="form-group row font">
                                  <div class="col-md-6">
                                      {{ Form::text('admin[first_name]', $admin->first_name, ['class' => 'form-control', 'required']) }}
                                  </div>
                                  <div class="col-md-6">
                                      {{ Form::text('admin[last_name]', $admin->last_name, ['class' => 'form-control', 'required']) }}
                                  </div>
                                </div>

                                <div class="form-group row font">
                                  <div class="col-md-6">
                                      {{ Form::email('admin[email]', $admin->email, ['class' => 'form-control',  'required']) }}
                                  </div>
                                  <div class="col-md-6">
                                      {{ Form::select('admin[negative_types][]',$negativeType, $admin->adminSpecifications->pluck('id')->all(), ['class' => 'form-control',  'required', 'multiple' => 'multiple']) }}
                                  </div>
                                </div>

                                @foreach($admin->ipAddress as $value)
                                <div class="form-group row font" id="delete-{{$value->id}}">
                                  <div class="col-sm-12 col-12 col-md-11 col-lg-11 form-group">
                                      {{Form::hidden('admin[ip_address]['.$value->id.'][id]', $value->id)}}
                                      {{ Form::text('admin[ip_address]['.$value->id.'][ip_address]', $value->ip_address, ['class' => 'form-control', 'placeholder'=>'IP ADDRESS']) }}
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
        </div>
    </section>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/owner/admins.js') }}"></script>

@endsection
