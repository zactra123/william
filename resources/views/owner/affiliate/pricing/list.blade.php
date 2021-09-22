@extends('owner.layouts.app')
@section('title')
<title> Pricing </title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">Hi, welcome back!</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pricing List</li>
			</ol>
		</nav>
	</div>
</div>
<section class="ms-user-account">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="ms-ua-form">
					{!! Form::open(['route' => "owner.affiliate.pricing", 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
					@csrf
					<div id="price-list">
						@include('owner.affiliate.pricing._form', ["pricing" =>$default_price_list, "default" => $default_price_list])
					</div>
					<div class="row mt-3">
						<div class="col-md-12 text-right">
							<input type="submit" value="Add" class="ms-ua-submit btnsub btn btn-primary mb-5 pull-right" data-url="{{ url('/') }}">
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('#bankInformation').submit(function(e) {
			e.preventDefault();
			var url2 = $('.btnsub').attr('data-url');
			data = $('#bankInformation').serialize()
			$.ajax({
				url: url2 + '/owner/affiliate/pricing',
				type: 'POST',
				dataType: 'html',
				data: data,
				success: function(res) {
					$("#price-list").html(res)

				}
			});
		})
	});
</script>
<script>
	$(document).ready(function() {

		$(document).delegate('.collection', "keyup", function() {

			var id = $(this).attr('data-id')
			var min = $("#min-" + id).val()
			var max = $("#max-" + id).val()
			var percent = $("#percent-" + id).val()
			var fee = $("#fee-" + id).val()
			if ($("#min-" + id).val().length === 0) {
				min = 0;
			} else {
				min = parseFloat(min)
			}
			if (id < 3) {
				if ($("#max-" + id).val().length === 0) {
					max = 0;
				} else {
					max = parseFloat(max)
				}
			}

			if ($("#percent-" + id).val().length === 0) {
				percent = 0;
			} else {
				percent = parseFloat(percent)
			}
			if ($("#fee-" + id).val().length === 0) {
				fee = 0;
			} else {
				fee = parseFloat(fee)
			}

			var minPrice = fee + (percent / 100) * min

			if (id == 3) {
				var maxPrice = fee + (percent / 100) * min
			} else {
				maxPrice = fee + (percent / 100) * max
			}

			console.log('dasd')
			$("#min-price-" + id).val(minPrice.toFixed(1))
			$("#max-price-" + id).val(maxPrice.toFixed(1))
		});

	});
</script>
@endsection
@section('css')
<style>
	.ms-ua-box {
		background-color: #ffffff !important;
		border-radius: 6px !important;
		padding: 15px;
		/* box-shadow: 0 0 5px 1px #0000005c; */
		opacity: 1;
	}

	.steps {
		position: sticky;
		top: 60px;
	}
</style>
@endsection
@section('js')
<script type="text/html" id="charge_off_range">
  <div class="col-md-12" id="charge_{type}_{id}">
  	<div class="row mb-3">
  		<div class="col-md-4">
  			<div class="row">
  				<div class="col-md-12">
  				</div>
  				<div class="col-md-12">
  					<input id="mina1" class="form-control mb-2" type="text" placeholder="Min $" name="{type}[{id}][minimum]" class="collection" data-id="{id}" title="Min">
  				</div>
  			</div>
  			{!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
  		</div>
  		<div class="col-md-4 ">
  			<div class="row">
  				<div class="col-md-12">
  				</div>
  				<div class="col-md-12">
  					<input id="maxa1" class="form-control mb-2" type="text" placeholder="Max $" name="{type}[{id}][maximum]" class="collection" data-id="0" id="max-0" title="Max">
  				</div>
  			</div>
  			{!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
  		</div>
  		<div class="col-md-3">
  			<div class="row">
  				<div class="col-md-12">
  				</div>
  				<div class="col-md-12">
  					<input id="pricea1" class="form-control mb-2" type="text" placeholder="Price $" name="{type}[{id}][price]" class="collection" data-id="0" title="Price">
  				</div>
  			</div>
  			{!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
  		</div>
  		<div class="col-md-1 pt-2 pl-0">
  			<strong class="add_range pointer pr-2" data-type="{type}" data-id="{id}" id="add_{type}_{id}"><i class="fa fa-plus text-success"></i></strong>
  			<strong class="remove_range pointer" data-type="{type}" data-id="{id}" id="remove_{type}_{id}"><i class="fa fa-trash text-danger"></i></strong>
  		</div>
  	</div>
  </div>
</script>

<script type="text/javascript">
  $(document).on("click", ".add_range", function () {
    var type = $(this).attr("data-type");
    var dataId = $(this).attr("data-id");
    var id = parseInt(dataId) + 1;
    var last = parseInt(dataId) + 2;
    $("#add_" + type + "_" + dataId).addClass("hidden");
    $("#remove_" + type + "_" + dataId).addClass("hidden");
    $("#" + type + "_min_val_last").attr("name", type + "_co[" + last + "][minimum]");
    $("#" + type + "_price_last").attr("name", type + "_co[" + last + "][price]");

    var charge_off_range = $("#charge_off_range").html();
    charge_off_range = charge_off_range.replace(/{type}/g, type).replace(/{id}/g, id);
    $("#" + type + "_range").append(charge_off_range);
  });

  $(document).on("click", ".remove_range", function () {
    var type = $(this).attr("data-type");
    var dataId = $(this).attr("data-id");
    var id = parseInt(dataId) - 1;
    var last = parseInt(dataId);
    $("#add_" + type + "_" + id).removeClass("hidden");
    $("#remove_" + type + "_" + id).removeClass("hidden");
    $("#" + type + "_min_val_last").attr("name", type + "_co[" + last + "][minimum]");
    $("#" + type + "_price_last").attr("name", type + "_co[" + last + "][price]");
    $("#charge_" + type + "_" + dataId).remove();
  });
</script>

@endsection
