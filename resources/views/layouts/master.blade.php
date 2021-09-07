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
		@yield('script')
	</body>
</html>