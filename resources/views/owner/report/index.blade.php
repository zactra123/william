@extends('layouts.layout')

@section('content')
    <style>
        .badge{
            font-size:100% !important;
        }
    </style>
    @include('helpers.breadcrumbs', ['title'=> "REPORT", 'route' => ["Home"=> '/owner',"REPORT" => "#"]])
    <section class="ms-user-account">
        <div class="container pt-5">
            <div class="page-content pt-5">
                <div class="row justify-content-center">
                    @include("owner/report/reports_sidebar")
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <label class="header m-2">Registered Clients</label>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="custom-control custom-control-inline">
                                            <input type="date" name="from" value="{{$dates["from"]}}"/>

                                        </div>
                                        <div class="custom-control custom-control-inline">
                                            <input type="date" name="to" value="{{$dates["to"]}}" max="{{date('Y-m-d    ')}}"/>

                                        </div>
                                        <button class="btn btn-primary">Get Report</button>

                                    </div>
                                </form>
                                <div class="col pt-4">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                        <span>
                                            Clients registered from
                                            <span class="alert-info">{{date( "jS F Y", strtotime($dates["from"]))}}</span>
                                                to
                                            <span class="alert-info">{{date( "jS F Y", strtotime($dates["to"]))}}</span>

                                        </span>
                                            <span class="badge badge-info float-right "> {{$clients->count()}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
