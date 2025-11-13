<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Event Game</title>

	<!-- Global stylesheets -->
	<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/game_event.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/velocity/velocity.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/velocity/velocity.ui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_velocity_ui.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/animations_velocity_examples.js')}}"></script>
	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/progressbar.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/components_progress.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/content_cards_content.js')}}"></script>
	<!-- Theme JS files -->
</head>

<body>

	<!-- Main navbar -->
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
				@if (auth()->check() && auth()->user()->status == 'pending')
					<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link active">Home</a></li>
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
					<li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link active">Status Akun</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
				@elseif (auth()->check() && auth()->user()->status == 'approved')
					<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link ">Home</a></li>
					<li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link active">Status Akun</a></li>
					<li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">leaderboard</a></li>
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
				@elseif (auth()->check() && !auth()->user()->hasRole('admin'))
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
				@endif
			</ul>

			<span class="navbar-text ml-xl-3">
				@if (auth()->check())
					@php
						$status = auth()->user()->status;
					@endphp

					@if ($status == 'approved')
						<span class="badge bg-success">{{ auth()->user()->name }} (Approved)</span>
					@elseif ($status == 'pending')
						<span class="badge bg-warning text-dark">{{ auth()->user()->name }} (Pending Approval)</span>
					@endif
				@endif
			</span>


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
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header border-bottom-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4>
							<span class="font-weight-semibold"></span></h4>
					</div>
				</div>
			</div>
			<div class="alert alert-info bg-light text-default alert-styled-left alert-arrow-left alert-dismissible">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
						<h6>
							@if (auth()->check())
								Selamat Datang , {{ auth()->user()->name }}
							@else
							<h1>
								Selamat Datang Rasakan Kelebihannya Guest
							</h1>
							<h1>Silahkan Login Terlebih Dahulu</h1>
							<h1>
								<a href="{{ route('login') }}">Login</a>
							</h1>
							@endif
						</h6>
						
						<div class="card-header header-elements-inline">
							<p class="mb-2"> Menunggu Persetujuan Admin <br> Jika Sudah Mengirim Bukti Pembayaran dan Sesuai dengan Syarat Pembayaran Belum Disetujui maka 
								<a href="{{ route('contact.index') }}" class="text-primary text-decoration-none"> Hubungi Kami </a> <br> Atau Bisa juga Hubungi Admin 
								<a href="https://wa.me/6281234567890" target="_blank" class="text-success text-decoration-none">Hubungi Kami via WhatsApp</a></p>

						</div>
					</div>
			<!-- /page header -->
			<div class="card" >
				<div class="card-header header-elements-inline">
					<h2 class="card-title">Data Daftar Akun </h2>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
							<div class="col-md-3 col-sm-4">
							</div>
						</div>
					</div>
				</div>
					<div class="container mr-4" id="right-icon-tab1">
						<div class="table-responsive">
								<div class="container p-4">
									<table class="table table-striped table-bordered" style="background-color: #3e414d; color: #ffffff;" id="status-table">
									<thead style="background-color: #4a4e69; color: #fff;">		
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Status</th>
											<th>Role</th>
											<th>Aktivitas</th>
										</tr>
									</thead>
									<tbody>
									{{-- di isi datatables --}}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Footer -->
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
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function() {
				$('#status-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('status-user.index') }}",
					columns: [
						{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
						{ data: 'name', name: 'name' },
						{ data: 'email', name: 'email' },
						{ data: 'status', name: 'status' },
						{ data: 'role', name: 'role' },
						{ data: 'activity', name: 'activity' },
					],
					language: {
						paginate: { previous: 'Sebelumnya', next: 'Selanjutnya' },
						search: 'Cari:',
						lengthMenu: 'Tampilkan _MENU_ entri',
						info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entri',
						infoEmpty: 'Menampilkan 0 hingga 0 dari 0 entri',
						infoFiltered: '(disaring dari _MAX_ total entri)'
					},
					initComplete: function() {
						$('.dataTables_filter input').css({
							'background-color': '#3e414d',
							'color': '#ffffff',
							'border': '1px solid #555'
						});

						$('.dataTables_length select').css({
							'background-color': '#3e414d',
							'color': '#ffffff',
							'border': '1px solid #555'
						});

						$('#status-table thead').css({
							'background-color': '#4a4e69',
							'color': '#ffffff'
						});
					}
				});
			});

			// Fungsi Konfirmasi Hapus (sudah ada)
			function confirmDeleteAccount(id) {
				Swal.fire({
					title: "<span style='color: #ff6666;'>Yakin ingin menghapus?</span>",
					html: "<span style='color: #ff6666;'>Data yang dihapus tidak bisa dikembalikan!</span>",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#d33",
					cancelButtonColor: "#3085d6",
					confirmButtonText: "Ya, hapus!",
					cancelButtonText: "Batal"
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: "/account/" + id,
							type: "DELETE",
							data: { _token: "{{ csrf_token() }}" },
							success: function(response) {
								if (response.success) {
									Swal.fire({
										title: "<span style='color: #00ff99; font-weight: bold;'>Berhasil!</span>",
										html: "<span style='color: #ffffff;'>Data telah berhasil dihapus.</span>",
										icon: "success",
										iconHtml: "🗑️",
										background: "#222831",
										color: "#ffffff",
										confirmButtonColor: "#00c853",
										confirmButtonText: "OKE"
									});
									$('#status-table').DataTable().ajax.reload();
								} else {
									Swal.fire({
										title: "<span style='color: #ff4444;'>Gagal!</span>",
										html: "<span style='color: #ffffff;'>Terjadi kesalahan, data gagal dihapus.</span>",
										icon: "error",
										background: "#222831",
										color: "#ffffff",
										confirmButtonColor: "#ff4444",
										confirmButtonText: "OKE"
									});
								}
							}
						});
					}
				});
			}
		</script>

	</body>
</html>