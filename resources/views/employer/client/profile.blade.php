@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Client Profile') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Client') }}</li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Client Profile') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-sm-3 mp-ns" style="position: -webkit-sticky; position: sticky; top: 0;">
    <div class="card">
      <aside class="card-body" id="show-side-navigation1">
        <div class="row text-right">
          <div class="col-md-12">
            <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg pull-right" data-close="show-side-navigation1"></i>
          </div>
        </div>
        <div class="heading px-3">
          <div class="row">
            <div class="info">
              <h5>{{ zactra::translate_lang('Client No: 01') }}</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-l-12 m-0">
              <a href="#" class="link closeUpload">
                {{ zactra::translate_lang('Upload New Id or Social Security') }}
              </a>
            </div>
          </div>
          <div class="row hide form-group updateLogo">
            <button type="button" class="close closeUpload btn btn-primary">
              <span aria-hidden="true">&times;</span>
            </button>
            {!! Form::open(['route'=>['adminRec.client.update', $client->id],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "doc_sunb"]) !!}
            @method("PUT")
            @csrf
            <div class="col-sm-12 files">
              {{--<input class="bank_logo file-box" type="file" name="driver" id="bank_logo" />--}}
              <input class="driver_license file-box" type="file" name="driver" id="driver_license" />
            </div>
            <div class="col-sm-12 files">
              <input class="social_security file-box" type="file" name="social" id="social_security" />
            </div>
            <div class="col"><input type="submit" value="{{ zactra::translate_lang('Upload') }}" class="ms-ua-submit btn btn-primary" /></div>

            {!! Form::close() !!}
          </div>
        </div>
        <ul class="categories">
          <li title="Full Name" class="dl-field">
            @if(!empty($client->clientAttachments()))
            <?php $dl = $client->clientAttachments()->where('category', "DL")->first(); ?>
            @if(!empty($dl) && $dl->type != "pdf")
              <img type="file" class="zoomDL hide" src="{{asset($dl->path)}}" width="25px" name="img-drvl" id="img-drvl" />
            @else
              <img type="file" class="zoomDL hide" src="{{url('/')}}/images/full_name.png" width="25px" name="img-drvl" id="img-drvl" />
            @endif @endif
              <img class="full_name" src="{{url('/')}}/images/full_name.png" width="25px" />
            &nbsp; <a href="#"><span>{{$client->full_name()}}</span></a>
          </li>

          <li title="Phone Number">
            {{-- <img class="" width="25px" src="{{url('/')}}/images/phone_number.png" /> --}}
            <span class="side-menu__icon fe fe-phone fs-20"></span>
            &nbsp; <a href="tell:{{$client->clientDetails->phone_number}}" class="fs-12"> {{$client->clientDetails->phone_number}}</a>
          </li>
          <li title="Email Address">
            <a href="#" data-toggle="modal" data-target="#sendEmail">
              {{-- <img class="" width="25px" src="{{url('/')}}/images/email.png" /> --}}
              <span class="side-menu__icon fas fa-envelope fs-20"></span>
            </a>
            &nbsp; <a href="mailto:{{$client->email}}"> {{ zactra::limit_words($client->email,25) }}</a>
          </li>
          <li title="Full Address">
            <div class="address">
              <div class="address1">
                <a href="#" data-toggle="modal" data-target="#mapModal" style="color: black;">
                  {{-- <img width="25px" class="addressImage" src="{{url('/')}}/images/location.png" /> --}}
                  <span class="side-menu__icon fa fa-map-marker fs-20"></span>
                </a>
              </div>
              <div class="address2">
                <div class="address">
                  {{$client->clientDetails->number}} {{$client->clientDetails->name}} {{$client->clientDetails->city}}, {{$client->clientDetails->state}} {{$client->clientDetails->zip}}
                </div>
              </div>
            </div>
          </li>

          <li title="Date of Birth" class="date_of_birth">
            {{-- <img class="" width="25px" src="{{url('/')}}/images/birthday.png" /> --}}
            <span class="side-menu__icon fa fa-calendar fs-20"></span>
            {{date("m/d/Y", strtotime($client->clientDetails->dob))}}
            <img src="{{url('/')}}/images/age.jpg" width="20px" class="small" /> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}
            <p class="zodiac pt-4">
              {{strtoupper($zodiac['month'])}}/{{strtoupper($zodiac['year'])}}
              <br />
              <b>{{ zactra::translate_lang('Birthstones') }} -</b> {{strtoupper($zodiac['stone'])}}
            </p>
          </li>
          <li title="Social Security Number" class="ssn-field">
            @if(!empty($client->clientAttachments()))
              <?php $ss = $client->clientAttachments()->where('category', "SS")->first(); ?> @if(!empty($ss) && $ss->type != "pdf")
              <img type="file" class="zoomSS hide" width="25px" src="{{asset($ss->path)}}" name="img-sos" id="img-sose" />
            @else
              <img type="file" class="zoomSS hide" width="25px" src="{{url('/')}}/images/ssc.png" name="img-sos" id="img-sose" />
            @endif
            @endif
            <img class="ss_number" width="25px" src="{{url('/')}}/images/ssc.png" />

            &nbsp; <span class="ssn">{{$client->clientDetails->ssn}}</span>
          </li>

          <li title="Gender">
            @if($client->clientDetails->sex == 'M')
              <span class="side-menu__icon fa fa-mars fs-20"></span>
            <span>Male</span>
            @elseif($client->clientDetails->sex == 'F')
              <span class="side-menu__icon fa fa-mars fs-20"></span>
            <span>Female</span>
            @else
              <span class="side-menu__icon fa fa-mars fs-20"></span> <span>Non-Binary</span>
            @endif
          </li>
          @if($client->clientDetails->referred_by != null)
          <li title="Referred by">
            <i class="fa fa-user fs-20"></i>
            <span>{{ ucfirst($client->clientDetails->referred_by) }}</span>
          </li>
          @endif
          <li class="text-right p-0">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary text-white"><i class="fa fa-edit fa-fw"></i> Edit Profile</a>
          </li>
        </ul>
      </aside>
    </div>
  </div>

  <div class="col-sm-9">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ zactra::translate_lang('Report Access') }}
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('Equifax') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">{{ zactra::translate_lang('Annual Credit Report') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">{{ zactra::translate_lang('Dispute') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://my.equifax.com/membercenter/#/login" target="_blank">{{ zactra::translate_lang('Dispute Status') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://aa.econsumer.equifax.com/aad/landing.ehtml" target="_blank">{{ zactra::translate_lang('Fcra') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://my.equifax.com/membercenter/#/login" target="_blank">{{ zactra::translate_lang('Member Login') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://www.econsumer.equifax.com/otc/landing.ehtml?^start=&companyName=W18uft01_uplanr" target="_blank">{{ zactra::translate_lang('Membership Signup') }} </a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item px-3 py-3" href="#equifax" data-toggle="modal">{{ zactra::translate_lang('Login Credentials') }} </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('Experion') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">{{ zactra::translate_lang('Annual Credit Report') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://www.experian.com/ncaconline/creditreport?type=declined">{{ zactra::translate_lang('Denied') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://usa.experian.com/registration/?offer=at_fcras102,at_ltdreg100&op=FRCD-DIS-PRI-102-WGT-EXDPTAG-B1-EXP-VWIN-SEO-XXXXXX-XXXXXX-XXXXX">{{ zactra::translate_lang('Dispute') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://www.experian.com/ncaconline/disputeresults?intcmp=dispute_email_resultsready02">{{ zactra::translate_lang('Dispute Status') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://www.experian.com/ncaconline/dispute">{{ zactra::translate_lang('View Report') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://usa.experian.com/login/index?br=exp">{{ zactra::translate_lang('Member Login') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true">{{ zactra::translate_lang('Membership Signup') }}</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item px-3 py-3" href="#experian" data-toggle="modal">{{ zactra::translate_lang('Login Credentials') }} </a></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-3">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('TransUnion') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://www.annualcreditreport.com/requestReport/requestForm.action" target="_blank">{{ zactra::translate_lang('Annual Credit Report') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://dispute.transunion.com/dp/dispute/landingPage.jsp?PLACE_CTA=dispute:cta">{{ zactra::translate_lang('Dispute Login') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://disclosure.transunion.com/dc/disclosure/landingPage.jsp">{{ zactra::translate_lang('Disclosure Login') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://fraud.transunion.com/fa/fraudAlert/landingPage.jsp?incorrect=true">{{ zactra::translate_lang('Fraud Login') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://dispute.transunion.com/fa/fraudAlert/indexProcess">{{ zactra::translate_lang('New Account Registration') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://membership.tui.transunion.com/tucm/login.page?PLACE_CTA=TransUnion:PHP:Login">{{ zactra::translate_lang('Member Login') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?">{{ zactra::translate_lang('Membership Signup') }}</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item px-3 py-3" href="#transunion" data-toggle="modal">{{ zactra::translate_lang('Login Credentials') }} </a></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-3">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('Innovis') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <a class="dropdown-item px-3 py-3" href="https://www.innovis.com/creditReport/index" target="_blank">{{ zactra::translate_lang('Request Credit Report') }} </a>
                    <a class="dropdown-item px-3 py-3" href="https://www.innovis.com/personal/creditReport/orderYourInnovisCreditReport#dropdownMenu">{{ zactra::translate_lang('Login') }}</a>
                    <a class="dropdown-item px-3 py-3" href="https://www.innovis.com/securityFreeze/index">{{ zactra::translate_lang('Security Freeze') }} </a>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 mt-4 mmt-0">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('ChexSystems') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item px-3 py-3" href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/" target="_blank">
                        {{ zactra::translate_lang('Order Consumer Report') }}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 mt-4 mmt-0">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('Credit Karma') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://www.creditkarma.com/auth/logon" target="_blank">{{ zactra::translate_lang('Member Login') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://www.creditkarma.com/signup/">{{ zactra::translate_lang('Signup') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="#creditkarma" data-toggle="modal">{{ zactra::translate_lang('Login Credentials') }} </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 mt-4 mmt-0">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('Early Warning') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://www.earlywarning.com/sites/default/files/2019-01/CIC%20Form-170215-0811-SAMPLE.pdf" target="_blank">{{ zactra::translate_lang('Order Consumer Report') }} </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 mt-4 mmt-0">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('LexisNexis') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://consumer.risk.lexisnexis.com/request" target="_blank">{{ zactra::translate_lang('Order Consumer Report') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://optout.lexisnexis.com/" target="_blank">{{ zactra::translate_lang('Opt Out') }}</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item px-3 py-3" href="#">{{ zactra::translate_lang('Login Credentials') }} </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 mt-4 mmt-0">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('SageStream') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="https://forms.sagestreamllc.com/#/consumer-report-self" target="_blank">{{ zactra::translate_lang('Order Consumer Report') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://forms.sagestreamllc.com/#/freeze-self" target="_blank">{{ zactra::translate_lang('Add Security Freeze') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://forms.sagestreamllc.com/#/unfreeze-self" target="_blank">{{ zactra::translate_lang('Lift Security Freeze') }}</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 mt-4 mmt-0">
                <div class="dropdown-submenu text-left mmb-5">
                  <a href="#" class="dropdown-toggle btn btn-primary form-control" data-toggle="dropdown">
                    <span class="report_access">{{ zactra::translate_lang('Ca State Courts Access') }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item px-3 py-3" href="http://www.lacourt.org/casesummary/ui/index.aspx?casetype=civil" target="_blank">{{ zactra::translate_lang('Los Angeles County') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="https://ocapps.occourts.org/civilwebShoppingNS/Search.do#searchAnchor" target="_blank">{{ zactra::translate_lang('Orange County') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="http://public-access.riverside.courts.ca.gov/OpenAccess/CivilMainMenu.asp" target="_blank">{{ zactra::translate_lang('Riversides') }}</a></li>
                    <li><a class="dropdown-item px-3 py-3" href="http://openaccess.sb-court.org/CIVIL/" target="_blank">{{ zactra::translate_lang('San Bernandino County') }} </a></li>
                    <li><a class="dropdown-item px-3 py-3" href="http://www.ventura.courts.ca.gov/CivilCaseSearch/" target="_blank">{{ zactra::translate_lang('Ventura County') }} </a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $status = [null=>''] + \App\Disputable::STATUS ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ zactra::translate_lang('Work History') }}
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{ zactra::translate_lang('#') }}</th>
                    <th scope="col">{{ zactra::translate_lang('View') }}</th>
                    <th scope="col">{{ zactra::translate_lang('Title') }}</th>
                    <th scope="col">{{ zactra::translate_lang('Status') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($toDos->where('status', 2) as $todo)
                  <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td class="pdateview" data-id="{{$todo->id}}">
                      <i class="fa fa-eye text-info" style="cursor: pointer;"></i>
                    </td>
                    <td class="">{{$todo->title}}</td>
                    <td class="">{{$status[$todo->status]}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ zactra::translate_lang('To Do') }}
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{ zactra::translate_lang('#') }}</th>
                    <th scope="col">{{ zactra::translate_lang('View') }}</th>
                    <th scope="col">{{ zactra::translate_lang('Title') }}</th>
                    <th scope="col">{{ zactra::translate_lang('Status') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($toDos->where('status', '!=',2) as $todo)
                  <tr>
                    <td class="font-weight-normal showDetails" data-id="{{$todo->id}}">
                      {{$loop->iteration}}
                    </td>
                    <td class="updateview" data-id="{{$todo->id}}">
                      <i class="fa fa-eye text-info" style="cursor: pointer;"></i>
                    </td>
                    <td class="showDetails" data-id="{{$todo->id}}">{{$todo->title}}</td>
                    <td class="showDetails" data-id="{{$todo->id}}">{{$status[$todo->status]}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="account-details"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ zactra::translate_lang('Credit Reports') }}
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 mt20">
                <div class="dropdown">
                  <h3 class="report_access"><b>{{ zactra::translate_lang('Equifax') }}</b></h3>
                  <div class="dropdown-content equifax" style="height: 150px !important; overflow: scroll;">
                    <a href="https://my.equifax.com/membercenter/#/login" target="_blank"> Login</a>
                    <a href="{{route('adminRec.credentials',['source'=> 'equifax', 'id'=>$client->id])}}">Credentials</a>
                    <a href="#">{{ zactra::translate_lang('Registration') }}</a>
                    <a href="#">{{ zactra::translate_lang('Fcra Access') }}</a>
                    <a href="#">{{ zactra::translate_lang('Dispute Access') }}</a>
                    <a href="#">{{ zactra::translate_lang('Annual Report') }}</a>
                    <a href="#">{{ zactra::translate_lang('Archive') }}</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mt20">
                <div class="dropdown">
                  <h3 class="report_access"><b>{{ zactra::translate_lang('Experian') }}</b></h3>
                  <div class="dropdown-content experina" style="height: 150px !important; overflow: scroll;">
                    <a class="queue" data-report="EXLOGIN" data-client="{{$client->id}}">{{ zactra::translate_lang('Login') }}</a>
                    <a href="{{route('adminRec.credentials',['source'=> 'experian','id'=>$client->id])}}">{{ zactra::translate_lang('Credentials') }}</a>
                    <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">{{ zactra::translate_lang('Registeration') }}</a>
                    <a href="#">{{ zactra::translate_lang('Denied') }}</a>
                    <a class="queue" data-report="EXVIEW" data-client="{{$client->id}}">{{ zactra::translate_lang('View Report') }}</a>
                    <a href="#">{{ zactra::translate_lang('Report Numbers') }}</a>
                    <a href="#">{{ zactra::translate_lang('Annual Report') }}</a>
                    <a href="#">{{ zactra::translate_lang('Archive') }}</a>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mt20">
                <div class="dropdown">
                  <h3 class="report_access"><b>{{ zactra::translate_lang('TransUnion') }}</b></h3>
                  <div class="dropdown-content transunion" style="height: 150px !important; overflow: scroll;">
                    <div class="">
                      <a class="queue p-1" data-report="TUMEMBER" data-client="{{$client->id}}">{{ zactra::translate_lang('Member Login') }} </a>
                      <a class="p-1" href="{{route('client.credentials',['source'=> 'transunion_member', 'id'=>$client->id])}}">{{ zactra::translate_lang('Member Credentials') }}</a>
                      <a class="p-1" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?offer=3BM10246&PLACE_CTA=top_right_search" target="_blank">{{ zactra::translate_lang('Member Registration') }}</a>
                      <hr />
                    </div>
                    <div class="">
                      <a class="p-1" class="queue" data-report="TUDISPUTE" data-client="{{$client->id}}">{{ zactra::translate_lang('Dispute Login') }}</a>
                      <a class="p-1" href="{{route('adminRec.credentials',['source'=> 'transunion_dispute', 'id'=>$client->id])}}" target="_blank">{{ zactra::translate_lang('Dispute Credentials') }}</a>
                      <a class="p-1" href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">{{ zactra::translate_lang('Dispute Registration') }}</a>
                      <hr />
                    </div>
                    <div class="">
                      <a class="p-1" href="#" target="_blank">{{ zactra::translate_lang('Fraud Login') }}</a>
                      <a class="p-1" href="{{route('adminRec.credentials',['source'=> 'null', 'id'=>$client->id])}}">{{ zactra::translate_lang('Fraud Credentials') }}</a>
                      <a class="p-1" href="#">{{ zactra::translate_lang('Fraud Registration') }}</a>
                      <hr />
                    </div>
                    <div class="">
                      <a class="p-1" href="#" target="_blank">{{ zactra::translate_lang('Annual Report') }}</a>
                      <hr />
                    </div>
                    <div class="">
                      <a class="p-1" href="#">{{ zactra::translate_lang('Archive') }}</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mt20">
                <div class="dropdown">
                  <h3 class="report_access"><b>{{ zactra::translate_lang('Other Reports') }}</b></h3>
                  <div class="dropdown-content" style="height: 150px !important; overflow: scroll;">
                    <div class="">
                      <ul class="dropdown-submenu mb-0">
                        <a class="queue" data-report="EQ" data-client="{{$client->id}}">
                          <span class="report_access">{{ zactra::translate_lang('Credit Karma') }}</span>
                        </a>
                      </ul>
                      <ul class="dropdown-submenu mb-0">
                        <a
                          href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/"
                          class="" data-toggle="dropdown" target="_blank">
                          <span class="report_access">{{ zactra::translate_lang('Chex Systems') }}</span>
                        </a>
                      </ul>
                      <ul class="dropdown-submenu mb-0">
                        <a href="https://consumer.risk.lexisnexis.com/request" class="" data-toggle="dropdown" target="_blank">
                          <span class="report_access">{{ zactra::translate_lang('Lexis Nexis') }}</span>
                        </a>
                      </ul>
                      <ul class="dropdown-submenu mb-0">
                        <a href="https://www.earlywarning.com/sites/default/files/2019-01/CIC%20Form-170215-0811-SAMPLE.pdf" class="" data-toggle="dropdown" target="_blank">
                          <span class="report_access">{{ zactra::translate_lang('Early Warning') }}</span>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="charts pb50 mt50">
      <div class="container-fluid">
        <div class="row"></div>
      </div>
    </section>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title" id="exampleModalLabel">{{ zactra::translate_lang('Update Your Profile') }}</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => ['adminRec.client.update', $client->id], 'method' => 'POST', 'id' => 'update_info', 'class' => 'm-form m-form--label-align-right']) !!}
        @method('PUT')
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            {{ Form::text('client[full_name]', $client->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'Full Name']) }}
          </div>
          <div class="form-group col-md-6">
            {{ Form::text('client[phone_number]', $client->clientDetails->phone_number, ['class' => 'form-control m-input', 'placeholder' => 'Phone Number']) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {{ Form::text('client[address]', strtoupper($client->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'Current Street Address']) }}
          </div>
          <div class="form-group col-md-6">
            {{ Form::select('client[sex]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], $client->clientDetails->sex, ['class'=>'form-control']) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="submit" value="Update" class="btn btn-primary pull-right">{{ zactra::translate_lang('Update') }}</button>
          </div>
        </div>
        {!! Form::close() !!}
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
            <h3>{{ zactra::translate_lang('Equifax Credentials') }}</h3>
            <li>{{ zactra::translate_lang('Login:') }} {{isset($client->credentials->eq_login)?$client->credentials->eq_login: "N/A"}}</li>
            <li>{{ zactra::translate_lang('Password:') }} {{isset($client->credentials->eq_password)?$client->credentials->eq_password:"N\A"}}</li>
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
            <h3>{{ zactra::translate_lang('Experian Credentials') }}</h3>
            <li>{{ zactra::translate_lang('Login:') }} {{isset($client->credentials->ex_login)?$client->credentials->ex_login: "N/A"}}</li>
            <li>{{ zactra::translate_lang('Password:') }} {{isset($client->credentials->ex_password)?$client->credentials->ex_password:"N\A"}}</li>
            <li>{{ zactra::translate_lang('Answer:') }} {{isset($client->credentials->ex_question)?$client->credentials->ex_question:"N\A"}}</li>
            <li>{{ zactra::translate_lang('Pin Number:') }} {{isset($client->credentials->ex_pin)?$client->credentials->ex_pin:"N\A"}}</li>
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
            <h3>{{ zactra::translate_lang('TransUnion Credentials') }}</h3>
            <li>{{ zactra::translate_lang('Login:') }} {{isset($client->credentials->tu_login)?$client->credentials->tu_login: "N/A"}}</li>
            <li>{{ zactra::translate_lang('Password:') }} {{isset($client->credentials->tu_password)?$client->credentials->tu_password:"N\A"}}</li>
            <li>{{ zactra::translate_lang('Question:') }} {{isset($client->credentials->tu_question)?$client->credentials->tu_question:"N\A"}}</li>
            <li>{{ zactra::translate_lang('Answer:') }} {{isset($client->credentials->tu_answer)?$client->credentials->tu_answer:"N\A"}}</li>
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
            <h3>{{ zactra::translate_lang('Credit Karma Credentials') }}</h3>
            <li>{{ zactra::translate_lang('Login:') }} {{isset($client->credentials->ck_login)?$client->credentials->ck_login: "N/A"}}</li>
            <li>{{ zactra::translate_lang('Password:') }} {{isset($client->credentials->ck_password)?$client->credentials->ck_password:"N\A"}}</li>
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
            <div id="todo"></div>
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
        <div id="mapid" style="height: 500px;"></div>
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
          <input type="file" name="attach" class="form-control" />
        </div>

        <div class="form-group">
          <input type="submit" value="SEND" class="btn btn-primary" />
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/lib/leaflet.css')}}" />
<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css" />
<style>
  .scrollDiv {
    height: 270px;
    background-color: white;
    overflow-y: auto;
  }
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .charts {
    color: #16181b !important;
  }
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 100%;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }
  .dropdown-content.experina {
    background-color: #f1f1f1;
    width: 150px;
  }
  .dropdown-content.experina a {
    color: black;
  }
  .dropdown-content.equifax {
    background-color: #f1f1f1;
    width: 150px;
  }
  .dropdown-content.equifax a {
    color: black;
  }

  .dropdown-content.transunion {
    background-color: #f1f1f1;
    width: 150px;
  }
  .dropdown-content.transunion a {
    color: black;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    background-color: #3e8e41;
  }

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
    background-size: 100%;
    background-repeat: no-repeat;
    /* background-position: center; */
    min-height: 200px !important;
  }
  .social_security {
    background-image: url(/images/correct-ss.png);
    display: block;
    background-size: 100%;
    background-repeat: no-repeat;
    /* background-position: center; */
    min-height: 200px !important;
  }
  .driver_license:after,
  .social_security:after {
    pointer-events: none;
    position: absolute;
    top: 50px;
    left: 0;
    width: 70px;
    right: 0;
    height: 76px;
    content: "";
    background-image: url(/images/upload.png);
    display: block;
    margin: 0 auto;
    background-size: 70%;
    background-repeat: no-repeat;
  }
  /* .driver_license:before, .social_security:before {
          position: absolute;
          bottom: 0px;
          left: 0;  pointer-events: none;
          width: 100%;
          right: 0;
          top: -35px;
          height: 57px;
          content: "choose or drag it here. ";
          display: block;
          margin: 0 auto;
          color: #341d31;
          font-weight: 900;
          font-size: 20px;
          text-transform: capitalize;
          text-align: center;
      } */

  .driver_dropp,
  .social_dropp {
    display: block;
    background-size: 80%;
    background-repeat: no-repeat;
    background-position: center;
  }
  .driver_dropp:before {
    position: absolute;
    bottom: 0px;
    left: 0;
    pointer-events: none;
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
    left: 0;
    pointer-events: none;
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
    transform: translate(225%, 150%) scale(6.5);
    transition: transform 0.5s ease-in-out;
    position: fixed;
  }
  .zoomSS:hover {
    transform: translate(225%, -50%) scale(6.5);
    transition: transform 0.5s ease-in-out;
    position: fixed;
  }
  .scaleDL {
    transform: translate(225%, 150%) scale(6.5);
    transition: transform 0.5s ease-in-out;
    position: fixed;
  }
  .scaleSS {
    transform: translate(225%, -50%) scale(6.5);
    transition: transform 0.5s ease-in-out;
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
  .responsive.small {
    width: 10%;
    padding-right: 0px !important;
  }

  .addressImage {
    width: 100%;
    height: auto;
    padding-right: 5px;
  }
  .address {
    width: 100%;
    height: auto;
    padding: 0;
    float: left;
  }
  .address1 {
    width: 16.6%;
    height: auto;
    padding: 0;
    float: left;
  }
  .address2 {
    width: 83%;
    height: auto;
    padding: 0;
    float: left;
  }
  .refferred {
    font-size: 2vw !important;
  }

  .zodiac {
    display: none;
  }
  .date_of_birth:hover .zodiac {
    display: block;
  }
  .showDetails {
    cursor: pointer;
  }
  .hide {
    display: none !important;
  }
  .hidden {
    display: none !important;
  }
  .show {
    display: block !important;
  }
</style>

@endsection @section('js')

<script src="{{asset('js/lib/leaflet.js')}}"></script>
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>

<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
<script src="{{ asset('js/lib/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>

{{-- document upload validation--}}
<script type="text/javascript">
  $(document).ready(function () {
    $("#doc_sunb").validate({
      rules: {
        social: {
          required: "#driver_license:blank",
        },
        driver: {
          required: "#social_security:blank",
        },
      },

      errorPlacement: function (error, element) {
        error.insertAfter($(element));
      },
    });
  });
</script>

{{-- hin chartna--}}
<script type="text/javascript">
  var per1 = $(".progress.p1").attr("data-1");
  var per2 = $(".progress.p1").attr("data-2");
  $(".p1 .number h2").text(per1);
  var val1 = 440 - (440 * per1) / 100;
  var val2 = (440 * per2) / 100;
  var val3 = val1 - val2;
  console.log(val1, val2, per2);

  $(".p1 svg circle:nth-child(2)").animate({ "stroke-dashoffset": val3 }, 1000);
  $(".p1 svg circle:nth-child(3)").animate({ "stroke-dashoffset": val1 }, 1000);
</script>

{{-- nkar mecacnel poqracnel--}}
<script type="text/javascript">
  $(document).ready(function () {
    $(".ssn").mask("999-99-9999");

    $(".file-box").on("change", function (e) {
      var file = e.target.files[0];
      var _this = this;
      if (file.type == "application/pdf") {
        var fileReader = new FileReader();
        fileReader.onload = function () {
          var pdfData = new Uint8Array(this.result);
          var loadingTask = pdfjsLib.getDocument({ data: pdfData });
          loadingTask.promise.then(
            function (pdf) {
              // Fetch the first page
              var pageNumber = 1;
              pdf.getPage(pageNumber).then(function (page) {
                var scale = 1.5;
                var viewport = page.getViewport({ scale: scale });

                // Prepare canvas using PDF page dimensions
                var canvas = $("#pdfViewer")[0];
                var context = canvas.getContext("2d");
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                // Render PDF page into canvas context
                var renderContext = {
                  canvasContext: context,
                  viewport: viewport,
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function () {
                  // console.log(canvas.toDataURL("image/png", 0.8))
                  $(_this).css("background-image", 'url("' + $("#pdfViewer").get(0).toDataURL("image/jpeg", 0.8) + '")');
                  $(_this).css("background-size", "200px");
                });
              });
            },
            function (reason) {
              console.error(reason);
            }
          );
        };
        fileReader.readAsArrayBuffer(file);
      }
    });

    $(".closeUpload").click(function (e) {
      e.preventDefault();

      var hideShow = $(".updateLogo").attr("class");
      if (hideShow.search("hide") != -1) {
        $(".updateLogo").removeClass("hide");
      } else {
        $(".updateLogo").addClass("hide");
      }
      // $(".changeLogo").addClass("hide")
    });

    $(document).on("click", function () {
      var scaleSS = $(".zoomSS").attr("class");
      var scaleDL = $(".zoomDL").attr("class");
      var full_name = $(".full_name").attr("class");
      var ssn = $(".ss_number").attr("class");

      if (scaleSS.search("scaleSS") != -1) {
        $(".zoomSS").removeClass("scaleSS");
        $(".zoomSS").addClass("hide");
      }
      if (scaleDL.search("scaleDL") != -1) {
        $(".zoomDL").removeClass("scaleDL");
        $(".zoomDL").addClass("hide");
      }
      if (full_name.search("hide") != -1) {
        $(".full_name").removeClass("hide");
      }
      if (ssn.search("hide") != -1) {
        $(".ss_number").removeClass("hide");
      }
    });

    $(".dl-field").mouseover(function () {
      $(".zoomDL").removeClass("hide");
      $(".full_name").addClass("hide");
    });
    $(".dl-field").mouseout(function () {
      var scaleDL = $(".zoomDL").attr("class");
      if (scaleDL.search("scaleDL") == -1) {
        $(".zoomDL").addClass("hide");
        $(".full_name").removeClass("hide");
      }
    });

    $(".ssn-field").mouseover(function () {
      $(".zoomSS").removeClass("hide");
      $(".ss_number").addClass("hide");
    });
    $(document).on("mouseout", ".ssn-field", function () {
      if (!$(".zoomSS").hasClass("scaleSS")) {
        $(".zoomSS").addClass("hide");
        $(".ss_number").removeClass("hide");
      }
    });

    $(".zoomSS").dblclick(function () {
      var scale = $(".zoomSS").attr("class");
      if (scale.search("scaleSS") == -1) {
        $(".zoomSS").addClass("scaleSS");
      }
    });

    $(".zoomDL").dblclick(function () {
      var scale = $(".zoomDL").attr("class");
      if (scale.search("scaleDL") == -1) {
        $(".zoomDL").addClass("scaleDL");
      }
    });
  });
</script>

{{-- quue--}}
<script type="text/javascript">
  $(document).ready(function () {
    $(".queue").click(function () {
      var bureau = $(this).attr("data-report");
      var clientId = $(this).attr("data-client");
      console.log("experian-login", bureau, clientId);
      var token = "<?= csrf_token()?>";

      $.ajax({
        url: "/admins/client/report/queue",
        type: "POST",
        data: {
          client_id: clientId,
          bureau: bureau,
          _token: token,
        },
        success: function (response) {
          // bootbox.alert({
          //     message: "Your request in queue!!!",
          //     backdrop: true,
          //     centerVertical: true
          //
          // });

          bootbox
            .alert("Your request in queue!!!")
            .find(".modal-content")
            .css({
              "font-weight": "bold",
              color: "#442FFF",
              "font-size": "2em",
              "margin-top": function () {
                var w = $(window).height();
                var b = $(".modal-dialog").height();
                console.log(b);
                // should not be (w-h)/2
                var h = (0.8 * w) / 2;
                return h + "px";
              },
            });
        },
        error: function (error) {},
      });
    });
  });
</script>

<script src="{{url('/')}}/js/lib/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: "textarea.tinymce-editor",
    height: 250,
    menubar: false,
    plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste code wordcount"],
    toolbar: "undo redo | formatselect | " + "bold italic backcolor | alignleft aligncenter " + "alignright alignjustify | bullist numlist outdent indent | " + "removeformat | help",
    content_css: "//www.tiny.cloud/css/codepen.min.css",
  });
</script>

{{-- google map--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places"></script>

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

{{-- ajax client profile--}}
<script>
  $(document).ready(function () {
    $(".ssn").mask("999-99-9999");
    $("#phone_number").mask("(000) 000-0000");
    $(".phone").mask("(000) 000-0000");

    $(".updateview").click(function () {
      var todo = $(this).attr("data-id");
      var token = "<?= csrf_token()?>";

      $.ajax({
        url: "/admins/client/profile/todo",
        type: "POST",
        data: {
          id: todo,
          _token: token,
        },
        dataType: "html",
        success: function (response) {
          var result = JSON.parse(response);
          $("#toDoModal").modal();
          $("#todo").html(result.view);
        },
        error: function (error) {},
      });
    });

    $(".showDetails").click(function () {
      var todo = $(this).attr("data-id");

      console.log(todo, "asd");
      $.ajax({
        url: "/admins/client/todo/details",
        type: "get",
        data: {
          id: todo,
        },
        dataType: "html",
        success: function (response) {
          var result = JSON.parse(response);
          $("#account-details").html(result.view);
        },
        error: function (error) {},
      });
    });
  });
</script>

{{-- map--}}
<script>
  $(document).ready(function () {
    var mymap = L.map("mapid");
    $.get(location.protocol + "//nominatim.openstreetmap.org/search?format=json&q={{$client->clientDetails->address}}", function (data) {
      console.log(data);
      mymap.setView([data[0]["lat"], data[0]["lon"]], 17);
      L.marker([data[0]["lat"], data[0]["lon"]]).addTo(mymap);
    });

    L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(mymap);
    mymap.invalidateSize();
    $("#mapModal").on("shown.bs.modal", function (e) {
      mymap.invalidateSize();
    });
  });
</script>
@endsection
