<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> --}}
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

    {{-- <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" /> --}}
    {{-- <script src="{{ asset('js/app.js?v=2') }}" defer></script> --}}
    {{-- <script src="{{asset('js/js/ie-support/html5.js')}}"></script> --}}
    {{-- <script src="{{asset('js/js/ie-support/respond.js')}}"></script> --}}
    <style>
      @import "{{asset('css/app.css')}}";
    </style>
    <style type="text/css">
      .dropdown-submenu.pull-left > {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
      }

      .internal {
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        font-size: 0.7rem;
        font-weight: 400;
        line-height: 1.6;
        color: #495057;
        background-color: #fff;
        border: 0px solid #ced4da;
        border-right: 1px solid #ced4da;
      }

      .external {
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        font-size: 0.7rem;
        color: #495057;
        background-color: #fff;
        border: 0px solid #ced4da;
      }
    </style>
  </head>

  <body>
    <div class="page-content pt-4">
      <div class="page-content p-0 mr-0 ml-0">
        <div class="row mr-0 ml-0">
          <div class="col-xs-12 pl-2">
            {{-- <div class="card"> --}}
            {{-- <div class="card-body" id="print-details"> --}}
                <div class="pl-3 row border-bottom">
                  <div class="external">
                    {{$client->full_name()==" "?"FULL NAME":$client->full_name()}}
                  </div>
                </div>
                <div class="pl-3 row border-bottom">
                  <div class="external">{{$client->clientDetails->address??"ADDRESS"}}</div>
                </div>
                <div class="pb-1 row border-bottom">
                  <div class="col-xs-4 internal">{{$client->clientDetails->phone_number??"PHONE NUMBER"}}</div>
                  <div class="col-xs-6 external">{{$client->email}}</div>
                </div>
                <div class="pb-1 row border-bottom">
                  <div class="col-xs-4 internal">{{$client->clientDetails->ssn??"SNN"}}</div>
                  <div class="col-xs-6 external">{{$client->clientDetails?date_format(date_create($client->clientDetails->dob), 'm/d/Y'):"DATE OF BIRTH"}}</div>
                </div>
                @if($client->clientDetails != null)
                <div class="pb-2 pt-2 row mr-0 ml-0 external border-bottom">
                  <div class="col-2 m-0 p-0">
                    <label>GENDER:</label>
                  </div>
                  <div class="col-10">
                    @if($client->clientDetails->sex == "M")
                    <div class="row">
                      <label class="col-4 m-0 p-0">
                        MALE
                        <input type="radio" name="sex" class="sex" value="M" checked />
                      </label>
                    </div>
                    @elseif($client->clientDetails->sex == "F")
                    <div class="row">
                      <label class="col-4 m-0 p-0">
                        FEMALE
                        <input type="radio" name="sex" class="sex" value="F" checked />
                      </label>
                    </div>
                    @else
                    <div class="row">
                      <label class="col-4 m-0 p-0">
                        NON BINARY
                        <input type="radio" name="sex" class="sex" value="O" checked />
                      </label>
                    </div>
                    @endif
                  </div>
                </div>
                @else
                <div class="pb-2 pt-2 row mr-0 ml-0 external border-bottom">
                  <div class="col-12 m-0 p-0">
                    <label>Gender:</label>
                    <label class="col-2 m-0 p-0">
                      MALE
                      <input type="radio" name="sex" class="sex" value="M" />
                    </label>
                    <label class="col-2 m-0 p-0">
                      FEMALE
                      <input type="radio" name="sex" class="sex" value="F" />
                    </label>
                    <label class="col-2 m-0 p-0">
                      NON BINARI
                      <input type="radio" name="sex" class="sex" value="F" />
                    </label>
                  </div>
                </div>
                @endif
                <div class="pt-2 pb-2 pl-3 row external">
                  REFFERED BY {{$client->referredBy()}}
                </div>
                {{-- </div> --}}
                {{-- </div> --}}
          </div>
        </div>
      </div>
    </div>

    {{-- <script src="{{asset('js/js/jquery-1.11.1.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/js/plugins.js')}}"></script> --}}
    {{-- <script src="{{asset('js/js/app.js')}}"></script> --}}
  </body>
</html>
