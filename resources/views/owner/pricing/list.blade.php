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

</style>
@section('content')
    @include('helpers.breadcrumbs', ['title'=> "PRICING LIST", 'route' => ["Home"=> '/owner',"PRICING LIST" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">
                            <div class="form-group">
                                {!! Form::select('affiliates', ["" => "DEFAULT"] + $affiliates, null, ['class'=>'selectize']); !!}
                            </div>

                        </div>
                        <div class="ms-ua-form">
                            {!! Form::open(['route' => "owner.pricing", 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                            @csrf
                                @include('owner.pricing._form', ["pricing" =>$default_price_list])
                            {!! Form::close() !!}
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
                valueField: 'id'
            });
        });
    </script>
@endsection



