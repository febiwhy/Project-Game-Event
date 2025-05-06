<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dashboard Admin</title>

	<!-- Global stylesheets -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/velocity/velocity.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/velocity/velocity.ui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_velocity_examples.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_velocity_ui.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/components_modals.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_css3.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_layouts.js')}}"></script>
	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

	</head>
	<body>
	<!-- Main navbar -->
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
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
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
								<div class="media-title font-weight-semibold">Admin</div>
								<div class="font-size-xs opacity-50">
								</div>
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
										<li class="nav-item"><a href="{{route('permissions.index')}}" class="nav-link">Data Permission</a></li>
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
								<li class="nav-item"><a href="{{route('event-community.index')}}" class="nav-link "> Komunitas </a></li>
								<li class="nav-item"><a href="{{route('article.index')}}" class="nav-link"> Article </a></li>
								<li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link"> Hubungi Kami </a></li>
							</ul>
						</li>
						<!-- /main -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>

		
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header border-bottom-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4> <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> <span class="font-weight-semibold">Halaman</span> - Pembaruan Data Peserta {{ $pendaftaran->nama ?? 'Nama' }}</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
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

						<div class="card fade-in">
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
									<div class="row">
										<div class="col-md-10 offset-md-1">
											@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
											@endif

											<!-- Notifikasi Sukses -->
											@if (session('success'))
											<div class="alert alert-success">{{ session('success') }}</div>
											@endif
											<form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" id="form-pendaftar" enctype="multipart/form-data">
												@csrf
												@method('PUT')

												<div class="form-group">
													<label for="nama">Nama :</label>
													<input type="text" class="form-control" name="nama" id="nama" value="{{old('nama', $pendaftaran->nama)}}" placeholder="Massukan Nama Lengkap" required>
												</div>

												<div class="form-group">
													<label for="email">Email :</label>
													<input type="email" class="form-control" name="email" id="email" value="{{old('email', $pendaftaran->email)}}" placeholder="Massukan Email Anda" required>
												</div>

												<div class="form-group">
													<label for="id_number">ID Number :</label>
													<input type="text" class="form-control" name="id_number" id="id_number" value="{{old('id_number', $pendaftaran->id_number)}}" placeholder="Massukan ID Number Anda" required>
												</div>

												<div class="form-group">
													<label for="whatsapp">Whatsapp :</label>
													<input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{old('whatsapp', $pendaftaran->whatsapp)}}" placeholder="Eugene Kopyov" required>
												</div>

												{{-- <div class="form-group">
													<label for="game_pendaftar_id">Game Event:</label>
														<select name="game_pendaftar_id" id="game_pendaftar_id" class="form-control">
															@foreach($events as $event)
																<option value="{{ $event->id }}" {{ old('game_pendaftar_id', $pendaftaran->game_pendaftar_id) == $event->id ? 'selected' : '' }}>
																	{{ $event->name }}
																</option>
															@endforeach
														</select>
												</div> --}}
												<input type="hidden" name="game_pendaftar_id" value="{{ $pendaftaran->game_pendaftar_id }}">
												<div class="form-group">
													<label for="alamat">Massukan Alamat Anda :</label>
													<textarea rows="2" cols="2" class="form-control" name="alamat" id="alamat" >{{ old('alamat', $pendaftaran->alamat) }}</textarea>
												</div>

												<div class="form-group">
													<label for="status">Status :</label>
														<select name="status" id="status" class="form-control">
															<option value="Menunggu" {{ old('status', $pendaftaran->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
															<option value="Diterima" {{ old('status', $pendaftaran->status) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
														</select>
												</div>

												<div class="form-group">
													<label for="foto">Upload Foto Baru (Opsional) : </label>
													<input type="file" name="foto" class="form-control" name="foto" accept=".jpg,.jpeg,.png">
												</div>

												

												<div class="text-right">
													<button type="submit" class="btn btn-primary"> Perbarui <i class="icon-paperplane ml-2"></i></button>
												</div>
											</form>
										</div>
									</div>
								</div>
						</div>
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
						<li class="nav-item"><i class="icon-lifebuoy mr-2"></i> </a></li>
						<li class="nav-item"><i class="icon-file-text2 mr-2"></i> </a></li>
						<li class="nav-item"><i class="icon-cart2 mr-2"></i> </span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function () {
				$("#form-pendaftar").submit(function (e) {
					e.preventDefault(); // Mencegah form submit default

					let formData = new FormData(this); // Ambil data form

					$.ajax({
						url: "{{ route('pendaftaran.update', $pendaftaran->id) }}", 
						type: "POST",
						data: formData,
						processData: false,
						contentType: false,
						success: function (response) {
							if (response.success) {
								Swal.fire({
									title: "<span style='color: #00ff99; font-weight: bold;'>Berhasil!</span>",
									html: "<span style='color: #ffffff; font-weight: bold;'>" + response.message + "</span>",
									iconHtml: "🎉",
									// icon: "success",
									confirmButtonText: "OKE"
								}).then(() => {
									// Reload halaman setelah klik OK
									location.reload();
								});
							}
						},
						error: function (xhr) {
							Swal.fire({
								title: "<span style='color: #ff4444;'>Gagal!</span>",
								text: "<span style='color: #ffffff; font-weight: bold;'>Terjadi kesalahan, coba lagi!</span>",
								icon: "error",
								confirmButtonText: "OKE"
							});
						}
					});
				});
			});
		</script>
	<!-- /page content -->
</body>
</html>