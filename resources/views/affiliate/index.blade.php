@extends('layouts.affiliate')

@section('content')



        <div class="page-content">

            <div class="row mr-0 ml-0">
                <label class="">Client List</label>
                <table class="table">
                    <thead>
                    <tr>

                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as  $client)
                        <tr>

                            <td>{{$client->user->first_name != null ?$client->user->first_name : "-"}}</td>
                            <td>{{$client->user->first_name != null ?$client->user->last_name : "-"}}</td>
                            <td>{{$client->user->email}}</td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('affiliate.addDLSS',  $client->id)}}"
                                   role="button">Add Social Security and Driver License</a>


                                @if(empty($client->user->clientDetails))
                                    <a class="btn btn-secondary" href="{{route('affiliate.addClientDetails', $client->id)}}"
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
                </table>
            </div>
        </div>


@endsection



