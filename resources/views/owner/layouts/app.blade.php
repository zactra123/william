<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		@yield('title')
    @include('owner.includes.styles')
</head>
	<body class="main-body  app sidebar-mini">


		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('/')}}/assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

    @include('owner.includes.sidebar')
		<!-- main-content -->
		<div class="main-content">
      @include('owner.includes.header')
			<!-- container -->
			<div class="container-fluid">
				@yield('body')
			</div>
			<!-- /container -->
		</div>
		<!-- /main-content -->
					<!--Sidebar-right-->

		<!--/Sidebar-right-->
            		<!-- Footer opened -->
		<div class="main-footer ht-40">
			<div class="container-fluid pd-t-0-f ht-100p">
				<span>Copyright © {{ date('Y') }} <a href="#">Credit Repair</a>. Designed by <a href="#">Numan</a></span>
			</div>
		</div>
		<!-- Footer closed -->
		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    @include('owner.includes.scripts')
	</body>

</html>
