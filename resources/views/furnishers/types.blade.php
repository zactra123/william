@extends('layouts.admin')

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
    {{-- @include('helpers.breadcrumbs', ['title'=> "BANK EQUAL NAMES", 'route' => ["Home"=> '/admins',"BANK NAMES" => "#"]]) --}}
    <section class="ms-user-account mt-5">
        <div class="container mt-5">
            <div class="col-md-3 col-sm-12 mt-5"></div>
            <br><br><br><br>
            <div class="col-md-12 col-sm-12">
              <div class="card">
                {!! Form::open(['route' => ['admins.bank.types'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'equalBanks']) !!}
                  @csrf
                  <div class="row px-5 pt-5 pb-3">
                          <div class="col-md-4">
                              <div>
                                  {!! Form::text('account_type[name]','' ,['class'=>'form-control form-account-name', 'id' => 'select-account']); !!}
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-check">
                                  <div class="row">
                                    <div class="col-md-8">
                                      {!! Form::hidden('account_type[type]',0) !!}
                                      {!! Form::label("account_type[type]", 'DEFAULT',["class" => 'form-control form-check-label']); !!}

                                    </div>
                                    <div class="col-md-4">
                                      {!! Form::checkbox('account_type[type]',1, false, ['class'=> " form-check-input" ]); !!}
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="row">
                                <div class="col-sm-8">
                                  {!! Form::text('account_type_keys[key_word]', '', ['multiple'=>'multiple','class'=>' selectize-multiple form-group']); !!}
                                </div>
                                <div class="col-sm-4">
                                  <input type="submit" value="Save" class="btn btn-primary ms-ua-submit">
                                </div>
                              </div>
                          </div>


                  </div>
                  {!! Form::close() !!}
              </div>
            </div>
            <div class="col-md-12 col-sm-12 my-5">

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
                                        <td width="20%" style="text-align:center">
                                            <a class="btn btn-danger" href="{{ route('furnisher.delete.type',$type->id) }}"><div class="" onclick="return confirm('Are You Sure?')" data-toggle="popover" data-placement="top" data-id="{{ $type->id}}" >
                                                <span> <i class="fa fa-trash"></i> </span>
                                            </div></a>
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
