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
	{{-- Navbar role admin --}}
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
	{{-- /Navbar role admin --}}

    <!-- Main navbar -->
	@if (optional(auth()->user())->hasAnyRole(['user']))
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
	@endif

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
									<a class="text-white"><i class="icon-cog3"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="card card-sidebar-mobile">
						<ul class="nav nav-sidebar" data-nav-type="accordion">

							<!-- Main -->
							<li class="nav-item-header">
								<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
							</li>
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
						<li class="nav-item">
							<a href="{{route('article.index')}}" class="nav-link"><i class="icon-enter5 mr-3 mr-3"></i> <span>Kembali</span></a>
						</li>	
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
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <div class="card bg-dark text-white p-3 mb-4">
                <div class="card-header header-elements-inline">
                    <h1 class="card-title">Artikel Tentang {{$article->title}}</h1>
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
                    <span type="text" id="articleSearchInput" class="form-control" placeholder="Cari article..."></span>
                </div>
					<div class="row m-3">
						<div class="col-lg-8">
							<p class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('d F Y H:i') }} WIB</p>
							<div class="row g-4">
								<div class="col-md-6">
									<img src="{{ asset($article->image ?? 'default-image.png') }}" class="img-fluid mb-2 rounded">
									{{-- <p class="text-muted small">Presiden AS Donald Trump (kanan) saat menghadiri UFC 244 di Madison Square Garden, New York.</p> --}}
								</div>
								<div class="col-md-6 d-flex align-items-center">
								</div>
							</div>
							<hr>
							<p><strong>{{$article->title}}</strong> - {!! nl2br(e($article->content ?? 'Tidak ada content')) !!}</p>
						</div>

						<div class="col-lg-4">
							<h5 class="border-bottom pb-2">Article Lainnya</h5>

							<!-- Setiap item terpopuler -->
							@foreach ($populerArticle as $article)
							<div class="d-flex mb-3">
								<a href="{{ route('article.show', $article->id) }}" class="flex items-center">
									<img src="{{ asset($article->image ?? 'default-image.png') }}" width="100px" height="70px" class="mr-2 rounded" alt="thumbnail">
									<div class="text-white font-semibold text-sm">{{ Str::limit($article->title,50) }}
										<div class="text-blue-400 text-xs">Baca Selengkapnya</div>
									</div>
								</a>
							</div>
							@endforeach
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

    <!-- Core JS files -->
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