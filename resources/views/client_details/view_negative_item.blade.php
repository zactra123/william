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


            <div class="Experian" style="display: block">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}"    class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" class="customcheck">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}"   class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" class="customcheck ">
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

                                <div class="row " style="font-weight: bold">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" class="customcheck ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 border" style="font-weight: bold" >
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" class="customcheck ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 border" style="font-weight: bold" >
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}"    class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}"    class="customcheck ">
                                        </div>
                                    </div>


                                </div>

                            @endforeach
                        </div>

                        <div class="chart-report">
                            <span style="font-weight: bold">STATEMENTS</span>

                            @foreach($clientReportsEX->clientExStatements as $statements)
<!--                                --><?php //dd($statements)?>

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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}"    class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$names->id}}" class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$address->id}}"   class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" class="customcheck ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 border " style="font-weight: bold">
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
                                    <div class="row mt20 border">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" class="customcheck ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 border " style="font-weight: bold">
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
                                    <div class="row mt20 border">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" class="customcheck ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt20 border " style="font-weight: bold">
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
                                    <div class="row mt20 border">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$phone->id}}" class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}" class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}" class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}" class="customcheck ">
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
                                            <input type="checkbox" name="ex_name[]" value="{{$inquiries->id}}" class="customcheck ">
                                        </div>
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
        </div>
    </section>
        <script>
            $(document).ready(function(){
                $(".customcheck").click(function () {
                    if(this.checked) {
                        $("#exampleModal").modal();
                    }
                })


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
