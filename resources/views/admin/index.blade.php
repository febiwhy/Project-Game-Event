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
	<script src="{{asset('assets/js/app.js')}}"></script>

	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/sparklines.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/lines.js')}}"></script>	
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/areas.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/donuts.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/bars.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/progress.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/heatmaps.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/pies.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard/dark/bullets.js')}}"></script>
	<!-- /theme JS files -->

	</head>
	<body>
	<!-- Main navbar -->
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

				<span class="navbar-text ml-xl-3">
					@if (auth()->check())
						<span class="badge bg-success">{{ auth()->user()->name }} Sedang Online</span>
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
							<a class="nav-link active">
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
										<li class="nav-item"><a href="{{route('roles.create')}}" class="nav-link active"><i class="icon-plus22 mr-3"></i>Tambah Role</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="{{route('account.index')}}" class="nav-link"> Daftar Akun </a>
								</li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-users4 mr-3"></i> <span>User Page</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{route('landing')}}" class="nav-link"> Home </a></li>
								<li class="nav-item"><a href="{{route('game-event.index')}}" class="nav-link"> Game Turnamaent </a></li>
								<li class="nav-item"><a href="{{route('event-community.index')}}" class="nav-link"> Komunitas </a></li>
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
						<h4> 
							<img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> 
							<span class="font-weight-semibold">Home</span> - Admin
						</h4>
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


				<!-- Navbar classes -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h6 class="card-title"></h6>
						<div class="header-elements">
							<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
							</div>
						</div>
					</div>

					<div class="card-body py-0">
						<div class="row">
							<div class="col-sm-4">
								<div class="d-flex align-items-center justify-content-center mb-2">
									<a class="btn bg-transparent border-success-300 text-success-300 rounded-round border-2 btn-icon mr-3">
										<i class="icon-plus3"></i>
									</a>
									<div>
										<div class="font-weight-semibold">Total Game Turnament</div>
										<span class="text-muted"><span class="badge badge-mark border-success mr-2"></span>{{ $totalgameEvent }}</span>
									</div>
								</div>
								<div class="w-75 mx-auto mb-3" id="new-visitors"></div>
							</div>

							<div class="col-sm-4">
								<div class="d-flex align-items-center justify-content-center mb-2">
									<a href="#" class="btn bg-transparent border-orange-300 text-orange-300 rounded-round border-2 btn-icon mr-3">
										<i class="icon-watch"></i>
									</a>
									<div>
										<div class="font-weight-semibold">Jam</div>
										<span class="text-muted" id="realTimeClock"> 00:00:00 </span>
									</div>
								</div>
								<div class="w-75 mx-auto mb-3" id="new-sessions"></div>
							</div>

							<div class="col-sm-4">
								<div class="d-flex align-items-center justify-content-center mb-2">
									<a href="#" class="btn bg-transparent border-blue-300 text-blue-300 rounded-round border-2 btn-icon mr-3">
										<i class="icon-accessibility"></i>
									</a>
									<div>
										<div class="font-weight-semibold">Total online</div>
										<span class="text-muted"><span class="badge badge-mark border-success mr-2"></span>{{ $totalusers }} </span>
									</div>
								</div>
								<div class="w-75 mx-auto mb-3" id="total-online"></div>
							</div>
						</div>
					</div>

					<div class="chart position-relative" id="traffic-sources"></div>
				</div>

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
						<div class="table-responsive" id="right-icon-tab1">
							<div class="container p-4">
								<table class="table table-striped table-bordered" style="background-color: #3e414d; color: #ffffff;" id="pendaftaran-table">
									<thead style="background-color: #4a4e69; color: #fff;">
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Email</th>
											<th>ID Number</th>
											<th>WhatsApp</th>
											<th>Alamat</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<!-- Data akan diisi oleh DataTables -->
									</tbody>
								</table>
							</div>
						</div>
				</div>

				<!-- /navbar classes -->
				{{-- <!-- Body classes -->
					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title"></h5>
							<div class="header-elements">
								<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
						</div>
                    
				</div>
				<!-- /body classes --> --}}

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
	<!-- /page content -->

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function() {
				$('#pendaftaran-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ route('admin.index') }}",
					columns: [
						{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
						{ data: 'nama', name: 'nama' },
						{ data: 'email', name: 'email' },
						{ data: 'id_number', name: 'id_number' },
						{ data: 'alamat', name: 'alamat' },
						{ data: 'status', name: 'status' },
						{ data: 'game_event', name: 'game_event' },
						{ data: 'action', name: 'action', orderable: false, searchable: false }
					],
					language: {
						paginate: {
							previous: 'Sebelumnya',
							next: 'Selanjutnya'
						},
						search: 'Cari:',
						lengthMenu: 'Tampilkan _MENU_ entri',
						info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entri',
						infoEmpty: 'Menampilkan 0 hingga 0 dari 0 entri',
						infoFiltered: '(disaring dari _MAX_ total entri)'
					},
					dom: '<"top"lBf>rt<"bottom"ip>',
					buttons: [
						{
							text: 'Download PDF',
							className: 'btn btn-danger',
							action: function () {
								window.location.href = "{{ route('export.pdf') }}";
							}
						}
					],
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

						$('.dt-buttons').css({ 'margin-left': '10px' });

						$('#pendaftaran-table tbody tr').css({
							'background-color': '#3e414d',
							'color': '#ffffff'
						});

						$('#pendaftaran-table thead').css({
							'background-color': '#4a4e69',
							'color': '#ffffff'
						});
					}
				});
			});

			// Fungsi Konfirmasi Hapus
			function confirmDelete(id) {
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
						url: "/pendaftaran/delete/" + id,
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
								$('#pendaftaran-table').DataTable().ajax.reload();
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
						},
						error: function(xhr) {
							Swal.fire({
								title: "<span style='color: #ff4444;'>Gagal!</span>",
								html: "<span style='color: #ffffff;'>Error " + xhr.status + ": " + xhr.responseJSON.message + "</span>",
								icon: "error",
								background: "#222831",
								color: "#ffffff",
								confirmButtonColor: "#ff4444",
								confirmButtonText: "OKE"
							});
						}
					});
				}
			});
		}
		</script>

		<script>
			function updateClock() {
				const now = new Date();
				const hours = String(now.getHours()).padStart(2, '0');
				const minutes = String(now.getMinutes()).padStart(2, '0');
				const seconds = String(now.getSeconds()).padStart(2, '0');
				document.getElementById('realTimeClock').textContent = `${hours}:${minutes}:${seconds}`;
			}

			setInterval(updateClock, 1000);
			updateClock();
		</script>

</body>
</html>