<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
                                    <div class="navbar navbar-dark navbar-expand-xl">
									<div class="navbar-brand">
										<a href="index.html" class="d-inline-block">
											<img src="global_assets/images/logo_light.png" alt="">
										</a>
									</div>

									<div class="d-xl-none">
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
											<i class="icon-grid3"></i>
										</button>
									</div>

									<div class="navbar-collapse collapse" id="navbar-demo1-mobile">
										<ul class="navbar-nav">
											<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Admin</a></li>
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
													<img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
													<span>Victoria</span>
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item">Action</a>
													<a href="#" class="dropdown-item">Another action</a>
													<a href="#" class="dropdown-item">Something else here</a>
													<a href="#" class="dropdown-item">One more line</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
	<!-- /main navbar -->
								<!-- Page content -->
								<div class="page-content">

									<!-- Main content -->
									<div class="content-wrapper">

										<!-- Page header -->
										<div class="page-header border-bottom-0">
											<div class="page-header-content header-elements-md-inline">
												<div class="page-title d-flex">
													<h4><a href="{{route('admin.index')}}"><i class="icon-arrow-left52 mr-2"></i></a><span class="font-weight-semibold">Single Navbar</span> - Top Static</h4>
													<a href="{{route('admin.index')}}" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
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

									<div class="container mt-5">
										<div class="card shadow-lg p-4 bg-secondary text-white rounded">
											<h2 class="text-center mb-4">Edit Pendaftaran</h2>

											@if ($errors->any())
												<div class="alert alert-danger">
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif

											@if (session('success'))
												<div class="alert alert-success">{{ session('success') }}</div>
											@endif

											<form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
												@csrf
												@method('PUT')

												<div class="mb-3">
													<label for="nama" class="form-label">Nama:</label>
													<input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $pendaftaran->nama) }}" required>
												</div>

												<div class="mb-3">
													<label for="email" class="form-label">Email:</label>
													<input type="email" class="form-control" name="email" id="email" value="{{ old('email', $pendaftaran->email) }}" required>
												</div>

												<div class="mb-3">
													<label for="email" class="form-label">Id Number:</label>
													<input type="text" class="form-control" name="id_number" value="{{ old('id_number', $pendaftaran->id_number) }}" required>
												</div>

												<div class="mb-3">
													<label for="whatsapp" class="form-label">Nomor WhatsApp:</label>
													<input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $pendaftaran->whatsapp) }}" required>
												</div>

												<div class="mb-3">
													<label for="alamat" class="form-label">Alamat:</label>
													<textarea class="form-control" name="alamat" id="alamat" rows="2" required>{{ old('alamat', $pendaftaran->alamat) }}</textarea>
												</div>

												<div class="mb-3">
													<label for="status" class="form-label">Status:</label>
													<select name="status" id="status" class="form-control">
														<option value="Menunggu" {{ old('status', $pendaftaran->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
														<option value="Diterima" {{ old('status', $pendaftaran->status) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
													</select>
												</div>

												<div class="mb-3">
													<label for="game_pendaftar_id" class="form-label">Game Event:</label>
													<select name="game_pendaftar_id" id="game_pendaftar_id" class="form-control">
														@foreach($events as $event)
															<option value="{{ $event->id }}" {{ old('game_pendaftar_id', $pendaftaran->game_event_id) == $event->id ? 'selected' : '' }}>
																{{ $event->name }}
															</option>
														@endforeach
													</select>
												</div>

												<div class="mb-3">
													<label for="foto" class="form-label">Upload Foto Baru (Opsional):</label>
													<input type="file" class="form-control" name="foto" accept=".jpg,.jpeg,.png">
												</div>

												<button type="submit" class="btn btn-primary w-100">Perbarui Data</button>
											</form>
										</div>
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

			<!-- Content area -->
	
			<!-- Footer -->
                                  <div class="navbar navbar-expand-xl navbar-dark rounded-bottom" style="border: 1px solid rgba(0,0,0,0.125); border-bottom: 0;">
									<div class="text-center d-xl-none w-100">
										<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-demo2-mobile">
											<i class="icon-tree5 mr-2"></i>
											Bottom navbar
										</button>
									</div>

									<div class="navbar-collapse collapse" id="navbar-demo2-mobile">
										<span class="navbar-text">
											&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a>
										</span>

										<ul class="navbar-nav ml-xl-auto">
											<li class="nav-item"><a href="#" class="navbar-nav-link">Help center</a></li>
											<li class="nav-item"><a href="#" class="navbar-nav-link">Policy</a></li>
											<li class="nav-item"><a href="#" class="navbar-nav-link font-weight-semibold">Upgrade your account</a></li>
											<li class="nav-item dropup">
												<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
													<i class="icon-share4 d-none d-xl-inline-block"></i>
													<span class="d-xl-none">Share</span>
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item"><i class="icon-dribbble3"></i> Dribbble</a>
													<a href="#" class="dropdown-item"><i class="icon-pinterest2"></i> Pinterest</a>
													<a href="#" class="dropdown-item"><i class="icon-github"></i> Github</a>
													<a href="#" class="dropdown-item"><i class="icon-stackoverflow"></i> Stack Overflow</a>
												</div>
											</li>
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
