@extends('owner.layouts.app')
@section('body')

  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Furnishers</li>
            </ol>
          </nav>
    </div>
  </div>
    {{-- @include('helpers.breadcrumbs', ['title'=> "FURNISHERS", 'route' => ["Home"=> '/admins/furnishers',"CLIENTS LIST" => "#"]]) --}}
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5"></div>
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="row m-2 pt-4">


                    </div>
                    <div class="row m-2">
                      @include('furnishers.search')
                    </div>
                    <div class="container">


                        <?php $alphas = range('A', 'Z');?>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item {{empty(request()->character) ? "active":""}}"><a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type])}}">ALL</a></li>
                            <li class="page-item {{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
                            @foreach($alphas as $alpha)
                            <li class="page-item {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                            @endforeach
                          </ul>
                        </nav>

                        {{-- <ul class="pagination alphabetical ">
                            <li class="{{empty(request()->character) ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type])}}">ALL</a></li>
                            <li class="{{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
                            @foreach($alphas as $alpha)
                                <li class=" {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a  href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                            @endforeach
                        </ul> --}}
                        {{ $banksLogos->appends(request()->except('page'))->links('helpers.pagination2')}}

                    </div>


                    <div class="album py-5">
                        <div class="container">
                            <div class="row">
                                @foreach($banksLogos as  $logos)
                                  @php
                                    $bankimg = str_replace("bank_logos","banks_logo",$logos->path);
                                    $findfile = public_path('/images/'.$bankimg);

                                  @endphp

                                    <div class="col-md-3" title="{{strtoupper($logos->name)}}">
                                        <div class="card mb-4 pt-5" >

                                            @if (isset($logos->path))

                                              {{-- @if(isset($bankimg)) --}}
                                                 {{-- <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{$logos->getUrlAttribute()}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a> --}}
                                                 @if (file_exists($findfile))
                                                   @if (!empty($logos->path))
                                                     <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{ url('/') }}/images/{{ $bankimg }}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                   @else
                                                     <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                   @endif
                                                 @else
                                                       <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                   @endif

                                                 @else
                                                         <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                              @endif
                                              {{-- @else
                                                  @if($logos->no_logo)
                                                      <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/no_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                  @else
                                                      <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                  @endif
                                              @endif --}}


                                            <div class="card-body">
                                                <div class="card-text mt-5">
                                                    <div class="bank-name b"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" > {{strtoupper($logos->name)}}</div>

                                                    <a href="{{ route('furnishers.bank.delete',$logos->id) }}"><div class="delete2 text-right" data-toggle="popover" onclick="return confirm('Are You Sure?')" data-placement="top" data-id="{{ $logos->id}}" >
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
                          {{ $banksLogos->appends(request()->except('page'))->links('helpers.pagination')}}
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
