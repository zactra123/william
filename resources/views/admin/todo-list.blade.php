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
                                            <th scope="col">Title NAME</th>
                                            <th scope="col">GO TO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($toDos as $todo)

                                            <tr>
                                                <th scope="row"></th>
                                                <td>{{$todo->client->full_name()}}</td>
                                                <td>{{$todo->title}}</td>

                                                <td>
                                                    <a href="{{route('admin.client.profile', $todo->client_id)}}"
                                                       role="button"><span class="fa fa-file-text"></span></a>
                                                </td>
                                                <td>
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

@endsection
