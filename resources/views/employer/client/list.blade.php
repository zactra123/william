@extends('owner.layouts.app')
@section('title')
<title> Clients </title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Clients List</li>
            </ol>
          </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          User List
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">FULL NAME</th>
              <th scope="col">AFFILIATE NAME</th>
              <th scope="col">EMAIL</th>
            </tr>
            </thead>
            <tbody>
              @foreach($users as $key=> $user)
                  <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>
                        <a href="{{route('adminRec.client.profile', $user->id)}}" role="button">
                          {{$user->full_name}}
                        </a>
                      </td>
                      <td>{{$user->affiliate_name??'-'}}</td>
                      <td>{{$user->email}}</td>
                      {{-- <td>{{$user->full_name?? "-"}}</td> --}}
                  </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row float-right pull-right">
            <div class="col-md-12 float-right pull-right">
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
