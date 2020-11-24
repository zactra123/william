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
    .driver_license:after, .social_security:after {  pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 70px;
        right: 0;
        height: 76px;
        content: "";
        background-image: url(/images/upload.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .driver_license:before, .social_security:before {
        position: absolute;
        bottom: 50px;
        left: 0;  pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: "choose or drag it here. ";
        display: block;
        margin: 0 auto;
        color: #341d31;
        font-weight: 900;
        font-size: 20px;
        text-transform: capitalize;
        text-align: center;
    }

    .driver_dropp, .social_dropp {
        display: block;
        background-size: 80%;
        background-repeat: no-repeat;
        background-position: center;
    }
    .driver_dropp:before {
        position: absolute;
        bottom: 0px;
        left: 0;  pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: "ID IS ATTACHED ";
        display: block;
        margin: 0 auto;
        color: #341d31;
        font-weight: 900;
        font-size: 20px;
        text-transform: capitalize;
        text-align: center;
    }
    .social_dropp:before {
        position: absolute;
        bottom: 0px;
        left: 0;  pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: "SSC IS ATTACHED";
        display: block;
        margin: 0 auto;
        color: #341d31;
        font-weight: 900;
        font-size: 20px;
        text-transform: capitalize;
        text-align: center;
    }

    .pdf_icon{
        background-image: url(/images/pdf_icon.png);

    }
    .drag-over{
        background-color: #2196f3;
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
            <label title="Upload Your Driver License or Identification card">
                Upload Your Driver License or Identification card
            </label>
            <input class="driver_license file-box" type="file" name="driver_license"  id="driver_license">

            {!! $errors->first('driver_license', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-sm-6 form-group files">
            <label title="Upload Your Social Security">
                Upload Your Social Security
            </label>
            <input class="social_security file-box" type="file" name="social_security"  id="social_security" >
            {!! $errors->first('social_security', '<p class="help-block">:message</p>') !!}

        </div>


    </div>
    <div class="col"><input type="submit" value="Upload" class="ms-ua-submit"></div>

{!! Form::close() !!}
<canvas class="hidden" id="pdfViewer"></canvas>

{{--    if both documents are uploaded--}}
@if( $client->clientAttachments->whereIn("category", ["DL","SS"])->count() == 2)
    <p class="text-right">If you sure that your uploaded documents are readable you can
        <a class="text-info" href="{{route("registration_steps",["skip"=>true])}}">skip this step <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </p>
@endif

<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>

<script>
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

    $(".file-box").on("change", function(e){
        var file = e.target.files[0]
        var _this = this
        if(file.type == "application/pdf"){
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                var loadingTask = pdfjsLib.getDocument({data: pdfData});
                loadingTask.promise.then(function(pdf) {
                    console.log('PDF loaded');

                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        console.log('Page loaded');

                        var scale = 1.5;
                        var viewport = page.getViewport({scale: scale});

                        // Prepare canvas using PDF page dimensions
                        var canvas = $("#pdfViewer")[0];
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;
                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function () {
                            // console.log(canvas.toDataURL("image/png", 0.8))
                            $(_this).css('background-image', 'url("'+ $('#pdfViewer').get(0).toDataURL("image/jpeg", 0.8) +'")');
                            $(_this).css('background-size', '200px');

                        });
                    });
                }, function (reason) {
                    console.error(reason);
                });
            };
            fileReader.readAsArrayBuffer(file);
        }
    });

    $(document).ready(function () {

        $.validator.addMethod('filesize', function (value, element) {
            if(element.files[0].type == "application/pdf"){
                return this.optional(element) || (element.files[0].size <= 1048576)
            }else{
                return this.optional(element) || (element.files[0].size <= 10485760)
            }

        }, 'File size must be less than 1mb');

        $("#doc_sunb").validate({
            rules: {
                "social_security": {
                    required:true,
                    filesize : 1073741824,
                },
                "driver_license": {
                    required:true,
                    filesize : true,
                },
            },

            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            }
        })

        $("#driver_license").change(function(e) {
            $(this).removeClass('driver_license')

            $(this).removeClass('driver_dropp')
            var file = e.target.files[0]
            if(file.type == "application/pdf"){
                $(this).addClass('driver_dropp')
                // $(".driver_dropp").css('background-image', 'url("/images/pdf_icon.png")');
            }else{
                var reader = new FileReader();

                reader.onload = function(event) {
                    $(".driver_dropp").css('background-image','url('+ event.target.result +')');
                }
                reader.readAsDataURL(file);
            }

            $(this).removeClass('driver_license');
            $(this).addClass('driver_dropp');
        });

        $("#social_security").change(function(e) {
            $(this).removeClass('social_dropp')
            var file = e.target.files[0]

            if(file.type == "application/pdf"){
                $(this).addClass('socia_dropp')
            }else{
                var reader = new FileReader();

                reader.onload = function(event) {
                    $(".social_dropp").css('background-image','url('+ event.target.result +')');
                }
                reader.readAsDataURL(file);
            }
            $(this).removeClass('social_security')
            $(this).addClass('social_dropp')
        });

        $('.driver_license').bind('dragover', function(){
            console.log('xxx')
            $(this).addClass('drag-over');
        });
        $('.driver_license').bind('dragleave', function(){
            $(this).removeClass('drag-over');
        });
        $('.social_security').bind('dragover', function(){
            $(this).addClass('drag-over');
        });
        $('.social_security').bind('dragleave', function(){
            $(this).removeClass('drag-over');
        });


        //
        $("#doc_sunb").submit(function( event ) {
            if($('#doc_sunb').valid()){
                $('#preloader').css('background-color', 'transparent');
                $('#preloader').show()
            }
        });



        //on submit
        $('#correct_form').modal('show');
        $('.document-form').click(function(){
            $('#correct_form').modal('show');
        });
        $('input[type="file"]').change(function () {
            var ext = this.value.split('.').pop();
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
