@extends('layouts.layout')

@section('content')


    @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN CREATE" => "#"]])

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
                            <div class="row " style="margin: 10px">
                                <a class="btn btn-success"  href="{{route('owner.admin.list')}}">Back</a>
                            </div>
                            <div class="card-body ">
                                {!! Form::open(['route' => ['owner.admin.store'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[first_name]', old('admin.first_name'), ['class' => 'form-control', 'placeholder' =>'FIRST NAME']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12" class="col-md-12 ">
                                            {{ Form::text('admin[last_name]', old('admin.last_name'), ['class' => 'form-control', 'placeholder'=>'LAST NAME']) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row font justify-content-center">

                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::email('admin[email]', old('admin.email'), ['class' => 'form-control','placeholder'=>'E-MAIL',  'required autocomplete'=>"email"]) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">

                                        <div class="col-md-12">
                                            {{ Form::select('admin[negative_types][]',$negativeType, old('admin.negative_types'), ['class' => 'form-control',  'required autocomplete'=>"negative_types", 'multiple' => 'multiple']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row font justify-content-center">
                                    <div class="col-md-12 tab-selector">
                                        <div class="col-sm-10 form-group">
                                            {{ Form::text('admin[ip_address][]', old('admin.ip_address'), ['class' => 'form-control', 'placeholder'=>'IP ADDRESS']) }}
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input class="btn btn-primary add-ip-address" type="button" value="Add"/>
                                        </div>
                                    </div>
                                </div>


                                    <div id="newIp">
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

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script>

        $(document).ready(function () {
            var i=0;

            $(".add-ip-address").on('click', function(){
                i++
                console.log('dasdasd')
                var newDiv = "<div class='form-group row font justify-content-center' id='delete-"+i+"'>"
                var newDiv = newDiv + "<div class='col-md-12 tab-selector'><div class='col-sm-10 form-group'>"
                var addIp = "<input type='text' name=admin[ip_address][] class = 'form-control col-10' placeholder = 'IP ADDRESS'> </div>"
                addIp +=  '<div class="col-sm-2 form-group"> <input class="delete-ip-address btn btn-primary" type="button" data-target="'+i+'" value="Delete"/></div>'
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


