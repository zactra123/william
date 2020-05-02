<div class="card">
    @if(Session::get('bad'))
        <?php Session::forget('bad');?>
    <div class="text-danger text-center">
        <p>
            Some data can't be picked by script from your uploaded documents:
        </p>
    </div>
    @endif
    <div class=" text-center">
        <p> Please be careful on uploading your documents.
            <a class="text-primary font-italic" data-toggle="modal" data-target="#correct_form">See correct image examples</a>
        </p>
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
{{--    if both documents are uploaded--}}
    @if( $client->clientAttachments->whereIn("category", ["DL","SS"])->count() == 2)
        <p class="text-right">If you sure that your uploaded documents are readable you can
            <a class="text-info" href="{{route("registration_steps",["skip"=>true])}}">skip this step <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </p>
    @endif
</div>


<div class="modal fad" id="correct_form" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel">Document Correct Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> </button>
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
