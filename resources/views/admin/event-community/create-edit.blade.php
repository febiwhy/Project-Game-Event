<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ @$game_event_follower ? 'Edit Community' : 'Add New Community' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <div class="card bg-secondary text-white shadow-lg p-4">
        <h2 class="mb-4 text-center">
            @if(@$game_event_follower)
                Edit Community
            @else
                Add New Community
            @endif
        </h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ @$game_event_follower->id ? route('event-community.update', @$game_event_follower->id) : route('event-community.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(@$game_event_follower->id)
                @method('PUT')
            @endif

            <!-- Pilih Event -->
            <div class="mb-3">
                <label for="game_event_id" class="form-label">Pilih Event</label>
                <select name="game_event_id" class="form-control" required>
                    @foreach($game_events as $gameEvent)
                        <option value="{{ $gameEvent->id }}" @if(@$game_event_follower && $game_event_follower->game_event_id == $gameEvent->id) selected @endif>
                            {{ $gameEvent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="owner_id" class="form-label">Pilih Pemilik</label>
                <select name="owner_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if(@$game_event_follower && $game_event_follower->owner_id == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Member -->
            <div class="mb-3">
                <label for="member" class="form-label">Pilih Anggota</label>
                <select name="member[]" class="form-control" multiple required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if(@$game_event_follower && in_array($user->id, @$game_event_follower->members ?? [])) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-light"> Tekan Tombol CTRL di Windows untuk Memilih Beberapa Anggota.</small>
            </div>

            <!-- Nama Komunitas -->
            <div class="mb-3">
                <label for="name_community" class="form-label">Nama Komunitas</label>
                <input type="text" class="form-control" name="name_community" value="{{ old('name_community', @$game_event_follower->name_community) }}" required>
            </div>

            <div class="mb-3">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            </div>

            <!-- Platform -->
            <div class="mb-3">
                <label for="platform" class="form-label">Platform</label>
                <input type="text" class="form-control" name="platform" value="{{ old('platform', @$game_event_follower->platform) }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Komunitas</label>
                <textarea class="form-control" name="description" required>{{ old('description', @$game_event_follower->description) }}</textarea>
            </div>

            <!-- Tombol Submit -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('event-community.index') }}" class="btn btn-light">Kembali</a>
                <button type="submit" class="btn btn-primary">
                    @if(@$game_event_follower)
                        Update
                    @else
                        Tambah Komunitas
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
