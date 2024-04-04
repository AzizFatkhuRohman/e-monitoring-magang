<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>AKTI {{$title}}</title>
	<meta name="description" content="" />
	<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/logo-akti.png')}}" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}"
		class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
	<script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
	<script src="{{asset('assets/js/config.js')}}"></script>
	{{-- Data Table --}}
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
	{{--
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	--}}
	{{--
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css"> --}}
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
				<div class="app-brand demo">
					<a href="index.html" class="app-brand-link">
						<img src="{{asset('assets/img/favicon/logo-akti.png')}}" class="app-brand-logo demo" alt=""
							style="width: 150px">
					</a>

					<a href="javascript:void(0);"
						class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
						<i class="bx bx-chevron-left bx-sm align-middle"></i>
					</a>
				</div>

				<div class="menu-inner-shadow"></div>

				<ul class="menu-inner py-1">
					<!-- Dashboard -->
					<li class="menu-item {{ $title == 'Dashboard' ? 'active' : '' }}">
						<a href="{{url('dashboard-student')}}" class="menu-link">
							<i class="menu-icon tf-icons bx bxs-dashboard"></i>
							<div data-i18n="Analytics">Dashboard</div>
						</a>
					</li>

					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">Pages</span>
					</li>
					<li class="menu-item {{ $title == 'Logbook' ? 'active' : '' }}">
						<a href="{{url('logbook')}}" class="menu-link">
							<i class='menu-icon tf-icons bx bxs-book-bookmark'></i>
							<div data-i18n="Analytics">Logbook</div>
						</a>
					</li>
					<li class="menu-item {{ $title == 'Assessment Notes' ? 'active' : '' }}">
						<a href="{{url('assessment-notes')}}" class="menu-link">
							<i class='menu-icon tf-icons bx bxs-notepad'></i>
							<div data-i18n="Analytics">Assessment Notes</div>
						</a>
					</li>
					<li class="menu-item {{ $title == 'User Account' | $title == 'Student Account' ? 'active' : '' }}">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class='menu-icon tf-icons bx bx-user-circle'></i>
							<div data-i18n="Layouts">Account</div>
						</a>

						<ul class="menu-sub">
							<li class="menu-item {{$title == 'Profile Student' ? 'active open' : ''}}">
								<a href="{{url('profile-student')}}" class="menu-link">
									<div data-i18n="Without menu">Profile Student</div>
								</a>
							</li>
							<li class="menu-item {{$title == 'Student Account' ? 'active open' : ''}}">
								<a href="{{url('student-account')}}" class="menu-link">
									<div data-i18n="Without navbar">Student Account</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->

				<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
					id="layout-navbar">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="bx bx-menu bx-sm"></i>
						</a>
					</div>

					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


						<ul class="navbar-nav flex-row align-items-center ms-auto">

							<!-- User -->
							<li class="nav-item">
								<form action="{{url('logout')}}" method="post">
									<button class="btn btn-danger btn-sm rounded" type="button" onclick="logoutFunc()">
										<i class='bx bx-power-off'></i>
									</button>
								</form>
							</li>
							<!--/ User -->
						</ul>
					</div>
				</nav>

				<!-- / Navbar -->
				<div class="content-wrapper">
					@yield('main')
					<!-- Footer -->
					<footer class="content-footer footer bg-footer-theme">
						<div
							class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
							<div class="mb-2 mb-md-0">
								©
								<script>
									document.write(new Date().getFullYear());
								</script>
								, made with ❤️ by
								<a href="https://themeselection.com" target="_blank"
									class="footer-link fw-bolder">AKTI</a>
							</div>
						</div>
					</footer>
					<!-- / Footer -->

					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->
	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script>
		function logoutFunc(){
			alert('Hello')
		}
	</script>
	<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
	<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
	<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

	<script src="{{asset('assets/vendor/js/menu.js')}}"></script>
	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

	<!-- Main JS -->
	<script src="{{asset('assets/js/main.js')}}"></script>

	<!-- Page JS -->
	<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
	<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>

	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>