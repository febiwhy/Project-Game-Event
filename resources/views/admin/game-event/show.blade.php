<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detail Game Event - Loop Tourney</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        .sidebar-user img {
            border: 2px solid var(--primary);
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
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

        .nav-sidebar .nav-group-sub {
            background: rgba(40, 40, 60, 0.6) !important;
            border-left: 3px solid var(--primary);
            border-radius: 0 0 8px 8px;
            margin: 0 12px;
            padding: 0.5rem 0;
        }

        .nav-sidebar .nav-group-sub .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            padding: 0.75rem 1.5rem 0.75rem 3rem !important;
            transition: all 0.3s ease;
            border-left: 2px solid transparent;
            font-weight: 400;
        }

        .nav-sidebar .nav-group-sub .nav-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent);
            padding-left: 3.5rem !important;
        }

        .nav-sidebar .nav-group-sub .nav-link.active {
            color: white !important;
            background: linear-gradient(90deg, rgba(108, 92, 231, 0.2), transparent);
            border-left-color: var(--primary);
            font-weight: 500;
        }

        .nav-item-header {
            color: var(--secondary) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.25rem 1.5rem 0.5rem !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            margin-top: 1rem;
        }

        .nav-item-header:first-child {
            margin-top: 0;
        }

        .sidebar-mobile-toggler {
            background: linear-gradient(135deg, var(--primary), var(--accent)) !important;
            color: white !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-mobile-toggler a {
            color: white !important;
        }

        .card-sidebar-mobile {
            background: transparent !important;
            border: none !important;
        }

        /* Hero Banner Styles */
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

        .game-badge {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
        }

        /* Card Styles */
        .detail-card {
            background: rgba(30, 30, 47, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .detail-card-header {
            background: linear-gradient(135deg, rgba(40, 40, 60, 0.9), rgba(60, 60, 80, 0.7));
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
        }

        .detail-card-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: white;
            margin: 0;
            font-size: 2rem;
            text-align: center;
        }

        .game-image-container {
            text-align: center;
            padding: 2rem;
            background: rgba(40, 40, 60, 0.5);
            border-radius: 15px;
            margin: 1rem 0;
        }

        .game-thumbnail-large {
            max-width: 100%;
            height: auto;
            max-height: 400px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 3px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .game-thumbnail-large:hover {
            transform: scale(1.02);
            border-color: var(--primary);
            box-shadow: 0 15px 40px rgba(108, 92, 231, 0.3);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
        }

        .info-item {
            background: rgba(40, 40, 60, 0.5);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: rgba(50, 50, 70, 0.6);
            transform: translateX(5px);
        }

        .info-label {
            font-weight: 600;
            color: var(--secondary);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .slot-progress {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem 0;
        }

        .progress-bar-custom {
            background: linear-gradient(90deg, var(--success), var(--info));
            border-radius: 8px;
            height: 12px;
            transition: width 1s ease-in-out;
        }

        .slot-info {
            display: flex;
            justify-content: space-between;
            color: white;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .description-box {
            background: rgba(40, 40, 60, 0.5);
            padding: 2rem;
            border-radius: 15px;
            margin: 1rem 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .description-text {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.8;
            font-size: 1.1rem;
        }

        /* Button Styles */
        .btn-action {
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 0.5rem;
        }

        .btn-register {
            background: linear-gradient(135deg, var(--success), #00a085);
            color: white;
            box-shadow: 0 8px 25px rgba(0, 184, 148, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 184, 148, 0.4);
            color: white;
        }

        .btn-full {
            background: linear-gradient(135deg, var(--warning), #e67e22);
            color: white;
            box-shadow: 0 8px 25px rgba(253, 203, 110, 0.3);
        }

        .btn-full:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(253, 203, 110, 0.4);
        }

        .btn-cant-register {
            background: linear-gradient(135deg, var(--danger), #d63031);
            color: white;
            box-shadow: 0 8px 25px rgba(232, 67, 147, 0.3);
        }

        .btn-cant-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(232, 67, 147, 0.4);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-3px);
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 2rem;
            background: rgba(40, 40, 60, 0.5);
            border-radius: 15px;
            margin-top: 2rem;
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

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .hero-logo {
                width: 80px;
                height: 80px;
            }
            
            .hero-logo img {
                width: 50px;
                height: 50px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-action {
                width: 100%;
                max-width: 300px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            }
        }
    </style>
</head>

<body>

    <!-- Main navbar -->
    @if (optional(auth()->user())->hasAnyRole(['admin']))
    <div class="navbar navbar-expand-md navbar-light navbar-static">
        <div class="navbar-brand" style="display: flex; align-items: center;">
            <a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none;">
                {{-- <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> --}}
                <span>Loop Tourney</span>
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

            <span class="badge bg-success my-3 my-md-0 ml-md-3 mr-md-auto">
                <i class="icon-circle2 mr-1"></i> Online
            </span>

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
    <!-- /main navbar -->

        <!-- Main navbar user-->
    @if (optional(auth()->user())->hasAnyRole(['user']))
    <div class="navbar navbar-expand-md navbar-light navbar-static">
        <div class="navbar-brand" style="display: flex; align-items: center;">
            <a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none;">
                {{-- <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;"> --}}
                <span>Loop Tourney</span>
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link active">Home</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @endguest
                @if (auth()->check() && auth()->user()->status == 'pending')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link active">Home</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @elseif (auth()->check() && auth()->user()->status == 'approved')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link active">Home</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @endif
                @if (auth()->check() && !auth()->user()->hasRole('user'))
                    <li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
                @endif
            </ul>

            <span class="navbar-text ml-xl-3">
                @if (auth()->check())
                    <span class="badge bg-success mr-3">{{ auth()->user()->name }} Sedang Online</span>
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
                            <a href="" class="dropdown-item" data-toggle="modal" data-target="#coinHistoryModal">
                                <i class="fas fa-coins"></i> History Event
                            </a>
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
    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">
         @if (optional(auth()->user())->hasAnyRole(['admin']))
        <!-- Main sidebar -->
        <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Navigation</span>
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
                        <li class="nav-item-header">
                            <div class="text-uppercase font-size-xs line-height-xs">Main Navigation</div> 
                            <i class="icon-menu" title="Main"></i>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link">
                                <i class="icon-home4"></i>
                                <span>Dashboard Admin</span>
                            </a>
                        </li>

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="icon-users"></i>
                                <span>Data Akun</span>
                            </a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item">
                                    <a href="{{route('account.index')}}" class="nav-link">
                                        <i class="icon-list-unordered"></i> Daftar Akun
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link active">
                                <i class="icon-earth"></i>
                                <span>User Page</span>
                            </a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item">
                                    <a href="{{route('landing')}}" class="nav-link">
                                        <i class="icon-home"></i> Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('game-event.index')}}" class="nav-link active">
                                        <i class="icon-trophy"></i> Game Tournament
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('event-community.index')}}" class="nav-link">
                                        <i class="icon-users4"></i> Komunitas
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{route('article.index')}}" class="nav-link">
                                        <i class="icon-file-text"></i> Article
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('contact.index')}}" class="nav-link">
                                        <i class="icon-bubbles4"></i> Hubungi Kami
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            @endif
            <!-- /sidebar content -->
            
        </div>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Hero Banner -->
            <div class="hero-banner">
                <div class="hero-background"></div>
                <div class="particles" id="particles"></div>
                <div class="hero-content">
                    <div class="hero-logo">
                        <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
                    </div>
                    <h1 class="hero-title">{{ $game_event->name ?? 'Game Tournament' }}</h1>
                    <p class="hero-subtitle">Detail Informasi Lengkap Game Event</p>
                    <div class="game-badge">
                        <i class="fas fa-trophy mr-2"></i> Game Event
                    </div>
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
                        <i class="icon-bullhorn mr-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <strong>Pengajuan Event:</strong> Pengajuan membuat Game Event atau Komunitas bisa melalui form
                            <a href="{{route('contact.index')}}" class="text-warning font-weight-bold">Hubungi Kami</a>!
                        </div>
                    </div>
                </div>
                <!-- /info alert -->

                <!-- Detail Game Card -->
                <div class="detail-card scroll-animate">
                    <div class="detail-card-header">
                        <h2 class="detail-card-title">
                            <i class="fas fa-info-circle mr-2"></i>Detail Game Event
                        </h2>
                    </div>

                    <div class="card-body">
                        <!-- Game Image -->
                        @if (!empty($game_event->thumbnail))
                        <div class="game-image-container">
                            <img src="{{ asset($game_event->thumbnail) }}" alt="{{ $game_event->name }}" class="game-thumbnail-large">
                        </div>
                        @endif

                        <!-- Information Grid -->
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">ID Event</div>
                                <div class="info-value">#{{ $game_event->id ?? 'N/A' }}</div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">Nama Event</div>
                                <div class="info-value">{{ $game_event->name ?? 'Tidak tersedia' }}</div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">Penyelenggara</div>
                                <div class="info-value">{{ $game_event->organizer ?? 'Tidak ada' }}</div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">Tanggal Dibuat</div>
                                <div class="info-value">{{ $game_event->created_at?->format('d M Y, H:i') ?? 'Tidak tersedia' }}</div>
                            </div>
                        </div>

                        <!-- Slot Information -->
                        <div class="info-item">
                            <div class="info-label">Status Slot</div>
                            <div class="slot-progress">
                                <div class="progress" style="height: 12px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                                    @php
                                        $slot_filled = $game_event->slot_filled ?? 0;
                                        $slot_limit = $game_event->slot_limit ?? 1;
                                        $percentage = min(100, ($slot_filled / $slot_limit) * 100);
                                    @endphp
                                    <div class="progress-bar progress-bar-custom" style="width: {{ $percentage }}%;"></div>
                                </div>
                                <div class="slot-info">
                                    <span>Terisi: {{ $slot_filled }}</span>
                                    <span>Maksimum: {{ $slot_limit }}</span>
                                    <span>{{ number_format($percentage, 1) }}%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="description-box">
                            <div class="info-label" style="font-size: 1.1rem;">
                                <i class="fas fa-file-alt mr-2"></i>Deskripsi Event
                            </div>
                            <div class="description-text mt-3">
                                {{ $game_event->description ?? 'Tidak ada deskripsi tersedia untuk event ini.' }}
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            @if($game_event->slot_filled >= $game_event->slot_limit)    
                                <button class="btn-action btn-full" onclick="showFullSlotAlert()">
                                    <i class="fas fa-exclamation-triangle"></i>Slot Sudah Penuh
                                </button>
                            @elseif(auth()->check() && auth()->user()->status == 'approved')
                                <a href="{{ route('pendaftaran', $game_event->id ?? 0) }}" class="btn-action btn-register">
                                    <i class="icon-paperplane mr-2"></i>Daftar Sekarang
                                </a>
                            @else
                                <button class="btn-action btn-cant-register" onclick="showLoginAlert()">
                                    <i class="fas fa-lock mr-2"></i>Tidak Dapat Mendaftar
                                </button>
                            @endif
                            
                            @if (optional(auth()->user())->hasAnyRole(['admin']))
                            <a href="{{ route('game-event.index') }}" class="btn-action btn-back">
                                <i class="icon-arrow-left8 mr-2"></i>Kembali ke Daftar Event
                            </a>
                            @endif

                             @if (optional(auth()->user())->hasAnyRole(['user']))
                            <a href="{{route('landing')}}" class="btn-action btn-back">
                                <i class="icon-arrow-left8 mr-2"></i>Kembali ke Daftar Event
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /content area -->

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
                        <div class="footer-copyright text-white-50">
                            &copy; 2015 - 2025. Loop Tourney
                        </div>
                    </div>
                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->

    <!-- Scripts -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 4 + 2;
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

        function showLoginAlert() {
            Swal.fire({
                title: 'Tidak Dapat Mendaftar!',
                html: 'Silakan <b>login terlebih dahulu</b> atau tunggu <b>persetujuan akun</b> Anda!',
                icon: 'info',
                confirmButtonText: 'Mengerti',
                confirmButtonColor: '#6c5ce7',     
                background: '#1e1e2f',          
                color: '#ffffff',                
                iconColor: '#3498db'
            });
        }

        function showFullSlotAlert() {
            Swal.fire({
                title: 'Slot Sudah Penuh!',
                html: 'Mohon maaf, slot pendaftaran untuk event ini sudah <b>penuh</b>. Silakan ikuti event lainnya yang tersedia.',
                icon: 'warning',
                confirmButtonText: 'Lihat Event Lain',
                confirmButtonColor: '#fdcb6e',   
                background: '#1e1e2f',   
                color: '#ffffff',         
                iconColor: '#fdcb6e'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('game-event.index') }}";
                }
            });
        }

        // Animation on load
        document.addEventListener('DOMContentLoaded', function() {
            // Animate progress bar
            const progressBar = document.querySelector('.progress-bar');
            if (progressBar) {
                setTimeout(() => {
                    progressBar.style.transition = 'width 1.5s ease-in-out';
                }, 500);
            }
        });
    </script>

</body>
</html>