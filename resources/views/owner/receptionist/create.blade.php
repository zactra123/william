@extends('layouts.owner')

@section('content')
    <style>
        .form-control{
            border: 2px solid #0c71c3;
            border-radius: 10px;
        }



    </style>


    <div class="container">
        <div class="row m-2">
          <a class="btn btn-success"  href="{{route('owner.receptionist.list')}}">Back</a>
        </div>

        @foreach ($errors->all() as $error)

            <div class="alert alert-danger">{{ $error }}</div>

        @endforeach

        <div class="row justify-content-center">
            <div class="col-6">

                <div class="card">
                    <div class="card-header">
                        <div class="head m-2">Create Receptionist</div>

                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['owner.receptionist.store'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}
                        <div class="form-group row m-1">
                            {{ Form::text('receptionist[first_name]', old('receptionist.first_name'), ['class' => 'form-control', 'placeholder' =>'FIRST NAME']) }}
                        </div>
                        <div class="form-group row m-1">
                            {{ Form::text('receptionist[last_name]', old('receptionist.last_name'), ['class' => 'form-control', 'placeholder'=>'LAST NAME']) }}
                        </div>


                        <div class="form-group row m-1">
                            {{ Form::email('receptionist[email]', old('receptionist.email'), ['class' => 'form-control','placeholder'=>'E-MAIL',  'required autocomplete'=>"email"]) }}

                        </div>
                        <div class="form-group row m-1">
                            {{ Form::text('receptionist[ip_address][]', old('receptionist.ip_address'), ['class' => 'form-control col-10', 'placeholder'=>'IP ADDRESS']) }}
                            <input class="form-control btn btn-primary  col-2 add-ip-address" type="button" value="Add"/>
                        </div>

                        <div id="newIp">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>


                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>

    </div>




@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        var i=0;

        $(".add-ip-address").on('click', function(){
            i++
            console.log('dasdasd')
            var newDiv = "<div class='form-group row m-1' id='delete-"+i+"'>"
            var addIp = "<input type='text' name=receptionist[ip_address][] class = 'form-control col-10' placeholder = 'IP ADDRESS'>"
            addIp +=  ' <input class="delete-ip-address form-control btn btn-primary col-2" type="button" data-target="'+i+'" value="Delete"/>'
            newDiv += addIp + "</div>";+
                $("#newIp").append(newDiv);

        })

        $(document).delegate('.delete-ip-address', 'click', function(){
            var  deleteId = $(this).attr("data-target")
            console.log(deleteId)
            $( "div" ).remove( '#delete-'+deleteId );

        });

    })


</script>

