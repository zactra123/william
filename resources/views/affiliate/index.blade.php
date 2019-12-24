@extends('layouts.affiliate')

@section('content')



        <div class="row justify-content-center">

            <div class="row">
                <label class="">Cilient List</label>
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
                            <td>{{$client->user->first_name != null ?$client->user->first_name : "-"}}</td>
                            <td>{{$client->user->email}}</td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('affiliate.addClientDetails',  $client->id)}}"
                                   role="button">Add Social Security and Driver License</a>

                                @if($client->user->first_name != null)
                                    <a class="btn btn-secondary" href="{{route('affiliate.editClientDetails', $client->id)}}"
                                       role="button">Edit Social Security and Driver License</a>
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



