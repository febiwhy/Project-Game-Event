<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Leaderboard - Loop Tourney</title>

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
            --gold: #ffd700;
            --silver: #c0c0c0;
            --bronze: #cd7f32;
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

        /* Leaderboard Styles */
        .leaderboard-container {
            padding: 2rem 0;
        }

        .leaderboard-card {
            background: linear-gradient(145deg, rgba(40, 40, 60, 0.8), rgba(30, 30, 47, 0.9));
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .leaderboard-header {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 2rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .leaderboard-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }

        .leaderboard-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .table-leaderboard {
            width: 100%;
            margin-bottom: 0;
            color: white;
        }

        .table-leaderboard thead th {
            background: rgba(40, 40, 60, 0.9);
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            padding: 1.2rem 1rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .table-leaderboard tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .table-leaderboard tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.01);
        }

        .table-leaderboard tbody td {
            padding: 1.2rem 1rem;
            vertical-align: middle;
        }

        /* Rank Styles */
        .rank-badge {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .rank-1 .rank-badge {
            background: linear-gradient(135deg, var(--gold), #ffed4e);
            color: #000;
            box-shadow: 0 4px 20px rgba(255, 215, 0, 0.4);
        }

        .rank-2 .rank-badge {
            background: linear-gradient(135deg, var(--silver), #e8e8e8);
            color: #000;
            box-shadow: 0 4px 20px rgba(192, 192, 192, 0.4);
        }

        .rank-3 .rank-badge {
            background: linear-gradient(135deg, var(--bronze), #e6a756);
            color: #fff;
            box-shadow: 0 4px 20px rgba(205, 127, 50, 0.4);
        }

        .rank-other .rank-badge {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Tournament Styles */
        .tournament-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .tournament-avatar {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .tournament-item:hover .tournament-avatar {
            border-color: var(--primary);
            transform: scale(1.05);
        }

        .tournament-info h5 {
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: white;
        }

        .tournament-info p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin: 0;
        }

        .participant-count {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--success);
            text-align: center;
        }

        .participant-label {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Progress Bar */
        .progress-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .progress {
            flex-grow: 1;
            height: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--success), var(--info));
            border-radius: 10px;
            transition: width 1s ease-in-out;
        }

        .progress-text {
            min-width: 60px;
            text-align: right;
            font-weight: 600;
            color: var(--success);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: linear-gradient(145deg, rgba(40, 40, 60, 0.8), rgba(30, 30, 47, 0.9));
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
        }

        .stat-number {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-top: 0.5rem;
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
            
            .leaderboard-title {
                font-size: 1.8rem;
            }
            
            .tournament-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
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
                @if (auth()->check() && auth()->user()->status == 'pending')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link active">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @elseif (auth()->check() && auth()->user()->status == 'approved')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link active">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
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
    <!-- /main navbar -->

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-background"></div>
        <div class="particles" id="particles"></div>
        <div class="hero-content">
            <div class="hero-logo">
                <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
            </div>
            <h1 class="hero-title">Game Leaderboard</h1>
            <p class="hero-subtitle">Lihat ranking turnamen game paling populer</p>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            {{-- <!-- Page header -->
            <div class="page-header border-bottom-0">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h1 class="page-title scroll-animate">Leaderboard Turnamen</h1>
                    </div>
                </div>
            </div>
            <!-- /page header --> --}}

            <!-- Stats Cards -->
            {{-- <div class="stats-grid scroll-animate">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="stat-number">{{ count($leaderboards) }}</div>
                    <div class="stat-label">Total Turnamen</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">{{ $leaderboards->sum('slot_filled') }}</div>
                    <div class="stat-label">Total Peserta</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <div class="stat-number">{{ $leaderboards->unique('name')->count() }}</div>
                    <div class="stat-label">Jenis Game</div>
                </div>
            </div> --}}

            <div class="card scroll-animate">
                <div class="card-header">
                    <h2 class="card-title"><i class="fas fa-trophy me-2"></i>Leaderboard Turnamen Terpopuler</h2>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="leaderboard-container">
                        <div class="leaderboard-card">
                            <div class="leaderboard-header">
                                <h2 class="leaderboard-title"><i class="fas fa-crown me-2"></i> TOP TOURNAMENT RANKING</h2>
                                <p class="leaderboard-subtitle">Rekomendasi</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-leaderboard">
                                    <thead>
                                        <tr>
                                            <th width="80" class="text-center">Rank</th>
                                            <th>Nama Turnamen</th>
                                            <th width="150" class="text-center">populer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leaderboards as $index => $leaderboard)  
                                            <tr class="rank-{{ $index < 3 ? $index+1 : 'other' }} scroll-animate">
                                                <td class="text-center">
                                                    <div class="rank-badge">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tournament-item">
                                                        <img src="{{ asset($leaderboard->thumbnail ?? 'default-thumbnail.png') }}" 
                                                             alt="{{ $leaderboard->name }}" class="tournament-avatar">
                                                        <div class="tournament-info">
                                                            <h5>{{ $leaderboard->name ?? 'Nama Tidak Tersedia' }}</h5>
                                                            <p>{{ $leaderboard->organizer ?? 'Penyelenggara Tidak Diketahui' }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="participant-count">{{ $leaderboard->slot_filled ?? 0 }}</div>
                                                    <div class="participant-label">Peserta</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    
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
                
                // Random size and position
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
        });
    </script>
</body>
</html>