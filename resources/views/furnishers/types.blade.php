@extends('layouts.layout')

@section('content')
    <style>

        @media (min-width: 400px) {
            li {
                display: flex;
            }
        }

        /*div {*/
        /*    padding: 10px;*/
        /*}*/

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
        .form-account-name {
            border: 1px solid #d0d0d0;
            border-radius: 3px;
        }


    </style>
    @include('helpers.breadcrumbs', ['title'=> "BANK EQUAL NAMES", 'route' => ["Home"=> '/admins',"BANK NAMES" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-12 col-sm-12">
                <div class="ms-ua-box">
                    <div class="ms-ua-title">
                        <div class="col-md-12">
                            {!! Form::open(['route' => ['admins.bank.types'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'equalBanks']) !!}
                                @csrf
                                <div class="row m-2">
                                    <div class="col-md-3">
                                        <div>
                                            {!! Form::text('account_type[name]','' ,['class'=>'form-account-name', 'id' => 'select-account']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            {!! Form::hidden('account_type[type]',0) !!}
                                            {!! Form::label("account_type[type]", 'DEFAULT',["class" => 'form-check-label']); !!}
                                            {!! Form::checkbox('account_type[type]',1, false, ['class'=> "form-check-input" ]); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            {!! Form::text('account_type_keys[key_word]', '', ['multiple'=>'multiple','class'=>'selectize-multiple form-group']); !!}
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
                        <table width="100%" class="table  table-striped">
                            <thead>
                            <tr>
                                <th width="20%">FURNISHERs TYPE</th>
                                <th width="80%">IS DEFAULT</th>
                                <th width="80%">KEYWORDS</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($accountTypes as $type)
                                    <tr data-id="{{$type->id}}">
                                        <td width="20%">{{$type["name"]}}</td>
                                        <td width="10%">
                                            <input type="checkbox" class="is_default_account_type" data-account-tyep="{{$type["id"]}}" {{$type["type"] ? "checked":''}}>
                                        </td>
                                        <td width="50%">
                                            {!! Form::text('equal_banks[name]', implode(',',$type->accountKeys->pluck('key_word')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}

                                        </td>
                                        <td width="20%">
                                            <div class="delete text-center" data-toggle="popover" data-placement="top" data-id="{{ $type->id}}" >
                                                <span> <i class="fa fa-trash"></i> </span>
                                            </div>
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

    <script type="text/html" id="confirmation">
        <div>
            <button class="cancel btn btn-secondary ">cancel</button>
            <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
        </div>
    </script>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/site/admin/types.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

    <script>
        $(document).ready(function($) {
            $('#equalBanks').validate({
                rules: {

                    "account_type[name]": {
                        required: true
                    },


                },
                errorPlacement: function(error, element) {
                        error.insertAfter(element);

                }
            })

        })


    </script>

@endsection



