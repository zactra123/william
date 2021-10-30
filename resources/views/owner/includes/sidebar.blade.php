<!-- main-sidebar opened -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="main-sidebar app-sidebar sidebar-scroll">
  <!-- /logo -->
  <div class="main-sidebar-header">
    <a class="desktop-logo logo-light active" href="{{url('/')}}" class="text-center mx-auto"><img src="https://prudentscores.com/images/new/logo.png" class="main-logo"></a>
    <a class="desktop-logo icon-logo active"href="{{url('/')}}"><img src="{{URL::asset('/icons/apple-icon-180x180.png')}}" class="logo-icon"></a>
    <a class="desktop-logo logo-dark active" href="{{url('/')}}"><img src="https://prudentscores.com/images/new/logo.png" class="main-logo dark-theme" alt="{{ zactra::translate_lang('logo') }}"></a>
    <a class="logo-icon mobile-logo icon-dark active" href="{{url('/')}}"><img src="{{URL::asset('/icons/apple-icon-180x180.png')}}" class="logo-icon dark-theme" alt="{{ zactra::translate_lang('logo') }}"></a>
  </div>
  <!-- /logo -->
  <!-- /user -->
  <div class="main-sidebar-loggedin text-center">
    <div class="app-sidebar__user">
      <div class="dropdown user-pro-body text-center">
        <div class="user-pic">
          @if (isset(Auth::user()->photo))
            <img src="{{ Auth::user()->photo }}" alt="{{ zactra::translate_lang('Profile Image') }}" class="rounded-circle mCS_img_loaded">
          @else
            <img src="https://mpng.subpng.com/20180411/rzw/kisspng-user-profile-computer-icons-user-interface-mystique-5aceb0245aa097.2885333015234949483712.jpg" alt="{{ zactra::translate_lang('user-img') }}" class="rounded-circle mCS_img_loaded">
          @endif
        </div>
        <div class="user-info">
          <h6 class=" mb-0 text-dark">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
          <span class="text-muted app-sidebar__user-name text-sm">{{ ucfirst(Auth::user()->role) }}</span>
        </div>
      </div>
    </div>
  </div>
  <!-- /user -->
  <div class="sidebar-navs">
    <ul class="nav  nav-pills-circle">
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ zactra::translate_lang('Reports') }}" aria-describedby="tooltip365540">
        <a class="nav-link text-center m-2" href="{{ route('owner.reports.index')}}"><i class="las la-poll"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ zactra::translate_lang('Messages') }}">
        <a class="nav-link text-center m-2" href="{{ url('owner/message')}}">
          <i class="fe fe-clipboard"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ zactra::translate_lang('Clients') }}">
        <a class="nav-link text-center m-2" href="{{ route('owner.client.index')}}">
          <i class="fe fe-user"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ zactra::translate_lang('Logout') }}">
        <a href="{{ route('logout') }}" class="nav-link text-center m-2">
          <i class="fe fe-power"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="main-sidebar-body">
    @if(Auth::user())
        @if(Auth::user()->role == 'client')
          <ul class="side-menu">
            <li class="slide">
              <a class="side-menu__item" href="{{url('/client/details')}}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">{{ zactra::translate_lang('Home') }}</span></a>
            </li>
            @if(!empty(Auth::user()->clientDetails))
              @if(Auth::user()->clientDetails->registration_steps != 'registered')
                <li class="slide">
                  <a class="side-menu__item" href="{{route('client.details.edit', Auth::user()->id)}}"><i class="side-menu__icon fe fe-edit"></i><span class="side-menu__label">{{ zactra::translate_lang('Edit Details') }}</span></a>
                </li>
                <li class="slide">
                  <a class="side-menu__item" href="{{route('client.addDriverSocial')}}"><i class="side-menu__icon fe fe-upload"></i><span class="side-menu__label">{{ zactra::translate_lang('Upload dl & ss') }}</span></a>
                </li>
                <li class="slide">
                  <a class="side-menu__item" href="{{route('client.credentials')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">{{ zactra::translate_lang('Credentials') }}</span></a>
                </li>
              @endif
            @else
              <li class="slide">
                <a class="side-menu__item" href="{{route('client.details.create')}}"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">{{ zactra::translate_lang('Add Your Details') }}</span></a>
              </li>
            @endif
            <li class="slide">
              <a class="side-menu__item" href="{{ url('/logout') }}"><i class="side-menu__icon icon-lock icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Logout') }}</span></a>
            </li>
          </ul>
        @elseif(Auth::user()->role == 'affiliate')
            @include('helpers.urls.nav_bar_affiliate')
        @elseif(Auth::user()->role == 'super admin')
          <ul class="side-menu">
            <li class="slide">
              <a class="side-menu__item" href="{{ url('/owner') }}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">{{ zactra::translate_lang('Dashboard') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ url('owner/message')}}"><i class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label"> {{ zactra::translate_lang('Messages') }} </span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.affiliate.pricing')}}"><i class="side-menu__icon icon-refresh icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Pricing') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item  {{ zactra::areActiveRoute(['owner.credit.education.index','owner.credit.education.edit','owner.credit.education.create','owner.credit.education.show'])}}" href="{{route('owner.credit.education.index')}}"><i class="side-menu__icon fa fa-graduation-cap"></i><span class="side-menu__label">{{ zactra::translate_lang('Educations') }}</span></a>
            </li>

            <li class="slide {{ zactra::areActiveDropdown(['admins.authority','admins.authority.create','admins.authority.edit','admins.bank','admins.bank.edit','admins.bank.create','admins.court.create','admins.court.edit'])}}">
              <a class="side-menu__item" data-toggle="slide" href="{{ route('admins.bank.show')}}"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">{{ zactra::translate_lang('Furnishers/CRAs') }}</span><i class="angle fe fe-chevron-down"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item {{ zactra::areActiveRoute(['admins.bank.show','admins.bank.edit','admins.bank.create'])}}" href="{{ route('admins.bank.show')}}">{{ zactra::translate_lang('FURNISHERs/CRAs') }}</a></li>
                <li><a class="slide-item" href="{{ route('admins.bank.types')}}">{{ zactra::translate_lang('FURNISHERs/CRAs TYPES') }}</a></li>
                <li><a class="slide-item {{ zactra::areActiveRoute(['admins.authority','admins.authority.create','admins.authority.edit'])}}" href="{{ route('admins.authority.index')}}">{{ zactra::translate_lang('AUTHORITIES') }}</a></li>
                <li><a class="slide-item {{ zactra::areActiveRoute(['admins.court','admins.court.create','admins.court.edit'])}}" href="{{ route('admins.court.index')}}">{{ zactra::translate_lang('COURT') }}</a></li>
                <li><a class="slide-item" href="{{ route('admins.mortgage.days')}}">{{ zactra::translate_lang('MORTGAGE JUDICIAL DAYS') }}</a></li>
              </ul>
            </li>

            <li class="slide {{ zactra::areActiveDropdown(['owner.admin.create','owner.admin.edit','owner.receptionist.create','owner.receptionist.edit','owner.client.create','owner.client.edit','owner.admin.changePassword','adminRec.client.profile'])}}">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">{{ zactra::translate_lang('Users') }}</span><i class="angle fe fe-chevron-down"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item {{ zactra::areActiveRoute(['owner.admin','owner.admin.create','owner.admin.edit','owner.admin.changePassword'])}}" href="{{ route('owner.admin.index')}}">{{ zactra::translate_lang('ADMINS') }}</a></li>
                <li><a class="slide-item {{ zactra::areActiveRoute(['owner.receptionist','owner.receptionist.create','owner.receptionist.edit'])}}" href="{{ route('owner.receptionist.index')}}">{{ zactra::translate_lang('RECEPTIONIST') }}</a></li>
                <li><a class="slide-item {{ zactra::areActiveRoute(['owner.client','owner.client.create','owner.client.edit','adminRec.client.profile'])}}" href="{{ route('owner.client.index')}}">{{ zactra::translate_lang('CLIENTS') }}</a></li>
                <li><a class="slide-item {{ zactra::areActiveRoute(['owner.affiliate','owner.affiliate.create','owner.affiliate.edit'])}}" href="{{ route('owner.affiliate.index')}}">{{ zactra::translate_lang('AFFILIATES') }}</a></li>
                <li><a class="slide-item" href="{{ route('owner.reviews.index')}}">{{ zactra::translate_lang('REVIEWS') }}</a></li>
              </ul>
            </li>

            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-check"></i><span class="side-menu__label">{{ zactra::translate_lang('Slogans') }}</span><i class="angle fe fe-chevron-down"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('owner.slogans.index')}}">{{ zactra::translate_lang('VIEW SLOGANS') }}</a></li>
                <li><a class="slide-item" href="{{ route('owner.slogans.create')}}">{{ zactra::translate_lang('ADD SLOGANS') }}</a></li>
              </ul>
            </li>

            <li class="slide {{ zactra::areActiveDropdown(['owner.faqs.question','owner.faqs.edit']) }}">
              <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-lightbulb"></i><span class="side-menu__label">{{ zactra::translate_lang('Faqs') }}</span><i class="angle fe fe-chevron-down"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item {{ zactra::areActiveRoute(['owner.faqs.question','owner.faqs.edit']) }}" href="{{ route('owner.faqs.index')}}">{{ zactra::translate_lang('VIEW FAQs') }}</a></li>
                <li><a class="slide-item" href="{{ route('owner.faqs.create')}}">{{ zactra::translate_lang('ADD FAQs') }}</a> </li>
              </ul>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.subscribe.list')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">{{ zactra::translate_lang('Subscribers') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.reports.index')}}"><i class="side-menu__icon las la-poll"></i><span class="side-menu__label">{{ zactra::translate_lang('Report') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item {{ zactra::areActiveRoute(['owner.translation.index','owner.translation.create','owner.translation.edit']) }}" href="{{ route('owner.translation.index') }}"><i class="side-menu__icon fa fa-language"></i><span class="side-menu__label">{{ zactra::translate_lang('Translation') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.site.setting') }}"><i class="side-menu__icon icon-settings icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Site Settings') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.setting.index') }}"><i class="side-menu__icon icon-settings icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Profile Settings') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ url('/logout') }}"><i class="side-menu__icon icon-lock icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Logout') }}</span></a>
            </li>
          </ul>
        @elseif(Auth::user()->role == 'admin')
          <ul class="side-menu">
            <li class="slide">
              <a class="side-menu__item" href="{{ url('/admins') }}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">{{ zactra::translate_lang('Dashboard') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('admin.message.index')}}"><i class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">{{ zactra::translate_lang('Messages') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" data-toggle="slide" href="{{ route('admins.bank.show')}}"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">{{ zactra::translate_lang('Furnishers/CRAs') }}</span><i class="angle fe fe-chevron-down"></i></a>
              <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('admins.bank.show')}}">{{ zactra::translate_lang('Furnishers/CRAs') }}</a></li>
              </ul>
            </li>

            <li class="slide">
              <a class="side-menu__item {{ zactra::areActiveRoute(['adminRec.client.profile']) }}" href="{{ route('adminRec.client.list')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">{{ zactra::translate_lang('Client List') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('adminRec.toDo.list')}}"><i class="side-menu__icon fe fe-check"></i><span class="side-menu__label">{{ zactra::translate_lang('To Do List') }}</span></a>
            </li>

            {{-- <li class="slide">
              <a class="side-menu__item" href="{{ route('adminRec.changePassword')}}"><i class="side-menu__icon icon-refresh icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Change Password') }}</span></a>
            </li> --}}

            <li class="slide">
              <a class="side-menu__item {{ zactra::areActiveRoute(['blog.create','blog.edit']) }}" href="{{ route('blog.index') }}"><i class="side-menu__icon las la-poll"></i><span class="side-menu__label">{{ zactra::translate_lang('Blog') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.setting.index') }}"><i class="side-menu__icon icon-settings icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Profile Settings') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ url('/logout') }}"><i class="side-menu__icon icon-lock icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Logout') }}</span></a>
            </li>
          </ul>

        @elseif(Auth::user()->role == 'receptionist')
          <ul class="side-menu">
            <li class="slide">
              <a class="side-menu__item" href="{{ url('/receptionist') }}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">{{ zactra::translate_lang('Dashboard') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ url('receptionist/message') }}"><i class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">{{ zactra::translate_lang('Appointment') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('admins.bank.show')}}"><i class="side-menu__icon ti-wallet"></i><span class="side-menu__label">{{ zactra::translate_lang('Furnishers/CRAs') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('adminRec.client.list')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">{{ zactra::translate_lang('Client List') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('adminRec.affiliate.list')}}"><i class="side-menu__icon las la-poll"></i><span class="side-menu__label">{{ zactra::translate_lang('Affiliate List') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('adminRec.toDo.list')}}"><i class="side-menu__icon fe fe-check"></i><span class="side-menu__label">{{ zactra::translate_lang('To Do List') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ route('receptionist.liveChat.index')}}"><i class="side-menu__icon fa fa-envelope"></i><span class="side-menu__label">{{ zactra::translate_lang('Chat') }}</span>
              @if(!empty($all_unreads))
                <span id="allMessageCount" class="badge badge-danger text-white"> {{array_sum(Auth::user()->unreads(["type" => "to"]))}}</span>
              @endif</a>
            </li>

            {{-- <li class="slide">
              <a class="side-menu__item" href="{{ route('adminRec.changePassword')}}"><i class="side-menu__icon icon-refresh icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Change Password') }}</span></a>
            </li> --}}

            <li class="slide">
              <a class="side-menu__item" href="{{ route('owner.setting.index') }}"><i class="side-menu__icon icon-settings icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Profile Settings') }}</span></a>
            </li>

            <li class="slide">
              <a class="side-menu__item" href="{{ url('/logout') }}"><i class="side-menu__icon icon-lock icons"></i><span class="side-menu__label">{{ zactra::translate_lang('Logout') }}</span></a>
            </li>
          </ul>
        @elseif(Auth::user()->role == 'seo')
            @include('helpers.urls.nav_bar_seo')
        @endif
    @else
        @include('helpers.urls.nav_bar_guest')
    @endif
  </div>
</aside>
<!-- /main-sidebar -->
