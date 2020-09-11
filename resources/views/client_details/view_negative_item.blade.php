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
            <h2 class="title"> View Negative Item </h2>
            <span class="sub-title"><a href="#">Home</a> &gt; Negative Item</span>
        </div>
    </section>

    <section class="charts working-section">
        <div class="container-fluid">

            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#" class="btn btn-secondary creditReport" data-target="Experian"><img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                <a href="#" class="btn btn-secondary creditReport" data-target="TransUnion"><img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"></a>
            </div>

            {!! Form::open(['route' => ['negative.store'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}

            <div class="Experian" style="display: none">
                <div class="row mt20">
                    <div class="col-md-1 mt20">
                    </div>
                    <div class="col-md-10 mt20">
                        <div class="chart-report">
                            <div class="row mt20">

                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold; font-size: 16px"> NAME</span>
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold; font-size: 16px">NAME ID #</span>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <span style="font-weight: bold; font-size: 16px">DISPUTE</span>
                                </div>

                            </div>

                            @foreach($clientReportsEX->clientNames as $names)
                                <div class="row mt20 border">

                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold"> {{$names->full_name}}</span>
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold">{{$names->nin}}</span>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox"   id="name-{{$names->id}}"  class="customcheck ex_name">
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        </div>
                        <div class="mt20"></div>
                        <div class="chart-report">
                            <div class="row">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold; font-size: 16px">
                                    ADDRESS
                                </div>
                                <div class="col-md-2" style="font-weight: bold; font-size: 16px">
                                    ADDRESS ID #
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    RESIDENCE TYPE
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    DISPUTE
                                </div>

                            </div>

                            @foreach($clientReportsEX->clientAddresses as $address)
                                <div class="row mt20 border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <span class="">{{$address->street}}, </span>
                                        <span class="">{{$address->city}}, </span>
                                        <span class="">{{$address->state}}, </span>
                                        <span class="">{{$address->zip}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class=""># {{$address->ain}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="">{{strtoupper($address->type)}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_address[]" value="{{$address->id}}" id="ex-address-{{$address->id}}" class="customcheck ex_address">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt20"></div>
                        <div class="chart-report">

                            <div class="row" >
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold">
                                    <span style="font-weight: bold; font-size: 16px">
                                    PHONE #
                                    </span>
                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    <span style="font-weight: bold; font-size: 16px">
                                    PHONE TYPE
                                    </span>
                                </div>
                                <div class="col-md-2" >
                                </div>

                                <div class="col-md-2">
                                    <span style="font-weight: bold; font-size: 16px">
                                    DISPUTE
                                    </span>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            @foreach($clientReportsEX->clientPhones as $phone)
                                <div class="row mt20 border">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                         <span style="font-weight: bold">{{$phone->number}} </span>

                                    </div>
                                    <div class="col-md-2">
                                        <span style="font-weight: bold">{{strtoupper($phone->type)}}</span>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" id="ex-phone-{{$phone->id}}"   class="customcheck ex_phone">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="mt20"></div>
                        @foreach($clientReportsEX->clientExPublicRecords as $publicRecords)
                            <div class="mt20"></div>
                            <div class="chart-report">
                                <div class="row " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <span class="form-text">{{$publicRecords->source_name}}</span>
                                        <span class="form-text" style="padding-left: 15px">{{$publicRecords->source_id}}</span>

                                    </div>

                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$publicRecords->id}}"  id="ex-publicRecorde-{{$publicRecords->id}}" class="customcheck ex_publicRecorde">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    @if($publicRecords->status !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">STATUS</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$publicRecords->status}} </span>
                                            </div>
                                        </div>

                                    @endif

                                    @if($publicRecords->date_filed !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE OPENED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($publicRecords->date_filed))}} </span>
                                            </div>
                                        </div>

                                    @endif

                                    @if($publicRecords->on_record_until !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">ON RECORD UNTIL</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$publicRecords->on_record_until}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($publicRecords->claim_amount !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">CLAIM AMOUNT</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> ${{$publicRecords->claim_amount}}  </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_resolved != null )

                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE RESOLVED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($publicRecords->date_resolved))}} </span>
                                            </div>
                                        </div>

                                    @endif

                                </div>
                            </div>
                        @endforeach

                        <div class="mt20"></div>

                        <div class="chart-report">
                            <span style="font-weight: bold">NEGATIVE ACCOUNT</span>
                        @foreach($clientReportsEX->clientExAccounts->where('negative_item', true) as $accounts)
                            <div class="mt20"></div>

                                <div class="row border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>

                                    <div class="col-md-2">
                                        <img src="{{asset('images/banks_logo/hfs_200x200.jpg')}}" width="50px">
                                    </div>
                                    <div class="col-md-7">
                                        <span class="">{{$accounts->source_name}} </span>

                                        <span style="padding-left: 15px">    # {{$accounts->source_id}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$accounts->id}}" id="ex-account-{{$accounts->id}}" class="customcheck ex_account">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 " style="font-weight: bold" >
                                    <div class="col-md-1">
                                    </div>
                                    @if($accounts->opened_date !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE OPENED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($accounts->opened_date))}} </span>
                                            </div>
                                        </div>

                                    @endif

                                    @if($accounts->type !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->type}} </span>

                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->status !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">STATUS</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->status}} </span>

                                            </div>
                                        </div>
                                    @endif

                                    @if($accounts->recent_balance_date !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">RECENT BALANCE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> ${{$accounts->recent_balance_amount}}  as of {{date("d/m/Y",strtotime($accounts->recent_balance_date))}} </span>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-2">
                                        </div>
                                    @endif

                                </div>
                            @if($accounts->paymentHistories->whereIn('status',["30","30",'90'] )->first() )
                                    <div class="row mt20 border">
                                        <div class="col-md-12">ACCOUNT HISTORY</div>

                                        @foreach($accounts->paymentHistories->whereIn('status',["30","60",'90'] ) as $payment)
                                            <div class="col-md-4 border">
                                                LATE {{$payment->status}} AS OF {{$payment->month}}/{{$payment->year}}

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                        @endforeach
                        </div>

                        <div class="mt20"></div>

                        <div class="chart-report">
                            <span style="font-weight: bold">GOOD STANDING ACCOUNT</span>
                            @foreach($clientReportsEX->clientExAccounts->where('negative_item', false) as $accounts)
                                <div class="mt20"></div>

                                <div class="row border" style="font-weight: bold; padding-top: 20px">
                                    <div class="col-md-1">
                                    </div>

                                    <div class="col-md-2">
                                        <img src="{{asset('images/banks_logo/hfs_200x200.jpg')}}" width="50px">
                                    </div>
                                    <div class="col-md-7">
                                        <span class="">{{$accounts->source_name}} </span>

                                        <span style="padding-left: 15px">    # {{$accounts->source_id}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" id="ex-account-{{$accounts->id}}" class="customcheck ex_account">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 " style="font-weight: bold" >
                                    <div class="col-md-1">
                                    </div>
                                    @if($accounts->opened_date !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE OPENED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($accounts->opened_date))}} </span>
                                            </div>
                                        </div>

                                    @endif

                                    @if($accounts->type !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->type}} </span>

                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->status !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">STATUS</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->status}} </span>

                                            </div>
                                        </div>
                                    @endif

                                    @if($accounts->recent_balance_date !=null )
                                        <div class="col-md-3">
                                            <div class="col-md-12">
                                                <label class="form-text">RECENT BALANCE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> ${{$accounts->recent_balance_amount}}  as of {{date("d/m/Y",strtotime($accounts->recent_balance_date))}} </span>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-2">
                                        </div>
                                    @endif

                                </div>
                            @if($accounts->paymentHistories->whereIn('status',["30","30",'90'] )->first() )
                                    <div class="row mt20 border">
                                        <div class="col-md-12">ACCOUNT HISTORY</div>

                                        @foreach($accounts->paymentHistories->whereIn('status',["30","60",'90'] ) as $payment)
                                            <div class="col-md-4 border">
                                                LATE {{$payment->status}} AS OF {{$payment->month}}/{{$payment->year}}

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                        @endforeach
                        </div>

                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold"> HARD INQUIRIES</span>

                            @foreach($clientReportsEX->clientExInquiry->where('negative_item', true)->whereNotIn('source_name',['EXPERIAN', 'EXPERIAN CREDITMATCH','EXPERIAN CREDIT WORKS','CREDIT KARMA' ]) as $inquiries)

                                <div class="row mt20 border">
                                    <div class="col-md-1">
                                    </div>

                                    <div class="col-md-2">
                                        <div class="col-md-12">
                                            <label class="form-text">INQUIRY NAME</label>
                                        </div>
                                        <div class="col-md-12">
                                            <span class=""> {{$inquiries->source_name}} </span>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="form-text">DATE OF REQUEST</label>
                                        </div>
                                        <div class="col-md-12">
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
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}"  id="ex-inquiry-{{$inquiries->id}}"  class="customcheck ex_inquiry">
                                        </div>
                                    </div>


                                </div>

                            @endforeach
                        </div>
                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold"> SOFT INQUIRIES</span>

                            @foreach($clientReportsEX->clientExInquiry->where('negative_item', false)->whereNotIn('source_name',['EXPERIAN', 'EXPERIAN CREDITMATCH','EXPERIAN CREDIT WORKS','CREDIT KARMA' ]) as $inquiries)

                                <div class="row mt20 border">
                                    <div class="col-md-1">
                                    </div>

                                    <div class="col-md-2">
                                        <div class="col-md-12">
                                            <label class="form-text">INQUIRY NAME</label>
                                        </div>
                                        <div class="col-md-12">
                                            <span class=""> {{$inquiries->source_name}} </span>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="form-text">DATE OF REQUEST</label>
                                        </div>
                                        <div class="col-md-12">
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
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}"  id="ex-inquiry-{{$inquiries->id}}"  class="customcheck ex_inquiry">
                                        </div>
                                    </div>


                                </div>

                            @endforeach
                        </div>
                        <div class="mt20"></div>

                        <div class="chart-report">
                            <span style="font-weight: bold">STATEMENTS</span>

                            @foreach($clientReportsEX->clientExStatements as $statements)

                                <div class="row mt20 border">
                                    <div class="col-md-1">
                                    </div>

                                    <div class="col-md-9">
                                          <span style="font-weight: bold"> {{$statements->statement}} </span>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$statements->id}}" id="ex-statement-{{$statements->id}}"    class="customcheck ex_statement">
                                        </div>
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
                        <div class="chart-report" >
                            <div class="row mt20 ">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold"> NAME</span>
                                </div>

                            </div>
                            <div class="row mt20 border">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <span style="font-weight: bold"> {{$clientReportsTU->full_name}}</span>
                                </div>

                                <div class="col-md-3">

                                </div>
                            </div>

                        @foreach($clientReportsTU->clientNames as $names)

                                <div class="row mt20 border">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <span style="font-weight: bold"> {{$names->full_name}}</span>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" class="customcheck tu_name">
                                        </div>
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
                                    ADDRESS
                                </div>
                                <div class="col-md-4" style="font-weight: bold">
                                </div>

                                <div class="col-md-1" style="font-weight: bold">
                                    DISPUTE
                                </div>

                                <div class="col-md-1">
                                </div>
                            </div>
                            @foreach($clientReportsTU->clientAddresses as $address)
                                <div class="row mt20 border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-6">
                                        <span class="">{{$address->street}}, </span>
                                        <span class="">{{$address->city}}, </span>
                                        <span class="">{{$address->state}}, </span>
                                        <span class="">{{$address->zip}}</span>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$address->id}}" id="tu-address-{{$address->id}}"   class="customcheck tu_address">
                                        </div>
                                    </div>


                                </div>
                            @endforeach
                        </div>

                        <div class="mt20"></div>
                        <div class="chart-report">

                            <div class="row" >
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5" style="font-weight: bold">
                                    PHONE #
                                </div>

                                <div class="col-md-4">

                                </div>
                                <div class="col-md-2" style="font-weight: bold">
                                    DISPUTE
                                </div>

                            </div>

                        @foreach($clientReportsTU->clientPhones as $phone)
                                <div class="row mt20 border ">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5" style="font-weight: bold">
                                        <span class="">{{$phone->number}} </span>

                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" id="tu-phone-{{$phone->id}}" class="customcheck tu_phone">
                                        </div>
                                    </div>

                                </div>
                        @endforeach

                        </div>
                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold"> NEGATIVE ACCOUNTS</span>
                            @foreach($clientReportsTU->clientTuAccounts->where('adverse_flag', 'true') as $accounts)

                            <div class="mt20"></div>

                                <div class="row border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset('images/banks_logo/hfs_200x200.jpg')}}" width="50px">
                                   </div>
                                    <div class="col-md-7">
                                        <span class="">{{$accounts->account_name}}</span>
                                        <span style="padding-left: 15px"># {{$accounts->account_number}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$accounts->id}}" id="tu-account-{{$accounts->id}}" class="customcheck tu_account ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20  " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>


                                    @if($accounts->date_opened !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE OPENED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($accounts->date_opened))}} </span>
                                            </div>
                                        </div>
                                    @endif


                                    @if($accounts->account_type_description !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">ACCOUNT TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->account_type_description}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->loan_type !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">LOAN TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->loan_type}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->pay_status !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">PAY STATUS</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->pay_status}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->remark != null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">REMARK</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->remark}} </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            @if($accounts->accountPaymentHistories->whereIn('value',["30","60",'90'] )->first() )
                                    <div class="row mt20 ">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-11">
                                            ACCOUNT HISTORY
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        @foreach($accounts->accountPaymentHistories->whereIn('value',["30","60",'90'] ) as $payment)
                                            <div class="col-md-3">
                                                LATE {{$payment->value}} AS OF {{$payment->month}}/{{$payment->year}}

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                        @endforeach
                        </div>
                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold"> GOOD STANDING ACCOUNTS</span>
                            @foreach($clientReportsTU->clientTuAccounts->where('adverse_flag', 'false') as $accounts)

                            <div class="mt20"></div>

                                <div class="row border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset('images/banks_logo/hfs_200x200.jpg')}}" width="50px">
                                   </div>
                                    <div class="col-md-7">
                                        <span class="">{{$accounts->account_name}}</span>
                                        <span style="padding-left: 15px"># {{$accounts->account_number}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" class="customcheck ex_phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20  " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>


                                    @if($accounts->date_opened !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE OPENED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($accounts->date_opened))}} </span>
                                            </div>
                                        </div>
                                    @endif


                                    @if($accounts->account_type_description !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">ACCOUNT TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->account_type_description}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->loan_type !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">LOAN TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->loan_type}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->pay_status !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">PAY STATUS</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->pay_status}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->remark != null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">REMARK</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->remark}} </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            @if($accounts->accountPaymentHistories->whereIn('value',["30","60",'90'] )->first() )
                                    <div class="row mt20 ">
                                        <div class="col-md-12">
                                            ACCOUNT HISTORY
                                        </div>

                                        @foreach($accounts->accountPaymentHistories->whereIn('value',["30","60",'90'] ) as $payment)
                                            <div class="col-md-3">
                                                LATE {{$payment->value}} AS OF {{$payment->month}}/{{$payment->year}}

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                        @endforeach
                        </div>
                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold"> COLLECTION ACCOUNTS</span>
                            @foreach($clientReportsTU->clientTuAccounts->where('adverse_flag', null) as $accounts)

                            <div class="mt20"></div>

                                <div class="row border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset('images/banks_logo/hfs_200x200.jpg')}}" width="50px">
                                   </div>
                                    <div class="col-md-7">
                                        <span class="">{{$accounts->account_name}}</span>
                                        <span style="padding-left: 15px"># {{$accounts->account_number}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="tu_account[]" value="{{$phone->id}}" id="tu-account-{{$accounts->id}}" class="customcheck tu_account ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20  " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>


                                    @if($accounts->date_opened !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE OPENED</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y",strtotime($accounts->date_opened))}} </span>
                                            </div>
                                        </div>
                                    @endif


                                    @if($accounts->account_type_description !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">ACCOUNT TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->account_type_description}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->loan_type !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">LOAN TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->loan_type}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->pay_status !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">PAY STATUS</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->pay_status}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($accounts->remark != null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">REMARK</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$accounts->remark}} </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            @if($accounts->accountPaymentHistories->whereIn('value',["30","60",'90'] )->first() )
                                    <div class="row mt20 ">
                                        <div class="col-md-12">
                                            ACCOUNT HISTORY
                                        </div>

                                        @foreach($accounts->accountPaymentHistories->whereIn('value',["30","60",'90'] ) as $payment)
                                            <div class="col-md-3">
                                                LATE {{$payment->value}} AS OF {{$payment->month}}/{{$payment->year}}

                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                        @endforeach
                        </div>


                    @foreach($clientReportsTU->clientTuPublicRecords as $publicRecords)
                            <div class="mt20"></div>
                            <div class="chart-report">
                                <div class="row mt20" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label class="form-text">COURT NAME</label>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="">{{$publicRecords->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-12">
                                            <label class="form-text">REFERENCE  #</label>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="">{{$publicRecords->docket_number}}</span>
                                        </div>
                                    </div>

                                    @if($publicRecords->type !=null )

                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="">{{$publicRecords->type}}</span>
                                            </div>
                                        </div>

                                    @endif
                                    @if($publicRecords->phone !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">PHONE #</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$publicRecords->phone}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$publicRecords->id}}" id="tu-publicRecorde-{{$publicRecords->id}}"  class="customcheck tu_publicRecorde">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt20 border" style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label class="form-text">ADDRESS</label>
                                        </div>
                                        <div class="col-md-12">
                                            <span class=""> {{$publicRecords->address}}  </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-12">
                                            <label class="form-text">DATE FILED</label>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="">{{date("m/d/Y", strtotime($publicRecords->date_filed))}}</span>
                                        </div>
                                    </div>

                                    @if($publicRecords->court_type_description !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">COURT TYPE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$publicRecords->court_type_description}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_effective_label !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">{{strtoupper($publicRecords->date_effective_label)}}</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y", strtotime($publicRecords->date_effective))}} </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($publicRecords->date_paid != null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">DATE PAID</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y", strtotime($publicRecords->date_paid))}} </span>
                                            </div>
                                        </div>

                                    @endif

                                </div>

                                <div class="row mt20 border " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>

                                    @if($publicRecords->responsibility !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">RESPONSIBILITY</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$publicRecords->responsibility}} </span>
                                            </div>
                                        </div>

                                    @endif
                                    @if($publicRecords->estimated_deletion_date !=null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">ESTIMATED DELETION DATE</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{date("m/d/Y", strtotime($publicRecords->estimated_deletion_date))}} </span>
                                            </div>
                                        </div>

                                    @endif
                                    @if($publicRecords->plaintiff_attorney != null )
                                        <div class="col-md-2">
                                            <div class="col-md-12">
                                                <label class="form-text">PLAINTIFF ATTORNEY</label>
                                            </div>
                                            <div class="col-md-12">
                                                <span class=""> {{$publicRecords->plaintiff_attorney}} </span>
                                            </div>
                                        </div>

                                    @endif

                                </div>
                            </div>
                        @endforeach


                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold;">REGULAR INQUIRIES</span>
                            @foreach($clientReportsTU->clientTuInquiries->where('inquiry_type','regularInquiry')->whereNotIn('source_name',['EXPERIAN', 'EXPERIAN CREDITMATCH','EXPERIAN CREDIT WORKS','CREDIT KARMA' ]) as $inquiry)

                                <div class="row mt20 border " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-12">INQUIRY NAME</div>
                                        <div class="col-md-12">{{$inquiry->subscriber_name}}</div>

                                    </div>
                                    <div class="col-md-1"></div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">DATE OF REQUEST</div>
                                        @if(is_array(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates))))
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        @foreach(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates)) as $date)


                                                            {{$date.' '}}
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>

                                        @else
                                            <div class="col-md-12">
                                                <span class="">{{json_decode(str_replace(['[',']'],'',$inquiries->date_of_inquiry))}}</span>

                                            </div>

                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}" id="tu-inquiry-{{$inquiries->id}}" class="customcheck tu_inquiry">
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            <div class="mt20"></div>
                            <span style="font-weight: bold;">PROMOTIONAL INQUIRIES</span>
                            @foreach($clientReportsTU->clientTuInquiries->where('inquiry_type','promotionalInquiry')->whereNotIn('source_name',['EXPERIAN', 'EXPERIAN CREDITMATCH','EXPERIAN CREDIT WORKS','CREDIT KARMA' ]) as $inquiry)

                                <div class="row mt20 border " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-12">INQUIRY NAME</div>
                                        <div class="col-md-12">{{$inquiry->subscriber_name}}</div>

                                    </div>
                                    <div class="col-md-1"></div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">DATE OF REQUEST</div>
                                        @if(is_array(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates))))
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        @foreach(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates)) as $date)


                                                            {{$date.' '}}
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>

                                        @else
                                            <div class="col-md-12">
                                                <span class="">{{json_decode(str_replace(['[',']'],'',$inquiries->date_of_inquiry))}}</span>

                                            </div>

                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}"id="tu-inquiry-{{$inquiries->id}}" class="customcheck tu_inquiry">
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            <div class="mt20"></div>
                            <span style="font-weight: bold;">ACCOUNT REVIEW INQUIRIES</span>
                            @foreach($clientReportsTU->clientTuInquiries->where('inquiry_type','accountReviewInquiry')->whereNotIn('source_name',['EXPERIAN', 'EXPERIAN CREDITMATCH','EXPERIAN CREDIT WORKS','CREDIT KARMA' ]) as $inquiry)

                                <div class="row mt20 border " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-12">INQUIRY NAME</div>
                                        <div class="col-md-12">{{$inquiry->subscriber_name}}</div>

                                    </div>
                                    <div class="col-md-1"></div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">DATE OF REQUEST</div>
                                        @if(is_array(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates))))
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        @foreach(json_decode(str_replace('\"',"'",$inquiry->inquiry_dates)) as $date)


                                                            {{$date.' '}}
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>

                                        @else
                                            <div class="col-md-12">
                                                <span class="">{{json_decode(str_replace(['[',']'],'',$inquiries->date_of_inquiry))}}</span>

                                            </div>

                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}"id="tu-inquiry-{{$inquiries->id}}" class="customcheck tu_inquiry">
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="mt20"></div>
                        <div class="chart-report">
                            <span style="font-weight: bold;">STATEMENTS</span>
                            @foreach($clientReportsTU->clientTuStatements as $statements)

                                <div class="row mt20 border " style="font-weight: bold">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        {{$statements->statement}}  {{$statements->description}}

                                    </div>

                                    <div class="col-md-2">
                                        <div class="col-md-6">
                                            <label class="form-text">DISPUTE</label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="checkbox" name="ex_name[]" value="{{$statements->id}}" id="tu-statement-{{$statements->id}}" class="customcheck tu_statement">
                                        </div>
                                    </div>
                                </div>

                            @endforeach



                        </div>

                    </div>
                </div>
            </div>


            <div class="addModal" id ="addModal"></div>



            <div class="row mt20">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>
    </section>
        <script>
            $(document).ready(function(){
                $(".ex_name").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('name-', '')
                        var name = "ex_name-" + id

                        var html = "<div class='modal fade' id='ex_name-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_name_Lable" +id + "'>Update Your Profile</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason' name='ex_name["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>NEVER KNOWN BY THIS NAME</option>"
                        html  = html + "<option value='2'>BELONGS TO ANOTHER PERSON WITH SAME/SIMILAR NAME</option>"
                        html  = html + "<option value='3'>IDENTITY THEFT</option>"
                        html  = html + "<option value='4'>OTHER REASON</option></select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_name_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_name_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('ex_name[','').replace(']','')
                    if(value == 4){
                        console.log('#ex_name_comment'+id)
                        $("#ex_name_comment"+id).css("display", "block");
                    }else{
                        $("#ex_name_comment"+id).css("display", "none");
                    }
                });

                $(".ex_address").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('ex-address-', '')
                        var name = "ex_address-" + id

                        console.log(this.id+'asdasdasd')

                        var html = "<div class='modal fade' id='ex_address-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_address_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_address' name='ex_address["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>NEVER LIVED AT THIS ADDRESS</option>"
                        html  = html + "<option value='2'>BELONGS TO ANOTHER PERSON WITH SAME/SIMILAR NAME</option>"
                        html  = html + "<option value='3'>RESIDENCE TYPE IS INACCURATE</option>"
                        html  = html + "<option value='4'>IDENTITY THEFT</option>"
                        html  = html + "<option value='5'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_address_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_address_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_address', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('ex_address[','').replace(']','')
                    if(value == 5){
                        console.log('#ex_address_comment'+id)
                        $("#ex_address_comment"+id).css("display", "block");
                    }else{
                        $("#ex_address_comment"+id).css("display", "none");
                    }
                });

                $(".ex_phone").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('ex-phone-', '')
                        var name = "ex_phone-" + id
                        console.log(id+'asdasdasd')


                        var html = "<div class='modal fade' id='ex_phone-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_phone_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_phone' name='ex_address["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>INACCURATE PHONE NUBER</option>"
                        html  = html + "<option value='2'>NOT MINE</option>"
                        html  = html + "<option value='3'>IDENTITY THEFT</option>"
                        html  = html + "<option value='4'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_phone_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_phone_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_phone', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('ex_phone[','').replace(']','')
                    if(value == 4){
                        console.log('#ex_phone_comment'+id)
                        $("#ex_phone_comment"+id).css("display", "block");
                    }else{
                        $("#ex_phone_comment"+id).css("display", "none");
                    }
                });

                $(".ex_publicRecorde").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('ex-publicRecorde-', '')
                        var name = "ex_publicRecorde-" + id

                        var html = "<div class='modal fade' id='ex_publicRecorde-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_publicRecorde_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_ex_publicRecord' name='ex_publicRecorde["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>PAYMENT NEVER LATE</option>"
                        html  = html + "<option value='2'>NOT MINE OR NOT KNOWLEDGE OF ACCOUNT/option>"
                        html  = html + "<option value='3'>ACCOUNT PAID IN FULL</option>"
                        html  = html + "<option value='4'>ACCOUNT CLOSED</option>"
                        html  = html + "<option value='5'>UNAUTHORIZED CHARGES</option>"
                        html  = html + "<option value='6'>BELONGS TO EX-SPOUSE </option>"
                        html  = html + "<option value='7'>BALANCE INCORRECT</option>"
                        html  = html + "<option value='8'>INCLUDED IN BANKRUPTCY</option>"
                        html  = html + "<option value='9'>INCLUDED IN BANKRUPTCY</option>"
                        html  = html + "<option value='10'>BELONGS TO PRIMARY ACCOUNT HOLDER</option>"
                        html  = html + "<option value='11'>CORPORATE ACCOUNT</option>"
                        html  = html + "<option value='12'>BELONGS TO ANOTHER PERSON WITH SAME OR SIMILAR NAME</option>"
                        html  = html + "<option value='13'>IDENTITY THEFT</option>"
                        html  = html + "<option value='14'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_publicRecorde_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_publicRecorde_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_ex_publicRecord', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('ex_publicRecorde[','').replace(']','')
                    if(value == 14){
                        $("#ex_publicRecorde_comment"+id).css("display", "block");
                    }else{
                        $("#ex_publicRecorde_comment"+id).css("display", "none");
                    }
                });

                $(".ex_account").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('ex-account-', '')
                        var name = "ex_account-" + id

                        console.log(id)


                        var html = "<div class='modal fade' id='ex_account-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_account_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_ex_account' name='ex_account["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>PAYMENT NEVER LATE</option>"
                        html  = html + "<option value='2'>NOT MINE OR NOT KNOWLEDGE OF ACCOUNT/option>"
                        html  = html + "<option value='3'>ACCOUNT PAID IN FULL</option>"
                        html  = html + "<option value='4'>ACCOUNT CLOSED</option>"
                        html  = html + "<option value='5'>UNAUTHORIZED CHARGES</option>"
                        html  = html + "<option value='6'>BELONGS TO EX-SPOUSE </option>"
                        html  = html + "<option value='7'>BALANCE INCORRECT</option>"
                        html  = html + "<option value='8'>INCLUDED IN BANKRUPTCY</option>"
                        html  = html + "<option value='9'>INCLUDED IN BANKRUPTCY</option>"
                        html  = html + "<option value='10'>BELONGS TO PRIMARY ACCOUNT HOLDER</option>"
                        html  = html + "<option value='11'>CORPORATE ACCOUNT</option>"
                        html  = html + "<option value='12'>BELONGS TO ANOTHER PERSON WITH SAME OR SIMILAR NAME</option>"
                        html  = html + "<option value='13'>IDENTITY THEFT</option>"
                        html  = html + "<option value='14'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_account_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_account_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_ex_account', 'click', function(){
                    var  value = $(this).val()
                    console.log(value)
                    var id =$(this).attr("name").replace('ex_account[','').replace(']','')
                    if(value == 14){
                        console.log('#ex_account_comment'+id)
                        $("#ex_account_comment"+id).css("display", "block");
                    }else{
                        $("#ex_account_comment"+id).css("display", "none");
                    }
                });

                $(".ex_inquiry").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('ex-inquiry-', '')
                        var name = "ex_inquiry-" + id

                        console.log(id)


                        var html = "<div class='modal fade' id='ex_inquiry-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_inquiry_Lable" +id + "'>DISPUTE INQUIRY</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_ex_inquiry' name='ex_inquiry["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>UNAUTHORIZED</option>"
                        html  = html + "<option value='2'>FRADULENT</option>"
                        html  = html + "<option value='3'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_inquiry_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_inquiry_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_ex_inquiry', 'click', function(){
                    var  value = $(this).val()
                    console.log(value)
                    var id =$(this).attr("name").replace('ex_inquiry[','').replace(']','')
                    if(value == 3){
                        console.log('#ex_inquiry_comment'+id)
                        $("#ex_inquiry_comment"+id).css("display", "block");
                    }else{
                        $("#ex_inquiry_comment"+id).css("display", "none");
                    }
                });

                $(".ex_statement").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('ex-statement-', '')
                        var name = "ex_statement-" + id

                        console.log(id)


                        var html = "<div class='modal fade' id='ex_statement-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='ex_statement_Lable" +id + "'>DISPUTE INQUIRY</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_ex_statement' name='ex_statement["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>PLEASE ADD/UPDATE PHONE NUMBER</option>"
                        html  = html + "<option value='2'>PLEASE REMOVE THIS FRAUD ALERT</option>"
                        html  = html + "<option value='3'>PLEASE ADD A FRAUD ALERT</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_statement_phone1"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_statement_phone1["+id+"]'></textarea></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_statement_phone2"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_statement_phone2["+id+"]'></textarea></div>"
                        html =  html +   "</div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_ex_statement', 'click', function(){
                    var  value = $(this).val()
                    console.log(value)
                    var id =$(this).attr("name").replace('ex_statement[','').replace(']','')
                    if(value == 1){
                        console.log('#ex_statement_phone1'+id)
                        $("#ex_statement_phone1"+id).css("display", "block");
                        $("#ex_statement_phone2"+id).css("display", "none");

                    }else if (value == 3){
                        $("#ex_statement_phone1"+id).css("display", "none");

                        $("#ex_statement_phone2"+id).css("display", "block");
                    }else{
                        $("#ex_statement_phone1"+id).css("display", "none");

                        $("#ex_statement_phone2"+id).css("display", "none");
                    }
                });







                $(".tu_name").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-name-', '')
                        var name = "tu_name-" + id

                        console.log(name)



                        var html = "<div class='modal fade' id='tu_name-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_name_Lable" +id + "'>DISPUTE YOUR NAME</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_name' name='tu_name["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>NEVER KNOWN BY THIS NAME</option>"
                        html  = html + "<option value='2'>BELONGS TO ANOTHER PERSON WITH SAME/SIMILAR NAME</option>"
                        html  = html + "<option value='3'>IDENTITY THEFT</option>"
                        html  = html + "<option value='4'>OTHER REASON</option></select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='ex_name_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='ex_name_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_name', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('tu_name[','').replace(']','')
                    if(value == 4){
                        console.log('#tu_name_comment'+id)
                        $("#tu_name_comment"+id).css("display", "block");
                    }else{
                        $("#tu_name_comment"+id).css("display", "none");
                    }
                });

                $(".tu_address").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-address-', '')
                        var name = "tu_address-" + id


                        var html = "<div class='modal fade' id='tu_address-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_address_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_address' name='tu_address["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>NEVER LIVED AT THIS ADDRESS</option>"
                        html  = html + "<option value='2'>BELONGS TO ANOTHER PERSON WITH SAME/SIMILAR NAME</option>"
                        html  = html + "<option value='3'>RESIDENCE TYPE IS INACCURATE</option>"
                        html  = html + "<option value='4'>IDENTITY THEFT</option>"
                        html  = html + "<option value='5'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_address_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_address_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_address', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('tu_address[','').replace(']','')
                    if(value == 5){
                        console.log('#tu_address_comment'+id)
                        $("#tu_address_comment"+id).css("display", "block");
                    }else{
                        $("#tu_address_comment"+id).css("display", "none");
                    }
                });

                $(".tu_phone").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-phone-', '')
                        var name = "tu_phone-" + id

                        var html = "<div class='modal fade' id='tu_phone-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_phone_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_phone' name='tu_address["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>INACCURATE PHONE NUBER</option>"
                        html  = html + "<option value='2'>NOT MINE</option>"
                        html  = html + "<option value='3'>IDENTITY THEFT</option>"
                        html  = html + "<option value='4'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_phone_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_phone_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_phone', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('tu_phone[','').replace(']','')
                    if(value == 4){
                        console.log('#tu_phone_comment'+id)
                        $("#tu_phone_comment"+id).css("display", "block");
                    }else{
                        $("#tu_phone_comment"+id).css("display", "none");
                    }
                });

                $(".tu_publicRecorde").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-publicRecorde-', '')
                        var name = "tu_publicRecorde-" + id

                        var html = "<div class='modal fade' id='tu_publicRecorde-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_publicRecorde_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_publicRecord' name='tu_publicRecorde["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>PAYMENT NEVER LATE</option>"
                        html  = html + "<option value='2'>NOT MINE OR NOT KNOWLEDGE OF ACCOUNT/option>"
                        html  = html + "<option value='3'>ACCOUNT PAID IN FULL</option>"
                        html  = html + "<option value='4'>ACCOUNT CLOSED</option>"
                        html  = html + "<option value='5'>UNAUTHORIZED CHARGES</option>"
                        html  = html + "<option value='6'>BELONGS TO EX-SPOUSE </option>"
                        html  = html + "<option value='7'>BALANCE INCORRECT</option>"
                        html  = html + "<option value='8'>INCLUDED IN BANKRUPTCY</option>"
                        html  = html + "<option value='9'>INCLUDED IN BANKRUPTCY</option>"
                        html  = html + "<option value='10'>BELONGS TO PRIMARY ACCOUNT HOLDER</option>"
                        html  = html + "<option value='11'>CORPORATE ACCOUNT</option>"
                        html  = html + "<option value='12'>BELONGS TO ANOTHER PERSON WITH SAME OR SIMILAR NAME</option>"
                        html  = html + "<option value='13'>IDENTITY THEFT</option>"
                        html  = html + "<option value='14'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_publicRecorde_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_publicRecorde_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_publicRecord', 'click', function(){
                    var  value = $(this).val()
                    var id =$(this).attr("name").replace('tu_publicRecorde[','').replace(']','')
                    if(value == 14){
                        $("#tu_publicRecorde_comment"+id).css("display", "block");
                    }else{
                        $("#tu_publicRecorde_comment"+id).css("display", "none");
                    }
                });

                $(".tu_account").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-account-', '')
                        var name = "tu_account-" + id

                        var html = "<div class='modal fade' id='tu_account-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_account_Lable" +id + "'>DISPUTE ADDRESS</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_account' name='tu_account["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>THE BALANCE AND/OR PAST DUE AMOUNT ARE/IS INCORRECT </option>"
                        html  = html + "<option value='2'>THE AMOUNTS OTHER THAN BALANCE AND/OR PAST DUE ARE NOT CORRECT</option>"
                        html  = html + "<option value='3'>THE PAYMENT HISTORY/RATING IS INCORRECT</option>"
                        html  = html + "<option value='4'>THE DATES ON THIS ACCOUNT ARE INCORRECT</option>"
                        html  = html + "<option value='5'>THIS ACCOUNT IS TOO OLD TO BE ON MY CREDIT REPORT</option>"
                        html  = html + "<option value='6'>THIS ACCOUNT IS SETTLED </option>"
                        html  = html + "<option value='7'>THIS ACCOUNT IS NOT A COLLECTION OR CHARGE-OFF</option>"
                        html  = html + "<option value='8'>I CLOSED THIS ACCOUNT</option>"
                        html  = html + "<option value='9'>THIS ACCOUNT IS CLOSED</option>"
                        html  = html + "<option value='10'>THERE WERE FRAUDULENT CHARGES ON MADE THIS ACCOUNT</option>"
                        html  = html + "<option value='11'>THIS ACCOUNT IS INCLUDING ON BANKRUPTCY </option>"
                        html  = html + "<option value='12'>THIS ACCOUNT IS NOT IN BANKRUPTCY </option>"
                        html  = html + "<option value='13'>THIS ACCOUNT IS NOT IN BANKRUPTCY OF ANOTHER PERSON</option>"
                        html  = html + "<option value='14'>THE INFORMATION IN THE REMARKS FIELD IS MISSING OR INCORRECT</option>"
                        html  = html + "<option value='15'>I AM ON ACTIVE MILITARY DUTY</option>"
                        html  = html + "<option value='16'>THIS ACCOUNT IS NOT CLOSED</option>"
                        html  = html + "<option value='17'>THE ACCOUNT IN DISPUTE REMARK IS MISSING OR INCORRECT</option>"
                        html  = html + "<option value='18'>THE PAYMENT TERMS OR ACCOUNT TYPE ARE INCORRECT</option>"
                        html  = html + "<option value='19'>THE CREDITOR AGREED TO DELETE THIS ACCOUNT</option>"
                        html  = html + "<option value='20'>THE CONTRACT RELATED TO THIS ACCOUNT HAS BEEN CANCELLED</option>"
                        html  = html + "<option value='21'>THE CREDIT LIMIT AND/OR HIGH BALANCE IS INCORRECT</option>"
                        html  = html + "<option value='22'>THE CREDITOR AGREED TO CHANGE ACCOUNT INFORMATION</option>"
                        html  = html + "<option value='23'>THE PAYMENT HISTORY/ RATING IS INCORRECT</option>"
                        html  = html + "<option value='24'>THIS ACCOUNT WAS PAID BY INSURANCE</option>"
                        html  = html + "<option value='25'>THIS ACCOUNT INVOLVED IN LITIGATION</option>"
                        html  = html + "<option value='26'>THIS ACCOUNT IS DEFERRED OR IN FORBEARENCE </option>"
                        html  = html + "<option value='27'>I AM A VICTIM OF A NATURAL OR DECLARED DISASTER </option>"
                        html  = html + "<option value='28'>I AM NOT DECEASED </option>"
                        html  = html + "<option value='29'>OTHER REASON</option>"

                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_account_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_account_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_account', 'click', function(){
                    var  value = $(this).val()
                    console.log(value)
                    var id =$(this).attr("name").replace('tu_account[','').replace(']','')
                    if(value == 29){
                        console.log('#tu_account_comment'+id)
                        $("#tu_account_comment"+id).css("display", "block");
                    }else{
                        $("#tu_account_comment"+id).css("display", "none");
                    }
                });

                $(".ex_inquiry").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-inquiry-', '')
                        var name = "tu_inquiry-" + id

                        var html = "<div class='modal fade' id='tu_inquiry-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_inquiry_Lable" +id + "'>DISPUTE INQUIRY</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_inquiry' name='tu_inquiry["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>UNAUTHORIZED</option>"
                        html  = html + "<option value='2'>FRADULENT</option>"
                        html  = html + "<option value='3'>OTHER REASON</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_inquiry_comment"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_inquiry_comment["+id+"]'></textarea></div></div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_inquiry', 'click', function(){
                    var  value = $(this).val()
                    console.log(value)
                    var id =$(this).attr("name").replace('tu_inquiry[','').replace(']','')
                    if(value == 3){
                        console.log('#tu_inquiry_comment'+id)
                        $("#tu_inquiry_comment"+id).css("display", "block");
                    }else{
                        $("#tu_inquiry_comment"+id).css("display", "none");
                    }
                });

                $(".tu_statement").click(function () {
                    if(this.checked) {
                        var id  = this.id.replace('tu-statement-', '')
                        var name = "tu_statement-" + id

                        var html = "<div class='modal fade' id='tu_statement-"
                        html  = html + id + "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                        html  = html + "<div class='modal-dialog' role='document'> <div class='modal-content'> <div class='modal-header'> "
                        html  = html + "<h5 class='modal-title' id='tu_statement_Lable" +id + "'>DISPUTE INQUIRY</h5>"
                        html  = html + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                        html  = html + "<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>"
                        html  = html + "<div class='form row'><div class='form-group col-md-12'>"
                        html  = html + "<select class='form-control reason_tu_statement' name='tu_statement["+id+"]'>"
                        html  = html + "<option disabled='disabled' selected='selected'>SELECT A DISPUTE REASON </option>"
                        html  = html + "<option value='1'>PLEASE ADD/UPDATE PHONE NUMBER</option>"
                        html  = html + "<option value='2'>PLEASE REMOVE THIS FRAUD ALERT</option>"
                        html  = html + "<option value='3'>PLEASE ADD A FRAUD ALERT</option>"
                        html  = html + "</select></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_statement_phone1"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_statement_phone1["+id+"]'></textarea></div>"
                        html  = html + "<div class='form-group col-md-12' id ='tu_statement_phone2"+id +"' style='display:none'>"
                        html  = html + "<textarea class='form-control' name='tu_statement_phone2["+id+"]'></textarea></div>"
                        html =  html +   "</div></div>"
                        html  = html + "<div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>"
                        html  = html + "</div></div></div></div>"

                        $("#addModal").append(html);

                        $("#"+name).modal();
                    }
                })

                $(document).delegate('.reason_tu_statement', 'click', function(){
                    var  value = $(this).val()
                    console.log(value)
                    var id =$(this).attr("name").replace('tu_statement[','').replace(']','')
                    if(value == 1){
                        console.log('#tu_statement_phone1'+id)
                        $("#tu_statement_phone1"+id).css("display", "block");
                        $("#tu_statement_phone2"+id).css("display", "none");

                    }else if (value == 3){
                        $("#tu_statement_phone1"+id).css("display", "none");

                        $("#tu_statement_phone2"+id).css("display", "block");
                    }else{
                        $("#tu_statement_phone1"+id).css("display", "none");

                        $("#tu_statement_phone2"+id).css("display", "none");
                    }
                });




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

