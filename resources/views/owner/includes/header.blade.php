<!-- main-header -->
<div class="main-header  side-header">
  <div class="container-fluid">
    <div class="main-header-left ">
      <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
        <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
        <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
      </div>
      <div class="responsive-logo">
        <a href="{{ url('/owner') }}"><img src="{{asset('/')}}/assets/img/brand/logo-white.png" class="logo-1"></a>
        <a href="{{ url('/owner') }}"><img src="{{asset('/')}}/assets/img/brand/logo.png" class="logo-11"></a>
        <a href="{{ url('/owner') }}"><img src="{{URL::asset('/icons/apple-icon-180x180.png')}}" class="logo-2"></a>
        <a href="{{ url('/owner') }}"><img src="{{URL::asset('/icons/apple-icon-180x180.png')}}" class="logo-12"></a>
      </div>
      {{-- <ul class="header-megamenu-dropdown  nav">
        <li class="nav-item">
          <div class="btn-group mt-2">
            <a href="{{ route('owner.reports.index')}}"><button  class="btn btn-link"  type="button"><span><i class="las la-poll"></i> </span> Reports</button></a>
          </div>
        </li>
      </ul> --}}
    </div>
    <div class="main-header-right">
      <div class="nav nav-item nav-link" id="bs-example-navbar-collapse-1">
        <form class="navbar-form" role="search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="{{ zactra::translate_lang('Search') }}">
            <span class="input-group-btn">
              <button type="reset" class="btn btn-default">
                <i class="fas fa-times"></i>
              </button>
              <button type="submit" class="btn btn-default nav-link">
                <i class="fe fe-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
      <div class="nav nav-item  navbar-nav-right ml-auto">
        <div class="nav-item full-screen fullscreen-button">
          <a class="new nav-link full-screen-link" href="#"><i class="fe fe-maximize"></i></span></a>
        </div>

        <div class="dropdown main-profile-menu nav nav-item nav-link">

          <a class="profile-user d-flex" href="#">
            @if (isset(Auth::user()->photo))
              <img src="{{ Auth::user()->photo }}" alt="{{ zactra::translate_lang('Profile Image') }}">
            @else
              <img src="https://mpng.subpng.com/20180411/rzw/kisspng-user-profile-computer-icons-user-interface-mystique-5aceb0245aa097.2885333015234949483712.jpg" alt="user-img" class="rounded-circle mCS_img_loaded">
            @endif
          </a>

          <div class="dropdown-menu">
            <div class="main-header-profile header-img">
              <div class="main-img-user">
                @if (isset(Auth::user()->photo))
                  <img src="{{ Auth::user()->photo }}" alt="{{ zactra::translate_lang('Profile Image') }}">
                @else
                  <img alt="" src="https://mpng.subpng.com/20180411/rzw/kisspng-user-profile-computer-icons-user-interface-mystique-5aceb0245aa097.2885333015234949483712.jpg">
                @endif
              </div>
              <h6>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6><span>{{ ucfirst(Auth::user()->role) }}</span>
            </div>
            <a class="dropdown-item" href="{{ route('owner.setting.index') }}"><i class="far fa-user"></i> My Profile</a>
            <a class="dropdown-item" href="{{ route('owner.setting.index') }}"><i class="far fa-edit"></i> Edit Profile</a>
            <a class="dropdown-item" href="{{ Auth::user()->role=='admin' ? url('/admins') : route('owner.index') }}"><i class="far fa-clock"></i> Activity Logs</a>
            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- /main-header -->
