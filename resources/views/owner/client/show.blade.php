@extends('layouts.owner')

@section('content')
    <div class="page-content pt-4">
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <aside class="sidebar col-md-3 p-0">
                        <div class="card ">
                            <div class="card-body">
                                <div>
                                    <div class="pb-1">
                                        <input class="form-control border-primary" value="{{$client->full_name()}}" type="text" placeholder="Client Name" readonly>
                                    </div>
                                    <div class="pb-1">
                                        <input class="form-control border-primary" value="{{$client->email}}" type="text" placeholder="Client Email" readonly>
                                    </div>
                                    <div class="pb-1">
                                        <input class="form-control border-primary" value="{{$client->clientDetails->phone_number}}" type="text" placeholder="Client Phone Number" readonly>
                                    </div>
                                    <div class="pb-1">
                                        <input class="form-control border-primary" value="{{$client->clientDetails->address}}" type="text" placeholder="Client Address" readonly>
                                    </div>
                                    <div class="pb-1">
                                        <input class="form-control border-primary" value="{{$client->clientDetails->ssn}}" type="text" placeholder="Client Name" readonly>
                                    </div>
                                    <div class="pb-1">
                                        <input class="form-control border-primary" value="{{date("jS F Y",strtotime($client->clientDetails->dob))}}" type="text" placeholder="Client Name" readonly>
                                    </div>
                                    <div class="btn-group float-right">
                                        <button class="btn btn-primary ">Print</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </aside>
                    <div class="col-md-9">
                        <div class="card vh-100">
                            <div class="card-body">
                                <div class="row h-75 border border-primary rounded">
                                    <div class="col-md-9 border border-primary rounded"></div>
                                    <div class="col-md-3 border border-primary rounded"></div>
                                </div>
                                <div class="row h-25 border border-primary rounded">
                                    <div class="col-md-9 border border-primary rounded"></div>
                                    <div class="col-md-3 border border-primary rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
