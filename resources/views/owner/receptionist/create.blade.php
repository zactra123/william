@extends('layouts.layout')

@section('content')


    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"ADD RECEPTIONIST" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        <div class="card">

                            <div class="row m-2">
                                <a class="btn btn-light"  href="{{route('owner.receptionist.list')}}">Back</a>
                            </div>

                            @foreach ($errors->all() as $error)

                                <div class="alert alert-danger">{{ $error }}</div>

                            @endforeach
                            <div class="card-header">

                            </div>
                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.receptionist.store'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('receptionist[first_name]', old('receptionist.first_name'), ['class' => 'form-control', 'placeholder' =>'FIRST NAME']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('receptionist[last_name]', old('receptionist.last_name'), ['class' => 'form-control', 'placeholder'=>'LAST NAME']) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::email('receptionist[email]', old('receptionist.email'), ['class' => 'form-control','placeholder'=>'E-MAIL',  'required autocomplete'=>"email"]) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">
                                        <div class="col-sm-10 form-group">
                                            {{ Form::text('receptionist[ip_address][]', old('receptionist.ip_address'), ['class' => 'form-control col-10', 'placeholder'=>'IP ADDRESS']) }}
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input class="btn btn-block add-ip-address" type="button" value="Add Ip"/>
                                        </div>
                                    </div>
                                </div>


                                <div id="newIp">
                                </div>

                                <div class="form-group row mb-0 font">
                                    <div class="col-md-12">
                                        <input type="submit" value="ADD" class="ms-ua-submit">

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
                i++
                console.log('dasdasd')
                var newDiv = "<div class='form-group row font justify-content-center' id='delete-"+i+"'>"
                var newDiv = newDiv + "<div class='col-md-12 tab-selector'><div class='col-sm-10 form-group'>"
                var addIp = "<input type='text' name=receptionist[ip_address][] class = 'form-control col-10' placeholder = 'IP ADDRESS'></div>"
                addIp +=  '<div class="col-sm-2 form-group"> <input class="delete-ip-address btn btn-block" type="button" data-target="'+i+'" value="Delete"/></div>'
                newDiv += addIp + "</div></div>";
                    $("#newIp").append(newDiv);

            })

            $(document).delegate('.delete-ip-address', 'click', function(){
                var  deleteId = $(this).attr("data-target")
                console.log(deleteId)
                $( "div" ).remove( '#delete-'+deleteId );

            });

        })


    </script>




@endsection
