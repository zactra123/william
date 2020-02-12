@extends('layouts.admin')

@section('content')
    <style>
        .pagination{
            justify-content: center;
        }
    </style>
    <div class="page-content pt-4">
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <aside class="sidebar col-md-3 p-0">
                        <div class="card ">
                            <div class="card-body">
                                <div>
                                    <div class="pb-1">
                                        <span  class="btn text-primary"> Write new message</span>
                                        <form method="POST" action="{{ route('admin.message.store') }}">
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
                        <div class="card ">

                            <div class="card-body">
                                <div class="row h-100  ">
                                    <div class="col-md-12 ">
                                        <div class="row p-2 ">
                                            <div class="list-group list-group-horizontal col-md-6">
                                                <a class="list-group-item list-group-item-action p-1 tab-selector active" href="{{route("admin.message.index")}}" >All Messages</a>
                                                <a class="list-group-item list-group-item-action p-1 tab-selector pending" href="{{route("admin.message.index", ["type" => "pending"])}}">Pending</a>
                                                <a class="list-group-item list-group-item-action p-1 tab-selector completed" href="{{route("admin.message.index", ["type" => "completed"])}}">Completed</a>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="row float-right">
                                                    <form class="form-inline">
                                                        <div class="form-group  row m-1">
                                                            <input id ='search' name="term" class="form-control" type="text">
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
                                                    <td>

                                                        @if($message->completed == 0)
                                                            <button class="btn btn-success" id = "message-completed"
                                                                    data-target ={{$message->id}}>
                                                                <span class="fa fa-check"></span>
                                                            </button>
                                                            <meta name="csrf-token" compelted-token="{{ csrf_token() }}">
                                                        @endif

                                                        <button class="btn btn-secondary modalViewMessage"
                                                                data-toggle="modal" role="button"
                                                                data-target ={{$message->id}} >
                                                            <span class="fa fa-file"></span>
                                                        </button>


                                                        <button class="btn btn-secondary modalAddNote"
                                                                data-toggle="modal" role="button"
                                                                data-target ={{$message->id}}>
                                                            <span class="fa fa-pencil"></span>
                                                        </button>

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $messages->links( ) }}
                                    </div>

                                </div>


                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="favoritesModalLabel">Message details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Close</span> </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNotes" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="favoritesModalLabel">Add note</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Close</span> </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.message.note') }}">
                        @csrf

                        <div class="message_id">
                            <input type="hidden" name="message_id" id="messageId" >

                        </div>

                        <div class="form-group row m-1">

                            <textarea name="notes" id=""></textarea>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Add note
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        var url = $(location).attr('search');
        if(url.search("pending")== 6){
            $('.tab-selector').removeClass("active");
            $(".pending" ).addClass("active");
        }else if (url.search("completed")== 6){
            $('.tab-selector').removeClass("active");
            $(".completed" ).addClass("active");
        }else if(url.search("term")== 1){
            var res = url.replace("?term=",'');
            $('.tab-selector').removeClass("active");
            $('#search').val(res);
        };


        $('#message-completed').click(function(){
            var  id = $(this).attr("data-target")
            var token = $("meta[name='csrf-token']").attr("compelted-token");

            bootbox.confirm("Do you want to complete this message?", function (result) {
                console.log(result);
                if (result) {

                    $.ajax({
                        url: "message/completed",
                        method:"POST",
                        data:{id:id, _token: token},
                        success: function () {
                            console.log("it Works");
                            location.reload()
                        },

                        error:function (err,state) {
                            console.log(err)
                        }
                    });
                }
            })
        });

        $('.modalViewMessage').click(function(){
            var  id = $(this).attr("data-target")
            $.ajax({
                url: "message/"+id,
                method:"GET",
                data:{id:id, },
                success:function (results) {
                    let result=JSON.parse(results);
                    if(result.success){

                        html='<div class="form-group row">';

                        for( let val in result.data){
                            if(val == 'message'){
                                html+= '<label class="col-md-12 col-form-label" >'+
                                    result.data[val]['phone_number']+'</lable>';
                                html+= '<label class="col-md-12 col-form-label" >'+
                                    result.data[val]['name']+'</lable>';
                                html+= '<label class="col-md-12 col-form-label" >'+
                                    result.data[val]['question']+'</lable>';
                            }else if (val == 'notes' && result.data[val]!= '') {
                                html += '<table class="table table-hover"> <thead> <tr> <th >#</th><th >date</th>' +
                                    '<th>Note</th> </tr> </thead> <tbody><tr> ';

                                for( let value in result.data[val]){
                                    html +='<th scope="row"></th><td>'+ result.data[val][value]['created_at'] +
                                        '</td><td>'+ result.data[val][value]['notes']+'</td></tr>'

                                }

                                html+= '</tbody> </table>'
                            }
                            console.log('erevi chishta');
                            html+= '</div>';
                            $("#favoritesModal .modal-body").html(html)
                            $('#favoritesModal').modal('show');

                        }

                    }

                },

                error:function (err,state) {
                    console.log(err)
                }
            });

        })

        $('.modalAddNote').click(function(){
            var  id = $(this).attr("data-target")

            $('#messageId').val(id);
            $('#addNotes').modal('show');

        })


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

        $('#addNotes').on('hidden.bs.modal', function () {
            $('#addNotes textarea').val("");
        })
    })

</script>


