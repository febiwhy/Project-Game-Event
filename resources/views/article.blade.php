<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Event Game</title>
    

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

	<!-- /global stylesheets -->
	

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

	<style>
		 body {
            background-color: #191c24;
            color: white;
        }
        .event-card {
            background-color: #2a2d3e;
            border-radius: 10px;
            padding: 15px;
            color: white;
            width: 230px;
			margin-bottom: 15px;
			transition: transform 0.3s ease, box-shadow 0.3s ease; 
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .event-card img {
            width: 100%;
            border-radius: 10px;
        }

		.event-tag {
            display: inline-block;
            background-color: #09093b; /* Warna latar belakang biru */
            color: white; /* Warna teks putih */
            padding: 8px 16px; /* Jarak dalam tag */
            border-radius: 20px; /* Sudut yang melengkung */
            font-weight: bold; /* Teks tebal */
            font-size: 14px; /* Ukuran font */
            text-transform: uppercase; /* Menjadikan teks kapital */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan di sekitar tag */
            transition: all 0.3s ease; /* Animasi transisi */
			margin-right: 10px;
        }
		

        /* Efek hover untuk interaksi */
        .event-tag:hover {
            background-color: #0056b3; /* Warna latar belakang lebih gelap saat hover */
            transform: translateY(-2px); /* Efek gerakan sedikit ke atas */
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

		h1 {
			font-family: 'Bungee', sans-serif;
			color: #ffffff;
			text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
		}

		 select.form-select {
            text-align: center;
            text-align-last: center;
			font-size: 0.9rem;
		}

		    .not-found-img {
            max-width: 250px;
        }


	</style>


</head>

<body >

	<!-- Main navbar -->
	{{-- Main navbar role user --}}
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
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link active">Artikel</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
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
	{{-- /Main Navbar role user --}}
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header border-bottom-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
					</div>
				</div>
			</div>
			<!-- /page header -->

				<div class="card bg-dark text-white p-3 mb-4" >
					<div class="card-header header-elements-inline">
						<h1 class="card-title">Temukan Artikel <br> untuk Game Favoritmu!</h1>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

				<!-- Search Bar Full Width -->
				<div class="input-group my-4 w-100">
					<span class="input-group-text event-tag border-0">
						<i class="bi bi-search text-white"></i>
					</span>
					<input type="text" id="articleSearchInput" class="form-control event-tag text-white border-0" placeholder="Search article...">
				</div>

				<!-- Filter Buttons -->
				<div class="d-flex flex-wrap gap-2">
					<button class="event-tag active">Semua</button>
						@foreach ($article as $item)		
						<a href="{{ route('article.show', $item->id) }}" class="event-tag">{{ $item->title ?? 'Title Belum Tersedia' }}</a>
						@endforeach
					</div>

				<div class="mt-4">
					<select id="timeFilter" class="form-select w-100 event-tag">
						<option class="text-center">Minggu ini</option>
						<option class="text-center">Bulan ini</option>
						<option class="text-center">Semua Waktu</option>
					</select>
        		</div>

				<div class="container my-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
					<div class="row">
						<div class="table-responsive">
							<div class="d-flex gap-3 flex-wrap">
								@foreach ($article as $row)
									@if ($row)
										<div class="event-card mr-4 event-card d-flex flex-column justify-content-between" style="height: 300px;"  style="cursor: pointer;" data-date="{{ \Carbon\Carbon::parse($row->created_at)->toISOString() }}">
											<img src="{{ asset($row->image ?? 'default-thumbnail.png') }}" 
												alt="" height="125px" width="100px">
											{{-- onclick="window.location.href='{{ route('article.show', $row->id) }}'" --}}
											<h1 class="event-title mt-2">{{ $row->title ?? 'Judul Tidak Tersedia' }}</h1>
											<p class="event-info text-warning"></p>

											@php
												// Potong deskripsi jadi 100 karakter
												$shortDescription = Str::limit(strip_tags($row->content), 50, '...');
											@endphp
											<p class="event-info">{{ $shortDescription }}</p>

											<a href="{{ route('article.show', $row->id) }}" class="text-primary text-decoration-none mt-2">Baca Selengkapnya</a>
										</div>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>

				@if ($article->isEmpty())
					<div class="container text-center mt-5">
						<img src="{{asset('global_assets/images/not_found.png')}}" class="not-found-img" alt="Not Found">
						<h5 class="mt-3">Artikel Kosong</h5>
					</div>
				@endif



						</td>
					</tr>
				</tbody>
			</table>
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
						<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Pusat Bantuan</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const searchInput = document.getElementById('articleSearchInput');
			const articleItems = document.querySelectorAll('.event-card');
			
			if (searchInput && articleItems.length > 0) {
				searchInput.addEventListener('input', function(e) {
					const searchTerm = e.target.value.toLowerCase();
					
					articleItems.forEach(item => {
						const textContent = item.textContent.toLowerCase();
						if (textContent.includes(searchTerm)) {
							item.style.display = 'block';
						} else {
							item.style.display = 'none';
						}
					});
				});
				
				console.log('Search functionality initialized successfully');
			} else {
				console.error('Required elements not found');
			}
		});
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const timeFilter = document.getElementById('timeFilter');
			const articleCards = document.querySelectorAll('.event-card');

			function isWithinRange(dateString, filterType) {
				const today = new Date();
				const articleDate = new Date(dateString);

				if (filterType === 'week') {
					const oneWeekAgo = new Date();
					oneWeekAgo.setDate(today.getDate() - 7);
					return articleDate >= oneWeekAgo;
				}
				if (filterType === 'month') {
					const oneMonthAgo = new Date();
					oneMonthAgo.setMonth(today.getMonth() - 1);
					return articleDate >= oneMonthAgo;
				}
				// Semua Waktu
				return true;
			}

			timeFilter.addEventListener('change', function () {
				const filter = timeFilter.value;

				articleCards.forEach(card => {
					const date = card.getAttribute('data-date');
					if (!date) return;

					if (isWithinRange(date, filter)) {
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
