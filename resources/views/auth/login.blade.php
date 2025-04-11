<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bg-login-image {
            background: url('global_assets/images/ui/login-bg.png') no-repeat center center;
            background-size: cover;
            border-radius: 0.25rem;
        }

        .card {
            border-radius: 10px;
        }

        .btn-user {
            font-size: 1.1rem;
            padding: 12px;
        }

        .header-text h2 {
            font-weight: 700;
            color: #007bff;
        }

        .header-text p {
            color: #6c757d;
        }

        .form-control-user {
            border-radius: 0.5rem;
        }

        .forgot a {
            text-decoration: none;
            color: #007bff;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .text-primary {
            color: #007bff !important;
        }

        .text-muted {
            color: #6c757d;
        }

        .form-check-input {
            margin-top: 3px;
        }

        .form-check-label {
            font-size: 0.875rem;
        }

        .form-check {
            font-size: 0.9rem;
        }

        /* icons mata password */
         .password-wrapper {
        position: relative;
        }

        .toggle-eye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 24px;
            height: 24px;
        }

        .toggle-eye svg {
            display: none;
            width: 100%;
            height: 100%;
        }

        .toggle-eye .eye-open {
            display: block;
        }

        .password-wrapper input[type="text"] + .toggle-eye .eye-closed {
            display: block;
        }

        .password-wrapper input[type="text"] + .toggle-eye .eye-open {
            display: none;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- Kolom Gambar -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <!-- Kolom Form -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="header-text mb-4 text-center">
                                        <h2 class="text-primary">Selamat Datang</h2>
                                        <p class="text-muted">Silahkan Login Terlebih Dahulu.</p>
                                    </div>

                                    <!-- Form Login -->
                                    <form method="POST" action="{{ route('auth.login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                                                    name="password" required autocomplete="current-password" placeholder="Password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        {{-- <div class="form-group">
                                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}

                                        <!-- Remember Me & Forgot Password -->
                                        <div class="input-group mb-4 d-flex justify-content-between">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                                                <label for="formCheck" class="form-check-label text-secondary"><small>Ingat Saya</small></label>
                                            </div>
                                            <div class="forgot">
                                                <small><a href="{{route('password.reset') }}">Lupa Kata Sandi ?</a></small>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <button class="btn btn-primary btn-user btn-block w-100">
                                            Masuk
                                        </button>
                                    </form>

                                    <hr>

                                    <!-- Register Link -->
                                    <div class="row">
                                        <small class="text-center">Tidak Punya Akun ? <a href="{{ route('register') }}" class="text-primary">Daftar</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
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
    </script>

</body>

</html>
