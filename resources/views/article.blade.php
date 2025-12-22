<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artikel Game - Loop Tourney</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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

        /* Hero Banner Styles */
        .hero-banner {
            position: relative;
            height: 50vh;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(108, 92, 231, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(253, 121, 168, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 184, 148, 0.2) 0%, transparent 50%),
                linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
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
            width: 120px;
            height: 120px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 15px 30px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 0 30px rgba(108, 92, 231, 0.5);
            animation: float 6s ease-in-out infinite;
            transition: all 0.3s ease;
        }

        .hero-logo:hover {
            transform: scale(1.05);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                0 0 50px rgba(108, 92, 231, 0.7);
        }

        .hero-logo img {
            width: 70px;
            height: 70px;
            filter: brightness(0) invert(1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
            font-weight: 300;
        }

        /* Scroll Animation */
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating Particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float-particle 15s infinite linear;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }
        
        .card {
            background: rgba(30, 30, 47, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }
        
        .card-header {
            background: rgba(40, 40, 60, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
        }
        
        .card-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: white;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .search-container {
            position: relative;
            margin: 1.5rem 0;
        }
        
        .search-input {
            background: rgba(30, 30, 47, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            padding: 0.8rem 1.5rem 0.8rem 3rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            background: rgba(40, 40, 60, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
            outline: none;
        }
        
        .search-icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary);
        }

        /* Filter Buttons */
        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin: 1.5rem 0;
        }
        
        .filter-btn {
            background: rgba(40, 40, 60, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 0.6rem 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        /* Article Grid */
        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
        }
        
        .article-card {
            background: linear-gradient(145deg, rgba(40, 40, 60, 0.8), rgba(30, 30, 47, 0.9));
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            height: 100%;
        }
        
        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: rgba(108, 92, 231, 0.5);
        }
        
        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .article-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: calc(100% - 200px);
        }
        
        .article-title {
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            color: white;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .article-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .article-date {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }
        
        .read-more {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border: none;
            border-radius: 25px;
            padding: 0.6rem 1.2rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            width: fit-content;
        }
        
        .read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
            color: white;
        }
        
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
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }

        .not-found-container {
            text-align: center;
            padding: 3rem 1rem;
            display: none;
        }
        
        .not-found-img {
            max-width: 200px;
            margin-bottom: 1.5rem;
            opacity: 0.7;
        }
        
        .not-found-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }

        /* Loading State */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .hero-logo {
                width: 100px;
                height: 100px;
            }
            
            .hero-logo img {
                width: 60px;
                height: 60px;
            }
            
            .article-grid {
                grid-template-columns: 1fr;
            }
            
            .filter-container {
                justify-content: center;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-light navbar-static">
        <div class="navbar-brand" style="display: flex; align-items: center;">
            <a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none;">
                {{-- <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> --}}
                <span>Loop Tourney</span>
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-demo1-mobile">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link active">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @endguest
                @if (auth()->check() && auth()->user()->status == 'pending')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link active">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @elseif (auth()->check() && auth()->user()->status == 'approved')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link active">Artikel</a></li>
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

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-background"></div>
        <div class="particles" id="particles"></div>
        <div class="hero-content">
            <div class="hero-logo">
                <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
            </div>
            <h1 class="hero-title">Artikel Gaming</h1>
            <p class="hero-subtitle">Temukan berita terbaru seputar dunia gaming</p>
        </div>
    </div>

    <div class="container">
        <div class="card scroll-animate">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-newspaper me-2"></i>Temukan Artikel untuk Game Favoritmu!</h2>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- Search Bar -->
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="articleSearchInput" class="form-control search-input" placeholder="Cari artikel berdasarkan judul atau deskripsi...">
                </div>

                <!-- Filter Buttons -->
                <div class="filter-container">
                    <button class="filter-btn active" data-filter="all">Semua Artikel</button>
                    @foreach ($article as $item)        
                    <button class="filter-btn" data-filter="{{ $item->id }}">{{ $item->title ?? 'Title Belum Tersedia' }}</button>
                    @endforeach
                </div>

                <!-- Article Grid -->
                <div class="article-grid" id="articleContainer">
                    @foreach ($article as $row)
                        @if ($row)
                        <div class="article-card scroll-animate" 
                             data-article-id="{{ $row->id }}"
                             data-title="{{ strtolower($row->title ?? '') }}"
                             data-description="{{ strtolower(strip_tags($row->content ?? '')) }}">
                            <img src="{{ asset($row->image ?? 'default-thumbnail.png') }}" 
                                 alt="{{ $row->title }}" class="article-image">
                            <div class="article-content">
                                <h3 class="article-title">{{ $row->title ?? 'Judul Tidak Tersedia' }}</h3>
                                <div class="article-date">
                                    <i class="far fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                </div>
                                @php
                                    $shortDescription = Str::limit(strip_tags($row->content), 120, '...');
                                @endphp
                                <p class="article-description">{{ $shortDescription }}</p>
                                <a href="{{ route('article.show', $row->id) }}" class="read-more">
                                    <i class="fas fa-book-open me-1"></i> Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                <!-- Not Found Message -->
                <div class="not-found-container" id="notFoundMessage">
                    <img src="{{ asset('global_assets/images/not_found.png') }}" class="not-found-img" alt="Not Found">
                    <h5 class="text-white mb-2">Artikel Tidak Ditemukan</h5>
                    <p class="not-found-text">Coba gunakan kata kunci lain atau atur filter yang berbeda.</p>
                </div>

                @if ($article->isEmpty())
                    <div class="not-found-container" style="display: block;">
                        <img src="{{ asset('global_assets/images/not_found.png') }}" class="not-found-img" alt="Not Found">
                        <h5 class="text-white mb-2">Belum Ada Artikel</h5>
                        <p class="not-found-text">Silakan kembali lagi nanti untuk melihat artikel terbaru.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 30px;">
                    <span>Loop Tourney</span>
                </div>
                <div class="footer-links">
                    <a href="{{route('contact.index')}}">Pusat Bantuan</a>
                </div>
                <div class="footer-copyright">
                    &copy; 2015 - 2025. Loop Tourney
                </div>
            </div>
        </div>
    </div>
    <!-- /footer -->

    <!-- Scripts -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 12;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 5 + 2;
                const left = Math.random() * 100;
                const animationDuration = Math.random() * 20 + 10;
                const animationDelay = Math.random() * 5;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${left}%`;
                particle.style.animationDuration = `${animationDuration}s`;
                particle.style.animationDelay = `${animationDelay}s`;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Scroll animation
        function handleScrollAnimation() {
            const elements = document.querySelectorAll('.scroll-animate');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            handleScrollAnimation();
            
            // Add scroll event listener
            window.addEventListener('scroll', handleScrollAnimation);
            
            // Initialize filter functionality
            initializeFilters();
        });

        // Filter functionality
        function initializeFilters() {
            const searchInput = document.getElementById('articleSearchInput');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const articleCards = document.querySelectorAll('.article-card');
            const notFoundMessage = document.getElementById('notFoundMessage');

            // Search Functionality
            searchInput.addEventListener('input', function (e) {
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
                const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
                
                let visibleCount = 0;

                articleCards.forEach(card => {
                    const title = card.getAttribute('data-title');
                    const description = card.getAttribute('data-description');
                    const articleId = card.getAttribute('data-article-id');

                    // Search Filter
                    const matchesSearch = searchTerm === '' || 
                        title.includes(searchTerm) || 
                        description.includes(searchTerm);

                    // Category Filter
                    const matchesFilter = activeFilter === 'all' || articleId === activeFilter;

                    // Show or hide card based on all filters
                    if (matchesSearch && matchesFilter) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show/hide not found message
                if (notFoundMessage) {
                    notFoundMessage.style.display = visibleCount === 0 ? 'block' : 'none';
                }

                // Add animation to visible cards
                setTimeout(() => {
                    const visibleCards = document.querySelectorAll('.article-card[style="display: block"]');
                    visibleCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                }, 50);
            }

            // Initial filter
            filterArticles();

            // Add debounce to search for better performance
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(filterArticles, 300);
            });
        }
    </script>
</body>
</html>