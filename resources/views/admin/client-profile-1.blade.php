
@extends('layouts.layout')

<style>
    .dropdown-menu {
        /*position: initial !important;*/
        /*float: initial !important;*/

    }
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }



</style>

<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">

@section('content')



    @include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])

    <div class="row">
        <div class="col-sm-3">
            <aside class="side-nav" id="show-side-navigation1">
                <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
                <div class="heading">
                    {{--                    <img src="assets/images/trump.jpg" alt="">--}}
                    <div class="info">
                        <h5>Client No: 01</h5>
                        <h3><a href="#">{{$client->full_name()}}</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>

                    </div>
                </div>
                <ul class="categories">
                    <li title="PHONE NUMBER"><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tell:{{$client->clientDetails->phone_number}}"> {{$client->clientDetails->phone_number}}</a></li>
                    <li title="EMAIL ADDRESS"><i class="fa fa-envelope fa-fw"></i><a href="mailto:{{$client->eamil}}"> {{$client->email}}</a>
                    </li>
                    <li title="FULL ADDRESS"><i class="fa fa-map fa-fw"></i> {{$client->clientDetails->address}}</li>
                    <li title="DATE OF BIRTH"><i class="fa fa-calendar fa-fw"></i> {{date("m/d/Y", strtotime($client->clientDetails->dob))}}    <img src="/images/age.jpg" width="25px"> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}</li>
                    <li title="SOCIAL SECURITY NUMBER"><i class="fa fa-shield fa-fw"></i> {{$client->clientDetails->ssn}}</li>
                    @if($client->clientDetails->referred_by != null)
                        <li title="REFERRED BY"><i class="fa fa-user fa-fw"></i> {{$client->clientDetails->referred_by}}</li>
                    @endif
                    <li title="GENDER"><i class="fa fa-venus-mars fa-fw"></i>
                        @if($client->clientDetails->sex == 'M')
                            Male
                        @elseif($client->clientDetails->sex == 'F')
                            Female
                        @else
                            Non-Binary
                        @endif
                    </li>
                    <li>


                    </li>
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

            <section id="contents">
                <div class="welcome">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="content">
                                    <h2>WORKS HISTORIES</h2>


                                </div>

                                <div class="content">
                                    <h2>TO DO</h2>
                                    <?php $status = [null=>''] + \App\Disputable::STATUS ?>
                                    @foreach($toDos as $todo)

                                        {{$todo->title}}



                                    @endforeach

                                </div>

                                <div class="content">
                                    <h2>CREDIT REPORTS</h2>

                                    <div class="row">
                                        <div class="chart-container">
                                            <div  class="col-md-4 mt20">
                                                <a href="{{route('admin.client.report', ['client'=> $client->id, 'type'=>"equifax"])}}">  <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>
                                            </div>
                                            <div  class="col-md-4 mt20">
                                                <a href="{{route('admin.client.report', ['client'=> $client->id, 'type'=>"experian"])}}"> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                                            </div>
                                            <div  class="col-md-4 mt20">
                                                <a  href="{{route('admin.client.report', ['client'=> $client->id, 'type'=>"experian"])}}">  <img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="120"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


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

                            {{ Form::text('client[address]', strtoupper($client->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
                        </div>

                        <div class="form-group col-md-12">

                            {{ Form::select('client[sex]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $client->clientDetails->sex, ['class'=>'col-md-10  form-control']) }}
                        </div>

                        {{--                            <div class="form-group col-md-6">--}}
                        {{--                                <label for="gender">Gender</label>--}}
                        {{--                                <div class="form-check form-check-inline">--}}
                        {{--                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked="checked">--}}
                        {{--                                    <label class="form-check-label" for="male">Male</label>--}}

                        {{--                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">--}}
                        {{--                                    <label class="form-check-label" for="female">Female</label>--}}
                        {{--                                </div>--}}

                        {{--                            </div>--}}

                    </div>

                    <button type="submit" value="Update" class="btn btn-primary">Update</button>
                    </form>
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



    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>

    <script>
        $(document).ready(function(){

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

            // Start chart

            var chart = document.getElementById('myChart');
            Chart.defaults.global.animation.duration = 2000; // Animation duration
            Chart.defaults.global.title.display = false; // Remove title
            Chart.defaults.global.title.text = "Chart"; // Title
            Chart.defaults.global.title.position = 'bottom'; // Title position
            Chart.defaults.global.defaultFontColor = '#999'; // Font color
            Chart.defaults.global.defaultFontSize = 10; // Font size for every label

            // Chart.defaults.global.tooltips.backgroundColor = '#FFF'; // Tooltips background color
            Chart.defaults.global.tooltips.borderColor = 'white'; // Tooltips border color
            Chart.defaults.global.legend.labels.padding = 0;
            Chart.defaults.scale.ticks.beginAtZero = true;
            Chart.defaults.scale.gridLines.zeroLineColor = 'rgba(255, 255, 255, 0.1)';
            Chart.defaults.scale.gridLines.color = 'rgba(255, 255, 255, 0.02)';

            Chart.defaults.global.legend.display = false;

            var myChart = new Chart(chart, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", 'Jul'],
                    datasets: [{
                        label: "Lost",
                        fill: false,
                        lineTension: 0,
                        data: [45, 25, 40, 20, 45, 20],
                        pointBorderColor: "#4bc0c0",
                        borderColor: '#4bc0c0',
                        borderWidth: 2,
                        showLine: true,
                    }, {
                        label: "Succes",
                        fill: false,
                        lineTension: 0,
                        startAngle: 2,
                        data: [20, 40, 20, 45, 25, 60],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#ff6384",
                        borderColor: '#ff6384',
                        borderWidth: 2,
                        showLine: true,
                    }]
                },
            });
            //  Chart ( 2 )


            var Chart2 = document.getElementById('myChart2').getContext('2d');
            var chart = new Chart(Chart2, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", 'test', 'test', 'test', 'test'],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 79, 116)',
                        borderWidth: 2,
                        pointBorderColor: false,
                        data: [5, 10, 5, 8, 20, 30, 20, 10],
                        fill: false,
                        lineTension: .4,
                    }, {
                        label: "Month",
                        fill: false,
                        lineTension: .4,
                        startAngle: 2,
                        data: [20, 14, 20, 25, 10, 15, 25, 10],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#4bc0c0",
                        borderColor: '#4bc0c0',
                        borderWidth: 2,
                        showLine: true,
                    }, {
                        label: "Month",
                        fill: false,
                        lineTension: .4,
                        startAngle: 2,
                        data: [40, 20, 5, 10, 30, 15, 15, 10],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#ffcd56",
                        borderColor: '#ffcd56',
                        borderWidth: 2,
                        showLine: true,
                    }]
                },

                // Configuration options
                options: {
                    title: {
                        display: false
                    }
                }
            });


            console.log(Chart.defaults.global);

            var chart = document.getElementById('chart3');
            var myChart = new Chart(chart, {
                type: 'line',
                data: {
                    labels: ["One", "Two", "Three", "Four", "Five", 'Six', "Seven", "Eight"],
                    datasets: [{
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointBorderColor: "transparent",
                        pointColor: "white",
                        borderColor: '#d9534f',
                        borderWidth: 0,
                        showLine: true,
                        data: [0, 40, 10, 30, 10, 20, 15, 20],
                        pointBackgroundColor: 'transparent',
                    },{
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointColor: "white",
                        borderColor: '#5cb85c',
                        borderWidth: 0,
                        showLine: true,
                        data: [40, 0, 20, 10, 25, 15, 30, 0],
                        pointBackgroundColor: 'transparent',
                    },
                        {
                            label: "Lost",
                            fill: false,
                            lineTension: .5,
                            pointColor: "white",
                            borderColor: '#f0ad4e',
                            borderWidth: 0,
                            showLine: true,
                            data: [10, 40, 20, 5, 35, 15, 35, 0],
                            pointBackgroundColor: 'transparent',
                        },
                        {
                            label: "Lost",
                            fill: false,
                            lineTension: .5,
                            pointColor: "white",
                            borderColor: '#337ab7',
                            borderWidth: 0,
                            showLine: true,
                            data: [0, 30, 10, 25, 10, 40, 20, 0],
                            pointBackgroundColor: 'transparent',
                        }]
                },
            });

        });
    </script>



@endsection
