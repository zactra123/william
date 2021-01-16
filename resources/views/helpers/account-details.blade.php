
<section class="charts working-section">
    <div class="container-fluid">
        <div class="chart-container">
            <div class="content">
                <h2>ACCOUNT DETAILS</h2>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> ACCOUNT NAME </div>
                            <div class=" col-md-6"> {{$exAccount->source_name}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> ACCOUNT # </div>
                            <div class=" col-md-6"> {{$exAccount->source_id}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> ACCOUNT TYPE </div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->type)}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> RESPONSIBILITY</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->responsibility)}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> DATE OPENED</div>
                            <div class=" col-md-6"> {{strtoupper(date("m/d/Y",strtotime($exAccount->opened_date)))}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> STATUS DATE</div>
                            <div class=" col-md-6">{{strtoupper(date("m/d/Y",strtotime($exAccount->status_date)))}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> STATUS </div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->status)}} </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> BALANCE </div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->high_balance)}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> {{strtoupper($exAccount->credit_limit_label)}} </div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->credit_limit)}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> TERMS</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->term)}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> RECENT BALANCE DATE</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->recent_balance_date)?? "N/A"}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> RECENT PAYMENT</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->recent_balance_pay_amount) ?? "N/A"}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> MONTHLY PAYMENT</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->monthly_payment)?? "N/A"}} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> ON RECORD UNTIL</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->on_record_until)}} </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5" >
                        @if($exAccount->account_type() =="CA")
                        <div class="col-md-12" style="font-weight: bold">
                            {{$exAccount->source_name}}
                        </div>
                        @endif

                        <div class="col-md-6" style="font-weight: bold">ADDRESS</div>
                        <div class="col-md-6">
                            {{$exAccount->source_address_street}} ,{{$exAccount->source_address_city}},
                            {{$exAccount->source_address_state}},  {{$exAccount->source_address_zip}}
                        </div>
                        <div class="col-md-6" style="font-weight: bold">PHONE #</div>
                        <div class="col-md-6 phone">
                            {{$exAccount->source_address_phone}}
                        </div>
                    </div>
                    @if($exAccount->original_creditor != "")
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold">ORIGINAL CREDITOR</div>
                            <div class="col-md-6">
                                {{$exAccount->original_creditor}}
                            </div>

                            @if($exAccount->sold_to != "")
                                <div class="col-md-6" style="font-weight: bold">SOLD TO</div>
                                <div class="col-md-6">
                                    {{$exAccount->sold_to}}
                                </div>
                            @endif
                        </div>
                    @endif

                @if(!empty($exAccount->paymentHistories))

                    <h3 class="mt-5">PAYMENT HISTORY</h3>
                    <div class="row mt-5" >
                        @foreach($exAccount->paymentHistories()->orderBy("id", "DESC")->get() as $payment)
                            <div class="col-md-2" >
                                <div class="col-md-12" style="font-weight: bold">{{$payment->month}}/{{$payment->year}}</div>
                                <div class="col-md-12">{{$payment->status}}</div>
                            </div>

                        @endforeach
                    </div>
                @endif

                @if(!empty($exAccount->balanceHistories))
                    <h3 class="mt-5" >BALANCE HISTORY</h3>
                    <div class="row" style="font-weight: bold">
                        <div class="col-md-3">DATE</div>
                        <div class="col-md-3">BALANCE</div>
                        <div class="col-md-3">SCHEDULED PAYMENTS</div>
                        <div class="col-md-3">PAID</div>
                    </div>
                    @foreach($exAccount->balanceHistories as $balance)
                        <div class="row">
                            <div class="col-md-3">{{$balance->date}}</div>
                            <div class="col-md-3">$ {{$balance->amount}}</div>
                            <div class="col-md-3">$ {{$balance->amount_sch}}</div>
                            <div class="col-md-3">$ {{$balance->amount_act}}</div>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </div>
</section>

