
@extends('layouts.owner')

<style>
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

    .internal{
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        font-size: 0.7rem;
        font-weight: 400;
        line-height: 1.6;
        color: #495057;
        background-color: #fff;
        border: 0px solid #ced4da;
        border-right: 1px solid #ced4da;
    }

    .external{
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        /*padding: 0.375rem 0.75rem;*/
        font-size: 0.7rem;
        /*font-weight: 400;*/
        /*line-height: 1.6;*/
        color: #495057;
        background-color: #fff;
        /*background-clip: padding-box;*/
        border: 0px solid #ced4da;
    }


</style>


@section('content')

    <div class="page-content pt-4">
        <div class="page-content p-0 mr-0 ml-0">
            {{--<div class="container">--}}
                <div class="row mr-0 ml-0">
                    <aside class="sidebar col-md-3  pl-2">
                        <div class="card" >
                            <div class="card-body" id="print-details">

                                    <div class="pl-3 row border-bottom">

                                        <input class="external client" name="full_name" id="full_name"  value="{{$client->full_name()==" "?null:$client->full_name()}}" type="text" placeholder="FULL NAME" >
                                    </div>
                                    <div class="pl-3 row border-bottom">

                                        <input class="external client" name="full_address" id="full_address" value="{{$client->clientDetails->address??null}}" type="text" placeholder="FULL ADDRESS" >
                                    </div>
                                    <div class="pb-1 row border-bottom">
                                        <input class="col-5 internal client" name="phone_number" id="phone_number" value="{{$client->clientDetails->phone_number??null}}" type="text" placeholder="PHONE NUMBER">
                                        <input class="col-7 external client" value="{{$client->email}}" type="text" placeholder="Client Email" readonly>
                                    </div>
                                    <div class="pb-1 row border-bottom">
                                        <input class="col-4   internal" value="{{$client->clientDetails->ssn??null}}" type="text" placeholder="SSN" readonly >
                                        <input class="col-6   external" value="{{$client->clientDetails?date_format(date_create($client->clientDetails->dob), 'm/d/Y'):null}}" type="text" placeholder="DOB" readonly >

                                       {{--<input class="form-control border-primary " value="{{$client->clientDetails->ssn??"-"}} | {{date("jS F Y",strtotime($client->clientDetails->dob??"-"))}}" type="text" placeholder="Client Name" readonly>--}}
                                    </div>

                                    <div class="report_number " id="report_number">
                                        <input   type="hidden" value="{{$client->id}}" id="client_id" >

                                        <div class="pb-1 row border-bottom">
                                            <input class="col-4 client report internal"  name="ex_number" id="ex" value="" type="text" data-target="EX# " placeholder="EX# ************" >
                                            <input class="col-4 client  report internal"  name="eq_number" id="eq" value="" type="text" data-target="EQ# " placeholder="EQ# ************" >
                                            <input class="col-4 client   report external"  name="tu_number" id="tu" value="" type="text" data-target="TU# "placeholder="TU# ************" >
                                        </div>
                                        <div class="pb-1 row border-bottom">
                                            <input class="col-4  client report  internal"  name="ftc_number" id="ftc"  value="" type="text" data-target="FTC# " placeholder="FTC# ************">
                                            <input class="col-4  client  report external" name="dr_number" id="dr" value="" type="text" data-target="DR# " placeholder="DR# ************" >
                                        </div>
                                    </div>

                                    @if($client->clientDetails != null)

                                        <div class="pb-1 pt-2 row  mr-0 ml-0 external border-bottom">

                                            <div class="col-2 m-0 p-0">
                                                <label>Gender:</label>
                                            </div>
                                            <div class="col-10 ">
                                                @if($client->clientDetails->sex == "M")
                                                <div class="row">
                                                    <label class="col-4 m-0 p-0">  MALE
                                                        <input type="radio" name="sex" class="sex" value="M" checked>
                                                    </label>
                                                </div>
                                                @elseif($client->clientDetails->sex == "F")
                                                    <div class="row">
                                                        <label class="col-4 m-0 p-0">  FEMALE
                                                            <input type="radio" name="sex" class="sex" value="F" checked>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <label class="col-4 m-0 p-0">  OTHER
                                                            <input type="radio" name="sex"  class="sex" value="O" checked>
                                                        </label>
                                                    </div>
                                                @endif
                                        </div>
                                        </div>
                                    @else
                                        <div class="pb-1 pt-2 row  mr-0 ml-0 external border-bottom">

                                            <div class="col-2 m-0 p-0">
                                                        <label>GENDER:</label>
                                                    </div>
                                            <div class="col-10 ">
                                                        <div class="row">
                                                            <label class="col-4 m-0 p-0">  MALE
                                                                <input type="radio" name="sex" class="sex" value="M">
                                                            </label>
                                                            <label class="col-4 m-0 p-0">  FEMALE
                                                                <input type="radio" name="sex" class="sex" value="F">
                                                            </label>
                                                            <label class="col-4 m-0 p-0">  OTHER
                                                                <input type="radio" name="sex" class="sex" value="F">
                                                            </label>


                                                        </div>

                                                    </div>
                                        </div>

                                    @endif
                                    <div class="pt-2  pb-2 pl-3 row external">
                                         REFFERED BY {{$client->referredBy()}}
                                    </div>


                                    <div class=" pt-2  pb-2 row justify-content-right">
                                        <div class="btn-group float-right">
                                            <button class="btn btn-success" id="save" style="display:none"> Save</button>
                                        </div>
                                        <div class="btn-group float-right">

                                            <button class="btn btn-primary print ">Print</button>
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </aside>
                    <div class="col-md-9">
                        <div class="card vh-100">
                            <div class="card" >

                                <div>
                                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown"> REPORT ACCESS<b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-level">
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a>
                                                <a class="dropdown-item" href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info">DISPUTE</a>
                                                <a class="dropdown-item" href="https://my.equifax.com/membercenter/#/login">DISUTE STATUS</a>
                                                <a class="dropdown-item" href="https://aa.econsumer.equifax.com/aad/landing.ehtml">FCRA</a>
                                                <a class="dropdown-item" href="ttps://my.equifax.com/membercenter/#/login">MEMBER LOGIN</a>
                                                <a class="dropdown-item" href="https://www.econsumer.equifax.com/otc/landing.ehtml?^start=&companyName=W18uft01_uplanr">MEMBERSHIP SIGNUP </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">LOGIN CREDENTIALS </a>
                                            </ul>
                                        </li>
                                            <div class="dropdown-divider"></div>

                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a>
                                                <a class="dropdown-item" href="https://www.experian.com/ncaconline/creditreport?type=declined">DENIED</a>
                                                <a class="dropdown-item" href="https://usa.experian.com/registration/?offer=at_fcras102,at_ltdreg100&op=FRCD-DIS-PRI-102-WGT-EXDPTAG-B1-EXP-VWIN-SEO-XXXXXX-XXXXXX-XXXXX">DISPUTE</a>
                                                <a class="dropdown-item" href="https://www.experian.com/ncaconline/disputeresults?intcmp=dispute_email_resultsready02">DISPUTE STATUS </a>
                                                <a class="dropdown-item" href="https://www.experian.com/ncaconline/dispute">VIEW REPORT</a>
                                                <a class="dropdown-item" href="https://usa.experian.com/login/index?br=exp">MEMBER LOGIN </a>
                                                <a class="dropdown-item" href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true">MEMBERSHIP SIGNUP</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">LOGIN CREDENTIALS </a>
                                            </ul>
                                        </li>
                                        <div class="dropdown-divider"></div>

                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a>
                                                <a class="dropdown-item" href="https://dispute.transunion.com/dp/dispute/landingPage.jsp?PLACE_CTA=dispute:cta">DISPUTE LOGIN </a>
                                                <a class="dropdown-item" href="https://disclosure.transunion.com/dc/disclosure/landingPage.jsp">DISCLOSURE LOGIN</a>
                                                <a class="dropdown-item" href="https://fraud.transunion.com/fa/fraudAlert/landingPage.jsp?incorrect=true">FRAUD LOGIN </a>
                                                <a class="dropdown-item" href="https://dispute.transunion.com/fa/fraudAlert/indexProcess">NEW ACCOUNT REGISTRATION</a>
                                                <a class="dropdown-item" href="https://membership.tui.transunion.com/tucm/login.page?PLACE_CTA=TransUnion:PHP:Login">MEMBER LOGIN </a>
                                                <a class="dropdown-item" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?">MEMBERSHIP SIGNUP</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">LOGIN CREDENTIALS </a>
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
                                                <a class="dropdown-item" href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/" target="_blank">ORDER CONSUMER REPORT</a>
                                            </ul>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="140"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.creditkarma.com/auth/logon" target="_blank">MEMBER LOGIN</a>
                                                <a class="dropdown-item" href="https://www.creditkarma.com/signup/">SIGNUP</a>
                                            </ul>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ew_logo_1.png')}}"  width="140"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.earlywarning.com/sites/default/files/2019-01/CIC%20Form-170215-0811-SAMPLE.pdf" target="_blank">ORDER CONSUMER REPORT </a>
                                            </ul>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/lxn_logo_1.png')}}"  width="140"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://consumer.risk.lexisnexis.com/request" target="_blank">ORDER CONSUMER REPORT </a>
                                                <a class="dropdown-item" href="https://optout.lexisnexis.com/" target="_blank">OPT OUT</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">LOGIN CREDENTIALS </a>

                                            </ul>
                                        </li>
                                        <div class="dropdown-divider"></div>

                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access"src="{{asset('images/report_access/ss_logo_1.png')}}"  width="140"></a>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="https://forms.sagestreamllc.com/#/consumer-report-self" target="_blank">ORDER CONSUMER REPORT </a>
                                                <a class="dropdown-item" href="https://forms.sagestreamllc.com/#/freeze-self" target="_blank">ADD SECURITY FREEZE</a>
                                                <a class="dropdown-item" href="https://forms.sagestreamllc.com/#/unfreeze-self" target="_blank">LIFT SECURITY FREEZE</a>
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
                            <div class="card-body">
                                <div class="row h-75 border border-primary rounded">
                                    <div class="col-md-9 border border-primary rounded"></div>
                                    <div class="col-md-3 border border-primary rounded"></div>
                                </div>
                                <div class="row h-25 border border-primary rounded">
                                    <div class="col-md-9 border border-primary rounded"></div>
                                    <div class="col-md-3 border border-primary rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{--</div>--}}

        </div>
    </div>

    <div id="print-me">



    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#phone_number').keyup(function() {

            var val = this.value.replace(/\D/g, '');
            var newVal = '';
            if(val.length > 4) {
                this.value = val;
            }

            if((val.length > 3) && (val.length <7)) {
                newVal += val.substr(0, 3) + '-';
                val = val.substr(3);
            }
            if (val.length > 6) {
                newVal += val.substr(0, 3) + '-';
                newVal += val.substr(3, 3) + '-';
                val = val.substr(6);
            }
            newVal += val;
            this.value = newVal.substring(0, 12);
        });





        $('.report').keyup(function() {
            var  report_name = $(this).attr("data-target");
            var val = this.value.replace(/\D/g, '');
            var newVal = report_name;
            newVal += val;
            this.value = newVal.substring(0, 15);
        });

        $(document).ready(function(){

            $('.client').change(function(){
                console.log("test")
                $("#save").show()
            })

            $("#save").click( function (){
                var token = "<?= csrf_token()?>";
                var client_id = $('#client_id').val();
                var full_name = $('#full_name').val();
                var full_address = $('#full_address').val();
                var phone_number = $('#phone_number').val();
                var ex_number =  $('#ex').val()
                var eq_number =   $('#eq').val()
                var tu_number =  $("#tu").val()
                var ftc_number = $("#ftc").val()
                var dr_number = $("#dr").val();
                var sex =  $(".sex").val();

                $.ajax({
                    url: "<?= route('owner.client.report_number');?>",
                    method:"POST",
                    data:{user_id:client_id,  _token:token,full_name, address:full_address,
                        phone_number:phone_number,ex_number:ex_number, eq_number:eq_number, tu_number:tu_number,
                        ftc_number:ftc_number, dr_number:dr_number, sex:sex},
                    success: function () {
                        console.log("it Works");

                    },

                    error:function (err,state) {
                        console.log(err)
                    }
                });

            })

        })


    </script>
@endsection