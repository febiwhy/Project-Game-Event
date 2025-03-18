<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4 bg-secondary text-white rounded">
        <h2 class="text-center mb-4">Form Pendaftaran untuk {{ $game_event->name ?? 'Event' }}</h2>

        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pendaftarandata', ['id' => $game_event->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="event_pendaftaran_id" value="{{ $game_event->id ?? '' }}">
            <input type="hidden" name="pendaftar_id" value="{{ auth()->id() }}">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="id_number" class="form-label">ID Number:</label>
                <input type="text" class="form-control" name="id_number" id="id_number" value="{{ old('id_number') }}" required>
            </div>

            <div class="mb-3">
                <label for="whatsapp" class="form-label">Nomor WhatsApp:</label>
                <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}" required>
            </div>

            <div class="mb-3">
                <label for="game_pendaftar_id" class="form-label">Game Event:</label>
                <select name="game_pendaftar_id" id="game_pendaftar_id" class="form-control">
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="2" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Menunggu" {{ old('status', 'Menunggu') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>                   
	                @if (optional(auth()->user())->hasAnyRole(['admin']))
                    <option value="Diterima" {{ old('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto:</label>
                <input type="file" class="form-control" name="foto" accept=".jpg,.jpeg,.png" required>
                @error('foto')
                    <small class="text-warning">Harap unggah ulang foto jika terjadi kesalahan</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
