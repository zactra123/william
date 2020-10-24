@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN UPDATE" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        <div class="card">
                            <div class="text-center">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            <div class="row pt-4 m-2">
                                <a class="btn btn-light"  href="{{route('owner.admin.list')}}">Back</a>
                            </div>

                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.admin.update', $admin->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}
                                @method('PUT')
                                @csrf
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[first_name]', $admin->first_name, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[last_name]', $admin->last_name, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::email('admin[email]', $admin->email, ['class' => 'form-control',  'required autocomplete'=>"email"]) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::select('admin[negative_types][]',$negativeType, $admin->adminSpecifications->pluck('id')->all(), ['class' => 'form-control',  'required autocomplete'=>"negative_types", 'multiple' => 'multiple']) }}
                                        </div>
                                    </div>
                                </div>
                                @foreach($admin->ipAddress as $value)
                                <div class="form-group row font justify-content-center" id="delete-{{$value->id}}">
                                    <div class="col-md-12 tab-selector">

                                        <div class="col-sm-10 form-group">
                                            {{ Form::text('admin[ip_address][]', $value->ip_address, ['class' => 'form-control col-10', 'placeholder'=>'IP ADDRESS']) }}
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input class="ip-address form-control btn btn-primary " type="button" data-target={{$value->id}} value="Delete"/>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div id="newIp">
                                </div>
                                <div class="form-group row m-1">
                                    <div class="col-md-2">
                                        <input class="btn btn-block add-ip-address" type="button" value="Add IP"/>

                                    </div>
                                </div>

                                <div class="form-group row mb-0 font">
                                    <div class="col-md-12">
                                        <input type="submit" value="UPDATE" class="ms-ua-submit">
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
            $(".add-ip-address").on('click', function(){


                var newDiv = "<div class='form-group row font justify-content-center' ><div class='col-md-12 tab-selector'><div class='col-sm-10 form-group'>"
                var addIp = "<input type='text' name=admin[ip_address_new][] class = 'form-control ' placeholder = 'IP ADDRESS'></div>"
                addIp +=  '<div class="col-sm-2 form-group"> <input class="delete-ip-address  btn btn-block " type="button" value="Delete"/></div>'
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


@endsection

