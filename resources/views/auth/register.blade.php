<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Loop Tourney</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    .register-container {
      max-width: 1200px;
      width: 100%;
    }

    .register-card {
      background: rgba(30, 30, 47, 0.8);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .register-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
    }

    .form-section {
      padding: 3rem;
      border-right: 1px solid rgba(255, 255, 255, 0.1);
    }

    .info-section {
      padding: 3rem;
      background: linear-gradient(135deg, rgba(40, 40, 60, 0.9), rgba(60, 60, 80, 0.7));
      position: relative;
      overflow: hidden;
    }

    .info-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        radial-gradient(circle at 20% 80%, rgba(108, 92, 231, 0.2) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(253, 121, 168, 0.1) 0%, transparent 50%);
      z-index: 1;
    }

    .info-content {
      position: relative;
      z-index: 2;
    }

    .logo-section {
      text-align: center;
      margin-bottom: 2rem;
    }

    .logo {
      width: 70px;
      height: 70px;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      box-shadow: 
        0 15px 30px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.1),
        0 0 30px rgba(108, 92, 231, 0.6);
      animation: float 6s ease-in-out infinite;
    }

    .logo img {
      width: 40px;
      height: 40px;
      filter: brightness(0) invert(1);
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-8px) rotate(5deg); }
    }

    .brand-title {
      font-family: 'Orbitron', sans-serif;
      font-weight: 900;
      font-size: 2rem;
      background: linear-gradient(90deg, var(--primary), var(--accent), var(--warning));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin-bottom: 0.5rem;
    }

    .section-title {
      font-family: 'Orbitron', sans-serif;
      font-weight: 700;
      color: white;
      margin-bottom: 1.5rem;
      font-size: 1.5rem;
    }

    .welcome-text {
      color: rgba(255, 255, 255, 0.8);
      text-align: center;
      margin-bottom: 2rem;
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
      z-index: 3;
    }

    .toggle-password:hover {
      color: var(--primary);
      background: rgba(255, 255, 255, 0.1);
    }

    .form-text {
      color: rgba(255, 255, 255, 0.7) !important;
      font-size: 0.85rem;
    }

    .btn-register {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      border: none;
      border-radius: 10px;
      color: white;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      width: 100%;
      transition: all 0.3s ease;
      margin-top: 1rem;
    }

    .btn-register:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
      color: white;
    }

    .login-link {
      text-align: center;
      margin-top: 1.5rem;
      color: rgba(255, 255, 255, 0.7);
    }

    .login-link a {
      color: var(--secondary);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .login-link a:hover {
      color: var(--primary);
      text-decoration: underline;
    }

    .payment-info {
      background: rgba(30, 30, 47, 0.6);
      border-radius: 10px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      border-left: 4px solid var(--primary);
    }

    .payment-info ul {
      padding-left: 1rem;
      margin-bottom: 0;
    }

    .payment-info li {
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 0.5rem;
    }

    .warning-box {
      background: linear-gradient(135deg, rgba(232, 67, 147, 0.2), rgba(232, 67, 147, 0.1));
      border: 1px solid rgba(232, 67, 147, 0.3);
      border-radius: 10px;
      padding: 1.5rem;
      margin-top: 1.5rem;
      border-left: 4px solid var(--danger);
    }

    .warning-box h4 {
      color: var(--danger);
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .warning-box p {
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 0;
      font-size: 0.9rem;
    }

    .info-text {
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.6;
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

    /* Alert Styles */
    .alert-custom {
      background: linear-gradient(135deg, rgba(232, 67, 147, 0.2), rgba(232, 67, 147, 0.1));
      border: 1px solid rgba(232, 67, 147, 0.3);
      border-radius: 15px;
      color: white;
      backdrop-filter: blur(10px);
      border-left: 4px solid var(--danger);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .form-section {
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem;
      }
      
      .info-section {
        padding: 2rem;
      }
      
      .brand-title {
        font-size: 1.8rem;
      }
      
      .logo {
        width: 60px;
        height: 60px;
      }
      
      .logo img {
        width: 35px;
        height: 35px;
      }
    }

    @media (max-width: 576px) {
      body {
        padding: 10px;
      }
      
      .form-section,
      .info-section {
        padding: 1.5rem;
      }
      
      .brand-title {
        font-size: 1.6rem;
      }
    }
  </style>
</head>

<body>
  <div class="register-container">
    <div class="register-card">
      <div class="row g-0">
        
        <!-- Kolom kiri: Form Register -->
        <div class="col-lg-6 form-section">
          <div class="logo-section">
            <div class="logo">
              <img src="{{ asset('global_assets/images/logo.png') }}" alt="Loop Tourney Logo">
            </div>
            <h1 class="brand-title">Loop Tourney</h1>
            <p class="welcome-text">Buat akun baru untuk bergabung dengan komunitas kami</p>
          </div>

          <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
            @csrf
            
            @if($errors->any())
              <div class="alert alert-custom mb-4">
                <h6 class="alert-heading font-weight-semibold mb-2">
                  <i class="fas fa-exclamation-triangle me-2"></i>
                  Terjadi Kesalahan
                </h6>
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="form-group">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Alamat Email</label>
              <input type="email" name="email" class="form-control" placeholder="Masukkan alamat email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Buat password" id="password" required>
                <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                  <i class="fas fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
              <div class="input-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password" id="password_confirmation" required>
                <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                  <i class="fas fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label for="payment_proof" class="form-label">Unggah Bukti Pembayaran</label>
              <input type="file" name="payment_proof" id="payment_proof" class="form-control" accept=".jpg,.jpeg,.png" required>
              <small class="form-text">Format yang diterima: JPG, JPEG, PNG. Ukuran maksimal: 2MB</small>
              @error('payment_proof')
                <small class="text-warning mt-1 d-block">
                  <i class="fas fa-exclamation-circle me-1"></i>Harap unggah ulang jika terjadi kesalahan
                </small>
              @enderror
            </div>

            <button type="submit" class="btn-register">
              <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
            </button>
          </form>

          <div class="login-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
          </div>
        </div>

        <!-- Kolom kanan: Instruksi Pembayaran -->
        <div class="col-lg-6 info-section">
          <div class="particles" id="particles"></div>
          <div class="info-content">
            <h2 class="section-title">Syarat Pendaftaran</h2>
            
            <div class="payment-info">
              <h4 class="mb-3">Instruksi Pembayaran</h4>
              <p class="info-text mb-3">Silakan transfer ke:</p>
              <ul>
                <li><strong>Dana:</strong> 12345678</li>
                <li><strong>Atas Nama:</strong> Pebik</li>
                <li><strong>Total:</strong> Rp 50.000</li>
              </ul>
              <p class="info-text mt-3 mb-0">Setelah transfer, lanjutkan ke halaman pendaftaran akun.</p>
            </div>

            <div class="info-text">
              <h4 class="mb-3">Proses Persetujuan</h4>
              <p>Setelah mendaftar, Anda dapat langsung login, namun beberapa fitur akan tetap dibatasi sampai akun Anda disetujui oleh admin.</p>
            </div>

            <div class="warning-box">
              <h4><i class="fas fa-exclamation-triangle me-2"></i>Penting!</h4>
              <p>Akun yang tidak melengkapi pembayaran dalam waktu 7 hari atau bukti pembayaran tidak sesuai akan dihapus.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Create floating particles
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = 12;
      
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
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('fa-eye-slash', isPassword);
        icon.classList.toggle('fa-eye', !isPassword);
      });
    });

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
      createParticles();
    });

    // SweetAlert notifications
    @if(session('success'))
      Swal.fire({
        icon: 'success',
        title: 'Pendaftaran Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
        background: '#1e1e2f',
        color: '#ffffff',
        confirmButtonColor: '#6c5ce7'
      });
    @endif

    @if(session('error'))
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan!',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK',
        background: '#1e1e2f',
        color: '#ffffff',
        confirmButtonColor: '#e84393'
      });
    @endif

    @if($errors->any())
      Swal.fire({
        icon: 'error',
        title: 'Gagal Mendaftar!',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonText: 'OK',
        background: '#1e1e2f',
        color: '#ffffff',
        confirmButtonColor: '#e84393'
      });
    @endif
  </script>
</body>
</html>