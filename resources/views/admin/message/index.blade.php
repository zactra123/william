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
                                        <span  class="btn text-primary"> Write new message</span>                                        <form method="POST" action="{{ route('admin.message.store') }}">
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
                                <div class="row h-75 border border-primary ">
                                    <div class="col-md-12 border border-primary ">
                                        <div class="row p-2 ">
                                            <div class="list-group list-group-horizontal col-md-6">
                                                {{--@Todo: append active class to the filter that is used--}}
                                                <a class="list-group-item list-group-item-action p-1 active" href="{{route("admin.message.index")}}" >All Messages</a>
                                                <a class="list-group-item list-group-item-action p-1"  href="{{route("admin.message.index", ["type" => "pending"])}}">Pending</a>
                                                <a class="list-group-item list-group-item-action p-1"  href="{{route("admin.message.index", ["type" => "completed"])}}">Completed</a>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="row float-right">
                                                    <form class="form-inline">
                                                        <div class="form-group  row m-1">
                                                            {{--@Todo: Set up searched value --}}
                                                            <input  name="term" class="form-control" type="text">
                                                        </div>
                                                        <button class="btn btn-primary"><i class="fa fa-search">  </i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone number</th>
                                                <th scope="col">Call date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--@Todo: on click to table row expect buttons get message history with ajax and show in the bottom--}}
                                            @foreach($messages as $message)
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td>{{$message->name}}</td>
                                                    <td>{{$message->phone_number}}</td>
                                                    <td>{{$message->call_date}}</td>
                                                    <td>{{$message->completed==0?'Pending':'Completed'}}</td>
                                                    <td>{{date("g:ia jS F Y",strtotime($message->created_at))}}</td>
                                                    <td>
                                                        {{--@Todo: show only when message is not completed --}}
                                                        {{--@Todo: on click make te message completed --}}
                                                        <a class="btn btn-success" href="{{ route('admin.message.show',$message->id)}}"
                                                           role="button"><span class="fa fa-check"></span></a>

                                                        <button class="btn btn-secondary" data-toggle="modal"
                                                                data-target="#favoritesModal"
                                                           role="button"><span class="fa fa-pencil"></span></button>

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
{{--    @Todo: add notes for message--}}
    <div class="modal fade" id="favoritesModal"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="favoritesModalLabel">The Sun Also Rises</h4>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>
                        Please confirm you would like to add
                        <b><span id="fav-title">The Sun Also Rises</span></b>
                        to your favorites list.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">Cancel</button>
                    <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add a Note
          </button>
        </span>
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