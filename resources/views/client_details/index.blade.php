@extends('layouts.layout')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">

@section('content')

    <style>
        div.pac-container {
            z-index: 1050 !important;
        }
        .scrollDiv {
            height: 270px;
            background-color: white;
            overflow-y: auto;

        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .disput-progress {
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        @media only screen and (max-width: 479px) {
            .disput-progress {
                flex-direction: column;
            }
        }

        .progress {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }


        svg {
            position: relative;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
        .p1 svg circle {
            position: relative;
            transform: translate(50%, 50%);
            /*margin-left: -50%;*/
            /*width: 100%;*/
            /*height: 100%;*/
            fill: none;
            stroke-width: 30;
            stroke-dasharray: 440;
            stroke-dashoffset: 0;
            stroke: rgb(255, 173, 22);
            stroke-linecap: butt;
        }
        .p1 svg circle:nth-child(2) {
            stroke-width: 30;
            stroke-dasharray: 440;
            stroke-dashoffset: 300;
            stroke: rgb(255, 14, 52);

        }


        .p1 svg circle:nth-child(3) {
            stroke-width: 30;
            stroke-dasharray: 440;
            stroke-dashoffset: 400;
            stroke: #01bb01;

        }

        .p1 svg circle:nth-child(4) {
            stroke-width: 30;
            stroke-dasharray: 5, 20;
            stroke-dashoffset: 200;
            stroke: rgb(255, 255, 255);
        }

        .p1 svg circle:nth-child(5) {
            transform: translate(50%, 50%);
            width: 100%;
            height: 100%;
            fill: none;
            stroke: rgba(102, 102, 102, 0.295);
            stroke-width: 15;
            stroke-dasharray: 440;
            stroke-linecap: butt;
            stroke-dashoffset: 2;
        }


        .number {
            width: 100%;
            height: 100%;
            top: 10px;
            left: 0;
            display: flex;
            text-align: center;
            justify-content: center;
            position: absolute;
            border-radius: 50%;
            align-items: center;
        }

        .number h2 {
            text-align: center;
        }

        .number span {
            width: 20px;
            height: 30px;
            font-size: 20px;
            position: relative;
            line-height: 10px;
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




        .social {
            display: block;
        }
        .driver {
            display: block;
        }

        .zoomDL:hover {
            transform:translate(70%,50%) scale(2.6);
            transition: transform .5s;
        }
        .driver:hover ~ .social {
            display: none;
        }
        .social:hover ~ .driver {
            display: none;
        }
        .zoomSS:hover {
            transform:translate(-60%,50%) scale(2.6);
            transition: transform .5s ease-in-out;
        }
        .changeLogo:hover {
            padding-bottom: 100px;
        }
        .categories {
            font-size:1.1vw
        }

        .side-nav .categories > li {
            padding: 10px 40px 10px 30px !important;

        }

        .scaleDL{
            transform:translate(70%,50%) scale(2.6);
        }
        .scaleSS{
            transform:translate(-60%,50%) scale(2.6);
        }
        .changePadding {
            padding-bottom: 110px;
        }

        .responsive {
            width: 100%;
            height: auto;
        }

        .address2{
            margin-left: 30px !important;
        }


    </style>


{{--    @include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])--}}
    <section class="section-padding">
    </section>
    <div class="row">
        <div class="col-sm-3">
            <aside class="side-nav" id="show-side-navigation1">
                <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
                <div class="heading">
{{--                    <img src="assets/images/trump.jpg" alt="">--}}
                    <div class="info">
                        <h5>Client No: 01</h5>
                        <a href="#"><span style="font-weight: bold">{{$client->full_name()}}</span></a>
                    </div>

                    <div class="row changeLogo mt-5" style="padding-right: 0px! important; padding-left: 0px !important" >
                        <div class="col-md-12 m-0">
                            <div class="col-md-6 justify-content-center driver" style="margin-bottom: 10px;padding-right: 5px! important; padding-left: 0px !important" >
                                @if(!empty($client->clientAttachments()))
                                    <?php $dl = $client->clientAttachments()->where('category', "DL")->first(); ?>
                                    @if(!empty($dl))
                                            <img type="file" class="zoomDL responsive" src="{{asset($dl->path)}}"   name="img-drvl" id="img-drvl"/>
                                    @endif
                                @endif
                            </div>
                            <div class="col-md-6 text-md-center social" style="margin-bottom: 10px;padding-left: 5px! important; padding-right: 0px! important; ">
                                @if(!empty($client->clientAttachments()))
                                    <?php $ss = $client->clientAttachments()->where('category', "SS")->first(); ?>
                                    @if(!empty($ss))
                                            <img type="file"  class="zoomSS responsive" src="{{asset($ss->path)}}" name="img-sos" id="img-sose" />
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-l-12 m-0">
                            <a href="#" class="link closeUpload" >
                                UPLOAD NEW ID OR SOCIAL SECURITY
                            </a>
                        </div>
                    </div>

                    <div class="row  hide form-group updateLogo ">
                        <button type="button" class="close closeUpload">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {!! Form::open(['route'=>['client.updateDriver'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "doc_sunb"]) !!}
                            @method("PUT")
                            @csrf
                        <div class="col-sm-12 form-group files">
{{--                            <input class="bank_logo file-box" type="file" name="driver"  id="bank_logo" >--}}
                            <input class="driver_license file-box" type="file" name="driver"  id="driver_license">

                        </div>
                        <div class="col-sm-12 form-group files">
                            <input class="social_security file-box" type="file" name="social"  id="social_security" >
                        </div>
                        <div class="col"><input type="submit" value="Upload" class="ms-ua-submit"></div>

                        {!! Form::close() !!}
                    </div>

                    <div class="info zoomIn">
                    </div>

                </div>
                <ul class="categories">
                    <li title="PHONE NUMBER"><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tell:{{$client->clientDetails->phone_number}}"> {{$client->clientDetails->phone_number}}</a></li>
                    <li title="EMAIL ADDRESS"><i class="fa fa-envelope fa-fw"></i><a href="mailto:{{$client->email}}"> {{strtoupper($client->email)}}</a>
                    </li>
                    <li title="FULL ADDRESS"  >
                        <div class="row">
                            <div class="col-lg-12">
                                <i class="fa fa-map fa-fw " style="margin-right: 10px"></i>{{$client->clientDetails->number}} {{$client->clientDetails->name}}

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-11 address2">
                               {{$client->clientDetails->city}}, {{$client->clientDetails->state}} {{$client->clientDetails->zip}}

                            </div>
                        </div>
                    </li>

                    <li title="DATE OF BIRTH"><i class="fa fa-calendar fa-fw"></i> {{date("m/d/Y", strtotime($client->clientDetails->dob))}}    <img src="/images/age.jpg" width="25px"> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}</li>
                    <li title="SOCIAL SECURITY NUMBER"><i class="fa fa-shield fa-fw"></i> {{$client->clientDetails->ssn}}</li>
                    <li title="GENDER"><i class="fa fa-venus-mars fa-fw"></i>
                    @if($client->clientDetails->sex == 'M')
                        MALE
                    @elseif($client->clientDetails->sex == 'F')
                        FEMALE
                    @else
                        NON-BINARY
                    @endif
                    </li>
                    @if($client->clientDetails->referred_by != null)
                        <li title="REFERRED BY"><i class="fa fa-user fa-fw"></i> {{strtoupper($client->clientDetails->referred_by)}}</li>
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
                                    @if(!$client->credentials->is_present())
                                        <p>
                                            Please provide us your credentials, so we can fetch your report.
                                            You can provide them
                                            <a href="{{route("client.credentials")}}">here</a>.
                                        </p>
                                    @elseif(!$client->reports->first())
                                        <p>We are trying to fetch your report data. As it can take some time, we'll notify you once it is done.</p>
                                    @else
                                        <p>We've already got your report data,
                                            you can start disputes
                                            <a href="#">here</a>.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="charts">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="chart-container scrollDiv">
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
                                    <div class="disput-progress d-flex flex-sm-row flex-column">
                                        <div class="progress p1 mr-auto p-2" data-1="75" data-2="20">
                                            <svg>
                                                <circle cx="0" cy="0" r="70" />
                                                <circle cx="0" cy="0" r="70" />
                                                <circle cx="0" cy="0" r="70" />
                                                <circle cx="0" cy="0" r="70" />
                                                <circle cx="0" cy="0" r="63" />
                                            </svg>
                                            <div class="number">
                                                <h2></h2>
                                                <span>%</span>
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
                        <div class="chart-container">
                            <div class="content">
                                <h2>CREDIT REPORTS</h2>

                                <div class="row">
                                    <div  class="col-md-4 mt20">
                                        <div class="dropdown">
                                            <a href="{{route('client.report', ['type'=>"equifax"])}}">  <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>
                                            <div class="dropdown-content">
                                                @foreach($reportsDateEQ as $keyEq=> $eqDate)
                                                    <a href="{{route('client.report', ['type'=>"equifax", 'date'=>$keyEq])}}">{{date("m/d/Y",strtotime($eqDate))}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div  class="col-md-4 mt20">
                                        <div class="dropdown">
                                            <a href="{{route('client.report', ['type'=>"experian"])}}"> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                                            <div class="dropdown-content">
                                                @foreach($reportsDateEX as $keyEx => $exDate)
                                                    <a href="{{route('client.report', ['type'=>"experian", 'date'=>$keyEx])}}">{{date("m/d/Y",strtotime($exDate))}}</a>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <div  class="col-md-4 mt20">
                                        <div class="dropdown">
                                            <a  href="{{route('client.report', ['type'=>"transunion"])}}">  <img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="120"></a>
                                            <div class="dropdown-content">
                                                @foreach($reportsDateTU as $keyTu => $tuDate)
                                                    <a href="{{route('client.report', ['type'=>"transunion", 'date'=>$keyTu])}}">{{date("m/d/Y",strtotime($tuDate))}}</a>
                                                @endforeach
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
                            <div class="form-group col-md-12">

                                {{ Form::text('client[full_name]', $client->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'FULL NAME']) }}
                            </div>

                            <div class="form-group col-md-12">
                                {{ Form::text('client[phone_number]', $client->clientDetails->phone_number, ['class' => 'form-control m-input', 'placeholder' => 'PHONE NUMBER']) }}
                            </div>
                            <div class="form-group col-md-12">
                                {{ Form::text('client[address]',  strtoupper($client->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}

                            </div>

                            <div class="form-group col-md-12">

                                {{ Form::select('client[sex]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $client->clientDetails->sex, ['class'=>'col-md-10  form-control']) }}
                            </div>



                        </div>

                        <button type="submit" value="Update" class="btn btn-primary">Update</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>






    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>
    <script>
        $(document).ready(function() {

            autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
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

                if(scaleSS.search("scaleSS") != -1) {
                    $(".zoomSS").removeClass("scaleSS")
                    $(".changeLogo").removeClass("changePadding")
                }
                if(scaleDL.search("scaleDL") != -1){
                    $(".zoomDL").removeClass("scaleDL")
                    $(".changeLogo").removeClass("changePadding")
                    $(".social").removeClass("hide")
                }

           });

            $( ".zoomSS" ).dblclick(function() {
                var  scale = $(".zoomSS").attr("class")
                if(scale.search("scaleSS") == -1){
                    $(".zoomSS").addClass("scaleSS")
                    $(".changeLogo").addClass("changePadding")
                }
            });

            $( ".zoomDL" ).dblclick(function() {
                var  scale = $(".zoomDL").attr("class")
                if(scale.search("scaleDL") == -1){
                    $(".zoomDL").addClass("scaleDL")
                    $(".changeLogo").addClass("changePadding")
                    $(".social").addClass("hide")
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
        /*global $, console*/

        $(function () {

            'use strict';

            (function () {

                var aside = $('.side-nav'),

                    showAsideBtn = $('.show-side-btn'),

                    contents = $('#contents');

                showAsideBtn.on("click", function () {

                    $("#" + $(this).data('show')).toggleClass('show-side-nav');

                    contents.toggleClass('margin');

                });

                if ($(window).width() <= 767) {

                    aside.addClass('show-side-nav');

                }
                $(window).on('resize', function () {

                    if ($(window).width() > 767) {

                        aside.removeClass('show-side-nav');

                    }

                });

                // dropdown menu in the side nav
                var slideNavDropdown = $('.side-nav-dropdown');

                $('.side-nav .categories li').on('click', function () {

                    $(this).toggleClass('opend').siblings().removeClass('opend');

                    if ($(this).hasClass('opend')) {

                        $(this).find('.side-nav-dropdown').slideToggle('fast');

                        $(this).siblings().find('.side-nav-dropdown').slideUp('fast');

                    } else {

                        $(this).find('.side-nav-dropdown').slideUp('fast');

                    }

                });

                $('.side-nav .close-aside').on('click', function () {

                    $('#' + $(this).data('close')).addClass('show-side-nav');

                    contents.removeClass('margin');

                });

            }());


        });
    </script>




@endsection
