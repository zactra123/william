@extends('layouts.admin')

@section('content')

    <div class="page-content pt-4">
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <aside class="sidebar col-md-3 p-0">
                        <div class="card ">
                            <div class="card-body">
                                <div>
                                    <div class="pb-1">
                                        <a href="#" class="btn"> View my message</a>
                                    </div>
                                    <div class="pb-1">
                                        <a href="#" class="btn"> Pending  message</a>
                                    </div>
                                    <div class="pb-1">

                                    </div>


                                    <div class="pb-1">
                                        <a href="#" class="btn"> Write new message</a>                                        <form method="POST" action="{{ route('admin.message.store') }}">
                                            @csrf
                                            <div class="form-group row m-1">
                                                <input id="first_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" placeholder="First and Last name">
                                            </div>
                                            <div class="form-group row m-1">
                                                <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone number">
                                            </div>

                                            <div class="form-group row m-1">

                                                <input placeholder="Call date" name = 'call_date' class="form-control" type="text" id="date">
                                            </div>

                                            <div class="form-group row m-1">

                                                <textarea name="question" id=""></textarea>

                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-9 offset-md-5">
                                                    <button type="submit" class="btn btn-primary">
                                                        Add message
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="btn-group float-right">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </aside>
                    <div class="col-md-9">
                        <div class="card vh-100">

                            <div class="card-body">
                                <div class="row h-70 border border-primary rounded">
                                    <div class="col-md-12 border border-primary rounded">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone number</th>
                                                <th scope="col">Call date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($messages as $message)
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td>{{$message->name}}</td>
                                                    <td>{{$message->phone_number}}</td>
                                                    <td>{{$message->call_date}}</td>
                                                    <td>{{$message->completed==0?'Pending':'Completed'}}</td>
                                                    <td>
                                                        <a class="btn btn-secondary" href="{{ route('admin.message.show',$message->id)}}"
                                                           role="button"><span class="fa fa-file"></span></a>

                                                        @if(auth()->user()->id == $message->user_id)
                                                            <a class="btn btn-secondary" href="{{ route('admin.message.edit',$message->id)}}"
                                                               role="button"><span class="fa fa-pencil"></span></a>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                            {{ $messages->links() }}
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <div class="row h-25 border border-primary rounded">
                                    <div class="col-md-12 border border-primary rounded">


                                    </div>

                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

</script>
<script type="text/javascript">



    $(document).ready(function(){

        $('#date').focus(function () {

            this.type='date';
        });
        $('#date').click(function () {
            this.type='date';
        })  ;
        $('#date').blur(function () {
            if(this.value==''){this.type='text'};
        });

        $('#phone_number').keyup(function() {

            var val = this.value.replace(/\D/g, '');
            var newVal = '';
            if(val.length > 4) {
                this.value = val;
            }

            if((val.length > 3) && (val.length <7)) {
                newVal += val.substr(0, 3) + '-';
                val = val.substr(3);
            }
            if (val.length > 6) {
                newVal += val.substr(0, 3) + '-';
                newVal += val.substr(3, 3) + '-';
                val = val.substr(6);
            }
            newVal += val;
            this.value = newVal.substring(0, 12);
        });



    })




</script>