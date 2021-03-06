@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Blog') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/admins') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Blog') }}</li>
			</ol>
		</nav>
	</div>
	<div class="">
		<a class="btn btn-primary pull-left" href="{{ route('blog.create')}}" role="button">
			{{ zactra::translate_lang('Add Blog') }}
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="album py-5 mp-0">
					<div class="container">
						<div class="row">
							@foreach($blogs as $blog)
							<div class="col-md-4 pt-5 mp0-t10" title="{{strtoupper($blog->title)}}">
								<div class="card mb-8">
									<img class="card-img-top banks-card" src="{{$blog->path}}" onclick="location.href='{{route("blog.edit", $blog->id)}}'" alt="Card image cap">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 text-left">
												<div class="" onclick="location.href='{{route("blog.edit", $blog->id)}}'">
													<h4>{{ ucfirst($blog->title) }}</h4>
												</div>
											</div>
											<div class="col-md-6 text-right">
												<div class="" onclick="location.href='{{route("blog.edit", $blog->id)}}'">
													<h6>{{date("M/d/Y", strtotime($blog->published_date))}}</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="row">
											<div class="col-md-6 text-left">
												<div class="delete" data-placement="top" title="Delete Blog" onclick="return confirm('Are You Sure?')">
													<a href="{{ route('blog.destroy',$blog->id) }}"><i class="fa fa-trash text-danger"></i></a>
												</div>
											</div>
											<div class="col-md-6 text-right">
												<a href="{{route("blog.show", $blog->url)}}" data-placement="top" title="View Blog"><b>Read More >></b></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css" />
<style>
	:root {
		--jumbotron-padding-y: 3rem;
	}

	.jumbotron {
		padding-top: var(--jumbotron-padding-y);
		padding-bottom: var(--jumbotron-padding-y);
		margin-bottom: 0;
		background-color: #fff;
	}

	@media (min-width: 768px) {
		.jumbotron {
			padding-top: calc(var(--jumbotron-padding-y) * 2);
			padding-bottom: calc(var(--jumbotron-padding-y) * 2);
		}
	}

	.jumbotron p:last-child {
		margin-bottom: 0;
	}

	.jumbotron-heading {
		font-weight: 300;
	}

	.jumbotron .container {
		max-width: 40rem;
	}

	footer {
		padding-top: 3rem;
		padding-bottom: 3rem;
	}

	footer p {
		margin-bottom: 0.25rem;
	}

	.box-shadow {
		box-shadow: 0 0.35rem 0.95rem rgba(0, 0, 0, 1);
	}

	.card-img-top {
		height: 250px;
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: auto;
		object-fit: contain;
		width: 100%;
	}

	.delete {
		z-index: 10;
		display: inline-block;
		width: 15%;
		cursor: pointer;
		color: red;
		font-size: 16px;
	}

	.banks-card {
		cursor: pointer;
	}

	.bank-name {
		text-overflow: ellipsis;
		overflow: hidden;
		display: inline-block;
		width: 100%;
		height: 1.2em;
		white-space: nowrap;
		cursor: pointer;
	}

	.popover.top {
		width: fit-content;
	}

	.pagination.custom li > a,
	span {
		width: fit-content;
		margin: 0;
	}

	@media (min-width: 767px) {

		.pagination.alphabetical li > a,
		span {
			float: unset;
			margin: 0;
		}

		.pagination.custom li > a,
		span {
			width: 4%;
			margin: 0;
		}
	}
</style>
@endsection
@section('js')
<script type="text/html" id="confirmation">
	<div>
		<button class="cancel btn btn-secondary ">cancel</button>
		<button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
	</div>
</script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
<script>
	$(document).ready(function() {
		$('[data-toggle="popover"]')
			.popover({
				html: true,
				title: "ARE YOU SURE?",
				content: function() {
					var $this = $(this);
					return $("#confirmation").html().replace("{bank_id}", $($this).attr("data-id"));
				},
			})
			.click(function(e) {
				$("[data-toggle=popover]").not(this).popover("hide");
			});

		$(document).click(function(e) {
			if ($("[data-toggle=popover]").has(e.target).length == 0 && ($(".popover").has(e.target).length == 0 || $(e.target).is(".cancel"))) {
				$("[data-toggle=popover]").popover("hide");
			}
		});

		$(document).on("click", ".delete-bank", function(e) {
			var id = $(this).attr("data-id"),
				token = $("meta[name='csrf-token']").attr("content");
			$.ajax({
				url: "/admins/blog/" + id,
				type: "DELETE",
				data: {
					id: id,
					_token: token,
				},
				success: function() {
					location.reload();
				},
			});
		});

		$(".selectize").selectize({
			plugins: ["remove_button"]
		});
	});
</script>
@endsection
