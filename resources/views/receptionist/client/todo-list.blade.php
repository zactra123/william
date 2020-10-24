    @extends('layouts.layout')

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "TO DO", 'route' => ["Home"=> '/owner',"TO DO LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <form >
                        <div class="row">


                            <div class="col-md-4 form-group">
                                <input type="text" name="title"  class="form-control"  placeholder="TO DO TITLE">
                            </div>

                            <div class="col-md-3 form-group">
                                <div class="form-group">
                                    <select class="form-control" name="admin" id="gender">
                                        <option disabled="disabled" selected="selected">ADMIN</option>
                                        @foreach($admins as $id => $value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                {{--                                                    <input type="text" name="term" value="{{request()->term}}" class="form-control" >--}}
                            </div>
                            <div class="col-md-1 form-group">
                                ASSIGNED
                                <input type="checkbox" name="assign"   placeholder="TO DO TITLE">
                            </div>
                            <div class="col-md-4  form-group">
                                <input type="submit" value="Search" class="form-control">
                            </div>
                        </div>
                    </form>

                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">TO DO LIST</label>
                                </div>



                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">FULL NAME</th>
                                            <th scope="col">Dispute Title</th>
                                            <th scope="col">ASSIGNMENT</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($toDos as $todo)

                                            <tr data-id="{{$todo->id}}">
                                                <th scope="row"></th>
                                                <td><a href="{{route('receptionist.client.profile', $todo->client_id)}}"
                                                       role="button">{{$todo->client->full_name()}}</a></td>
                                                <td>{{$todo->title}}</td>
                                                <td>
                                                    {!! Form::select('todo[user_id]',[""=>""]+$admins,$todo->user_id ,['class'=>'selectize-owner', 'id' => 'select-account']); !!}
                                                </td>

                                                <td>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                                    <button class="btn  delete" data-id="{{ $todo->id}}" ><i class="fa fa-trash"></i> </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $toDos->links() }}

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/todo-list.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">



@endsection
