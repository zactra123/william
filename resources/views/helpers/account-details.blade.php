
<section class="charts working-section">
    <div class="container-fluid">
        <div class="chart-container">
            <div class="content">
                <h2>ACCOUNT DETAILS</h2>
                @if($exAccount->account_type()=="AUTO")

                <div class="row" >
                    <div class="col-md-12">
                        <a href="#" data-toggle="modal" data-target="#question" class="btn btn-primary text-white"><i class="fa fa-pencil-square-o  fa-fw"></i> ACCOUNT QUESTIONS</a>

                    </div>
                </div>
                @endif

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
                            <div class=" col-md-6">  {{!empty($exAccount->recent_balance_amount)? "$ ". $exAccount->recent_balance_amount: "N/A"}} </div>
                        </div>

                       <div class="row">
                           <div class="col-md-6" style="font-weight: bold"> RECENT BALANCE DATE</div>
                           <div class=" col-md-6"> {{!empty($exAccount->recent_balance_date)? strtoupper($exAccount->recent_balance_date) : "N/A"}} </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6" style="font-weight: bold"> RECENT PAYMENT</div>
                           <div class=" col-md-6">
                               {{!empty($exAccount->recent_balance_pay_amount)? "$ ". $exAccount->recent_balance_pay_amount: "N/A"}}
                           </div>
                       </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> {{strtoupper($exAccount->credit_limit_label)}} </div>
                            <div class=" col-md-6"> $ {{$exAccount->credit_limit}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> TERMS</div>
                            <div class=" col-md-6"> {{strtoupper($exAccount->term)}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="font-weight: bold"> MONTHLY PAYMENT</div>
                            <div class=" col-md-6"> {{!empty($exAccount->monthly_payment)? "$ {$exAccount->monthly_payment}": "N/A"}} </div>
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
                    @if(!empty($dispute["additional_information"]["attention"]))
                        <h3 class="mt-5 text-danger">Attentions</h3>
                        @foreach($dispute["additional_information"]["attention"] as $attention)
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                                    <span>{{$attention["text"]}}</span>
                                </div>

                            </div>
                        @endforeach


                    @endif
                    <div class="row mt-5" >
                        @foreach($exAccount->paymentHistories()->orderBy("id", "DESC")->get() as $payment)
                            <div class="col-md-2" >
                                <div class="col-md-12" style="font-weight: bold">{{$payment->month}}/{{$payment->year}}</div>
                                <div class="col-md-12">{{$payment->status}}</div>
                            </div>

                        @endforeach
                    </div>
                @endif
                @if(!empty($exAccount->payStates->toArray()))
                    <div class="row mt-5" style="font-weight: bold">
                        @foreach($exAccount->payStates as $pay)
                            <div class="col-md-12">{{$pay->name}}</div>
                        @endforeach
                    </div>
                @endif

                @if(!empty($exAccount->balanceHistories->toArray()))
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
                            <div class="col-md-3">{{$balance->amount}}</div>
                            <div class="col-md-3">{{$balance->amount_sch}}</div>
                            <div class="col-md-3">{{$balance->amount_act}}</div>
                        </div>

                    @endforeach
                @endif

                @if(!empty($exAccount->limitHighBalance->toArray()))
                    <div class="row mt-5" style="font-weight: bold">
                        @foreach($exAccount->limitHighBalance as $balance)
                            <div class="col-md-12">{{$balance->name}}</div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ACCOUNT QUSETION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['adminRec.client.todo'], 'method' => 'POST', 'id' => 'update_info',  'class' => 'm-form m-form--label-align-right']) !!}

                @csrf
                <div class="form row">
                    <div class="form-group col-md-12">
                        <input  type="text" class="date form-control" placeholder="PAYMENT DUE DATE">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="date form-control" placeholder="PAYMENT DUE DATE CHANGED">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" class="date form-control" placeholder="PAYMENT DATE">
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::text('client[full_name]', null, ['class' => 'form-control m-input', 'placeholder' => 'BALANCE ON REPO']) }}
                    </div>
                    <div class="form-group col-md-12">

                        {{ Form::select('client[sex]', [''=>'EVENT OFF DEFAULT','0'=>'NO PAYMENT', '1'=>'NO INSURANCE', '2'=>'BROKE'],  null, ['class'=>'col-md-10  form-control', 'id'=>'event_default']) }}
                    </div>
                    <div class="form-group col-md-12">

                        {{ Form::text('test', null, ['class' => 'form-control m-input hidden', 'id'=>'count_past_due', 'placeholder' => 'COUNT PAST DUE PAYMENT']) }}
                    </div>
                    <div class="form-group col-md-12">
                        <input  type="text" class="date form-control" placeholder="REPO DATE">
                    </div>
                    <div class="form-group col-md-12">
                        <input  type="text" class="date form-control" placeholder="NOTICE DATE">
                    </div>
                    <div class="form-group col-md-12">
                        <input  type="text" class="date form-control" placeholder="CLIENT DELIVERY DATE">
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::select('client[sex]', [''=>'AVTON TANELUC HETO INCH EN AREL','0'=>'???????', '1'=>'???????', '2'=>'???????'],  null, ['class'=>'col-md-10  form-control']) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::text('client[address]', null, ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'INCH GNOVA CAXVEL']) }}
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::text('client[address]', null, ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'DISPUTED']) }}
                    </div>


                    <div class="form-group col-md-12">
                        {{ Form::text('client[address]', null, ['class' => 'form-control m-input', 'id'=>'service_count', 'placeholder' => 'qani angama service travel']) }}
                    </div>
                    <div id="services_date">

                    </div>



                </div>

                <button type="submit" value="Update" class="btn btn-primary">SUBMIT</button>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    #ui-datepicker-div {
        background: #fefefe;
    }
</style>


<script type="text/html" id="date_of_service">

    <div class="form-group col-md-12 sevice">
        <input  type="text" class="date form-control" placeholder="CLIENT DELIVERY DATE">
    </div>


</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.date').datepicker({
            format: 'MM/DD/YYYY',
            locale: 'en'
        });
    })

    $(document).on('change', '#event_default' ,function(){
        $form = $(this).parents('form')
        var type = $form.find('#event_default').val()
        if(type == 0 ){
            $('#count_past_due').removeClass('hidden')
        }else{
            $('#count_past_due').addClass('hidden')
        }

    })

    $(document).on('change', '#service_count' ,function(){
        var count  = $(this).val()
        if(count != 0){
            $('.sevice').remove()

            for(var i =1; i<= count; i++ ){
                var address_template =  $("#date_of_service").html()
                address_template = address_template.replace(/{id}/g, i)

                $("#services_date").append(address_template);
            }
        }else{
            $('.sevice').remove()
        }

    })


</script>
