@extends('layouts.client')


@section('content')


    <div class="page-content">
        <div class="fullwidth-block fullhight-block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header font"> Upload files </div>

                            <div class="card-body">
                                {!! Form::open(['route'=>['client.upload.pdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                                @csrf

                                <div class="form-group files">
                                    <label>Upload Your File </label>
                                    <input type="file" class="form-control" multiple="">
                                </div>
{{--                                <div class="form-group row font">--}}
{{--                                    <label for="email" class="col-md-4 col-form-label text-md-right">  Upload your credit report </label>--}}

{{--                                    <div class="col-md-6 font">--}}
{{--                                        {{ Form::file('credit_report') }}--}}

{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class="form-group row mb-0 font">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Upload
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


@endsection