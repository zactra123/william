@extends('layouts.layout1')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css" />
<style>
  .charts {
    color: #16181b !important;
  }

  .chart-report {
    /*backgrouREMOVE DISPUTEnd-color: #d4ddec;*/
    padding: 15px;
    box-shadow: 0 0 5px 1px #0000005c;
    opacity: 1;
  }
  .customcheck {
    display: block;
    width: 100%;
    height: 25px;
  }

  .border {
    border-top: #b4c4dd 1px solid;
  }
  @media (max-width: 900px) {
    .customcheck {
      display: block;
      width: 15%;
      height: 25px;
    }
  }
</style>
@section('content')
<section class="header-title section-padding">
  <div class="container text-center">
    <h2 class="title">{{ zactra::translate_lang('Check Chosen Dispute') }}</h2>
    <span class="sub-title"><a href="#">{{ zactra::translate_lang('Home') }}</a> &gt; {{ zactra::translate_lang('Check Dispute Option') }}</span>
  </div>
</section>
<section class="charts working-section">
  <div class="container-fluid">
    <div class="Experian" style="display: block;">
      <div class="row mt20">
        <div class="col-md-1 mt20"></div>
        <div class="col-md-10 mt20">
          {!! Form::open(['route' => ['affiliate.negative.contract', $userId], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}
          @csrf
          @if(!empty($data['ex_name']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row mt20">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE NAME') }}</span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <span style="font-weight: bold; font-size: 16px;"></span>
              </div>
            </div>
            @foreach($data['ex_name'] as $names)
            <div class="row mt20 border title-name-{{$names->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <span style="font-weight: bold;"> {{$names->full_name}} </span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-4 delete-name ex_personal" data-attribute="title-name-{{$names->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="ex_name[{{$names->id}}][id]" value="{{$names->id}}" />
              </div>
            </div>
            <div class="row mt20 title-name-{{$names->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="name-{{$names->id}}" data-name="{{$names->id}}" class="ex_name_fix" name="ex_name[{{$names->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="ex_name_fix" data-name="{{$names->id}}" name="ex_name[{{$names->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-name-{{$names->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="nameInput-{{$names->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['tu_name']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row mt20">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold; font-size: 16px;"> {{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE TRANS UNION NAME') }}</span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <span style="font-weight: bold; font-size: 16px;"></span>
              </div>
            </div>
            @foreach($data['tu_name'] as $names)
            <div class="row mt20 border title-name-{{$names->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <span style="font-weight: bold;"> {{$names->full_name}} </span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-4 delete-name tu_personal" data-attribute="title-name-{{$names->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="tu_name[{{$names->id}}][id]" value="{{$names->id}}" />
              </div>
            </div>
            <div class="row mt20 title-name-{{$names->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="name-{{$names->id}}" data-name="{{$names->id}}" class="tu_name_fix" name="tu_name[{{$names->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="tu_name_fix" data-name="{{$names->id}}" name="tu_name[{{$names->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-name-{{$names->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="nameInput-{{$names->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['eq_name']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row mt20">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold; font-size: 16px;"> {{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE EQUIFAX NAME') }}</span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <span style="font-weight: bold; font-size: 16px;"></span>
              </div>
            </div>
            @foreach($data['eq_name'] as $names)
            <div class="row mt20 border title-name-{{$names->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <span style="font-weight: bold;"> {{$names->full_name}} </span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-4 delete-name eq_personal" data-attribute="title-name-{{$names->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="eq_name[{{$names->id}}][id]" value="{{$names->id}}" />
              </div>
            </div>
            <div class="row mt20 title-name-{{$names->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="name-{{$names->id}}" data-name="{{$names->id}}" class="eq_name_fix" name="eq_name[{{$names->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="eq_name_fix" data-name="{{$names->id}}" name="eq_name[{{$names->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-name-{{$names->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="nameInput-{{$names->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['ex_employ']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row mt20">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE EMPLOYER') }}</span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <span style="font-weight: bold; font-size: 16px;"></span>
              </div>
            </div>
            @foreach($data['ex_employ'] as $employer)
            <div class="row mt20 border title-employer-{{$employer->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <span style="font-weight: bold;"> {{$employer->name}} </span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2 delete-name ex_personal" data-attribute="title-employer-{{$employer->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="ex_employer[{{$employer->id}}][id]" value="{{$employer->id}}" />
              </div>
            </div>
            <div class="row mt20 title-employer-{{$employer->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="employer-{{$employer->id}}" data-name="{{$employer->id}}" class="ex_employer_fix" name="employer[{{$employer->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="ex_employer_fix" data-name="{{$employer->id}}" name="employer[{{$employer->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-employer-{{$employer->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="employerInput-{{$employer->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['tu_employ']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row mt20">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE EMPLOYER') }}</span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <span style="font-weight: bold; font-size: 16px;"></span>
              </div>
            </div>
            @foreach($data['tu_employ'] as $employer)
            <div class="row mt20 border title-employer-{{$employer->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <span style="font-weight: bold;"> {{$employer->name}} </span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2 delete-name tu_personal" data-attribute="title-employer-{{$employer->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="tu_employer[{{$employer->id}}][id]" value="{{$employer->id}}" />
              </div>
            </div>
            <div class="row mt20 title-employer-{{$employer->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="employer-{{$employer->id}}" data-name="{{$employer->id}}" class="tu_employer_fix" name="tu_employer[{{$employer->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="tu_employer_fix" data-name="{{$employer->id}}" name="tu_employer[{{$employer->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-employer-{{$employer->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="employerInput-{{$employer->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['eq_employ']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row mt20">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE EMPLOYER') }}</span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <span style="font-weight: bold; font-size: 16px;"></span>
              </div>
            </div>
            @foreach($data['eq_employ'] as $employer)
            <div class="row mt20 border title-employer-{{$employer->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <span style="font-weight: bold;"> {{$employer->name}} </span>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2 delete-name eq_personal" data-attribute="title-employer-{{$employer->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="eq_employer[{{$employer->id}}][id]" value="{{$employer->id}}" />
              </div>
            </div>
            <div class="row mt20 title-employer-{{$employer->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="employer-{{$employer->id}}" data-name="{{$employer->id}}" class="eq_employer_fix" name="eq_employer[{{$employer->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="eq_employer_fix" data-name="{{$employer->id}}" name="eq_employer[{{$employer->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-employer-{{$employer->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="employerInput-{{$employer->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['ex_address']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6" style="font-weight: bold; font-size: 16px;">
                {{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE EXPERIAN ADDRESS') }}
              </div>
              <div class="col-md-2" style="font-weight: bold;"></div>
            </div>
            @foreach($data['ex_address'] as $address)
            <div class="row mt20 border title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span class="">{{$address->street}}, </span>
                <span class="">{{$address->city}}, </span>
                <span class="">{{$address->state}}, </span>
                <span class="">{{$address->zip}}</span>
              </div>
              <div class="col-md-2 delete-name ex_personal" data-attribute="title-address-{{$address->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="ex_address[{{$address->id}}][id]" value="{{$address->id}}" />
              </div>
            </div>
            <div class="row mt20 title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="address-{{$address->id}}" data-name="{{$address->id}}" class="ex_address_fix" name="ex_address[{{$address->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="ex_address_fix" data-name="{{$address->id}}" name="ex_address[{{$address->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="addressInput-{{$address->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['tu_address']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6" style="font-weight: bold; font-size: 16px;">
                {{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE TRANS UNION ADDRESS') }}
              </div>
              <div class="col-md-2" style="font-weight: bold;"></div>
            </div>
            @foreach($data['tu_address'] as $address)
            <div class="row mt20 border title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span class="">{{$address->street}}, </span>
                <span class="">{{$address->city}}, </span>
                <span class="">{{$address->state}}, </span>
                <span class="">{{$address->zip}}</span>
              </div>
              <div class="col-md-2 delete-name tu_personal" data-attribute="title-address-{{$address->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="tu_address[{{$address->id}}][id]" value="{{$address->id}}" />
              </div>
            </div>
            <div class="row mt20 title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="address-{{$address->id}}" data-name="{{$address->id}}" class="tu_address_fix" name="tu_address[{{$address->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="tu_address_fix" data-name="{{$address->id}}" name="tu_address[{{$address->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="addressInput-{{$address->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['eq_address']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6" style="font-weight: bold; font-size: 16px;">
                {{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE EQUIFAX ADDRESS') }}
              </div>
              <div class="col-md-2" style="font-weight: bold;"></div>
            </div>
            @foreach($data['eq_address'] as $address)
            <div class="row mt20 border title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span class="">{{$address->street}}, </span>
                <span class="">{{$address->city}}, </span>
                <span class="">{{$address->state}}, </span>
                <span class="">{{$address->zip}}</span>
              </div>
              <div class="col-md-2 delete-name eq_personal" data-attribute="title-address-{{$address->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="eq_address[{{$address->id}}][id]" value="{{$address->id}}" />
              </div>
            </div>
            <div class="row mt20 title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="address-{{$address->id}}" data-name="{{$address->id}}" class="eq_address_fix" name="eq_address[{{$address->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="eq_address_fix" data-name="{{$address->id}}" name="eq_address[{{$address->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-address-{{$address->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="addressInput-{{$address->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['ex_phone']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6" style="font-weight: bold;">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE PHONE #') }} </span>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-1"></div>
            </div>
            @foreach($data['ex_phone'] as $phone)
            <div class="row mt20 border title-phone-{{$phone->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold;">{{$phone->number}} </span>
              </div>
              <div class="col-md-2 delete-name ex_personal" data-attribute="title-phone-{{$phone->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="ex_phone[{{$phone->id}}][id]" value="{{$phone->id}}" />
              </div>
            </div>
            <div class="row mt20 title-phone-{{$phone->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="phone-{{$phone->id}}" data-name="{{$phone->id}}" class="ex_phone_fix" name="ex_phone[{{$phone->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="ex_phone_fix" data-name="{{$phone->id}}" name="ex_phone[{{$phone->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-phone-{{$phone->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="phoneInput-{{$phone->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['tu_phone']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6" style="font-weight: bold;">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: DISPUTE PHONE #') }} </span>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-1"></div>
            </div>
            @foreach($data['tu_phone'] as $phone)
            <div class="row mt20 border title-phone-{{$phone->id}}">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span style="font-weight: bold;">{{$phone->number}} </span>
              </div>
              <div class="col-md-2 delete-name tu_personal" data-attribute="title-phone-{{$phone->id}}">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <input type="hidden" name="tu_phone[{{$phone->id}}][id]" value="{{$phone->id}}" />
              </div>
            </div>
            <div class="row mt20 title-phone-{{$phone->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                <input type="radio" id="phone-{{$phone->id}}" data-name="{{$phone->id}}" class="tu_phone_fix" name="tu_phone[{{$phone->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                <input type="radio" class="tu_phone_fix" data-name="{{$phone->id}}" name="tu_phone[{{$phone->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
              </div>
            </div>
            <div class="row m-2 title-phone-{{$phone->id}}" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div id="phoneInput-{{$phone->id}}"></div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if(!empty($data['personal_price']))
          <div class="mt20"></div>
          <div class="chart-report">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6" style="font-weight: bold;">
                <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('PERSONAL INFORMATION: PRICE') }} </span>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-1"></div>
            </div>
            <div class="row mt20 border title-personal-information">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-2 delete-name" data-attribute="title-personal-information"></div>
            </div>
            <div class="row m-2 title-personal-information" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6"></div>
              <div class="col-md-5">
                <div id="personalInfoPrice">
                  @if(!empty($data['personal_price']['ex_personal']['inaccurate']) )
                  <div class="col-md-12" id="exPersonalInfo">
                    {{ zactra::translate_lang('EXPERINA PERSOANL INFORMATION PRICE $') }}
                    <div class="price">{{$data['personal_price']['ex_personal']['inaccurate']}}</div>
                  </div>
                  @endif
                  @if(!empty($data['personal_price']['tu_personal']['inaccurate']))
                  <div class="col-md-12" id="tuPersonalInfo">
                    {{ zactra::translate_lang('TRANS UNION PERSOANL INFORMATION PRICE $') }}
                    <div class="price">{{$data['personal_price']['tu_personal']['inaccurate']}}</div>
                  </div>
                  @endif
                  @if(!empty($data['personal_price']['tu_personal']['inaccurate']) )
                  <div class="col-md-12" id="tuPersonalInfo">
                    {{ zactra::translate_lang('EQUOFAX PERSOANL INFORMATION PRICE $') }}
                    <div class="price" id="eqPersonalInfo">{{$data['personal_price']['eq_personal']['inaccurate']}}</div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endif
          @if(!empty($data['ex_statement']))
            @foreach(($data['ex_statement']) as $ex_statement)
              @if(!empty($ex_statement['ex_statement']))
              <div class="mt20 title-ex_statement-{{$ex_statement['ex_statement']->id}}"></div>
              <div class="chart-report title-ex_statement-{{$ex_statement['ex_statement']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <span class="">{{$ex_statement['ex_statement']->statement}} </span>
                  </div>
                  <div class="col-md-5">
                    <div class="row">
                      <div class="col-md-12 delete-name" data-attribute="title-ex_statement-{{$ex_statement['ex_statement']->id}}">
                        <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        <input type="hidden" name="ex_statement[{{$ex_statement['ex_statement']->id}}][id]" value="{{$ex_statement['ex_statement']->id}}" />
                      </div>
                    </div>
                    <div class="row mt20 title-ex_statement-{{$ex_statement['ex_statement']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                        <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                        <input type="radio" id="ex_statement-{{$ex_statement['ex_statement']->id}}" data-name="{{$ex_statement['ex_statement']->id}}" data-price="{{$ex_statement['price']['inaccurate']}}" class="ex_statement_fix" name="ex_statement[{{$ex_statement['ex_statement']->id}}][type]" value="{{ zactra::translate_lang('fix') }}" />
                        <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                        <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                        <input type="radio" class="ex_statement_fix" data-name="{{$ex_statement['ex_statement']->id}}" data-price="{{$ex_statement['price']['not_mine']}}" name="ex_statement[{{$ex_statement['ex_statement']->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
                      </div>
                    </div>
                    <div class="row  title-ex_statement-{{$ex_statement['ex_statement']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="exStatementInput-{{$ex_statement['ex_statement']->id}}"></div>
                      </div>
                    </div>
                    <div class="row  title-ex_statement-{{$ex_statement['ex_statement']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="exStatementPrice-{{$ex_statement['ex_statement']->id}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endforeach
          @endif
          @if(!empty($data['tu_statement']))
            @foreach(($data['tu_statement']) as $tu_statement)
              @if(!empty($tu_statement['tu_statement']))
              <div class="mt20 title-tu_statement-{{$tu_statement['tu_statement']->id}}"></div>
              <div class="chart-report title-tu_statement-{{$tu_statement['tu_statement']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <span class="">{{$tu_statement['tu_statement']->statement}} {{$tu_statement['tu_statement']->description}} </span>
                  </div>
                  <div class="col-md-5">
                    <div class="row">
                      <div class="col-md-12 delete-name" data-attribute="title-tu_statement-{{$tu_statement['tu_statement']->id}}">
                        <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                        <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                        <input type="hidden" name="tu_statement[{{$tu_statement['tu_statement']->id}}][id]" value="{{$tu_statement['tu_statement']->id}}" />
                      </div>
                    </div>
                    <div class="row mt20 title-tu_statement-{{$tu_statement['tu_statement']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                        <label for="fix">{{ zactra::translate_lang('Fix') }}</label>
                        <input type="radio" id="tu-{{$tu_statement['tu_statement']->id}}" data-name="{{$tu_statement['tu_statement']->id}}" data-price="{{$tu_statement['price']['inaccurate']}}" class="tu_statement_fix" name="tu_statement[{{$tu_statement['tu_statement']->id}}][type]" value="{{ zactra::translate_lang('fix') }}">
                        <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                        <label for="delete">{{ zactra::translate_lang('Delete') }} </label>
                        <input type="radio" class="tu_statement_fix" data-name="{{$tu_statement['tu_statement']->id}}" data-price="{{$tu_statement['price']['inaccurate']}}" name="tu_statement[{{$tu_statement['tu_statement']->id}}][type]" value="{{ zactra::translate_lang('delete') }}" />
                      </div>
                    </div>
                    <div class="row mt20 title-tu_statement-{{$tu_statement['tu_statement']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="tuStatementInput-{{$tu_statement['tu_statement']->id}}"></div>
                      </div>
                    </div>
                    <div class="row mt20 title-tu_statement-{{$tu_statement['tu_statement']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="tuStatementPrice-{{$tu_statement['tu_statement']->id}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endforeach
          @endif
          @if(!empty($data['ex_public']))
            @foreach($data['ex_public'] as $ex_public)
            <div class="mt20 title-ex_public-{{$ex_public['ex_public']->id}}"></div>
            <div class="chart-report title-ex_public-{{$ex_public['ex_public']->id}}">
              <div class="row" style="font-weight: bold;">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="col-md-12">
                    <span class="form-text">{{$ex_public['ex_public']->source_name}}</span>
                    <span class="form-text" style="padding-left: 15px;">{{$ex_public['ex_public']->source_id}}</span>
                  </div>
                  @if($ex_public['ex_public']->status !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('STATUS') }}</label>
                    <span class=""> {{$ex_public['ex_public']->status}} </span>
                  </div>
                  @endif
                  @if($ex_public['ex_public']->on_record_until !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('ON RECORD UNTIL') }}</label>
                    <span class=""> {{$ex_public['ex_public']->on_record_until}} </span>
                  </div>
                  @endif
                  @if($ex_public['ex_public']->claim_amount !=null ) ex_account
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('CLAIM AMOUNT') }}</label>
                    <span class=""> ${{$ex_public['ex_public']->claim_amount}} </span>
                  </div>
                  @endif
                  @if($ex_public['ex_public']->date_resolved != null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('DATE RESOLVED') }}</label>
                    <span class=""> {{date("m/d/Y",strtotime($ex_public['ex_public']->date_resolved))}} </span>
                  </div>
                  @endif
                </div>
                <div class="col-md-6 p-0">
                  <div class="col-md-12 p-0 delete-name" data-attribute="title-ex_public-{{$ex_public['ex_public']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span> <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <input type="hidden" name="ex_public[{{$ex_public['ex_public']->id}}][id]" value="{{$ex_public['ex_public']->id}}" />
                  </div>
                  <div class="row mt20 title-ex_public-{{$ex_public['ex_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                    <div class="col-md-12">
                      <label for="inaccurate">{{ zactra::translate_lang('Inaccurate') }}</label>
                      <input type="radio" id="ex_public-{{$ex_public['ex_public']->id}}" data-name="{{$ex_public['ex_public']->id}}" data-price="{{$ex_public['price']['inaccurate']}}" class="ex_public_fix" name="ex_public[{{$ex_public['ex_public']->id}}][type]" value="{{ zactra::translate_lang('inaccurate') }}" />
                      <label class="p-2" for="fraudulent">or</label>
                      <label for="not-mine">{{ zactra::translate_lang('Not Mine') }} </label>
                      <input type="radio" class="ex_public_fix" data-name="{{$ex_public['ex_public']->id}}" data-price="{{$ex_public['price']['not_mine']}}" name="ex_public[{{$ex_public['ex_public']->id}}][type]" value="{{ zactra::translate_lang('not_mine') }}" />
                    </div>
                  </div>
                  <div class="row  title-ex_public-{{$ex_public['ex_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-12 p-0">
                      <div id="exPublicInput-{{$ex_public['ex_public']->id}}"></div>
                    </div>
                  </div>
                  <div class="row  title-ex_public-{{$ex_public['ex_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-12 p-0">
                      <div id="exPublicPrice-{{$ex_public['ex_public']->id}}"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endif
          @if(!empty($data['tu_public']))
            @foreach($data['tu_public'] as $tu_public)
            <div class="mt20 title-tu_public-{{$tu_public['tu_public']->id}}"></div>
            <div class="chart-report title-tu_public-{{$tu_public['tu_public']->id}}">
              <div class="row" style="font-weight: bold;">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="col-md-12">
                    <span class="form-text">{{$tu_public['tu_public']->name}}</span>
                    <span class="form-text" style="padding-left: 15px;">{{$tu_public['tu_public']->docket_number}}</span>
                  </div>
                  @if($tu_public['tu_public']->type !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('TYPE') }}</label>
                    <span class=""> {{$tu_public['tu_public']->type}} </span>
                  </div>
                  @endif
                  @if($tu_public['tu_public']->date_filed !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('DATE FILED') }}</label>
                    <span class=""> {{date("m/d/Y",strtotime($tu_public['tu_public']->date_filed))}} </span>
                  </div>
                  @endif
                  @if($tu_public['tu_public']->on_record_until !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('ON RECORD UNTIL') }}</label>
                    <span class=""> {{$tu_public['tu_public']->on_record_until}} </span>
                  </div>
                  @endif
                  @if($tu_public['tu_public']->court_type_description !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('TYPE DESCRIPTION') }}</label>
                    <span class=""> {{$tu_public['tu_public']->court_type_description}} </span>
                  </div>
                  @endif
                  @if($tu_public['tu_public']->responsibility != null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('DATE RESOLVED') }}</label>
                    <span class=""> {{$tu_public['tu_public']->responsibility}} </span>
                  </div>
                  @endif
                </div>
                <div class="col-md-6">
                  <div class="col-md-12 delete-name" data-attribute="title-tu_public-{{$tu_public['tu_public']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                    <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                    <input type="hidden" name="tu_public[{{$tu_public['tu_public']->id}}][id]" value="{{$tu_public['tu_public']->id}}" />
                  </div>
                  <div class="row mt20 title-tu_public-{{$tu_public['tu_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                    <div class="col-md-12">
                      <label for="inaccurate">{{ zactra::translate_lang('Inaccurate') }}</label>
                      <input type="radio" id="tu_public-{{$tu_public['tu_public']->id}}" data-name="{{$tu_public['tu_public']->id}}" data-price="{{$tu_public['price']['inaccurate']}}" class="tu_public_fix" name="tu_public[{{$tu_public['tu_public']->id}}][type]" value="{{ zactra::translate_lang('inaccurate') }}" />
                      <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                      <label for="not-mine">{{ zactra::translate_lang('Not Mine') }} </label>
                      <input type="radio" class="tu_public_fix" data-name="{{$tu_public['tu_public']->id}}" data-price="{{$tu_public['price']['not_mine']}}" name="tu_public[{{$tu_public['tu_public']->id}}][type]" value="{{ zactra::translate_lang('not_mine') }}" />
                    </div>
                  </div>
                  <div class="row mt20 title-tu_public-{{$tu_public['tu_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">
                      <div id="tuPublicInput-{{$tu_public['tu_public']->id}}"></div>
                    </div>
                  </div>
                  <div class="row mt20 title-tu_public-{{$tu_public['tu_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">
                      <div id="tuPublicPrice-{{$tu_public['tu_public']->id}}"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endif
          @if(!empty($data['eq_public']))
            @foreach($data['eq_public'] as $eq_public)
            <div class="mt20 title-eq_public-{{$eq_public['eq_public']->id}}"></div>
            <div class="chart-report title-eq_public-{{$eq_public['eq_public']->id}}">
              <div class="row" style="font-weight: bold;">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="col-md-12">
                    <span class="form-text">{{$eq_public['eq_public']->name}}</span>
                    <span class="form-text" style="padding-left: 15px;">{{$eq_public['eq_public']->reference_number}}</span>
                  </div>
                  @if($eq_public['eq_public']->classification !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('CLASSIFICATION') }}</label>
                    <span class=""> {{$eq_public['eq_public']->classification}} </span>
                  </div>
                  @endif
                  @if($eq_public['eq_public']->date_filed !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('DATE FILED') }}</label>
                    <span class=""> {{date("m/d/Y",strtotime($eq_public['eq_public']->date_filed))}} </span>
                  </div>
                  @endif
                  @if($eq_public['eq_public']->resposibility !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('RESPONSIBILITY') }}</label>
                    <span class=""> {{$eq_public['eq_public']->resposibility}} </span>
                  </div>
                  @endif
                  @if($eq_public['eq_public']->category_type !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('CATEGORY TYPE') }}</label>
                    <span class=""> {{$eq_public['eq_public']->category_type}} </span>
                  </div>
                  @endif
                  @if($eq_public['eq_public']->responsibility != null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('RESPONSIBILITY') }}</label>
                    <span class=""> {{$eq_public['eq_public']->responsibility}} </span>
                  </div>
                  @endif
                </div>
                <div class="col-md-6">
                  <div class="col-md-12 delete-name" data-attribute="title-eq_public-{{$eq_public['eq_public']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                    <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                    <input type="hidden" name="tu_public[{{$eq_public['eq_public']->id}}][id]" value="{{$eq_public['eq_public']->id}}" />
                  </div>
                  <div class="row mt20 title-eq_public-{{$eq_public['eq_public']->id}}" style="font-weight: bold;">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                      <label for="inaccurate">{{ zactra::translate_lang('Inaccurate') }}</label>
                      <input type="radio" id="eq_public-{{$eq_public['eq_public']->id}}" data-name="{{$eq_public['eq_public']->id}}" data-price="{{$eq_public['price']['inaccurate']}}" class="eq_public_fix" name="eq_public[{{$eq_public['eq_public']->id}}][type]" value="{{ zactra::translate_lang('inaccurate') }}" />
                      <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                      <label for="not-mine">{{ zactra::translate_lang('Not Mine') }} </label>
                      <input type="radio" class="eq_public_fix" data-name="{{$eq_public['eq_public']->id}}" data-price="{{$eq_public['price']['not_mine']}}" name="eq_public[{{$eq_public['eq_public']->id}}][type]" value="{{ zactra::translate_lang('not_mine') }}" />
                    </div>
                  </div>
                  <div class="row mt20 title-eq_public-{{$eq_public->id}}" style="font-weight: bold;">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                      <div id="eqPublicInput-{{$eq_public->id}}"></div>
                    </div>
                  </div>
                  <div class="row mt20 title-eq_public-{{$eq_public->id}}" style="font-weight: bold;">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                      <div id="eqPublicPrice-{{$eq_public->id}}"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endif
          @if(!empty($data['ex_account']))
            @foreach($data['ex_account'] as $ex_account)
            <div class="mt20 title-ex_account-{{$ex_account['ex_account']->id}}"></div>
            <div class="chart-report title-ex_account-{{$ex_account['ex_account']->id}}">
              <div class="row mt20" style="font-weight: bold;">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="col-md-12">
                    <span class="">{{$ex_account['ex_account']->source_name}} </span>
                    <span style="padding-left: 15px;"> {{ zactra::translate_lang('#') }} {{$ex_account['ex_account']->source_id}}</span>
                  </div>
                  @if($ex_account['ex_account']->opened_date !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('DATE OPENED') }}</label>
                    <span class=""> {{date("m/d/Y",strtotime($ex_account['ex_account']->opened_date))}} </span>
                  </div>
                  @endif
                  @if($ex_account['ex_account']->type !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('TYPE') }}</label>
                    <span class=""> {{$ex_account['ex_account']->type}} </span>
                  </div>
                  @endif
                  @if($ex_account['ex_account']->status !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('STATUS') }}</label>
                    <span class=""> {{$ex_account['ex_account']->status}} </span>
                  </div>
                  @endif
                  @if($ex_account['ex_account']->recent_balance_date !=null )
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('RECENT BALANCE') }}</label>
                    <span class=""> {{ zactra::translate_lang('$') }}{{$ex_account['ex_account']->recent_balance_amount}} {{ zactra::translate_lang('as of') }} {{date("d/m/Y",strtotime($ex_account['ex_account']->recent_balance_date))}} </span>
                  </div>
                  @endif
                </div>
                <div class="col-md-6">
                  <div class="col-md-12 p-0 delete-name" data-attribute="title-ex_account-{{$ex_account['ex_account']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <input type="hidden" name="ex_account[{{$ex_account['ex_account']->id}}][id]" value="{{$ex_account['ex_account']->id}}" />
                  </div>
                  <div class="row mt20 title-ex_account-{{$ex_account['ex_account']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">{{ zactra::translate_lang('DISPUTE TYEP') }}</div>
                    <div class="col-md-12">
                      <label for="inaccurate">{{ zactra::translate_lang('Inaccurate') }}</label>
                      <input type="radio" id="ex_account-{{$ex_account['ex_account']->id}}" data-name="{{$ex_account['ex_account']->id}}" data-price="{{$ex_account['price']['inaccurate']}}" class="ex_account_fix" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="{{ zactra::translate_lang('inaccurate') }}" />
                      <label class="p-2" for="fraudulent">or</label>
                      <label for="not-mine">{{ zactra::translate_lang('Not Mine') }} </label>
                      <input type="radio" class="ex_account_fix" data-name="{{$ex_account['ex_account']->id}}" data-price="{{$ex_account['price']['not_mine']}}" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="{{ zactra::translate_lang('not_mine') }}" />
                    </div>
                  </div>
                  <div class="row mt20 title-ex_account-{{$ex_account['ex_account']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">
                      <div id="exAccountInput-{{$ex_account['ex_account']->id}}"></div>
                    </div>
                  </div>
                  <div class="row mt20 title-ex_account-{{$ex_account['ex_account']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">
                      <div id="exAccountPrice-{{$ex_account['ex_account']->id}}"></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php $string =  strtoupper(str_replace('Never late', '',$ex_account['ex_account']->status))?>
              @if(strpos($string, "LATE")!==false && strpos($string, "OPEN")!==false)
              <div class="row mt20 border" style="font-weight: bold;">
                @if(strpos(strtoupper($ex_account['ex_account']->type), "CREDIT")!== false)
                <div class="col-md-12">
                  <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                </div>
                <div class="row mt20">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <input type="hidden" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="credit" />
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][expiration_date]" placeholder="{{ zactra::translate_lang('EXPIRATION DATE') }}" />
                    </div>
                  </div>
                </div>
                <div class="row mt20">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][cvc]" placeholder="{{ zactra::translate_lang('CVC (CARD VERIFICATION CODE)') }}" />
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                </div>
                @endif
                @if(strpos(strtoupper($ex_account['ex_account']->type), "AUTO")!== false)
                <div class="col-md-12">
                  <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                </div>
                <div class="row mt-20">
                  <div class="col-md-12">
                    <div class="col-md-4">
                      <input type="hidden" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="auto" />
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][year]" placeholder="{{ zactra::translate_lang('YEAR') }}" />
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][make]" placeholder="{{ zactra::translate_lang('MAKE') }}" />
                    </div>
                  </div>
                </div>
                <div class="row mt20">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][model]" placeholder="{{ zactra::translate_lang('MODEL') }}" />
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                </div>
                @endif
                @if(strpos(strtoupper($ex_account['ex_account']->type), "PERSONAL")!== false)
                <div class="col-md-12">
                  <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                </div>
                <div class="row mt20">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <input type="hidden" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="{{ zactra::translate_lang('personal') }}" />
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="ex_account[{{$ex_account['ex_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                </div>
                @endif
                @if(strpos(strtoupper($ex_account['ex_account']->type), "STUDENT")!== false)
                <div class="col-md-12">
                  <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12">
                    <input type="hidden" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="{{ zactra::translate_lang('student') }}" />
                    <input type="text" name="ex_account[{{$ex_account['ex_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12">
                    <input type="text" name="ex_account[{{$ex_account['ex_account']->id}}][school_attened]" placeholder="{{ zactra::translate_lang('SCHOOL ATTENDED') }}" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12">
                    <input type="text" name="ex_account[{{$ex_account['ex_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                  </div>
                </div>
                @endif
                @if(strpos(strtoupper($ex_account['ex_account']->type), "MORTGAGE")!== false)
                <div class="col-md-12">
                  <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12">
                    <input type="hidden" name="ex_account[{{$ex_account['ex_account']->id}}][type]" value="{{ zactra::translate_lang('mortgage') }}" />
                    <input type="text" name="ex_account[{{$ex_account['ex_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12">
                    <input type="text" name="ex_account[{{$ex_account['ex_account']->id}}][propety_address]" placeholder="{{ zactra::translate_lang('PROPERTY ADDRESS') }}" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="col-md-12">
                    <input type="text" name="ex_account[{{$ex_account['ex_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                  </div>
                </div>
                @endif
              </div>
              @endif
            </div>
            @endforeach
          @endif
          @if(!empty($data['tu_account']))
            @foreach($data['tu_account'] as $tu_account)
              @if(!empty($tu_account['tu_account']))
              <div class="mt20 title-tu_account-{{$tu_account['tu_account']->id}}"></div>
              <div class="chart-report title-tu_account-{{$tu_account['tu_account']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-5">
                    <div class="col-md-12">
                      <span class="">{{$tu_account['tu_account']->account_name}} </span>
                      <span style="padding-left: 15px;"> # {{$tu_account['tu_account']->account_number}}</span>
                    </div>
                    @if($tu_account['tu_account']->date_opened !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('DATEOPENED') }}</label>
                      <span class=""> {{date("m/d/Y",strtotime($tu_account['tu_account']->date_opened))}} </span>
                    </div>
                    @endif
                    @if($tu_account['tu_account']->account_type_description !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('ACCOUNT TYPE') }}</label>
                      <span class=""> {{$tu_account['tu_account']->account_type_description}} </span>
                    </div>
                    @endif
                    @if($tu_account['tu_account']->loan_type !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('LOAN TYPE') }}</label>
                      <span class=""> {{$tu_account['tu_account']->loan_type}} </span>
                    </div>
                    @endif
                    @if($tu_account['tu_account']->pay_status !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('PAY STATUS') }}</label>
                      <span class="">{{$tu_account['tu_account']->pay_status}} </span>
                    </div>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-12 delete-name" data-attribute="title-tu_account-{{$tu_account['tu_account']->id}}">
                      <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                      <i class="fa fa-check-square-o" aria-hidden="true" s></i>
                      <input type="hidden" name="tu_account[{{$tu_account['tu_account']->id}}][id]" value="{{$tu_account['tu_account']->id}}" />
                    </div>
                    <div class="row mt20 title-tu_account-{{$tu_account['tu_account']->id}}" style="font-weight: bold;">
                      <div class="col-md-12" DISPUTE TYPE></div>
                      <div class="col-md-12">
                        <label for="inaccurate">{{ zactra::translate_lang('Inaccurate') }}</label>
                        <input type="radio" id="tu_account-{{$tu_account['tu_account']->id}}" data-name="{{$tu_account['tu_account']->id}}" data-price="{{$tu_account['price']['inaccurate']}}" class="tu_account_fix" name="tu_account[{{$tu_account['tu_account']->id}}][type]" value="{{ zactra::translate_lang('inaccurate') }}" />
                        <label class="p-2" for="fraudulent">{{ zactra::translate_lang('or') }}</label>
                        <label for="not-mine">{{ zactra::translate_lang('Not Mine') }} </label>
                        <input type="radio" class="tu_account_fix" data-name="{{$tu_account['tu_account']->id}}" data-price="{{$tu_account['price']['not_mine']}}" name="tu_account[{{$tu_account['tu_account']->id}}][type]" value="{{ zactra::translate_lang('not_mine') }}" />
                      </div>
                    </div>
                    <div class="row mt20 title-tu_account-{{$tu_account['tu_account']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="tuAccountInput-{{$tu_account['tu_account']->id}}"></div>
                      </div>
                    </div>
                    <div class="row mt20 title-tu_account-{{$tu_account['tu_account']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="tuAccountPrice-{{$tu_account['tu_account']->id}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
                @if(($tu_account['tu_account']->late_30_count!==0 ||$tu_account['tu_account']->late_60_count!==0 || $tu_account['tu_account']->late_90_count!==0) && strpos(strtoupper($tu_account['tu_account']->account_type), "OPEN")!==false)
                <div class="row mt20 border" style="font-weight: bold;">
                  @if(strpos(strtoupper($tu_account['tu_account']->loan_type), "CREDIT")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input type="hidden" name="tu_account[{{$tu_account['tu_account']->id}}][id]" value="{{ zactra::translate_lang('credit') }}" />
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                      </div>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][expiration_date]" placeholder="{{ zactra::translate_lang('EXPIRATION DATE') }}" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][cvc]" placeholder="{{ zactra::translate_lang('CVC (CARD VERIFICATION CODE)') }}" />
                      </div>
                      <div class="col-md-3">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                      </div>
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($tu_account['tu_account']->loan_type), "AUTO")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="row mt-20">
                    <div class="col-md-12">
                      <div class="col-md-4">
                        <input type="hidden" name="tu_account[{{$tu_account['tu_account']->id}}][id]" value="auto" />
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][year]" placeholder="{{ zactra::translate_lang('YEAR') }}" />
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][make]" placeholder="{{ zactra::translate_lang('MAKE') }}" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][model]" placeholder="{{ zactra::translate_lang('MODEL') }}" />
                      </div>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                      </div>
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($tu_account['tu_account']->loan_type), "PERSONAL")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input type="hidden" name="tu_account[{{$tu_account['tu_account']->id}}][id]" value="{{ zactra::translate_lang('personal') }}" />
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                      </div>
                      <div class="col-md-3">
                        <input class="form-control" type="text" name="tu_account[{{$tu_account['tu_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                      </div>
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($tu_account['tu_account']->loan_type), "STUDENT")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="hidden" name="tu_account[{{$tu_account['tu_account']->id}}][id]" value="student" />
                      <input type="text" name="tu_account[{{$tu_account['tu_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="tu_account[{{$tu_account['tu_account']->id}}][school_attended]" placeholder="{{ zactra::translate_lang('SCHOOL ATTENDED') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="tu_account[{{$tu_account['tu_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($tu_account['tu_account']->loan_type), "MORTGAGE")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="hidden" name="tu_account[{{$tu_account['tu_account']->id}}][id]" value="{{ zactra::translate_lang('mortgage') }}" />
                      <input type="text" name="tu_account[{{$tu_account['tu_account']->id}}][school_attended]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="tu_account[{{$tu_account['tu_account']->id}}][property_address]" placeholder="{{ zactra::translate_lang('PROPERTY ADDRESS') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="tu_account[{{$tu_account['tu_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                  @endif
                </div>
                @endif
              </div>
              @endif
            @endforeach
          @endif
          @if(!empty($data['eq_account']))
            @foreach($data['eq_account'] as $eq_account)
              @if(!empty($eq_account))
              <div class="mt20 title-eq_account-{{$eq_account['eq_account']->id}}"></div>
              <div class="chart-report title-eq_account-{{$eq_account['eq_account']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="col-md-12">
                      <span class="">{{$eq_account['eq_account']->name}} </span>
                    </div>
                    @if($eq_account['eq_account']->date_opened !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('DATE OPENED') }}</label>
                      <span class=""> {{date("m/d/Y",strtotime($eq_account['eq_account']->date_opened))}} </span>
                    </div>
                    @endif @if($eq_account['eq_account']->account_type !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('ACCOUNT TYPE') }}</label>
                      <span class=""> {{$eq_account['eq_account']->account_type}} </span>
                    </div>
                    @endif @if($eq_account['eq_account']->loan_type !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('ACCOUNT TITLE') }}</label>
                      <span class=""> {{$eq_account['eq_account']->account_title}} </span>
                    </div>
                    @endif @if($eq_account['eq_account']->current_payment_status !=null )
                    <div class="col-md-12">
                      <label class="form-text">{{ zactra::translate_lang('PAYMENT STATUS') }}</label>>
                      <span class="">{{$eq_account['eq_account']->current_payment_status}} </span>
                    </div>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-12 p-0 delete-name" data-attribute="title-eq_account-{{$eq_account['eq_account']->id}}">
                      <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                      <i class="fa fa-check-square-o" aria-hidden="true"></i>
                      <input type="hidden" name="eq_account[{{$eq_account['eq_account']->id}}][id]" value="{{$eq_account['eq_account']->id}}" />
                    </div>
                  </div>
                  <div class="row mt20 title-eq_account-{{$eq_account['eq_account']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">{{ zactra::translate_lang('DISPUTE TYEP') }}</div>
                    <div class="col-md-12">
                      <label for="inaccurate">{{ zactra::translate_lang('Inaccurate') }}</label>
                      <input type="radio" id="eq_account-{{$eq_account['eq_account']->id}}" data-name="{{$eq_account['eq_account']->id}}" data-price="{{$eq_account['price']['inaccurate']}}" class="eq_account_fix" name="eq_account[{{$eq_account['eq_account']->id}}][type]" value="{{ zactra::translate_lang('inaccurate') }}" />
                      <label class="p-2" for="fraudulent">or</label>
                      <label for="not-mine">{{ zactra::translate_lang('Not Mine') }} </label>
                      <input type="radio" class="eq_account_fix" data-name="{{$eq_account['eq_account']->id}}" data-price="{{$eq_account['price']['not_mine']}}" name="eq_account[{{$eq_account['eq_account']->id}}][type]" value="{{ zactra::translate_lang('not_mine') }}" />
                    </div>
                  </div>
                  <div class="row mt20 title-eq_account-{{$eq_account['eq_account']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">
                      <div id="eqAccountInput-{{$eq_account['eq_account']->id}}"></div>
                    </div>
                  </div>
                  <div class="row mt20 title-eq_account-{{$eq_account['eq_account']->id}}" style="font-weight: bold;">
                    <div class="col-md-12">
                      <div id="eqAccountPrice-{{$eq_account['eq_account']->id}}"></div>
                    </div>
                  </div>
                </div>
                @if(($eq_account['eq_account']->late_30_count!==0 ||$eq_account['eq_account']->late_60_count!==0 || $eq_account['eq_account']->late_90_count!==0) && strpos(strtoupper($eq_account['eq_account']->account_status), "OPEN")!==false)
                <div class="row mt20 border" style="font-weight: bold;">
                  @if(strpos(strtoupper($eq_account['eq_account']->category_type), "CREDIT")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input type="hidden" name="eq_account[{{$eq_account['eq_account']->id}}][type]" value="credit" />
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                      </div>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][eqpiration_date]" placeholder="{{ zactra::translate_lang('EXPIRATION DATE') }}" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][cvc]" placeholder="{{ zactra::translate_lang('CVC (CARD VERIFICATION CODE)') }}" />
                      </div>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                      </div>
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($eq_account['eq_account']->category_type), "AUTO")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="row mt-20">
                    <div class="col-md-12">
                      <div class="col-md-4">
                        <input type="hidden" name="eq_account[{{$eq_account->id}}][type]" value="auto" />
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][year]" placeholder="{{ zactra::translate_lang('YEAR') }}" />
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][make]" placeholder="{{ zactra::translate_lang('MAKE') }}" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][model]" placeholder="{{ zactra::translate_lang('MODEL') }}" />
                      </div>
                      <div class="col-md-6">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                      </div>
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($eq_account['eq_account']->category_type), "PERSONAL")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="row mt20">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <input type="hidden" name="eq_account[{{$eq_account['eq_account']->id}}][type]" value="{{ zactra::translate_lang('personal') }}" />
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                      </div>
                      <div class="col-md-3">
                        <input class="form-control" type="text" name="eq_account[{{$eq_account['eq_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                      </div>
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($eq_account['eq_account']->category_type), "STUDENT")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="hidden" name="eq_account[{{$eq_account['eq_account']->id}}][type]" value="{{ zactra::translate_lang('student') }}" />
                      <input type="text" name="eq_account[{{$eq_account['eq_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="eq_account[{{$eq_account['eq_account']->id}}][school_attended]" placeholder="{{ zactra::translate_lang('SCHOOL ATTENDED') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="eq_account[{{$eq_account['eq_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                  @endif
                  @if(strpos(strtoupper($eq_account['eq_account']->category_type), "MORTGAGE")!== false)
                  <div class="col-md-12">
                    <label class="form-text">{{ zactra::translate_lang('REQUIRE INFORMATION FOR DISPUTE') }}</label>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="hidden" name="eq_account[{{$eq_account['eq_account']->id}}][type]" value="{{ zactra::translate_lang('mortgage') }}" />
                      <input type="text" name="eq_account[{{$eq_account['eq_account']->id}}][account_number]" placeholder="{{ zactra::translate_lang('FULL ACCOUNT NUMBER') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="eq_account[{{$eq_account['eq_account']->id}}][property_address]" placeholder="{{ zactra::translate_lang('PROPERTY ADDRESS') }}" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="col-md-12">
                      <input type="text" name="eq_account[{{$eq_account['eq_account']->id}}][security_word]" placeholder="{{ zactra::translate_lang('SECURITY WORD') }}" />
                    </div>
                  </div>
                  @endif
                </div>
                @endif
              </div>
              @endif
            @endforeach
          @endif
          @if(!empty($data['ex_inquiry']))
            @foreach($data['ex_inquiry'] as $ex_inquiry)
              @if(!empty($ex_inquiry['ex_inquiry']))
              <div class="mt20 title-ex_inquiry-{{$ex_inquiry['ex_inquiry']->id}}"></div>
              <div class="chart-report title-ex_inquiry-{{$ex_inquiry['ex_inquiry']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <span class="">{{$ex_inquiry['ex_inquiry']->source_name}} </span>
                  </div>
                  <div class="col-md-2 delete-name" data-attribute="title-ex_inquiry-{{$ex_inquiry['ex_inquiry']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                    <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                    <input type="hidden" name="ex_inquiry[{{$ex_inquiry['ex_inquiry']->id}}][id]" value="{{$ex_inquiry['ex_inquiry']->id}}" />
                  </div>
                </div>
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6"></div>
                  <div class="col-md-4">
                    <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                    <label for="fraudulent">{{ zactra::translate_lang('Fraudulent') }}</label>
                    <input type="radio" class="ex_inquiry_fix" data-name="{{$ex_inquiry['ex_inquiry']->id}}" name="ex_inquiry[{{$ex_inquiry['ex_inquiry']->id}}][type]" data-price="{{$ex_inquiry['price']['inaccurate']}}" value="{{ zactra::translate_lang('fraudulent') }}" />
                    <label for="unauthorized">{{ zactra::translate_lang('Unauthorized') }} </label>
                    <input type="radio" class="ex_inquiry_fix" data-name="{{$ex_inquiry['ex_inquiry']->id}}" name="ex_inquiry[{{$ex_inquiry['ex_inquiry']->id}}][type]" data-price="{{$ex_inquiry['price']['not_mine']}}" value="{{ zactra::translate_lang('unauthorized') }}" />
                    <div class="row mt20 title-ex_inquiry-{{$ex_inquiry['ex_inquiry']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="exInquiryPrice-{{$ex_inquiry['ex_inquiry']->id}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endforeach
          @endif
          @if(!empty($data['tu_inquiry']))
            @foreach($data['tu_inquiry'] as $tu_inquiry)
              @if(!empty($tu_inquiry['tu_inquiry']))
              <div class="mt20 title-tu_inquiry-{{$tu_inquiry['tu_inquiry']->id}}"></div>
              <div class="chart-report title-tu_inquiry-{{$tu_inquiry['tu_inquiry']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <span class="">{{$tu_inquiry['tu_inquiry']->subscriber_name}} </span>
                  </div>
                  <div class="col-md-2 delete-name" data-attribute="title-tu_inquiry-{{$tu_inquiry['tu_inquiry']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                    <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                    <input type="hidden" name="tu_inquiry[{{$tu_inquiry['tu_inquiry']->id}}][id]" value="{{$tu_inquiry['tu_inquiry']->id}}" />
                  </div>
                </div>
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6"></div>
                  <div class="col-md-4">
                    <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                    <label for="fraudulent">{{ zactra::translate_lang('Fraudulent') }}</label>
                    <input type="radio" class="tu_inquiry_fix" data-name="{{$eq_inquiry['tu_inquiry']->id}}" name="tu_inquiry[{{$tu_inquiry['tu_inquiry']->id}}][type]" data-price="{{$tu_inquiry['price']['inaccurate']}}" value="{{ zactra::translate_lang('fraudulent') }}" />
                    <label for="unauthorized">{{ zactra::translate_lang('Unauthorized') }} </label>
                    <input type="radio" class="tu_inquiry_fix" data-name="{{$tu_inquiry['eq_inquiry']->id}}" name="tu_inquiry[{{$tu_inquiry['tu_inquiry']->id}}][type]" data-price="{{$tu_inquiry['price']['not_mine']}}" value="{{ zactra::translate_lang('unauthorized') }}" />
                    <div class="row mt20 title-tu_inquiry-{{$tu_inquiry['tu_inquiry']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="tuInquiryPrice-{{$tu_inquiry['tu_inquiry']->id}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endforeach
          @endif
          @if(!empty($data['eq_inquiry']))
            @foreach($data['eq_inquiry'] as $eq_inquiry)
              @if(!empty($eq_inquiry['eq_inquiry']))
              <div class="mt20 title-eq_inquiry-{{$eq_inquiry['eq_inquiry']->id}}"></div>
              <div class="chart-report title-eq_inquiry-{{$eq_inquiry['eq_inquiry']->id}}">
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="col-md-12">{{$eq_inquiry['eq_inquiry']->industry_name}}</div>
                    <div class="col-md-12">{{$eq_inquiry['eq_inquiry']->name}}</div>
                  </div>
                  <div class="col-md-2 delete-name" data-attribute="title-eq_inquiry-{{$eq_inquiry['eq_inquiry']->id}}">
                    <span style="font-weight: bold; font-size: 16px;">{{ zactra::translate_lang('DESELECT') }}</span>
                    <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                    <input type="hidden" name="eq_inquiry[{{$eq_inquiry['eq_inquiry']->id}}][id]" value="{{$eq_inquiry['eq_inquiry']->id}}" />
                  </div>
                </div>
                <div class="row mt20" style="font-weight: bold;">
                  <div class="col-md-1"></div>
                  <div class="col-md-6"></div>
                  <div class="col-md-4">
                    <div class="col-md-12 p-0">{{ zactra::translate_lang('DISPUTE TYPE') }}</div>
                    <label for="fraudulent">{{ zactra::translate_lang('Fraudulent') }}</label>
                    <input type="radio" class="eq_inquiry_fix" name="eq_inquiry[{{$eq_inquiry['eq_inquiry']->id}}][type]" data-name="{{$eq_inquiry['eq_inquiry']->id}}" data-price="{{$eq_inquiry['price']['inaccurate']}}" value="{{ zactra::translate_lang('fraudulent') }}" />
                    <label for="unauthorized">{{ zactra::translate_lang('Unauthorized') }} </label>
                    <input type="radio" class="eq_inquiry_fix" name="eq_inquiry[{{$eq_inquiry['eq_inquiry']->id}}][type]" data-name="{{$eq_inquiry['eq_inquiry']->id}}" data-price="{{$eq_inquiry['price']['not_mine']}}" value="{{ zactra::translate_lang('unauthorized') }}" />
                    <div class="row mt20 title-eq_inquiry-{{$eq_inquiry['eq_inquiry']->id}}" style="font-weight: bold;">
                      <div class="col-md-12">
                        <div id="eqInquiryPrice-{{$eq_inquiry['eq_inquiry']->id}}"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endforeach
          @endif
          <div class="row mt20 title-sum-price" style="font-weight: bold;">
            <div class="col-md-12">
              <div class="col-md-10">
                <label>{{ zactra::translate_lang('TOTAL PRICE') }} </label>
              </div>
              <div class="col-md-2">
                <div id="sumPrice"></div>
              </div>
            </div>
          </div>
          <div class="row mt20">
            <div class="col-md-5"></div>
            <div class="col-md-2" style="margin-bottom: 20px;">
              <button type="submit" class="btn btn-primary">
                {{ zactra::translate_lang('CONFIRM DISPUTE') }}
              </button>
            </div>
            <div class="col-md-5"></div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
<script>
  $(document).ready(function () {
    $(".delete-name").click(function () {
      var name = $(this).attr("data-attribute");
      $("." + name).remove();
    });

    $(".ex_name_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "ex_name[" + id + "][type]";

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addName-' + id + '"><input class="form-control" type="text" name="ex_name[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#nameInput-" + id + "").html($(add));
      } else {
        console.log(id);
        $("#addName-" + id + "").remove();
      }
    });
    $(".tu_name_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "tu_name[" + id + "][type]";

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addName-' + id + '"><input class="form-control" type="text" name="tu_name[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#nameInput-" + id + "").html($(add));
      } else {
        console.log(id);
        $("#addName-" + id + "").remove();
      }
    });
    $(".eq_name_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "eq_name[" + id + "][type]";

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addName-' + id + '"><input class="form-control" type="text" name="eq_name[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#nameInput-" + id + "").html($(add));
      } else {
        console.log(id);
        $("#addName-" + id + "").remove();
      }
    });

    $(".ex_employer_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "ex_employer[" + id + "][type]";

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addEmployer-' + id + '"><input class="form-control" type="text" name="ex_employer[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#employerInput-" + id + "").html($(add));
      } else {
        console.log(id);
        $("#addEmployer-" + id + "").remove();
      }
    });
    $(".tu_employer_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "tu_employer[" + id + "][type]";

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addEmployer-' + id + '"><input class="form-control" type="text" name="tu_employer[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#employerInput-" + id + "").html($(add));
      } else {
        console.log(id);
        $("#addEmployer-" + id + "").remove();
      }
    });
    $(".eq_employer_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "eq_employer[" + id + "][type]";

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addEmployer-' + id + '"><input class="form-control" type="text" name="eq_employer[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#employerInput-" + id + "").html($(add));
      } else {
        console.log(id);
        $("#addEmployer-" + id + "").remove();
      }
    });

    $(".ex_address_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "ex_address[" + id + "][type]";
      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addAddress-' + id + '"><input class="form-control" type="text" name="ex_address[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#addressInput-" + id + "").html($(add));
      } else {
        $("#addAddress-" + id + "").remove();
      }
    });
    $(".tu_address_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "tu_address[" + id + "][type]";
      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addAddress-' + id + '"><input class="form-control" type="text" name="tu_address[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#addressInput-" + id + "").html($(add));
      } else {
        $("#addAddress-" + id + "").remove();
      }
    });
    $(".eq_address_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "eq_address[" + id + "][type]";
      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addAddress-' + id + '"><input class="form-control" type="text" name="eq_address[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#addressInput-" + id + "").html($(add));
      } else {
        $("#addAddress-" + id + "").remove();
      }
    });

    $(".ex_phone_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "ex_phone[" + id + "][type]";
      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addPhone-' + id + '"><input class="form-control" type="text" name="ex_phone[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#phoneInput-" + id + "").html($(add));
      } else {
        $("#addPhone-" + id + "").remove();
      }
    });
    $(".tu_phone_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "phone[" + id + "][type]";
      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="addPhone-' + id + '"><input class="form-control" type="text" name="tu_phone[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#phoneInput-" + id + "").html($(add));
      } else {
        $("#addPhone-" + id + "").remove();
      }
    });

    $(".ex_statement_fix").click(function () {
      var id = $(this).attr("data-name");
      var price = $(this).attr("data-price");
      var name = "ex_statement[" + id + "][type]";
      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="ex_statement[' + id + '][price]" value="' + price + '"></div>';

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="exStatementAdd' + id + '"><input class="form-control" type="text" name="ex_statement[' + id + '][additional]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';

        $("#exStatementInput-" + id + "").html($(add));
        $("#exStatementPrice-" + id + "").html($(addPrice));
      } else {
        $("#exStatementPhone-" + id + "").remove();
        $("#exStatementPrice-" + id + "").html($(addPrice));
      }
    });

    $(".tu_statement_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "tu_statement[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="tu_statement[' + id + '][price]" value="' + price + '" ></div>';

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        var add = '<div id="tuStatementAdd-' + id + '"><input class="form-control" type="text" name="tu_statement[' + id + '][type]" placeholder="PLEASE WRITE CORRECT VERSION"></div>';
        $("#tuStatementInput-" + id + "").html($(add));
        $("#tuStatementPrice-" + id + "").html($(addPrice));
      } else {
        $("#tuStatementAdd-" + id + "").remove();
        $("#tuStatementPrice-" + id + "").html($(addPrice));
      }
    });

    $(".ex_account_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "ex_account[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="ex_account[' + id + '][price]" value="' + price + '" ></div>';

      if ($("input[name='" + name + "']:checked").val() == "not_mine") {
        var add = '<div id="exAccountAdd-' + id + '">';
        add = add + '<div class="col-md-12">Ownership is related to your responsibility, or liability, for the account.</div>';
        add = add + '<div class="col-md-12">Choose an ownership reason.</div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_account_not_mine"  name="ex_account[' + id + '][reason]" value="n-1">';
        add = add + "I have no knowledge of this account.</div>";
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_account_not_mine"  name="ex_account[' + id + '][reason]" value="n-2">';
        add = add + "I am not responsible for this account (e.g., belongs to ex-spouse, you???re just an authorized user or Corporate account).</div>";
        add = add + '<div class="col-md-12"> <div id = "exAccountNotMineS-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_account_not_mine"  name="ex_account[' + id + '][reason]" value="n-3">';
        add = add + "This is not my account; it belongs to a relative or person with a similar name/address.</div>";
        add = add + '<div class="col-md-12"> <div id = "exAccountNotMineT-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_account_not_mine"  name="ex_account[' + id + '][reason]" value="n-4">';
        add = add + "This account was opened fraudulently</div>";
        add = add + '<div class="col-md-12"> <div id = "exAccountNotMineF-' + id + '"></div></div>';

        console.log(id, "+++++++");
        $("#exAccountInput-" + id + "").html(add);
        $("#exAccountPrice-" + id + "").html($(addPrice));
      } else {
        var inaccurate = "<labale>I disagree with the reported data. Please conduct a credit audit on all reported data.</labale>";
        $("#exAccountInput-" + id + "").html(inaccurate);
        $("#exAccountPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).delegate(".ex_account_not_mine", "click", function () {
      var id = $(this).attr("data-name");
      var name = "ex_account[" + id + "][reason]";
      if ($("input[name='" + name + "']:checked").val() == "n-2") {
        $("#exAccountNotMineAddT-" + id + "").remove();
        $("#exAccountNotMineAddF-" + id + "").remove();
        var add = '<div id="exAccountNotMineAddS-' + id + '">';
        add = add + '<input class="form-control" type="text" name="ex_account[' + id + '][additonal]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';
        $("#exAccountNotMineS-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-3") {
        $("#exAccountNotMineAddS-" + id + "").remove();
        $("#exAccountNotMineAddF-" + id + "").remove();
        var add = '<div id="exAccountNotMineAddT-' + id + '">';
        add = add + '<input class="form-control" type="text" name="ex_account[' + id + '][additonal]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';
        $("#exAccountNotMineT-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-4") {
        $("#exAccountNotMineAddS-" + id + "").remove();
        $("#exAccountNotMineAddT-" + id + "").remove();
        var add = '<div id="exAccountNotMineAddF-' + id + '">';
        add = add + '<input class="form-control" type="text" name="ex_account[' + id + '][additonal]" placeholder="NAME OF THE PERPETRATOR IF KNOWN"></div>';
        $("#exAccountNotMineF-" + id + "").html(add);
      } else {
        $("#exAccountNotMineAddS-" + id + "").remove();
        $("#exAccountNotMineAddT-" + id + "").remove();
        $("#exAccountNotMineAddF-" + id + "").remove();
      }
    });

    $(".tu_account_fix").click(function () {
      var id = $(this).attr("data-name");

      var name = "tu_account[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="tu_account[' + id + '][price]" value="' + price + '" ></div>';

      if ($("input[name='" + name + "']:checked").val() == "not_mine") {
        console.log("dasdasda++++");
        var add = '<div id="tuAccountAdd-' + id + '">';
        add = add + '<div class="col-md-12">Ownership is related to your responsibility, or liability, for the account.</div>';
        add = add + '<div class="col-md-12">Choose an ownership reason.</div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_account_not_mine"  name="tu_account[' + id + '][reason]" value="n-1">';
        add = add + "I have no knowledge of this account.</div>";
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_account_not_mine"  name="tu_account[' + id + '][reason]" value="n-2">';
        add = add + "I am not responsible for this account (e.g., belongs to tu-spouse, you???re just an authorized user or Corporate account).</div>";
        add = add + '<div class="col-md-12"> <div id = "tuAccountNotMineS-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_account_not_mine"  name="tu_account[' + id + '][reason]" value="n-3">';
        add = add + "This is not my account; it belongs to a relative or person with a similar name/address.</div>";
        add = add + '<div class="col-md-12"> <div id = "tuAccountNotMineT-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_account_not_mine"  name="tu_account[' + id + '][reason]" value="n-4">';
        add = add + "This account was opened fraudulently</div>";
        add = add + '<div class="col-md-12"> <div id = "tuAccountNotMineF-' + id + '"></div></div>';

        $("#tuAccountInput-" + id + "").html(add);
        $("#tuAccountPrice-" + id + "").html($(addPrice));
      } else {
        var inaccurate = "<labale>I disagree with the reported data. Please conduct a credit audit on all reported data.</labale>";
        $("#tuAccountInput-" + id + "").html(inaccurate);
        $("#tuAccountPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).delegate(".tu_account_not_mine", "click", function () {
      var id = $(this).attr("data-name");

      var name = "tu_account[" + id + "][reason]";
      if ($("input[name='" + name + "']:checked").val() == "n-2") {
        $("#tuAccountNotMineAddT-" + id + "").remove();
        $("#tuAccountNotMineAddF-" + id + "").remove();

        var add = '<div id="tuAccountNotMineAddS-' + id + '">';
        add = add + '<input class="form-control" type="text" name="tu_account[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#tuAccountNotMineS-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-3") {
        $("#tuAccountNotMineAddS-" + id + "").remove();
        $("#tuAccountNotMineAddF-" + id + "").remove();

        var add = '<div id="tuAccountNotMineAddT-' + id + '">';
        add = add + '<input class="form-control" type="text" name="tu_account[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#tuAccountNotMineT-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-4") {
        $("#tuAccountNotMineAddS-" + id + "").remove();
        $("#tuAccountNotMineAddT-" + id + "").remove();

        var add = '<div id="tuAccountNotMineAddF-' + id + '">';
        add = add + '<input class="form-control" type="text" name="tu_account[' + id + '][additional]" placeholder="NAME OF THE PERPETRATOR IF KNOWN"></div>';

        $("#tuAccountNotMineF-" + id + "").html(add);
      } else {
        $("#tuAccountNotMineAddS-" + id + "").remove();
        $("#tuAccountNotMineAddT-" + id + "").remove();
        $("#tuAccountNotMineAddF-" + id + "").remove();
      }
    });

    $(".eq_account_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "eq_account[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="eq_account[' + id + '][price]" value="' + price + '" ></div>';

      if ($("input[name='" + name + "']:checked").val() == "not_mine") {
        var add = '<div id="eqAccountAdd-' + id + '">';
        add = add + '<div class="col-md-12">Ownership is related to your responsibility, or liability, for the account.</div>';
        add = add + '<div class="col-md-12">Choose an ownership reason.</div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_account_not_mine"  name="eq_account[' + id + '][reason]" value="n-1">';
        add = add + "I have no knowledge of this account.</div>";
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_account_not_mine"  name="eq_account[' + id + '][reason]" value="n-2">';
        add = add + "I am not responsible for this account (e.g., belongs to eq-spouse, you???re just an authorized user or Corporate account).</div>";
        add = add + '<div class="col-md-12"> <div id = "eqAccountNotMineS-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_account_not_mine"  name="eq_account[' + id + '][reason]" value="n-3">';
        add = add + "This is not my account; it belongs to a relative or person with a similar name/address.</div>";
        add = add + '<div class="col-md-12"> <div id = "eqAccountNotMineT-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_account_not_mine"  name="eq_account[' + id + '][reason]" value="n-4">';
        add = add + "This account was opened fraudulently</div>";
        add = add + '<div class="col-md-12"> <div id = "eqAccountNotMineF-' + id + '"></div></div>';

        $("#eqAccountInput-" + id + "").html(add);
        $("#eqAccountPrice-" + id + "").html($(addPrice));
      } else {
        var inaccurate = "<labale>I disagree with the reported data. Please conduct a credit audit on all reported data.</labale>";
        console.log(id);
        $("#eqAccountInput-" + id + "").html(inaccurate);
        $("#eqAccountPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).delegate(".eq_account_not_mine", "click", function () {
      var id = $(this).attr("data-name");
      var name = "eq_account[" + id + "][reason]";
      if ($("input[name='" + name + "']:checked").val() == "n-2") {
        $("#eqAccountNotMineAddT-" + id + "").remove();
        $("#eqAccountNotMineAddF-" + id + "").remove();

        var add = '<div id="eqAccountNotMineAddS-' + id + '">';
        add = add + '<input class="form-control" type="text" name="eq_account[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#eqAccountNotMineS-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-3") {
        $("#eqAccountNotMineAddS-" + id + "").remove();
        $("#eqAccountNotMineAddF-" + id + "").remove();

        var add = '<div id="eqAccountNotMineAddT-' + id + '">';
        add = add + '<input class="form-control" type="text" name="eq_account[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#eqAccountNotMineT-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-4") {
        $("#eqAccountNotMineAddS-" + id + "").remove();
        $("#eqAccountNotMineAddT-" + id + "").remove();

        var add = '<div id="eqAccountNotMineAddF-' + id + '">';
        add = add + '<input class="form-control" type="text" name="eq_account[' + id + '][additional]" placeholder="NAME OF THE PERPETRATOR IF KNOWN"></div>';

        $("#eqAccountNotMineF-" + id + "").html(add);
      } else {
        $("#eqAccountNotMineAddS-" + id + "").remove();
        $("#eqAccountNotMineAddT-" + id + "").remove();
        $("#eqAccountNotMineAddF-" + id + "").remove();
      }
    });

    $(".ex_public_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "ex_public[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="ex_public[' + id + '][price]" value="' + price + '" ></div>';

      if ($("input[name='" + name + "']:checked").val() == "not_mine") {
        var add = '<div id="exPublicAdd-' + id + '">';
        add = add + '<div class="col-md-12">Ownership is related to your responsibility, or liability, for the account.</div>';
        add = add + '<div class="col-md-12">Choose an ownership reason.</div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_public_not_mine"  name="ex_public[' + id + '][reason]" value="n-1">';
        add = add + "I have no knowledge of this account.</div>";
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_public_not_mine"  name="ex_public[' + id + '][reason]" value="n-2">';
        add = add + "I am not responsible for this account (e.g., belongs to ex-spouse, you???re just an authorized user or Corporate account).</div>";
        add = add + '<div class="col-md-12"> <div id = "exPublicNotMineS-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_public_not_mine"  name="ex_public[' + id + '][reason]" value="n-3">';
        add = add + "This is not my account; it belongs to a relative or person with a similar name/address.</div>";
        add = add + '<div class="col-md-12"> <div id = "exPublicNotMineT-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="ex_public_not_mine"  name="ex_public[' + id + '][reason]" value="n-4">';
        add = add + "This account was opened fraudulently</div>";
        add = add + '<div class="col-md-12"> <div id = "exPublicNotMineF-' + id + '"></div></div>';

        console.log(id, "+++++++");
        $("#exPublicInput-" + id + "").html(add);
        $("#exPublicPrice-" + id + "").html($(addPrice));
      } else {
        var inaccurate = "<labale>I disagree with the reported data. Please conduct a credit audit on all reported data.</labale>";
        $("#exPublicInput-" + id + "").html(inaccurate);
        $("#exPublicPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).delegate(".ex_public_not_mine", "click", function () {
      var id = $(this).attr("data-name");
      var name = "ex_public[" + id + "][reason]";
      if ($("input[name='" + name + "']:checked").val() == "n-2") {
        $("#exPublicNotMineAddT-" + id + "").remove();
        $("#exPublicNotMineAddF-" + id + "").remove();
        var add = '<div id="exPublicNotMineAddS-' + id + '">';
        add = add + '<input class="form-control" type="text" name="ex_public[' + id + '][additonal]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';
        $("#exPublicNotMineS-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-3") {
        $("#exPublicNotMineAddS-" + id + "").remove();
        $("#exPublicNotMineAddF-" + id + "").remove();
        var add = '<div id="exPublicNotMineAddT-' + id + '">';
        add = add + '<input class="form-control" type="text" name="ex_public[' + id + '][additonal]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';
        $("#exPublicNotMineT-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-4") {
        $("#exPublicNotMineAddS-" + id + "").remove();
        $("#exPublicNotMineAddT-" + id + "").remove();
        var add = '<div id="exPublicNotMineAddF-' + id + '">';
        add = add + '<input class="form-control" type="text" name="ex_public[' + id + '][additonal]" placeholder="NAME OF THE PERPETRATOR IF KNOWN"></div>';
        $("#exPublicNotMineF-" + id + "").html(add);
      } else {
        $("#exPublicNotMineAddS-" + id + "").remove();
        $("#exPublicNotMineAddT-" + id + "").remove();
        $("#exPublicNotMineAddF-" + id + "").remove();
      }
    });

    $(".tu_public_fix").click(function () {
      console.log("dsadadad");

      var id = $(this).attr("data-name");

      var name = "tu_public[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="tu_public[' + id + '][price]" vlaue="' + price + '"></div>';

      if ($("input[name='" + name + "']:checked").val() == "not_mine") {
        var add = '<div id="tuPublicAdd-' + id + '">';
        add = add + '<div class="col-md-12">Ownership is related to your responsibility, or liability, for the account.</div>';
        add = add + '<div class="col-md-12">Choose an ownership reason.</div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_public_not_mine"  name="tu_public[' + id + '][reason]" value="n-1">';
        add = add + "I have no knowledge of this account.</div>";
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_public_not_mine"  name="tu_public[' + id + '][reason]" value="n-2">';
        add = add + "I am not responsible for this account (e.g., belongs to tu-spouse, you???re just an authorized user or Corporate account).</div>";
        add = add + '<div class="col-md-12"> <div id = "tuPublicNotMineS-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_public_not_mine"  name="tu_public[' + id + '][reason]" value="n-3">';
        add = add + "This is not my account; it belongs to a relative or person with a similar name/address.</div>";
        add = add + '<div class="col-md-12"> <div id = "tuPublicNotMineT-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="tu_public_not_mine"  name="tu_public[' + id + '][reason]" value="n-4">';
        add = add + "This account was opened fraudulently</div>";
        add = add + '<div class="col-md-12"> <div id = "tuPublicNotMineF-' + id + '"></div></div>';

        $("#tuPublicInput-" + id + "").html(add);
        $("#tuPublicPrice-" + id + "").html($(addPrice));
      } else {
        var inaccurate = "<labale>I disagree with the reported data. Please conduct a credit audit on all reported data.</labale>";
        $("#tuPublicInput-" + id + "").html(inaccurate);
        $("#tuPublicPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).delegate(".tu_public_not_mine", "click", function () {
      var id = $(this).attr("data-name");

      var name = "tu_public[" + id + "][reason]";
      if ($("input[name='" + name + "']:checked").val() == "n-2") {
        $("#tuPublicNotMineAddT-" + id + "").remove();
        $("#tuPublicNotMineAddF-" + id + "").remove();

        var add = '<div id="tuPublicNotMineAddS-' + id + '">';
        add = add + '<input class="form-control" type="text" name="tu_public[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#tuPublicNotMineS-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-3") {
        $("#tuPublicNotMineAddS-" + id + "").remove();
        $("#tuPublicNotMineAddF-" + id + "").remove();

        var add = '<div id="tuPublicNotMineAddT-' + id + '">';
        add = add + '<input class="form-control" type="text" name="tu_public[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#tuPublicNotMineT-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-4") {
        $("#tuPublicNotMineAddS-" + id + "").remove();
        $("#tuPublicNotMineAddT-" + id + "").remove();

        var add = '<div id="tuPublicNotMineAddF-' + id + '">';
        add = add + '<input class="form-control" type="text" name="tu_public[' + id + '][additional]" placeholder="NAME OF THE PERPETRATOR IF KNOWN"></div>';

        $("#tuPublicNotMineF-" + id + "").html(add);
      } else {
        $("#tuPublicNotMineAddS-" + id + "").remove();
        $("#tuPublicNotMineAddT-" + id + "").remove();
        $("#tuPublicNotMineAddF-" + id + "").remove();
      }
    });

    $(".eq_public_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "eq_public[" + id + "][type]";

      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="eq_public[' + id + '][price]" value="' + price + '"></div>';

      if ($("input[name='" + name + "']:checked").val() == "not_mine") {
        var add = '<div id="eqPublicAdd-' + id + '">';
        add = add + '<div class="col-md-12">Ownership is related to your responsibility, or liability, for the account.</div>';
        add = add + '<div class="col-md-12">Choose an ownership reason.</div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_public_not_mine"  name="eq_public[' + id + '][reason]" value="n-1">';
        add = add + "I have no knowledge of this account.</div>";
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_public_not_mine"  name="eq_public[' + id + '][reason]" value="n-2">';
        add = add + "I am not responsible for this account (e.g., belongs to eq-spouse, you???re just an authorized user or Corporate account).</div>";
        add = add + '<div class="col-md-12"> <div id = "eqPublicNotMineS-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_public_not_mine"  name="eq_public[' + id + '][reason]" value="n-3">';
        add = add + "This is not my account; it belongs to a relative or person with a similar name/address.</div>";
        add = add + '<div class="col-md-12"> <div id = "eqPublicNotMineT-' + id + '"></div></div>';
        add = add + '<div class="col-md-12"><input type="radio" data-name="' + id + '" class="eq_public_not_mine"  name="eq_public[' + id + '][reason]" value="n-4">';
        add = add + "This account was opened fraudulently</div>";
        add = add + '<div class="col-md-12"> <div id = "eqPublicNotMineF-' + id + '"></div></div>';

        $("#eqPublicInput-" + id + "").html(add);
        $("#eqPublicPrice-" + id + "").html($(addPrice));
      } else {
        var inaccurate = "<labale>I disagree with the reported data. Please conduct a credit audit on all reported data.</labale>";
        console.log(id);
        $("#eqPublicInput-" + id + "").html(inaccurate);
        $("#eqPublicPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).delegate(".eq_public_not_mine", "click", function () {
      var id = $(this).attr("data-name");
      var name = "eq_public[" + id + "][reason]";

      if ($("input[name='" + name + "']:checked").val() == "n-2") {
        $("#eqPublicNotMineAddT-" + id + "").remove();
        $("#eqPublicNotMineAddF-" + id + "").remove();

        var add = '<div id="eqPublicNotMineAddS-' + id + '">';
        add = add + '<input class="form-control" type="text" name="eq_public[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#eqPublicNotMineS-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-3") {
        $("#eqPublicNotMineAddS-" + id + "").remove();
        $("#eqPublicNotMineAddF-" + id + "").remove();

        var add = '<div id="eqPublicNotMineAddT-' + id + '">';
        add = add + '<input class="form-control" type="text" name="eq_public[' + id + '][additional]" placeholder="PROVIDE DETAILS, e.g., ACCOUNT HOLDER NAME"></div>';

        $("#eqPublicNotMineT-" + id + "").html(add);
      } else if ($("input[name='" + name + "']:checked").val() == "n-4") {
        $("#eqPublicNotMineAddS-" + id + "").remove();
        $("#eqPublicNotMineAddT-" + id + "").remove();

        var add = '<div id="eqPublicNotMineAddF-' + id + '">';
        add = add + '<input class="form-control" type="text" name="eq_public[' + id + '][additional]" placeholder="NAME OF THE PERPETRATOR IF KNOWN"></div>';

        $("#eqPublicNotMineF-" + id + "").html(add);
      } else {
        $("#eqPublicNotMineAddS-" + id + "").remove();
        $("#eqPublicNotMineAddT-" + id + "").remove();
        $("#eqPublicNotMineAddF-" + id + "").remove();
      }
    });

    $(".ex_inquiry_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "ex_inquiry[" + id + "][type]";
      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="ex_inquiry[' + id + '][price]" value="' + price + '"></div>';

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        $("#exInquiryPrice-" + id + "").html($(addPrice));
      } else {
        $("#exInquiryPrice-" + id + "").html($(addPrice));
      }
    });

    $(".tu_inquiry_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "tu_inquiry[" + id + "][type]";
      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable>$<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="tu_inquiry[' + id + '][price]" value="' + price + '"></div>';

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        $("#tuInquiryPrice-" + id + "").html($(addPrice));
      } else {
        $("#tuInquiryPrice-" + id + "").html($(addPrice));
      }
    });

    $(".eq_inquiry_fix").click(function () {
      var id = $(this).attr("data-name");
      var name = "eq_inquiry[" + id + "][type]";
      var price = $(this).attr("data-price");
      var addPrice = '<div ><lable>PRICE</lable> $<span class="price">' + price + '</span> <input class="form-control" type="hidden" name="eq_inquiry[' + id + '][price]" value="' + price + '"></div>';

      if ($("input[name='" + name + "']:checked").val() == "fix") {
        $("#eqInquiryPrice-" + id + "").html($(addPrice));
      } else {
        $("#eqInquiryPrice-" + id + "").html($(addPrice));
      }
    });

    $(document).on("change click", function () {
      var exPersonal = $(".ex_personal").length;
      var tuPersonal = $(".tu_personal").length;
      var eqPersonal = $(".eq_personal").length;
      if (exPersonal == 0) {
        $("#exPersonalInfo").remove();
      }
      if (tuPersonal == 0) {
        $("#tuPersonalInfo").remove();
      }
      if (eqPersonal == 0) {
        $("#eqPersonalInfo").remove();
      }

      var price = null;
      var all = $(".price")
        .map(function () {
          price = price + parseFloat(this.innerHTML);
          return price;
        })
        .get();

      $("#sumPrice").html(all[all.length - 1]);
    });
  });
</script>

@endsection
