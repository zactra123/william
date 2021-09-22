@extends('layouts.layout')
@section('content')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css" />
<style>
  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
  }

  .dropdown-submenu:hover > .dropdown-menu {
    display: block;
  }

  .dropdown-submenu > a:after {
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

  .dropdown-submenu:hover > a:after {
    border-left-color: #fff;
  }

  .dropdown-submenu.pull-left {
    float: none;
  }

  .dropdown-submenu.pull-left > .dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
  }
</style>

<style>
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
    margin-left: -50%;
    width: 100%;
    height: 100%;
    fill: none;
    stroke-width: 30;
    stroke-dasharray: 440;
    stroke-dashoffset: 0;
    stroke: rgb(255, 0, 0);
    stroke-linecap: butt;
  }

  .p1 svg circle:nth-child(2) {
    stroke-dasharray: 440;
    stroke-dashoffset: 440;
    stroke: #01bb01;
  }

  .p1 svg circle:nth-child(3) {
    stroke-dasharray: 5, 20;
    stroke-dashoffset: 90;
    stroke: rgb(255, 255, 255);
  }

  .p1 svg circle:nth-child(4) {
    transform: translate(50%, 50%);
    width: 100%;
    height: 100%;
    fill: none;
    stroke: rgba(102, 102, 102, 0.295);
    stroke-width: 15;
    stroke-dasharray: 440;
    stroke-linecap: butt;
    stroke-dashoffset: 5;
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

  #pdf-container h4 {
    cursor: pointer;
  }

  .upload_file [type="file"] {
    height: 0;
    overflow: hidden;
    width: 0;
  }

  .upload_file [type="file"] + label {
    background: red;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: "Poppins", sans-serif;
    font-size: inherit;
    font-weight: 600;
    margin-bottom: 1rem;
    outline: none;
    padding: 1rem 50px;
    position: relative;
    transition: all 0.3s;
    vertical-align: middle;
  }

  .upload_file [type="file"] + label:hover {
    background-color: #03182b;
  }

  .upload_file [type="file"] + label.btn-3 {
    background-color: #092a48;
    border-radius: 0;
    overflow: hidden;
  }

  .upload_file [type="file"] + label.btn-3 span {
    display: inline-block;
    /*height: 100%;*/
    transition: all 0.3s;
    width: 100%;
  }

  .upload_file [type="file"] + label.btn-3::before {
    color: #fff;
    content: "\f382";
    font-family: "Font Awesome 5 pro";
    font-size: 130%;
    height: 100%;
    text-align: center;
    left: 0;
    line-height: 2.6;
    position: absolute;
    top: -180%;
    transition: all 0.3s;
    width: 100%;
  }

  .upload_file [type="file"] + label.btn-3:hover {
    background-color: #000b14;
  }

  .upload_file [type="file"] + label.btn-3:hover span {
    transform: translateY(300%);
  }

  .upload_file [type="file"] + label.btn-3:hover::before {
    top: 0;
  }

  .setting {
    background: #fff;
    margin: 0 auto 3px;
    padding: 0px;
    width: 125%;
  }

  .setting h2 {
    color: #999;
    font-size: 14px;
    font-weight: 400;
    margin: 0 0 6px;
    line-height: 24px;
  }

  .setting a[data-action] {
    cursor: pointer;
    color: #555;
    font-size: 14px;
    line-height: 24px;
    transition: color 0.2s;
  }

  .setting a[data-action] i {
    width: 1.25em;
    text-align: center;
  }

  .setting a[data-action]:hover {
    color: #ff8800;
  }

  .setting a[data-action].disabled {
    opacity: 0.35;
    cursor: default;
  }

  .setting a[data-action].disabled:hover {
    color: #555;
  }

  .image_picker .settings_wrap {
    overflow: hidden;
    position: relative;
  }

  .image_picker .settings_wrap .drop_target,
  .image_picker .settings_wrap .settings_actions {
    float: left;
  }

  .image_picker .settings_wrap .drop_target {
    margin-right: 4px;
  }

  .image_picker .settings_wrap .settings_actions {
    margin-top: 40px;
  }

  .settings_actions.vertical a {
    display: block;
  }

  .drop_target {
    position: relative;
    cursor: pointer;
    background: #e6e6e6;
    border-top: 1px solid #cccccc;
    border-radius: 4px;
    width: 120px;
    height: 120px;
    padding: 4px 6px 6px;
    transition: all 0.2s;
  }

  .drop_target input[type="file"] {
    visibility: hidden;
  }

  .drop_target:before {
    content: "\f0ee";
    font-family: FontAwesome;
    position: absolute;
    display: block;
    width: 100px;
    line-height: 120px;
    text-align: center;
    font-size: 32px;
    color: rgba(0, 0, 0, 0.30000000000000004);
    transition: color 0.2s;
  }

  .drop_target:hover,
  .drop_target.dropping {
    background: #ff8800;
    border-top-color: #cc6d00;
  }

  .drop_target:hover:before,
  .drop_target.dropping:before {
    color: rgba(0, 0, 0, 0.6);
  }

  .drop_target .image_preview {
    width: 100%;
    height: 100%;
    background: no-repeat center;
    background-size: cover;
    position: relative;
    z-index: 2;
  }

  .image_details {
    width: 150px;
    padding: 4px;
    background: #e6e6e6;
    border-radius: 4px;
    position: absolute;
    top: 0;
    left: 125px;
    z-index: 5;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s;
  }

  .dropped ~ .image_details {
    opacity: 1;
    pointer-events: all;
  }

  .image_details:before {
    content: "";
    display: block;
    width: 0;
    height: 0;
    border: 6px solid transparent;
    border-right-color: #e6e6e6;
    position: absolute;
    left: -12px;
    top: 10px;
  }

  .image_details .input_line {
    display: block;
    overflow: hidden;
    margin-bottom: 4px;
  }

  .image_details .input_line:last-of-type {
    margin-bottom: 0;
  }

  .image_details .input_line span,
  .image_details .input_line input {
    float: left;
    line-height: 24px;
  }

  .image_details .input_line span {
    font-size: 12px;
    color: #666;
    width: 20%;
  }

  .image_details .input_line input[type="text"] {
    width: 100%;
    color: #444444;
    appearance: none;
    border: 1px solid #e6e6e6;
    border-radius: 3px;
    background: #fff;
    height: 24px;
    line-height: 18px;
    padding: 3px 5px;
    font-size: 14px;
    transition: border 0.2s;
  }

  .image_details .input_line input[type="text"]:hover,
  .image_details .input_line input[type="text"]:focus {
    outline: 0;
    border: 1px solid #ff8800;
  }

  .image_details .input_line input[type="text"]::-webkit-input-placeholder {
    font-size: 14px;
    color: #999;
  }

  .image_details a.confirm {
    position: absolute;
    right: -12px;
    top: 50%;
    margin-top: -12px;
    display: block;
    width: 21px;
    height: 21px;
    border-radius: 100%;
    background: #eee;
    line-height: 23px;
    text-align: center;
    font-size: 16px;
  }
</style>
@include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])
<div class="row">
	<div class="col-sm-3">
		<aside class="side-nav" id="show-side-navigation1">
			<i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
			<div class="heading">
				<div class="setting">
					<div class="setting image_picker">
						<h2>SSC</h2>
						<div class="settings_wrap">
							<label class="drop_target">
								<div class="image_preview"></div>
								<input id="inputFile" type="file" />
							</label>
							<div class="settings_actions vertical">
								<a data-action="choose_from_uploaded">
									<i class="fa fa-picture-o"></i> Choose from Uploads
								</a>
								<a class="disabled" data-action="remove_current_image">
									<i class="fa fa-ban"></i> Remove Current Image
								</a>
							</div>
							<div class="image_details">
								<label class="input_line image_title">
									<input type="text" placeholder="ID" />
								</label>
								<a class="confirm" data-action="confirm_image_details">
									<i class="fa fa-check-circle"></i>
								</a>

							</div>
						</div>
					</div>
				</div>

				<!-- <img src="assets/images/trump.jpg" alt="">
                <div class="info">
                    <h5>Client No: 01</h5>
                    <h3><a href="#">Donal Trump</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>-->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 upload_file">
						<input type="file" name="inp-drvl[]" id="inp-drvl" multiple accept="image/*" />
						<label for="inp-drvl" class="btn-3"><span>select File</span></label>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">

						@if(!empty($client->clientAttachments()))
						@if(!empty($client->clientAttachments()->where('category', "DL")->first()))
						@if($client->clientAttachments()->where('category', "DL")->first()->type == 'jpg')
						<img type="file" src="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "DL")->first()->path))}}" width="100" name="img-drvl" id="img-drvl" />
						@endif
						@endif
						@if(!empty($client->clientAttachments()->where('category', "SS")->first()))
						@if($client->clientAttachments()->where('category', "SS")->first()->type == 'jpg')
						<img type="file" src="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "SS")->first()->path))}}" width="100" name="img-sose" id="img-sose" />
						@endif
						@endif
						@endif

						{{-- <img type="file" src="a.png" width="100" name="img-drvl" id="img-drvl"/>--}}
						{{-- <img type="file" src="a.png" width="100" name="img-sose" id="img-sose" />--}}
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6"></div>
				</div>
			</div>
			<ul class="categories">
				<li title="PHONE NUMBER">
					<i class="fa fa-phone fa-fw" aria-hidden="true"></i>
					<a href="{{$client->clientDetails->phone_number}}"> {{$client->clientDetails->phone_number}}
					</a>
				</li>
				<li title="EMAIL ADDRESS">
					<i class="fa fa-envelope fa-fw"></i>
					<a href="mailto:{{$client->email}}"> {{$client->email}}
					</a>
				</li>
				<li title="FULL ADDRESS">
					<i class="fa fa-map fa-fw"></i> {{$client->clientDetails->address}}
				</li>
				<li title="DATE OF BIRTH"><i class="fa fa-calendar fa-fw"></i> {{date("m/d/Y", strtotime($client->clientDetails->dob))}} <img src="/images/age.jpg" width="25px"> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}</li>
				<li title="SOCIAL SECURITY NUMBER">
					<i class="fa fa-shield fa-fw"></i> {{$client->clientDetails->ssn}}
				</li>
				@if($client->clientDetails->referred_by != null)
				<li title="REFERRED BY">
					<i class="fa fa-user fa-fw"></i> {{$client->clientDetails->referred_by}}
				</li>
				@endif
				<li title="GENDER">
					@if($client->clientDetails->sex == 'M')
					<img src="/images/male.png" width="20px"> Male
					@elseif($client->clientDetails->sex == 'F')
					<img src="/images/female.png" width="20px"> Female
					@else
					<img src="/images/non_binary.png" width="25px"> Non-Binary
					@endif
				</li>
				<li>
					<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white">
						<i class="fa fa-pencil-square-o fa-fw"></i> Edit Profile
					</a>
				</li>

				@if(!empty($client->clientAttachments()))
				@if(!empty($client->clientAttachments()->where('category', "DL")->first()))
				@if($client->clientAttachments()->where('category', "DL")->first()->type == 'jpg')
				<li> <img src="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "DL")->first()->path))}}" width="250"><a href="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "DL")->first()->path))}}" download> Download</a></li>
				@else
				<li> <embed src="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "DL")->first()->path))}}" width="250"><a href="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "DL")->first()->path))}}" download>Download</a></li>
				@endif
				@endif
				@if(!empty($client->clientAttachments()->where('category', "SS")->first()))
				@if($client->clientAttachments()->where('category', "SS")->first()->type == 'jpg')
				<li> <img src="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "SS")->first()->path))}}" width="250"><a href="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "SS")->first()->path))}}" download>Download</a></li>
				@else
				<li> <embed src="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "SS")->first()->path))}}" width="250"><a href="{{asset(str_replace("var/www/prudent/public/",'', $client->clientAttachments()->where('category', "SS")->first()->path))}}" download> Download</a></li>
				@endif
				@endif
				@endif


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
								<div>
									<a href="#" class="btn dropdown-toggle" data-toggle="dropdown"> REPORT ACCESS<b class="caret"></b></a>
									<ul class="dropdown-menu multi-level">
										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/eq_logo_1.png')}}" width="120"></a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a></li>
												<li> <a class="dropdown-item" href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">DISPUTE</a></li>
												<li> <a class="dropdown-item" href="https://my.equifax.com/membercenter/#/login" target="_blank">DISUTE STATUS</a></li>
												<li> <a class="dropdown-item" href="https://aa.econsumer.equifax.com/aad/landing.ehtml" target="_blank">FCRA</a></li>
												<li> <a class="dropdown-item" href="ttps://my.equifax.com/membercenter/#/login" target="_blank">MEMBER LOGIN</a></li>
												<li> <a class="dropdown-item" href="https://www.econsumer.equifax.com/otc/landing.ehtml?^start=&companyName=W18uft01_uplanr" target="_blank">MEMBERSHIP SIGNUP </a></li>
												<div class="dropdown-divider"></div>
												<li> <a class="dropdown-item" href="#equifax" data-toggle="modal">LOGIN CREDENTIALS </a></li>
											</ul>
										</li>
										<div class="dropdown-divider"></div>

										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/ex_logo_1.png')}}" width="120"></a>
											<ul class="dropdown-menu">
												<li> <a class="dropdown-item" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">ANNUAL CREDIT REPORT</a></li>
												<li> <a class="dropdown-item" href="https://www.experian.com/ncaconline/creditreport?type=declined">DENIED</a></li>
												<li> <a class="dropdown-item" href="https://usa.experian.com/registration/?offer=at_fcras102,at_ltdreg100&op=FRCD-DIS-PRI-102-WGT-EXDPTAG-B1-EXP-VWIN-SEO-XXXXXX-XXXXXX-XXXXX">DISPUTE</a></li>
												<li> <a class="dropdown-item" href="https://www.experian.com/ncaconline/disputeresults?intcmp=dispute_email_resultsready02">DISPUTE STATUS </a></li>
												<li> <a class="dropdown-item" href="https://www.experian.com/ncaconline/dispute">VIEW REPORT</a></li>
												<li> <a class="dropdown-item" href="https://usa.experian.com/login/index?br=exp">MEMBER LOGIN </a></li>
												<li> <a class="dropdown-item" href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true">MEMBERSHIP SIGNUP</a></li>
												<div class="dropdown-divider"></div>
												<li> <a class="dropdown-item" href="#experian" data-toggle="modal">LOGIN CREDENTIALS </a></li>

											</ul>
										</li>
										<div class="dropdown-divider"></div>

										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/tu_logo_1.png')}}" width="140"></a>
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
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/in_logo_2.png')}}" width="140"></a>
											<ul class="dropdown-menu">
												<a class="dropdown-item" href="https://www.innovis.com/creditReport/index" target="_blank">REQUEST CREDIT REPORT </a>
												<a class="dropdown-item" href="https://www.innovis.com/personal/creditReport/orderYourInnovisCreditReport#dropdownMenu">LOGIN</a>
												<a class="dropdown-item" href="https://www.innovis.com/securityFreeze/index">SECURITY FREEZE </a>
											</ul>
										</li>
										<div class="dropdown-divider"></div>

										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/cs_logo_1.png')}}" width="140"></a>
											<ul class="dropdown-menu">
												<li> <a class="dropdown-item" href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/" target="_blank">ORDER CONSUMER REPORT</a></li>
											</ul>
										</li>
										<div class="dropdown-divider"></div>
										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/ck_logo_1.png')}}" width="140"></a>
											<ul class="dropdown-menu">
												<li> <a class="dropdown-item" href="https://www.creditkarma.com/auth/logon" target="_blank">MEMBER LOGIN</a></li>
												<li> <a class="dropdown-item" href="https://www.creditkarma.com/signup/">SIGNUP</a></li>
												<li> <a class="dropdown-item" href="#creditkarma" data-toggle="modal">LOGIN CREDENTIALS </a></li>
											</ul>
										</li>
										<div class="dropdown-divider"></div>
										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/ew_logo_1.png')}}" width="140"></a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="https://www.earlywarning.com/sites/default/files/2019-01/CIC%20Form-170215-0811-SAMPLE.pdf" target="_blank">ORDER CONSUMER REPORT </a></li>
											</ul>
										</li>
										<div class="dropdown-divider"></div>
										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/lxn_logo_1.png')}}" width="140"></a>
											<ul class="dropdown-menu">
												<li> <a class="dropdown-item" href="https://consumer.risk.lexisnexis.com/request" target="_blank">ORDER CONSUMER REPORT </a></li>
												<li> <a class="dropdown-item" href="https://optout.lexisnexis.com/" target="_blank">OPT OUT</a></li>

												<div class="dropdown-divider"></div>
												<li> <a class="dropdown-item" href="#">LOGIN CREDENTIALS </a></li>

											</ul>
										</li>
										<div class="dropdown-divider"></div>

										<li class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="report_access" src="{{asset('images/report_access/ss_logo_1.png')}}" width="140"></a>
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
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit,
									sed do eiusmod tempor.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="charts">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="chart-container" id="pdf-container">
								<div class="boxheading">
									<h3>CREDIT REPORTS</h3>
								</div>
								<div class="upload_file">
									<input type="file" name="inp-pdf[]" id="inp-pdf" multiple accept=".pdf" />
									<label for="inp-pdf" class="btn-3"><span style="width: 100%; text-align: center;">Select PDF File</span></label>
								</div>

								<div class="col-6 mt20">
									<h4>Lorem ipsum dolor sit.pdf</h4>
									<p>12-04-2020</p>
								</div>
								<div class="col-6">
									<h4>Lorem ipsum dolor sit.pdf</h4>
									<p>12-04-2020</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="chart-container">
								<div class="boxheading">
									<h3>DISPUTE PROGRESS</h3>
								</div>

								<div class="disput-progress d-flex flex-sm-row flex-column">
									<div class="progress p1 mr-auto p-2" data="90">
										<svg>
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
								<!-- <div class="row p20">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="progress blue">
                                                            <span class="progress-left">
                                      <span class="progress-bar"></span>
                                                            </span>
                                                            <span class="progress-right">
                                      <span class="progress-bar"></span>
                                                            </span>
                                                            <div class="progress-value">10</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="progress yellow">
                                                            <span class="progress-left">
                                      <span class="progress-bar"></span>
                                                            </span>
                                                            <span class="progress-right">
                                      <span class="progress-bar"></span>
                                                            </span>
                                                            <div class="progress-value">8</div>
                                                        </div>
                                                    </div>

                                                </div> -->
								<h4 class="text-center">Uploaded Documents VS Processed</h4>
							</div>
						</div>
					</div>

					<div class="row mt50">
						<div class="col-md-6">
							<div class="chart-container">
								<div class="boxheading">
									<h3>ARCHIVE</h3>
								</div>
								<div class="col-6 mt20">
									<h4>DOCUMENTS</h4>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing
										elit. Nesciunt, tenetur.
									</p>
								</div>
								<div class="col-6">
									<h4>MISCELLANEOUS</h4>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing
										elit. Nesciunt, tenetur.
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="chart-container">
								<div class="boxheading">
									<h3>BILLING</h3>
								</div>
								<div class="mt20">
									<h4>billing statements</h4>
									<p>
										consectetur adipisicing elit. Error fuga dicta iusto
										suscipit quibusdam nam ad, eum deleniti architecto
										debitis.consectetur adipisicing elit. Error fuga dicta
										iusto suscipit quibusdam nam ad, eum deleniti architecto
										debitis.Error fuga dicta iusto suscipit quibusdam nam
										ad, eum deleniti architecto debitis.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="charts pb50 mt50">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 col-sm-offset-2">
							<div class="chart-container">
								<div class="boxheading">
									<h3>EXCEED COMPANIES</h3>
								</div>
								<div class="mt20">
									<h4>EXCEED AUTO GROUP</h4>
									<p>
										consectetur adipisicing elit. Error fuga dicta iusto
										suscipit quibusdam nam ad, eum deleniti architecto
										debitis.
									</p>
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
		</section>
	</div>
</div>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Update Your Profile
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="#">
					<div class="form row">
						<div class="form-group col-md-6">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" value="donal" id="fname" placeholder="First Name" />
						</div>
						<div class="form-group col-md-6">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" value="trump" id="lname" placeholder="Last Name" />
						</div>
						<div class="form-group col-md-6">
							<label for="email">Email Address</label>
							<input type="email" class="form-control" value="demomail@gmail.com" id="email" placeholder="Email" />
						</div>
						<div class="form-group col-md-6">
							<label for="phonenum">Phone Number</label>
							<input type="text" class="form-control" value="+91-434-3433" id="phonenum" placeholder="Phone Number" />
						</div>
						<div class="form-group col-md-12">
							<label for="address">Full Address</label>
							<input type="text" class="form-control" value="555 Main St,
                    Salt Lake City" id="address" placeholder="1234 Main St" />
						</div>

						<div class="form-group col-md-6">
							<label for="ssn">Social Security Number</label>
							<input type="text" value="078-07-1123" class="form-control" id="ssn" placeholder="Social Security Number" />
						</div>
						<div class="form-group col-md-6">
							<label for="referred">Referred By</label>
							<input type="text" class="form-control" value="James Bond" id="referred" />
						</div>

						<div class="form-group col-md-6">
							<label for="dob">Date Of Birth</label>
							<input type="date" class="form-control" value="1999-04-13" id="dob" />
						</div>

						<div class="form-group col-md-6">
							<label for="gender">Gender</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="male" value="male" checked="checked" />
								<label class="form-check-label" for="male">Male</label>
								<input class="form-check-input" type="radio" name="gender" id="female" value="female" />
								<label class="form-check-label" for="female">Female</label>
							</div>
						</div>
					</div>

					<button type="submit" value="Update" class="btn btn-primary">
						Update
					</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<div id="files" class="modal fade" role="dialog">
	<div class="modal-dialog" style="margin: 0px; width: 100%; height: 100%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Close
				</button>
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
						<li>Password: {{isset($client->credentials->eq_password)?$client->credentials->eq_password:"N\A"}}</li>

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
						<li>Password: {{isset($client->credentials->ex_password)?$client->credentials->ex_password:"N\A"}}</li>
						<li>Answer: {{isset($client->credentials->ex_question)?$client->credentials->ex_question:"N\A"}}</li>
						<li>Pin Number: {{isset($client->credentials->ex_pin)?$client->credentials->ex_pin:"N\A"}}</li>

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
						<h3>TransUnion Membership Credentials</h3>
						<li>Login: {{isset($client->credentials->tu_login)?$client->credentials->tu_login: "N/A"}}</li>
						<li>Password: {{isset($client->credentials->tu_password)?$client->credentials->tu_password:"N/A"}}</li>
						<li>Question: {{isset($client->credentials->tu_question)?$client->credentials->tu_question:"N/A"}}</li>
						<li>Answer: {{isset($client->credentials->tu_answer)?$client->credentials->tu_answer:"N/A"}}</li>
						<h3>TransUnion Dispute Credentials</h3>
						<li>Login: {{isset($client->credentials->tu_dis_login)?$client->credentials->tu_dis_login: "N/A"}}</li>
						<li>Password: {{isset($client->credentials->tu_dis_password)?$client->credentials->tu_dis_password:"N/A"}}</li>
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
						<li>Password: {{isset($client->credentials->ck_password)?$client->credentials->ck_password:"N\A"}}</li>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	var per1 = $(".progress.p1").attr("data");
	$(".p1 .number h2").text(per1);

	var val1 = 440 - (440 * per1) / 100;
	$(".p1 svg circle:nth-child(2)").animate({
			"stroke-dashoffset": val1,
		},
		1000
	);
	/*global $, console*/

	$(function() {
		"use strict";

		(function() {
			var aside = $(".side-nav"),
				showAsideBtn = $(".show-side-btn"),
				contents = $("#contents");

			showAsideBtn.on("click", function() {
				$("#" + $(this).data("show")).toggleClass("show-side-nav");

				contents.toggleClass("margin");
			});

			if ($(window).width() <= 767) {
				aside.addClass("show-side-nav");
			}
			$(window).on("resize", function() {
				if ($(window).width() > 767) {
					aside.removeClass("show-side-nav");
				}
			});

			// dropdown menu in the side nav
			var slideNavDropdown = $(".side-nav-dropdown");

			$(".side-nav .categories li").on("click", function() {
				$(this).toggleClass("opend").siblings().removeClass("opend");

				if ($(this).hasClass("opend")) {
					$(this).find(".side-nav-dropdown").slideToggle("fast");

					$(this).siblings().find(".side-nav-dropdown").slideUp("fast");
				} else {
					$(this).find(".side-nav-dropdown").slideUp("fast");
				}
			});

			$(".side-nav .close-aside").on("click", function() {
				$("#" + $(this).data("close")).addClass("show-side-nav");

				contents.removeClass("margin");
			});

			$("#inp-drvl").change(function() {
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
				if (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg") {
					var reader = new FileReader();

					reader.onload = function(e) {
						$("#img-drvl").attr("src", e.target.result);
					};
					reader.readAsDataURL(this.files[0]);
				} else {
					$("#img-drvl").attr("src", "");
				}
			});
			$("#inp-sose").change(function() {
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
				if (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg") {
					var reader = new FileReader();

					reader.onload = function(e) {
						$("#img-sose").attr("src", e.target.result);
					};
					reader.readAsDataURL(this.files[0]);
				} else {
					$("#img-sose").attr("src", "");
				}
			});
			$("#inp-pdf").change(function() {
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
				if (ext == "pdf") {
					var filename = url.substring(url.lastIndexOf("\\") + 1);
					var reader = new FileReader();

					reader.onload = function(e) {
						var html = '<div class="col-6 "><h4 onclick=showPdf("' + e.target.result + '") >' + filename + "</h4><p>12-04-2020</p></div>";
						$("#pdf-container").append(html);
					};
					reader.readAsDataURL(this.files[0]);
				}
			});
			$("#img-drvl").click(function() {
				//
				var title = "Driving License";
				var src = $(this).attr("src");
				var body = "<img src='" + src + "' width='100%' />";

				$("#files .modal-title").html(title);
				$("#files .modal-body").html(body);
				$("#files").modal("show");
			});
			$("#img-sose").click(function() {
				//
				var title = "Security Card";
				var src = $(this).attr("src");
				var body = "<img src='" + src + "' width='100%' />";

				$("#files .modal-title").html(title);
				$("#files .modal-body").html(body);
				$("#files").modal("show");
			});
		})();

		// Start chart

		var chart = document.getElementById("myChart");
		Chart.defaults.global.animation.duration = 2000; // Animation duration
		Chart.defaults.global.title.display = false; // Remove title
		Chart.defaults.global.title.text = "Chart"; // Title
		Chart.defaults.global.title.position = "bottom"; // Title position
		Chart.defaults.global.defaultFontColor = "#999"; // Font color
		Chart.defaults.global.defaultFontSize = 10; // Font size for every label

		// Chart.defaults.global.tooltips.backgroundColor = '#FFF'; // Tooltips background color
		Chart.defaults.global.tooltips.borderColor = "white"; // Tooltips border color
		Chart.defaults.global.legend.labels.padding = 0;
		Chart.defaults.scale.ticks.beginAtZero = true;
		Chart.defaults.scale.gridLines.zeroLineColor = "rgba(255, 255, 255, 0.1)";
		Chart.defaults.scale.gridLines.color = "rgba(255, 255, 255, 0.02)";

		Chart.defaults.global.legend.display = false;

		var myChart = new Chart(chart, {
			type: "bar",
			data: {
				labels: ["January", "February", "March", "April", "May", "Jul"],
				datasets: [{
						label: "Lost",
						fill: false,
						lineTension: 0,
						data: [45, 25, 40, 20, 45, 20],
						pointBorderColor: "#4bc0c0",
						borderColor: "#4bc0c0",
						borderWidth: 2,
						showLine: true,
					},
					{
						label: "Succes",
						fill: false,
						lineTension: 0,
						startAngle: 2,
						data: [20, 40, 20, 45, 25, 60],
						// , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
						backgroundColor: "transparent",
						pointBorderColor: "#ff6384",
						borderColor: "#ff6384",
						borderWidth: 2,
						showLine: true,
					},
				],
			},
		});
		//  Chart ( 2 )

		var Chart2 = document.getElementById("myChart2").getContext("2d");
		var chart = new Chart(Chart2, {
			type: "line",
			data: {
				labels: ["January", "February", "March", "April", "test", "test", "test", "test"],
				datasets: [{
						label: "My First dataset",
						backgroundColor: "rgb(255, 99, 132)",
						borderColor: "rgb(255, 79, 116)",
						borderWidth: 2,
						pointBorderColor: false,
						data: [5, 10, 5, 8, 20, 30, 20, 10],
						fill: false,
						lineTension: 0.4,
					},
					{
						label: "Month",
						fill: false,
						lineTension: 0.4,
						startAngle: 2,
						data: [20, 14, 20, 25, 10, 15, 25, 10],
						// , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
						backgroundColor: "transparent",
						pointBorderColor: "#4bc0c0",
						borderColor: "#4bc0c0",
						borderWidth: 2,
						showLine: true,
					},
					{
						label: "Month",
						fill: false,
						lineTension: 0.4,
						startAngle: 2,
						data: [40, 20, 5, 10, 30, 15, 15, 10],
						// , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
						backgroundColor: "transparent",
						pointBorderColor: "#ffcd56",
						borderColor: "#ffcd56",
						borderWidth: 2,
						showLine: true,
					},
				],
			},

			// Configuration options
			options: {
				title: {
					display: false,
				},
			},
		});

		console.log(Chart.defaults.global);

		var chart = document.getElementById("chart3");
		var myChart = new Chart(chart, {
			type: "line",
			data: {
				labels: ["One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight"],
				datasets: [{
						label: "Lost",
						fill: false,
						lineTension: 0.5,
						pointBorderColor: "transparent",
						pointColor: "white",
						borderColor: "#d9534f",
						borderWidth: 0,
						showLine: true,
						data: [0, 40, 10, 30, 10, 20, 15, 20],
						pointBackgroundColor: "transparent",
					},
					{
						label: "Lost",
						fill: false,
						lineTension: 0.5,
						pointColor: "white",
						borderColor: "#5cb85c",
						borderWidth: 0,
						showLine: true,
						data: [40, 0, 20, 10, 25, 15, 30, 0],
						pointBackgroundColor: "transparent",
					},
					{
						label: "Lost",
						fill: false,
						lineTension: 0.5,
						pointColor: "white",
						borderColor: "#f0ad4e",
						borderWidth: 0,
						showLine: true,
						data: [10, 40, 20, 5, 35, 15, 35, 0],
						pointBackgroundColor: "transparent",
					},
					{
						label: "Lost",
						fill: false,
						lineTension: 0.5,
						pointColor: "white",
						borderColor: "#337ab7",
						borderWidth: 0,
						showLine: true,
						data: [0, 30, 10, 25, 10, 40, 20, 0],
						pointBackgroundColor: "transparent",
					},
				],
			},
		});
	});

	function showPdf(v) {
		var title = "View Pdf";
		var body = "<embed src='" + v + "' height='1100px' width='100%'/>";

		$("#files .modal-title").html(title);
		$("#files .modal-body").html(body);
		$("#files").modal("show");
	}

	var $dropzone = $(".image_picker"),
		$droptarget = $(".drop_target"),
		$dropinput = $("#inputFile"),
		$dropimg = $(".image_preview"),
		$remover = $('[data-action="remove_current_image"]');

	$dropzone.on("dragover", function() {
		$droptarget.addClass("dropping");
		return false;
	});

	$dropzone.on("dragend dragleave", function() {
		$droptarget.removeClass("dropping");
		return false;
	});

	$dropzone.on("drop", function(e) {
		$droptarget.removeClass("dropping");
		$droptarget.addClass("dropped");
		$remover.removeClass("disabled");
		e.preventDefault();

		var file = e.originalEvent.dataTransfer.files[0],
			reader = new FileReader();

		reader.onload = function(event) {
			$dropimg.css("background-image", "url(" + event.target.result + ")");
		};

		console.log(file);
		reader.readAsDataURL(file);

		return false;
	});

	$dropinput.change(function(e) {
		$droptarget.addClass("dropped");
		$remover.removeClass("disabled");
		$(".image_title input").val("");

		var file = $dropinput.get(0).files[0],
			reader = new FileReader();

		reader.onload = function(event) {
			$dropimg.css("background-image", "url(" + event.target.result + ")");
		};

		reader.readAsDataURL(file);
	});

	$remover.on("click", function() {
		$dropimg.css("background-image", "");
		$droptarget.removeClass("dropped");
		$remover.addClass("disabled");
		$(".image_title input").val("");
	});

	$(".image_title input").blur(function() {
		if ($(this).val() != "") {
			$droptarget.removeClass("dropped");
		}
	});
</script>
@endsection
