<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Magang {{$title}}</title>
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.4/js/dataTables.bootstrap5.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css">
	{{-- Sweet Alert --}}
	<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js
"></script>
	<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css
" rel="stylesheet">
</head>

<body>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
		data-sidebar-position="fixed" data-header-position="fixed">
		<!-- Sidebar Start -->
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div>
				<div class="brand-logo d-flex align-items-center justify-content-between">
					<a href="#" class="text-nowrap logo-img">
						<img src="{{asset('assets/images/logos/logo-akti.png')}}" width="180" alt="" />
					</a>
					<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
						<i class="ti ti-x fs-8"></i>
					</div>
				</div>
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
					<ul id="sidebarnav">
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Home</span>
						</li>
						{{-- Menu admin --}}
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/dashboard')}}" aria-expanded="false">
								<span>
									<i class="ti ti-layout-dashboard"></i>
								</span>
								<span class="hide-menu">Dashboard</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Menu Mahasiswa</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/mahasiswa')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Mahasiswa</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/dosen-pembimbing')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Dosen Pembimbing</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Menu Grup Leader</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/grup-leader')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Grup Leader</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/mentor-vokasi')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Mentor Vokasi</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Menu Departement</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/departement')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Department</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/departement-head')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Department Head</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Menu Section</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/section')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Section</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{url('admin/section-head')}}" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">Section Head</span>
							</a>
						</li>

					</ul>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
		<!--  Sidebar End -->
		<!--  Main wrapper -->
		<div class="body-wrapper">
			<!--  Header Start -->
			<header class="app-header">
				<nav class="navbar navbar-expand-lg navbar-light">
					<ul class="navbar-nav">
						<li class="nav-item d-block d-xl-none">
							<a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
								href="javascript:void(0)">
								<i class="ti ti-menu-2"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-icon-hover" href="javascript:void(0)">
								<i class="ti ti-bell-ringing"></i>
								<div class="notification bg-primary rounded-circle"></div>
							</a>
						</li>
					</ul>
					<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
						<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
							<li class="nav-item dropdown">
								<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
									data-bs-toggle="dropdown" aria-expanded="false">
									<img src="{{asset('assets/images/profile/user-1.jpg')}}" alt="" width="35"
										height="35" class="rounded-circle">
								</a>
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
									aria-labelledby="drop2">
									<div class="message-body">
										<a href="javascript:void(0)"
											class="d-flex align-items-center gap-2 dropdown-item">
											<i class="ti ti-user fs-6"></i>
											<p class="mb-0 fs-3">My Profile</p>
										</a>
										<a href="javascript:void(0)"
											class="d-flex align-items-center gap-2 dropdown-item">
											<i class="ti ti-mail fs-6"></i>
											<p class="mb-0 fs-3">My Account</p>
										</a>
										<a href="javascript:void(0)"
											class="d-flex align-items-center gap-2 dropdown-item">
											<i class="ti ti-list-check fs-6"></i>
											<p class="mb-0 fs-3">My Task</p>
										</a>
										<a href="./authentication-login.html"
											class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!--  Header End -->
			<div class="container-fluid">
				@yield('main')
				<div class="py-6 px-6 text-center">
					<p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
							class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
							href="https://themewagon.com">ThemeWagon</a></p>
				</div>
			</div>
		</div>
	</div>
	<script>
		new DataTable('#table')
	</script>
	<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
	<script src="{{asset('assets/js/app.min.js')}}"></script>
	<script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
	<script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
	<script src="{{asset('assets/js/dashboard.js')}}"></script>
</body>

</html>