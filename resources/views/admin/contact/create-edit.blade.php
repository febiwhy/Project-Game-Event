<!DOCTYPE html>
<html>
<head>
    <title>{{ isset($contact) ? 'Edit Kontak' : 'Tambah Kontak' }}</title>
    <style>
        /* CSS Basic Style */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert {
            color: red;
            background: #ffdada;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }

        img {
            display: block;
            margin: 10px auto;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>{{ isset($contact) ? 'Edit Kontak' : 'Tambah Kontak' }}</h1>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($contact) ? route('contact.update', $contact->id) : route('contact.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @if(isset($contact))
            @method('PUT')
        @endif

        <!-- Foto -->
        <label for="foto">Foto:</label>
        <input type="file" name="foto" {{ isset($contact) ? '' : 'required' }}>
        @error('foto') <p style="color: red;">{{ $message }}</p> @enderror
        @if(isset($contact) && $contact->foto)
            <img src="{{ asset($contact->foto ?? '-') }}" alt="Foto lama" width="100">
        @endif

        <!-- Lokasi -->
        <label for="location">Lokasi:</label>
        <input type="text" name="location" value="{{ old('location', $contact->location ?? '') }}" required>
        @error('location') <p style="color: red;">{{ $message }}</p> @enderror

        <!-- Telepon -->
        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" value="{{ old('telepon', $contact->telepon ?? '') }}" required>
        @error('telepon') <p style="color: red;">{{ $message }}</p> @enderror

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" required>
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <!-- Tombol Simpan -->
        <button type="submit">{{ isset($contact) ? 'Update' : 'Simpan' }}</button>
    </form>
</div>

</body>
</html>
