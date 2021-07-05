		<!--- Favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{URL::asset('/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{URL::asset('/icons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#37c6f5">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#37c6f5">


		<!--- Icons css -->
		<link href="{{asset('/')}}/assets/css/icons.css" rel="stylesheet">

		<!-- Owl-carousel css-->
    <link href="{{asset('/')}}/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet"/>

		<!--- Right-sidemenu css -->
		<link href="{{asset('/')}}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Custom Scroll bar -->
		<link href="{{asset('/')}}/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- Style css -->
		<link href="{{asset('/')}}/assets/css/style.css" rel="stylesheet">
		<link href="{{asset('/')}}/assets/css/skin-modes.css" rel="stylesheet">

		<!--- Sidemenu css -->
		<link href="{{asset('/')}}/assets/css/sidemenu.css" rel="stylesheet">

		<!--- Animations css -->
		<link href="{{asset('/')}}/assets/css/animate.css" rel="stylesheet">

		<!--- Switcher css -->
		<link href="{{asset('/')}}/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="{{asset('/')}}/assets/switcher/demo.css" rel="stylesheet">


		<!--- Select2 css -->
		<link href="{{asset('/')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('/') }}/assets/plugins/fullcalendar/fullcalendar.min.css">
		<style media="screen">
			#example1{
				min-height:200px;
			}
		</style>

		<style>
        .app_details{
            padding-left: 15px;
            padding-bottom: 15px;
        }
        .left{
            padding-left: 15px;
        }
        .appointment-desc{
            max-height: 150px;
        }
    </style>

    @yield('css')
