@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "BANK LOG", 'route' => ["Home"=> '/owner',"CLIENTS LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">
                        <div class="col-md-8 pull-left">
                            <a class="btn btn-primary pull-left" href="{{ route('owner.bank.create')}}" role="button">
                                ADD BANK
                            </a>
                        </div>
                        <div class="col-md-4 pull-right">
                            <form >
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <input type="text" name="term" value="{{request()->term}}" class="form-control" >
                                    </div>
                                    <div class="col-md-4  form-group">
                                        <input type="submit" value="Search" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="ms-ua-box">
                        <div class="col-md-11">

                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">BANK LIST</label>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">BANK LOGO</th>
                                            <th scope="col">BANK NAME</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($banksLogos as  $logos)

                                            <tr>
                                                <th scope="row">{{ (($banksLogos->currentPage() - 1 ) * $banksLogos->perPage() ) + $loop->iteration }}</th>
                                                <td><img src="{{asset($logos->path)}}" width="100px"></td>
                                                <td>{{strtoupper($logos->name)}}</td>
                                                <td>

                                                    <a  href ="{{route("owner.bank.edit", $logos->id)}}" class="btn btn-primary" data-id="{{ $logos->id}}" ><i class="fa fa-edit"></i> </a>

                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                                    <button class="btn btn-danger delete" data-id="{{ $logos->id}}" ><i class="fa fa-trash"></i> </button>


                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $banksLogos->appends(request()->except('page'))->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $(".delete").on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                console.log("test");
                bootbox.confirm("Do you really want to delete record?", function (result) {
                    console.log(result);
                    if (result) {

                        $.ajax(
                            {
                                url: "/owner/bank/logo/" + id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": token,
                                },
                                success: function () {
                                    location.reload();
                                }
                            });
                    }
                })

            })
        })

    </script>

@endsection



