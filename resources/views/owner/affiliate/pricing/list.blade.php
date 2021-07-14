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


                            <div class="row">
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
        $(document).ready(function(){
            $('#bankInformation').submit(function(e){
                e.preventDefault();
                var url2 = $('.btnsub').attr('data-url');
                data = $('#bankInformation').serialize()
                $.ajax({
                    url: url2+'/owner/affiliate/pricing',
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
        $(document).ready(function(){

            $(document).delegate('.collection', "keyup", function() {

                var id = $(this).attr('data-id')
                var min = $("#min-"+id).val()
                var max = $("#max-"+id).val()
                var percent = $("#percent-"+id).val()
                var fee = $("#fee-"+id).val()
                if( $("#min-"+id).val().length === 0 ) {
                    min = 0;
                }else{
                    min = parseFloat(min)
                }
                if(id < 3){
                    if( $("#max-"+id).val().length === 0 ) {
                        max = 0;
                    }else{
                        max = parseFloat(max)
                    }
                }

                if( $("#percent-"+id).val().length === 0 ) {
                    percent = 0;
                }else{
                    percent = parseFloat(percent)
                }
                if( $("#fee-"+id).val().length === 0 ) {
                    fee = 0;
                }else{
                    fee = parseFloat(fee)
                }

                var minPrice = fee + (percent/100)*min

                if(id == 3){
                    var maxPrice = fee + (percent/100)*min
                }else{ maxPrice = fee + (percent/100)*max}

                console.log('dasd')
                $("#min-price-"+id).val(minPrice.toFixed(1))
                $("#max-price-"+id).val(maxPrice.toFixed(1))
            });


        });

    </script>


@endsection
@section('css')
  <style>
      .ms-ua-box {
          background-color: #ffffff !important;
          border-radius: 4px !important;
          padding: 15px;
          box-shadow: 0 0 5px 1px #0000005c;
          opacity: 1;
      }

  </style>
@endsection
