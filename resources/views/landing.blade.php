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
	<!-- /theme JS files -->

	<style>
		 body {
            background-color: #191c24;
            color: white;
        }
        .event-card {
            background-color: #2a2d3e;
            border-radius: 10px;
            padding: 20px;
            color: white;
            width: 230px;
			margin-bottom: 15px;
			transition: transform 0.3s ease, box-shadow 0.3s ease; 
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		}

		.event-card:hover {
			transform: scale(1.05);
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
		}
		
        .event-card img {
            width: 100%;
            border-radius: 10px;
        }
        .event-tag {
            background-color: #007bff;
            padding: 2px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
        .lounge-tag {
            background-color: orange;
        }
        .event-title {
            font-weight: bold;
        }
        .event-info {
            font-size: 14px;
        }
    
        .card-community {
            background-color: #1e1e1e;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .community-banner {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
        .profile-img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-top: -35px;
            border: 3px solid #1e1e1e;
        }
        .btn-follow {
            background-color: #3498db;
            color: white;
            border-radius: 10px;
            width: 100%;
        }
        .btn-view {
            border: 2px solid white;
            color: white;
            border-radius: 10px;
            width: 100%;
        }
        .event-followers {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 10px;
        }
        .event-followers div {
            text-align: center;
        }
        .event-followers div strong {
            font-size: 18px;
        }

		.button-container {
			display: flex;
			gap: 10px; /* Memberi jarak antara tombol */
		}

		.custom-btn {
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 5px; /* Jarak antara ikon dan teks */
			background: #007bff; /* Warna biru */
			color: white;
			border: none;
			padding: 10px 15px;
			border-radius: 5px;
			font-size: 14px;
			font-weight: bold;
			transition: background 0.3s ease-in-out;
			cursor: pointer;
		}

		.custom-btn:hover {
			background: #0056b3; /* Warna saat hover (lebih gelap) */
		}

		.custom-btn i {
			font-size: 14px; /* Ukuran ikon */
		}

    </style>


</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light navbar-static">
		<div class="navbar-brand">
			<a href="#" class="d-inline-block">
				<img src="{{asset('global_assets/images/logo_light.png')}}" alt="">
			</a>
		</div>



		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbarmobile">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="" class="navbar-nav-link">Home</a></li>
				 @if (optional(auth()->user())->hasAnyRole(['admin']))
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
				@endif
				<li class="nav-item dropdown ">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-paragraph-justify3"></i></a>
					<div class="dropdown-menu dropdown-menu-right ">
						<a href="#" class="dropdown-item">
							<i class="mi-games fa-sm mr-2"></i>Event</a>
						<a href="{{route('article')}}" class="dropdown-item">
							<i class="mi-web fa-sm mr-2"></i>Artikel</a>
							<a href="{{route('contact.index')}}" class="dropdown-item"><i class="icon-android"></i> Hubungi Kami </a>
						<a href="#" class="dropdown-item disabled">
							<i class="icon-alarm fa-sm mr-2 "></i>Akan Datang</a>
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
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header border-bottom-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Event Game</span></h4>
					</div>
				</div>
			</div>
			<!-- /page header -->

			<div class="card fade-in">
				<div class="card-header header-elements-inline">
					<h2 class="card-title">Event Game </h2>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>

				<div class="container my-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
					<div class="row">
					<div class="table-responsive">
							<div class="d-flex gap-3 flex-wrap">
								@foreach ($game_events as $game_event)
								@if ($game_event)
										<div class="event-card mr-4" onclick="window.location.href='{{ route('game-event.show', $game_event->id) }}'" style="cursor: pointer;">
											<img src="{{ asset($game_event->thumbnail ?? 'default-thumbnail.png') }}" 
												alt="" height="125px" width="100px">


											<span class="event-tag">Event</span>
											<span class="event-tag lounge-tag">Lounge Tersedia</span>
											
											<h5 class="event-title mt-2">{{ $game_event->name ?? 'Nama Tidak Tersedia' }}</h5>
											<p class="event-info"> Description : {{ $game_event->description ?? 'Tidak ada deskripsi' }}</p>
											<p class="event-info text-warning"></p>
											<p class="event-info">Slots : {{ $game_event->slot_filled ?? 0 }} / {{ $game_event->slot_limit ?? 0 }}</p>

											<p class="event-info">Penyelenggara : {{ $game_event->organizer ?? 'Tidak diketahui' }}</p>
										</div>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="card fade-in">
				<div class="card-header header-elements-inline">
					<h2 class="card-title">Komunitas </h2>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>
				
				<div class="container my-4 p-4">
					<div class="row g-3">
						<div class="d-flex flex-wrap gap-3">
						@foreach($event_communitys as $community)
						<div class="card-community">
							<div class="card-header" 
								style="background-image: url('{{ asset($community->gameEvent->thumbnail ?? '-') }}');">
								<div class="logo">
									@if ($community->gameEvent)
										<img src="{{ asset($community->gameEvent->thumbnail) }}" alt="Event Thumbnail">
									@else
										<img src="{{ asset($community->gameEvent->thumbnail ?? '-') }}" alt="Default Thumbnail">
									@endif
								</div>
							</div>
							<div class="card-body">
								<h5>{{ $community->name_community }}</h5>
								<span class="followers-count" data-id="{{ $community->id }}">0</span> Pengikut
								<span id="events-count">0</span> Events
								<div class="button-group">
									<a href="{{ route('event-community.show', $community->id) }}" class="btn btn-outline-light">LIHAT PROFIL</a>
									<a class="btn btn-primary follow-btn" data-id="{{ $community->id }}">IKUTI</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					</div>
				</div>
			</div>
			

			<div class="card fade-in">
				<div class="card-header header-elements-inline">
					<h2 class="card-title">Data Peserta </h2>
						<div class="header-elements">
							<div class="list-icons">
								<a href="{{ route('export.pdf') }}"><i class="fas icon-file-pdf text-white"></i></a>
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>

				<div class="container p-4">
						<table class="display" id="pendaftaran-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Id Number</th>
									<th>Alamat</th>
									<th>Status</th>
									<th>Game Event</th>
								</tr>
							</thead>
							<tbody>
								 <!-- Data akan diisi oleh DataTables -->
							</tbody>
						</table>
					</div>
			</div>

			<!-- Footer -->
			<div class="navbar navbar-expand-xl navbar-dark rounded-bottom">
				<div class="navbar-collapse collapse">
					<span class="navbar-text">
						&copy; 2015 - 2025. <a href="#">Event Game</a>
					</span>
					<ul class="navbar-nav ml-xl-auto">
						<li class="nav-item"><a href="#" class="navbar-nav-link">Help Center</a></li>
						<li class="nav-item"><a href="#" class="navbar-nav-link">Policy</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

			<script>
				document.addEventListener("DOMContentLoaded", function () {
					const followButtons = document.querySelectorAll(".follow-btn");

					followButtons.forEach(button => {
						button.addEventListener("click", function () {
							const id = this.getAttribute("data-id");
							const followersCount = document.querySelector(`.followers-count[data-id='${id}']`);

							let followers = parseInt(followersCount.innerText);

							if (this.classList.contains("btn-primary")) {
								followers++;
								this.innerText = "DIIKUTI";
								this.classList.remove("btn-primary");
								this.classList.add("btn-secondary");
							} else {
								followers--;
								this.innerText = "IKUTI";
								this.classList.remove("btn-secondary");
								this.classList.add("btn-primary");
							}

							followersCount.innerText = followers;
						});
					});
				});

			</script>

			<script>
				$(document).ready(function() {
					$('#pendaftaran-table').DataTable({
						processing: true,
						serverSide: true,
						ajax: "{{ route('landing') }}",
						columns: [
							{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
							{ data: 'nama', name: 'nama' },
							{ data: 'email', name: 'email' },
							{ data: 'id_number', name: 'id_number' },
							{ data: 'alamat', name: 'alamat' },
							{ data: 'status', name: 'status' },
							{ data: 'game_event', name: 'game_event' }
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
						}
					});
				});
			</script>
	</body>
</html>
