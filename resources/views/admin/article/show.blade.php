<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Article - {{$article->title}} | Loop Tourney</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Orbitron:wght@400;500;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6c5ce7;
            --secondary: #a29bfe;
            --accent: #fd79a8;
            --dark: #1e1e2f;
            --darker: #151521;
            --light: #f8f9fa;
            --success: #00b894;
            --warning: #fdcb6e;
            --danger: #e84393;
            --info: #0984e3;
        }
        
        body {
            background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
            color: var(--light);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        
        .navbar {
            background: rgba(30, 30, 47, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        
        .navbar-brand span {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 1.5rem;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: white !important;
            background: rgba(108, 92, 231, 0.2);
            transform: translateY(-2px);
        }

        /* Sidebar Styles */
        .sidebar {
            background: linear-gradient(180deg, var(--darker) 0%, var(--dark) 100%) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.3);
        }

        .sidebar-user {
            background: linear-gradient(135deg, rgba(40, 40, 60, 0.9), rgba(60, 60, 80, 0.7)) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .sidebar-user .card-body {
            background: transparent !important;
            padding: 1.5rem;
        }

        .sidebar-user .media-title {
            color: white !important;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .sidebar-user .font-size-xs {
            color: var(--secondary) !important;
            font-weight: 500;
        }

        .nav-sidebar > .nav-item > .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            border-radius: 10px;
            margin: 4px 12px;
            padding: 0.875rem 1rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            font-weight: 500;
        }

        .nav-sidebar > .nav-item > .nav-link:hover,
        .nav-sidebar > .nav-item > .nav-link.active {
            background: linear-gradient(135deg, var(--primary), var(--accent)) !important;
            color: white !important;
            transform: translateX(8px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .nav-sidebar > .nav-item > .nav-link i {
            color: var(--secondary) !important;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
            margin-right: 0.75rem;
            transition: all 0.3s ease;
        }

        .nav-sidebar > .nav-item > .nav-link:hover i,
        .nav-sidebar > .nav-item > .nav-link.active i {
            color: white !important;
            transform: scale(1.1);
        }

        /* Hero Banner */
        .hero-banner {
            position: relative;
            height: 40vh;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, 
                rgba(108, 92, 231, 0.3) 0%, 
                rgba(253, 121, 168, 0.2) 50%, 
                rgba(30, 30, 47, 0.9) 100%);
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(108, 92, 231, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(253, 121, 168, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 184, 148, 0.2) 0%, transparent 50%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            padding: 0 2rem;
        }

        .hero-logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 15px 30px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 0 30px rgba(108, 92, 231, 0.6);
            animation: float 6s ease-in-out infinite;
        }

        .hero-logo img {
            width: 60px;
            height: 60px;
            filter: brightness(0) invert(1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 3rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            margin-bottom: 1rem;
        }

        /* Article Styles */
        .article-card {
            background: rgba(30, 30, 47, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .article-header {
            background: linear-gradient(135deg, rgba(40, 40, 60, 0.9), rgba(60, 60, 80, 0.7));
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
        }

        .article-title {
            font-family: 'Bungee', sans-serif;
            color: #ffffff;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .article-meta {
            color: var(--secondary);
            font-size: 1rem;
            font-weight: 500;
        }

        .article-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 3px solid rgba(255, 255, 255, 0.1);
            margin: 2rem 0;
            transition: all 0.3s ease;
        }

        .article-image:hover {
            transform: scale(1.02);
            border-color: var(--primary);
            box-shadow: 0 15px 40px rgba(108, 92, 231, 0.3);
        }

        .article-content {
            padding: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .article-content strong {
            color: white;
            font-weight: 600;
        }

        .sidebar-articles {
            background: rgba(30, 30, 47, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: white;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .related-article {
            display: flex;
            align-items: center;
            padding: 1rem;
            margin-bottom: 1rem;
            background: rgba(40, 40, 60, 0.5);
            border-radius: 12px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .related-article:hover {
            background: rgba(50, 50, 70, 0.7);
            transform: translateX(8px);
            text-decoration: none;
            color: inherit;
        }

        .related-article img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .related-article-content h6 {
            font-family: 'Bungee', sans-serif;
            color: white;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
            line-height: 1.3;
        }

        .related-article-content .read-more {
            color: var(--secondary);
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Search Bar */
        .search-container {
            position: relative;
            margin: 2rem 0;
        }

        .search-input {
            background: rgba(40, 40, 60, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: white;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(50, 50, 70, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.3);
            outline: none;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Alert Styles */
        .alert-custom {
            background: linear-gradient(135deg, rgba(9, 132, 227, 0.2), rgba(9, 132, 227, 0.1));
            border: 1px solid rgba(9, 132, 227, 0.3);
            border-radius: 15px;
            color: white;
            backdrop-filter: blur(10px);
            border-left: 4px solid var(--info);
        }

        /* Footer Styles */
        .footer {
            background: rgba(30, 30, 47, 0.9);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .article-title {
                font-size: 1.8rem;
            }
            
            .hero-logo {
                width: 80px;
                height: 80px;
            }
            
            .hero-logo img {
                width: 50px;
                height: 50px;
            }
            
            .related-article {
                flex-direction: column;
                text-align: center;
            }
            
            .related-article img {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>

<body>
	
	{{-- Navbar role admin --}}
	@if (optional(auth()->user())->hasAnyRole(['admin']))
		<div class="navbar navbar-expand-md navbar-light navbar-static">
			<div class="navbar-brand" style="display: flex; align-items: center;">
				<a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none; color: #fff;">
					{{-- <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> --}}
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
				@if (auth()->check() && auth()->user()->status == 'pending')
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
					<li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link ">Status Akun</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
				@elseif (auth()->check() && auth()->user()->status == 'approved')
					<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link ">Home</a></li>
					<li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link ">Status Akun</a></li>
					<li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">leaderboard</a></li>
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link active">Artikel</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link ">Hubungi Kami</a></li>
				@elseif (auth()->check() && !auth()->user()->hasRole('admin'))
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
				@endif
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
                                    <a href="#"><img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="44" height="44" class="rounded-circle" alt="Admin Avatar"></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">
                                        @if (auth()->check())
                                            {{ auth()->user()->name }}
                                        @else
                                            Admin
                                        @endif
                                    </div>
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-user-check mr-1"></i> Administrator
                                    </div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <span class="badge badge-success badge-pill">Online</span>
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
                                </span>
                            </a>
                        </li>

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-indent-decrease2"></i> <span>Data Akun</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Sidebars">
                                <li class="nav-item">
                                    <a href="{{route('account.index')}}" class="nav-link"> Daftar Akun </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link active"><i class="icon-earth"></i> <span>User Page</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="User Page">
                                <li class="nav-item"><a href="{{route('landing')}}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{route('game-event.index')}}" class="nav-link">Game Tournament</a></li>
                                {{-- <li class="nav-item"><a href="{{route('event-community.index')}}" class="nav-link">Komunitas</a></li> --}}
                                <li class="nav-item"><a href="{{route('article.index')}}" class="nav-link active">Article</a></li>
                                <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">Hubungi Kami</a></li>
                            </ul>
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

            <!-- Hero Banner -->
            <div class="hero-banner">
                <div class="hero-background"></div>
                <div class="hero-content">
                    <div class="hero-logo">
                        <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
                    </div>
                    <h1 class="hero-title">Article Details</h1>
                    <p class="hero-subtitle">Discover the latest gaming insights and updates</p>
                </div>
            </div>

			<!-- Content area -->
			<div class="content pt-0">

				<!-- Info alert -->
				<div class="alert alert-custom alert-styled-left alert-arrow-left alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<h4 class="alert-heading font-weight-semibold mb-2">
						<i class="icon-info3 mr-2"></i>
						@if (auth()->check())
							Selamat Datang, {{ auth()->user()->name }}
						@else
							Guest
						@endif
					</h4>
					<hr style="border-color: rgba(255,255,255,0.2);">
					<div class="d-flex align-items-center">
						<i class="icon-book mr-3" style="font-size: 1.5rem;"></i>
						<div>
							<strong>Article Details:</strong> Explore in-depth gaming content and stay updated with the latest news
						</div>
					</div>
				</div>
				<!-- /info alert -->

				<!-- Article Content -->
				<div class="article-card">
					<div class="article-header">
						<h1 class="article-title">{{$article->title}}</h1>
						<div class="article-meta">
							<i class="icon-calendar3 mr-2"></i>
							{{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('d F Y H:i') }} WIB
						</div>
					</div>

					<div class="card-body">
                        <!-- Search Bar -->
                        {{-- <div class="search-container">
                            <input type="text" id="articleSearchInput" class="search-input" placeholder="Cari artikel lainnya...">
                        </div> --}}

                        <div class="row">
                            <div class="col-lg-8">
                                @if($article->image)
                                <img src="{{ asset($article->image) }}" alt="{{$article->title}}" class="article-image">
                                @endif
                                
                                <div class="article-content">
                                    <p><strong>{{$article->title}}</strong> - {!! nl2br(e($article->content ?? 'Tidak ada content')) !!}</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="sidebar-articles">
                                    <h5 class="sidebar-title">Article Lainnya</h5>
                                    
                                    @foreach ($populerArticle as $article)
                                    <a href="{{ route('article.show', $article->id) }}" class="related-article">
                                        <img src="{{ asset($article->image ?? 'default-image.png') }}" alt="{{ Str::limit($article->title, 50) }}">
                                        <div class="related-article-content">
                                            <h6>{{ Str::limit($article->title, 50) }}</h6>
                                            <div class="read-more">Baca Selengkapnya <i class="icon-arrow-right8 ml-1"></i></div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<!-- /content area -->

			{{-- Footer User --}}
		@if (optional(auth()->user())->hasAnyRole(['user']))
        <div class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 30px;">
                        <span>Loop Tourney</span>
                    </div>
                    <div class="footer-links">
                        <a href="{{route('contact.index')}}" class="text-white-50">Pusat Bantuan</a>
                    </div>
                    <div class="footer-copyright text-white-50">
                        &copy; 2015 - 2025. Loop Tourney
                    </div>
                </div>
            </div>
        </div>
		@endif
			{{-- Footer User --}}
			
			<!-- Footer admin-->
			
		@if (optional(auth()->user())->hasAnyRole(['admin']))
        <div class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 30px;">
                        <span>Loop Tourney</span>
                    </div>
                    <div class="footer-copyright text-white-50">
                        &copy; 2015 - 2025. Loop Tourney - Admin Panel
                    </div>
                </div>
            </div>
        </div>
		@endif
			<!-- /footer admin -->

		</div>
		<!-- /main content -->

	</div>

    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('articleSearchInput');
            const relatedArticles = document.querySelectorAll('.related-article');

            // Search Functionality for Related Articles
            searchInput.addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase().trim();
                
                let hasVisibleArticles = false;

                relatedArticles.forEach(article => {
                    const title = article.querySelector('h6').textContent.toLowerCase();
                    const articleElement = article.closest('.related-article');

                    if (searchTerm === '' || title.includes(searchTerm)) {
                        articleElement.style.display = 'flex';
                        hasVisibleArticles = true;
                    } else {
                        articleElement.style.display = 'none';
                    }
                });

                // Show message if no articles match
                const sidebar = document.querySelector('.sidebar-articles');
                let notFoundMessage = sidebar.querySelector('.no-results');
                
                if (!hasVisibleArticles && !notFoundMessage) {
                    notFoundMessage = document.createElement('div');
                    notFoundMessage.className = 'no-results text-center text-muted py-3';
                    notFoundMessage.innerHTML = '<i class="icon-search4 mr-2"></i>Tidak ada artikel yang ditemukan';
                    sidebar.appendChild(notFoundMessage);
                } else if (hasVisibleArticles && notFoundMessage) {
                    notFoundMessage.remove();
                }
            });

            // Add hover effects to related articles
            relatedArticles.forEach(article => {
                article.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });
                
                article.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>

</body>
</html>