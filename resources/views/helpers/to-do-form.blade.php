<div class="card-body">
    {!! Form::open(['route' => ['adminRec.client.todoUpdate', $toDo->id], 'method' => 'POST', 'id' => 'toDoUpdate', 'class' => 'm-form m-form--label-align-right']) !!} @method('PUT') @csrf
    <div class="form-group row m-1 mt-2">
        <div class="col-md-11">
            {{ Form::text('todo[title]', $toDo->title??'', ['class' => 'form-control m-input', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="form-group row m-1 mt-2">
        <div class="col-md-11">
            {{ Form::textarea('todo[description]', $toDo->description??'', ['class' => 'form-control m-input', 'placeholder' => 'To Do Description']) }}
        </div>
    </div>

    <div class="form-group row m-1 mt-2">
        <div class="col-md-11">
            {!! Form::select('todo[user_id]',$admins, $toDo->user_id ,['class'=>'form-account-name ', 'id' => 'select-account']); !!}
        </div>
    </div>
    <div class="mt20"></div>

    <div class="form-group row m-1">
        <label for="status" class="col-md-2 col-form-label text-md-center"> Status: </label>
        <div class="col-md-10">
            @if($toDo->status == 0)
            <label for="male" class="col-md-2 col-form-label"> Active: </label>
            <label for="Sex" class="col-md-1 col-form-label">
                {{Form::radio('todo[status]', 0, $toDo->status == 0)}}
            </label>
            @elseif($toDo->status == 1)

            <label for="female" class="col-md-3 col-form-label text-md-right"> Pending: </label>
            <label for="Sex" class="col-md-1 col-form-label m-1">
                {{Form::radio('todo[status]', 1, $toDo->status == 1)}}
            </label>
            @elseif($toDo->status == 2)
            <label for="other" class="col-md-3 col-form-label text-md-center"> Completed: </label>
            <label for="Sex" class="col-md-1 col-form-label m-1">
                {{Form::radio('todo[status]', 2, $toDo->status == 2)}}
            </label>
            @endif
        </div>
    </div>
    <div class="mt20"></div>
    
    @foreach($toDo->disputes as $dispute)

    <div class="form-group row m-1">
        <div class="form-group row m-1">
            <div class="col-md-10">
                <?php $info =  $dispute->disputable->showDetails();?> {{$info}}
                <input type="hidden" name="dispute[{{$dispute->id}}][id]" value="{{ $dispute->id }}" />
            </div>
            @if(auth()->user()->role== 'receptionist')
            <div class="col-md-2">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <div class="btn delete" data-id="{{ $dispute->id}}"><i class="fa fa-trash"></i></div>
            </div>
            @endif
        </div>
        <div class="form-group row m-1">
            <div class="col-md-12">
                <label for="male" class="col-md-2 col-form-label"> Active: </label>
                <label for="Sex" class="col-md-1 m-1 col-form-label">
                    {{Form::radio('dispute['.$dispute->id.'][status]', 0, $dispute->status == 0)}}
                </label>

                <label for="female" class="col-md-3 col-form-label text-md-right"> Pending: </label>
                <label for="Sex" class="col-md-1 col-form-label m-1">
                    {{Form::radio('dispute['.$dispute->id.'][status]', 1, $dispute->status == 1)}}
                </label>
                <label for="other" class="col-md-3 col-form-label text-md-center"> Completed: </label>
                <label for="Sex" class="col-md-1 col-form-label m-1">
                    {{Form::radio('dispute['.$dispute->id.'][status]', 2, $dispute->status == 2)}}
                </label>
            </div>
        </div>
    </div>

    <div class="mt20"></div>

    @endforeach

    <div class="form-group row mb-0 font">
        <div class="col-md-12 text-right">
            <input type="submit" value="Update" class="ms-ua-submit btn btn-primary" />
        </div>
    </div>
    {!! Form::close() !!}
</div>

<script>
    $("#select-account").selectize();
</script>
<script>
    $(document).ready(function () {
        $(document).delegate(".delete", "click", function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            bootbox.confirm({
                title: "Destroy To Do?",
                message: "Do you really want to delete record?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel',
                        className: "btn-success",
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm',
                        className: "btn-danger",
                    },
                },
                callback: function (result) {
                    console.log("This was logged in the callback: " + result);
                    if (result) {
                        $.ajax({
                            url: "/receptionist/dispute/" + id,
                            type: "DELETE",
                            data: {
                                id: id,
                                _token: token,
                            },
                            success: function () {
                                console.log("it Works");
                            },
                        });
                    }
                },
            });
        });
    });
</script>
