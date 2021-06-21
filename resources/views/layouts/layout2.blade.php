<html class="no-js h-100" lang="en">
    <head>

      <meta charset="utf-8" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>Prudent Credit Solutions</title>
      
      <link rel="icon" type="image/png" sizes="192x192"  href="{{URL::asset('/icons/android-icon-192x192.png')}}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/icons/favicon-32x32.png')}}">
      <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('/icons/favicon-96x96.png')}}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/icons/favicon-16x16.png')}}">
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
      <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="https://designrevision.com/demo/shards-dashboard-lite/styles/shards-dashboards.1.1.0.min.css" />
      <link rel="stylesheet" href="https://designrevision.com/demo/shards-dashboard-lite/styles/extras.1.1.0.min.css" />
      <link rel="stylesheet" href="{{ asset('css/new_style.min.css?v='.env('ASSET_VERSION') ) }}">

    </head>
    <body class="h-100">

        <div class="container-fluid">
            <div class="row">
                <!-- Main Sidebar -->
                <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                    <div class="main-navbar">
                        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                                <div class="d-table m-auto">
                                    <img id="main-logo" class="d-inline-block align-top mr-1" width="60%" src="{{ asset('images/new/logo.png') }}" alt="Prudent Credit Solutions" />
                                </div>
                            </a>
                            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                                <i class="material-icons"></i>
                            </a>
                        </nav>
                    </div>
                    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                        <div class="input-group input-group-seamless ml-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search" />
                        </div>
                    </form>
                    <div class="nav-wrapper">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link {{ \App\utills\zactra::areActiveRoute(['client.details.index']) }}" href="{{url('/client/details')}}">
                                    <i class="material-icons">edit</i>
                                    <span>Home</span>
                                </a>
                            </li>

                            @if(!empty(Auth::user()->clientDetails))
                                @if(Auth::user()->clientDetails->registration_steps != 'registered')
                            <li class="nav-item">
                                <a class="nav-link {{ \App\utills\zactra::areActiveRoute(['client.details.edit']) }}" href="{{route('client.details.edit', Auth::user()->id)}}">
                                    <i class="material-icons">vertical_split</i>
                                    <span>EDIT DETAILS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ \App\utills\zactra::areActiveRoute(['client.addDriverSocial']) }}" href="{{route('client.addDriverSocial')}}">
                                    <i class="material-icons">note_add</i>
                                    <span>UPLOAD DL & SS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ \App\utills\zactra::areActiveRoute(['client.credentials']) }}" href="{{route('client.credentials')}}">
                                    <i class="material-icons">view_module</i>
                                    <span>CREDENTIALS</span>
                                </a>
                            </li>
                          @endif
                      @else
                            <li class="nav-item">
                                <a class="nav-link {{ \App\utills\zactra::areActiveRoute(['client.details.create']) }}" href="{{route('client.details.create')}}">
                                    <i class="material-icons">table_chart</i>
                                    <span>ADD YOUR DETAILS</span>
                                </a>
                            </li>
                      @endif
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('logout')}}">
                              <i class="material-icons">view_module</i>
                              <span>Logout</span>
                          </a>
                      </li>
                        </ul>
                    </div>
                </aside>
                <!-- End Main Sidebar -->
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <div class="main-navbar sticky-top bg-white">
                        <!-- Main Navbar -->
                        <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                            <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                                <div class="input-group input-group-seamless ml-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                    <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search" />
                                </div>
                            </form>
                            <ul class="navbar-nav border-left flex-row">
                                <li class="nav-item border-right dropdown notifications">
                                    <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="nav-link-icon__wrapper">
                                            <i class="material-icons"></i>
                                            <span class="badge badge-pill badge-danger">2</span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">
                                            <div class="notification__icon-wrapper">
                                                <div class="notification__icon">
                                                    <i class="material-icons"></i>
                                                </div>
                                            </div>
                                            <div class="notification__content">
                                                <span class="notification__category">Analytics</span>
                                                <p>Your website’s active users count increased by <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="notification__icon-wrapper">
                                                <div class="notification__icon">
                                                    <i class="material-icons"></i>
                                                </div>
                                            </div>
                                            <div class="notification__content">
                                                <span class="notification__category">Sales</span>
                                                <p>Last week your store’s sales count decreased by <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img class="user-avatar rounded-circle mr-2" src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" alt="User Avatar" /> <span class="d-none d-md-inline-block">{{ $client->full_name() }}</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-small">
                                        <a class="dropdown-item text-danger" href="{{ route('client.details.edit',Auth::user()->id) }}"><i class="material-icons text-danger">account_circle</i>Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="{{url('logout')}}"> <i class="material-icons text-danger"></i> Logout </a>
                                    </div>
                                </li>
                            </ul>
                            <nav class="nav">
                                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                    <i class="material-icons"></i>
                                </a>
                            </nav>
                        </nav>
                    </div>
                    <!-- / .main-navbar -->
                    @yield('body')
                    <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-12 text-center">
                          <p>2020 © All Rights Reserved by <a href="/" class="fs-14">PRUDENT CREDIT SOLUTION</a></p>
                        </div>
                    </footer>
                </main>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
        <script src="https://designrevision.com/demo/shards-dashboard-lite/scripts/extras.1.1.0.min.js"></script>
        <script src="https://designrevision.com/demo/shards-dashboard-lite/scripts/shards-dashboards.1.1.0.min.js"></script>
        <script src="https://designrevision.com/demo/shards-dashboard-lite/scripts/app/app-blog-overview.1.1.0.min.js"></script>



    </body>
</html>
