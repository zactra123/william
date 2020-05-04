<style>
    .form-group label{
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
    @media (max-width: 576px) {
        .form-group label{
            white-space: inherit;
        }
        .files:after {
            top: 80px;
        }
    }
    .driver_license {
        background-image: url(/images/correct-dl.png);
        display: block;
        background-size: 80%;
        background-repeat: no-repeat;
        background-position: center;

    }
    .social_security {

        background-image: url(/images/correct-ss.png);
        display: block;
        background-size: 80%;
        background-repeat: no-repeat;
        background-position: center;

    }
    button, input {
        font-size: 25px;
        font-weight: 900;
    }
</style>
@if(Session::get('bad'))
    <?php Session::forget('bad');?>
<div class="text-danger text-center">
    <p>
        Some data can't be picked by script from your uploaded documents:
    </p>
</div>
@endif


<div class="row">
    <div class="col-md-12 m-0">
         <h3 style="text-align: center;font-weight: 900">Incorrect</h3>
        <div class="col-md-6 justify-content-center" style="margin-bottom: 10px; text-align: center">
            <img class="m-1" src="{{asset('/images/incorrect-dl.png')}}" width="75%" >
        </div>
        <div class="col-md-6 text-md-center" style="text-align: center">
            <img  src="{{asset('/images/incorrect-ss.png')}}"  width="75%">
        </div>
    </div>
</div>
{!! Form::open(['route'=>['client.storeDriverSocial'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "doc_sunb"]) !!}

    @csrf
    <div class="pdf-upload karma-tab active">
        <div class="col-sm-6 form-group files">
            <label title="Upload Your Driver License or Identification card" style="text-align: center;font-weight: 900; font-size: 16px">
                Upload Your Driver License or Identification card
            </label>
            <input class="driver_license" type="file" name="driver_license"  class="driver_license">
        </div>
        <div class="col-sm-6 form-group files">
            <label title="Upload Your Social Security">
                Upload Your Social Security
            </label>
            <input class="social_security" type="file" name="social_security">
        </div>
    </div>
    <div class="col"><input type="submit" value="Upload" class="ms-ua-submit"></div>
{!! Form::close() !!}


{{--    if both documents are uploaded--}}
@if( $client->clientAttachments->whereIn("category", ["DL","SS"])->count() == 2)
    <p class="text-right">If you sure that your uploaded documents are readable you can
        <a class="text-info" href="{{route("registration_steps",["skip"=>true])}}">skip this step <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </p>
@endif



<script>
    $(document).ready(function () {

        $("#doc_sunb").submit(function( event ) {
            $('#preloader').css('background-color', 'transparent');
            $('#preloader').show()
        });

        //on submit
        // $('#preloader').css('background-color', 'transparent');
        // $('#preloader').show()
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
