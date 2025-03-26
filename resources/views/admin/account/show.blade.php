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
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>

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

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="d-md-none ml-2">Messages</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Messages</span>
							<a href="#" class="text-default"><i class="icon-compose"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3 position-relative">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>

									<div class="media-body">
										<div class="media-title">
											<a href="#">
												<span class="font-weight-semibold text-white">James Alexander</span>
												<span class="text-muted float-right font-size-sm">04:58</span>
											</a>
										</div>

										<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
									</div>
								</li>

								<li class="media">
									<div class="mr-3 position-relative">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>

									<div class="media-body">
										<div class="media-title">
											<a href="#">
												<span class="font-weight-semibold text-white">Margo Baker</span>
												<span class="text-muted float-right font-size-sm">12:16</span>
											</a>
										</div>

										<span class="text-muted">That was something he was unable to do because...</span>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<div class="media-title">
											<a href="#">
												<span class="font-weight-semibold text-white">Jeremy Victorino</span>
												<span class="text-muted float-right font-size-sm">22:48</span>
											</a>
										</div>

										<span class="text-muted">But that would be extremely strained and suspicious...</span>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<div class="media-title">
											<a href="#">
												<span class="font-weight-semibold text-white">Beatrix Diaz</span>
												<span class="text-muted float-right font-size-sm">Tue</span>
											</a>
										</div>

										<span class="text-muted">What a strenuous career it is that I've chosen...</span>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<div class="media-title">
											<a href="#">
												<span class="font-weight-semibold text-white">Richard Vango</span>
												<span class="text-muted float-right font-size-sm">Mon</span>
											</a>
										</div>
										
										<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
									</div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer justify-content-center p-0">
							<a href="#" class="text-muted w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
						</div>
					</div>
				</li>

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
		<div class="navbar navbar-dark navbar-expand-xl">
		<div class="navbar-brand">
			<a href="#" class="d-inline-block">
				<img src="{{asset('global_assets/images/logo_light.png')}}" alt="">
			</a>
		</div>

		<div class="d-xl-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
				<i class="icon-grid3"></i>
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-demo1-mobile">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="" class="navbar-nav-link">Home</a></li>
				 @if (optional(auth()->user())->hasAnyRole(['admin']))
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
				@endif

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('login')}}" class="dropdown-item">Login</a>
						<a href="#" class="dropdown-item">Event</a>
						<a href="{{route('article')}}" class="dropdown-item">Artikel</a>
						<a href="#" class="dropdown-item">Lainnya</a>
					</div>
				</li>
			</ul>

			<span class="navbar-text ml-xl-3">
				<span class="badge bg-success">Online</span>
			</span>

			<ul class="navbar-nav ml-xl-auto">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-bell2"></i>
						<span class="d-xl-none ml-2">Notifications</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-xl-0">2</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-bubbles4"></i>
						<span class="d-xl-none ml-2">Messages</span>
					</a>
				</li>
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
								<div class="media-title font-weight-semibold">Victoria Baker</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
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
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>User Page</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{route('landing')}}" class="nav-link"> Home </a></li>
								<li class="nav-item"><a href="{{route('game-event.index')}}" class="nav-link active"> Game Turnament </a></li>
								<li class="nav-item"><a href="{{route('event-community.index')}}" class="nav-link "> Komunitas </a></li>
								<li class="nav-item"><a href="../../../../layout_6/LTR/dark/full/index.html" class="nav-link disabled">Coming soon <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
							</ul>
						</li>
						<!-- /main -->
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Detail Game Turnament</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none mb-3 mb-md-0">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator"></i> <span>Invoices</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5"></i> <span>Schedule</span></a>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Info alert -->
				<div class="alert alert-info bg-light text-default alert-styled-left alert-arrow-left alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<h6 class="alert-heading font-weight-semibold mb-1">
						@if (auth()->check())
							Selamat Datang , {{ auth()->user()->name }}
						@else
							Guest
						@endif
					</h6>
					
			    </div>
			    <!-- /info alert -->


				<!-- Navbar classes -->
				<div class="card" >
					<div class="card-header header-elements-inline">
						<h2 class="card-title"></h2>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>

					<div class="card-body">
						<ul class="nav nav-tabs nav-tabs-highlight">
							<li class="nav-item"><a href="#right-icon-tab1" class="nav-link active" data-toggle="tab">Detail Game Turnament {{ $game_event->name ?? 'Nama tidak tersedia' }} </a></li>
							<li class="nav-item dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Aksi </a>
								<div class="dropdown-menu dropdown-menu-right">
									<div>
										<form action="{{ route('request.community') }}" method="POST">
											@csrf
											<a class="dropdown-item">Ajukan Pembuatan Komunitas</a>
										</form>
									</div>
									<div>
										<form action="{{ route('request.game') }}" method="POST">
											@csrf
											<a class="dropdown-item">Ajukan Pembuatan Game</a>
										</form>
									</div>
								</div>
							</li>
						</ul>

					</div>

					
						<div class="container mt-4">
							<div class="card" id="right-icon-tab1">
								<div class="card-body">
									<table class="table table-bordered">
										<tr>
											<th>ID</th>
											<td>{{ $game_event->id ?? 'Tidak tersedia' }}</td>
										</tr>
										<tr>
											<th>Nama Event</th>
											<td>{{ $game_event->name ?? 'Tidak tersedia' }}</td>
										</tr>
										<tr>
											<th>Thumbnail</th>
											<td>
												@if (!empty($game_event->thumbnail))
												<img src="{{ asset($game_event->thumbnail) }}" alt="Thumbnail" height="100px">
												@else
												<span class="text-muted">Tidak ada gambar</span>
												@endif
											</td>
										</tr>
										<tr>
											<th>Owner</th>
											<td>{{ $game_event->user?->name ?? 'Tidak ada' }}</td>
										</tr>
										<tr>
											<th>Penyelenggara</th>
											<td>{{ $game_event->organizer ?? 'Tidak ada' }}</td>
										</tr>
										<tr>
											<th>Maximum Slot</th>
											<td>{{ $game_event->slot_limit ?? 0 }}</td>
										</tr>
										<tr>
											<th>Slot Terisi</th>
											<td>{{ $game_event->slot_filled ?? 0 }} / {{ $game_event->slot_limit ?? 0 }}</td>
										</tr>
										<tr>
											<th>Tanggal Dibuat</th>
											<td>{{ $game_event->created_at?->format('d M Y') ?? 'Tidak tersedia' }}</td>
										</tr>
										<tr>
											<th>Deskripsi</th>
											<td>{{ $game_event->description ?? 'Tidak ada deskripsi' }}</td>
										</tr>
									</table>
									<p></p>
									<!-- Tombol Kembali Berdasarkan Peran -->
									@if (optional(auth()->user())->hasAnyRole(['admin']))
										<a href="{{ route('game-event.index') }}" class="btn btn-secondary">Kembali</a>
									@endif

									<a href="{{ route('pendaftaran', $game_event->id ?? 0) }}" class="btn btn-primary">Daftar <i class="icon-paperplane ml-2"></i></a>
									
									@if (optional(auth()->user())->hasAnyRole(['user']))
									<a href="{{ route('landing') }}" class="btn btn-secondary">Kembali</a>
									@endif
								
								
								</div>
							</div>
						</div>

				<!-- /navbar classes -->


				<!-- Body classes -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Body classes</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
                    
				</div>
				<!-- /body classes -->

				{{-- <tr>
									<td>Horizontal form</td>
									<td> <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_form_horizontal">Launch <i class="icon-play3 ml-2"></i></button></td>
									<td>Modal with horizontal form layout. It does also support responsive grid, but in this case it will look best in wider modals</td>
								</tr>
				<!-- Horizontal form modal -->
				<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Horizontal form</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="#" class="form-horizontal">
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-form-label col-sm-3">First name</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Eugene" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Last name</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kopyov" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Email</label>
										<div class="col-sm-9">
											<input type="text" placeholder="eugene@kopyov.com" class="form-control">
											<span class="form-text text-muted">name@domain.com</span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Phone #</label>
										<div class="col-sm-9">
											<input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
											<span class="form-text text-muted">+99-99-9999-9999</span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Address line 1</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Ring street 12, building D, flat #67" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">City</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Munich" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">State/Province</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Bayern" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">ZIP code</label>
										<div class="col-sm-9">
											<input type="text" placeholder="1031" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn bg-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /horizontal form modal --> --}}

			</div>
			<!-- /content area -->


			<!-- Footer -->
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
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
