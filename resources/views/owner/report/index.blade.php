@extends('layouts.admin')

@section('content')
    <style>
        .badge{
            font-size:100% !important;
        }
    </style>

    <section class="ms-user-account mb-5">
        <div class="container pt-5">
            <div class="page-content pt-5">
              <div class="row">
                  @include("owner/report/reports_sidebar")
                  <div class="col-md-8 col-sm-12 col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Registered Clients</h4>
                          </div>
                          <div class="card-body">
                              <form>
                                  <div class="col-md-12 col-sm-12 col-12 col-lg-12">
                                    <div class="row">
                                          <div class="col-lg-6">
                                              <input class="form-control" type="date" name="from" value="{{$dates["from"]}}"/>
                                          </div>
                                          <div class="col-lg-6">
                                              <input class="form-control " type="date" name="to" value="{{$dates["to"]}}" max="{{date('Y-m-d    ')}}"/>
                                          </div>
                                      </div>
                                      <div class="row mt-4">
                                        <dov class=" col-lg-12 text-right">
                                            <button class="btn btn-primary text-white">Get Report</button>
                                        </dov>
                                      </div>
                                  </div>
                                  </div>
                              </form>
                              <div class="col pt-4 mb-5">
                                  <ul class="list-group">
                                      <li class="list-group-item">
                                      <span>
                                          Clients registered from
                                          <span class="badge badge-info p-2">{{date( "jS F Y", strtotime($dates["from"]))}}</span>
                                              to
                                          <span class="badge badge-info p-2">{{date( "jS F Y", strtotime($dates["to"]))}}</span>

                                      </span>
                                          <span class="badge badge-info float-right p-2"> {{$clients->count()}}</span>
                                      </li>
                                  </ul>
                              </div>

                              <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                <table class="table table-responsive table-hover">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">First Name</th>
                                      <th scope="col">Last Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Verify</th>
                                      <th scope="col">Register At</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    @if (count($users)>0)
                                      @foreach ($users as $key => $value)
                                        <tr>
                                          <th scope="row">{{ $key+1 }}</th>
                                          <td>{{ $value->first_name }}</td>
                                          <td>{{ $value->last_name }}</td>
                                          <td>{{ $value->email }}</td>
                                          <td>@if (empty($value->email_verified_at))
                                            <span class="badge badge-danger"> Not Verified</span>
                                          @else
                                            <span class="badge badge-success"> Verified</span>
                                          @endif</td>
                                          <td>{{ zactra::convertDay($value->created_at )}}</td>
                                        </tr>
                                      @endforeach
                                    @else
                                    @endif

                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </section>

@endsection
