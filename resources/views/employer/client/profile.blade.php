
@extends('layouts.layout')
@section('content')
    <link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
    <style>
        .scrollDiv {
            height: 270px;
            background-color: white;
            overflow-y: auto;

        }
        .dropdown {
            position:relative;
            display: inline-block;

        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 100%;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content.experina {
            background-color: #294991;
        }
        .dropdown-content.experina  a {
            color:  #f1f1f1;
            font-weight: bolder;
        }
        .dropdown-content.equifax  {
            background-color: #b32541;
        }
        .dropdown-content.equifax  a {
            color:  #f1f1f1;
            font-weight: bolder;
        }

        .dropdown-content.transunion {
            background-color: #02a5ca;
        }
        .dropdown-content.transunion  a {
            color:  #f1f1f1;
            font-weight: bolder;
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
        .social_dropp: before {
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
            transform:translate(225%,150%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }
        .zoomSS:hover {
            transform:translate(225%,-50%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }
        .scaleDL{
            transform:translate(225%,150%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }
        .scaleSS{
            transform:translate(225%,-50%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }

        .side-nav .categories > li {
            padding: 10px 40px 10px 30px !important;
        }
        .responsive {
            width: 16.6%;
            height: auto;
            padding-right: 5px;
        }
        .responsive.small{
            width: 10%;
            padding-right: 0px !important;

        }

        .addressImage{
            width: 100%;
            height: auto;
            padding-right: 5px;
        }
        .address{
            width: 100%;
            height: auto;
            padding: 0;
            float: left;
        }
        .address1{
            width: 16.6%;
            height: auto;
            padding: 0;
            float: left;
        }
        .address2{
            width: 83%;
            height: auto;
            padding: 0;
            float: left;
        }
        .refferred {
            font-size: 2vw !important
        }

        .zodiac{
            display: none;
        }
        .date_of_birth:hover  .zodiac{
            display:block;
        }


    </style>

    @include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])

    <div class="row">
        <div class="col-sm-3">
            <aside class="side-nav" id="show-side-navigation1">
                <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
                <div class="heading">
                    {{--                    <img src="assets/images/trump.jpg" alt="">--}}
                    <div class="row" >
                        <div class="info">
                            <h5>Client No: 01</h5>
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
                        {!! Form::open(['route'=>['adminRec.client.update', $client->id],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "doc_sunb"]) !!}
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
                </div>
                <ul class="categories">
                    <li title="FULL NAME" class="dl-field">

                        @if(!empty($client->clientAttachments()))
                            <?php $dl = $client->clientAttachments()->where('category', "DL")->first(); ?>
                            @if(!empty($dl) && $dl->type != "pdf")
                                <img type="file" class="zoomDL responsive hide" src="{{asset($dl->path)}}"   name="img-drvl" id="img-drvl"/>
                            @else
                                <img type="file" class="zoomDL responsive hide" src="/images/full_name.png"   name="img-drvl" id="img-drvl"/>
                            @endif
                        @endif
                            <img  class="responsive full_name" src="/images/full_name.png">

                        <a href="#"><span style="font-weight: bold">{{$client->full_name()}}</span></a>
                    </li>
                    <li title="PHONE NUMBER">
                        <img  class="responsive" src="/images/phone_number.png">
                        <a href="tell:{{$client->clientDetails->phone_number}}"> {{$client->clientDetails->phone_number}}</a>
                    </li>
                    <li title="EMAIL ADDRESS">
                        <a href="#" data-toggle="modal" data-target="#sendEmail">
                        <img  class="responsive" src="/images/email.png">
                        </a>
                        <a href="mailto:{{$client->email}}"> {{strtoupper($client->email)}}</a>
                    </li>
                    <li title="FULL ADDRESS" >
                        <div class="address">
                            <div class="address1">
                                <a href="#" data-toggle="modal" data-target="#mapModal">
                                  <img  class="addressImage" src="/images/location.png">
                                </a>
                            </div>
                            <div class="address2">
                                <div class="address">
                                    {{$client->clientDetails->number}} {{$client->clientDetails->name}}
                                </div>
                                <div class="address">
                                    {{$client->clientDetails->city}}, {{$client->clientDetails->state}} {{$client->clientDetails->zip}}
                                </div>
                            </div>
                        </div>
                    </li>

                    <li title="DATE OF BIRTH" class="date_of_birth">
                            <img  class="responsive" src="/images/birthday.png">
                            {{date("m/d/Y", strtotime($client->clientDetails->dob))}}
                            <img src="/images/age.jpg" class="responsive small"> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}
                        <p class="zodiac">
                            {{strtoupper($zodiac['month'])}}/{{strtoupper($zodiac['year'])}}
                            BIRTHSTONES-{{strtoupper($zodiac['stone'])}}
                        </p>
                    </li>
                    <li title="SOCIAL SECURITY NUMBER" class="ssn-field">
                        @if(!empty($client->clientAttachments()))
                            <?php $ss = $client->clientAttachments()->where('category', "SS")->first(); ?>
                            @if(!empty($ss) && $ss->type != "pdf")
                                <img type="file"  class="zoomSS responsive hide" src="{{asset($ss->path)}}" name="img-sos" id="img-sose" />
                            @else
                                <img type="file"  class="zoomSS responsive hide"  src="/images/ssc.png" name="img-sos" id="img-sose" />

                            @endif
                        @endif
                        <img  class="responsive ss_number" src="/images/ssc.png">

                        <span class="ssn">{{$client->clientDetails->ssn}}</span>
                    </li>

                    <li title="GENDER">
                        @if($client->clientDetails->sex == 'M')
                            <img  class="responsive" src="/images/male.png"> <span>MALE</span>
                        @elseif($client->clientDetails->sex == 'F')
                            <img class="responsive"  src="/images/female.png"> <span>FEMALE</span>
                        @else
                            <img class="responsive" src="/images/non_binary.png"> <span>NON-BINARY</span>
                        @endif
                    </li>

                    @if($client->clientDetails->referred_by != null)
                        <li title="REFERRED BY">
                            <i class="fa fa-user fa-fw refferred" ></i>
                            <span>{{strtoupper($client->clientDetails->referred_by)}}</span>
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
                                    <div>
                                        <a href="#" class="btn dropdown-toggle" data-toggle="dropdown"> REPORT ACCESS<b class="caret"></b></a>
                                        <ul class="dropdown-menu multi-level">
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a></li>
                                                    <li> <a class="dropdown-item" href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">DISPUTE</a></li>
                                                    <li> <a class="dropdown-item" href="https://my.equifax.com/membercenter/#/login" target="_blank">DISPUTE STATUS</a></li>
                                                    <li> <a class="dropdown-item" href="https://aa.econsumer.equifax.com/aad/landing.ehtml" target="_blank">FCRA</a></li>
                                                    <li> <a class="dropdown-item" href="ttps://my.equifax.com/membercenter/#/login" target="_blank">MEMBER LOGIN</a></li>
                                                    <li> <a class="dropdown-item" href="https://www.econsumer.equifax.com/otc/landing.ehtml?^start=&companyName=W18uft01_uplanr" target="_blank">MEMBERSHIP SIGNUP </a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li> <a class="dropdown-item" href="#equifax" data-toggle="modal">LOGIN CREDENTIALS </a></li>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                                                <ul class="dropdown-menu">
                                                    <li> <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a></li>
                                                    <li> <a class="dropdown-item" href="https://www.experian.com/ncaconline/creditreport?type=declined">DENIED</a></li>
                                                    <li> <a class="dropdown-item" href="https://usa.experian.com/registration/?offer=at_fcras102,at_ltdreg100&op=FRCD-DIS-PRI-102-WGT-EXDPTAG-B1-EXP-VWIN-SEO-XXXXXX-XXXXXX-XXXXX">DISPUTE</a></li>
                                                    <li> <a class="dropdown-item" href="https://www.experian.com/ncaconline/disputeresults?intcmp=dispute_email_resultsready02">DISPUTE STATUS </a></li>
                                                    <li>  <a class="dropdown-item" href="https://www.experian.com/ncaconline/dispute">VIEW REPORT</a></li>
                                                    <li> <a class="dropdown-item" href="https://usa.experian.com/login/index?br=exp">MEMBER LOGIN </a></li>
                                                    <li> <a class="dropdown-item" href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true">MEMBERSHIP SIGNUP</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li> <a class="dropdown-item" href="#experian" data-toggle="modal">LOGIN CREDENTIALS </a></li>

                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <li> <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a></li>
                                                    <li> <a class="dropdown-item" href="https://dispute.transunion.com/dp/dispute/landingPage.jsp?PLACE_CTA=dispute:cta">DISPUTE LOGIN </a></li>
                                                    <li> <a class="dropdown-item" href="https://disclosure.transunion.com/dc/disclosure/landingPage.jsp">DISCLOSURE LOGIN</a></li>
                                                    <li> <a class="dropdown-item" href="https://fraud.transunion.com/fa/fraudAlert/landingPage.jsp?incorrect=true">FRAUD LOGIN </a></li>
                                                    <li> <a class="dropdown-item" href="https://dispute.transunion.com/fa/fraudAlert/indexProcess">NEW ACCOUNT REGISTRATION</a></li>
                                                    <li> <a class="dropdown-item" href="https://membership.tui.transunion.com/tucm/login.page?PLACE_CTA=TransUnion:PHP:Login">MEMBER LOGIN </a></li>
                                                    <li> <a class="dropdown-item" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?">MEMBERSHIP SIGNUP</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li> <a class="dropdown-item" href="#transunion" data-toggle="modal">LOGIN CREDENTIALS </a></li>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/in_logo_2.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <a class="dropdown-item" href="https://www.innovis.com/creditReport/index" target="_blank">REQUEST CREDIT REPORT </a>
                                                    <a class="dropdown-item" href="https://www.innovis.com/personal/creditReport/orderYourInnovisCreditReport#dropdownMenu">LOGIN</a>
                                                    <a class="dropdown-item" href="https://www.innovis.com/securityFreeze/index">SECURITY FREEZE </a>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/cs_logo_1.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <li> <a class="dropdown-item" href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/" target="_blank">ORDER CONSUMER REPORT</a></li>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <li> <a class="dropdown-item" href="https://www.creditkarma.com/auth/logon" target="_blank">MEMBER LOGIN</a></li>
                                                    <li> <a class="dropdown-item" href="https://www.creditkarma.com/signup/">SIGNUP</a></li>
                                                    <li> <a class="dropdown-item" href="#creditkarma" data-toggle="modal">LOGIN CREDENTIALS </a></li>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ew_logo_1.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="https://www.earlywarning.com/sites/default/files/2019-01/CIC%20Form-170215-0811-SAMPLE.pdf" target="_blank">ORDER CONSUMER REPORT </a></li>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/lxn_logo_1.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <li>   <a class="dropdown-item" href="https://consumer.risk.lexisnexis.com/request" target="_blank">ORDER CONSUMER REPORT </a></li>
                                                    <li>  <a class="dropdown-item" href="https://optout.lexisnexis.com/" target="_blank">OPT OUT</a></li>

                                                    <div class="dropdown-divider"></div>
                                                    <li>  <a class="dropdown-item" href="#">LOGIN CREDENTIALS </a></li>

                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ss_logo_1.png')}}"  width="140"></a>
                                                <ul class="dropdown-menu">
                                                    <li> <a class="dropdown-item" href="https://forms.sagestreamllc.com/#/consumer-report-self" target="_blank">ORDER CONSUMER REPORT </a></li>
                                                    <li> <a class="dropdown-item" href="https://forms.sagestreamllc.com/#/freeze-self" target="_blank">ADD SECURITY FREEZE</a></li>
                                                    <li><a class="dropdown-item" href="https://forms.sagestreamllc.com/#/unfreeze-self" target="_blank">LIFT SECURITY FREEZE</a></li>
                                                </ul>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">CA STATE COURTS ACCESS</a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="http://www.lacourt.org/casesummary/ui/index.aspx?casetype=civil" target="_blank">LOS ANGELES COUNTY </a></li>
                                                    <li><a class="dropdown-item" href="https://ocapps.occourts.org/civilwebShoppingNS/Search.do#searchAnchor" target="_blank">ORANGE COUNTY</a></li>
                                                    <li><a class="dropdown-item" href="http://public-access.riverside.courts.ca.gov/OpenAccess/CivilMainMenu.asp" target="_blank">RIVERSIDE</a></li>
                                                    <li><a class="dropdown-item" href="http://openaccess.sb-court.org/CIVIL/" target="_blank">SAN BERNANDINO COUNTY </a></li>
                                                    <li><a class="dropdown-item" href="http://www.ventura.courts.ca.gov/CivilCaseSearch/" target="_blank">VENTURA COUNTY </a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php $status = [null=>''] + \App\Disputable::STATUS ?>
            <section  id="contents">
                <section class="charts">
                    <div class="container-fluid">
                        <div class="chart-container">
                            <div class="content">
                                <h2>WORK HISTORY</h2>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-1 font-weight-normal">#</div>
                                        <div class="col-md-1 font-weight-normal"></div>
                                        <div class="col-md-3"><span  style="font-weight: bold">TITLE</span></div>
                                        <div class="col-md-2">STATUS</div>
                                    </div>
                                    @foreach($toDos->where('status', 2) as $todo)

                                        <div class="row">
                                            <div class="col-md-1 font-weight-normal">
                                                {{$loop->iteration}}
                                            </div>
                                            <div class="col-md-1 updateview" data-id="{{$todo->id}}">
                                                <i class="fa fa-eye"></i>
                                            </div>

                                            <div class="col-md-3"> {{$todo->title}}</div>
                                            <div class="col-md-2">{{$status[$todo->status]}}</div>
                                            <div class="col-md-3">



                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="charts">
                    <div class="container-fluid">
                        <div class="chart-container">
                            <div class="content">
                                <h2>TO DO</h2>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-1 font-weight-normal">#</div>
                                        <div class="col-md-1 font-weight-normal"></div>
                                        <div class="col-md-3"><span  style="font-weight: bold">TITLE</span></div>
                                        <div class="col-md-2">STATUS</div>
                                    </div>
                                    @foreach($toDos->where('status', '!=',2) as $todo)

                                        <div class="row">
                                            <div class="col-md-1 font-weight-normal">
                                                {{$loop->iteration}}
                                            </div>
                                            <div class="col-md-1 updateview" data-id="{{$todo->id}}">
                                                <i class="fa fa-eye"></i>
                                            </div>

                                            <div class="col-md-3"> {{$todo->title}}</div>
                                            <div class="col-md-2">{{$status[$todo->status]}}</div>
                                            <div class="col-md-3">



                                            </div>
                                        </div>
                                    @endforeach
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
                                    <div  class="col-md-3 mt20">
                                        <div class="dropdown">
                                            {{--                                                <a href="{{route('client.report', ['type'=>"equifax"])}}">  <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>--}}
                                            <img class="report_access"src="{{asset('images/report_access/eq_logo_2.png')}}"  width="100%">
                                            <div class="dropdown-content equifax">
                                                <a href="https://my.equifax.com/membercenter/#/login" target="_blank"> LOGIN</a>
                                                <a href="{{route('adminRec.credentials',['source'=> 'equifax', 'id'=>$client->id])}}">CREDENTIALS</a>
                                                <a href="#">REGISTRATION</a>
                                                <a href="#" >FCRA ACCESS</a>
                                                <a href="#" >DISPUTE ACCESS</a>
                                                <a href="#" >ANNUAL REPORT</a>
                                                <a href=#">ARCHIVE</a>
{{--                                                    <a  href="{{route('adminRec.client.report', ['client'=> $client->id, 'type'=>"experian"])}}">  <img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="120"></a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div  class="col-md-3 mt20">
                                        <div class="dropdown">
                                            {{--                                                <a href="{{route('client.report', ['type'=>"experian"])}}"> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>--}}
                                            <img class="report_access"src="{{asset('images/report_access/ex_logo_2.png')}}"  width="100%">
                                            <div class="dropdown-content experina">
                                                <a class="queue" data-report="EXLOGIN"  data-client="{{$client->id}}">LOGIN</a>
                                                <a href="{{route('adminRec.credentials',['source'=> 'experian','id'=>$client->id])}}">CREDENTIALS</a>
                                                <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">REGISTERATION</a>
                                                <a href="#">DENIED</a>
                                                <a class="queue" data-report="EXVIEW"  data-client="{{$client->id}}">VIEW REPORT</a>
                                                <a href="#">REPORT NUMBERS</a>
                                                <a href="#">ANNUAL REPORT</a>
                                                <a href="#">ARCHIVE</a>
{{--                                                    <a href="{{route('adminRec.client.report', ['client'=> $client->id, 'type'=>"experian"])}}"> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>--}}
                                            </div>
                                        </div>
                                    </div>

                                    <div  class="col-md-3 mt20">
                                        <div class="dropdown">
                                            <img class="report_access"src="{{asset('images/report_access/tu_logo_2.png')}}"  width="100%">
                                            <div class="dropdown-content transunion">
                                                <div class="pb-3">
                                                    <a class="queue p-1" data-report="TUMEMBER"  data-client="{{$client->id}}">MEMBER LOGIN </a>
                                                    <a class="p-1" href="{{route('client.credentials',['source'=> 'transunion_member', 'id'=>$client->id])}}">MEMBER CREDENTIALS</a>
                                                    <a class="p-1" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?offer=3BM10246&PLACE_CTA=top_right_search" target="_blank">MEMBER REGISTRATION</a>
                                                    <hr>
                                                </div>
                                                <div class="pb-3">
                                                    <a class="p-1" class="queue" data-report="TUDISPUTE"  data-client="{{$client->id}}">DISPUTE LOGIN</a>
                                                    <a class="p-1" href="{{route('adminRec.credentials',['source'=> 'transunion_dispute', 'id'=>$client->id])}}" target="_blank">DISPUTE CREDENTIALS</a>
                                                    <a class="p-1" href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">DISPUTE REGISTRATION</a>
                                                    <hr>
                                                </div>
                                                <div class="pb-3">
                                                    <a class="p-1" href="#" target="_blank">FRAUD LOGIN</a>
                                                    <a class="p-1" href="{{route('adminRec.credentials',['source'=> 'null', 'id'=>$client->id])}}">FRAUD CREDENTIALS</a>
                                                    <a class="p-1" href="#">FRAUD REGISTRATION</a>
                                                    <hr>
                                                </div>
                                                <div class="pb-3">
                                                    <a class="p-1" href="#" target="_blank">ANNUAL REPORT</a>
                                                    <hr>
                                                </div>
                                                <div class="pb-3">
                                                    <a class="p-1" href=#">ARCHIVE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div  class="col-md-3 mt20">
                                        <div class="dropdown">
                                            <img class="report_access mb-3 pb-5" src="{{asset('images/report_access/misc_4.png')}}"  width="90%">
                                            <div class="dropdown-content">
                                                <div class="dropdown">
                                                    <ul class="dropdown-submenu">
                                                        <a  class="queue" data-report="EQ"  data-client="{{$client->id}}"><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="100%"></a>

                                                    </ul>
                                                    <ul class="dropdown-submenu">
                                                        <a href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/cs_logo_1.png')}}"  width="100%"></a>

                                                    </ul>
                                                    <ul class="dropdown-submenu">
                                                        <a href="https://consumer.risk.lexisnexis.com/request"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/lxn_logo_1.png')}}"  width="100%"></a>

                                                    </ul>
                                                    <ul class="dropdown-submenu">
                                                        <a href="https://www.earlywarning.com/sites/default/files/2019-01/CIC%20Form-170215-0811-SAMPLE.pdf"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/ew_logo_1.png')}}"  width="100%"></a>

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>

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
                    {!! Form::open(['route' => ['adminRec.client.update', $client->id], 'method' => 'POST', 'id' => 'update_info',  'class' => 'm-form m-form--label-align-right']) !!}
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

                                {{ Form::text('client[address]', strtoupper($client->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
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


    <div class="col-sm-9">
        <div class="tab-content">
            <div class="modal fade" id="equifax" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Equifax Credentials</h3>
                            <li>Login: {{isset($client->credentials->eq_login)?$client->credentials->eq_login: "N/A"}}</li>
                            <li>Password:  {{isset($client->credentials->eq_password)?$client->credentials->eq_password:"N\A"}}</li>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-9">
        <div class="tab-content">
            <div class="modal fade" id="experian" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Experian Credentials</h3>
                            <li>Login: {{isset($client->credentials->ex_login)?$client->credentials->ex_login: "N/A"}}</li>
                            <li>Password:  {{isset($client->credentials->ex_password)?$client->credentials->ex_password:"N\A"}}</li>
                            <li>Answer:  {{isset($client->credentials->ex_question)?$client->credentials->ex_question:"N\A"}}</li>
                            <li>Pin Number:  {{isset($client->credentials->ex_pin)?$client->credentials->ex_pin:"N\A"}}</li>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-9">
        <div class="tab-content">
            <div class="modal fade" id="transunion" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>TransUnion Credentials</h3>
                            <li>Login: {{isset($client->credentials->tu_login)?$client->credentials->tu_login: "N/A"}}</li>
                            <li>Password:  {{isset($client->credentials->tu_password)?$client->credentials->tu_password:"N\A"}}</li>
                            <li>Question:  {{isset($client->credentials->tu_question)?$client->credentials->tu_question:"N\A"}}</li>
                            <li>Answer:  {{isset($client->credentials->tu_answer)?$client->credentials->tu_answer:"N\A"}}</li>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-sm-9">
        <div class="tab-content">
            <div class="modal fade" id="creditkarma" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Credit Karma Credentials</h3>
                            <li>Login: {{isset($client->credentials->ck_login)?$client->credentials->ck_login: "N/A"}}</li>
                            <li>Password:  {{isset($client->credentials->ck_password)?$client->credentials->ck_password:"N\A"}}</li>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="col-sm-10">
        <div class="tab-content">
            <div class="modal fade" id="toDoModal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="todo">
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="mapid"  style="height: 500px">

                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="sendEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route'=>['adminRec.sendEmail'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "send_email"]) !!}

                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="SUBJECT" />
                        <input type="hidden" name="client" class="form-control" value="{{$client->id}}" />

                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="attach" class="form-control"  />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="SEND" class="btn btn-primary"/>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{asset('css/lib/leaflet.css')}}" />
    <script src="{{asset('js/lib/leaflet.js')}}"></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>

{{--    document upload validation--}}
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

{{--    hin chartna--}}
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

{{--    nkar mecacnel poqracnel--}}
    <script type="text/javascript">
        $(document).ready(function() {

            $(".ssn").mask("999-99-9999");

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

            $(document).on("click",function() {

                var  scaleSS = $(".zoomSS").attr("class")
                var  scaleDL = $(".zoomDL").attr("class")
                var full_name = $(".full_name").attr("class")
                var ssn = $(".ss_number").attr("class")

                if(scaleSS.search("scaleSS") != -1) {
                    $(".zoomSS").removeClass("scaleSS")
                    $(".zoomSS").addClass("hide")

                }
                if(scaleDL.search("scaleDL") != -1){
                    $(".zoomDL").removeClass("scaleDL")
                    $(".zoomDL").addClass("hide")
                }
                if(full_name.search("hide") != -1){
                    $(".full_name").removeClass("hide")
                }
                if(ssn.search("hide") != -1){
                    $(".ss_number").removeClass("hide")
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

{{--    quue--}}
    <script type="text/javascript">

        $(document).ready(function(){

            $(".queue").click(function(){
                var bureau = $(this).attr('data-report')
                var clientId = $(this).attr('data-client')
                console.log('experian-login',bureau, clientId)
                var token = "<?= csrf_token()?>";

                $.ajax({
                    url: '/admins/client/report/queue',
                    type: "POST",
                    data: {
                        "client_id": clientId,
                        "bureau": bureau,
                        "_token": token,
                    },
                    success: function(response) {
                        // bootbox.alert({
                        //     message: "Your request in queue!!!",
                        //     backdrop: true,
                        //     centerVertical: true
                        //
                        // });

                        bootbox.alert('Your request in queue!!!' ).find('.modal-content').css({
                            'font-weight': 'bold',
                            'color': '#442FFF',
                            'font-size': '2em',
                            'margin-top': function () {
                                var w = $(window).height();
                                var b = $(".modal-dialog").height();
                                console.log(b)
                                // should not be (w-h)/2
                                var h = (0.8*w ) / 2;
                                return h + "px";
                            }
                        });


                    },
                    error: function(error) {

                    }
                });
            })




        })

    </script>

    <script src="/js/lib/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 250,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>





    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

{{--    google map--}}
    <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>

    <script>
        // $(document).ready(function() {
        //
        //     autocomplete = new google.maps.places.Autocomplete($("#address")[0], {
        //         types: ['address'],
        //         componentRestrictions: {country: "us"}
        //     });
        //     google.maps.event.addListener(autocomplete, 'place_changed', function () {
        //         var place = autocomplete.getPlace();
        //         $("#address").val(place.formatted_address)
        //         for (var i = 0; i < place.address_components.length; i++) {
        //             for (var j = 0; j < place.address_components[i].types.length; j++) {
        //                 if (place.address_components[i].types[j] == "postal_code") {
        //                     $("#zip").val(place.address_components[i].long_name);
        //
        //                 }
        //             }
        //         }
        //     });
        // })
    </script>

{{--    ajax client profile--}}
    <script>
        $(document).ready(function() {
            $(".ssn").mask("999-99-9999");
            $('#phone_number').mask('(000) 000-0000');

            $(".updateview").click(function(){
                var  todo = $(this).attr("data-id");
                var token = "<?= csrf_token()?>";

                $.ajax({
                    url: '/admins/client/profile/todo',
                    type: "POST",
                    data: {
                        "id": todo,
                        "_token": token,
                    },
                    dataType: "html",
                    success: function(response) {

                        var result =JSON.parse(response)
                        $("#toDoModal").modal();
                        $("#todo").html(result.view);

                    },
                    error: function(error) {

                    }
                });
            })
        })
    </script>

{{--    map--}}
    <script>
        $(document).ready(function(){
            var mymap = L.map('mapid')
            $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q={{$client->clientDetails->address}}', function(data){
                console.log(data);
                mymap.setView([data[0]['lat'], data[0]['lon']], 17);
                L.marker([data[0]['lat'], data[0]['lon']]).addTo(mymap);

            });

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);
            mymap.invalidateSize()
            $("#mapModal").on('shown.bs.modal', function(e) {
                mymap.invalidateSize();
            });
        })

    </script>







@endsection