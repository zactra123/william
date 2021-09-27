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
    <h2 class="title">Check Chosen Dispute</h2>
    <span class="sub-title"><a href="#">Home</a> &gt; Check Dispute Option</span>
  </div>
</section>
<section class="charts working-section">
  <div class="container-fluid">
    <div class="Experian" style="display: block;">
      <div class="row mt20">
        <div class="col-md-1 mt20"></div>
        <div class="col-md-10 mt20">
          {!! Form::open(['route' => ['affiliate.dispute.update'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!} @csrf @method("put") @foreach($completeDispute as $complete) @if($complete->disputable->getTable() ==
          "client_report_ex_accounts")
          <div class="mt20 title-ex_account-{{$complete->disputable->id}}"></div>
          <div class="chart-report title-ex_account-{{$complete->disputable->id}}">
            <div class="row mt20" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span class="">{{$complete->disputable->source_name}} </span>

                <span style="padding-left: 15px;"> # {{$complete->disputable->source_id}}</span>
              </div>
              <div class="col-md-2 delete-name" data-attribute="title-ex_account-{{$complete->disputable->id}}">
                <span style="font-weight: bold; font-size: 16px;">DESELECT</span>
                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                <input type="hidden" name="ex_account[id]" value="{{$complete->id}}" />
              </div>
            </div>
            <div class="row mt20 border" style="font-weight: bold;">
              <div class="col-md-1"></div>
              @if($complete->disputable->opened_date !=null )
              <div class="col-md-2">
                <div class="col-md-12">
                  <label class="form-text">DATE OPENED</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{date("m/d/Y",strtotime($complete->disputable->opened_date))}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->type !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">TYPE</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{$complete->disputable->type}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->status !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">STATUS</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{$complete->disputable->status}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->recent_balance_date !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">RECENT BALANCE</label>
                </div>
                <div class="col-md-12">
                  <span class=""> ${{$complete->disputable->recent_balance_amount}} as of {{date("d/m/Y",strtotime($complete->disputable->recent_balance_date))}} </span>
                </div>
              </div>
              @else
              <div class="col-md-2"></div>
              @endif
            </div>

            <div class="row mt20 border" style="font-weight: bold;">
              @foreach($complete->additional_information as $key => $value) @if( $key = 'type' && $value == 'credit')
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[expiration_date]" placeholder="EXPIRATION DATE" />
                  </div>
                </div>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[cvc]" placeholder="CVC (CARD VERIFICATION CODE)" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>

              @endif @if($key = 'type' && $value == "auto")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>
              <div class="row mt-20">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="ex_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="ex_account[year]" placeholder="YEAR" />
                  </div>

                  <div class="col-md-4">
                    <input class="form-control" type="text" name="ex_account[make]" placeholder="MAKE" />
                  </div>
                </div>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[model]" placeholder="MODEL" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>
              @endif @if($key = 'type' && $value == "personal")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="ex_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>
              @endif @if($key = 'type' && $value == "student")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="ex_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="ex_account[school_attened]" placeholder="SCHOOL ATTENDED" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="ex_account[security_word]" placeholder="SECURITY WORD" />
                </div>
              </div>

              @endif @if($key = 'type' && $value == 'mortgage')
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="ex_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="ex_account[property_address]" placeholder="PROPERTY ADDRESS" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="ex_account[security_word]" placeholder="SECURITY WORD" />
                </div>
              </div>
              @endif @endforeach
            </div>
          </div>
          @endif @if($complete->disputable->getTable() == "client_report_tu_accounts") @if(!empty($complete->disputable))
          <div class="mt20 title-tu_account-{{$complete->disputable->id}}"></div>
          <div class="chart-report title-tu_account-{{$complete->disputable->id}}">
            <div class="row mt20" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span class="">{{$complete->disputable->account_name}} </span>

                <span style="padding-left: 15px;"> # {{$complete->disputable->account_number}}</span>
              </div>
              <div class="col-md-2 delete-name" data-attribute="title-tu_account-{{$complete->disputable->id}}">
                <span style="font-weight: bold; font-size: 16px;">DESELECT</span>

                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                <input type="hidden" name="tu_account[id]" value="{{$complete->id}}" />
              </div>
            </div>
            <div class="row mt20 border" style="font-weight: bold;">
              <div class="col-md-1"></div>
              @if($complete->disputable->date_opened !=null )
              <div class="col-md-2">
                <div class="col-md-12">
                  <label class="form-text">DATE OPENED</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{date("m/d/Y",strtotime($complete->disputable->date_opened))}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->account_type_description !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">ACCOUNT TYPE</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{$complete->disputable->account_type_description}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->loan_type !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">LOAN TYPE</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{$complete->disputable->loan_type}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->pay_status !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">PAY STATUS</label>
                </div>
                <div class="col-md-12">
                  <span class="">{{$complete->disputable->pay_status}} </span>
                </div>
              </div>
              @else
              <div class="col-md-2"></div>
              @endif
            </div>

            <div class="row mt20 border" style="font-weight: bold;">
              @foreach($complete->additional_information as $key => $value) @if( $key = 'type' && $value == 'credit')
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[expiration_date]" placeholder="EXPIRATION DATE" />
                  </div>
                </div>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[cvc]" placeholder="CVC (CARD VERIFICATION CODE)" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>

              @endif @if($key = 'type' && $value == "auto")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>
              <div class="row mt-20">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="tu_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="tu_account[year]" placeholder="YEAR" />
                  </div>

                  <div class="col-md-4">
                    <input class="form-control" type="text" name="tu_account[make]" placeholder="MAKE" />
                  </div>
                </div>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[model]" placeholder="MODEL" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>
              @endif @if($key = 'type' && $value == "personal")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="tu_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>
              @endif @if($key = 'type' && $value == "student")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="tu_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="tu_account[school_attened]" placeholder="SCHOOL ATTENDED" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="tu_account[security_word]" placeholder="SECURITY WORD" />
                </div>
              </div>

              @endif @if($key = 'type' && $value == 'mortgage')
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="tu_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="tu_account[property_address]" placeholder="PROPERTY ADDRESS" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="tu_account[security_word]" placeholder="SECURITY WORD" />
                </div>
              </div>
              @endif @endforeach
            </div>
          </div>
          @endif @endif @if($complete->disputable->getTable() == "client_report_eq_accounts") @if(!empty($complete->disputable))
          <div class="mt20 title-eq_account-{{$complete->disputable->id}}"></div>
          <div class="chart-report title-eq_account-{{$complete->disputable->id}}">
            <div class="row mt20" style="font-weight: bold;">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <span class="">{{$complete->disputable->name}} </span>
              </div>
              <div class="col-md-2 delete-name" data-attribute="title-eq_account-{{$complete->disputable->id}}">
                <span style="font-weight: bold; font-size: 16px;">DESELECT</span>

                <i class="fa fa-check-square-o" aria-hidden="true" style="margin-left: 30%;"></i>
                <input type="hidden" name="eq_account[id]" value="{{$complete->id}}" />
              </div>
            </div>
            <div class="row mt20 border" style="font-weight: bold;">
              <div class="col-md-1"></div>
              @if($complete->disputable->date_opened !=null )
              <div class="col-md-2">
                <div class="col-md-12">
                  <label class="form-text">DATE OPENED</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{date("m/d/Y",strtotime($complete->disputable->date_opened))}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->account_type !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">ACCOUNT TYPE</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{$complete->disputable->account_type}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->loan_type !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">ACCOUNT TITLE</label>
                </div>
                <div class="col-md-12">
                  <span class=""> {{$complete->disputable->account_title}} </span>
                </div>
              </div>
              @endif @if($complete->disputable->current_payment_status !=null )
              <div class="col-md-3">
                <div class="col-md-12">
                  <label class="form-text">PAYMENT STATUS</label>
                </div>
                <div class="col-md-12">
                  <span class="">{{$complete->disputable->current_payment_status}} </span>
                </div>
              </div>
              @else
              <div class="col-md-2"></div>
              @endif
            </div>
            <div class="row mt20 border" style="font-weight: bold;">
              @foreach($complete->additional_information as $key => $value) @if( $key = 'type' && $value == 'credit')
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[expiration_date]" placeholder="EXPIRATION DATE" />
                  </div>
                </div>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[cvc]" placeholder="CVC (CARD VERIFICATION CODE)" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>

              @endif @if($key = 'type' && $value == "auto")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>
              <div class="row mt-20">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="eq_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="eq_account[year]" placeholder="YEAR" />
                  </div>

                  <div class="col-md-4">
                    <input class="form-control" type="text" name="eq_account[make]" placeholder="MAKE" />
                  </div>
                </div>
              </div>
              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[model]" placeholder="MODEL" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>
              @endif @if($key = 'type' && $value == "personal")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="row mt20">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="eq_account[security_word]" placeholder="SECURITY WORD" />
                  </div>
                </div>
              </div>
              @endif @if($key = 'type' && $value == "student")
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="eq_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="eq_account[school_attened]" placeholder="SCHOOL ATTENDED" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="eq_account[security_word]" placeholder="SECURITY WORD" />
                </div>
              </div>

              @endif @if($key = 'type' && $value == 'mortgage')
              <div class="col-md-12">
                <label class="form-text">REQUIRE INFORMATION FOR DISPUTE</label>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="eq_account[account_number]" placeholder="FULL ACCOUNT NUMBER" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="eq_account[property_address]" placeholder="PROPERTY ADDRESS" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="col-md-12">
                  <input type="text" name="eq_account[security_word]" placeholder="SECURITY WORD" />
                </div>
              </div>
              @endif @endforeach
            </div>
          </div>

          @endif @endif @endforeach

          <div class="row mt20">
            <div class="col-md-5"></div>
            <div class="col-md-2" style="margin-bottom: 20px;">
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

@endsection @section('scripts')
<script>
  $(document).ready(function () {
    $(".delete-name").click(function () {
      var name = $(this).attr("data-attribute");
      $("." + name).remove();
    });
  });
</script>
@endsection
