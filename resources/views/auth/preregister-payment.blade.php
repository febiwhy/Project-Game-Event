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
                <div class="mb-3">
                    <h3>Intruksi Pembayaran</h3>
                    <p>Silahkan Tranfer ke :</p>
                </div>
                <div class="mb-3">
                    <ul>
                        <li>Dana : </li>
                        <li>Atas Nama :</li>
                        <li>Total : Rp. {{ number_format($pre->amount)}}</li>
                    </ul>
                </div>
                <p>Setelah Tranfer, Lanjut ke Halaman Pendaftaran Akun</p>
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
