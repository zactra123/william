@extends('layouts.layout')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
<style>
    .charts {
         color: #16181b !important;
    }
</style>

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> View Negative Item </h2>
            <span class="sub-title"><a href="#">Home</a> &gt; Negative Item</span>
        </div>
    </section>

    <section class="charts working-section" style="background-color: #3d6983">
        <div class="container-fluid">

            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#" class="btn btn-secondary creditReport" data-target="Experian"><img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                <a href="#" class="btn btn-secondary creditReport" data-target="TransUnion"><img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"></a>
            </div>

            {!! Form::open(['route' => ['negative.store'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}


            <div class="Experian" style="display: block">
                <div class="row mt20">
                    <div class="col-md-1 mt20">
                    </div>
                    <div class="col-md-10 mt20">
                        <div class="chart-container" >
                            <div class="row mt20">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold"> NAME</span>
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold">NAME IDENTIFICATION NUMBER</span>
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold">Repair</span>
                                </div>
                            </div>

                            @foreach($clientReportsEX->clientNames as $names)
                                <div class="row mt20">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold"> {{$names->full_name}}</span>
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold">{{$names->nin}}</span>
                                    </div>
                                    <div class="col-md-3">

                                            <span style="font-weight: bold">Repair
                                                <span style="padding-left: 30px"><input type="checkbox" name="ex_name[]" value="{{$names->id}}"   data-toggle="modal" data-target="#exampleModal">
                                                   </span></span>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="mt20"></div>
                        <div class="chart-container">
                            <div class="row ">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold">
                                    Address
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    Address identification number
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    Residence type
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <div class="boxheading">
                            </div>
                            @foreach($clientReportsEX->clientAddresses as $address)
                                <div class="row mt20" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <span class="">{{$address->street}}, </span>
                                        <span class="">{{$address->city}}, </span>
                                        <span class="">{{$address->state}}, </span>
                                        <span class="">{{$address->zip}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="">{{$address->ain}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="">{{$address->type}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="pull">Repair<span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $address->id) !!}</span></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt20"></div>
                        <div class="chart-container">
                            <div class="boxheading mt20">
                            </div>
                            <div class="row" >
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold">
                                    Phone #
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    Phone type
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <div class="boxheading">
                            </div>
                            @foreach($clientReportsEX->clientPhones as $phone)
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <span class="">{{$phone->number}}, </span>

                                    </div>
                                    <div class="col-md-2">
                                        <span class="">{{$phone->type}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="pull">Repair<span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $phone->id) !!}</span></span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="mt20"></div>
                        @foreach($clientReportsEX->clientExPublicRecords as $publicRecords)
                            <div class="mt20"></div>
                            <div class="chart-container">
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ITEM NAME</h3>
                                        <span class="">{{$publicRecords->source_name}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3>REFERENCE  #</h3>
                                        <span class="">{{$publicRecords->source_id}}</span>
                                    </div>
                                    @if($publicRecords->claim_amount !=null )
                                        <div class="col-md-2">
                                            <h3>CLAIM AMOUNT</h3>
                                            <span class=""> ${{$publicRecords->claim_amount}}  </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_filed !=null )
                                        <div class="col-md-2">
                                            <h3>DATE OPENED</h3>

                                            <span class=""> {{date("m/d/Y",strtotime($publicRecords->date_filed))}} </span>
                                        </div>
                                    @endif

                                    <div class="col-md-1">
                                        <h3>REPAIR</h3>
                                        <span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $phone->id) !!}</span>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ADDRESS</h3>
                                        <span class="">{{$publicRecords->source_address_street}}, {{$publicRecords->source_address_city}}, {{$publicRecords->source_address_state}}, {{$publicRecords->source_address_zip}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3> ADDRESS IDENTIFICATION NUMBER</h3>
                                        <span class="">{{$publicRecords->ain}}</span>
                                    </div>
                                    @if($publicRecords->status !=null )
                                        <div class="col-md-2">
                                            <h3>STATUS</h3>
                                            <span class=""> {{$publicRecords->status}} </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->on_record_until !=null )
                                        <div class="col-md-2">
                                            <h3>ON RECORD UNTIL</h3>
                                            <span class=""> {{$publicRecords->on_record_until}} </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_resolved != null )
                                        <div class="col-md-2">
                                            <h3>DATE RESOLVED</h3>
                                            <span class=""> ${{$publicRecords->date_resolved}} </span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach

                        @foreach($clientReportsEX->clientExAccounts as $accounts)
                            <div class="mt20"></div>
                            <div class="chart-container">
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ACCOUNT NAME</h3>
                                        <span class="">{{$accounts->source_name}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3>ACCOUNT #</h3>
                                        <span class="">{{$accounts->source_id}}</span>
                                    </div>
                                    @if($accounts->recent_balance_date !=null )
                                        <div class="col-md-2">
                                            <h3>RECENT BALANCE</h3>
                                            <span class=""> ${{$accounts->recent_balance_amount}}  as of {{date("d/m/Y",strtotime($accounts->recent_balance_date))}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->opened_date !=null )
                                        <div class="col-md-2">
                                            <h3>DATE OPENED</h3>
                                            <span class=""> {{date("m/d/Y",strtotime($accounts->opened_date))}} </span>
                                        </div>
                                    @endif

                                    <div class="col-md-1">
                                        <h3>REPAIR</h3>
                                        <span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $phone->id) !!}</span>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ADDRESS</h3>
                                        <span class="">{{$accounts->source_address_street}}, {{$accounts->source_address_city}}, {{$accounts->source_address_state}}, {{$accounts->source_address_zip}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3> ADDRESS IDENTIFICATION NUMBER</h3>
                                        <span class="">{{$accounts->ain}}</span>
                                    </div>
                                    @if($accounts->status !=null )
                                        <div class="col-md-2">
                                            <h3>STATUS</h3>
                                            <span class=""> {{$accounts->status}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->type !=null )
                                        <div class="col-md-2">
                                            <h3>TYPE</h3>
                                            <span class=""> {{$accounts->type}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->credit_limit != null )
                                        <div class="col-md-2">
                                            <h3>CREDIT LIMIT OR ORIGINAL AMOUNT</h3>
                                            <span class=""> ${{$accounts->credit_limit}} </span>
                                        </div>
                                    @endif

                                </div>
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>

                                    @if($accounts->status_date !=null )
                                        <div class="col-md-2">
                                            <h3>DATE OF STATUS</h3>
                                            <span class=""> {{date("m/d/Y",strtotime($accounts->status_date))}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->term !=null )
                                        <div class="col-md-2">
                                            <h3>TERMS</h3>
                                            <span class=""> {{$accounts->term}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->report_started_date != null )
                                        <div class="col-md-2">
                                            <h3>FIRST REPORTED DATE</h3>
                                            <span class=""> {{date("m/d/Y",strtotime($accounts->report_started_date))}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->responsibility != null )
                                        <div class="col-md-2">
                                            <h3>RESPONSIBILITY</h3>
                                            <span class=""> {{$accounts->responsibility}} </span>
                                        </div>
                                    @endif

                                    @if($accounts->monthly_payment != null )
                                        <div class="col-md-2">
                                            <h3>MONTHLY PAYMENT</h3>
                                            <span class=""> ${{$accounts->monthly_payment}} </span>
                                        </div>
                                    @endif

                                </div>
                            @if($accounts->paymentHistories->whereIn('status',["60","30",'90'] )->first() )
                                <!--                            --><?php //dd($accounts->paymentHistories->whereIn('status',["ND","OK",'90'] )->first())?>
                                    <div class="row mt20">
                                        ACCOUNT HISTORY
                                        @foreach($accounts->paymentHistories->where('status','=',["30","60",'90'] ) as $payment)
                                            <div class="col-md-1">
                                                <h3>{{$payment->year}}</h3>
                                                <h3>{{$payment->month}}</h3>
                                                <h3>{{$payment->status}}</h3>

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div class="mt20"></div>
                        <div class="chart-container">
                            @foreach($clientReportsEX->clientExInquiry->whereNotIn('source_name',['EXPERIAN', 'CREDIT KARMA' ]) as $inquiries)
                                <div class="boxheading mt20"></div>

                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ACCOUNT NAME</h3>
                                        <span class="">{{$inquiries->source_name}}</span>

                                    </div>
                                    <div class="col-md-6">
                                        <h3>DATE O REQUSET</h3>
                                        @if(is_array(json_decode(str_replace('\"',"'",$inquiries->date_of_inquiry))))

                                            <div class="row">
                                                <div class="col-md-8">
                                                    @foreach(json_decode(str_replace('\"',"'",$inquiries->date_of_inquiry)) as $date)


                                                        {{$date.' '}}
                                                    @endforeach
                                                </div>

                                            </div>
                                        @else
                                            <span class="">{{$inquiries->date_of_inquiry}}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <h3>Repair</h3>
                                        <span>{!! Form::checkbox('ex_name[]', $inquiries->id) !!}</span>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div class="TransUnion" style="display: none">
                <div class="row mt20">
                    <div class="col-md-1 mt20">
                    </div>
                    <div class="col-md-10 mt20">
                        <div class="chart-container" >
                            <div class="row mt20">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold"> NAME</span>
                                </div>

                            </div>
                            <div class="row mt20">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold"> {{$clientReportsTU->full_name}}</span>
                                </div>

                                <div class="col-md-3">

                                </div>
                            </div>

                        @foreach($clientReportsTU->clientNames as $names)

                                <div class="row mt20">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold"> {{$names->full_name}}</span>
                                    </div>

                                    <div class="col-md-3">

                                            <span style="font-weight: bold">Repair
                                                <span style="padding-left: 30px"><input type="checkbox" name="ex_name[]" value="{{$names->id}}"   data-toggle="modal" data-target="#exampleModal">
                                            </span></span>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="mt20"></div>
                        <div class="chart-container">
                            <div class="row ">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold">
                                    Address
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    Address identification number
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    Residence type
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <div class="boxheading">
                            </div>
                            @foreach($clientReportsTU->clientAddresses as $address)
                                <div class="row mt20" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <span class="">{{$address->street}}, </span>
                                        <span class="">{{$address->city}}, </span>
                                        <span class="">{{$address->state}}, </span>
                                        <span class="">{{$address->zip}}</span>
                                    </div>

                                    <div class="col-md-2">
                                        <span class="pull">Repair<span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $address->id) !!}</span></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt20"></div>
                        <div class="chart-container">
                            <div class="boxheading mt20">
                            </div>
                            <div class="row" >
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold">
                                    Phone #
                                </div>

                                <div class="col-md-2">

                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <div class="boxheading">
                            </div>
                        @foreach($clientReportsTU->clientPhones as $phone)
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <span class="">{{$phone->number}}, </span>

                                    </div>

                                    <div class="col-md-2">
                                        <span class="pull">Repair<span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $phone->id) !!}</span></span>
                                    </div>
                                </div>
                        @endforeach

                        </div>
                        <div class="mt20"></div>
                    @foreach($clientReportsTU->clientTuAccounts as $accounts)

                            <div class="mt20"></div>
                            <div class="chart-container">
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ACCOUNT NAME</h3>
                                        <span class="">{{$accounts->account_name}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3>ACCOUNT #</h3>
                                        <span class="">{{$accounts->account_number}}</span>
                                    </div>
                                    @if($accounts->responsibility !=null )
                                        <div class="col-md-2">
                                            <h3>RESPONSIBILITY</h3>
                                            <span class=""> ${{$accounts->responsibility}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->date_opened !=null )
                                        <div class="col-md-2">
                                            <h3>DATE OPENED</h3>
                                            <span class=""> {{date("m/d/Y",strtotime($accounts->date_opened))}} </span>
                                        </div>
                                    @endif

                                    <div class="col-md-1">
                                        <h3>REPAIR</h3>
                                        <span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $phone->id) !!}</span>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ADDRESS</h3>
                                        <span class="">{{$accounts->address}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3> PHONE #</h3>
                                        <span class="">{{$accounts->phone}}</span>
                                    </div>
                                    @if($accounts->account_type_description !=null )
                                        <div class="col-md-2">
                                            <h3>ACCOUNT TYPE</h3>
                                            <span class=""> {{$accounts->account_type_description}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->loan_type !=null )
                                        <div class="col-md-2">
                                            <h3>LOAN TYPE</h3>
                                            <span class=""> {{$accounts->loan_type}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->date_effective_label != null )
                                        <div class="col-md-2">
                                            <h3>{{$accounts->date_effective_label}}</h3>
                                            <span class=""> {{date("m/d/Y", strtotime($accounts->date_effective))}} </span>
                                        </div>
                                    @endif

                                </div>
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>

                                    @if($accounts->pay_status !=null )
                                        <div class="col-md-2">
                                            <h3>PAY STATUS</h3>
                                            <span class=""> {{$accounts->pay_status}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->date_closed !=null )
                                        <div class="col-md-2">
                                            <h3>DATE CLOSED</h3>
                                            <span class=""> {{date("m/d/Y", strtotime($accounts->date_closed))}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->remark != null )
                                        <div class="col-md-2">
                                            <h3>REMARK</h3>
                                            <span class=""> {{$accounts->remark}} </span>
                                        </div>
                                    @endif
                                    @if($accounts->estimated_deletion_date != null )
                                        <div class="col-md-2">
                                            <h3>RESPONSIBILITY</h3>
                                            <span class=""> {{date("m/d/Y", strtotime($accounts->estimated_deletion_date))}} </span>
                                        </div>
                                    @endif

                                    @if($accounts->monthly_payment != null )
                                        <div class="col-md-2">
                                            <h3>CREDIT LIMIT</h3>
                                            <span class=""> ${{$accounts->credit_limit??$accounts->hist_credit_limit_stmt }} </span>
                                        </div>
                                    @endif

                                </div>
                            @if($accounts->accountPaymentHistories->whereIn('status',["60","30",'90'] )->first() )
                                <!--                            --><?php //dd($accounts->paymentHistories->whereIn('status',["ND","OK",'90'] )->first())?>
                                    <div class="row mt20">
                                        ACCOUNT HISTORY
                                        @foreach($accounts->paymentHistories->where('status','=',["30","60",'90'] ) as $payment)
                                            <div class="col-md-1">
                                                <h3>{{$payment->year}}</h3>
                                                <h3>{{$payment->month}}</h3>
                                                <h3>{{$payment->status}}</h3>

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        @endforeach

                    @foreach($clientReportsTU->clientTuPublicRecords as $publicRecords)
                            <div class="mt20"></div>
                            <div class="chart-container">
                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>COURT NAME</h3>
                                        <span class="">{{$publicRecords->name}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3>REFERENCE  #</h3>
                                        <span class="">{{$publicRecords->docket_number}}</span>
                                    </div>
                                    @if($publicRecords->address !=null )
                                        <div class="col-md-2">
                                            <h3>ADDRESS</h3>
                                            <span class=""> {{$publicRecords->address}}  </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->phone !=null )
                                        <div class="col-md-2">
                                            <h3>PHONE #</h3>

                                            <span class=""> {{$publicRecords->phone}}</span>
                                        </div>
                                    @endif

                                    <div class="col-md-1">
                                        <h3>REPAIR</h3>
                                        <span style="padding-left: 30px">{!! Form::checkbox('ex_name[]', $phone->id) !!}</span>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>TYPE</h3>
                                        <span class="">{{$publicRecords->type}}</span>

                                    </div>
                                    <div class="col-md-2">
                                        <h3>DATE FILED</h3>
                                        <span class="">{{date("m/d/Y", strtotime($publicRecords->date_filed))}}</span>
                                    </div>
                                    @if($publicRecords->court_type_description !=null )
                                        <div class="col-md-2">
                                            <h3>COURT TYPE</h3>
                                            <span class=""> {{$publicRecords->court_type_description}} </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_effective_label !=null )
                                        <div class="col-md-2">
                                            <h3>{{$publicRecords->date_effective_label}}</h3>
                                            <span class=""> {{date("m/d/Y", strtotime($publicRecords->date_effective))}} </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_paid != null )
                                        <div class="col-md-2">
                                            <h3>DATE PAID</h3>
                                            <span class=""> {{date("m/d/Y", strtotime($publicRecords->date_paid))}} </span>
                                        </div>
                                    @endif

                                </div>

                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>

                                    @if($publicRecords->responsibility !=null )
                                        <div class="col-md-2">
                                            <h3>RESPONSIBILITY</h3>
                                            <span class=""> {{$publicRecords->responsibility}} </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->estimated_deletion_date !=null )
                                        <div class="col-md-2">
                                            <h3>ESTIMATED DALETATION DATE</h3>
                                            <span class=""> {{date("m/d/Y", strtotime($publicRecords->estimated_deletion_date))}} </span>
                                        </div>
                                    @endif
                                    @if($publicRecords->plaintiff_attorney != null )
                                        <div class="col-md-2">
                                            <h3>PLAINTIFF ATTORNEY</h3>
                                            <span class=""> {{$publicRecords->plaintiff_attorney}} </span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach


                        <div class="mt20"></div>
                        <div class="chart-container">
                    @foreach($clientReportsTU->clientTuInquiries->whereNotIn('source_name',['EXPERIAN', 'CREDIT KARMA' ]) as $inquiry)

                                <div class="boxheading mt20"></div>

                                <div class="row ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <h3>ACCOUNT NAME</h3>
                                        <span class="">{{$inquiry->subscriber_name}}</span>

                                    </div>
                                    <div class="col-md-6">
                                        <h3>DATE O REQUSET</h3>
                                        @if(is_array(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates))))

                                            <div class="row">
                                                <div class="col-md-8">
                                                    @foreach(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates)) as $date)


                                                        {{$date.' '}}
                                                    @endforeach
                                                </div>

                                            </div>
                                        @else
                                            <span class="">{{json_decode(str_replace(['[',']'],'',$inquiries->date_of_inquiry))}}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <h3>Repair</h3>
                                        <span>{!! Form::checkbox('ex_name[]', $inquiries->id) !!}</span>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            </div>



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
                        <div class="form row">
                            <div class="form-group col-md-12">
                                <select class="form-control" name="secret_questions_id" id="secret_question">
                                    <option disabled="disabled" selected="selected">Choose Repiar option</option>


                                        <option value="1">Option 1</option>
                                        <option value="1">Option 2</option>
                                        <option value="1">Option 3</option>
                                        <option value="1">Option 4</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="comment" id="comment">

                                </textarea>
                            </div>
                            <div class="form-group col-md-12">

                            </div>

                            <div class="form-group col-md-12">

                            </div>



                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>


            <div class="row mt20">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
                <div class="col-md-5"></div>

            </div>
            {!! Form::close() !!}
        </div>
    </section>
        <script>
            $(document).ready(function(){
                $(".creditReport").on('click', function(event) {

                    console.log($(this).attr('data-target'));
                    var name = $(this).attr('data-target');


                    $(".Experian").css("display", "none");
                    $(".TransUnion").css("display", "none");
                    $("."+name).css("display", "block");

                });
            });
        </script>

@endsection
