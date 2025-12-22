<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Status Akun - Loop Tourney</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

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
            height: 40vh;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 2rem;
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
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 10px 20px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 0 20px rgba(108, 92, 231, 0.5);
            animation: float 6s ease-in-out infinite;
        }

        .hero-logo img {
            width: 45px;
            height: 45px;
            filter: brightness(0) invert(1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
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

        /* Alert Styles */
        .custom-alert {
            background: linear-gradient(135deg, rgba(108, 92, 231, 0.1), rgba(253, 121, 168, 0.1));
            border: 1px solid rgba(108, 92, 231, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .custom-alert .close {
            color: rgba(255, 255, 255, 0.7);
        }

        .custom-alert .close:hover {
            color: white;
        }

        /* Status Badges */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-approved {
            background: linear-gradient(135deg, var(--success), #00d2a0);
            color: white;
        }

        .status-pending {
            background: linear-gradient(135deg, var(--warning), #ffb142);
            color: #000;
        }

        .status-rejected {
            background: linear-gradient(135deg, var(--danger), #ff6b9c);
            color: white;
        }

        /* Table Styles */
        .table-container {
            background: rgba(30, 30, 47, 0.5);
            border-radius: 12px;
            overflow: hidden;
        }

        .custom-table {
            background: transparent;
            color: white;
            margin-bottom: 0;
        }

        .custom-table thead th {
            background: rgba(40, 40, 60, 0.9);
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.8);
            padding: 1.2rem 1rem;
        }

        .custom-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .custom-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.01);
        }

        .custom-table tbody td {
            padding: 1.2rem 1rem;
            vertical-align: middle;
            color: rgba(255, 255, 255, 0.9);
        }

        /* User Avatar */
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Action Buttons */
        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--info), #1e90ff);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 144, 255, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, var(--danger), #ff4757);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 71, 87, 0.4);
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

        /* Welcome Message */
        .welcome-message {
            background: linear-gradient(135deg, rgba(108, 92, 231, 0.1), rgba(253, 121, 168, 0.1));
            border: 1px solid rgba(108, 92, 231, 0.3);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            backdrop-filter: blur(10px);
        }

        .welcome-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .contact-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .contact-link {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .contact-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .hero-logo {
                width: 70px;
                height: 70px;
            }
            
            .hero-logo img {
                width: 40px;
                height: 40px;
            }
            
            .contact-links {
                flex-direction: column;
                align-items: center;
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
                <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">
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
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link active">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
                @elseif (auth()->check() && auth()->user()->status == 'approved')
                    <li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link active">Status Akun</a></li>
                    <li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link">Leaderboard</a></li>
                    <li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
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
            <h1 class="hero-title">Status Akun</h1>
            <p class="hero-subtitle">Kelola dan pantau status akun Anda</p>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Welcome Message -->
            <div class="welcome-message scroll-animate">
                <h3 class="welcome-title">
                    <i class="fas fa-user-circle me-2"></i>
                    @if (auth()->check())
                        Selamat Datang, {{ auth()->user()->name }}
                    @else
                        Selamat Datang Rasakan Kelebihannya Guest
                    @endif
                </h3>
                
                @if (!auth()->check())
                    <div class="text-center">
                        <h4 class="text-white mb-3">Silahkan Login Terlebih Dahulu</h4>
                        <a href="{{ route('login') }}" class="contact-link">
                            <i class="fas fa-sign-in-alt"></i>Login Sekarang
                        </a>
                    </div>
                @elseif (auth()->check() && auth()->user()->status == 'pending')
                    <div class="alert alert-info custom-alert border-0 mb-0">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle fa-2x me-3 text-primary"></i>
                            <div>
                                <h6 class="mb-2 text-white">Menunggu Persetujuan Admin</h6>
                                <p class="mb-2 text-white-50">
                                    Jika sudah mengirim bukti pembayaran dan sesuai dengan syarat pembayaran 
                                    namun belum disetujui, silakan hubungi kami.
                                </p>
                                <div class="contact-links">
                                    <a href="{{ route('contact.index') }}" class="contact-link">
                                        <i class="fas fa-envelope"></i>Hubungi Kami
                                    </a>
                                    <a href="https://wa.me/6281234567890" target="_blank" class="contact-link">
                                        <i class="fab fa-whatsapp"></i>WhatsApp Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @if (auth()->check() && auth()->user()->status == 'approved')
                <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle fa-2x me-3 text-primary"></i> 
                        <div>
                            <h6 class="mb-2 text-white">Akun Sudah Disetujui Rasakan Kelebihannya</h6>
                        </div>
                </div>
                @endif
            </div>

            <!-- Status Table Card -->
            <div class="card scroll-animate">
                <div class="card-header">
                    <h2 class="card-title"><i class="fas fa-users me-2"></i>Data Daftar Akun</h2>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table custom-table" id="status-table">
                                <thead>
                                    <tr>
                                        <th width="80">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Aktivitas</th>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
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
            
            // Initialize DataTable
            $('#status-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('status-user.index') }}",
                columns: [
                    { 
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                    { 
                        data: 'name', 
                        name: 'name',
                        render: function(data, type, row) {
                            return `
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" 
                                         class="user-avatar me-3" alt="${data}">
                                    <span>${data}</span>
                                </div>
                            `;
                        }
                    },
                    { data: 'email', name: 'email' },
                    { 
                        data: 'status', 
                        name: 'status',
                        render: function(data) {
                            const statusClass = data === 'approved' ? 'status-approved' : 
                                              data === 'pending' ? 'status-pending' : 'status-rejected';
                            const icon = data === 'approved' ? 'fa-check-circle' :
                                        data === 'pending' ? 'fa-clock' : 'fa-times-circle';
                            return `
                                <span class="status-badge ${statusClass}">
                                    <i class="fas ${icon}"></i>${data}
                                </span>
                            `;
                        }
                    },
                    { 
                        data: 'role', 
                        name: 'role',
                        render: function(data) {
                            return `<span class="text-capitalize">${data}</span>`;
                        }
                    },
                    { 
                        data: 'activity', 
                        name: 'activity',
                        className: 'text-center'
                    },
                ],
                language: {
                    paginate: { 
                        previous: '<i class="fas fa-chevron-left"></i>', 
                        next: '<i class="fas fa-chevron-right"></i>' 
                    },
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ entri',
                    info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entri',
                    infoEmpty: 'Menampilkan 0 hingga 0 dari 0 entri',
                    infoFiltered: '(disaring dari _MAX_ total entri)'
                },
                initComplete: function() {
                    // Style search input
                    $('.dataTables_filter input').addClass('form-control').css({
                        'background': 'rgba(255, 255, 255, 0.1)',
                        'border': '1px solid rgba(255, 255, 255, 0.2)',
                        'color': 'white',
                        'border-radius': '8px',
                        'padding': '0.5rem 1rem'
                    });

                    // Style length select
                    $('.dataTables_length select').addClass('form-select').css({
                        'background': 'rgba(255, 255, 255, 0.1)',
                        'border': '1px solid rgba(255, 255, 255, 0.2)',
                        'color': 'white',
                        'border-radius': '8px'
                    });
                }
            });
        });

        // Delete confirmation function
        function confirmDeleteAccount(id) {
            Swal.fire({
                title: "<span style='color: var(--danger);'>Yakin ingin menghapus?</span>",
                html: "<span style='color: rgba(255, 255, 255, 0.8);'>Data yang dihapus tidak bisa dikembalikan!</span>",
                icon: "warning",
                background: "var(--dark)",
                color: "white",
                showCancelButton: true,
                confirmButtonColor: "var(--danger)",
                cancelButtonColor: "var(--secondary)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                customClass: {
                    popup: 'custom-swal-popup'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/account/" + id,
                        type: "DELETE",
                        data: { _token: "{{ csrf_token() }}" },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "<span style='color: var(--success); font-weight: bold;'>Berhasil!</span>",
                                    html: "<span style='color: rgba(255, 255, 255, 0.8);'>Data telah berhasil dihapus.</span>",
                                    icon: "success",
                                    background: "var(--dark)",
                                    color: "white",
                                    confirmButtonColor: "var(--success)",
                                    confirmButtonText: "OKE"
                                });
                                $('#status-table').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: "<span style='color: var(--danger);'>Gagal!</span>",
                                    html: "<span style='color: rgba(255, 255, 255, 0.8);'>Terjadi kesalahan, data gagal dihapus.</span>",
                                    icon: "error",
                                    background: "var(--dark)",
                                    color: "white",
                                    confirmButtonColor: "var(--danger)",
                                    confirmButtonText: "OKE"
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>