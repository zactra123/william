@extends('layouts.admin')

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


</style>


@section('content')

    <div class="page-content pt-4">
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <aside class="sidebar col-md-3 p-0">
                        <div class="card ">
                            <div class="card-body">
                                <div>
                                    <div class="pb-1 mr-0">
                                        {{$client->full_name()}}
                                        {{--<input class="form-control border-primary"  value="" type="text" placeholder="Client Name" readonly>--}}
                                    </div>
                                    <div class="pb-1">
                                        {{$client->clientDetails->address??"-"}}
                                        {{--<input class="form-control border-primary " value="{{$client->clientDetails->address??"-"}}" type="text" placeholder="Client Address" readonly>--}}
                                    </div>
                                    <div class="pb-1">
                                        {{$client->clientDetails->phone_number??"-"}} | {{$client->email??"-"}}
                                        {{--<input class="form-control border-primary " value="{{$client->clientDetails->phone_number??"-"}} | {{$client->email??"-"}}" type="text" placeholder="Client Email" readonly>--}}
                                    </div>

                                    <div class="pb-1">
                                        {{$client->clientDetails->ssn??"-"}} | {{date("jS F Y",strtotime($client->clientDetails->dob??"-"))}}
                                        {{--<input class="form-control border-primary " value="{{$client->clientDetails->ssn??"-"}} | {{date("jS F Y",strtotime($client->clientDetails->dob??"-"))}}" type="text" placeholder="Client Name" readonly>--}}
                                    </div>

                                    <div class="report_number" id="report_number">
                                        <input   type="hidden" value="{{$client->id}}" id="client_id" >
                                        <meta name="csrf-token" compelted-token="{{ csrf_token() }}">
                                        <div class="pb-1">
                                            <input class="form-control border-primary report"  name="ex_number" value="" type="text" placeholder="EX# ************" >
                                        </div>
                                        <div class="pb-1">
                                            <input class="form-control border-primary report"  name="eq_number" value="" type="text" placeholder="EQ# ************" >
                                        </div>
                                        <div class="pb-1">
                                            <input class="form-control border-primary report"  name="tu_number" value="" type="text" placeholder="TU# ************" >
                                        </div>
                                        <div class="pb-1">
                                            <input class="form-control border-primary report"  name="ftc_number" value="" type="text" placeholder="FTC# ************">
                                        </div>
                                        <div class="pb-1">
                                            <input class="form-control border-primary report" name="dr_number" value="" type="text" placeholder="DR# ************" >
                                        </div>
                                    </div>

                                    <div class="pb-1">
                                        {{$client->clientDetails->referred_by?$client->clientDetails->referred_by:$client->affiliateFullName()?$client->affiliateFullName():'REFERRED BY'}}
                                        {{--<input class="form-control border-primary client_info" value="{{$client->clientDetails->referred_by??"-"}}" type="text" placeholder="REFERRED by" readonly>--}}
                                    </div>

                                    <div class="btn-group float-right">
                                        <button class="btn btn-primary ">Print</button>
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
                                                <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">Annual Credit Report</a>
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
                                                <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">Annual Credit Report</a>
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
                                                <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">Annual Credit Report</a>
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
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('.report').keyup(function() {
            var val = this.value.replace(/\D/g, '');
            var newVal = '';

            newVal += val;
            this.value = newVal.substring(0, 11);
        });

        $(document).ready(function(){

            $("#report_number input").change(function(){

                var client_id = $('#client_id').val()
                var name = this.name
                var value =  $(this).val()
                var token = $("meta[name='csrf-token']").attr("compelted-token");

                $.ajax({
                    url: "<?= route('admin.client.report_number');?>",
                    method:"POST",
                    data:{user_id:client_id, name:name, value:value, _token:token},
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