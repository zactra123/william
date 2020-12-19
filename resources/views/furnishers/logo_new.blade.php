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

        .box-shadow { box-shadow: 0 .35rem .95rem rgba(0, 0, 0, 1); }

        .card-img-top {
            width: 100%;
            height: 100px;
            object-fit: contain;
        }
        .delete{
            z-index: 10;
            display: inline-block;
            width: 15%;
            cursor: pointer;
            color: red;
            font-size: 16px;
        }

        .banks-card {
            cursor: pointer;
        }
        .bank-name {
            text-overflow: ellipsis;
            overflow: hidden;
            display:inline-block;
            width: 80%;
            height: 1.2em;
            white-space: nowrap;
            cursor: pointer;
        }
        .popover.top{
            width: fit-content;
        }

    </style>

    @include('helpers.breadcrumbs', ['title'=> "FURNISHERS", 'route' => ["Home"=> '/owner',"CLIENTS LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">
                        <div class="col-md-8 pull-left">
                            <a class="btn btn-primary pull-left" href="{{ route('owner.bank.create')}}" role="button">
                                ADD FURNISHERs/CRAs
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
                            <li class="page-item {{empty(request()->character) ? "active":""}}"><a class="btn btn-primary rounded" href="{{ route('owner.bank.show', ['type'=> request()->type])}}">ALL</a></li>
                            <li class="page-item {{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a class="btn btn-primary cicl" href="{{ route('owner.bank.show', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
                            @foreach($alphas as $alpha)
                                <li class="page-item {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a class="btn btn-primary rounded" href="{{ route('owner.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-11">
                        <div class="card">
                                <div class="album py-5 bg-light">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($banksLogos as  $logos)
                                                <div class="col-md-3" title="{{strtoupper($logos->name)}}">
                                                    <div class="card mb-4 box-shadow" >
                                                        @if($logos->checkUrlAttribute())
                                                            <img class="card-img-top banks-card" src="{{$logos->getUrlAttribute()}}"  onclick="location.href='{{route("owner.bank.edit", $logos->id)}}'" alt="Card image cap">
                                                        @else
                                                            <img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  onclick="location.href='{{route("owner.bank.edit", $logos->id)}}'" alt="Card image cap">
                                                        @endif

                                                        <div class="card-body">
                                                            <div class="card-text mt-5">
                                                                <div class="bank-name b"  onclick="location.href='{{route("owner.bank.edit", $logos->id)}}'" > {{strtoupper($logos->name)}}</div>

                                                                <div class="delete text-right" data-toggle="popover" data-placement="top" data-id="{{ $logos->id}}" >
                                                                    <span> <i class="fa fa-trash"></i> </span>
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

    <script type="text/html" id="confirmation">
        <div>
            <button class="cancel btn btn-secondary ">cancel</button>
            <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
        </div>
    </script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                html:true,
                title: "ARE YOU SURE?",
                content: function() {
                    var $this = $(this);
                    return $("#confirmation").html().replace('{bank_id}', $($this).attr('data-id'))
                }
            }).click(function (e) {
                $('[data-toggle=popover]').not(this).popover('hide');
            });

            $(document).click(function (e) {
                if ($('[data-toggle=popover]').has(e.target).length == 0 && (($('.popover').has(e.target).length == 0) || $(e.target).is('.cancel'))) {
                    $('[data-toggle=popover]').popover('hide');
                }
            });

            $(document).on('click',".delete-bank", function (e) {
                var id = $(this).attr('data-id'),
                token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: "/owner/furnishers/logo/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        location.reload();
                    }
                });
            })
        })

    </script>

@endsection


