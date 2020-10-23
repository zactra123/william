<div class="card-body">

    {!! Form::open(['route' => ['admin.client.todoUpdate', $toDo->id], 'method' => 'POST', 'id' => 'toDoUpdate',  'class' => 'm-form m-form--label-align-right']) !!}
    @method('PUT')

    @csrf
    <div class="form-group row m-1">

        <div class="col-md-11">
            {{ Form::text('todo[title]', $toDo->title??'', ['class' => 'form-control m-input', 'placeholder' => '']) }}

        </div>
    </div>
    <div class="form-group row m-1">
        <div class="col-md-11">
            {{ Form::textarea('todo[description]', $toDo->description??'', ['class' => 'form-control m-input', 'placeholder' => 'Last name']) }}
        </div>
    </div>

    <div class="form-group row m-1">
        <div class="col-md-11">
            {!! Form::select('todo[user_id]',$admins, $toDo->user_id ,['class'=>'form-account-name', 'id' => 'select-account']); !!}
        </div>
    </div>

    <div class="form-group row m-1">
        <label for="status" class="col-md-2 col-form-label text-md-center">  STATUS:  </label>
        <div class="col-md-12">
            <label for="male" class="col-md-2 col-form-label">  ACTIVE:  </label>
            <label for="Sex" class="col-md-1 m-1 col-form-label ">
                {{Form::radio('todo[status]', 0, $toDo->status == 0)}}
            </label>

            <label for="female" class="col-md-3 col-form-label text-md-right">  PENDING:  </label>
            <label for="Sex" class="col-md-1 col-form-label m-1 ">
                {{Form::radio('todo[status]', 1, $toDo->status == 1)}}
            </label>
            <label for="other" class="col-md-3 col-form-label text-md-center">  COMPLETED:  </label>
            <label for="Sex" class="col-md-1 col-form-label m-1 ">
                {{Form::radio('todo[status]', 2, $toDo->status == 2)}}
            </label>
        </div>
    </div>

    @foreach($toDo->disputes as $dispute)


        <div class="form-group row m-1">

            <div class="form-group row m-1">

                <div class="col-md-11">

                    <?php $info =  $dispute->disputable->showDetails();?>

                    {{$info}}
                    <input type="hidden" name="dispute[{{$dispute->id}}][id]" value="{{ $dispute->id }}">


                </div>
            </div>


            <div class="form-group row m-1">

            <label for="gender" class="col-md-2 col-form-label text-md-center">  STATUS:  </label>
            <div class="col-md-12">
                <label for="male" class="col-md-2 col-form-label">  ACTIVE:  </label>
                <label for="Sex" class="col-md-1 m-1 col-form-label ">
                    {{Form::radio('dispute['.$dispute->id.'][status]', 0, $dispute->status == 0)}}
                </label>

                <label for="female" class="col-md-3 col-form-label text-md-right">  PENDING:  </label>
                <label for="Sex" class="col-md-1 col-form-label m-1 ">
                    {{Form::radio('dispute['.$dispute->id.'][status]', 1, $dispute->status??''== 1)}}
                </label>
                <label for="other" class="col-md-3 col-form-label text-md-center">  COMPLETED:  </label>
                <label for="Sex" class="col-md-1 col-form-label m-1 ">
                    {{Form::radio('dispute['.$dispute->id.'][status]', 2, $dispute->status??''== 2)}}
                </label>
            </div>
        </div>
        </div>


    @endforeach


    <div class="form-group row mb-0 font">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<script>
$('#select-account').selectize({    searchField: 'full_name',
    labelField: 'full_name',
    valueField: 'id'})
</script>
