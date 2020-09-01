@extends('layouts.layout')
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
    .bank_logo_class {
        display: block;
        background-size: 80%;
        background-repeat: no-repeat;
        background-position: center;
    }

    .bank_logo_class:after {  pointer-events: none;
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
    .bank_logo_class:before {
        position: absolute;
        bottom: 0px;
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

    .bank_logo_dropp {
        display: block;
        background-size: 80%;
        background-repeat: no-repeat;
        background-position: center;
    }
    .bank_logo_dropp:before {
        position: absolute;
        bottom: 0px;
        left: 0;  pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: "BANK LOGO ATTACHED ";
        display: block;
        margin: 0 auto;
        color: #341d31;
        font-weight: 900;
        font-size: 20px;
        text-transform: capitalize;
        text-align: center;
    }


    .drag-over{
        background-color: #2196f3;
    }

    button, input {
        font-size: 25px;
        font-weight: 900;
    }
</style>
@section('content')

    @include('helpers.breadcrumbs', ['title'=> "BANK ADDRESS", 'route' => ["Home"=> '/owner',"CLIENTS LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                {!! Form::open(['route'=>['owner.bank.store'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "doc_sunb"]) !!}
                                @csrf
                                <div class="card-header">
                                    <div class="row " style="margin-top: 40px">
                                        <div class="col-sm-4 form-group files">
                                             <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >
                                        </div>

                                    </div>
                                    <div class="row m-2">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="BANK NAME">
                                        </div>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">TYPE</th>
                                            <th class="col-md-4">STREET</th>
                                            <th class="col-md-2">CITY</th>
                                            <th class="col-md-1">STATE</th>
                                            <th class="col-md-2">ZIP</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Dispute</th>
                                                <td><input type="text" name="dis[street]" class="form-control"></td>
                                                <td><input type="text" name="dis[city]" class="form-control"></td>
                                                <td><input type="text" name="dis[state]" class="form-control"></td>
                                                <td><input type="text" name="dis[zip]"  class="form-control"></td>

                                            </tr>
                                            <tr>
                                                    <th>EXECUTIVE OFFICE</th>
                                                <td><input type="text" name="ex[street]" class="form-control"></td>
                                                <td><input type="text" name="ex[city]" class="form-control"></td>
                                                <td><input type="text" name="ex[state]" class="form-control"></td>
                                                <td><input type="text" name="ex[zip]"  class="form-control"></td>
                                            </tr>
                                            <tr>
                                                    <th>GOVERNING ADOREE</th>
                                                <td><input type="text" name="gv[street]" class="form-control"></td>
                                                <td><input type="text" name="gv[city]" class="form-control"></td>
                                                <td><input type="text" name="gv[state]" class="form-control"></td>
                                                <td><input type="text" name="gv[zip]"  class="form-control"></td>
                                            </tr>
                                            <tr>
                                                    <th>LEGAL DEPARTMENT</th>
                                                <td><input type="text" name="lg[street]"  class="form-control"></td>
                                                <td><input type="text" name="lg[city]" class="form-control"></td>
                                                <td><input type="text" name="lg[state]"  class="form-control"></td>
                                                <td><input type="text" name="lg[zip]"  class="form-control"></td>
                                            </tr>
                                            <tr>
                                                    <th>PROCESS SERVER</th>
                                                <td><input type="text" name="ps[street]"   class="form-control"></td>
                                                <td><input type="text" name="ps[city]" class="form-control"></td>
                                                <td><input type="text" name="ps[state]" class="form-control"></td>
                                                <td><input type="text" name="ps[zip]"  class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="form-group row font justify-content-center">
                                        <div class="col-md-12 tab-selector">
                                            <div class="col-sm-5 form-group">
                                                {{ Form::text('phone[type][]', old('admin.phone_type'), ['class' => 'form-control', 'placeholder'=>'PHONE TYPE'])}}
                                            </div>
                                            <div class="col-sm-5 form-group">
                                                {{ Form::text('phone[number][]ba', old('admin.phone_number'), ['class' => 'form-control phone', 'placeholder'=>'PHONE NUMBER']) }}
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <input class="btn btn-primary add-ip-address" type="button" value="Add"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newIp">
                                    </div>
                                    <div class="form-group row mb-0 font">
                                        <div class="col-md-offset-5">
                                            <button type="submit" class="btn btn-primary">
                                                ADD BANK INFO
                                            </button>
                                        </div>
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
            $('#phone_number').mask('(000) 000-0000');

            var i=0;

            $(".add-ip-address").on('click', function(){
                i++
                console.log('dasdasd')
                var newDiv = "<div class='form-group row font justify-content-center' id='delete-"+i+"'>"
                var newDiv = newDiv + "<div class='col-md-12 tab-selector'><div class='col-sm-5 form-group'>"
                var addIp = "<input type='text' name=phone[type][] class = 'form-control' placeholder = 'PHONE TYPE'> </div>" +
                    "<div class='col-sm-5 form-group'><input type='text' name=phone[number][] class = 'form-control phone_number' placeholder = 'PHONE NUMBER'></div>"
                addIp +=  '<div class="col-sm-2 form-group"> <input class="delete-phone btn btn-primary" type="button" data-target="'+i+'" value="Delete"/></div>'
                newDiv += addIp + "</div></div>";
                $("#newIp").append(newDiv);

            })

            $(document).delegate('.delete-phone', 'click', function(){
                var  deleteId = $(this).attr("data-target")
                console.log(deleteId)
                $( "div" ).remove( '#delete-'+deleteId );

            });




            $("#bank_logo").change(function(e) {
                $(this).removeClass('driver_license')

                $(this).removeClass('bank_logo_dropp')
                var file = e.target.files[0]
                if(file.type == "application/pdf"){
                    $(this).addClass('bank_logo_dropp')
                    // $(".driver_dropp").css('background-image', 'url("/images/pdf_icon.png")');
                }else{
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $(".bank_logo_dropp").css('background-image','url('+ event.target.result +')');
                    }
                    reader.readAsDataURL(file);
                }

                $(this).removeClass('bank_logo_class')
                $(this).addClass('bank_logo_dropp')
                // $(".driver_dropp").css('background-image',file)
            });



            $('.bank_logo_class').bind('dragover', function(){
                console.log('xxx')
                $(this).addClass('drag-over');
            });
            $('.bank_logo_class').bind('dragleave', function(){
                $(this).removeClass('drag-over');
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


@endsection



