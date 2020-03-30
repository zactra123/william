@extends('layouts.client')
<style>
    .tab-selector {
        background-color:  #0c71c3;
        /*border-color:#1a41ad;*/
        color: #FFFFFF;
        font-size: large;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
    .tab-selector:hover{
        background-color: #FFFFFF;
        color:#0c71c3;
    }

    .tab-selector.active {
        background-color:  #FFFFFF;
        color:#0c71c3;
    }
    .card-header{
        padding: 0 !important;
        border-bottom: none;
    }
    .pdf-upload{
        display: none
    }
    .pdf-upload.active{
        display: block;
    }

    .btn-uploadBtn{
        background-color:  #0c71c3;
        color: #FFFFFF;
        font-family: "Times New Roman";
        font-size: large;        }

</style>

@section('content')
    @if (Session::get('bad'))
        <div >
            <a href="{{route('client.details.edit', Auth::user()->id)}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                Skip,  go to the next step
            </a>


        </div>
    @endif

    <div class="fullwidth-block">
        <div class="row justify-content-center"  >
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="w-100 btn-group btn-group-toggle">
                                <div class="head m-2"> <h1>Please upload your document</h1> </div>

                            </div>
                        </div>

                        <div class="card-body">
                            {!! Form::open(['route'=>['client.storeDriverSocial'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}

                            @csrf
                            <div class="pdf-upload karma-tab active">

                                <div class="form-group files">
                                    <label>Upload Your Driver License or Identification card </label>
                                    <input type="file" name="driver_license" class="form-control" multiple="">
                                </div>
                            </div>

                            <div class="pdf-upload karma-tab active">

                                <div class="form-group files">
                                    <label>Upload Your Social Security </label>
                                    <input type="file" name="social_security" class="form-control" multiple="">
                                </div>
                            </div>


                            <div class="form-group row mb-0 font">
                                <div class="col-md-8 offset-md-5">
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




    {{--<div class="page-content">--}}
        {{--<div class="fullwidth-block fullhight-block">--}}

            {{--<div class="container">--}}
                {{--<div class="row justify-content-center">--}}
                    {{--<div class="col-md-8">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-header">--}}
                                {{--<div class="head m-2"> Please upload your documentс </div>--}}
                            {{--</div>--}}

                            {{--<div class="card-body">--}}
                                {{--{!! Form::open(['route'=>['client.storeDriverSocial'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}--}}
                                {{--@csrf--}}



                                {{--<div class="form-group row font">--}}
                                    {{--<label for="email" class="col-md-4 col-form-label text-md-right">  Upload Driver License <br> or Identification card</label>--}}

                                    {{--<div class="col-md-12 font">--}}
                                        {{--{{ Form::file('driver_license', ['class' => 'form-control',  'placeholder' => 'Upload Driver License or Identification card']) }}--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group row font">--}}
                                    {{--<label for="password" class="col-md-4 col-form-label text-md-right font"> Upload Social security  </label>--}}

                                    {{--<div class="col-md-12 font">--}}
                                        {{--{{ Form::file('social_security', ['class' => 'form-control ssn', 'id'=>'ssn', 'placeholder' => 'Social Security']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}



                                {{--<div class="form-group row mb-0 font">--}}
                                    {{--<div class="col-md-12 offset-md-5">--}}
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--Upload--}}
                                        {{--</button>--}}


                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}




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














