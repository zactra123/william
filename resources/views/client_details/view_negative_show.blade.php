@extends('layouts.layout')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
<style>
    .charts {
         color: #16181b !important;
    }

    .chart-report {
        /*background-color: #d4ddec;*/
        padding: 15px;
        box-shadow: 0 0 5px 1px #0000005c;
        opacity: 1;
    }
    .customcheck{
        display: block;
        width: 100%;
        height: 25px;
    }

    .border{
        border-top: #b4c4dd 1px solid;
    }
    @media (max-width: 900px) {
        .customcheck{
            display: block;
            width: 15%;
            height: 25px;

        }
    }

</style>

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> Check Chosen Dispute </h2>
            <span class="sub-title"><a href="#">Home</a> &gt; Check Dispute Option</span>
        </div>
    </section>
    <section class="charts working-section">
        <div class="container-fluid">
            <div class="Experian" style="display: block">
                <div class="row mt20">
                    <div class="col-md-1 mt20">
                    </div>
                    <div class="col-md-10 mt20">
                {!! Form::open(['route' => ['negative.contract'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}


                        @if(!empty($data['name']))
                            <div class="mt20"></div>
                            <div class="chart-report">
                                <div class="row mt20">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold; font-size: 16px"> NAME</span>
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold; font-size: 16px">DISPUTE</span>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-2">
                                        <span style="font-weight: bold; font-size: 16px"></span>
                                    </div>

                                </div>
                                @foreach($data['name'] as $names)

                                <div class="row mt20 border title-name-{{$names['details']->id}}">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-weight: bold"> {{$names['details']->full_name}} </span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-weight: bold">{{$names['option']}}</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-weight: bold">{{$names['comment']}}</span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-name-{{$names['details']->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <input type="hidden" name="name[{{$names['details']->id}}]" value="{{$names['option_id']}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @endif

                        @if(!empty($data['address']))
                            <div class="mt20"></div>
                            <div class="chart-report">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5" style="font-weight: bold; font-size: 16px">
                                        ADDRESS
                                    </div>
                                    <div class="col-md-4" style="font-weight: bold">
                                        DISPUTE
                                    </div>
                                    <div class="col-md-2" style="font-weight: bold">

                                    </div>

                                </div>

                                @foreach($data['address'] as $address)
                                    <div class="row mt20 border title-address-{{$address['details']->id}}" style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-5">
                                            <span class="">{{$address['details']->street}}, </span>
                                            <span class="">{{$address['details']->city}}, </span>
                                            <span class="">{{$address['details']->state}}, </span>
                                            <span class="">{{$address['details']->zip}}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class=""> {{$address['option']}}</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="">{{$address['comment']}}</span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-address-{{$address['details']->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <input type="hidden" name="address[{{$address['details']->id}}]" value="{{$address['option_id']}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(!empty($data['phone']))

                            <div class="mt20"></div>
                            <div class="chart-report">
                                <div class="row" >
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5" style="font-weight: bold">
                                        <span style="font-weight: bold; font-size: 16px">PHONE # </span>
                                    </div>
                                    <div class="col-md-3" style="font-weight: bold">
                                        <span style="font-weight: bold; font-size: 16px"> DISPUTE</span>
                                    </div>
                                    <div class="col-md-2" >
                                    </div>

                                    <div class="col-md-1">
                                    </div>
                                </div>
                                @foreach($data['phone'] as $phone)
                                    <div class="row mt20 border title-phone-{{$phone['details']->id}}">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-4">
                                            <span style="font-weight: bold">{{$phone['details']->number}} </span>
                                        </div>
                                        <div class="col-md-2">
                                            <span style="font-weight: bold">{{$phone['option']}}</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span style="font-weight: bold">{{$phone['comment']}}</span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-phone-{{$phone['details']->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <input type="hidden" name="phone[{{$phone['details']->id}}]" value="{{$phone['option_id']}}">
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                        @endif

                        @if(!empty($data['ex_public']))
                            @foreach($data['ex_public'] as $ex_public)
                                <div class="mt20 title-ex_public-{{$ex_public['details']->id}}"></div>
                                <div class="chart-report title-ex_public-{{$ex_public['details']->id}}">
                                    <div class="row " style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-5">
                                            <span class="form-text">{{$ex_public['details']->source_name}}</span>
                                            <span class="form-text" style="padding-left: 15px">{{$ex_public['details']->source_id}}</span>

                                        </div>

                                        <div class="col-md-4">
                                           DISPUTE OPTION  {{$ex_public['option']}}  {{$ex_public['comment']}}
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-ex_public-{{$ex_public['details']->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <input type="hidden" name="ex_public[{{$ex_public['details']->id}}]" value="{{$ex_public['option_id']}}">

                                        </div>
                                    </div>
                                    <div class="row mt20 border" style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        @if($ex_public['details']->status !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">STATUS</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_public['details']->status}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($ex_public['details']->date_filed !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE OPENED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($ex_public['details']->date_filed))}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($ex_public['details']->on_record_until !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">ON RECORD UNTIL</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_public['details']->on_record_until}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_public['details']->claim_amount !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">CLAIM AMOUNT</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> ${{$ex_public['details']->claim_amount}}  </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_public['details']->date_resolved != null )

                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE RESOLVED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($ex_public['details']->date_resolved))}} </span>
                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        @endif

                        @if(!empty($data['tu_public']))
                                @foreach($data['tu_public'] as $tu_public)
                                    <div class="mt20 title-tu_public-{{$tu_public['details']->id}}"></div>
                                    <div class="chart-report title-tu_public-{{$tu_public['details']->id}}">
                                        <div class="row " style="font-weight: bold">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-5">
                                                <span class="form-text">{{$tu_public['details']->name}}</span>
                                                <span class="form-text" style="padding-left: 15px">{{$tu_public['details']->docket_number}}</span>

                                            </div>

                                            <div class="col-md-4">
                                                DISPUTE OPTION  {{$tu_public['option']}}  {{$tu_public['comment']}}
                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-tu_public-{{$tu_public['details']->id}}">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                <input type="hidden" name="tu_public[{{$tu_public['details']->id}}]" value="{{$tu_public['option_id']}}">
                                            </div>
                                        </div>
                                        <div class="row mt20 border" style="font-weight: bold">
                                            <div class="col-md-1">
                                            </div>
                                            @if($tu_public['details']->type !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">TYPE</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$tu_public['details']->type}} </span>
                                                    </div>
                                                </div>

                                            @endif

                                            @if($tu_public['details']->date_filed !=null )
                                                <div class="col-md-2">
                                                    <div class="col-md-12">
                                                        <label class="form-text">DATE FILED</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{date("m/d/Y",strtotime($tu_public['details']->date_filed))}} </span>
                                                    </div>
                                                </div>

                                            @endif

                                            @if($tu_public['details']->on_record_until !=null )
                                                <div class="col-md-2">
                                                    <div class="col-md-12">
                                                        <label class="form-text">ON RECORD UNTIL</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$tu_public['details']->on_record_until}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($tu_public['details']->court_type_description !=null )
                                                <div class="col-md-2">
                                                    <div class="col-md-12">
                                                        <label class="form-text">TYPE DESCRIPTION</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$tu_public['details']->court_type_description}}  </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($tu_public['details']->responsibility != null )

                                                <div class="col-md-2">
                                                    <div class="col-md-12">
                                                        <label class="form-text">DATE RESOLVED</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$tu_public['details']->responsibility}} </span>
                                                    </div>
                                                </div>

                                            @endif

                                        </div>
                                    </div>
                                @endforeach


                            @endif

                        @if(!empty($data['ex_account']))
                            @foreach($data['ex_account'] as $ex_account)
                                <div class="mt20 title-ex_account-{{$ex_account['details']->id}}"></div>
                                <div class="chart-report title-ex_account-{{$ex_account['details']->id}}">
                                    <div class="row mt20 " style="font-weight: bold" >
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-5">
                                            <span class="">{{$ex_account['details']->source_name}} </span>

                                            <span style="padding-left: 15px">    # {{$ex_account['details']->source_id}}</span>
                                        </div>
                                        <div class="col-md-5">
                                            DISPUTE OPTION  {{$ex_account['option']}}  {{$ex_account['comment']}}
                                        </div>
                                        <div class="col-md-1 delete" data-attribute="title-ex_account-{{$ex_account['details']->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <input type="hidden" name="ex_account[{{$ex_account['details']->id}}]" value="{{$ex_account['option_id']}}">

                                        </div>

                                    </div>

                                    <div class="row mt20 border " style="font-weight: bold" >
                                        <div class="col-md-1">
                                        </div>
                                        @if($ex_account['details']->opened_date !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE OPENED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($ex_account['details']->opened_date))}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_account['details']->type !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">TYPE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_account['details']->type}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_account['details']->status !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">STATUS</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_account['details']->status}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_account['details']->recent_balance_date !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">RECENT BALANCE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> ${{$ex_account['details']->recent_balance_amount}}  as of {{date("d/m/Y",strtotime($ex_account['details']->recent_balance_date))}} </span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-2">
                                            </div>
                                        @endif

                                    </div>
                                </div>




                            @endforeach
                        @endif

                        @if(!empty($data['tu_account']))
                            @foreach($data['tu_account'] as $tu_account)
                                @if(!empty($tu_account['details']))
                                <div class="mt20 title-tu_account-{{$tu_account['details']->id}}"></div>
                                <div class="chart-report title-tu_account-{{$tu_account['details']->id}}">
                                    <div class="row mt20 " style="font-weight: bold" >
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-5">
                                            <span class="">{{$tu_account['details']->account_name}} </span>

                                            <span style="padding-left: 15px">    # {{$tu_account['details']->account_number}}</span>
                                        </div>
                                        <div class="col-md-5">
                                            DISPUTE OPTION  {{$tu_account['option']}}  {{$tu_account['comment']}}
                                        </div>
                                        <div class="col-md-1 delete-name" data-attribute="title-tu_account-{{$tu_account['details']->id}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <input type="hidden" name="tu_account[{{$tu_account['details']->id}}]" value="{{$tu_account['option_id']}}">

                                        </div>

                                    </div>

                                    <div class="row mt20 border" style="font-weight: bold" >
                                        <div class="col-md-1">
                                        </div>
                                        @if($tu_account['details']->date_opened !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE OPENED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($tu_account['details']->date_opened))}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($tu_account['details']->account_type_description !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">ACCOUNT TYPE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$tu_account['details']->account_type_description}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($tu_account['details']->loan_type !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">LOAN TYPE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$tu_account['details']->loan_type}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($tu_account['details']->pay_status !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">PAY STATUS</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class="">{{$tu_account['details']->pay_status}} </span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-2">
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($data['ex_inquiry']))
                            @foreach($data['ex_inquiry'] as $ex_inquiry)
                                @if(!empty($ex_inquiry['details']))
                                    <div class="mt20 title-ex_inquiry-{{$ex_inquiry['details']->id}}"></div>
                                    <div class="chart-report title-ex_inquiry-{{$ex_inquiry['details']->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-5">
                                                <span class="">{{$ex_inquiry['details']->source_name}} </span>

                                            </div>
                                            <div class="col-md-5">
                                                DISPUTE OPTION  {{$ex_inquiry['option']}}  {{$ex_inquiry['comment']}}
                                            </div>
                                            <div class="col-md-1 delete-name" data-attribute="title-ex_inquiry-{{$ex_inquiry['details']->id}}">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                <input type="hidden" name="ex_inquiry[{{$ex_inquiry['details']->id}}]" value="{{$ex_inquiry['option_id']}}">

                                            </div>

                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($data['tu_inquiry']))
                                @foreach($data['tu_inquiry'] as $tu_inquiry)
                                    @if(!empty($tu_inquiry['details']))
                                        <div class="mt20 title-tu_inquiry-{{$tu_inquiry['details']->id}}"></div>
                                        <div class="chart-report title-tu_inquiry-{{$tu_inquiry['details']->id}}">
                                            <div class="row mt20 " style="font-weight: bold" >
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-5">
                                                    <span class="">{{$tu_inquiry['details']->account_name}} </span>

                                                </div>
                                                <div class="col-md-5">
                                                    DISPUTE OPTION  {{$tu_inquiry['option']}}  {{$tu_inquiry['comment']}}
                                                </div>
                                                <div class="col-md-1 delete-name" data-attribute="title-tu_inquiry-{{$tu_inquiry['details']->id}}">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                    <input type="hidden" name="tu_inquiry[{{$tu_inquiry['details']->id}}]" value="{{$tu_inquiry['option_id']}}">

                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        @if(!empty($data['ex_statement']))
                                @foreach(($data['ex_statement']) as $ex_statement)
                                    @if(!empty($ex_statement['details']))
                                        <div class="mt20 title-ex_statement-{{$ex_statement['details']->id}}"></div>
                                        <div class="chart-report title-ex_statement-{{$ex_statement['details']->id}}">
                                            <div class="row mt20 " style="font-weight: bold" >
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-5">
                                                    <span class="">{{$ex_statement['details']->statement}} </span>

                                                </div>
                                                <div class="col-md-5 ">
                                                    DISPUTE OPTION  {{$ex_statement['option']}}
                                                </div>
                                                <div class="col-md-1 delete-name" data-attribute="title-ex_statement-{{$ex_statement['details']->id}}">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                    <input type="hidden" name="ex_statement[{{$ex_statement['details']->id}}]" value="{{$ex_statement['option_id']}}">

                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        @if(!empty($data['tu_statement']))
                                @foreach(($data['tu_statement']) as $tu_statement)
                                    @if(!empty($tu_statement['details']))
                                        <div class="mt20 title-tu_statement-{{$tu_statement['details']->id}}"></div>
                                        <div class="chart-report title-tu_statement-{{$tu_statement['details']->id}}">
                                            <div class="row mt20 " style="font-weight: bold" >
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-5">
                                                    <span class="">{{$tu_statement['details']->statement}} {{$tu_statement['details']->description}} </span>
                                                </div>
                                                <div class="col-md-5">
                                                    DISPUTE OPTION  {{$tu_statement['option']}}
                                                </div>
                                                <div class="col-md-1 delete-tu-statement" data-attribute="title-tu_statement-{{$tu_statement['details']->id}}">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                    <input type="hidden" name="tu_statement[{{$tu_statement['details']->id}}]" value="{{$tu_statement['option_id']}}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        <div class="row mt20">
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    CREATE CONTRACT
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

    <script>
        $(document).ready(function(){
            $(".delete-name").click(function () {
                var name = $(this).attr("data-attribute")
                $( "."+name ).remove();
            })

        });
    </script>
@endsection

{{----}}
