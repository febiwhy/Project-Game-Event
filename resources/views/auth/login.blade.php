<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Loop Tourney</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .login-container {
            max-width: 1200px;
            width: 100%;
        }

        .login-card {
            background: rgba(30, 30, 47, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
        }

        .login-image {
            background: linear-gradient(135deg, 
                rgba(108, 92, 231, 0.3) 0%, 
                rgba(253, 121, 168, 0.2) 50%, 
                rgba(30, 30, 47, 0.9) 100%),
                url('{{ asset("global_assets/images/ui/login-bg.png") }}') no-repeat center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(108, 92, 231, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(253, 121, 168, 0.3) 0%, transparent 50%);
        }

        .login-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 
                0 15px 30px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 0 30px rgba(108, 92, 231, 0.6);
            animation: float 6s ease-in-out infinite;
        }

        .logo img {
            width: 50px;
            height: 50px;
            filter: brightness(0) invert(1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        .brand-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 2.5rem;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        .welcome-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: white;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            background: rgba(40, 40, 60, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: white;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            background: rgba(50, 50, 70, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.3);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-group {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .toggle-password:hover {
            color: var(--primary);
            background: rgba(255, 255, 255, 0.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-input {
            background: rgba(40, 40, 60, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-right: 0.5rem;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .forgot-password {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            width: 100%;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
            color: white;
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 2rem 0;
            color: rgba(255, 255, 255, 0.5);
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .divider span {
            background: rgba(30, 30, 47, 0.8);
            padding: 0 1rem;
            position: relative;
            z-index: 1;
        }

        .register-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        .register-link a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
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
            .login-image {
                display: none;
            }
            
            .login-content {
                padding: 2rem;
            }
            
            .brand-title {
                font-size: 2rem;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            .logo img {
                width: 40px;
                height: 40px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }
            
            .login-content {
                padding: 1.5rem;
            }
            
            .brand-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="row g-0">
                <!-- Kolom Gambar -->
                <div class="col-lg-6 login-image">
                    <div class="particles" id="particles"></div>
                </div>

                <!-- Kolom Form -->
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="logo-section">
                            <div class="logo">
                                <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
                            </div>
                            <h1 class="brand-title">Loop Tourney</h1>
                            <p class="welcome-text">Silakan login untuk mengakses akun Anda</p>
                        </div>

                        <!-- Form Login -->
                        <form method="POST" action="{{ route('auth.login') }}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                    placeholder="Masukkan alamat email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="current-password" placeholder="Masukkan password">
                                    <button class="toggle-password" type="button">
                                        <i class="fa fa-eye-slash"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="form-options">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label for="remember" class="form-check-label">Ingat Saya</label>
                                </div>
                                <a href="{{ route('password.reset') }}" class="forgot-password">Lupa Kata Sandi?</a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                            </button>
                        </form>

                        <div class="divider">
                            <span>ATAU</span>
                        </div>

                        <!-- Register Link -->
                        <div class="register-link">
                            <p>Tidak punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(function(button) {
            button.addEventListener('click', function() {
                const input = this.closest('.input-group').querySelector('input');
                const icon = this.querySelector('i');
                
                // Toggle input type
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                
                // Toggle icon
                icon.classList.toggle('fa-eye-slash', !isPassword);
                icon.classList.toggle('fa-eye', isPassword);
            });
        });

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
        });

        // SweetAlert for error messages
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal Masuk',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
                background: '#1e1e2f',
                color: '#ffffff',
                confirmButtonColor: '#6c5ce7'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: `@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach`,
                confirmButtonText: 'OK',
                background: '#1e1e2f',
                color: '#ffffff',
                confirmButtonColor: '#6c5ce7'
            });
        @endif
    </script>
</body>
</html>