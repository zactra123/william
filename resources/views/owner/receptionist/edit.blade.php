@extends('layouts.layout')

@section('content')


    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"UPDATE RECEPTIONIST" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        <div class="card w-75">
                            <div class="text-center">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="row m-2">
                                <a class="btn btn-success"  href="{{route('owner.receptionist.list')}}">BACK</a>
                            </div>
                            <div class="card-header">
                                <h3> EDIT RECEPTIONIST </h3>
                            </div>

                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.receptionist.update', $receptionist->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}
                                @method('PUT')
                                @csrf
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('receptionist[first_name]', $receptionist->first_name, ['class' => 'form-control'])}}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('receptionist[last_name]', $receptionist->last_name, ['class' => 'form-control'])}}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::email('receptionist[email]', $receptionist->email, ['class' => 'form-control',  'required autocomplete'=>"email"]) }}
                                        </div>
                                    </div>

                                </div>

                                @foreach($receptionist->ipAddress as $value)
                                    <div class="form-group row font justify-content-center" id="delete-{{$value->id}}">
                                        <div class="col-md-12 tab-selector">

                                            <div class="col-sm-10 form-group">
                                                {{ Form::text('receptionist[ip_address][]', $value->ip_address, ['class' => 'form-control col-10', 'placeholder'=>'IP ADDRESS']) }}
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <input class="ip-address  btn btn-primary " type="button" data-target={{$value->id}} value="Delete"/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div id="newIp">
                                </div>
                                <div class="form-group row m-1">
                                    <div class="col-md-2">
                                        <input class="btn btn-primary add-ip-address" type="button" value="Add"/>

                                    </div>
                                </div>

                                <div class="form-group row mb-0 font">
                                    <div class="col-md-offset-5">
                                        <button type="submit" class="btn btn-primary">
                                            Create admin
                                        </button>
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

                $(".add-ip-address").on('click', function(){
                    var newDiv = "<div class='form-group row font justify-content-center' ><div class='col-md-12 tab-selector'><div class='col-sm-10 form-group'>"
                    var addIp = "<input type='text' name=receptionist[ip_address_new][] class = 'form-control col-9' placeholder = 'IP ADDRESS'></div>"
                    addIp +=  '<div class="col-sm-2 form-group">  <input class="delete-ip-address  btn btn-primary " type="button" value="Delete"/></div>'
                    newDiv += addIp + "</div></div></div>";+
                        $("#newIp").append(newDiv);

                })

                $(document).delegate('.delete-ip-address', 'click', function(){
                    $(this ).parents('.form-group').remove();

                });



                $('.ip-address').click( function(){
                    var  deleteId = $(this).attr("data-target")
                    var token = "<?= csrf_token()?>";
                    $.ajax(
                        {
                            url: "delete/ip-address/" + deleteId,
                            type: 'DELETE',
                            data: {
                                "id": deleteId,
                                "_token": token,
                            },
                            success: function () {
                                $(this).parents(".form-group").delete();
                                console.log("it Works");
                            }.bind(this)
                        });

                });


            })
        </script>

@endsection



