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
                    <button class="document-form btn btn-success m-2"> Show Correct Form Document</button>
                    <div class="card">
                        <div class="card-header">

                            <div class="w-100 btn-group btn-group-toggle">
                                <div class="head m-2">
                                    <h1>Please upload your document</h1>
                                </div>
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
                                    <input type="file" name="social_security" class="m-form m-form--label-align-right" multiple="">
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

    <div class="modal fad" id="correct_form" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="favoritesModalLabel">Document Correct form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Close</span> </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-justify font-weight-bold"> Incorrect form upload  Driver License or Identification Card</p>
                        </div>
                        <div class="col-6">
                            <p class="text-justify font-weight-bold">Correct form upload  Driver License or Identification Card</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <img class="m-1" src="{{asset('/images/incorrect-dl.png')}}" width="100%" >
                        </div>
                        <div class="col-6">
                            <img class="m-1" src="{{asset('/images/correct-dl.png')}}"  width="100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="text-justify font-weight-bold"> Incorrect form upload Social Security</p>
                        </div>
                        <div class="col-6">
                            <p class="text-justify font-weight-bold">Correct form upload  Social Security</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <img class="m-1" src="{{asset('/images/incorrect-ss.png')}}"  width="100%">
                        </div>
                        <div class="col-6">
                            <img  class="m-1" src="{{asset('/images/correct-ss.png')}}"  width="100%">
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

        $('#correct_form').modal('show');
        $('.document-form').click(function(){
            $('#correct_form').modal('show');
        });
        $('INPUT[type="file"]').change(function () {
            var ext = this.value.match(/\.(.+)$/)[1];
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
                    alert('Please Upload valid document in selected format(jpeg/png/pdf)');
                    this.value = '';
            }
        });
    })
</script>














