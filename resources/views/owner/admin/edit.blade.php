@extends('layouts.owner')

@section('content')
    <style>
        .form-control{
            border: 2px solid #0c71c3;
            border-radius: 10px;
        }

    </style>
    <div class="container mt-5 pt-5">
        <div class="row pt-4 m-2">
            <a class="btn btn-success"  href="{{route('owner.admin.list')}}">Back</a>
        </div>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>

        @endforeach

        <div class="row justify-content-center">

            <div class="col-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="head m-2">Edit Admin</div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => ['owner.admin.update', $admin->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}
                            @method('PUT')
                            @csrf

                            <div class="form-group row m-1">
                                {{ Form::text('admin[first_name]', $admin->first_name, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group row m-1">
                                {{ Form::text('admin[last_name]', $admin->last_name, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group row m-1">
                                {{ Form::email('admin[email]', $admin->email, ['class' => 'form-control',  'required autocomplete'=>"email"]) }}
                            </div>

                            <div class="form-group row m-1">
                                {{ Form::select('admin[negative_types][]',$negativeType, $admin->adminSpecifications->pluck('id')->all(), ['class' => 'form-control',  'required autocomplete'=>"negative_types", 'multiple' => 'multiple']) }}
                            </div>
                            @foreach($admin->ipAddress as $value)
                                <div class="form-group row m-1">
                                    <div class="col-md-12">
                                        <div class="row ">
                                            {{ Form::text('admin[ip_address][]', $value->ip_address, ['class' => 'form-control col-10', 'placeholder'=>'IP ADDRESS']) }}
                                            <input type="hidden" name="admin[ip_id][]" class="form-control" value = {{$value->id}}>
                                            <div class="pl-3 col-2">
                                                <input class="ip-address form-control btn btn-primary " type="button" data-target={{$value->id}} value="Delete"/>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="newIp">
                            </div>
                            <div class="form-group row m-1">
                                <div class="col-md-2">
                                    <input class="form-control btn btn-primary add-ip-address" type="button" value="Add"/>

                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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




@endsection

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>

            $(document).ready(function () {
                $(".add-ip-address").on('click', function(){


                    var newDiv = "<div class='form-group row m-1' ><div class='col-md-10'><div class='row pl-3'>"
                    var addIp = "<input type='text' name=admin[ip_address_new][] class = 'form-control col-10' placeholder = 'IP ADDRESS'>"
                    addIp +=  '<div class="pl-3 col-2"> <input class="delete-ip-address form-control btn btn-primary " type="button" value="Delete"/></div>'
                    newDiv += addIp + "</div></div></div>";+
                        $("#newIp").append(newDiv);

                });

                $(document).delegate('.delete-ip-address', 'click', function(){
                    $(this ).parents('.form-group').remove();

                });

                $('.ip-address').click( function(){
                    var  deleteId = $(this).attr("data-target");
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
                                $(this).parents(".form-group").remove();
                                console.log("it Works");
                            }.bind(this)
                        });

                });


            })
        </script>
