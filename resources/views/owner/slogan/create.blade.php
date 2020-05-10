@extends('layouts.layout')


@section('content')

    @include('helpers.breadcrumbs', ['title'=> "SLOGAN", 'route' => ["Home"=> '/owner',"ADD SLOGAN" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Add Slogan</h2>
                                    {!! Form::open(['route' => ['owner.slogans.store'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                                    @csrf
                                    <div class="form-group row font">
                                        {{ Form::text('slogan[author]', old('slogan.author'), ['class' => 'form-control m-input', 'placeholder' => 'Title']) }}
                                    </div>
                                    <div class="form-group row font">
                                        {{ Form::textarea('slogan[slogan]', old('slogan.slogan'), ['class' => 'form-control m-input', 'placeholder' => 'Sub Content']) }}
                                    </div>
                                    <div class="form-group row mb-0 font">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Add Slogan
                                            </button>
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


@endsection











