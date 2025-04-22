<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- /global stylesheets -->
	
	<!-- Core JS files -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_velocity_ui.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/velocity/velocity.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/velocity/velocity.ui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_velocity_examples.js')}}"></script>
	
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ_Y429gUDbCJgatVb_J9V2bS_pzo_rLM&callback=initMap"></script> --}}
	<script src="{{asset('global_assets/js/demo_maps/google/drawings/circles.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_maps/google/drawings/polylines.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_maps/google/drawings/polygons.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_maps/google/drawings/rectangles.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_css3.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar role admin -->
	@if (optional(auth()->user())->hasAnyRole(['admin']))
	<div class="navbar navbar-expand-md navbar-light navbar-static">
		<div class="navbar-brand" style="display: flex; align-items: center;">
				<a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none; color: #fff;">
					<img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">
					<span style="font-size: 18px; font-weight: bold; margin-left: 10px; vertical-align: middle;"> Loop Tourney </span>
				</a>
			</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success my-3 my-md-0 ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-2" height="34" alt="User Avatar">
						<span class="navbar-text">
							@if (auth()->check())
								Halo, {{ auth()->user()->name }}
							@else
								Guest
							@endif
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						@if (auth()->check())
							<a href="{{ route('logout') }}" class="dropdown-item">
								<i class="icon-switch2"></i> Logout
							</a>
						@else
							<a href="{{ route('login') }}" class="dropdown-item">
								<i class="icon-switch2"></i> Login
							</a>
						@endif
					</div>
				</li>
			</ul>
		</div>
	</div>
	@endif
	<!-- /main navbar -->
	
	{{-- Main navbar role user --}}
		@if (optional(auth()->user())->hasAnyRole(['user']))
		<div class="navbar navbar-expand-md navbar-light navbar-static">
			<div class="navbar-brand" style="display: flex; align-items: center;">
				<a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none; color: #fff;">
					<img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">
					<span style="font-size: 18px; font-weight: bold; margin-left: 10px; vertical-align: middle;"> Loop Tourney</span>
				</a>
			</div>


			<div class="d-md-none">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
					<i class="icon-tree5"></i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbarmobile">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link ">Home</a></li>
					@if (optional(auth()->user())->hasAnyRole(['admin']))
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
					@endif
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link ">Artikel</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link active">Hubungi Kami</a></li>
				</ul>

				<ul class="navbar-nav ml-xl-auto">
					<li class="nav-item dropdown dropdown-user">
						<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
							<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-2" height="34" alt="User Avatar">
							<span class="navbar-text">
								@if (auth()->check())
									Halo, {{ auth()->user()->name }}
								@else
									Guest
								@endif
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							@if (auth()->check())
								<a href="{{ route('logout') }}" class="dropdown-item">
									<i class="icon-switch2"></i> Logout
								</a>
							@else
								<a href="{{ route('login') }}" class="dropdown-item">
									<i class="icon-switch2"></i> Login
								</a>
							@endif
						</div>
					</li>

				</ul>
			</div>
		</div>
	@endif
	{{-- /Main Navbar role user --}}


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		 @if (optional(auth()->user())->hasAnyRole(['admin']))
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">
									@if (auth()->check())
										{{ auth()->user()->name }}
									@else
										Guest
									@endif
								</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{route('admin.index')}}" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard Admin
									<span class="d-block font-weight-normal opacity-50"></span>
								</span>
							</a>
						<p></p>
							<hr>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-indent-decrease2"></i> <span>Data Akun</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Sidebars">
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link"> Admin </a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="{{route('roles.index')}}" class="nav-link">Data Role</a></li>
										{{-- <li class="nav-item"><a href="{{route('permissions.index')}}" class="nav-link">Data Permission</a></li> --}}
									</ul>
								</li>
								<li class="nav-item">
									<a href="{{route('account.index')}}" class="nav-link"> Daftar Akun </a>
								</li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link active"><i class="icon-users4 mr-3"></i> <span>User Page</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{route('landing')}}" class="nav-link"> Home </a></li>
								<li class="nav-item"><a href="{{route('game-event.index')}}" class="nav-link"> Game Turnamaent </a></li>
								<li class="nav-item"><a href="{{route('event-community.index')}}" class="nav-link"> Komunitas </a></li>
								<li class="nav-item"><a href="{{route('article.index')}}" class="nav-link"> Article </a></li>
								<li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link active"> Hubungi Kami </a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		@endif
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header border-bottom-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">				
		 			@if (optional(auth()->user())->hasAnyRole(['admin']))
						<h4> 
							<img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> 
							<span class="font-weight-semibold">Halaman</span> - Kontak
						</h4>
					@endif
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">
			    <!-- /info alert -->


				<div class="card" >
					<div class="card-header header-elements-inline">
						<h2 class="card-title" data-transition="bounceUpIn"></h2>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>
                    <div class="card shadow-sm p-4">
						<div id="map_drawing_rectangle" style="height: 500px; width: 100%;"></div>
						<p></p>
						<hr>
                    <div class="contact-info">
                        <p><i class="icon-location4 mr-3 icon-2x"></i>{{ $contact->location}}</p> 
                        
                        <p><i class="icon-phone mr-3 icon-2x"></i>{{ $contact->telepon}}</p>
                        <p><i class="icon-mail-read mr-3 icon-2x"></i> {{ $contact->email }}</p>
                
                    </div>
						@if (optional(auth()->user())->hasAnyRole(['admin']))
						<div class="card-footer mt-3">
							<a href="{{ route('contact.show', $contact->id) }}" class="btn btn-secondary btn-sm"><i class="icon-file-eye mr-3"></i>
								Detail Data
							</a>
						</div>
						@endif
                    </div>
				</div>

				<!-- Navbar classes -->
				<div class="card" >
					<div class="card-header header-elements-inline">
						<h2 class="card-title" data-transition="bounceUpIn">Hubungi Kami</h2>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card shadow-sm p-4  ">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf

							 <div class="mb-3">
								<label for="subject" class="form-label">Subjek*</label>
								<select name="subject" id="subject" class="form-select" required>
									<option value="">Pilih Subjek</option>
                                    <option value="Informasi">Informasi</option>
                                    <option value="Rencana Acara">Rencana Acara</option>
                                    <option value="Pengajuan Membuat Game Event">Pengajuan Membuat Game Event</option>
                                    <option value="Pengajuan Membuat Komunitas">Pengajuan Membuat Komunitas</option>
								</select>
							</div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fname" class="form-label">Nama Depan*</label>
                                    <input type="text" name="fname" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lname" class="form-label">Nama Belakang*</label>
                                    <input type="text" name="lname" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon*</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan*</label>
                                <textarea name="message" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Kirim</button>
                        </form>
                    </div>
				</div>

				<!-- /navbar classes -->

			</div>
			<!-- /content area -->


			{{-- Footer User --}}
				@if (optional(auth()->user())->hasAnyRole(['user']))
					<div class="navbar navbar-expand-xl navbar-dark rounded-bottom">
						<div class="navbar-collapse collapse">
							<span class="navbar-text">
								&copy; 2015 - 2025. <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">Loop Tourney</a>
							</span>
							<ul class="navbar-nav ml-xl-auto">
								<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Pusat Batuan</a></li>
							</ul>
						</div>
					</div>
				@endif
			{{-- Footer User --}}
			
			<!-- Footer admin-->
				@if (optional(auth()->user())->hasAnyRole(['admin']))
					<div class="navbar navbar-expand-lg navbar-light">
						<div class="text-center d-lg-none w-100">
							<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
								<i class="icon-unfold mr-2"></i>
								Footer
							</button>
						</div>

						<div class="navbar-collapse collapse" id="navbar-footer">
							<span class="navbar-text">
								&copy; 2015 - 2025. <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">Loop Tourney</a>
							</span>

							<ul class="navbar-nav ml-lg-auto">
								<li class="nav-item"><i class="icon-lifebuoy mr-2"></i> </a></li>
								<li class="nav-item"><i class="icon-file-text2 mr-2"></i> </a></li>
								<li class="nav-item"><i class="icon-cart2 mr-2"></i> </span></a></li>
							</ul>
						</div>
					</div>
				@endif
			<!-- /footer admin -->

		</div>
		<!-- /main content -->

	</div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ_Y429gUDbCJgatVb_J9V2bS_pzo_rLM&callback=initMap" async defer></script>
	<script>
		function initMap() {
			// Pastikan elemen peta ada
			const mapElement = document.getElementById("map_drawing_rectangle");
			
			if (!mapElement) {
				console.error("Elemen peta tidak ditemukan!");
				return;
			}
			
			const lokasiAwal = { lat: -6.993179, lng: 110.350855 };
			
			// Buat peta
			const map = new google.maps.Map(mapElement, {
				zoom: 16,
				center: lokasiAwal,
				mapTypeId: 'roadmap'
			});

			// Tambahkan marker (gunakan addListener yang baru)
			const marker = new google.maps.Marker({
				position: lokasiAwal,
				map: map,
				title: "Lokasi Awal",
				icon: {
					url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
				}
			});

			// Contoh event listener modern
			marker.addListener("click", () => {
				console.log("Marker diklik!");
			});
		}

	</script>

	<!-- /page content -->

</body>
</html>
