@extends('layouts.affiliate')


@section('content')
    @if (Session::get('bad'))
        <div >
            <a href="{{route('affiliate.editClientDetails', $clientId)}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                Skip,  go to the next step
            </a>


        </div>
    @endif

    <div class="page-content">
        <div class="fullwidth-block fullhight-block">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-4"> Please upload client document </div>

                            <div class="card-body">
                                {!! Form::open(['route'=>['affiliate.storeDLSS', $clientId],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                                @csrf

                                <div class="pdf-upload karma-tab active">

                                    <div class="form-group files">
                                        <label>Upload Client Driver License or Identification card </label>
                                        <input type="file" name="driver_license" class="form-control" multiple="">
                                    </div>
                                </div>

                                <div class="pdf-upload karma-tab active">

                                    <div class="form-group files">
                                        <label>Upload Client Social Security </label>
                                        <input type="file" name="social_security" class="form-control" multiple="">
                                    </div>
                                </div>


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











