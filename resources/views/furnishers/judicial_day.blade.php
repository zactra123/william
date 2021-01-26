@extends('layouts.layout')

<style>

    .selectize-input,.selectize-select{
        border: 1px solid #000 !important;
        border-radius: 8px !important;
    }


    .ms-ua-box {
        background-color: #ffffff !important;
        border-radius: 4px !important;
        padding: 15px;
        box-shadow: 0 0 5px 1px #0000005c;
        opacity: 1;
    }
    .priceName{
        width: 100%;
        height: auto;
        padding: 0;
        float: left;
    }
    .price{
        width: 20%;
        height: auto;
        padding: 0;
        float: left;
    }
    .name{
        width: 80%;
        height: auto;
        padding: 0;
        float: left;
    }

</style>

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "PRICING LIST", 'route' => ["Home"=> '/owner',"PRICING LIST" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">
                            <div class="form-group">
                                <div class="col-md-2" style="margin: 0">

                                {!! Form::select('affiliates', ["" => "SELECT STATE"] + $stateArr, null, ['class'=>'selectize']); !!}
                                </div>
                            </div>

                        </div>
                        <div id="price-list">
                            @include('furnishers._form', ["states" =>$states])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

    <script>
        $(document).ready(function(){
            $('.selectize').selectize({
                delimiter: ',',
                searchField: 'name',
                labelField: 'name',
                valueField: 'id',
                onChange: function(value) {
                    $.ajax({
                        url: '/admins/furnishers/mortgage/state',
                        type: 'GET',
                        dataType: 'html',
                        data: {
                            id: value
                        },
                        success: function(res) {
                            console.log(res)

                            $("#price-list").html(res)
                        }
                    });
                }
            });

        });

    </script>



@endsection



