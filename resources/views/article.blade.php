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
            display: inline-block;
            background-color: #09093b;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-right: 10px;
            cursor: pointer;
          
        }
        .event-tag.active {
            background-color: #0056b3;
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
        #articleSearchInput {
            background-color: #09093b;
            color: white;
            border: none;
        }
        #articleSearchInput::placeholder {
            color: rgba(255, 255, 255, 0.7);
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

				<div class="card" >
					<div class="card-header header-elements-inline">
						<h1 class="card-title">Temukan Artikel untuk <br> Game Favoritmu!</h1>
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

                    <!-- Search Bar Full Width -->
                    <div class="input-group my-4 w-100">
                        <span class="input-group-text event-tag border-0">
                            <i class="bi bi-search text-white"></i>
                        </span>
                        <input type="text" id="articleSearchInput" class="form-control" placeholder="Cari article...">
                    </div>

                    <!-- Filter Buttons -->
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <button class="event-tag active" data-filter="all">Semua</button>
                        @foreach ($article as $item)        
                        <button class="event-tag filter-btn" data-filter="{{ $item->id }}">{{ $item->title ?? 'Title Belum Tersedia' }}</button>
                        @endforeach
                    </div>
                    <!-- Time Filter -->
                    <div class="mt-2 mb-3">
                        <select id="timeFilter" class="form-select w-100 event-tag">
                            <option value="all">Semua Waktu</option>
                            <option value="week">Minggu ini</option>
                            <option value="month">Bulan ini</option>
                        </select>
                    </div>

                    <div class="container my-4">
                        <div class="row" id="articleContainer">
                            @foreach ($article as $row)
                                @if ($row)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="event-card h-100" data-date="{{ \Carbon\Carbon::parse($row->created_at)->toISOString() }}" data-article-id="{{$row->id}}">
                                        <img src="{{ asset($row->image ?? 'default-thumbnail.png') }}" 
                                            alt="{{$row->title}}" height="125px" width="100px">
                                        <h1 class="event-title">{{ $row->title ?? 'Judul Tidak Tersedia' }}</h1>
                                        <p class="event-info text-warning"></p>

                                        @php
                                            $shortDescription = Str::limit(strip_tags($row->content), 50, '...');
                                        @endphp
                                        <p class="event-info">{{ $shortDescription }}</p>

                                        <a href="{{ route('article.show', $row->id) }}" class="text-primary text-decoration-none mt-2">Baca Selengkapnya</a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    @if ($article->isEmpty())
                        <div class="container text-center mt-5">
                            <img src="{{asset('global_assets/images/not_found.png')}}" class="not-found-img" alt="Not Found">
                            <h5 class="mt-3">Artikel Kosong</h5>
                        </div>
                    @endif

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
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>  
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('articleSearchInput');
            const timeFilter = document.getElementById('timeFilter');
            const filterButtons = document.querySelectorAll('.filter-btn, .event-tag[data-filter="all"]');
            const articleCards = document.querySelectorAll('.event-card');
            const articleContainer = document.getElementById('articleContainer');

            // Initialize all cards as visible
            articleCards.forEach(card => card.style.display = 'block');

            // Search Functionality
            searchInput.addEventListener('input', function (e) {
                filterArticles();
            });

            // Time Filter Functionality
            timeFilter.addEventListener('change', function () {
                filterArticles();
            });

            // Filter Button Functionality
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    filterArticles();
                });
            });

            // Combined Filter Function
            function filterArticles() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const timeRange = timeFilter.value;
                const activeFilter = document.querySelector('.event-tag.active').getAttribute('data-filter');
                
                let hasVisibleCards = false;

                articleCards.forEach(card => {
                    const title = card.querySelector('.event-title').textContent.toLowerCase();
                    const description = card.querySelectorAll('.event-info')[1]?.textContent.toLowerCase() || '';
                    const date = card.getAttribute('data-date');
                    const articleId = card.getAttribute('data-article-id');
                    const cardElement = card.closest('.col-md-3');

                    // Search Filter
                    const matchesSearch = searchTerm === '' || 
                        title.includes(searchTerm) || 
                        description.includes(searchTerm);

                    // Time Filter
                    let matchesTime = true;
                    if (timeRange !== 'all' && date) {
                        const today = new Date();
                        const articleDate = new Date(date);

                        if (timeRange === 'week') {
                            const oneWeekAgo = new Date();
                            oneWeekAgo.setDate(today.getDate() - 7);
                            matchesTime = articleDate >= oneWeekAgo;
                        } else if (timeRange === 'month') {
                            const oneMonthAgo = new Date();
                            oneMonthAgo.setMonth(today.getMonth() - 1);
                            matchesTime = articleDate >= oneMonthAgo;
                        }
                    }

                    // Category Filter
                    const matchesFilter = activeFilter === 'all' || articleId === activeFilter;

                    // Show or hide card based on all filters
                    if (matchesSearch && matchesTime && matchesFilter) {
                        cardElement.style.display = 'block';
                        hasVisibleCards = true;
                    } else {
                        cardElement.style.display = 'none';
                    }
                });

                // Show "not found" message if no cards match filters
                const notFoundDiv = document.querySelector('.container.text-center.mt-5');
                if (notFoundDiv) {
                    notFoundDiv.style.display = hasVisibleCards ? 'none' : 'block';
                }
            }

            // Initial filter
            filterArticles();
        });
    </script>
	</body>
</html>
