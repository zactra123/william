@extends('layouts.layout')

@section('content')
    <style>

        @media (min-width: 400px) {
            li {
                display: flex;
            }
        }

        div {
            padding: 10px;
        }

        tr {
            display: flex;
            flex-direction: column;

        }

        @media (min-width: 400px) {
            tr {
                flex-direction: row;
            }
        }

        td {
            padding: 10px;
        }

        thead {
            display: none;
        }
        .selected {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: -7px;
        }

        .selected li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: rgb(6, 29, 49, 0.8);
            border-radius: 3px;
            margin: 7px;
            padding-left: 0.9375rem;
            padding-right: 0.3125rem;
            max-width: calc(100% - 14px);
            box-shadow: 2px 2px 1px #061d3166;
        }
        .selected span {
            font-size: 1.25rem;
            color: #fff;
            display: inline-block;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .selected i {
            cursor: pointer;
            font-size: 1.25rem;
            color:#fff;
            padding: 5px;
            -webkit-transition: .2s;
            transition: .2s;
        }


    </style>
    @include('helpers.breadcrumbs', ['title'=> "BANK EQUAL NAMES", 'route' => ["Home"=> '/owner',"BANK NAMES" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-12 col-sm-12">
                <div class="ms-ua-box">
                    <div class="ms-ua-title">
                        <div class="col-md-12">
                            {!! Form::open(['route' => ['owner.bank.equal'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'equalBanks']) !!}
                                @csrf
                                <div class="row m-2">
                                    <div class="col-md-4">
                                        {!! Form::text('bank_logo[id]','' ,['class'=>'selectize-single ', 'id' => 'select-account']); !!}
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::text('equal_banks', '', ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" value="Save" class="ms-ua-submit">
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <thead>
                            <tr>
                                <th width="20%">Bank Name</th>
                                <th width="80%">Equal Names</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($banksLogos as $bank)
                                    <tr>
                                        <td width="20%">{{$bank->name}}</td>
                                        <td width="80%">
                                            <ul class="selected">
                                                @foreach($bank->equalBanks as $equal)
                                                    <li>
                                                        <span> {{$equal->name}}</span>
                                                        <i class="fa fa-close remove-equal-bank" data-equal-id="{{$equal->id}}"></i>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/site/admins/equal.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

@endsection



