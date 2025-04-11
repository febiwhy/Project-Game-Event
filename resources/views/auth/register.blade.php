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
        <div class="card shadow-lg p-4" style="width: 400px;">
            <div class="text-center mb-4">
                {{-- <h2 class="fw-bold">Daftarkan Akun Anda!</h2> --}}
                <h2 class="fw-bold" style="color: #3498db;">Daftarkan Akun Anda</h2>

            </div>
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}" required>
                </div>
                {{-- <div class="mb-3 position-relative">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div> --}}
                <div class="mb-3 position-relative">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" aria-label="Toggle password visibility">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-3 position-relative">
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="password_confirmation" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" aria-label="Toggle password visibility">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div> --}}
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
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
                
                // Toggle input type and icon
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                icon.classList.toggle('fa-eye-slash', isPassword);
                icon.classList.toggle('fa-eye', !isPassword);
            });
        });
    </script>
</body>
</html>
