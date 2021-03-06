@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Furnishers') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Furnishers') }}</li>
			</ol>
		</nav>
	</div>
	<div class="mmt-7">
		<a class="btn btn-primary pull-left mmt-7" href="{{ route('admins.bank.create')}}" role="button">
			{{ zactra::translate_lang('ADD FURNISHERs / CRAs') }}
		</a>
	</div>
</div>
<div class="container mmap-0">
	<div class="row row-sm">
		<div class="col-md-12 col-sm-12 col-12 mmap-0">
			<div class="card mg-b-20" id="tabs-style2">
				<div class="card-body">
					<div class="main-content-label mg-b-5">
						{{ zactra::translate_lang('Furnishers') }}
					</div>
					<p class="mg-b-20">{{ zactra::translate_lang('See list of furnishers here ...') }}</p>
					@include('furnishers.search')
					<section class="ms-user-account">
						<div class="container">
							<div class="row">
								<div class="col-md-3 col-sm-12"></div>
								<div class="col-md-12 col-sm-12">
									<div class="row m-2">
									</div>
									<div class="container">
										<?php $alphas = range("A", "Z"); ?>
										<div class="row">
											<div class="col-md-12 col-sm-12 col-12">
												<nav aria-label="Page navigation example" style="overflow:scroll;">
													<ul class="pagination">
														<li class="page-item {{empty(request()->character) ? "active":""}}">
															<a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type])}}"> {{ zactra::translate_lang('ALL') }} </a>
														</li>
														<li class="page-item {{!empty(request()->character) && request()->character == '#' ? "active":""}}">
															<a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' => "#"])}}"> {{ zactra::translate_lang('#') }} </a>
														</li>
														@foreach($alphas as $alpha)
															<li class="page-item {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}">
																<a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a>
															</li>
														@endforeach
													</ul>
												</nav>
											</div>
										</div>
										{{-- <ul class="pagination alphabetical ">
                    <li class="{{empty(request()->character) ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type])}}">ALL</a></li>
										<li class="{{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
										@foreach($alphas as $alpha)
										<li class=" {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
										@endforeach
										</ul> --}}
										{{ $banksLogos->appends(request()->except('page'))->links('helpers.pagination2')}}
									</div>
									<div class="album py-5">
										<div class="container mp-0">
											<div class="row">
												@foreach($banksLogos as $logos)
												<div class="col-md-3 col-sm-12 col-12 mp-0" title="{{strtoupper($logos->name)}}">
													<div class="card mb-4 pt-5">
														{{-- Checking logo in Aws S3 storage  --}}
														@if($logos->checkUrlAttribute())
  														{{-- Get AWS S3 file link with  getUrlAttribute function  --}}
  														<a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{$logos->getUrlAttribute()}}" onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
														@else
							                {{-- if Furnisher doesn't have logo in AWS S3 storage use default or in case of Furnisher should not has a logo use default no logo icon --}}
														@if($logos->no_logo)
							                <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{url('images/no_bank_logos.png')}}" onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
														@else
							                 <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
														@endif
														@endif
														<div class="card-body">
															<div class="card-text mt-5">
																<div class="bank-name b" onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'">
																	{{strtoupper($logos->name)}}
																</div>
																<a href="{{ route('furnishers.bank.delete',$logos->id) }}">
																	<div class="delete2 text-right" data-toggle="popover" onclick="return confirm('Are You Sure?')" data-placement="top" data-id="{{ $logos->id}}">
																		<span> <i class="fa fa-trash"></i> </span>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
									</div>
									<div class="container m-hidden">
										<div class="row mr-2 mb-5">
											<div class="col-md-12 pull-right p-0">
												{{ $banksLogos->appends(request()->except('page'))->links('helpers.pagination')}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
<script src="{{ asset('js/admins/furnishers.js?v='.env('ASSET_VERSION')) }}" ></script>

<script type="text/html" id="confirmation">
<div>
  <button class="cancel btn btn-secondary">cancel</button>
  <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
</div>
</script>
@endsection
