@extends('owner.layouts.app')

@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('owner.admin.index') }}">Admins</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
    </div>
  </div>
  <div class="container">
    <div class="row row-sm">
      <div class="col-md-12">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Your Reports
            </div>
            <p class="mg-b-20">Generate Your website Report here...</p>
            <div class="text-wrap">
              <div class="example">
                <div class="panel panel-primary tabs-style-2">
                  <div class=" tab-menu-heading">
                    <div class="tabs-menu1 ">
                      <!-- Tabs -->

                      {{-- @include("owner/report/reports_sidebar") --}}

                      <ul class="nav panel-tabs main-nav-line">
                        <li><a href="{{ route('owner.reports.index')}}" class="nav-link fs-12 active" data-toggle="tab"> <i class="fa fa-user-md"></i> REGISTERED CLIENTS</a></li>
                        <li><a href="#" class="nav-link fs-12"><i class="fa fa-credit-card" aria-hidden="true"></i> <span class="ml-1">TOTAL PAYMENTS COLLECTED</span></a></li>
                        <li><a href="#" class="nav-link fs-12"><i class="fa fa-money" aria-hidden="true"></i><span class="ml-1">CURRENT PAYMENTS DUE</span></a></li>
                        <li><a href="#" class="nav-link fs-12"><i class="fa fa-calendar" aria-hidden="true"></i><span class="ml-1">OVER DUE PAYMENTS</span></a></li>
                        <li><a href="#" class="nav-link fs-12"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="ml-1">TOTAL ITEMS REMOVED</span></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="panel-body tabs-menu-body main-content-body-right">
                    <div class="tab-content">
                      <div class="tab-pane active">


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
                                  <div class="table-responsive">

                                      <table class="table text-md-nowrap">
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

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
