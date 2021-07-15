@extends('layouts.layout')

@section('content')
    <style>

        #bankInformation .selectize-input,.selectize-select{
            border: 1px solid #000 !important;
            border-radius: 8px !important;
        }

        .ui-autocomplete {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 14px;
            text-align: left;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-clip: padding-box;
        }

        .ui-autocomplete > li > div {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333333;
            white-space: nowrap;
        }

        .ui-menu-item:hover {
            text-decoration: none;
            color: #262626;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .ui-helper-hidden-accessible {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .ms-ua-box {
            background-color: #ffffff !important;
            border-radius: 4px !important;
            padding: 15px;
            box-shadow: 0 0 5px 1px #0000005c;
            opacity: 1;
        }
        .expand-address {
            cursor: pointer;
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

        .responsive{
            width: 100%;
            height: auto;
        }

    </style>
    @include('helpers.breadcrumbs', ['title'=> "COURT DETAILS", 'route' => ["Home"=> '/admins',"{$court->name}" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="row m-2  pt-4">
                    <div class="col-md-2 pull-left">
                        <form method="POST" action="{{route('admins.court.destroy', $court->id)}}">
                            @csrf
                            @method("DELETE")

                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-furnisher" value="Delete">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 pull-left">
                    </div>

                </div>
                <?php
                    $states = [null=>''] + \App\BankAddress::STATES;
                    $types =  \App\Court::TYPES;
                    asort($types)
                ?>
                    {!! Form::open(['route' => ['admins.court.update', $court->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation','enctype'=>'multipart/form-data' ]) !!}
                    @method('PUT')
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">

                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-sm-3 form-group changeLogo files">
                                        @if (isset($court->bucket))
                                          @if($court->checkUrlAttribute())
                                              <img src="{{$court->getUrlAttribute()}}" width="100px">
                                          @else
                                              <img width="100px" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
                                          @endif
                                        @else
                                          <img width="100px" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
                                        @endif
                                    </div>
                                    <div class="col-sm-3 hide form-group updateLogo files">
                                        <input class="bank_logo_class bank_logo file-box" type="file" name="logo" >
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="court[name]" value="{{strtoupper($court->name)}}" class="form-control" id="bank_name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::select("court[type]", $types,  $court->type, ['class'=>'form-control bank-type']); !!}
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>



                    <div class="ms-ua-box mt-2" id="account">

                        <div class="ms-ua-form pl-4 pr-4 ">
                            <div id="addresses_container">
                                <div id="address-court">
                                    <div class="row expand-address" data-address="#address">
                                        <div class="col-md-6"><label for="">ADDRESS</label>  </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 addresses" id="addresses">



                                        <div class="row">
                                            <div class="form-group col-sm-5">
                                                {{----}}
                                                {!! Form::text("court[street]",  $court->street, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {!! Form::text("court[city]", $court->city, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {!! Form::select("court[state]", $states,  $court->state, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {!! Form::text("court[zip]",  $court->zip, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-1">
                                                   <img  class="responsive" src="/images/phone.png">
                                                </div>
                                                <div class="form-group col-sm-10 p-1">
                                                {!! Form::text("court[phone_number]",$court->phone_number, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-1">
                                                    <img  class="responsive" src="/images/fax.png">
                                                </div>
                                                <div class="form-group col-sm-10 p-1">
                                                    {!! Form::text("court[fax_number]", $court->fax_number, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-1">
                                                    <img  class="responsive" src="/images/email.png">
                                                </div>
                                                <div class="form-group col-sm-10 p-1">
                                                    {!! Form::email("court[email]", $court->email, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row"></div>
                        </div>
                    </div>
                @if(!empty($court->courtJudges()->first()))
                    @foreach($court->courtJudges()->get() as $id => $judge)

                        <div class="ms-ua-box mt-2" id="account-judges-court">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-md-6 text-left"><h4>JUDGES INFO </h4></div>
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="remove-equal-bank">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="ms-ua-form pl-4 pr-4 ">
                                <div class="row" id="judge_info_{{$id}}">

                                    <div class="form-group col-sm-4">
                                        {!! Form::text("judge[{$id}][full_name]",  $judge->full_name, ["class"=>"form-control street", "placeholder"=>"FULL NAME"]) !!}
                                        {!! Form::hidden("judge[{$id}][id]",  $judge->id, ["class"=>"form-control"]) !!}

                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::text("judge[{$id}][email]",   $judge->email, ["class"=>"form-control city","placeholder"=>"E-MAIL"]) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::text("judge[{$id}][phone_number]",   $judge->phone_number, ["class"=>"form-control phone","placeholder"=>"PHONE #"]) !!}
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::text("judge[{$id}][room_number]",  $judge->room_number, ["class"=>"us-zip form-control", "placeholder"=>"ROOM #"]) !!}
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <strong class="add_range {{$loop->last?'':'hidden'}}" class="btn form-control" data-id="{{$id}}" id="add_{{$id}}" ><i class="fa fa-plus text-success"></i></strong>
                                        @if($loop->first != $loop->last)
                                        <strong class="remove_range {{($loop->last) ?'':'hidden'}}" class="btn form-control" data-id="{{$id}}" id="remove_{{$id}}"><i class="fa fa-trash text-danger"></i></strong>
                                        @endif
                                    </div>
                                </div>
                                <div id="add_judge_info"></div>
                            </div>
                        </div>



                    @endforeach
                @else
                    <div class="ms-ua-form pl-4 pr-4 ">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                {!! Form::text("judge[0][full_name]",  null, ["class"=>"form-control street", "placeholder"=>"FULL NAME"]) !!}
                            </div>
                            <div class="form-group col-sm-3">
                                {!! Form::text("judge[0][email]",   null, ["class"=>"form-control city","placeholder"=>"E-MAIL"]) !!}
                            </div>
                            <div class="form-group col-sm-2">
                                {!! Form::text("judge[0][phone_number]",   null, ["class"=>"form-control phone","placeholder"=>"PHONE #"]) !!}
                            </div>
                            <div class="form-group col-sm-2">
                                {!! Form::text("judge[0][room_number]",  null, ["class"=>"us-zip form-control", "placeholder"=>"ROOM #"]) !!}
                            </div>
                            <div class="form-group col-sm-1">
                                <strong class="add_range" class="btn form-control" data-id="0" id="add_0" ><i class="fa fa-plus text-success"></i></strong>
                            </div>
                        </div>
                        <div id="add_judge_info"></div>
                    </div>

                @endif
                    <div class="ms-ua-box mt-2" id="account-equal-bank">
                        <div class="ms-ua-title mb-0">
                            <div class="row">
                                <div class="col-md-6 text-left"><h4>Equal Names</h4> </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="remove-equal-bank">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="ms-ua-form pl-4 pr-4 ">
                            {!! Form::text('equal_courts', implode(',',$court->equalCourts->pluck('name')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                            <div class="row"></div>
                        </div>
                    </div>

                <div class="col mt-5">
                    <input type="submit" value="Save" class="ms-ua-submit">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Create Parent Bank</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ms-user-account">
                    @include('furnishers._add_bank')
            </div>
        </div>
    </div>



    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>
    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">


        <script type="text/html" id="judge_info">
            <div class="row" id="judge_info_{id}">

                <div class="form-group col-sm-4">
                    {!! Form::text("judge[{id}][full_name]",  null, ["class"=>"form-control street", "placeholder"=>"FULL NAME"]) !!}
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::text("judge[{id}][email]",   null, ["class"=>"form-control city","placeholder"=>"E-MAIL"]) !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::text("judge[{id}][phone_number]",   null, ["class"=>"form-control phone","placeholder"=>"PHONE #"]) !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::text("judge[{id}][room_number]",  null, ["class"=>"us-zip form-control", "placeholder"=>"ROOM #"]) !!}
                </div>

                <div class="col-md-1">
                    <strong class="add_range" class="btn form-control" data-id="{id}" id="add_{id}" ><i class="fa fa-plus text-success"></i></strong>

                    <strong class="remove_range" class="btn form-control" data-id="{id}" id="remove_{id}"><i class="fa fa-trash text-danger"></i></strong>
                </div>
            </div>

        </script>


        <script type="text/javascript">


            $(document).on('click', '.add_range' ,function(){

                var dataId  = $(this).attr('data-id')
                var id = parseInt(dataId) + 1
                $("#add_"+dataId).addClass("hidden")
                $("#remove_"+dataId).addClass("hidden")
                var judge_info =  $("#judge_info").html()
                judge_info = judge_info.replace(/{id}/g, id)
                $("#add_judge_info").append(judge_info);
            })

            $(document).on('click', '.remove_range' ,function(){

                var dataId  = $(this).attr('data-id')
                var id = parseInt(dataId) - 1
                $("#add_"+id).removeClass("hidden")
                $("#remove_"+id).removeClass("hidden")
                $("#judge_info_"+dataId).remove()

            })

        </script>


        <script>
        $(document).ready(function() {

            $.validator.addMethod("extension", function(value, element, param) {
                param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
                return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
            },"Please enter a value with a valid extension.");

            $('#bankInformation').validate({
                rules: {
                    "logo": {
                        extension: "jpg,jpeg,png"
                    },
                },
                messages: {
                    "logo": {
                        extension: "You're only allowed to upload jpg or png images."
                    },

                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                }
            });
            $(".selectize-type").selectize({plugins: ['remove_button']});

        });
    </script>

    <script>
        $('.delete-furnisher').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed

            bootbox.confirm({
                title: "Destroy  this FURNISHER/CRAs?",
                message: "Do you really want to delete this record?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel',
                        className: 'btn-success'

                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm',
                        className: 'btn-danger'

                    }
                },
                callback: function (result) {
                    if (result) {
                        $(e.target).closest('form').submit() // Post the surrounding form
                    }
                }
            });
        });
    </script>


@endsection
