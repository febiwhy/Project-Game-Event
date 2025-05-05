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
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/progressbar.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/components_progress.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/content_cards_content.js')}}"></script>

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
		.event-tag:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
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
		  h1 {
            font-family: 'Bungee', sans-serif;
            color: #ffffff;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
		}
		.search-container {
			width: 100%;
			margin-bottom: 20px;
		}

		.search-input {
			background-color: #09093b;
			color: white;
			border: none;
			border-radius: 20px;
			padding: 8px 16px;
			font-weight: bold;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			transition: all 0.3s ease;
		}

		.search-input:focus {
			outline: none;
			background-color: #09093b;
		}

		.search-input::placeholder {
			color: rgba(255, 255, 255, 0.7);
			font-size: 14px;
		}
    </style>


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
				<li class="nav-item"><a href="" class="navbar-nav-link active">Home</a></li>
				@if (optional(auth()->user())->hasAnyRole(['admin']))
				<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
				@endif
				<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
				<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
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
			<!-- /page header -->

			<div class="card fade-in">
				<div class="card-header header-elements-inline">
					<h1 class="card-title">Event Game Turnamen</h1>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>

					<div class="search-container my-3">
						<div class="input-group">
							<span class="input-group-text event-tag border-0">
								<i class="bi bi-search text-white"></i>
							</span>
							<input type="text" id="searchEvent" class="form-control search-input" placeholder="Cari Event Turnamen ...">
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
											<p class="event-info text-warning"></p>
											<p class="event-info">Slots : {{ $game_event->slot_filled ?? 0 }} / {{ $game_event->slot_limit ?? 0 }}</p>
											
											<p class="event-info">Penyelenggara : {{ $game_event->organizer ?? 'Tidak diketahui' }}</p>
											<p class="event-info"> Description : {!! nl2br(e($game_event->description ?? 'Tidak ada deskripsi')) !!}</p>
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
					<h1 class="card-title">Komunitas </h1>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>
				
				<div class="search-container my-3">
					<div class="input-group">
						<span class="input-group-text event-tag border-0">
							<i class="bi bi-search text-white"></i>
						</span>
						<input type="text" id="searchCommunity" class="form-control search-input" placeholder="Cari Event Komunitas ...">
					</div>
				</div>
				

					<!-- Multiple titles -->
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1 mx-1 my-2">
					{{-- <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1 mx-3 my-5"> --}}
						@foreach($event_communitys as $community)
						<div class="col mb-3">
							<div class="card h-100 shadow-sm" style="background-color: #1e293b; color: #e2e8f0; border-radius: 10px; padding: 8px; font-size: 13px; max-width: 280px; margin: auto;">
							{{-- <div class="card h-100 shadow" style="background-color: #1e293b; color: #e2e8f0; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);"> --}}
								<div class="card-header d-flex justify-content-between align-items-center" style="background-color: #334155; border-bottom: 1px solid #475569;">
									<span><i class="icon-user-check mr-2"></i> <a >	{{ $community->owner?->name ?? 'Tidak ada' }} </a></span>
									<span class="text-muted"> {{ $community->created_at?->format('d M Y') ?? 'Tidak tersedia' }} </span>
								</div>
								
								<div class="card-img-actions">
									@if ($community->gameEvent)
									<div class="text-center">
										<img src="{{ asset($community->gameEvent->thumbnail ?? 'belom ada') }}" alt="" height="250px" width="250px">
									</div>
									@endif
									{{-- <img class="img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt=""> --}}
									<div class="card-img-actions-overlay">
										{{-- @if ($community->gameEvent)
										<a href="{{ asset($community->gameEvent->thumbnail) }}" class="btn btn-outline bg-white text-white border-white border-2" data-popup="lightbox">
											Preview
										</a>
										@endif --}}
										<a href="{{ route('event-community.show', $community->id) }}" class="btn btn-outline bg-white text-white border-white border-2 ml-2">
											Details
										</a>
									</div>
								</div>
								<div class="card-footer d-flex justify-content-between border-top-0 pb-0">
									<span class="text-muted likes-count" data-id="{{ $community->id }}"> 0 Suka</span>
									<ul class="list-inline list-inline-condensed mb-0">
										<li class="list-inline-item">
											<a class="text-indigo-400"><i class="icon-thumbs-up2 like-btn" data-id="{{ $community->id }}" style="cursor: pointer; color: #6c757d;"></i></a>
										</li>
										<li class="list-inline-item ml-3">
											<a class="text-muted"><i class="icon-flag4"></i></a>
										</li>
									</ul>
								</div>
								
								<div class="card-body">
									<h6 class="card-title font-weight-semibold"> {{ $community->name_community }} </h6>
									<p class="card-text">{!! nl2br(e($community->description ?? 'Tidak ada deskripsi')) !!}</p>
								</div>

								<div class="card-footer border-light d-flex justify-content-between">
									<span class="text-muted"></span>
									<span>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<span class="text-muted ml-2"></span>
									</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<!-- /multiple titles -->

				{{-- <div class="container my-4 p-4">
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
				</div> --}}
			</div>
			

			<div class="card fade-in">
				<div class="card-header header-elements-inline">
					<h1 class="card-title">Data Peserta </h1>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
							</div>
						</div>
					</div>

				<div class="container p-4">
						<table class="table table-striped table-bordered" style="background-color: #3e414d; color: #ffffff;" id="pendaftaran-table">
							<thead style="background-color: #4a4e69; color: #fff;">
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Id Number</th>
									<th>Alamat</th>
									<th>Verifikasi</th>
									<th>Game Turnament</th>
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

			<script>
				document.addEventListener("DOMContentLoaded", function () {
					const likeButtons = document.querySelectorAll(".like-btn");

					likeButtons.forEach(button => {
						button.addEventListener("click", function () {
							const id = this.getAttribute("data-id");
							const likesCount = document.querySelector(`.likes-count[data-id='${id}']`);

							let likes = parseInt(likesCount.innerText);

							if (this.classList.contains("liked")) {
								// Kalau sudah like, jadi unlike
								likes--;
								this.classList.remove("liked");
								this.style.color = "#6c757d"; // Warna netral
							} else {
								// Kalau belum like, jadi like
								likes++;
								this.classList.add("liked");
								this.style.color = "#4caf50"; // Warna hijau saat like
							}

							// Update tampilan jumlah like
							likesCount.innerText = likes;
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
						},
							dom: '<"top"lBf>rt<"bottom"ip>',
        					buttons: [
								{  text: 'Download PDF',
									className: 'btn btn-danger',
									action: function (e, dt, node, config) {
										window.location.href = "{{ route('export.pdf') }}";
									}
								}
							],
						initComplete: function() {
							// Styling input pencarian
							$('.dataTables_filter input').css({
								'background-color': '#3e414d',
								'color': '#ffffff',
								'border': '1px solid #555'
							});

							// Styling dropdown jumlah entri
							$('.dataTables_length select').css({
								'background-color': '#3e414d',
								'color': '#ffffff',
								'border': '1px solid #555'
							});

							$('.dt-buttons').css({
								'margin-left': '10px' // Geser tombol PDF ke kanan
							});

							// Styling tabel (baris dan teks)
							$('#pendaftaran-table tbody tr').css({
								'background-color': '#3e414d',
								'color': '#ffffff'
							});

							// Styling header tabel
							$('#pendaftaran-table thead').css({
								'background-color': '#4a4e69',
								'color': '#ffffff'
							});
						}
					});
				});

			</script>

			<script>
				document.addEventListener('DOMContentLoaded', function () {
					const searchEvent = document.getElementById('searchEvent');
					const searchCommunity = document.getElementById('searchCommunity');

					const eventCards = document.querySelectorAll('.event-card');
					const communityCards = document.querySelectorAll('.col.mb-3');

					// Filter Event Game
					searchEvent.addEventListener('input', function () {
						const searchTerm = searchEvent.value.toLowerCase();
						eventCards.forEach(card => {
							const title = card.querySelector('.event-title')?.textContent.toLowerCase() || '';
							const description = card.querySelector('.event-info')?.textContent.toLowerCase() || '';

							if (title.includes(searchTerm) || description.includes(searchTerm)) {
								card.style.display = 'block';
							} else {
								card.style.display = 'none';
							}
						});
					});

					// Filter Komunitas
					searchCommunity.addEventListener('input', function () {
						const searchTerm = searchCommunity.value.toLowerCase();
						communityCards.forEach(card => {
							const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
							const description = card.querySelector('.card-text')?.textContent.toLowerCase() || '';

							if (title.includes(searchTerm) || description.includes(searchTerm)) {
								card.style.display = 'block';
							} else {
								card.style.display = 'none';
							}
						});
					});
				});
			</script>

	</body>
</html>
