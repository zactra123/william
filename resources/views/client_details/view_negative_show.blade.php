@extends('layouts.layout')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
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
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span style="font-weight: bold; font-size: 16px"></span>
                                    </div>

                                </div>
                                @foreach($data['name'] as $names)

                                    <div class="row mt20 border title-name-{{$names->id}}">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-weight: bold"> {{$names->full_name}} </span>
                                        </div>

                                        <div class="col-md-3">

                                        </div>

                                        <div class="col-md-2 delete-name" data-attribute="title-name-{{$names->id}}">

                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="name[]" value="{{$names->id}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @endif


                        @if(!empty($data['employ']))
                            <div class="mt20"></div>
                            <div class="chart-report">
                                <div class="row mt20">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold; font-size: 16px"> Employer</span>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span style="font-weight: bold; font-size: 16px"></span>
                                    </div>

                                </div>
                                @foreach($data['employ'] as $employer)

                                    <div class="row mt20 border title-name-{{$employer->id}}">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-weight: bold"> {{$employer->name}} </span>
                                        </div>

                                        <div class="col-md-3">

                                        </div>

                                        <div class="col-md-2 delete-name" data-attribute="title-employer-{{$employer->id}}">

                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="employer[]" value="{{$employer->id}}">
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
                                    <div class="col-md-6" style="font-weight: bold; font-size: 16px">
                                        ADDRESS
                                    </div>
                                    <div class="col-md-4" style="font-weight: bold">
                                        <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                    </div>
                                    <div class="col-md-2" style="font-weight: bold">

                                    </div>

                                </div>

                                @foreach($data['address'] as $address)
                                    <div class="row mt20 border title-address-{{$address->id}}" style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="">{{$address->street}}, </span>
                                            <span class="">{{$address->city}}, </span>
                                            <span class="">{{$address->state}}, </span>
                                            <span class="">{{$address->zip}}</span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-address-{{$address->id}}">
                                            <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="address[]" value="{{$address->id}}">
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
                                    <div class="col-md-6" style="font-weight: bold">
                                        <span style="font-weight: bold; font-size: 16px">PHONE # </span>
                                    </div>
                                    <div class="col-md-3" style="font-weight: bold">
                                        <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                    </div>
                                    <div class="col-md-2" >
                                    </div>

                                    <div class="col-md-1">
                                    </div>
                                </div>
                                @foreach($data['phone'] as $phone)
                                    <div class="row mt20 border title-phone-{{$phone->id}}">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-6">
                                            <span style="font-weight: bold">{{$phone->number}} </span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-phone-{{$phone->id}}">
                                            <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="phone[]" value="{{$phone->id}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(!empty($data['ex_public']))
                            @foreach($data['ex_public'] as $ex_public)
                                <div class="mt20 title-ex_public-{{$ex_public->id}}"></div>
                                <div class="chart-report title-ex_public-{{$ex_public->id}}">
                                    <div class="row " style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="form-text">{{$ex_public->source_name}}</span>
                                            <span class="form-text" style="padding-left: 15px">{{$ex_public->source_id}}</span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-ex_public-{{$ex_public->id}}">
                                            <span style="font-weight: bold; font-size: 16px">DESELECT</span> <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="ex_public[]" value="{{$ex_public->id}}">

                                        </div>
                                    </div>
                                    <div class="row mt20 border" style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        @if($ex_public->status !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">STATUS</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_public->status}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($ex_public->date_filed !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE OPENED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($ex_public->date_filed))}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($ex_public->on_record_until !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">ON RECORD UNTIL</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_public->on_record_until}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_public->claim_amount !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">CLAIM AMOUNT</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> ${{$ex_public->claim_amount}}  </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_public->date_resolved != null )

                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE RESOLVED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($ex_public->date_resolved))}} </span>
                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        @endif

                        @if(!empty($data['tu_public']))
                            @foreach($data['tu_public'] as $tu_public)
                                <div class="mt20 title-tu_public-{{$tu_public->id}}"></div>
                                <div class="chart-report title-tu_public-{{$tu_public->id}}">
                                    <div class="row " style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="form-text">{{$tu_public->name}}</span>
                                            <span class="form-text" style="padding-left: 15px">{{$tu_public->docket_number}}</span>

                                        </div>

                                        <div class="col-md-2 delete-name" data-attribute="title-tu_public-{{$tu_public->id}}">
                                            <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="tu_public[]" value="{{$tu_public->id}}">
                                        </div>
                                    </div>
                                    <div class="row mt20 border" style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        @if($tu_public->type !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">TYPE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$tu_public->type}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($tu_public->date_filed !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE FILED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($tu_public->date_filed))}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($tu_public->on_record_until !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">ON RECORD UNTIL</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$tu_public->on_record_until}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($tu_public->court_type_description !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">TYPE DESCRIPTION</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$tu_public->court_type_description}}  </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($tu_public->responsibility != null )

                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE RESOLVED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$tu_public->responsibility}} </span>
                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        @endif

                        @if(!empty($data['eq_public']))
                            @foreach($data['eq_public'] as $eq_public)
                                <div class="mt20 title-eq_public-{{$eq_public->id}}"></div>
                                <div class="chart-report title-eq_public-{{$eq_public->id}}">
                                    <div class="row " style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="form-text">{{$eq_public->name}}</span>
                                            <span class="form-text" style="padding-left: 15px">{{$eq_public->reference_number}}</span>

                                        </div>

                                        <div class="col-md-2 delete-name" data-attribute="title-eq_public-{{$eq_public->id}}">
                                            <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                                            <input type="hidden" name="tu_public[]" value="{{$eq_public->id}}">
                                        </div>
                                    </div>
                                    <div class="row mt20 border" style="font-weight: bold">
                                        <div class="col-md-1">
                                        </div>
                                        @if($eq_public->classification !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">CLASSIFICATION</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$eq_public->classification}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($tu_public->date_filed !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE FILED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($eq_public->date_filed))}} </span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($eq_public->resposibility !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">RESPONSIBILITY</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$eq_public->resposibility}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($eq_public->category_type !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">CATEGORY TYPE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$eq_public->category_type}}  </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($eq_public->responsibility != null )

                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">RESPONSIBILITY</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$eq_public->responsibility}} </span>
                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        @endif

                        @if(!empty($data['ex_account']))
                            @foreach($data['ex_account'] as $ex_account)
                                <div class="mt20 title-ex_account-{{$ex_account->id}}"></div>
                                <div class="chart-report title-ex_account-{{$ex_account->id}}">
                                    <div class="row mt20 " style="font-weight: bold" >
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="">{{$ex_account->source_name}} </span>

                                            <span style="padding-left: 15px">    # {{$ex_account->source_id}}</span>
                                        </div>
                                        <div class="col-md-2 delete-name" data-attribute="title-ex_account-{{$ex_account->id}}">
                                            <span style="font-weight: bold; font-size: 16px">DESELECT</span>
                                            <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                            <input type="hidden" name="ex_account[{{$ex_account->id}}][id]" value="{{$ex_account->id}}">
                                        </div>

                                    </div>

                                    <div class="row mt20 border " style="font-weight: bold" >
                                        <div class="col-md-1">
                                        </div>
                                        @if($ex_account->opened_date !=null )
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    <label class="form-text">DATE OPENED</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{date("m/d/Y",strtotime($ex_account->opened_date))}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_account->type !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">TYPE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_account->type}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_account->status !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">STATUS</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> {{$ex_account->status}} </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($ex_account->recent_balance_date !=null )
                                            <div class="col-md-3">
                                                <div class="col-md-12">
                                                    <label class="form-text">RECENT BALANCE</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class=""> ${{$ex_account->recent_balance_amount}}  as of {{date("d/m/Y",strtotime($ex_account->recent_balance_date))}} </span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-2">
                                            </div>
                                        @endif
                                    </div>


                                    <?php $string =  strtoupper(str_replace('Never late', '',$ex_account->status))?>

                                    @if(strpos($string, "PAID")!==false && strpos($string, "CLOSED")!==false)
                                        <div class="row mt20 border " style="font-weight: bold" >

                                            @if(strpos(strtoupper($ex_account->type), "CREDIT")!== false)
                                                <div class="col-md-12">
                                                    <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="ex_account[{{$ex_account->id}}][type]" value="credit">

                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][expiration_date]" placeholder="EXPIRATION DATE">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][cvc]" placeholder="CVC (CARD VERIFICATION CODE)">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif

                                            @if(strpos(strtoupper($ex_account->type), "AUTO")!== false)
                                                <div class="col-md-12">
                                                    <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="ex_account[{{$ex_account->id}}][type]" value="auto">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][year]" placeholder="YEAR">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][make]" placeholder="MAKE">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt20">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][model]" placeholder="MODEL">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(strpos(strtoupper($ex_account->type), "PERSONAL")!== false)
                                                <div class="col-md-12">
                                                    <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                </div>

                                                <div class="row mt20">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="ex_account[{{$ex_account->id}}][type]" value="personal">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="ex_account[{{$ex_account->id}}][account_number]" placeholder="SECURITY WORD">
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                            @if(strpos(strtoupper($ex_account->type), "STUDENT")!== false)
                                                <div class="col-md-12">
                                                    <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="ex_account[{{$ex_account->id}}][type]" value="student">
                                                        <input type="text" name="ex_account[{{$ex_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <input type="text" name="ex_account[{{$ex_account->id}}][school_attened]" placeholder="SCHOOL ATTENDED">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <input type="text" name="ex_account[{{$ex_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                    </div>
                                                </div>

                                            @endif
                                            @if(strpos(strtoupper($ex_account->type), "MORTGAGE")!== false)
                                                <div class="col-md-12">
                                                    <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="ex_account[{{$ex_account->id}}][type]" value="mortgage">
                                                        <input type="text" name="ex_account[{{$ex_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <input type="text" name="ex_account[{{$ex_account->id}}][propety_address]" placeholder="PROPERTY ADDRESS">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <input type="text" name="ex_account[{{$ex_account->id}}][security_word]" placeholder="SECURITY WORD">
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
                                @if(!empty($tu_account))
                                    <div class="mt20 title-tu_account-{{$tu_account->id}}"></div>
                                    <div class="chart-report title-tu_account-{{$tu_account->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <span class="">{{$tu_account->account_name}} </span>

                                                <span style="padding-left: 15px">    # {{$tu_account->account_number}}</span>
                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-tu_account-{{$tu_account->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="tu_account[{{$tu_account->id}}][id]" value="{{$tu_account->id}}">
                                            </div>
                                        </div>
                                        <div class="row mt20 border" style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            @if($tu_account->date_opened !=null )
                                                <div class="col-md-2">
                                                    <div class="col-md-12">
                                                        <label class="form-text">DATE OPENED</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{date("m/d/Y",strtotime($tu_account->date_opened))}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($tu_account->account_type_description !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">ACCOUNT TYPE</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$tu_account->account_type_description}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($tu_account->loan_type !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">LOAN TYPE</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$tu_account->loan_type}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($tu_account->pay_status !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">PAY STATUS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="">{{$tu_account->pay_status}} </span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-2">
                                                </div>
                                            @endif

                                        </div>


                                        @if(($tu_account->late_30_count!==0 ||$tu_account->late_60_count!==0 || $tu_account->late_90_count!==0) && strpos(strtoupper($tu_account->account_type), "OPEN")!==false)
                                            <div class="row mt20 border " style="font-weight: bold" >

                                                @if(strpos(strtoupper($tu_account->loan_type), "CREDIT")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>
                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="tu_account[{{$tu_account->id}}][id]" value="credit">

                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][expiration_date]" placeholder="EXPIRATION DATE">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][cvc]" placeholder="CVC (CARD VERIFICATION CODE)">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                                @if(strpos(strtoupper($tu_account->loan_type), "AUTO")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>
                                                    <div class="row mt-20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4">
                                                                <input type="hidden" name="tu_account[{{$tu_account->id}}][id]" value="auto">

                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][year]" placeholder="YEAR">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][make]" placeholder="MAKE">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][model]" placeholder="MODEL">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(strpos(strtoupper($tu_account->loan_type), "PERSONAL")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>

                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="tu_account[{{$tu_account->id}}][id]" value="personal">

                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input class="form-control" type="text" name="tu_account[{{$tu_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                                @if(strpos(strtoupper($tu_account->loan_type), "STUDENT")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="tu_account[{{$tu_account->id}}][id]" value="student">

                                                            <input type="text" name="tu_account[{{$tu_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="tu_account[{{$tu_account->id}}][school_attended]" placeholder="SCHOOL ATTENDED">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="tu_account[{{$tu_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                        </div>
                                                    </div>

                                                @endif
                                                @if(strpos(strtoupper($tu_account->loan_type), "MORTGAGE")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="tu_account[{{$tu_account->id}}][id]" value="mortgage">

                                                            <input type="text" name="tu_account[{{$tu_account->id}}][school_attended]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="tu_account[{{$tu_account->id}}][property_address]" placeholder="PROPERTY ADDRESS">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="tu_account[{{$tu_account->id}}][security_word]" placeholder="SECURITY WORD">
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
                                    <div class="mt20 title-eq_account-{{$eq_account->id}}"></div>
                                    <div class="chart-report title-eq_account-{{$eq_account->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <span class="">{{$eq_account->name}} </span>
                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-eq_account-{{$eq_account->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="eq_account[{{$eq_account->id}}][id]" value="{{$eq_account->id}}">
                                            </div>
                                        </div>
                                        <div class="row mt20 border" style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            @if($eq_account->date_opened !=null )
                                                <div class="col-md-2">
                                                    <div class="col-md-12">
                                                        <label class="form-text">DATE OPENED</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{date("m/d/Y",strtotime($eq_account->date_opened))}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($eq_account->account_type !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">ACCOUNT TYPE</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$eq_account->account_type}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($eq_account->loan_type !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">ACCOUNT TITLE</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class=""> {{$eq_account->account_title}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($eq_account->current_payment_status !=null )
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <label class="form-text">PAYMENT STATUS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="">{{$eq_account->current_payment_status}} </span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-2">
                                                </div>
                                            @endif

                                        </div>
                                        @if(($eq_account->late_30_count!==0 ||$eq_account->late_60_count!==0 || $eq_account->late_90_count!==0) && strpos(strtoupper($eq_account->account_status), "OPEN")!==false)
                                            <div class="row mt20 border " style="font-weight: bold" >

                                                @if(strpos(strtoupper($eq_account->category_type), "CREDIT")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>
                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="eq_account[{{$eq_account->id}}][type]" value="credit">

                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][eqpiration_date]" placeholder="EXPIRATION DATE">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][cvc]" placeholder="CVC (CARD VERIFICATION CODE)">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                                @if(strpos(strtoupper($eq_account->category_type), "AUTO")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>
                                                    <div class="row mt-20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4">
                                                                <input type="hidden" name="eq_account[{{$eq_account->id}}][type]" value="auto">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][year]" placeholder="YEAR">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][maka]" placeholder="MAKE">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][model]" placeholder="MODEL">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(strpos(strtoupper($eq_account->category_type), "PERSONAL")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>

                                                    <div class="row mt20">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="eq_account[{{$eq_account->id}}][type]" value="personal">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->idd}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input class="form-control" type="text" name="eq_account[{{$eq_account->id}}][security_word]" placeholder="SECURITY WORD">
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                                @if(strpos(strtoupper($eq_account->category_type), "STUDENT")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="eq_account[{{$eq_account->id}}][type]" value="student">
                                                            <input type="text" name="eq_account[{{$eq_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="eq_account[{{$eq_account->id}}][Scholl_attended]" placeholder="SCHOOL ATTENDED">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="eq_account[{{$eq_account->id}}][secutity_word]" placeholder="SECURITY WORD">
                                                        </div>
                                                    </div>

                                                @endif
                                                @if(strpos(strtoupper($eq_account->category_type), "MORTGAGE")!== false)
                                                    <div class="col-md-12">
                                                        <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="eq_account[{{$eq_account->id}}][type]" value="mortgage">
                                                            <input type="text" name="eq_account[{{$eq_account->id}}][account_number]" placeholder="FULL ACCOUNT NUMBER">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="eq_account[{{$eq_account->id}}][property_address]" placeholder="PROPERTY ADDRESS">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <input type="text" name="eq_account[{{$eq_account->id}}][security_word]" placeholder="SECURITY WORD">
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
                                @if(!empty($ex_inquiry))
                                    <div class="mt20 title-ex_inquiry-{{$ex_inquiry->id}}"></div>
                                    <div class="chart-report title-ex_inquiry-{{$ex_inquiry->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <span class="">{{$ex_inquiry->source_name}} </span>

                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-ex_inquiry-{{$ex_inquiry->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="ex_inquiry[]" value="{{$ex_inquiry->id}}">

                                            </div>

                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($data['tu_inquiry']))
                            @foreach($data['tu_inquiry'] as $tu_inquiry)
                                @if(!empty($tu_inquiry))

                                    <div class="mt20 title-tu_inquiry-{{$tu_inquiry->id}}"></div>
                                    <div class="chart-report title-tu_inquiry-{{$tu_inquiry->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <span class="">{{$tu_inquiry->subscriber_name}} </span>
                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-tu_inquiry-{{$tu_inquiry->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="tu_inquiry[]" value="{{$tu_inquiry->id}}">

                                            </div>

                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($data['eq_inquiry']))
                            @foreach($data['eq_inquiry'] as $eq_inquiry)
                                @if(!empty($eq_inquiry))

                                    <div class="mt20 title-eq_inquiry-{{$eq_inquiry->id}}"></div>
                                    <div class="chart-report title-eq_inquiry-{{$eq_inquiry->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">{{$eq_inquiry->industry_name}}</div>
                                                <div class="col-md-12">{{$eq_inquiry->name}}</div>
                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-tu_inquiry-{{$eq_inquiry->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="tu_inquiry[]" value="{{$eq_inquiry->id}}">

                                            </div>

                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($data['ex_statement']))
                            @foreach(($data['ex_statement']) as $ex_statement)
                                @if(!empty($ex_statement))
                                    <div class="mt20 title-ex_statement-{{$ex_statement->id}}"></div>
                                    <div class="chart-report title-ex_statement-{{$ex_statement->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <span class="">{{$ex_statement->statement}} </span>

                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-ex_statement-{{$ex_statement->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="ex_statement[]" value="{{$ex_statement->id}}">

                                            </div>

                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($data['tu_statement']))
                            @foreach(($data['tu_statement']) as $tu_statement)
                                @if(!empty($tu_statement))
                                    <div class="mt20 title-tu_statement-{{$tu_statement->id}}"></div>
                                    <div class="chart-report title-tu_statement-{{$tu_statement->id}}">
                                        <div class="row mt20 " style="font-weight: bold" >
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-6">
                                                <span class="">{{$tu_statement->statement}} {{$tu_statement->description}} </span>
                                            </div>
                                            <div class="col-md-2 delete-name" data-attribute="title-tu_statement-{{$tu_statement->id}}">
                                                <span style="font-weight: bold; font-size: 16px">DESELECT</span>

                                                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%"></i>
                                                <input type="hidden" name="tu_statement[]" value="{{$tu_statement->id}}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        <div class="row mt20">
                            <div class="col-md-5"></div>
                            <div class="col-md-2" style="margin-bottom: 20px">
                                <button type="submit" class="btn btn-primary">
                                    CONFIRM DISPUTE
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
