<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Akun - Loop Tourney</title>

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

        .btn-success {
            background: linear-gradient(135deg, var(--success), #00a085);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 184, 148, 0.4);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d63031);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(232, 67, 147, 0.4);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #e1b12c);
            border: none;
            border-radius: 8px;
            color: #2d3436;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(253, 203, 110, 0.4);
            color: #2d3436;
        }

        /* Status Badges */
        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            border: 2px solid transparent;
        }

        .badge-approved {
            background: linear-gradient(135deg, var(--success), #00a085);
            color: white;
            border-color: rgba(0, 184, 148, 0.3);
        }

        .badge-rejected {
            background: linear-gradient(135deg, var(--danger), #d63031);
            color: white;
            border-color: rgba(232, 67, 147, 0.3);
        }

        /* Payment Proof Image Styles */
        .payment-proof-image {
            border: 2px solid var(--primary);
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .payment-proof-image:hover {
            border-color: var(--accent);
            box-shadow: 0 6px 20px rgba(108, 92, 231, 0.5);
            transform: scale(1.1);
        }

        /* Modal image styling */
        .modal-image {
            max-width: 100%;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        /* Table Styles */
        .table {
            background: rgba(30, 30, 47, 0.7);
            border-radius: 12px;
            overflow: hidden;
            margin: 0;
        }

        .table thead {
            background: linear-gradient(135deg, rgba(40, 40, 60, 0.9), rgba(60, 60, 80, 0.8)) !important;
        }

        .table thead th {
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: 600;
            padding: 1rem 1.25rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table tbody tr {
            background: rgba(30, 30, 47, 0.7);
            color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(40, 40, 60, 0.8);
            transform: translateY(-2px);
        }

        .table tbody td {
            border-color: rgba(255, 255, 255, 0.1);
            padding: 1rem 1.25rem;
            vertical-align: middle;
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

        /* Modal Styles */
        .modal-content.bg-dark {
            background: rgba(30, 30, 47, 0.95) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem 2rem;
        }

        .modal-title {
            color: white;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
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
                            <a href="#" class="nav-link active">
                                <i class="icon-users"></i>
                                <span>Data Akun</span>
                            </a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item">
                                    <a href="{{route('account.index')}}" class="nav-link active">
                                        <i class="icon-list-unordered"></i> Daftar Akun
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
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
                                    <a href="{{route('game-event.index')}}" class="nav-link">
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
                    <h1 class="hero-title">Daftar Akun</h1>
                    <p class="hero-subtitle">Kelola semua akun pengguna platform Loop Tourney</p>
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
                        <i class="icon-users mr-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <strong>Account Management:</strong> Kelola status dan aktivitas semua pengguna platform
                        </div>
                    </div>
                </div>
                <!-- /info alert -->

                <!-- Data Table -->
                <div class="dashboard-card scroll-animate">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-users"></i>
                            Data Daftar Akun
                        </h2>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload" onclick="$('#account-table').DataTable().ajax.reload();"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-4">
                            <div class="btn-group">
                                <a href="{{ route('account.create') }}" class="btn btn-purple">
                                    <i class="icon-plus22 mr-2"></i> Tambah Akun 
                                </a>
                                <button type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-header">Export Options</div>
                                    <a href="{{ route('download.pdf') }}" class="dropdown-item">
                                        <i class="icon-file-pdf mr-2"></i> Export to PDF
                                    </a>
                                    <a href="{{ route('export.excel') }}" class="dropdown-item">
                                        <i class="icon-file-excel mr-2"></i> Export to CSV
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="account-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Aktivitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data akan diisi oleh DataTables -->
                                </tbody>
                            </table>
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

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white">
                        <i class="icon-image2 mr-2"></i>Bukti Pembayaran
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-4">
                    <div id="image-container" style="min-height: 300px; display: flex; align-items: center; justify-content: center;">
                        <img id="payment_proof" 
                            src="" 
                            alt="Bukti Pembayaran" 
                            class="modal-image"
                            style="max-width: 100%; max-height: 70vh; object-fit: contain; border-radius: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/velocity/velocity.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/velocity/velocity.ui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
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

        // DataTable initialization
        $(document).ready(function() {
            $('#account-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('account.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { 
                        data: 'payment_proof', 
                        name: 'payment_proof', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            if (type === 'display') {
                                if (data && data !== "No image" && data !== "💤️") {
                                    // Pastikan path gambar benar
                                    let imagePath = data;
                                    // Jika path relatif, tambahkan base URL
                                    if (!data.startsWith('http') && !data.startsWith('/') && !data.startsWith('{{ asset("") }}')) {
                                        imagePath = '{{ asset("") }}' + data;
                                    }
                                    
                                    // Escape single quotes dalam URL
                                    const safeImagePath = imagePath.replace(/'/g, "\\'");
                                    
                                    return `
                                        <img src="${imagePath}" 
                                            class="payment-proof-image rounded-circle" 
                                            width="50" 
                                            height="50" 
                                            alt="Bukti Pembayaran"
                                            style="cursor: pointer; border: 2px solid var(--primary); object-fit: cover;"
                                            onclick="showImageModal('${safeImagePath}')"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                        <div style="display: none; cursor: pointer;" onclick="showImageModal('${safeImagePath}')">
                                            <i class="icon-image2 text-muted" style="font-size: 24px;"></i>
                                        </div>
                                    `;
                                } else {
                                    return '<span class="text-muted"><i class="icon-image2 mr-1"></i>Tidak Ada</span>';
                                }
                            }
                            return data;
                        }
                    },
                    { 
                        data: 'status', 
                        name: 'status',
                        render: function(data, type, full, meta) {
                            let badgeClass = 'badge-pending';
                            if (data === 'approved') badgeClass = 'badge-approved';
                            if (data === 'rejected') badgeClass = 'badge-rejected';
                            
                            return `<span class="badge-status ${badgeClass}">${data}</span>`;
                        }
                    },
                    { data: 'role', name: 'role' },
                    { data: 'activity', name: 'activity' },
                    { 
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return data || `
                                <div class="btn-group">
                                    ${full.status === 'pending' ? `
                                        <button class="btn btn-success btn-sm" onclick="updateStatus(${full.id}, 'approved')">
                                            <i class="icon-check mr-1"></i> Approve
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="updateStatus(${full.id}, 'rejected')">
                                            <i class="icon-cross2 mr-1"></i> Reject
                                        </button>
                                    ` : ''}
                                    <button class="btn btn-danger btn-sm" onclick="confirmDeleteAccount(${full.id})">
                                        <i class="icon-trash mr-1"></i> Hapus
                                    </button>
                                </div>
                            `;
                        }
                    }
                ],
                language: {
                    paginate: {
                        previous: '<i class="icon-arrow-left12"></i>',
                        next: '<i class="icon-arrow-right12"></i>'
                    },
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ entri',
                    info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entri',
                    infoEmpty: 'Menampilkan 0 hingga 0 dari 0 entri',
                    infoFiltered: '(disaring dari _MAX_ total entri)'
                },
                dom: '<"top"<"row"<"col-sm-6"l><"col-sm-6"f>>>rt<"bottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
                initComplete: function() {
                    $('.dataTables_filter input').addClass('form-control').css({
                        'background-color': 'rgba(255, 255, 255, 0.1)',
                        'color': '#ffffff',
                        'border': '1px solid rgba(255, 255, 255, 0.2)',
                        'border-radius': '8px',
                        'padding': '0.5rem 1rem'
                    });

                    $('.dataTables_length select').addClass('form-select').css({
                        'background-color': 'rgba(255, 255, 255, 0.1)',
                        'color': '#ffffff',
                        'border': '1px solid rgba(255, 255, 255, 0.2)',
                        'border-radius': '8px'
                    });

                    $('.dataTables_paginate .paginate_button').addClass('btn btn-light btn-sm').css({
                        'background': 'rgba(255, 255, 255, 0.1)',
                        'border': '1px solid rgba(255, 255, 255, 0.2)',
                        'color': 'white',
                        'margin': '2px'
                    });

                    $('.dataTables_paginate .paginate_button.current').css({
                        'background': 'linear-gradient(135deg, var(--primary), var(--accent))',
                        'border': 'none'
                    });
                }
            });
        });

        // Fungsi untuk menampilkan modal gambar
        function showImageModal(imageUrl) {
            if (imageUrl && imageUrl !== "No image" && imageUrl !== "💤️") {
                // Set image source
                $('#payment_proof').attr('src', imageUrl);
                
                // Show modal
                $('#imageModal').modal('show');
                
                // Handle image loading error
                $('#payment_proof').on('error', function() {
                    $('#image-container').html(`
                        <div class="text-center text-muted">
                            <i class="icon-image2 display-4 d-block mb-2"></i>
                            <p>Gambar tidak dapat dimuat</p>
                            <small>URL: ${imageUrl}</small>
                        </div>
                    `);
                });
                
            } else {
                Swal.fire({
                    title: 'Tidak Ada Bukti',
                    text: 'Tidak ada bukti pembayaran yang tersedia',
                    icon: 'info',
                    background: '#1e1e2f',
                    color: '#ffffff',
                    confirmButtonColor: '#6c5ce7'
                });
            }
        }

        // Fungsi untuk menampilkan gambar sederhana (fallback)
        function showImage(imageUrl) {
            showImageModal(imageUrl);
        }

        // Fungsi Konfirmasi Hapus
        function confirmDeleteAccount(id) {
            Swal.fire({
                title: "<span style='color: #ff6666;'>Yakin ingin menghapus?</span>",
                html: "<span style='color: #ff6666;'>Data yang dihapus tidak bisa dikembalikan!</span>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                background: '#1e1e2f',
                color: '#ffffff'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/account/" + id,
                        type: "DELETE",
                        data: { _token: "{{ csrf_token() }}" },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "<span style='color: #00ff99; font-weight: bold;'>Berhasil!</span>",
                                    html: "<span style='color: #ffffff;'>Data telah berhasil dihapus.</span>",
                                    icon: "success",
                                    background: "#1e1e2f",
                                    color: "#ffffff",
                                    confirmButtonColor: "#00c853",
                                    confirmButtonText: "OKE"
                                });
                                $('#account-table').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: "<span style='color: #ff4444;'>Gagal!</span>",
                                    html: "<span style='color: #ffffff;'>Terjadi kesalahan, data gagal dihapus.</span>",
                                    icon: "error",
                                    background: "#1e1e2f",
                                    color: "#ffffff",
                                    confirmButtonColor: "#ff4444",
                                    confirmButtonText: "OKE"
                                });
                            }
                        }
                    });
                }
            });
        }

        function updateStatus(id, status) {
            if (status === 'approved') {
                Swal.fire({
                    title: 'Konfirmasi Pembayaran?',
                    text: 'Data akan disetujui.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Setujui',
                    cancelButtonText: 'Batal',
                    background: "#1e1e2f",
                    color: "#fff",
                    confirmButtonColor: "#00b894"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/account/update-status/" + id,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                status: status
                            },
                            success: function() {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Status berhasil diperbarui.',
                                    icon: 'success',
                                    background: '#1e1e2f',
                                    color: '#fff'
                                });
                                $('#account-table').DataTable().ajax.reload();
                            }
                        });
                    }
                });
            } else if (status === 'rejected') {
                Swal.fire({
                    title: 'Tolak Pembayaran?',
                    text: 'Akun akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    background: "#1e1e2f",
                    color: "#fff"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/account/" + id,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Dihapus!',
                                    text: 'Akun berhasil dihapus.',
                                    icon: 'success',
                                    background: '#1e1e2f',
                                    color: '#fff'
                                });
                                $('#account-table').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal menghapus akun.',
                                    icon: 'error',
                                    background: '#1e1e2f',
                                    color: '#fff'
                                });
                            }
                        });
                    }
                });
            }
        }
    </script>
    {{-- <script>
        // Debugging - Tambahkan event listener untuk memastikan modal bekerja
        document.addEventListener('DOMContentLoaded', function() {
            // Cek apakah modal terdaftar dengan benar
            console.log('Modal element:', document.getElementById('imageModal'));
            
            // Event listener untuk modal show
            $('#imageModal').on('show.bs.modal', function () {
                console.log('Modal is showing');
            });
            
            // Event listener untuk modal hide
            $('#imageModal').on('hide.bs.modal', function () {
                console.log('Modal is hiding');
            });
            
            // Test manual - buat tombol test
            const testButton = document.createElement('button');
            testButton.textContent = 'Test Modal';
            testButton.className = 'btn btn-info btn-sm';
            testButton.style.position = 'fixed';
            testButton.style.top = '10px';
            testButton.style.right = '10px';
            testButton.style.zIndex = '9999';
            testButton.onclick = function() {
                showImageModal('https://via.placeholder.com/600x400/6c5ce7/ffffff?text=Test+Image');
            };
            document.body.appendChild(testButton);
        });
    </script> --}}

</body>
</html>