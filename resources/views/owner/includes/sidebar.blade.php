<!-- main-sidebar opened -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="main-sidebar app-sidebar sidebar-scroll">
  <div class="main-sidebar-header">
      <a class="desktop-logo logo-light active" href="{{url('/owner')}}" class="text-center mx-auto"><img src="https://prudentscores.com/images/new/logo.png" class="main-logo"></a>
      <a class="desktop-logo icon-logo active"href="{{url('/owner')}}"><img src="{{URL::asset('/icons/apple-icon-180x180.png')}}" class="logo-icon"></a>
      <a class="desktop-logo logo-dark active" href="{{url('/owner')}}"><img src="https://prudentscores.com/images/new/logo.png" class="main-logo dark-theme" alt="logo"></a>
      <a class="logo-icon mobile-logo icon-dark active" href="{{url('/owner')}}"><img src="{{URL::asset('/icons/apple-icon-180x180.png')}}" class="logo-icon dark-theme" alt="logo"></a>
  </div><!-- /logo -->

  <div class="main-sidebar-loggedin">
    <div class="app-sidebar__user">
      <div class="dropdown user-pro-body text-center">
        <div class="user-pic">
          <img src="https://mpng.subpng.com/20180411/rzw/kisspng-user-profile-computer-icons-user-interface-mystique-5aceb0245aa097.2885333015234949483712.jpg" alt="user-img" class="rounded-circle mCS_img_loaded">
        </div>
        <div class="user-info">
          <h6 class=" mb-0 text-dark">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
          <span class="text-muted app-sidebar__user-name text-sm">Administrator</span>
        </div>
      </div>
    </div>
  </div><!-- /user -->
  <div class="sidebar-navs">
    <ul class="nav  nav-pills-circle">
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reports" aria-describedby="tooltip365540">
        <a class="nav-link text-center m-2" href="{{ route('owner.reports.index')}}"><i class="las la-poll"></i>

        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Messages">
        <a class="nav-link text-center m-2" href="{{ url('owner/message')}}">
          <i class="fe fe-clipboard"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clients">
        <a class="nav-link text-center m-2" href="{{ route('owner.client.index')}}">
          <i class="fe fe-user"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
        <a href="{{ route('logout') }}" class="nav-link text-center m-2">
          <i class="fe fe-power"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="main-sidebar-body">
    <ul class="side-menu">

      <li class="slide">
        <a class="side-menu__item" href="{{ url('/owner') }}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboard</span></a>
      </li>

      <li class="slide">
        <a class="side-menu__item" href="{{ url('owner/message')}}"><i class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">Messages</span></a>
      </li>

      <li class="slide">
        <a class="side-menu__item" href="{{ route('owner.affiliate.pricing')}}"><i class="side-menu__icon icon-refresh icons"></i><span class="side-menu__label">Pricing</span></a>
      </li>

      <li class="slide">
        <a class="side-menu__item" href="{{route('owner.credit.education.index')}}"><i class="side-menu__icon fa fa-graduation-cap"></i><span class="side-menu__label">Educations</span></a>
      </li>

      <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ route('admins.bank.show')}}"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">Furnishers/CRAs</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('admins.bank.show')}}">FURNISHERs/CRAs</a></li>
							<li><a class="slide-item" href="{{ route('admins.bank.types')}}">FURNISHERs/CRAs TYPES</a></li>

              <li><a class="slide-item" href="{{ route('admins.authority.index')}}">AUTHORITIES</a></li>
              <li><a class="slide-item" href="{{ route('admins.court.index')}}">COURT</a></li>
              <li><a class="slide-item" href="{{ route('admins.mortgage.days')}}">MORTGAGE JUDICIAL DAYS</a></li>
          	</ul>
			</li>

      <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Users</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('owner.admin.index')}}">ADMINS</a></li>
							<li><a class="slide-item" href="{{ route('owner.receptionist.index')}}">RECEPTIONIST</a></li>

              <li><a class="slide-item" href="{{ route('owner.client.index')}}">CLIENTS</a></li>
              <li><a class="slide-item" href="{{ route('owner.affiliate.index')}}">AFFILIATES</a></li>
              <li><a class="slide-item" href="{{ route('owner.reviews.index')}}">REVIEWS</a></li>
          	</ul>
			</li>

      <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-check"></i><span class="side-menu__label">Slogans</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('owner.slogans.index')}}">VIEW SLOGANS</a></li>
							<li><a class="slide-item" href="{{ route('owner.slogans.create')}}">ADD SLOGANS</a></li>
          	</ul>
			</li>


      <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-lightbulb"></i><span class="side-menu__label">Faqs</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('owner.faqs.index')}}">VIEW FAQs</a></li>
							<li><a class="slide-item" href="{{ route('owner.faqs.create')}}">ADD FAQs</a></li>
          	</ul>
			</li>

      <li class="slide">
        <a class="side-menu__item" href="{{ route('owner.reports.index')}}"><i class="side-menu__icon las la-poll"></i><span class="side-menu__label">Report</span></a>
      </li>

      <li class="slide">
        <a class="side-menu__item" href="#"><i class="side-menu__icon icon-settings icons"></i><span class="side-menu__label">Settings</span></a>
      </li>

      <li class="slide">
        <a class="side-menu__item" href="{{ url('/logout') }}"><i class="side-menu__icon icon-lock icons"></i><span class="side-menu__label">Logout</span></a>
      </li>

    </ul>
  </div>
</aside>
<!-- /main-sidebar -->
