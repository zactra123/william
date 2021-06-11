@extends('layouts.layout1')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
    {{-- <link href="{{asset('css/client/profile.css')}}" rel="stylesheet" type="text/css"> --}}

    <section class="section-padding">
    </section>
        <div class="row m-0">
            <div class="col-sm-3">
                <aside class="side-nav" id="show-side-navigation1">
                    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
                    <div class="heading">
                        <div class="row" >
                            <div class="info">
                                <h6>Client No: 01</h6>
                            </div>
                        </div>


                        <div class="row" >
                            <div class="col-l-12 m-0">
                                <a href="#" class="link closeUpload fs-11" >
                                    UPLOAD NEW ID OR SOCIAL SECURITY
                                </a>
                            </div>
                        </div>

                        <div class="row  hide form-group updateLogo mb-5 pb-5">
                            <button type="button" class="close closeUpload">
                                {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                            {!! Form::open(['route'=>['client.updateDriver'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => ' m-form m-form--label-align-right', "id" => "doc_sunb"]) !!}
                            @method("PUT")
                            @csrf


                            <div class="col-sm-12 form-group files mt-3">
                                {{--                            <input class="bank_logo file-box" type="file" name="driver"  id="bank_logo" >--}}
                                <input class="driver_license file-box" class="custom-file-input" id="inputGroupFile01" type="file" name="driver"  id="driver_license">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Driver License</label>
                            </div>
                            <div class="col-sm-12 form-group files">
                                <input class="social_security file-box" class="custom-file-input" id="inputGroupFile02" type="file" name="social"  id="social_security" >
                                <label class="custom-file-label" for="inputGroupFile02">Choose Social Security </label>
                            </div>
                            <div class="col-sm-12 pl-0"><input type="submit" value="Upload" class="btn btn-info ms-ua-submit"></div>

                            {!! Form::close() !!}
                        </div>

                        <div class="info zoomIn">
                        </div>

                    </div>
                    <ul class="categories">
                        <li title="FULL NAME" class="dl-field">

                        @if(!empty($client->clientAttachments()))
                                <?php $dl = $client->clientAttachments()->where('category', "DL")->first(); ?>
                                @if(!empty($dl))
                                    <img type="file" class="zoomDL responsive hide" src="{{asset($dl->path)}}"   name="img-drvl" id="img-drvl"/>
                                @endif
                        @endif
                            <img  class="responsive full_name" width="20px" width="20px" src="{{ asset('/') }}images/full_name.png">
                            <a href="#"><span class="fs-15">{{$client->full_name()}}</span></a>
                        </li>
                        <li title="PHONE NUMBER">
                            <img  class="responsive" width="20px" src="{{ asset('/') }}images/phone_number.png">
                            <a href="tell:{{$client->clientDetails->phone_number}}"> <span class="fs-15">{{$client->clientDetails->phone_number}}</span> </a>
                        </li>
                        <li title="EMAIL ADDRESS">
                            <img  class="responsive" width="20px" src="{{ asset('/') }}images/email.png">
                            <a href="mailto:{{$client->email}}"> <span class="fs-15">{{ $client->email }}</span> </a>
                        </li>
                        <li title="FULL ADDRESS">
                            <div class="address">
                                <div class="address1">
                                    <img  class="addressImage" width="20px" src="{{ asset('/') }}images/location.png">
                                      <span class="fs-15">{{$client->clientDetails->number}} {{$client->clientDetails->name}}</span>
                                      <span class="fs-15">{{$client->clientDetails->city}}, {{$client->clientDetails->state}} {{$client->clientDetails->zip}}</span>
                                </div>

                            </div>
                        </li>

                        <li title="DATE OF BIRTH">
                            <img  class="responsive" width="20px" src="{{ asset('/') }}images/birthday.png">
                            <span class="fs-15">{{date("m/d/Y", strtotime($client->clientDetails->dob))}}</span>
                            <img width="20px" src="{{ asset('/') }}images/age.jpg" class="responsive small ml-2"> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}
                        </li>
                        <li title="SOCIAL SECURITY NUMBER" class="ssn-field">

                            @if(!empty($client->clientAttachments()))
                                <?php $ss = $client->clientAttachments()->where('category', "SS")->first(); ?>
                                {{-- @if(!empty($ss))
                                    <img type="file"  class="zoomSS responsive hide" src="{{asset($ss->path)}}" name="img-sos" id="img-sose" />
                                @endif --}}
                            @endif
                            <img  class="responsive ss_number" width="20px" src="{{ asset('/') }}images/ssc.png">

                            <span class="fs-15">{{$client->clientDetails->ssn}}</span>
                        </li>

                        <li title="GENDER">
                            @if($client->clientDetails->sex == 'M')
                                <img  class="responsive" width="20px" src="{{ asset('/') }}images/male.png"> <span class="fs-15">MALE</span>
                            @elseif($client->clientDetails->sex == 'F')
                                <img class="responsive"  width="20px" src="{{ asset('/') }}images/female.png"> <span class="fs-15">FEMALE</span>
                            @else
                                <img class="responsive" width="20px" src="{{ asset('/') }}images/non_binary.png"> <span class="fs-15">NON-BINARY</span>
                            @endif
                        </li>

                        @if($client->clientDetails->referred_by != null)
                            <li title="REFERRED BY">
                                <i class="fa fa-user fa-fw refferred" ></i>
                                <span class="fs-15">{{strtoupper($client->clientDetails->referred_by)}}</span>
                            </li>
                        @endif
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white"><i class="fa fa-pencil-square-o  fa-fw"></i> Edit Profile</a></li>
                    </ul>
                </aside>
            </div>

            <div class="col-sm-9">
                <section id="contents">
                    <div class="welcome">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content">
                                        <h2>Welcome to Dashboard</h2>
                                        {{-- @if(!$client->credentials->is_present()) --}}
                                            <p>
                                                Please provide us your credentials, so we can fetch your report.
                                                You can provide them
                                                <a href="{{route("client.credentials")}}">here</a>.
                                            </p>
                                        {{-- @elseif(!$client->reports->first())
                                            <p>We are trying to fetch your report data. As it can take some time, we'll notify you once it is done.</p>
                                        @else
                                            <p>We've already got your report data,
                                                you can start disputes
                                                <a href="#">here</a>.
                                            </p>
                                        @endif --}}

                                    @if(!empty($requiredInfo))
                                            <h3>Please complete required data information are starting your dispute process!!!</h3>
                                    @endif

                                    @foreach($requiredInfo as $info)
                                            <a class="btn btn-toolbar" href="{{route('client.complete.requireInfo', $info->id)}}">{{$info->disputable->showDetails()}}</a>
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="charts">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="chart-container scrollDiv clientprofile-dispute-height">
                                        <div class="boxheading">
                                            <h3>DISPUTES </h3>
                                        </div>
                                        <div class="mt20 ">

                                            @foreach($toDos as $todo)
                                                @foreach($todo->disputes as $dispute)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?php $info =  $dispute->disputable->showDetails();?>
                                                            {{$info}}
                                                        </div>
                                                        <div class="col-md-6">
                                                            {{$status[$dispute->status]}}

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart-container">
                                        <div class="boxheading">
                                            <h3>DISPUTE PROGRESS</h3>
                                        </div>
                                        <div id="piechart_3d" style="width: 400px; height: 240px;"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="charts">
                        <div class="container-fluid">
                            <div class="chart-container">
                                <div class="content">
                                    <h2>CREDIT REPORTS</h2>

                                    <div class="row">
                                        <div  class="col-md-3">
                                            <div class="dropdown">
{{--                                                <a href="{{route('client.report', ['type'=>"equifax"])}}">  <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>--}}
                                                <img class="report_access"src="{{asset('images/report_access/eq_logo_2.png')}}"  width="70%">
                                                <div class="dropdown-content equifax">
                                                    <a href="https://my.equifax.com/membercenter/#/login" target="_blank">LOGIN</a>
                                                    <a href="{{route('client.credentials',['source'=> 'equifax'])}}">CREDENTIALS</a>
                                                    <a href="#" target="_blank">REGISTER</a>
                                                    <a href="#">ARCHIVE</a>
                                                    @foreach($reportsDateEQ as $keyEq=> $eqDate)
                                                        <a href="{{route('client.report', ['type'=>"equifax", 'date'=>$keyEq])}}">{{date("m/d/Y",strtotime($eqDate))}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="col-md-3">
                                            <div class="dropdown">
{{--                                                <a href="{{route('client.report', ['type'=>"experian"])}}"> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>--}}
                                                <img class="report_access"src="{{asset('images/report_access/ex_logo_2.png')}}"   width="70%">
                                                <div class="dropdown-content experina">
                                                    <a href="https://usa.experian.com/login/index" target="_blank">LOGIN</a>
                                                    <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">REGISTER</a>
                                                    <a href="{{route('client.credentials',['source'=> 'experian'])}}">CREDENTIALS</a>
                                                    <a href="#">ARCHIVE</a>

                                                    @foreach($reportsDateEX as $keyEx => $exDate)
                                                        <a href="{{route('client.report', ['type'=>"experian", 'date'=>$keyEx])}}">{{date("m/d/Y",strtotime($exDate))}}</a>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                        <div  class="col-md-3">
                                            <div class="dropdown ">
{{--                                                <a  href="{{route('client.report', ['type'=>"transunion"])}}">  <img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="120"></a>--}}
                                                <img class="report_access"src="{{asset('images/report_access/tu_logo_2.png')}}"   width="70%">
                                                <div class="dropdown-content transunion">
                                                    <div class="">
                                                        <a class="p-1 pl-3" href="https://service.transunion.com/dss/login.page" target="_blank">MEMBER LOGIN</a>
                                                        <a class="p-1 pl-3" href="{{route('client.credentials',['source'=> 'transunion_member'])}}">MEMBER CREDENTIALS</a>
                                                        <a class="p-1 pl-3" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?offer=3BM10246&PLACE_CTA=top_right_search" target="_blank">MEMBER  REGISTRATION</a>
                                                        <hr class="my-1">
                                                    </div>
                                                    <div class="">
                                                        <a class="p-1 pl-3" href="https://membership.tui.transunion.com/tucm/login.page" target="_blank">DISPUTE LOGIN</a>
                                                        <a class="p-1 pl-3" href="{{route('client.credentials',['source'=> 'transunion_dispute'])}}">DISPUTE CREDENTIALS</a>
                                                        <a class="p-1 pl-3" href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">DISPUTE REGISTRATION</a>
                                                        <hr class="my-1">
                                                    </div>
                                                    <div class="">
                                                        <a class="p-1 pl-3" href="#">ARCHIVE</a>
                                                    </div>

                                                    @foreach($reportsDateTU as $keyTu => $tuDate)
                                                        <a href="{{route('client.report', ['type'=>"transunion", 'date'=>$keyTu])}}">{{date("m/d/Y",strtotime($tuDate))}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div  class="col-md-3">
                                            <div class="dropdown">
                                                <img class="report_access"src="{{asset('images/report_access/misc_4.png')}}"   width="70%">
                                                <div class="dropdown-content report">
                                                    <div class="dropdown">
                                                        <ul class="dropdown-submenu">
                                                            <a href="https://www.creditkarma.com/auth/logon?redirectUrl=https%3A%2F%2Fwww.creditkarma.com%2Fdashboard"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="110px"></a>
                                                            <ul class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{route('client.credentials',['source'=> 'credit_karma'])}}"target="_blank">CREDENTIALS</a>
                                                            </ul>
                                                        </ul>
                                                        <ul>
                                                            <a href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/cs_logo_1.png')}}"  width="110px"></a>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                            </div>
                        </div>
                    </section>

                    <section class="charts">
                        <div class="container-fluid">
                            <div class="row mt50">
                                <div class="col-md-6">
                                    <div class="chart-container">
                                        <div class="boxheading">
                                            <h3>BILLING </h3>
                                        </div>
                                        <div class="mt20">
                                            <h4>billing statements</h4>
                                            <p> consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart-container">
                                        <div class="boxheading">
                                            <h3>ADDITIONAL SERVICES</h3>
                                        </div>
                                        <div class="mt20">
                                            <h4>EXCEED AUTO GROUP</h4>
                                            <p> consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.</p>
                                        </div>
                                        <div class="mt20">
                                            <h4>EXCEED AUTO GROUP</h4>
                                            <p>EXCEED CAPITAL LENDING</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>


                    <section class="charts pb50 mt50">
                        <div class="container-fluid">
                            <div class="row ">

                            </div>
                        </div>
                    </section>

                </section>
            </div>
        </div>
      </div>


    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
                    @method('PUT')
                    @csrf
                    <div class="form row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-sm-12 col-12">
                            {{ Form::text('client[full_name]', $client->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'FULL NAME']) }}
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                            {{ Form::text('client[phone_number]', $client->clientDetails->phone_number, ['class' => 'form-control m-input', 'placeholder' => 'PHONE NUMBER']) }}
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                            {{ Form::text('client[address]',  strtoupper($client->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                            {{ Form::select('client[sex]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $client->clientDetails->sex, ['class'=>'col-md-12  form-control']) }}
                          </div>
                        </div>
                      </div>





                    </div>


                </div>
                <div class="modal-footer">
                  <button type="submit" value="Update" class="btn btn-primary">Update</button>
                  {!! Form::close() !!}
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                </div>
            </div>
        </div>
    </div>




    {{--    @include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])--}}




    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script type="text/javascript" src="{{asset('js/lib/gstatic.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#doc_sunb").validate({
                rules: {
                    "social": {
                        required: '#driver_license:blank',
                    },
                    "driver": {
                        required: '#social_security:blank',
                    },
                },

                errorPlacement: function(error, element) {
                    error.insertAfter($(element));
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {

            autocomplete = new google.maps.places.Autocomplete($("#address")[0], {
                types: ['address'],
                componentRestrictions: {country: "us"}
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                $("#address").val(place.formatted_address)
                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            $("#zip").val(place.address_components[i].long_name);

                        }
                    }
                }
            });
        });
    </script>
    <script>

        $(document).ready(function() {
            $(".ssn").mask("999-99-9999");
            $('#phone_number').mask('(000) 000-0000');

            $.validator.addMethod("one_option", function(value, element) {
                if (element.name.indexOf("sex") != -1){
                    return $(".sex_options").length < 2
                }
                return $("[name='" +element.name+ "']").length < 2;
            }, "Please choose one of the options");

            $.validator.addMethod("valid_ssn", function(value, element) {
                console.log(value, element)
                return !!value.match(/[0-9]{3}-[0-9]{2}-[0-9]{4}/g);
            }, "Not valid ssn format.");

            $.validator.addMethod("valid_address", function(value, element) {
                // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
                return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
            }, "Not valid address format.");


            $("#clientDetailsForm").validate({
                rules: {
                    "client[full_name]": {
                        required:true,
                        one_option: true
                    },
                    "client[dob]": {
                        required:true,
                        one_option: true
                    },
                    "client[ssn]": {
                        required:true,
                        valid_ssn: true
                    },
                    "client[address]": {
                        required:true,
                        one_option: true,
                        valid_address: true
                    },
                    "client[zip]": {
                        required:true,
                        one_option: true
                    },
                    "client[sex]": {
                        required:   true,
                        one_option: true
                    },
                    "client[sex_uploaded]": {
                        required:true
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).parents(".form-group"));
                }
            })

            $(".file-box").on("change", function(e){
                var file = e.target.files[0]
                var _this = this
                if(file.type == "application/pdf"){
                    var fileReader = new FileReader();
                    fileReader.onload = function() {
                        var pdfData = new Uint8Array(this.result);
                        var loadingTask = pdfjsLib.getDocument({data: pdfData});
                        loadingTask.promise.then(function(pdf) {
                            // Fetch the first page
                            var pageNumber = 1;
                            pdf.getPage(pageNumber).then(function(page) {
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
                    $(this).addClass('social_dropp')
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



            $("#bank_logo").val(null)

            $(".closeUpload").click(function (e) {
                e.preventDefault();

                var  hideShow = $(".updateLogo").attr("class")
                if(hideShow.search("hide") != -1){
                    $(".updateLogo").removeClass("hide")
                }else{
                    $(".updateLogo").addClass("hide")
                }
                // $(".changeLogo").addClass("hide")

            });

            // $(".driver").click(function (e) {
            //     e.preventDefault();
            //
            //     var  hideShow = $(".updateLogo").attr("class")
            //     if(hideShow.search("hide") != -1){
            //         $(".updateLogo").removeClass("hide")
            //     }else{
            //         $(".updateLogo").addClass("hide")
            //     }
            // });

            $(document).on("click",function() {

                var  scaleSS = $(".zoomSS").attr("class")
                var  scaleDL = $(".zoomDL").attr("class")
                var full_name = $(".full_name").attr("class")
                var ssn = $(".ss_number").attr("class")

                if(scaleSS.search("scaleSS") != -1 && ssn.search("hide") != -1) {
                    $(".zoomSS").removeClass("scaleSS")
                    $(".zoomSS").addClass("hide")
                    $(".ss_number").removeClass("hide")

                }
                if(scaleDL.search("scaleDL") != -1 && full_name.search("hide") != -1){
                    $(".zoomDL").removeClass("scaleDL")
                    $(".zoomDL").addClass("hide")
                    $(".full_name").removeClass("hide")
                }

           });

            $(".dl-field").mouseover(function(){
                $(".zoomDL").removeClass("hide");
                $(".full_name").addClass("hide")

            });
            $(".dl-field").mouseout(function(){
                var  scaleDL = $(".zoomDL").attr("class")
                if(scaleDL.search("scaleDL") == -1) {
                    $(".zoomDL").addClass("hide")
                    $(".full_name").removeClass("hide")
                }
            });

            $(".ssn-field").mouseover(function(){
                $(".zoomSS").removeClass("hide");
                $(".ss_number").addClass("hide")

            });
            $(document).on('mouseout',".ssn-field", function(){
                if(!$(".zoomSS").hasClass("scaleSS")) {
                    $(".zoomSS").addClass("hide")
                    $(".ss_number").removeClass("hide")
                }
            });

            $( ".zoomSS" ).dblclick(function() {
                var  scale = $(".zoomSS").attr("class")
                if(scale.search("scaleSS") == -1){
                    $(".zoomSS").addClass("scaleSS")
                }
            });

            $( ".zoomDL" ).dblclick(function() {
                var  scale = $(".zoomDL").attr("class")
                if(scale.search("scaleDL") == -1){
                    $(".zoomDL").addClass("scaleDL")
                }
            });

        })

        </script>

    <script type="text/javascript">
        var per1 = $(".progress.p1").attr("data-1");
        var per2 = $(".progress.p1").attr("data-2");
        $(".p1 .number h2").text(per1);
        var val1 = 440 - (440 * per1) / 100;

        var val2 = (440 * per2) / 100;
        var val3 = val1-val2
        console.log(val1, val2, per2)

        $(".p1 svg circle:nth-child(2)").animate({"stroke-dashoffset": val3}, 1000);
        $(".p1 svg circle:nth-child(3)").animate({"stroke-dashoffset": val1}, 1000);
    </script>

    <script type="text/javascript">

        var statusDispute =  JSON.parse('<?php echo $statusDispute; ?>');
        console.log( statusDispute, statusDispute['active'])
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Dispute progress'],
                ['Success',    statusDispute['complete']],
                ['Failed',      statusDispute['pending']],
                ['In Progress',  statusDispute['active']],
                ['Added',  statusDispute['added']],
                ['No data entity',  statusDispute['non_data']],
            ]);

            var options = {
                is3D: true,
                colors: ['#89caf4','#4678b7', '#363676', '#275ca8', '#77c1ce','#0091ca']
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>




    {{--    <script type="text/javascript">--}}
    {{--        /*global $, console*/--}}

    {{--        $(function () {--}}

    {{--            'use strict';--}}

    {{--            (function () {--}}

    {{--                var aside = $('.side-nav'),--}}

    {{--                    showAsideBtn = $('.show-side-btn'),--}}

    {{--                    contents = $('#contents');--}}

    {{--                showAsideBtn.on("click", function () {--}}

    {{--                    $("#" + $(this).data('show')).toggleClass('show-side-nav');--}}

    {{--                    contents.toggleClass('margin');--}}

    {{--                });--}}

    {{--                if ($(window).width() <= 767) {--}}

    {{--                    aside.addClass('show-side-nav');--}}

    {{--                }--}}
    {{--                $(window).on('resize', function () {--}}

    {{--                    if ($(window).width() > 767) {--}}

    {{--                        aside.removeClass('show-side-nav');--}}

    {{--                    }--}}

    {{--                });--}}

    {{--                // dropdown menu in the side nav--}}
    {{--                var slideNavDropdown = $('.side-nav-dropdown');--}}

    {{--                $('.side-nav .categories li').on('click', function () {--}}

    {{--                    $(this).toggleClass('opend').siblings().removeClass('opend');--}}

    {{--                    if ($(this).hasClass('opend')) {--}}

    {{--                        $(this).find('.side-nav-dropdown').slideToggle('fast');--}}

    {{--                        $(this).siblings().find('.side-nav-dropdown').slideUp('fast');--}}

    {{--                    } else {--}}

    {{--                        $(this).find('.side-nav-dropdown').slideUp('fast');--}}

    {{--                    }--}}

    {{--                });--}}

    {{--                $('.side-nav .close-aside').on('click', function () {--}}

    {{--                    $('#' + $(this).data('close')).addClass('show-side-nav');--}}

    {{--                    contents.removeClass('margin');--}}

    {{--                });--}}

    {{--            }());--}}


    {{--        });--}}
    {{--    </script>--}}




@endsection
