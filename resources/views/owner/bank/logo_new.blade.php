@extends('layouts.layout')

@section('content')
    <style>
        :root {
            --jumbotron-padding-y: 3rem;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }
        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .5); }

        .card-img-top {
            width: 100%;
            height: 100px;
            object-fit: contain;
        }
        .delete{
            z-index: 10;
        }

    </style>

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
                        <?php $alphas = range('A', 'Z');?>
                        <ul class="pagination">
                            <li class="page-item {{empty(request()->character) ? "active":""}}"><a class="btn btn-primary rounded" href="{{ route('owner.bank.show')}}">ALL</a></li>
                            <li class="page-item {{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a class="btn btn-primary cicl" href="{{ route('owner.bank.show', ['character' => "#"])}}">#</a></li>
                            @foreach($alphas as $alpha)
                                <li class="page-item {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a class="btn btn-primary rounded" href="{{ route('owner.bank.show', ['character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-11">
                        <div class="card">
                                <div class="album py-5 bg-light">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($banksLogos as  $logos)
                                                <div class="col-md-3" onclick="location.href='{{route("owner.bank.edit", $logos->id)}}'">
                                                    <div class="card mb-4 box-shadow">
                                                        <img class="card-img-top" src="{{asset($logos->path)}}"  alt="Card image cap">
                                                        <div class="card-body">
                                                            <p class="card-text text-center">{{strtoupper($logos->name)}}</p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-outline-danger border-0 delete" data-id="{{ $logos->id}}" ><i class="fa fa-trash"></i> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            {{ $banksLogos->appends(request()->except('page'))->links() }}
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
                e.stopPropagation()
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
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



