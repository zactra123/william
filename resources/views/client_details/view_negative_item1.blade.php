@extends('layouts.layout')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> View Negative Item </h2>
            <span class="sub-title"><a href="#">Home</a> &gt; Negative Item</span>
        </div>
    </section>

    <section class="charts">
        <div class="container-fluid">

            {!! Form::open(['route' => ['negative.store'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}

            <div class="row mt50">
                @foreach($clientReports->clientTuAccounts->where('adverse_flag', 'true') as $accounts)

                <div class="col-md-6 mt20">
                    <div class="chart-container">
                        <div class="boxheading">
                            <div class="row ">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-10 ">
                                    <span class="pull-left">{{$accounts->account_name}}</span>
                                    <span class="pull-right">Repair Your negative item {!! Form::checkbox('tu_account[]', $accounts->id) !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">ACCOUNT #</span>
                                <span class="pull-right">{{$accounts->account_number}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">ACCOUNT TYPE</span>
                                <span class="pull-right">{{$accounts->loan_type}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">ACCOUNT STATUS</span>
                                <span class="pull-right">SOME STATUS</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">ADDRESS</span>
                                <span class="pull-right">{{$accounts->address}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">CURRENT BALANCE</span>
                                <span class="pull-right">{{$accounts->current_balance}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">CREDIT LIMIT</span>
                                <span class="pull-right">{{$accounts->credit_limit}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">TERM</span>
                                <span class="pull-right">{{$accounts->terms}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">RESPONSIBILITY</span>
                                <span class="pull-right">{{$accounts->responsibility}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">OPEN DATE</span>
                                <span class="pull-right">{{date("m/d/Y",strtotime($accounts->date_opened)) ?? ''}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">{{$accounts->date_effective_label}}</span>
                                <span class="pull-right">{{date("m/d/Y",strtotime($accounts->date_effective) ??'')}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">CLOSE DATE</span>
                                <span class="pull-right">{{date("m/d/Y",strtotime($accounts->date_closed)) ?? ''}}</span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 ">
                                <span class="pull-left">PAY STATUS</span>
                                <span class="pull-right">{{$accounts->pay_status}}</span>
                            </div>
                        </div>
                    </div>

                </div>

                @endforeach

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


@endsection


{{--    <section class="ms-user-account">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-3 col-sm-12"></div>--}}

{{--                <div class="col-md-6 col-sm-12">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-md-10 pt-2">--}}

{{--                            {!! Form::open(['route' => ['negative.store'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}--}}


{{--                            @foreach($negativeTrade as $trade)--}}
{{--                            <div class="card mt-4">--}}
{{--                                <div class="card-header">--}}
{{--                                                                            {{$trade->subscriber_name}} {{strtoupper($trade->account_description)}}--}}


{{--                                                                            {!! Form::checkbox('trade[]', $trade->id) !!}--}}

{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}

{{--                                        <div class="col-6">--}}
{{--                                                                                            @if( $trade->account_type != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT TYPE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                        <span class="pull-right font-weight-bold">--}}
{{--                                            {{strtoupper($trade->account_type)}}--}}
{{--                                        </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}

{{--                                                                                            @if( $trade->account_number != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT #</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                               {{$trade->account_number}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->account_rating != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT RATING</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                 {{strtoupper($trade->account_rating)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->remark != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT STATUS</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{strtoupper($trade->remark)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->current_balance != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CURRENT BALANCE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                               $ {{(int)$trade->current_balance}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->high_credit != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>HIGH CREDIT</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                <span class="pull-right font-weight-bold">--}}
{{--                                                   $ {{(int)$trade->high_credit}}--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->credit_limit != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CREDIT LIMIT</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                $ {{(int)$trade->credit_limit}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->past_due != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>PAST DUE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                $ {{(int)$trade->past_due}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                        <!--                                                --><?php //$term = json_decode($trade->terms,true); ?>--}}
{{--                                                                                            @if(!empty($term))--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>TERM</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                        <span class="pull-right font-weight-bold">--}}
{{--                                            PAYMENT FREQUENCY   {{strtoupper($term['paymentFrequency'])??"-"}},--}}
{{--                                                                                        SCHEDULE MONTH COUNT  {{$term['paymentScheduleMonthCount']??"-"}},--}}
{{--                                                                                        MONTHLY PAYMENT   $ {{(int)$term['scheduledMonthlyPayment']}}--}}
{{--                                        </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}

{{--                                        </div>--}}

{{--                                        <div class="col-6">--}}

{{--                                                                                            @if( $trade->ecoa_designator != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>RESPONSIBILITY</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{strtoupper($trade->ecoa_designator)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->date_opened != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>OPEN DATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                             {{strtoupper($trade->date_opened)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->date_effective != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>EFFECTIVE DATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{strtoupper($trade->date_effective)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->date_closed != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CLOSE DATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{strtoupper($trade->date_closed)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}

{{--                                                                                            @if($trade->most_recent_payment_date != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>MOST RECENT PAYMENT</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{strtoupper($trade->most_recent_payment_date)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->closed_indicator != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CLOSE INDICATOR</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{strtoupper($trade->closed_indicator)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->additional_trade_account != null)--}}
{{--                                        <!--                                                    --><?php--}}
{{--                                            //                                                    $g = json_decode($trade->additional_trade_account,true);--}}
{{--                                            //                                                    $garant = $g['original']["creditGrantor"]["person"]["unparsed"];--}}
{{--                                            //                                                    ?>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>GARANT NAME</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                            {{strtoupper($garant)}}--}}
{{--                                            </span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if(!empty(json_decode($trade->payment_history,true)))--}}
{{--                                        <!--                                                    --><?php--}}
{{--                                            //                                                    $t = json_decode($trade->payment_history,true);--}}
{{--                                            //                                                    $ph = $t['historicalCounters'];--}}
{{--                                            //                                                    ?>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-12 pull-left">--}}
{{--                                                    <span>PAYMENT HISTORY</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>MONTHS REVIEWED COUNT</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                        <span class="pull-right font-weight-bold">--}}
{{--                                            {{$ph['monthsReviewedCount']??"-"}}--}}
{{--                                        </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>TIMES  30/60/90 DAYS LATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                        <span class="pull-right font-weight-bold">--}}
{{--                                             {{(int)$ph['late30DaysTotal']??"-"}} /{{(int)['late60DaysTotal']??"-"}}--}}
{{--                                                                                        /{{(int)$ph['late90DaysTotal']??"-"}}--}}
{{--                                        </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}

{{--                                                                                            @endif--}}


{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                                                        @endforeach--}}








{{--                                                        @foreach($negativeCollection as $collection)--}}

{{--                            <div class="card mt-4">--}}
{{--                                <div class="card-header">--}}
{{--                                                                            {{$collection->subscriber_name}} {{strtoupper($collection->account_description)}}--}}

{{--                                                                            {!! Form::checkbox('collection[]', $trade->id) !!}--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}

{{--                                        <div class="col-6">--}}
{{--                                                                                            @if( $collection->account_type != null)--}}

{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT TYPE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                <span class="pull-right font-weight-bold">--}}
{{--                                                    {{strtoupper($collection->account_type)}}--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}

{{--                                                                                            @if( $collection->account_number != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT #</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{$collection->account_number}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($collection->account_rating != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT RATING</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($collection->account_rating)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($collection->remark != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>ACCOUNT STATUS</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($trade->remark)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($collection->current_balance != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CURRENT BALANCE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                        <span class="pull-right font-weight-bold">--}}
{{--                                                            $ {{(int)$collection->current_balance}}--}}
{{--                                                        </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}

{{--                                                                                            @if($collection->past_due != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>PAST DUE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        $ {{(int)$collection->past_due}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                        <!--                                                --><?php //$original = json_decode($collection->original,true);?>--}}
{{--                                        <!---->--}}
{{--                                                                                            @if(!empty($original))--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-4 pull-left">--}}
{{--                                                    <span>CREDIT GRANTOR</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-8 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($original['creditGrantor']['unparsed'])}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>BALANCE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                      $ {{(int)$original['balance']}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}

{{--                                                                                            @endif--}}

{{--                                        </div>--}}

{{--                                        <div class="col-6">--}}
{{--                                                                                            @if( $collection->ecoa_designator != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>RESPONSIBILITY</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($collection->ecoa_designator)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}


{{--                                                                                            @if($collection->date_opened != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>OPEN DATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($collection->date_opened)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($collection->date_effective != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>EFFECTIVE DATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                       {{strtoupper($collection->date_effective)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}

{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($collection->date_paid_out != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>DATE PAID OUT</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                       {{strtoupper($collection->date_paid_out)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($collection->date_closed != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CLOSE DATE</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                    {{strtoupper($collection->date_closed)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}

{{--                                                                                            @if($trade->most_recent_payment_date != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>MOST RECENT PAYMENT</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($trade->most_recent_payment_date)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}
{{--                                                                                            @if($trade->closed_indicator != null)--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>CLOSE INDICATOR</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($trade->closed_indicator)}}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                                                                            @endif--}}



{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                                                        @endforeach--}}

{{--                                                        @foreach($negativePublicRecord as $publicRecord)--}}

{{--                            <div class="card mt-4">--}}
{{--                                <div class="card-header">--}}
{{--                                                                            {{strtoupper($publicRecord->account_description)}}--}}

{{--                                                                            {!! Form::checkbox('publicRecord[]', $trade->id) !!}--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="row">--}}

{{--                                        <div class="col-6">--}}
{{--                                            @if( $publicRecord->docket_number != null)--}}
{{--                                                                                                    <div class="row">--}}
{{--                                                <div class="col-6 pull-left">--}}
{{--                                                    <span>DOCKET NUMBER</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 pull-right">--}}
{{--                                                <span class="pull-right font-weight-bold">--}}
{{--                                                    {{strtoupper($publicRecord->docket_number)}}--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="divider"></div>--}}
{{--                                                                                        @endif--}}

{{--                                                                                        @if( $publicRecord->attorney != null)--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6 pull-left">--}}
{{--                                                <span>ATTORNEY</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6 pull-right">--}}
{{--                                            <span class="pull-right font-weight-bold">--}}
{{--                                                {{$publicRecord->attorney}}--}}
{{--                                            </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="divider"></div>--}}
{{--                                                                                        @endif--}}
{{--                                                                                        @if( $publicRecord->ecoa_designator != null)--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6 pull-left">--}}
{{--                                                <span>RESPONSIBILITY</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6 pull-right">--}}
{{--                                                <span class="pull-right font-weight-bold">--}}
{{--                                                    {{strtoupper($publicRecord->ecoa_designator)}}--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="divider"></div>--}}
{{--                                                                                        @endif--}}

{{--                                    </div>--}}

{{--                                    <div class="col-6">--}}
{{--                                                                                        @if( $publicRecord->date_reported != null)--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6 pull-left">--}}
{{--                                                <span>DATE REPORTED</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6 pull-right">--}}
{{--                                                <span class="pull-right font-weight-bold">--}}
{{--                                                    {{strtoupper($publicRecord->date_reported)}}--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="divider"></div>--}}
{{--                                                                                        @endif--}}

{{--                                                                                        @if( $publicRecord->date_filed != null)--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6 pull-left">--}}
{{--                                                <span>DATE </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($publicRecord->date_filed)}}--}}
{{--                                                    </span>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <div class="divider"></div>--}}
{{--                                                                                        @endif--}}
{{--                                                                                        @if( $publicRecord->date_paid != null)--}}

{{--                                        <div class="row">--}}
{{--                                            <div class="col-6 pull-left">--}}
{{--                                                <span>DATE PAID</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6 pull-right">--}}
{{--                                                    <span class="pull-right font-weight-bold">--}}
{{--                                                        {{strtoupper($publicRecord->date_paid)}}--}}
{{--                                                    </span>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                        <div class="divider"></div>--}}
{{--                                                                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            @endforeach--}}

{{--                            <div class="form-group row mb-0 font">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        Submit--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            {!! Form::close() !!}--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
