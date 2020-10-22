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
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">

                    {!! Form::open(['route' => "owner.pricing.addChange", 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">

                            <div class="ms-ua-title mb-0">
                                @foreach($lates as $key => $late)
                                    <div class="row" style="text-align: left; padding-left: 15px; margin-top: 20px">
                                        {{$late}}
                                    </div>
                                    <div class="row">
                                    @foreach($types as $key => $type)

                                            <div class="col-md-6" style="text-align: left; padding-left: 15px; margin-top: 20px">
                                                    {{$type}}

                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="name"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">

                                            </div>
                                    @endforeach
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <input type="submit" value="Save" class="ms-ua-submit">

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admins/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



