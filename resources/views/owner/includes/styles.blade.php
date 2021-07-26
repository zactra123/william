		<script src="{{asset('/')}}assets/plugins/jquery/jquery.min.js"></script>
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

		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

		<!--- Icons css -->
		<link href="{{asset('/')}}assets/css/icons.css" rel="stylesheet">

		<!-- Owl-carousel css-->
    <link href="{{asset('/')}}assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet"/>

		<!--- Right-sidemenu css -->
		<link href="{{asset('/')}}assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Custom Scroll bar -->
		<link href="{{asset('/')}}assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- Style css -->
		<link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">
		<link href="{{asset('/')}}assets/css/skin-modes.css" rel="stylesheet">

		<!--- Sidemenu css -->
		<link href="{{asset('/')}}assets/css/sidemenu.css" rel="stylesheet">

		<!--- Animations css -->
		<link href="{{asset('/')}}assets/css/animate.css" rel="stylesheet">

		<!--- Switcher css -->
		<link href="{{asset('/')}}assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="{{asset('/')}}assets/switcher/demo.css" rel="stylesheet">


		<!--- Select2 css -->
		<link href="{{asset('/')}}assets/plugins/select2/css/select2.min.css" rel="stylesheet">
		<!--- Internal Datetimepicker-slider css -->
		<link href="{{asset('/')}}assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
		<link href="{{asset('/')}}assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
		<link href="{{asset('/')}}assets/plugins/pickerjs/picker.min.css" rel="stylesheet">

		<!--- Internal Spectrum-colorpicker css -->
	<link href="{{asset('/')}}assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('/') }}assets/plugins/fullcalendar/fullcalendar.min.css">

		<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

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

		@if (Route::currentRouteName()=="admins.bank.show")

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
					<style>
					    .ui-autocomplete {
					        position: absolute;
					        top: 100%;
					        left: 0;
					        z-index: 1000;
					        display: none;
					        float: left;
					        min-width: 160px;
					        padding: 5px 0;
					        margin: 2px 0 0;
					        list-style: none;
					        font-size: 14px;
					        text-align: left;
					        background-color: #ffffff;
					        border: 1px solid #cccccc;
					        border: 1px solid rgba(0, 0, 0, 0.15);
					        border-radius: 4px;
					        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
					        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
					        background-clip: padding-box;
					    }

					    .ui-autocomplete > li > div {
					        display: block;
					        padding: 3px 20px;
					        clear: both;
					        font-weight: normal;
					        line-height: 1.42857143;
					        color: #333333;
					        white-space: nowrap;
					    }

					    .ui-menu-item:hover {
					        text-decoration: none;
					        color: #262626;
					        background-color: #f5f5f5;
					        cursor: pointer;
					    }

					    .ui-helper-hidden-accessible {
					        border: 0;
					        clip: rect(0 0 0 0);
					        height: 1px;
					        margin: -1px;
					        overflow: hidden;
					        padding: 0;
					        position: absolute;
					        width: 1px;
					    }
					    .selectize-control{
					      border: none;
					      padding: 0px;
					    }
					    .selectize-dropdown{
					      height: auto;
					    background: #eae7e7;
					    }
					</style>

		@endif


		@if (Route::currentRouteName()=="admins.bank.edit")
			<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
			<style>

					#bankInformation .selectize-input, .selectize-select {
							/* border: 1px solid #000 !important;
							border-radius: 8px !important; */
					}

					.ui-autocomplete {
							position: absolute;
							top: 100%;
							left: 0;
							z-index: 1000;
							display: none;
							float: left;
							min-width: 160px;
							padding: 5px 0;
							margin: 2px 0 0;
							list-style: none;
							font-size: 14px;
							text-align: left;
							background-color: #ffffff;
							border: 1px solid #cccccc;
							border: 1px solid rgba(0, 0, 0, 0.15);
							border-radius: 4px;
							-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
							box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
							background-clip: padding-box;
					}

					.ui-autocomplete > li > div {
							display: block;
							padding: 3px 20px;
							clear: both;
							font-weight: normal;
							line-height: 1.42857143;
							color: #333333;
							white-space: nowrap;
					}

					.ui-menu-item:hover {
							text-decoration: none;
							color: #262626;
							background-color: #f5f5f5;
							cursor: pointer;
					}

					.ui-helper-hidden-accessible {
							border: 0;
							clip: rect(0 0 0 0);
							height: 1px;
							margin: -1px;
							overflow: hidden;
							padding: 0;
							position: absolute;
							width: 1px;
					}

					.ms-ua-box {
							background-color: #ffffff !important;
							border-radius: 4px !important;
							padding: 15px;
							box-shadow: 0 0 5px 1px #0000005c;
							opacity: 1;
					}

					.expand-address {
							cursor: pointer;
					}

					.selected {
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-ms-flex-wrap: wrap;
							flex-wrap: wrap;
							margin: -7px;
					}

					.selected li {
							display: -webkit-box;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-pack: justify;
							-ms-flex-pack: justify;
							justify-content: space-between;
							-webkit-box-align: center;
							-ms-flex-align: center;
							align-items: center;
							background: rgb(6, 29, 49, 0.8);
							border-radius: 3px;
							margin: 7px;
							padding-left: 0.9375rem;
							padding-right: 0.3125rem;
							max-width: calc(100% - 14px);
							box-shadow: 2px 2px 1px #061d3166;
					}

					.selected span {
							font-size: 1.25rem;
							color: #fff;
							display: inline-block;
							max-width: 100%;
							white-space: nowrap;
							overflow: hidden;
							text-overflow: ellipsis;
					}

					.selected i {
							cursor: pointer;
							font-size: 1.25rem;
							color: #fff;
							padding: 5px;
							-webkit-transition: .2s;
							transition: .2s;
					}

					.responsive {
							width: 100%;
							height: auto;
					}
					.hidden{
						display: none !important;
					}
					.selectize-dropdown{
						height: auto !important;
					}
					.hide{
						display: none !important;
					}
					.pointer{
						cursor: pointer !important;
					}
			</style>
		@endif

		@if (Route::currentRouteName()=="admins.bank.create")
			<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
			<style>

			    #bankInformation .selectize-input,.selectize-select{
			        /* border: 1px solid #000 !important;
			        border-radius: 8px !important; */
			    }

			    .ui-autocomplete {
			        position: absolute;
			        top: 100%;
			        left: 0;
			        z-index: 1000;
			        display: none;
			        float: left;
			        min-width: 160px;
			        padding: 5px 0;
			        margin: 2px 0 0;
			        list-style: none;
			        font-size: 14px;
			        text-align: left;
			        background-color: #ffffff;
			        border: 1px solid #cccccc;
			        border: 1px solid rgba(0, 0, 0, 0.15);
			        border-radius: 4px;
			        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
			        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
			        background-clip: padding-box;
			    }

			    .ui-autocomplete > li > div {
			        display: block;
			        padding: 3px 20px;
			        clear: both;
			        font-weight: normal;
			        line-height: 1.42857143;
			        color: #333333;
			        white-space: nowrap;
			    }

			    .ui-menu-item:hover {
			        text-decoration: none;
			        color: #262626;
			        background-color: #f5f5f5;
			        cursor: pointer;
			    }

			    .ui-helper-hidden-accessible {
			        border: 0;
			        clip: rect(0 0 0 0);
			        height: 1px;
			        margin: -1px;
			        overflow: hidden;
			        padding: 0;
			        position: absolute;
			        width: 1px;
			    }
			    .ms-ua-box {
			        background-color: #ffffff !important;
			        border-radius: 4px !important;
			        padding: 15px;
			        box-shadow: 0 0 5px 1px #0000005c;
			        opacity: 1;
			    }

			    .expand-address {
			        cursor: pointer;
			    }

			    .responsive{
			        width: 100%;
			        height: auto;
			    }
					.hide{
						display: none !important;
					}
					.hidden{
						display: none !important;
					}
					.pointer{
						cursor: pointer !important;
					}
			</style>

		@endif
		<style media="screen">
		.pass_show{position: relative}

		.pass_show .ptxt {

				position: absolute;
				top: 50%;
				right: 10px;
				z-index: 1;
				color: black;
				font-weight: bold;
				margin-top: -10px;
				cursor: pointer;
				transition: .3s ease all;
		}

		.pass_show .ptxt:hover{color: #333333;}
		</style>

    @yield('css')
