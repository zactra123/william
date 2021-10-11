@extends('layouts.layout')
<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css" />
@section('content')
<section class="header-title section-padding">
	<div class="container text-center">
		<h2 class="title">{{ zactra::translate_lang('View Negative Item') }}</h2>
		<span class="sub-title"><a href="#">{{ zactra::translate_lang('Home') }}</a> &gt; {{ zactra::translate_lang('Negative Item') }}</span>
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
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<span class="pull-left">{{$accounts->account_name}}</span>
								<span class="pull-right">{{ zactra::translate_lang('Repair Your negative item') }} {!! Form::checkbox('tu_account[]', $accounts->id) !!}</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('ACCOUNT #') }}</span>
							<span class="pull-right">{{$accounts->account_number}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('ACCOUNT TYPE') }}</span>
							<span class="pull-right">{{$accounts->loan_type}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('ACCOUNT STATUS') }}</span>
							<span class="pull-right">{{ zactra::translate_lang('SOME STATUS') }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('ADDRESS') }}</span>
							<span class="pull-right">{{$accounts->address}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('CURRENT BALANCE') }}</span>
							<span class="pull-right">{{$accounts->current_balance}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('CREDIT LIMIT') }}</span>
							<span class="pull-right">{{$accounts->credit_limit}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('TERM') }}</span>
							<span class="pull-right">{{$accounts->terms}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('RESPONSIBILITY') }}</span>
							<span class="pull-right">{{$accounts->responsibility}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('OPEN DATE') }}</span>
							<span class="pull-right">{{date("m/d/Y",strtotime($accounts->date_opened)) ?? ''}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{$accounts->date_effective_label}}</span>
							<span class="pull-right">{{date("m/d/Y",strtotime($accounts->date_effective) ??'')}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('CLOSE DATE') }}</span>
							<span class="pull-right">{{date("m/d/Y",strtotime($accounts->date_closed)) ?? ''}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<span class="pull-left">{{ zactra::translate_lang('PAY STATUS') }}</span>
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
					{{ zactra::translate_lang('Submit') }}
				</button>
			</div>
			<div class="col-md-5"></div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
