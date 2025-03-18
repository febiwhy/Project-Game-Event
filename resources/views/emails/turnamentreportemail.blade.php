@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Turnamen Mencurigakan</title>
</head>
<body>
    <h2>Laporan Turnamen Mencurigakan</h2>
    <p><strong>Pelapor:</strong> {{ $data['user_name'] }} ({{ $data['user_email'] }})</p>
    <p><strong>Turnamen:</strong> {{ $data['tournament_name'] }}</p>
    <p><strong>Alasan:</strong> {{ $data['reason'] }}</p>
    <br>
    <p>Silakan tindak lanjuti laporan ini.</p>
</body>
</html>