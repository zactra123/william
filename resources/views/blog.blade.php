@extends('layouts.layout1')
@section('meta')
<title>{{ zactra::translate_lang('Prudent Credit Solutions: News Room') }}</title>
<meta name="description" content="We resolve inaccuracies with - Bankruptcy, Mortgage Negatives, Late Payment Remarks, Student Loans, Fraud Accounts, Charge Offs, Mixed Files, ChexSystems.">
<meta name="keywords" content="credit repair blogs, list of credit repair blogs, credit repair strategies blogs, credit repair companies blog, credit repair business blog">
@endsection
@section('content')
<br>
<div class="container-fluid pt-1">
	<div class="px-3 mt-5 pt-3">
		<div class="row">
			<div class="col-md-12 py-4">
				<h1 class="text-center fs-25">{{ zactra::translate_lang('OUR NEWS ROOM') }}</h1>
				<p class="text-center">{{ zactra::translate_lang('It is our news room. Here You find all News about our Website. Please visit here continuously to stay updated.') }}</p>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<div class="Search Results"></div>
							<form class="p-r" action="" method="GET">
								<input type="text" value="" required="" class="blog-search-field shadow-sm" placeholder="Search tags,keywords" name="query" />
							</form>
							<div class="mt-5 shadow-sm px-4 py-4">
								<h4 class="h6">{{ zactra::translate_lang('Most Viewed Blogs') }}</h4>
								<div class="latest-products mt-4"></div>
								{{-- <p  class="text-danger">This section is under development</p> --}}
								@foreach ($mostviewes as $key1 => $value1)
								<div class="row mb-4">
									<div class="col-md-4">
										<a href="{{ route('home.blog.show',$value1->url) }}"><img class="img-thumbnail" src="{{$value1->path}}" alt=""></a>
									</div>
									<div class="col-md-8">
										<a href="{{ route('home.blog.show',$value1->url) }}">
											<h5 class="text-info">{{ ucfirst($value1->title) }}</h5>
										</a>
										<a href="{{ route('home.blog.show',$value1->url) }}" style="color:#5a5959 !important;">
											<span> {!! zactra::limit_words($value1->article,70) !!} </span></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row mb-5">
					@if (count($blogs) > 0)
					@foreach($blogs as $blog => $value)
					<div class="col-md-6 mb-4">
						<div class="card">
							<div class="card-body">
								<img class="card-img-top" src="{{$value->path}}" alt="Card image cap">
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<h5 class="card-title text-info">{{strtoupper($value->title)}}</h5>
									</div>
									<div class="col-md-6 text-right text-primary">
										<i class="fa fa-eye"></i> @if ($value->visited=="")
										0
										@else
										{{ $value->visited }}
										@endif
									</div>
								</div>
								<p class="card-text">{!! zactra::limit_words($value->article,100) !!}</p>
							</div>
							<div class="row">
								<div class="col-md-6">
									<a href="{{ route('home.blog.show',$value->url) }}" class="btn btn-primary">{{ zactra::translate_lang('Read More') }}</a>
								</div>
								<div class="col-md-6 text-right pt-3">
									<span class="text-danger">{{ zactra::BlogDay($value->created_at) }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="col-md-12">
					<div class="alert alert-danger text-center">
						<h3>{{ zactra::translate_lang('No Data Found!') }}</h3>
					</div>
				</div>
				@endif
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<div class="text-center">
						{{$blogs->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection
