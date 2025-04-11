<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Mengubah Kata Sandi</title>
</head>
<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <div class="text-center mb-4">
                {{-- <h2 class="fw-bold">Daftarkan Akun Anda!</h2> --}}
                <h2 class="fw-bold" style="color: #3498db;">Ubah Kata Sandi</h2>

            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                  <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                {{-- <div class="mb-3">
                    <label>Kata Sandi Baru</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div> --}}

               <div class="mb-3 position-relative">
                    <label>Kata Sandi Baru</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" aria-label="Toggle password visibility">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3 position-relative">
                    <label>Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" aria-label="Toggle password visibility">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Ubah Kata Sandi</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-decoration-none">Login Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       document.querySelectorAll('.toggle-password').forEach(function(button) {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        });
    </script>
</body>
</html>
