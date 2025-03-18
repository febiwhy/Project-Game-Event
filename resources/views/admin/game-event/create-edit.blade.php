<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($gameEvent) ? 'Edit Game Event' : 'Tambah Game Event' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
        @if (optional(auth()->user())->hasAnyRole(['admin']))
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <div class="card bg-secondary text-white shadow-lg p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($game_event) ? route('game-event.update', $game_event->id) : route('game-event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($game_event))
                @method('PUT')
            @endif


            <!-- Pilih Event -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Pilih User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ (isset($game_event) && $game_event->user_id == $user->id) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Event -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Event</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $game_event->name ?? '' }}" required>
            </div>

            <!-- Nama Penyelenggara -->
            <div class="mb-3">
                <label for="organizer" class="form-label">Nama Penyelenggara</label>
                <input type="text" class="form-control" name="organizer" id="organizer" value="{{ $game_event->organizer ?? '' }}" required>
            </div>


            <!-- Batas slot -->
            <div class="mb-3">
                <label for="slot_limit">Batas Slot</label>
                <input type="number" class="form-control" name="slot_limit" id="slot_limit" value="{{ $game_event->slot_limit ?? 0 }}" required>
            </div>

            <!-- Gambar -->
            <div class="mb-3">
                <label for="thumbnail">Gambar</label>
                <input type="file" class="form-control" name="thumbnail" id="thumbnail"  {{ isset($game_event) ? '' : 'required' }} required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description"  id="description" rows="5" >{{ $game_event->description ?? '' }}</textarea>
            </div>

            {{-- Slot Terisi --}}
            <div class="mb-4">
                <input type="hidden" name="slot_filled" id="slot_filled" value="{{ $game_event->slot_filled ?? 0 }}">
            </div>

            <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endif
</body>
</html>
