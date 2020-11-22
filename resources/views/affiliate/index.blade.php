@extends('layouts.layout')

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> Affiliate </h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Affiliate</span>
        </div>
    </section>

    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="page-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 pt-4">
                        <div class="card">

                            <div class="card-header">
                                <label class="header m-2">Clients List</label>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th scope="col">FULL NAME</th>
                                        <th scope="col">Email</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as  $client)
                                        <tr>

                                            <td>{{$client->user->full_name() != null ? $client->user->full_name() : "-"}}</td>
                                            <td>{{$client->user->email}}</td>
                                            <td>

                                                <a class="btn" href="{{route('client.addDriverSocial',   ['client'=> $client->user->id])}}"
                                                   role="button">Add SS & DL (or ID)</a>
                                                @if(empty($client->user->clientDetails))
                                                    <a class="btn" href="{{route('affiliate.addClientDetails', ['client'=> $client->id])}}"
                                                       role="button">Add Client Details</a>
                                                @else
                                                    <a class="btn btn-secondary" href="{{route('affiliate.editClientDetails', $client->id)}}"
                                                       role="button">Edit Client Details</a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>




            </div>

        </div>
    </section>





@endsection



