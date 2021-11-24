<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="bootstrap panel, bootstrap admin template, dashboard template, bootstrap dashboard, dashboard design, best dashboard, html css admin template, html admin template, admin panel template, admin dashbaord template, bootstrap dashbaord template, it dashbaord, hr dashbaord, marketing dashbaord, sales dashbaord, dashboard ui, admin portal, bootstrap 4 admin template, bootstrap 4 admin"/>

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		@foreach(app('setting_data') as $row)
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images') }}/{{ $row->favicon }}" />
		@endforeach

		<!-- Title -->
		@foreach(app('setting_data') as $row)
		<title>{{$row->title}}</title>
		@endforeach

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

        <!--Font Awesome-->
		<link href="{{ asset('/assets/plugins/fontawesome-free/css/all.css') }}" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/leadedit.css') }}">
		<link href="{{ asset('/assets/css/dark-style.css') }}" rel="stylesheet" />
		<link href="{{ asset('/assets/css/color-styles.css') }}" rel="stylesheet" />
		<link href="{{ asset('/assets/css/skin-modes.css') }}" rel="stylesheet" />

		<!-- Vector-map -->
		<link href="{{ asset('/assets/plugins/jquery.vmap/jqvmap.min.css') }}" rel="stylesheet">
		<!---Font icons-->
		<link href="{{ asset('/assets/plugins/iconfonts/plugin.css') }}" rel="stylesheet" />
		<link href="{{ asset('/assets/plugins/iconfonts/icons.css') }}" rel="stylesheet" />
		<!-- p-scroll bar css-->
		<link href="{{ asset('/assets/plugins/p-scroll/p-scroll.css') }}" rel="stylesheet" />
		<!-- select2 Plugin -->
		<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
		<!--mutipleselect css-->
		<link rel="stylesheet" href="{{ asset('/assets/plugins/multipleselect/multiple-select.css') }}">
		<!-- Data table css -->
		<link href="{{ asset('/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('/assets/plugins/Datatable/css/buttons.bootstrap4.min.css') }}">
		<link href="{{ asset('/assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />

		<!-- Tabs Style -->
		<link href="{{ asset('/assets/plugins/tabs/tabs.css') }}" rel="stylesheet" />
		<!-- Sidemenu Css -->
		<link href="{{ asset('/assets/css/sidemenu-closed.css') }}" rel="stylesheet">
		<!-- WYSIWYG Editor css -->
		<link href="{{ asset('/assets/plugins/jquery.richtext/richtext.min.css') }}" rel="stylesheet" />
		<!-- morris Charts Plugin -->
		<link href="{{ asset('/assets/plugins/morris/morris.css') }}" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{ asset('/assets/plugins/iconfonts/plugin.css') }}" rel="stylesheet" />

		<!-- Sidebar css -->
		<link href="{{ asset('/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

		<!-- COLOR-SKINS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('/assets/skins/color-skins/color15.css') }}" />
		<link rel="stylesheet" href="{{ asset('/assets/skins/demo.css') }}"/>

	</head>

	<body class="app sidebar-mini">

		<!-- Global Loader-->
		<div id="global-loader"><img src="{{ asset('/assets/images/svgs/loader.svg') }}" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				<!-- Navbar-->
				<header class="app-header header">
					<!-- Navbar Right Menu-->
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="{{ Route('Dashboard') }}">
								@foreach(app('setting_data') as $row)
								<img alt="logo" class="header-brand-img main-logo" src="{{ asset('assets/images') }}/voltaoc.png">
								@endforeach
								<img alt="logo" class="header-brand-img mobile-logo" src="{{ asset('/assets/images/brand/icon.png') }}">
							</a>
							<!-- Sidebar toggle button-->
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="dropdown d-sm-flex d-none">
								<a href="#" class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu header-search dropdown-menu-left dropdown-menu-arrow">
									<div class="input-group w-100 p-2">
										<input type="text" class="form-control " placeholder="Search....">
										<div class="input-group-append ">
											<button type="button" class="btn btn-primary ">
												<i class="fas fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="d-flex order-lg-2 ml-auto">
								<div class="d-sm-flex d-none">
									<a href="#" class="nav-link icon full-screen-link">
										<i class="fe fe-minimize fullscreen-button"></i>
									</a>
								</div>
								<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
								</button>
								<!--Navbar -->
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('/') }}assets/images/users/5.jpg"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-1">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
										<!-- Right Side Of Navbar -->
                    
                   						 @guest
			                        	@if (Route::has('login'))
			                            @endif

			                            @else
                                
                                    	<a class="dropdown-item" href="{{ route('logout') }}"
	                                       onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();"><i class="dropdown-icon fe fe-power"></i> 
	                                        {{ __('Logout') }}
	                                    </a>

	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                        @csrf
	                                    </form>
                        				@endguest
										
										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-icon btn-facebook btn-sm"><i class="si si-social-facebook"></i></a>
												<a href="#" class="btn btn-icon btn-twitter btn-sm"><i class="si si-social-twitter"></i></a>
												<a href="#" class="btn btn-icon btn-instagram btn-sm"><i class="si si-social-instagram"></i></a>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</header>
				
				<!--/.Navbar -->

				@include('layouts.sidebar')

				<div class=" app-content">
					<div class="side-app">

						@yield('content')

						
					</div>

					

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 text-center">
									{{-- Copyright © 2021 <a href="#">Lyfe.</a>. Designed by <a href="">Webewox</a> All rights reserved. --}}
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->
				</div>
			</div>
		</div>

		<!-- Back to top -->
		{{-- <a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a> --}}

		<!--Jquery js -->
		<script src="{{ asset('/assets/js/jquery.js') }}"></script>

		<!--Jquery.Sparkline js -->
		<script src="{{ asset('/assets/js/vendors/jquery.sparkline.min.js') }}"></script>

		<!--Circle-Progress js -->
		<script src="{{ asset('/assets/js/vendors/circle-progress.min.js') }}"></script>

		<!--Jquery.rating js -->
		<script src="{{ asset('/assets/plugins/jquery.rating/jquery.rating-stars.js') }}"></script>

		<!--Bootstrap.min js-->
		<script src="{{ asset('/assets/plugins/bootstrap/popper.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- p-scroll bar Js-->
		<script src="{{ asset('/assets/plugins/p-scroll/p-scroll.js') }}"></script>
		<script src="{{ asset('/assets/plugins/p-scroll/p-scroll-1.js') }}"></script>

		<!-- Sidemenu-responsive-tabs js-->
		<script src="{{ asset('/assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js') }}"></script>
		<script src="{{ asset('/assets/js/left-menu.js') }}"></script>

		<!-- Side menu js -->
		<script src="{{ asset('/assets/plugins/sidemenu/js/sidemenu.js') }}"></script>

		<!-- Input Mask js -->
		<script src="{{ asset('/assets/plugins/jquery.mask/jquery.mask.min.js') }}"></script>

		<!-- Progress js-->
        <script src="{{ asset('/assets/js/vendors/circle-progress.min.js') }}"></script>
        <!--Select2 js -->
		<script src="{{ asset('/assets/plugins/select2/select2.full.min.js') }}"></script>
        <!--MutipleSelect js-->
		<script src="{{ asset('/assets/plugins/multipleselect/multiple-select.js') }}"></script>
		<script src="{{ asset('/assets/plugins/multipleselect/multi-select.js') }}"></script>

		<!-- Inline js -->
		<script src="{{ asset('/assets/js/select2.js') }}"></script>
		<!-- WYSIWYG Editor js -->
		<script src="{{ asset('/assets/plugins/jquery.richtext/jquery.richtext.js') }}"></script>
		<script src="{{ asset('/assets/plugins/jquery.richtext/richText1.js') }}"></script>

		<!--ckeditor js-->
		<script src="{{ asset('/assets/plugins/tinymce/tinymce.min.js') }}"></script>
		<!--Counters -->
		<script src="{{ asset('/assets/plugins/counters/counterup.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/counters/waypoints.min.js') }}"></script>
		<!-- Richtext js -->
		<script src="{{ asset('/assets/js/richtext.js') }}"></script>
		<!-- Chart js -->
		<script src="{{ asset('/assets/plugins/chart.js/chart.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/chart.js/chart.extension.js') }}"></script>

		<!--Jquery.knob js-->
		<script src="{{ asset('/assets/plugins/othercharts/jquery.knob.js') }}"></script>
		<script src="{{ asset('/assets/plugins/othercharts/othercharts.js') }}"></script>

		<!--Echart Plugin -->
		<script src="{{ asset('/assets/plugins/echart/echart.js') }}"></script>

		<!--Jquery.sparkline js-->
		<script src="{{ asset('/assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

		<!-- peitychart -->
		<script src="{{ asset('/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
		<!-- Data tables -->
		<script src="{{ asset('/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>

		<!-- Data table js -->
		<script src="{{ asset('/assets/js/datatable.js')}}"></script>

		<!--Counters -->
		<script src="{{ asset('/assets/plugins/counters/counterup.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/counters/waypoints.min.js') }}"></script>

		<!-- Sidebar js -->
		<script src="{{ asset('/assets/plugins/sidebar/sidebar.js') }}"></script>
		<!---Tabs JS-->
		<script src="{{ asset('/assets/plugins/tabs/tabs.js') }}"></script>
		<!---Tabs scripts-->
		<script src="{{ asset('/assets/js/tabs.js') }}"></script>
		<!--Index js -->
		<script src="{{ asset('/assets/js/index.js') }}"></script>
		<!-- index2 js -->
		<script src="{{ asset('/assets/js/index2.js') }}"></script>
		<!-- custom js -->
		<script src="{{ asset('/assets/js/custom.js') }}"></script>
		<script type="text/javascript">
		
		$('.rolemodules [type="checkbox"]').on("change", function(event) {
			 if($(this).is(":checked")) {
		        //alert("on");
		        $(this).val('1');         
		     } else {
		        //alert("off");
		        $(this).val('0');
		     }
		});
		</script>
		<script>
			function myFunction() {
				alert("Sure you want to Delete This...!");
			}
		</script>

		<script>
			
	$('body').on('keyup change', '.lead_data', function() {
		var token = $("meta[name='csrf-token']").attr("content");
		var data = {
			'id': $("input[name='lead-id']").val(),
			'name': $(this).attr('name'),
			'value': $(this).val(),
			_token: token,
		}
		$.ajax({
        	type: 'POST',
        	url: "{{ route('leads.store') }}",
           	data: data,
           	success:function(data){
   				console.log(data)
   				$('.C63').text(data.data.C63+' PKR')
   				// $('.C63').attr("data-value",data.data.C63+' PKR')
   				$('.C16').text(data.data.C16)
   				$('.F18').text(data.data.F18)
   				$('.F19').text(data.data.F19)
   				$('.F20').text(data.data.F20)
   				$('.F21').text(data.data.F21)
   				$('.B31').text(data.data.B31)
   				$('.B32').text(data.data.B32)
   				$('.B33').text(data.data.B33)
   				$('.E20').text(data.data.E20)
   				$('.E13').text(data.data.E13)
   				$('.N13').text(data.data.N13+'%')
   				$('.E15').text(data.data.E15)
   				$('.D19').text(data.data.D19)
   				$('.H20').text(data.data.H20)
   				$('.H13').text(data.data.H13)
   				$('.O13').text(data.data.O13+'%')
   				$('.H15').text(data.data.H15)
   				$('.G19').text(data.data.G19)
   				$('.J15').text(data.data.J15+' PKR')
   				$('.J19').text(data.data.J19)

   				$('.C63').val(data.data.C63+' PKR')
   				$('.C16').val(data.data.C16)
   				$('.F18').val(data.data.F18)
   				$('.F19').val(data.data.F19)
   				$('.F20').val(data.data.F20)
   				$('.F21').val(data.data.F21)
   				$('.B31').val(data.data.B31)
   				$('.B32').val(data.data.B32)
   				$('.B33').val(data.data.B33)
   				$('.E20').val(data.data.E20)
   				$('.E13').val(data.data.E13)
   				$('.N13').val(data.data.N13+'%')
   				$('.E15').val(data.data.E15)
   				$('.D19').val(data.data.D19)
   				$('.H20').val(data.data.H20)
   				$('.H13').val(data.data.H13)
   				$('.O13').val(data.data.O13+'%')
   				$('.H15').val(data.data.H15)
   				$('.G19').val(data.data.G19)
   				$('.J15').val(data.data.J15+' PKR')
   				$('.J19').val(data.data.J19)
   				$('.E18').val(data.data.E18)
   				$('.H18').val(data.data.H18)
   				$('.C106').val(data.data.C106)
   				$('.B96').val(data.data.B96)
   				$('.B67').val(data.data.B67)
   				$('.C112').val(data.data.C112)
   				$('.C164').val(data.data.C164)
				$('.annual_energy_grid_use_solar_only').val(data.data.annual_energy_grid_use_solar_only)
				$('.annual_energy_grid_use_solar_plus_battery').val(data.data.annual_energy_grid_use_solar_plus_battery)

				$('.annual_energy_self_use_solar_only').val(data.data.annual_energy_self_use_solar_only)
				$('.annual_energy_self_use_solar_plus_battery').val(data.data.annual_energy_self_use_solar_plus_battery)

				$('.annual_energy_net_metered_solar_only').val(data.data.annual_energy_net_metered_solar_only)
				$('.annual_energy_net_metered_solar_plus_battery').val(data.data.annual_energy_net_metered_solar_plus_battery)
				$('.net_monthly_charges_no_solar_jan').val(data.data.net_monthly_charges_no_solar_jan)
				$('.net_monthly_charges_no_solar_feb').val(data.data.net_monthly_charges_no_solar_feb)
				$('.net_monthly_charges_no_solar_mar').val(data.data.net_monthly_charges_no_solar_mar)
				$('.net_monthly_charges_no_solar_apr').val(data.data.net_monthly_charges_no_solar_apr)
				$('.net_monthly_charges_no_solar_may').val(data.data.net_monthly_charges_no_solar_may)
				$('.net_monthly_charges_no_solar_jun').val(data.data.net_monthly_charges_no_solar_jun)
				$('.net_monthly_charges_no_solar_jul').val(data.data.net_monthly_charges_no_solar_jul)
				$('.net_monthly_charges_no_solar_aug').val(data.data.net_monthly_charges_no_solar_aug)
				$('.net_monthly_charges_no_solar_sep').val(data.data.net_monthly_charges_no_solar_sep)
				$('.net_monthly_charges_no_solar_oct').val(data.data.net_monthly_charges_no_solar_oct)
				$('.net_monthly_charges_no_solar_nov').val(data.data.net_monthly_charges_no_solar_nov)
				$('.net_monthly_charges_no_solar_dec').val(data.data.net_monthly_charges_no_solar_dec)
				$('.net_monthly_charges_solar_only_jan').val(data.data.net_monthly_charges_solar_only_jan)
				$('.net_monthly_charges_solar_only_feb').val(data.data.net_monthly_charges_solar_only_feb)
				$('.net_monthly_charges_solar_only_mar').val(data.data.net_monthly_charges_solar_only_mar)
				$('.net_monthly_charges_solar_only_apr').val(data.data.net_monthly_charges_solar_only_apr)
				$('.net_monthly_charges_solar_only_may').val(data.data.net_monthly_charges_solar_only_may)
				$('.net_monthly_charges_solar_only_jun').val(data.data.net_monthly_charges_solar_only_jun)
				$('.net_monthly_charges_solar_only_jul').val(data.data.net_monthly_charges_solar_only_jul)
				$('.net_monthly_charges_solar_only_aug').val(data.data.net_monthly_charges_solar_only_aug)
				$('.net_monthly_charges_solar_only_sep').val(data.data.net_monthly_charges_solar_only_sep)
				$('.net_monthly_charges_solar_only_oct').val(data.data.net_monthly_charges_solar_only_oct)
				$('.net_monthly_charges_solar_only_nov').val(data.data.net_monthly_charges_solar_only_nov)
				$('.net_monthly_charges_solar_only_dec').val(data.data.net_monthly_charges_solar_only_dec)
				$('.net_monthly_saving_solar_battery_chart_jan').val(data.data.net_monthly_saving_solar_battery_chart_jan)
				$('.net_monthly_saving_solar_battery_chart_feb').val(data.data.net_monthly_saving_solar_battery_chart_feb)
				$('.net_monthly_saving_solar_battery_chart_mar').val(data.data.net_monthly_saving_solar_battery_chart_mar)
				$('.net_monthly_saving_solar_battery_chart_apr').val(data.data.net_monthly_saving_solar_battery_chart_apr)
				$('.net_monthly_saving_solar_battery_chart_may').val(data.data.net_monthly_saving_solar_battery_chart_may)
				$('.net_monthly_saving_solar_battery_chart_jun').val(data.data.net_monthly_saving_solar_battery_chart_jun)
				$('.net_monthly_saving_solar_battery_chart_jul').val(data.data.net_monthly_saving_solar_battery_chart_jul)
				$('.net_monthly_saving_solar_battery_chart_aug').val(data.data.net_monthly_saving_solar_battery_chart_aug)
				$('.net_monthly_saving_solar_battery_chart_sep').val(data.data.net_monthly_saving_solar_battery_chart_sep)
				$('.net_monthly_saving_solar_battery_chart_oct').val(data.data.net_monthly_saving_solar_battery_chart_oct)
				$('.net_monthly_saving_solar_battery_chart_nov').val(data.data.net_monthly_saving_solar_battery_chart_nov)
				$('.net_monthly_saving_solar_battery_chart_dec').val(data.data.net_monthly_saving_solar_battery_chart_dec)
				$('.solar_only_cumulative_payback_cash_flow_PKR_usage').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_usage)
				$('.solar_only_cumulative_payback_cash_flow_PKR_one').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_one)
				$('.solar_only_cumulative_payback_cash_flow_PKR_two').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_two)
				$('.solar_only_cumulative_payback_cash_flow_PKR_three').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_three)
				$('.solar_only_cumulative_payback_cash_flow_PKR_four').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_four)
				$('.solar_only_cumulative_payback_cash_flow_PKR_five').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_five)
				$('.solar_only_cumulative_payback_cash_flow_PKR_six').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_six)
				$('.solar_only_cumulative_payback_cash_flow_PKR_seven').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_seven)
				$('.solar_only_cumulative_payback_cash_flow_PKR_eight').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_eight)
				$('.solar_only_cumulative_payback_cash_flow_PKR_nine').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_nine)
				$('.solar_only_cumulative_payback_cash_flow_PKR_ten').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_ten)
				$('.solar_only_cumulative_payback_cash_flow_PKR_eleven').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_eleven)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twelve').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twelve)
				$('.solar_only_cumulative_payback_cash_flow_PKR_thirteen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_thirteen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_fourteen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_fourteen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_fifteen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_fifteen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_sixteen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_sixteen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_seventeen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_seventeen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_eighteen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_eighteen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_nineteen').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_nineteen)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twenty').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twenty)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twenty_one').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twenty_one)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twenty_two').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twenty_two)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twenty_three').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twenty_three)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twenty_four').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twenty_four)
				$('.solar_only_cumulative_payback_cash_flow_PKR_twenty_five').val(data.data.solar_only_cumulative_payback_cash_flow_PKR_twenty_five)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_usage').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_usage)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_one').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_one)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_two').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_two)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_three').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_three)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_four').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_four)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_five').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_five)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_six').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_six)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_seven').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_seven)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_eight').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_eight)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_nine').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_nine)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_ten').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_ten)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four)
				$('.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five').val(data.data.solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five)



   				$('.lead_data_store').click();
           	}


        })
	})
	$(document).ready(function () {
		$('body').on('click', '.lead_data_store', function() {
			//$(".lead_data_storeee").click(function() {
				// console.log('working')
				// alert('working');
			var token = $("meta[name='csrf-token']").attr("content");
			var data = {
				'id': $("input[name='lead-id']").val(),
				'C63': $("input[name='C63']").val(),
				'C16': $("input[name='C16']").val(),
				'F18': $("input[name='F18']").val(),
				'F19': $("input[name='F19']").val(),
				'F20': $("input[name='F20']").val(),
				'F21': $("input[name='F21']").val(),
				'B31': $("input[name='B31']").val(),
				'B32': $("input[name='B32']").val(),
				'B33': $("input[name='B33']").val(),
				'E20': $("input[name='E20']").val(),
				'E13': $("input[name='E13']").val(),
				'N13': $("input[name='N13']").val(),
				'E15': $("input[name='E15']").val(),
				'D19': $("input[name='D19']").val(),
				'H20': $("input[name='H20']").val(),
				'H13': $("input[name='H13']").val(),
				'O13': $("input[name='O13']").val(),
				'H15': $("input[name='H15']").val(),
				'G19': $("input[name='G19']").val(),
				'J15': $("input[name='J15']").val(),
				'J19': $("input[name='J19']").val(),
				'E18': $("input[name='E18']").val(),
				'H18': $("input[name='H18']").val(),
				'C106': $("input[name='C106']").val(),
				'B96': $("input[name='B96']").val(),
				'B67': $("input[name='B67']").val(),
				'C112': $("input[name='C112']").val(),
				'C164': $("input[name='C164']").val(),

				'annual_energy_grid_use_solar_only': $("input[name='annual_energy_grid_use_solar_only']").val(),
				'annual_energy_grid_use_solar_plus_battery': $("input[name='annual_energy_grid_use_solar_plus_battery']").val(),

				'annual_energy_self_use_solar_only': $("input[name='annual_energy_self_use_solar_only']").val(),
				'annual_energy_self_use_solar_plus_battery': $("input[name='annual_energy_self_use_solar_plus_battery']").val(),

				'annual_energy_net_metered_solar_only': $("input[name='annual_energy_net_metered_solar_only']").val(),
				'annual_energy_net_metered_solar_plus_battery': $("input[name='annual_energy_net_metered_solar_plus_battery']").val(),

								'net_monthly_charges_no_solar_jan': $("input[name='net_monthly_charges_no_solar_jan']").val(),
				'net_monthly_charges_no_solar_feb': $("input[name='net_monthly_charges_no_solar_feb']").val(),
				'net_monthly_charges_no_solar_mar': $("input[name='net_monthly_charges_no_solar_mar']").val(),
				'net_monthly_charges_no_solar_apr': $("input[name='net_monthly_charges_no_solar_apr']").val(),
				'net_monthly_charges_no_solar_may': $("input[name='net_monthly_charges_no_solar_may']").val(),
				'net_monthly_charges_no_solar_jun': $("input[name='net_monthly_charges_no_solar_jun']").val(),
				'net_monthly_charges_no_solar_jul': $("input[name='net_monthly_charges_no_solar_jul']").val(),
				'net_monthly_charges_no_solar_aug': $("input[name='net_monthly_charges_no_solar_aug']").val(),
				'net_monthly_charges_no_solar_sep': $("input[name='net_monthly_charges_no_solar_sep']").val(),
				'net_monthly_charges_no_solar_oct': $("input[name='net_monthly_charges_no_solar_oct']").val(),
				'net_monthly_charges_no_solar_nov': $("input[name='net_monthly_charges_no_solar_nov']").val(),
				'net_monthly_charges_no_solar_dec': $("input[name='net_monthly_charges_no_solar_dec']").val(),
				'net_monthly_charges_solar_only_jan': $("input[name='net_monthly_charges_solar_only_jan']").val(),
				'net_monthly_charges_solar_only_feb': $("input[name='net_monthly_charges_solar_only_feb']").val(),
				'net_monthly_charges_solar_only_mar': $("input[name='net_monthly_charges_solar_only_mar']").val(),
				'net_monthly_charges_solar_only_apr': $("input[name='net_monthly_charges_solar_only_apr']").val(),
				'net_monthly_charges_solar_only_may': $("input[name='net_monthly_charges_solar_only_may']").val(),
				'net_monthly_charges_solar_only_jun': $("input[name='net_monthly_charges_solar_only_jun']").val(),
				'net_monthly_charges_solar_only_jul': $("input[name='net_monthly_charges_solar_only_jul']").val(),
				'net_monthly_charges_solar_only_aug': $("input[name='net_monthly_charges_solar_only_aug']").val(),
				'net_monthly_charges_solar_only_sep': $("input[name='net_monthly_charges_solar_only_sep']").val(),
				'net_monthly_charges_solar_only_oct': $("input[name='net_monthly_charges_solar_only_oct']").val(),
				'net_monthly_charges_solar_only_nov': $("input[name='net_monthly_charges_solar_only_nov']").val(),
				'net_monthly_charges_solar_only_dec': $("input[name='net_monthly_charges_solar_only_dec']").val(),
				'net_monthly_saving_solar_battery_chart_jan': $("input[name='net_monthly_saving_solar_battery_chart_jan']").val(),
				'net_monthly_saving_solar_battery_chart_feb': $("input[name='net_monthly_saving_solar_battery_chart_feb']").val(),
				'net_monthly_saving_solar_battery_chart_mar': $("input[name='net_monthly_saving_solar_battery_chart_mar']").val(),
				'net_monthly_saving_solar_battery_chart_apr': $("input[name='net_monthly_saving_solar_battery_chart_apr']").val(),
				'net_monthly_saving_solar_battery_chart_may': $("input[name='net_monthly_saving_solar_battery_chart_may']").val(),
				'net_monthly_saving_solar_battery_chart_jun': $("input[name='net_monthly_saving_solar_battery_chart_jun']").val(),
				'net_monthly_saving_solar_battery_chart_jul': $("input[name='net_monthly_saving_solar_battery_chart_jul']").val(),
				'net_monthly_saving_solar_battery_chart_aug': $("input[name='net_monthly_saving_solar_battery_chart_aug']").val(),
				'net_monthly_saving_solar_battery_chart_sep': $("input[name='net_monthly_saving_solar_battery_chart_sep']").val(),
				'net_monthly_saving_solar_battery_chart_oct': $("input[name='net_monthly_saving_solar_battery_chart_oct']").val(),
				'net_monthly_saving_solar_battery_chart_nov': $("input[name='net_monthly_saving_solar_battery_chart_nov']").val(),
				'net_monthly_saving_solar_battery_chart_dec': $("input[name='net_monthly_saving_solar_battery_chart_dec']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_usage' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_usage']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_one' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_one']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_two' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_two']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_three' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_three']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_four' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_four']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_five' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_five']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_six' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_six']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_seven' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_seven']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_eight' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_eight']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_nine' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_nine']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_ten' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_ten']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_eleven' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_eleven']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twelve' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twelve']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_thirteen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_thirteen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_fourteen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_fourteen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_fifteen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_fifteen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_sixteen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_sixteen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_seventeen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_seventeen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_eighteen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_eighteen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_nineteen' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_nineteen']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twenty' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twenty']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twenty_one' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twenty_one']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twenty_two' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twenty_two']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twenty_three' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twenty_three']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twenty_four' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twenty_four']").val(),
				'solar_only_cumulative_payback_cash_flow_PKR_twenty_five' : $("input[name='solar_only_cumulative_payback_cash_flow_PKR_twenty_five']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_usage' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_usage']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_one' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_one']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_two' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_two']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_three' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_three']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_four' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_four']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_five' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_five']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_six' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_six']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_seven' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_seven']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_eight' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_eight']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_nine' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_nine']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_ten' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_ten']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four']").val(),
				'solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five' : $("input[name='solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five']").val(),
				_token: token,
			}

	   		console.log(data)
			$.ajax({
	        	type: 'POST',
	        	url: "{{ route('lead_data_store') }}",
	           	data: data,
	           	success:function(data){
	   				//console.log(data)
	   			}
	        })
		})
	})



	</script>
		@yield('script')
	</body>
</html>