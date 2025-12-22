<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if (optional(auth()->user())->hasAnyRole(['admin']))
    <title>Admin - Loop Tourney</title>

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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

        /* Main Card Styles */
        .dashboard-card {
            background: rgba(30, 30, 47, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(40, 40, 60, 0.9), rgba(60, 60, 80, 0.7));
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem 2rem;
        }

        .card-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: white;
            margin: 0;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-title i {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Form Styles */
        .form-card {
            background: rgba(30, 30, 47, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .form-label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .form-control, .form-select {
            background: rgba(40, 40, 60, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: white;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(50, 50, 70, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        /* File Input Styles */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(40, 40, 60, 0.7);
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
            min-height: 60px;
        }

        .file-input-label:hover {
            border-color: var(--primary);
            background: rgba(50, 50, 70, 0.8);
            color: white;
        }

        .file-input-label i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }

        /* Button Styles */
        .btn-purple {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
            color: white;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
            color: white;
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

        .alert-success {
            background: linear-gradient(135deg, rgba(0, 184, 148, 0.2), rgba(0, 184, 148, 0.1));
            border: 1px solid rgba(0, 184, 148, 0.3);
            border-radius: 15px;
            color: white;
            backdrop-filter: blur(10px);
            border-left: 4px solid var(--success);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(232, 67, 147, 0.2), rgba(232, 67, 147, 0.1));
            border: 1px solid rgba(232, 67, 147, 0.3);
            border-radius: 15px;
            color: white;
            backdrop-filter: blur(10px);
            border-left: 4px solid var(--danger);
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

        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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

        /* Responsive adjustments */
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
                    <h1 class="hero-title">{{ isset($game_event) ? 'Edit Game Event' : 'Tambah Game Event' }}</h1>
                    <p class="hero-subtitle">{{ isset($game_event) ? 'Perbarui data turnamen game' : 'Buat turnamen game baru di platform Loop Tourney' }}</p>
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
                        <i class="icon-trophy mr-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <strong>Game Event Management:</strong> {{ isset($game_event) ? 'Perbarui data turnamen game yang sudah ada' : 'Buat turnamen game baru untuk platform' }}
                        </div>
                    </div>
                </div>
                <!-- /info alert -->

                <!-- Form Card -->
                <div class="form-card fade-in">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-{{ isset($game_event) ? 'edit' : 'plus' }}"></i>
                            {{ isset($game_event) ? 'Edit Game Event' : 'Tambah Game Event Baru' }}
                        </h2>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <!-- Error Notifications -->
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h6 class="alert-heading font-weight-semibold mb-2">
                                        <i class="icon-warning mr-2"></i>
                                        Terjadi Kesalahan:
                                    </h6>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <!-- Success Notifications -->
                                @if (session('success'))
                                <div class="alert alert-success">
                                    <h6 class="alert-heading font-weight-semibold mb-1">
                                        <i class="icon-check mr-2"></i>
                                        Berhasil!
                                    </h6>
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ isset($game_event) ? route('game-event.update', $game_event->id) : route('game-event.store') }}" method="POST" enctype="multipart/form-data" id="form-gameEvent">
                                    @csrf
                                    @if (isset($game_event))
                                        @method('PUT')
                                    @endif

                                    <input type="hidden" name="slot_filled" id="slot_filled" value="{{ $game_event->slot_filled ?? 0 }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                    {{-- <div class="form-group mb-4">
                                        <label for="user_id" class="form-label">Pilih User</label>
                                        <select name="user_id" id="user_id" class="form-select">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" 
                                                    {{ (isset($game_event) && $game_event->user_id == $user->id) ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    <div class="form-group mb-4">
                                        <label for="name" class="form-label">Nama Event</label>
                                        <input type="text" class="form-control" name="name" id="name" 
                                               value="{{ $game_event->name ?? '' }}" 
                                               placeholder="Masukkan nama event" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="organizer" class="form-label">Nama Penyelenggara</label>
                                        <input type="text" class="form-control" name="organizer" id="organizer" 
                                               value="{{ $game_event->organizer ?? '' }}" 
                                               placeholder="Masukkan nama penyelenggara" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="slot_limit" class="form-label">Batas Slot</label>
                                        <input type="number" class="form-control" name="slot_limit" id="slot_limit" 
                                               value="{{ $game_event->slot_limit ?? 0 }}" 
                                               placeholder="Masukkan batas maksimal slot" required min="1">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="thumbnail" class="form-label">Unggah Thumbnail</label>
                                        <div class="file-input-wrapper">
                                            <input type="file" name="thumbnail" id="thumbnail" 
                                                   class="form-control" {{ isset($game_event) ? '' : 'required' }} 
                                                   accept=".jpg,.jpeg,.png">
                                            <label for="thumbnail" class="file-input-label">
                                                <i class="icon-cloud-upload mr-2"></i>
                                                <span id="file-name">Pilih file thumbnail...</span>
                                            </label>
                                        </div>
                                        <div class="form-text">Format yang diterima: JPEG, PNG, JPG. Ukuran maksimal file: 2MB</div>
                                        @if(isset($game_event) && $game_event->thumbnail)
                                            <div class="mt-2">
                                                <small class="text-warning">File saat ini: {{ basename($game_event->thumbnail) }}</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea rows="5" class="form-control" name="description" id="description" 
                                                  placeholder="Masukkan deskripsi event">{{ $game_event->description ?? '' }}</textarea>
                                    </div>

                                    <div class="text-right mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-{{ isset($game_event) ? 'check' : 'paperplane' }} mr-2"></i>
                                            {{ isset($game_event) ? 'Perbarui' : 'Simpan' }}
                                        </button>
                                    </div>
                                </form>
                            </div>
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
    <script src="{{asset('global_assets/js/plugins/velocity/velocity.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/velocity/velocity.ui.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/components_modals.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 10;
            
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

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // File input display
            document.getElementById('thumbnail').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih file thumbnail...';
                document.getElementById('file-name').textContent = fileName;
            });

            // Initialize sidebar
            initializeSidebar();
        });

        function initializeSidebar() {
            // Add click event to all sidebar items with submenus
            const sidebarItems = document.querySelectorAll('.nav-item-submenu > .nav-link');
            
            sidebarItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parent = this.parentElement;
                    const wasOpen = parent.classList.contains('nav-item-open');
                    
                    // Close all other open submenus
                    document.querySelectorAll('.nav-item-submenu.nav-item-open').forEach(openItem => {
                        if (openItem !== parent) {
                            openItem.classList.remove('nav-item-open');
                        }
                    });
                    
                    // Toggle current item
                    if (!wasOpen) {
                        parent.classList.add('nav-item-open');
                    } else {
                        parent.classList.remove('nav-item-open');
                    }
                });
            });

            // Mobile sidebar functionality
            const mobileToggle = document.querySelector('.sidebar-mobile-main-toggle');
            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    document.querySelector('.sidebar').classList.toggle('sidebar-mobile-main');
                });
            }

            // Mobile expand functionality
            const mobileExpand = document.querySelector('.sidebar-mobile-expand');
            if (mobileExpand) {
                mobileExpand.addEventListener('click', function() {
                    const sidebar = document.querySelector('.sidebar');
                    sidebar.classList.toggle('sidebar-mobile-expanded');
                });
            }
        }

        // Form submission with AJAX
        $(document).ready(function () {
            $("#form-gameEvent").submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ isset($game_event) ? route('game-event.update', $game_event->id) : route('game-event.store') }}", 
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: "<span style='color: #00ff99; font-weight: bold;'>Berhasil!</span>",
                                html: "<span style='color: #ffffff; font-weight: bold;'>" + response.message + "</span>",
                                icon: "success",
                                background: "#1e1e2f",
                                color: "#ffffff",
                                confirmButtonColor: "#00c853",
                                confirmButtonText: "OKE"
                            }).then(() => {
                                window.location.href = "{{ route('game-event.index') }}";
                            });
                        }
                    },
                    error: function (xhr) {
                        let errorMessage = "Terjadi kesalahan, coba lagi!";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        
                        Swal.fire({
                            title: "<span style='color: #ff4444;'>Gagal!</span>",
                            html: "<span style='color: #ffffff; font-weight: bold;'>" + errorMessage + "</span>",
                            icon: "error",
                            background: "#1e1e2f",
                            color: "#ffffff",
                            confirmButtonColor: "#ff4444",
                            confirmButtonText: "OKE"
                        });
                    }
                });
            });
        });
    </script>
    @else
    <p>Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    @endif

</body>
</html>