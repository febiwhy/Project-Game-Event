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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	<!-- Core JS files -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/streamgraph.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/sparklines.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/lines.js')}}"></script>	
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/areas.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/donuts.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/bars.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/progress.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/heatmaps.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/pies.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/bullets.js')}}"></script>
	<!-- /core JS files -->
		

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar role admin-->
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
							<a href="#" class="nav-link active"><i class="icon-indent-decrease2"></i> <span>Data Akun</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Sidebars">
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link"> Admin </a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="{{route('roles.index')}}" class="nav-link">Data Role</a></li>
										<li class="nav-item"><a href="{{route('permissions.index')}}" class="nav-link">Data Permission</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="{{route('account.index')}}" class="nav-link active"> Daftar Akun </a>
								</li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-users4 mr-3"></i> <span>User Page</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{route('landing')}}" class="nav-link"> Home </a></li>
								<li class="nav-item"><a href="{{route('game-event.index')}}" class="nav-link"> Game Turnamaent </a></li>
								<li class="nav-item"><a href="{{route('event-community.index')}}" class="nav-link"> Komunitas </a></li>
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
						<h4><img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> 
							<span class="font-weight-semibold">Halaman</span> - Daftar Akun</h4>
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
					<h6>
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
							<div class="btn-group">
								<button type="button" class="btn bg-indigo-400" style="background-color: #5a67d8; color: white;" onclick="location.href='{{ route('account.create') }}'">
									<i class="icon-plus22 mr-3"></i> Tambah Akun </button>
								<button type="button" class="btn bg-indigo-400 dropdown-toggle" style="background-color: #5a67d8; color: white;" data-toggle="dropdown"></button>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="dropdown-header">Export</div>
									<a href="{{ route('download.pdf') }}" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
									<a href="{{ route('export.excel') }}" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
								</div>
							</div>
								<div class="container p-4">
									<table class="table table-striped table-bordered" style="background-color: #3e414d; color: #ffffff;" id="account-table">
									<thead style="background-color: #4a4e69; color: #fff;">		
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Bukti Pembayaran</th>
											<th>Status</th>
											<th>Role</th>
											<th>Aktivitas</th>
											<th>Aksi</th>
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
			<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content bg-dark text-center">
						<div class="modal-body">
							<img id="payment_proof" src="" alt="Bukti Pembayaran" style="width:100%; border-radius:10px;">
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
		$(document).ready(function() {
			$('#account-table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ route('account.index') }}",
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
					{ data: 'name', name: 'name' },
					{ data: 'email', name: 'email' },
					{ data: 'payment_proof', name: 'payment_proof' },
					{ data: 'status', name: 'status' },
					{ data: 'role', name: 'role' },
					{ data: 'activity', name: 'activity' },
					{ data: 'action', name: 'action', orderable: false, searchable: false }
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

					$('#account-table thead').css({
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
								$('#account-table').DataTable().ajax.reload();
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
	<script>
		function showImageModal(imgSrc) {
			$('#payment_proof').attr('src', imgSrc);
			$('#imageModal').modal('show');
		}

		function updateStatus(id, status) {
			if (status === 'approved') {
				// Logic untuk approve
				Swal.fire({
					title: 'Konfirmasi Pembayaran?',
					text: 'Data akan disetujui.',
					icon: 'question',
					showCancelButton: true,
					confirmButtonText: 'Ya',
					cancelButtonText: 'Batal',
					background: "#222831",
					color: "#fff"
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: "/account/update-status/" + id,
							type: "POST",
							data: {
								_token: "{{ csrf_token() }}",
								status: status
							},
							success: function() {
								Swal.fire({
									title: 'Berhasil!',
									text: 'Status berhasil diperbarui.',
									icon: 'success',
									background: '#222831',
									color: '#fff'
								});
								$('#account-table').DataTable().ajax.reload();
							}
						});
					}
				});
			} else if (status === 'rejected') {
				// Logic untuk reject (hapus akun)
				Swal.fire({
					title: 'Tolak Pembayaran?',
					text: 'Akun akan dihapus permanen!',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, Hapus!',
					cancelButtonText: 'Batal',
					confirmButtonColor: '#d33',
					background: "#222831",
					color: "#fff"
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: "/account/" + id,
							type: "DELETE",
							data: {
								_token: "{{ csrf_token() }}"
							},
							success: function(response) {
								Swal.fire({
									title: 'Dihapus!',
									text: 'Akun berhasil dihapus.',
									icon: 'success',
									background: '#222831',
									color: '#fff'
								});
								$('#account-table').DataTable().ajax.reload();
							},
							error: function(xhr) {
								Swal.fire({
									title: 'Error!',
									text: 'Gagal menghapus akun.',
									icon: 'error',
									background: '#222831',
									color: '#fff'
								});
							}
						});
					}
				});
			}
		}
	</script>
	

</body>
</html>
