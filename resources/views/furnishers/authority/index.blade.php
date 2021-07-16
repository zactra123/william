@extends('owner.layouts.app')
@section('title')
<title> Authority </title>
@endsection
@section('body')

  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Authority</li>
            </ol>
          </nav>
    </div>
    <div class="">
      <a class="btn btn-primary pull-left" href="{{ route('admins.authority.create')}}" role="button">
          ADD AUTHORITY
      </a>
    </div>
  </div>

  <div class="container">
    <div class="row row-sm">
      <div class="col-md-12">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Authorities
            </div>
            <p class="mg-b-20">See list of authorities here ...</p>
              <section class="ms-user-account">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-3 col-sm-12"></div>
                          <div class="col-md-12 col-sm-12">

                              <div class="container">
                                <div class="row">
                                    <div class="col-md-12">


                                      <?php $alphas = range('A', 'Z');?>
                                      <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                          <li class="page-item {{empty(request()->character) ? "active":""}}"><a class="page-link" href="{{ route('admins.authority.index', ['type'=> request()->type])}}">ALL</a></li>
                                          <li class="page-item {{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a class="page-link" href="{{ route('admins.authority.index', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
                                          @foreach($alphas as $alpha)
                                          <li class="page-item {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a class="page-link" href="{{ route('admins.authority.index', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                                          @endforeach
                                        </ul>
                                      </nav>
                                    </div>

                                </div>
                                <div class="row page-navigation-container mr-3">
                                    <div class="col-md-5">

                                    </div>
                                    <div class="col-md-7 p-0">
                                        <div class="row">
                                          <div class="col-md-3">

                                          </div>
                                          <div class="col-md-6 p-1">
                                              <input class="form-control go-to-page" type="text" id="" name="page_number" placeholder="PAGE #">
                                          </div>
                                          <div class="col-md-3 p-1 pl-2">
                                              <button class="form-control btn btn-primary go-to" id="">GO TO</button>
                                          </div>
                                        </div>

                                    </div>
                                </div>
                              </div>


                              <div class="album py-5">
                                  <div class="container">
                                      <div class="row">
                                        @foreach($authorities  as $authority)
                                            <div class="col-md-3" title="{{strtoupper($authority->name)}}">
                                                <div class="card mb-4 pt-5" >

                                                    @php
                                                      $authorityimg = $authority->path;
                                                      $findfile = public_path('/images/'.$authorityimg);
                                                    @endphp
                                                    @if (isset($authority->path))

                                                         @if (file_exists($findfile))
                                                           @if (!empty($authority->path))
                                                             <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{ url('/') }}/images/{{ $authorityimg }}" alt="Card image cap"></a>
                                                           @else
                                                             <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" alt="Card image cap"></a>
                                                           @endif
                                                         @else
                                                               <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" alt="Card image cap"></a>
                                                           @endif

                                                         @else
                                                                 <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" alt="Card image cap"></a>
                                                      @endif
                                                    <div class="card-body">
                                                        <div class="card-text mt-5">
                                                            <div class="bank-name b"  onclick="location.href='{{route("admins.authority.edit", $authority->id)}}'" > {{strtoupper($authority->name)}}</div>
                                                            <a href="{{ route('admin.delete.authority',$authority->id) }}"><div class="delete2 text-right" onclick="return confirm('Are You Sure?')" data-toggle="popover" data-placement="top" data-id="{{ $authority->id}}" >
                                                                <span> <i class="fa fa-trash"></i> </span>
                                                            </div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                      </div>
                                  </div>
                              </div>
                              <div class="container">
                                <div class="row mr-2 mb-5">
                                  <div class="col-md-12 pull-right p-0">
                                    {{ $authorities->appends(request()->except('page'))->links('helpers.pagination')}}
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('css')
  <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
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
      .delete2{
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
@endsection
@section('js')
  <script type="text/html" id="confirmation">
      <div>
          <button class="cancel btn btn-secondary ">cancel</button>
          <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
      </div>
  </script>
  <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
  <script>
      $(document).ready(function () {

          $("#go-to").click(function () {
              var page =  $("#go-to-page").val();
              location.href = '/admins/furnishers?page='+ page
          })

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
                  url: "/admins/authorities/" + id,
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

          $(".selectize").selectize({plugins: ['remove_button']})
      })

  </script>
@endsection
