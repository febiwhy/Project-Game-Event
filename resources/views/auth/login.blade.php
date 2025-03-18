<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-login-image {
            background: url('https://via.placeholder.com/500x800') no-repeat center center;
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
                                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Remember Me & Forgot Password -->
                                        <div class="input-group mb-4 d-flex justify-content-between">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                                                <label for="formCheck" class="form-check-label text-secondary"><small>Ingat Saya</small></label>
                                            </div>
                                            <div class="forgot">
                                                <small><a href="{{('password.request') }}">Lupa Kata Sandi ?</a></small>
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
                                        <small class="text-center">Tidak Punya Akun ? <a href="{{ route('register') }}" class="text-primary">Mendaftar</a></small>
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
</body>

</html>
