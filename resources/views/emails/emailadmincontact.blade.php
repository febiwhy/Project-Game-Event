<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru dari Website</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            color: #4a90e2;
        }
        p {
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .info {
            font-weight: bold;
            color: #555;
        }
        .reply-section {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-top: 1px solid #ddd;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        a.button:hover {
            background-color: #357ABD;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>📩 Detail Pesan:</h2>
        <p><span class="info">Subjek:</span> {{ $data['subject'] }}</p>
        <p><span class="info">Nama:</span> {{ $data['fname'] }} {{ $data['lname'] }}</p>
        <p><span class="info">Email:</span> {{ $data['email'] }}</p>
        <p><span class="info">Telepon:</span> {{ $data['phone'] }}</p>
        <p><span class="info">Pesan:</span></p>
        <p>"{{ $data['message'] }}"</p>

        <div class="reply-section">
            <h3>✉️ Balas Pesan:</h3>
            <p>Klik tombol di bawah untuk membalas langsung ke email pengirim.</p>
            <a href="mailto:{{ $data['email'] }}?subject=Re: {{ urlencode($data['subject']) }}" class="button">Balas Sekarang</a>
        </div>
    </div>
</body>
</html>

