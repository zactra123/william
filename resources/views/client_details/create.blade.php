@extends('layouts.app')
<style>
    .font {
        font-family: "Times New Roman", Times, serif;
        font-size: large;
    }
</style>
@section('content')
    @if (Session::get('bad'))
        <div >
            <a href="{{route('client.details.edit', Auth::user()->id)}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
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
                            <div class="card-header font"> Upload files </div>

                            <div class="card-body">
                                {!! Form::open(['route'=>['client.details.store'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                                @csrf

                                <div class="form-group row font">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">  Upload Driver License <br> or Identification card</label>

                                    <div class="col-md-6 font">
                                        {{ Form::file('driver_license') }}

                                    </div>
                                </div>

                                <div class="form-group row font">
                                    <label for="password" class="col-md-4 col-form-label text-md-right font"> Upload Social security  </label>

                                    <div class="col-md-6 font">
                                        {{ Form::file('social_security') }}
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('INPUT[type="file"]').change(function () {
            var ext = this.value.match(/\.(.+)$/)[1];
            console.log(ext);
            switch (ext) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                case 'pdf':
                case 'JPG':
                case 'JPEG':
                case 'PDF':
                    $('#uploadButton').attr('disabled', false);
                    break;
                default:
                    alert('This is not an allowed file type.');
                    this.value = '';
            }
        });
    })
</script>








