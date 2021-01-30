@extends('layouts.layout')


@section('content')
    <style>
        .ms-ua-box {
            background-color: #ffffff !important;
            border-radius: 4px !important;
            padding: 15px;
            box-shadow: 0 0 5px 1px #0000005c;
            opacity: 1;
        }
        .states-box {
            min-height: 50px;
        }

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
        .state-card {
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

        .pagination.custom li > a, span{
            width: fit-content;
            margin: 0;
        }
        @media (min-width: 767px) {
            .pagination.alphabetical li > a, span{
                float: unset;
                margin: 0;
            }
            .pagination.custom li > a, span{
                width: 4%;
                margin: 0;
            }
        }
    </style>
    @include('helpers.breadcrumbs', ['title'=> "STATES INFORMATION", 'route' => ["Home"=> '/owner',"STATES INFORMATION" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 states-box">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">
                            <div class="form-group">
                                <div class="col-md-6" style="margin: 0">
                                {!! Form::select('affiliates', ["" => "SELECT STATE", "judicial" =>"JUDICIAL","non_judicial" =>"NON JUDICIAL", "all" =>"ALL STATES" ], request()->type, ['class'=>'selectize']); !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="album py-5 bg-light">
                <div class="">
                    <div class="row p-2">
                        @foreach($states as $state)
                            <div class="col-md-2" title="{{strtoupper($state->full_name)}}">
                                <div class="card mb-4 box-shadow" >
                                    <img  class="card-img-top state-card w-100" data-id="{{$state->id}}" src=" {{$state->flag()}} " >
                                    <div class="card-body">
                                        <div class="card-text mt-5">
                                            <div class="bank-name b" > {{strtoupper($state->full_name). " (".strtoupper($state->name) . ")"}}</div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="judicialModal" tabindex="-1" role="dialog" aria-labelledby="judicialModalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judicialModalModalLabel">STATE DATES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  ms-user-account">
                    <div id="state-input">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

    <script>
        $(document).ready(function(){
            $('.state-card').click(function(){
                var value = $(this).attr('data-id')
                $.ajax({
                    url: '/admins/furnishers/mortgage/state',
                    type: 'GET',
                    dataType: 'html',
                    data:{id: value} ,
                    success: function(res) {
                        $("#state-input").html(res)
                        $('#judicialModal').modal('show');
                    }
                });
            });

            $('.selectize').selectize({
                delimiter: ',',
                searchField: 'name',
                labelField: 'name',
                valueField: 'id',
                onChange: function(value) {
                    console.log(value)
                    location.href = '/admins/furnishers/judicial/days?type='+ value
                }
            });

        });

    </script>



@endsection



