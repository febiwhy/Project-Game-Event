<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Event Game - Loop Tourney</title>

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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Pusher Meta Tags -->
    <meta name="pusher-key" content="{{ env('PUSHER_APP_KEY') }}">
    <meta name="pusher-cluster" content="{{ env('PUSHER_APP_CLUSTER') }}">

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
            height: 100%;
            min-height: 500px;
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
            width: 200px;
            height: 200px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 0 50px rgba(108, 92, 231, 0.5);
            animation: float 6s ease-in-out infinite;
            transition: all 0.3s ease;
        }

        .hero-logo:hover {
            transform: scale(1.05);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                0 0 70px rgba(108, 92, 231, 0.7);
        }

        .hero-logo img {
            width: 120px;
            height: 120px;
            filter: brightness(0) invert(1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 4rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.5rem;
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
        }
        
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
        }
        
        .event-card {
            background: linear-gradient(145deg, rgba(40, 40, 60, 0.8), rgba(30, 30, 47, 0.9));
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: rgba(108, 92, 231, 0.5);
        }
        
        .event-card.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .event-card.disabled:hover {
            transform: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        
        .event-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .event-content {
            padding: 1.2rem;
        }
        
        .event-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.8rem;
        }
        
        .event-tag {
            background: var(--primary);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .event-tag.lounge {
            background: var(--accent);
        }
        
        .event-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.8rem;
            color: white;
            line-height: 1.3;
        }
        
        .event-info {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            margin-bottom: 1rem;
        }
        
        .event-info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .event-info-item i {
            color: var(--secondary);
            width: 16px;
        }
        
        .slot-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.2);
            padding: 0.6rem;
            border-radius: 8px;
            margin-top: 0.5rem;
        }
        
        .slot-progress {
            flex-grow: 1;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
            margin: 0 0.8rem;
        }
        
        .slot-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--success), var(--info));
            border-radius: 3px;
        }
        
        .slot-text {
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
        }
        
        .slot-full .slot-text {
            color: var(--danger);
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
        
        .btn-gaming {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border: none;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .btn-gaming:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
            color: white;
        }
        
        /* Chat Floating Button */
        .chat-float-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
        }
        
        .chat-float-btn button {
            padding: 12px 20px;
            border-radius: 50px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
            transition: all 0.3s ease;
        }
        
        .chat-float-btn button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(108, 92, 231, 0.6);
        }
        
        #unread-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        /* Chat Message Styles */
        .message {
            margin-bottom: 15px;
            animation: fadeIn 0.3s ease;
        }
        
        .message-content {
            background: rgba(40, 40, 60, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 10px 15px;
            color: white;
            margin-top: 5px;
            word-wrap: break-word;
        }
        
        .message-admin .message-content {
            border-left: 4px solid var(--accent);
            background: rgba(253, 121, 168, 0.1);
        }
        
        .message-user .message-content {
            border-left: 4px solid var(--primary);
            background: rgba(108, 92, 231, 0.1);
        }
        
        .message-time {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .message-sender {
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .message-sender.admin {
            color: var(--accent);
        }
        
        .message-sender.user {
            color: var(--secondary);
        }
        
        /* Custom Scrollbar */
        #chat-container::-webkit-scrollbar {
            width: 8px;
        }
        
        #chat-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }
        
        #chat-container::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }
        
        #chat-container::-webkit-scrollbar-thumb:hover {
            background: var(--accent);
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .hero-logo {
                width: 150px;
                height: 150px;
            }
            
            .hero-logo img {
                width: 80px;
                height: 80px;
            }
            
            .event-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
                color: white !important;
                background: rgba(108, 92, 231, 0.2);
                transform: translateY(-2px);
            }

            .chat-float-btn {
                bottom: 20px;
                right: 20px;
            }
            
            .chat-float-btn button {
                padding: 10px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-light navbar-static">
        <div class="navbar-brand" style="display: flex; align-items: center;">
            <a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none;">
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
    <!-- /main navbar -->

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-background"></div>
        <div class="particles" id="particles"></div>
        <div class="hero-content">
            <div class="hero-logo">
                <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
            </div>
            <h1 class="hero-title">Event Game Turnamen</h1>
            <p class="hero-subtitle">Bergabunglah dengan event yang tersedia</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Game Events Section -->
        <div class="card fade-in scroll-animate">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-gamepad me-2"></i> Event Game Turnamen</h2>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchEvent" class="form-control search-input" placeholder="Cari Event Turnamen ...">
                </div>
                
                <div class="event-grid">
                    @foreach ($game_events as $game_event)
                    @if ($game_event)
                    <div class="event-card scroll-animate {{ $game_event->slot_filled >= $game_event->slot_limit ? 'disabled' : '' }}" 
                         @if ($game_event->slot_filled < $game_event->slot_limit)
                         onclick="window.location.href='{{ route('game-event.show', $game_event->id) }}'"
                         style="cursor: pointer;"
                         @else
                         onclick="showFullSlotAlert()"
                         style="cursor: not-allowed;"
                         @endif>
                        <img src="{{ asset($game_event->thumbnail ?? 'default-thumbnail.png') }}" 
                             alt="{{ $game_event->name }}" class="event-image">
                        <div class="event-content">
                            <div class="event-tags">
                                <span class="event-tag">Event</span>
                                <span class="event-tag lounge">Lounge</span>
                            </div>
                            <h3 class="event-title">{{ $game_event->name ?? 'Nama Tidak Tersedia' }}</h3>
                            <div class="event-info">
                                <div class="event-info-item">
                                    <i class="fas fa-user"></i>
                                    <span>Penyelenggara: {{ $game_event->organizer ?? 'Tidak diketahui' }}</span>
                                </div>
                                <div class="event-info-item">
                                    <i class="fas fa-align-left"></i>
                                    <span>{{ Str::limit($game_event->description ?? 'Tidak ada deskripsi', 60) }}</span>
                                </div>
                            </div>
                            <div class="slot-info {{ $game_event->slot_filled >= $game_event->slot_limit ? 'slot-full' : '' }}">
                                <span class="slot-text">{{ $game_event->slot_filled ?? 0 }}/{{ $game_event->slot_limit ?? 0 }}</span>
                                <div class="slot-progress">
                                    <div class="slot-progress-bar" style="width: {{ $game_event->slot_limit > 0 ? ($game_event->slot_filled / $game_event->slot_limit) * 100 : 0 }}%"></div>
                                </div>
                                <span class="slot-text">Slot</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->

    <!-- Chat Floating Button -->
    @if(auth()->check())
    <div class="chat-float-btn">
        <button class="btn btn-gaming" onclick="toggleChat()">
            <i class="fas fa-comments"></i> Chat Global
            <span id="unread-badge" class="badge badge-danger" style="display: none;">0</span>
        </button>
    </div>
    @endif

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

    <!-- Modal History -->
    <div class="modal fade" id="coinHistoryModal" tabindex="-1" role="dialog" aria-labelledby="coinHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" style="background: rgba(30, 30, 47, 0.95); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px;">
                <div class="modal-header" style="background: linear-gradient(90deg, var(--primary), var(--accent)); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                    <h5 class="modal-title text-white" id="coinHistoryModalLabel">
                        <i class="fas fa-history mr-2"></i>History Event
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <!-- Loading Spinner -->
                    <div id="coinHistoryLoading" class="text-center py-5">
                        <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <p class="text-muted mb-1">Memuat data history...</p>
                        <small class="text-muted">Harap tunggu sebentar</small>
                    </div>

                    <!-- Content -->
                    <div id="coinHistoryContent" style="display: none;">
                        <!-- Statistik -->
                        <div class="p-4" style="background: linear-gradient(90deg, rgba(108, 92, 231, 0.2), rgba(253, 121, 168, 0.2));">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="h2 font-weight-bold mb-1 text-white" id="totalEvents">0</div>
                                    <small class="opacity-8 text-white">
                                        <i class="fas fa-calendar-alt mr-1"></i>Total Event
                                    </small>
                                </div>
                                <div class="col-6">
                                    <div class="h2 font-weight-bold mb-1 text-white" id="totalParticipations">0</div>
                                    <small class="opacity-8 text-white">
                                        <i class="fas fa-repeat mr-1"></i>Total Partisipasi
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Event -->
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="font-weight-semibold mb-0 text-white">
                                    <i class="fas fa-history mr-2"></i>Riwayat Event yang Diikuti
                                </h6>
                                <span class="badge badge-primary" id="eventCountBadge">0 event</span>
                            </div>
                            <div id="eventHistoryList" class="space-y-3" style="max-height: 400px; overflow-y: auto;">
                                <!-- Data akan diisi via AJAX -->
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="coinHistoryError" class="text-center py-5" style="display: none;">
                        <!-- Error content akan diisi via JavaScript -->
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i>Tutup
                    </button>
                    <button type="button" class="btn btn-outline-primary" onclick="loadCoinHistory()">
                        <i class="fas fa-redo mr-1"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="background: rgba(30, 30, 47, 0.95); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px;">
                <div class="modal-header" style="background: linear-gradient(90deg, var(--primary), var(--accent)); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                    <h5 class="modal-title text-white" id="chatModalLabel">
                        <i class="fas fa-comments mr-2"></i>💬 Chat Global Loop Tourney
                        <small class="d-block text-light mt-1" style="font-size: 0.8rem;">Real-time Chat dengan Role Admin & User</small>
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div id="chat-container" style="height: 500px; overflow-y: auto; padding: 15px; background: rgba(21, 21, 33, 0.8);">
                        <div id="messages">
                            <!-- Messages will be loaded here -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
                    <form id="message-form" class="w-100">
                        @csrf
                        <div class="input-group">
                            <input type="text" 
                                id="message-input" 
                                class="form-control" 
                                placeholder="Ketik pesan Anda..." 
                                autocomplete="off"
                                style="background: rgba(40, 40, 60, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); color: white; border-radius: 50px 0 0 50px;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-gaming" style="border-radius: 0 50px 50px 0;">
                                    <i class="fas fa-paper-plane"></i> Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS files -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/progressbar.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/media/fancybox.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ============================================
    // MAIN FUNCTIONS
    // ============================================

    // Create floating particles
    function createParticles() {
        const particlesContainer = document.getElementById('particles');
        const particleCount = 15;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            const size = Math.random() * 6 + 2;
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

    // Search functionality
    function initSearch() {
        const searchEvent = document.getElementById('searchEvent');
        const eventCards = document.querySelectorAll('.event-card');

        if (searchEvent && eventCards.length > 0) {
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
        }
    }

    function showFullSlotAlert() {
        Swal.fire({
            title: 'Slot Sudah Penuh!',
            text: 'Mohon maaf, silahkan mengikuti event lainnya.',
            icon: 'warning',
            confirmButtonText: 'OK',
            confirmButtonColor: '#007bff',
            background: '#1e1e2f',
            color: '#ffffff',
            iconColor: '#3498db',
        });
    }

    // DataTable initialization
    function initDataTable() {
        if ($('#pendaftaran-table').length) {
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
                    {  
                        text: 'Download PDF',
                        className: 'btn btn-danger',
                        action: function (e, dt, node, config) {
                            window.location.href = "{{ route('export.pdf') }}";
                        }
                    }
                ],
                initComplete: function() {
                    $('.dataTables_filter input').css({
                        'background-color': '#3e414d',
                        'color': '#ffffff',
                        'border': '1px solid #555'
                    });

                    $('.dataTables_length select').css({
                        'background-color': '#3e414d',
                        'color': '#ffffff',
                        'border': '1px solid #555'
                    });

                    $('.dt-buttons').css({
                        'margin-left': '10px'
                    });

                    $('#pendaftaran-table tbody tr').css({
                        'background-color': '#3e414d',
                        'color': '#ffffff'
                    });

                    $('#pendaftaran-table thead').css({
                        'background-color': '#4a4e69',
                        'color': '#ffffff'
                    });
                },
                drawCallback: function () {
                    $('#pendaftaran-table tbody tr').css({
                        'background-color': '#3e414d',
                        'color': '#ffffff'
                    });
                }
            });
        }
    }

    // History functionality
    function loadCoinHistory() {
        const loadingEl = document.getElementById('coinHistoryLoading');
        const contentEl = document.getElementById('coinHistoryContent');
        const errorEl = document.getElementById('coinHistoryError');

        loadingEl.style.display = 'block';
        contentEl.style.display = 'none';
        errorEl.style.display = 'none';

        $.ajax({
            url: '{{ route("coins.history.data") }}',
            method: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    document.getElementById('totalEvents').textContent = response.totalEvents;
                    document.getElementById('totalParticipations').textContent = response.totalParticipations;
                    document.getElementById('eventCountBadge').textContent = `${response.totalEvents} event`;

                    const eventHistoryList = document.getElementById('eventHistoryList');
                    eventHistoryList.innerHTML = '';

                    if (response.pendaftaranHistory && response.pendaftaranHistory.length > 0) {
                        response.pendaftaranHistory.forEach(event => {
                            const eventItem = document.createElement('div');
                            eventItem.className = 'event-history-item p-3 rounded mb-2';
                            eventItem.style.background = 'rgba(255, 255, 255, 0.05)';
                            eventItem.style.border = '1px solid rgba(255, 255, 255, 0.1)';

                            eventItem.innerHTML = `
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 text-white">${event.game_event?.name || 'Event Tidak Diketahui'}</h6>
                                        <small class="text-muted">
                                            <i class="far fa-calendar-alt mr-1"></i>${event.tanggal_daftar || 'Tanggal tidak tersedia'}
                                        </small>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <small class="text-white">
                                        <i class="fas fa-envelope mr-1"></i>${event.email}
                                    </small>
                                </div>
                            `;

                            eventHistoryList.appendChild(eventItem);
                        });
                    } else {
                        eventHistoryList.innerHTML = `
                            <div class="text-center py-4">
                                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                <h6 class="text-white">Belum Ada Riwayat Event</h6>
                                <p class="text-muted mb-0">Anda belum mendaftar event apapun.</p>
                            </div>
                        `;
                    }

                    loadingEl.style.display = 'none';
                    contentEl.style.display = 'block';

                } else {
                    throw new Error(response.message || 'Gagal memuat data');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading coin history:', error);
                
                loadingEl.style.display = 'none';
                errorEl.style.display = 'block';
                errorEl.innerHTML = `
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                    <h5 class="text-white">Terjadi Kesalahan</h5>
                    <p class="text-muted">Gagal memuat data history. Silakan coba lagi.</p>
                    <button class="btn btn-primary mt-2" onclick="loadCoinHistory()">
                        <i class="fas fa-redo mr-1"></i>Coba Lagi
                    </button>
                `;
            }
        });
    }

// ============================================
// CHAT SYSTEM - FIXED VERSION
// ============================================

let chatInitialized = false;
let unreadCount = 0;
let pusherInstance = null;
let lastMessageId = 0;

// Initialize Chat System
function initializeChat() {
    @if(!auth()->check())
        console.log('User not authenticated, skipping chat initialization');
        return;
    @endif

    const PUSHER_APP_KEY = '{{ env("PUSHER_APP_KEY") }}';
    const PUSHER_APP_CLUSTER = '{{ env("PUSHER_APP_CLUSTER") }}';
    
    console.log('Initializing chat with Pusher:', {
        key: PUSHER_APP_KEY ? 'SET' : 'NOT SET',
        cluster: PUSHER_APP_CLUSTER
    });

    if (!PUSHER_APP_KEY || PUSHER_APP_KEY === '' || PUSHER_APP_KEY === 'your_app_key') {
        console.warn('Pusher credentials not configured properly, using polling');
        startPollingForMessages();
        return;
    }

    // Load Pusher JS if not already loaded
    if (typeof Pusher === 'undefined') {
        console.log('Loading Pusher JS library...');
        const script = document.createElement('script');
        script.src = 'https://js.pusher.com/7.0/pusher.min.js';
        script.onload = function() {
            console.log('Pusher JS loaded successfully');
            initPusher(PUSHER_APP_KEY, PUSHER_APP_CLUSTER);
        };
        script.onerror = function() {
            console.error('Failed to load Pusher JS');
            startPollingForMessages();
        };
        document.head.appendChild(script);
    } else {
        initPusher(PUSHER_APP_KEY, PUSHER_APP_CLUSTER);
    }
}

// Initialize Pusher Connection
function initPusher(appKey, appCluster) {
    try {
        console.log('Initializing Pusher with key:', appKey.substring(0, 10) + '...');
        
        // IMPORTANT: Use these exact options
        pusherInstance = new Pusher(appKey, {
            cluster: appCluster,
            forceTLS: true,
            wsHost: 'ws-ap1.pusher.com',
            wsPort: 443,
            wssPort: 443,
            enabledTransports: ['ws', 'wss']
        });

        // Debug connection events
        pusherInstance.connection.bind('connected', function() {
            console.log('✅ Pusher connected successfully');
            loadMessages(); // Load existing messages after connection
        });

        pusherInstance.connection.bind('error', function(err) {
            console.error('❌ Pusher connection error:', err);
            startPollingForMessages(); // Fallback to polling
        });

        pusherInstance.connection.bind('disconnected', function() {
            console.log('⚠️ Pusher disconnected');
        });

        // Subscribe to channel
        const channel = pusherInstance.subscribe('chat.global');
        
        channel.bind('subscription_succeeded', function() {
            console.log('✅ Subscribed to chat.global channel');
        });

        channel.bind('subscription_error', function(err) {
            console.error('❌ Subscription error:', err);
        });

        // Listen for messages
        channel.bind('message.sent', function(data) {
            console.log('📨 Pusher event received:', data);
            processIncomingMessage(data);
        });

        // Log all events for debugging (optional)
        channel.bind('pusher:subscription_succeeded', function(members) {
            console.log('Channel members:', members);
        });

        chatInitialized = true;
        
    } catch (error) {
        console.error('❌ Pusher initialization failed:', error);
        startPollingForMessages();
    }
}

// Process incoming message
function processIncomingMessage(data) {
    if (!data || !data.id) {
        console.warn('Invalid message data:', data);
        return;
    }
    
    // Skip if message already exists
    if (messageExists(data.id)) {
        return;
    }
    
    // Update last message ID
    if (data.id > lastMessageId) {
        lastMessageId = data.id;
    }
    
    addMessageToChat(data);
    
    if (!isChatVisible()) {
        incrementUnread();
        showDesktopNotification(data);
    }
    
    scrollChatToBottom();
}

// Check if message exists in DOM
function messageExists(messageId) {
    return $(`#messages .message[data-id="${messageId}"]`).length > 0;
}

// Fallback polling system
let pollingInterval = null;
function startPollingForMessages() {
    console.log('Starting polling system...');
    loadMessages();
    
    if (pollingInterval) {
        clearInterval(pollingInterval);
    }
    
    pollingInterval = setInterval(function() {
        loadNewMessages();
    }, 2000); // Poll every 2 seconds
}

function stopPolling() {
    if (pollingInterval) {
        clearInterval(pollingInterval);
        pollingInterval = null;
    }
}

// Load all messages
function loadMessages() {
    console.log('Loading messages...');
    
    $.ajax({
        url: '{{ route("chat.messages") }}',
        method: 'GET',
        success: function(response) {
            console.log('Messages loaded:', response?.length || 0, 'messages');
            
            const messagesContainer = $('#messages');
            
            if (response && response.length > 0) {
                // Sort by ID ascending
                response.sort((a, b) => a.id - b.id);
                
                // Clear only if empty
                if (messagesContainer.children().length === 0) {
                    messagesContainer.empty();
                    
                    response.forEach(function(message) {
                        addMessageToChat(message);
                        if (message.id > lastMessageId) {
                            lastMessageId = message.id;
                        }
                    });
                    
                    scrollChatToBottom();
                }
            } else {
                messagesContainer.html(`
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-comments fa-3x mb-3"></i>
                        <p>Belum ada pesan. Mulai percakapan!</p>
                    </div>
                `);
            }
        },
        error: function(xhr) {
            console.error('Error loading messages:', xhr);
            showChatError('Gagal memuat pesan. Silakan refresh halaman.');
        }
    });
}

// Load only new messages
function loadNewMessages() {
    $.ajax({
        url: '{{ route("chat.messages") }}',
        method: 'GET',
        data: { last_id: lastMessageId },
        success: function(response) {
            if (response && response.length > 0) {
                let hasNew = false;
                
                response.forEach(function(message) {
                    if (message.id > lastMessageId && !messageExists(message.id)) {
                        addMessageToChat(message);
                        lastMessageId = message.id;
                        hasNew = true;
                    }
                });
                
                if (hasNew) {
                    scrollChatToBottom();
                }
            }
        }
    });
}

// Add Message to Chat UI
function addMessageToChat(data) {
    if (!data || !data.id) return;
    
    const isAdmin = data.is_admin == 1 || data.is_admin === true;
    const isCurrentUser = data.user_id === {{ auth()->id() ?? 0 }};
    
    const messageClass = isAdmin ? 'message-admin' : 'message-user';
    const senderType = isAdmin ? 'Admin' : 'User';
    const senderClass = isAdmin ? 'admin' : 'user';
    const badgeColor = isAdmin ? 'badge-danger' : 'badge-primary';
    const badgeIcon = isAdmin ? '👑' : '👤';
    
    // Format waktu
    const time = data.created_at ? data.created_at : new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
    
    const messageHtml = `
        <div class="message ${messageClass} ${isCurrentUser ? 'current-user' : ''}" data-id="${data.id}">
            <div class="d-flex justify-content-between align-items-start mb-1">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge ${badgeColor}" style="font-size: 0.7rem;">
                        ${badgeIcon} ${senderType}
                    </span>
                    <span class="message-sender ${senderClass}">
                        ${data.sender_name || 'Unknown'}
                    </span>
                </div>
                <span class="message-time" style="font-size: 0.75rem; color: rgba(255,255,255,0.5)">
                    ${time}
                </span>
            </div>
            <div class="message-content">
                ${data.message || ''}
            </div>
        </div>
    `;
    
    $('#messages').append(messageHtml);
    
    // Add fade-in animation
    const newMessage = $(`#messages .message[data-id="${data.id}"]`);
    newMessage.hide().fadeIn(300);
}

// Send Message
$('#message-form').on('submit', function(e) {
    e.preventDefault();
    
    const messageInput = $('#message-input');
    const message = messageInput.val().trim();
    
    if (!message) {
        messageInput.focus();
        return;
    }
    
    const sendBtn = $(this).find('button[type="submit"]');
    const originalHtml = sendBtn.html();
    
    // Disable while sending
    messageInput.prop('disabled', true);
    sendBtn.html('<i class="fas fa-spinner fa-spin"></i> Mengirim...').prop('disabled', true);
    
    $.ajax({
        url: '{{ route("chat.send") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            message: message
        },
        success: function(response) {
            console.log('✅ Message sent successfully:', response);
            messageInput.val(''); // Clear input
            
            // Message will appear via Pusher event automatically
            // No need to manually add it here
            
        },
        error: function(xhr) {
            console.error('❌ Failed to send message:', xhr);
            
            let errorMsg = 'Terjadi kesalahan saat mengirim pesan.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            }
            
            Swal.fire({
                title: 'Gagal Mengirim',
                text: errorMsg,
                icon: 'error',
                confirmButtonText: 'OK',
                background: '#1e1e2f',
                color: '#ffffff',
                confirmButtonColor: '#fd79a8'
            });
        },
        complete: function() {
            // Re-enable
            messageInput.prop('disabled', false).focus();
            sendBtn.html(originalHtml).prop('disabled', false);
        }
    });
});

// Chat Visibility Functions
function toggleChat() {
    $('#chatModal').modal('show');
    resetUnread();
    
    // Focus and scroll after modal animation
    setTimeout(() => {
        $('#message-input').focus();
        scrollChatToBottom();
    }, 300);
}

function isChatVisible() {
    return $('#chatModal').hasClass('show') && $('#chatModal').css('display') === 'block';
}

// Unread Messages Counter
function incrementUnread() {
    unreadCount++;
    updateUnreadBadge();
}

function resetUnread() {
    unreadCount = 0;
    updateUnreadBadge();
}

function updateUnreadBadge() {
    const badge = $('#unread-badge');
    if (unreadCount > 0) {
        badge.text(unreadCount > 99 ? '99+' : unreadCount).show();
    } else {
        badge.hide();
    }
}

// Scroll to Bottom
function scrollChatToBottom() {
    const container = document.getElementById('chat-container');
    if (container) {
        container.scrollTop = container.scrollHeight;
    }
}

// Desktop Notification
function showDesktopNotification(data) {
    if (!("Notification" in window)) return;
    
    if (Notification.permission === "granted") {
        const notification = new Notification(`${data.sender_name || 'Someone'}`, {
            body: data.message || 'New message',
            icon: '{{ asset("global_assets/images/logo.png") }}',
            badge: '{{ asset("global_assets/images/logo.png") }}'
        });
        
        notification.onclick = function() {
            window.focus();
            toggleChat();
            this.close();
        };
    } else if (Notification.permission === "default") {
        Notification.requestPermission();
    }
}

// Show error in chat
function showChatError(message) {
    const messagesContainer = $('#messages');
    messagesContainer.html(`
        <div class="text-center text-muted py-5">
            <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
            <p>${message}</p>
            <button class="btn btn-sm btn-primary mt-2" onclick="loadMessages()">
                <i class="fas fa-redo mr-1"></i>Coba Lagi
            </button>
        </div>
    `);
}

// ============================================
// PAGE INITIALIZATION
// ============================================

$(document).ready(function() {
    // Initialize animations
    createParticles();
    handleScrollAnimation();
    window.addEventListener('scroll', handleScrollAnimation);

    // Initialize search
    initSearch();

    // Initialize DataTable
    initDataTable();

    // Load coin history when modal is shown
    $('#coinHistoryModal').on('show.bs.modal', function() {
        loadCoinHistory();
    });

    // Initialize chat system for logged in users
    @if(auth()->check())
        initializeChat();
    @endif

    // Chat modal events
    $('#chatModal').on('shown.bs.modal', function() {
        scrollChatToBottom();
        $('#message-input').focus();
        
        // Load messages if not already loaded
        if ($('#messages').children().length === 0) {
            loadMessages();
        }
    });

    $('#chatModal').on('hidden.bs.modal', function() {
        resetUnread();
    });

    // Request notification permission
    if ("Notification" in window && Notification.permission === "default") {
        Notification.requestPermission();
    }

    // Cleanup on page unload
    $(window).on('beforeunload', function() {
        if (pusherInstance) {
            pusherInstance.disconnect();
        }
        stopPolling();
    });
});

// ============================================
// OTHER FUNCTIONS (Keep these as is)
// ============================================

// Create floating particles
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = 15;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        const size = Math.random() * 6 + 2;
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

// Search functionality
function initSearch() {
    const searchEvent = document.getElementById('searchEvent');
    const eventCards = document.querySelectorAll('.event-card');

    if (searchEvent && eventCards.length > 0) {
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
    }
}

function showFullSlotAlert() {
    Swal.fire({
        title: 'Slot Sudah Penuh!',
        text: 'Mohon maaf, silahkan mengikuti event lainnya.',
        icon: 'warning',
        confirmButtonText: 'OK',
        confirmButtonColor: '#007bff',
        background: '#1e1e2f',
        color: '#ffffff',
        iconColor: '#3498db',
    });
}
</script>
</body>
</html>