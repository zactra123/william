@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "BANK ADDRESS", 'route' => ["Home"=> '/owner',"CLIENTS LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                {!! Form::open(['route' => ['owner.bank.update', $banksLogos->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}
                                @method('PUT')
                                @csrf
                                <div class="card-header">
                                    <div class="row m-2">
                                        <div class="col-md-4">
                                            <img src="{{asset($banksLogos->path)}}" width="100px">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="name" value="{{strtoupper($banksLogos->name)}}" class="form-control">

                                        </div>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">TYPE</th>
                                            <th class="col-md-4">STREET</th>
                                            <th class="col-md-2">CITY</th>
                                            <th class="col-md-1">STATE</th>
                                            <th class="col-md-2">ZIP</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Dispute</th>
                                                <td><input type="text" name="dis[street]"   value="{{$banksAddress->where('type', 'DISPUTE ADDRESS')->first()->street??null}}" class="form-control"></td>
                                                <td><input type="text" name="dis[city]" value="{{$banksAddress->where('type', 'DISPUTE ADDRESS')->first()->city??null}}" class="form-control"></td>
                                                <td><input type="text" name="dis[state]" value="{{$banksAddress->where('type', 'DISPUTE ADDRESS')->first()->state??null}}" class="form-control"></td>
                                                <td><input type="text" name="dis[zip]" value="{{$banksAddress->where('type', 'DISPUTE ADDRESS')->first()->zip??null}}" class="form-control"></td>

                                            </tr>
                                            <tr>
                                                    <th>EXECUTIVE OFFICE</th>
                                                <td><input type="text" name="ex[street]"  value="{{$banksAddress->where('type', 'EXECUTIVE OFFICE')->first()->street??null}}" class="form-control"></td>
                                                <td><input type="text" name="ex[city]"   value="{{$banksAddress->where('type', 'EXECUTIVE OFFICE')->first()->city??null}}"class="form-control"></td>
                                                <td><input type="text" name="ex[state]"  value="{{$banksAddress->where('type', 'EXECUTIVE OFFICE')->first()->state??null}}" class="form-control"></td>
                                                <td><input type="text" name="ex[zip]"  value="{{$banksAddress->where('type', 'EXECUTIVE OFFICE')->first()->zip??null}}" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                    <th>GOVERNING ADOREE</th>
                                                <td><input type="text" name="gv[street]"  value="{{$banksAddress->where('type', 'GOVERNING ADOREE')->first()->street??null}}" class="form-control"></td>
                                                <td><input type="text" name="gv[city]" value="{{$banksAddress->where('type', 'GOVERNING ADOREE')->first()->city??null}}" class="form-control"></td>
                                                <td><input type="text" name="gv[state]"  value="{{$banksAddress->where('type', 'GOVERNING ADOREE')->first()->state??null}}" class="form-control"></td>
                                                <td><input type="text" name="gv[zip]" value="{{$banksAddress->where('type', 'GOVERNING ADOREE')->first()->zip??null}}" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                    <th>LEGAL DEPARTMENT</th>
                                                <td><input type="text" name="lg[street]" value="{{$banksAddress->where('type', 'LEGAL DEPARTMENT')->first()->street??null}}" class="form-control"></td>
                                                <td><input type="text" name="lg[city]" value="{{$banksAddress->where('type', 'LEGAL DEPARTMENT')->first()->city??null}}" class="form-control"></td>
                                                <td><input type="text" name="lg[state]" value="{{$banksAddress->where('type', 'LEGAL DEPARTMENT')->first()->state??null}}" class="form-control"></td>
                                                <td><input type="text" name="lg[zip]" value="{{$banksAddress->where('type', 'LEGAL DEPARTMENT')->first()->zip??null}}" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                    <th>PROCESS SERVER</th>
                                                <td><input type="text" name="ps[street]"  value="{{$banksAddress->where('type', 'PROCESS SERVER')->first()->street??null}}" class="form-control"></td>
                                                <td><input type="text" name="ps[city]"  value="{{$banksAddress->where('type', 'PROCESS SERVER')->first()->city??null}}" class="form-control"></td>
                                                <td><input type="text" name="ps[state]" value="{{$banksAddress->where('type', 'PROCESS SERVER')->first()->state??null}}" class="form-control"></td>
                                                <td><input type="text" name="ps[zip]"  value="{{$banksAddress->where('type', 'PROCESS SERVER')->first()->zip??null}}" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    @foreach($banksPhoneNumbers as $value)
                                        <div class="form-group row font justify-content-center" id="delete-{{$value->id}}">
                                            <div class="col-md-12 tab-selector">


                                                <div class="col-sm-5 form-group">
                                                    {{ Form::text('phone[type][]', $value->type, ['class' => 'form-control', 'placeholder'=>'PHONE TYPE'])}}
                                                </div>
                                                <div class="col-sm-5 form-group">
                                                    {{ Form::text('phone[number][]ba', $value->number, ['class' => 'form-control', 'placeholder'=>'PHONE NUMBER']) }}
                                                </div>

                                                <div class="col-sm-2 form-group">
                                                    <input class="phone form-control btn btn-primary " type="button" data-target={{$value->id}} value="Delete"/>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    <div id="newIp">
                                    </div>
                                    <div class="form-group row m-1">
                                        <div class="col-md-2">
                                            <input class="btn btn-primary add-phone" type="button" value="Add"/>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 font">
                                        <div class="col-md-offset-5">
                                            <button type="submit" class="btn btn-primary">
                                                ADD BANK INFO
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            var i=0;

            $(".add-phone").on('click', function(){
                i++
                console.log('dasdasd')
                var newDiv = "<div class='form-group row font justify-content-center' id='delete-"+i+"'>"
                var newDiv = newDiv + "<div class='col-md-12 tab-selector'><div class='col-sm-5 form-group'>"
                var addIp = "<input type='text' name=phone[type][] class = 'form-control' placeholder = 'PHONE TYPE'> </div>" +
                    "<div class='col-sm-5 form-group'><input type='text' name=phone[number][] class = 'form-control' placeholder = 'PHONE NUMBER'></div>"
                addIp +=  '<div class="col-sm-2 form-group"> <input class="delete-phone btn btn-primary" type="button" data-target="'+i+'" value="Delete"/></div>'
                newDiv += addIp + "</div></div>";
                $("#newIp").append(newDiv);

            })

            $(document).delegate('.delete-phone', 'click', function(){
                $(this ).parents('.form-group').remove();

            });

            $('.phone').click( function(){
                var  deleteId = $(this).attr("data-target");

                console.log(deleteId);
                var token = "<?= csrf_token()?>";
                $.ajax(
                    {
                        url: "/owner/bank/delete/bank-phone/" + deleteId,
                        type: 'DELETE',
                        data: {
                            "id": deleteId,
                            "_token": token,
                        },
                        success: function () {
                            $(this).parents(".form-group").remove();
                            console.log("it Works");
                        }.bind(this)
                    });

            });

        })
    </script>

@endsection



