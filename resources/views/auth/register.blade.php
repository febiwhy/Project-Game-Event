<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Register</title>
</head>
<body class="bg-light">
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="max-width: 900px; width: 100%;">
      <div class="row">
        
        <!-- Kolom kiri: Form Register -->
        <div class="col-md-6 border-end">
          <div class="text-center mb-4">
            <h2 class="fw-bold" style="color: #3498db;">Daftarkan Akun Anda</h2>
          </div>

          <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3 position-relative">
              <label for="password">Password</label>
              <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                <button type="button" class="btn btn-outline-secondary toggle-password" aria-label="Toggle password visibility">
                  <i class="fa fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="mb-3 position-relative">
              <label for="password_confirmation">Confirm Password</label>
              <div class="input-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="password_confirmation" required>
                <button type="button" class="btn btn-outline-secondary toggle-password" aria-label="Toggle password visibility">
                  <i class="fa fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="mb-3">
              <label for="payment_proof">Unggah Bukti Pembayaran</label>
              <input type="file" name="payment_proof" id="payment_proof" class="form-control" accept=".jpg,.jpeg,.png" required>
              <span class="form-text text-muted">Format yang diterima: jpg. Max file size 2Mb</span>
              @error('payment_proof')
                <small class="text-warning">Harap unggah ulang jika terjadi kesalahan</small>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Daftar</button>
          </form>

          <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Login Kembali</a>
          </div>
        </div>

        <!-- Kolom kanan: Instruksi Pembayaran -->
        <div class="col-md-6">
          <h2>Syarat Untuk Membuat Akun</h2>
          <h3>Instruksi Pembayaran</h3>
          <p>Silahkan transfer ke:</p>
          <ul>
            <li>Dana        : 12345678</li>
            <li>Atas Nama   : Pebik</li>
            <li>Total       : Rp.50.000</li>
          </ul>
          <p class="mt-3">Setelah transfer, lanjut ke halaman pendaftaran akun.</p>
          <p>
            <h3>Setelah Daftar Menunggu Persetujuan Dari Admin</h3>
            <br>
            <h4 style="color:red">Setelah Pembayaran Hari + Seminggu atau Bukti Pembayaran Tidak Sesuai Maka Akan di Delete</h4>
          </p>
          
        </div>

      </div>
    </div>
  </div>
 <!-- CDN scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Pesan sukses --}}
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Pendaftaran Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
    </script>
    @endif

    {{-- Pesan error dari try-catch --}}
    @if(session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan!',
        text: '{{ session('error') }}',
        confirmButtonColor: '#d33',
    });
    </script>
    @endif

    {{-- Pesan validasi error --}}
    @if($errors->any())
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal Mendaftar!',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonColor: '#d33'
    });
    </script>
    @endif

    <script>
    document.querySelectorAll('.toggle-password').forEach(function(button) {
      button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        const icon = this.querySelector('i');
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('fa-eye-slash', isPassword);
        icon.classList.toggle('fa-eye', !isPassword);
      });
    });
    </script>

  </body>
</html>
