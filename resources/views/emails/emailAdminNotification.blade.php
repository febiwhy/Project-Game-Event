@component('mail::message')
# Pengajuan Baru

Halo Admin,

Ada pengajuan baru untuk **{{ $type }}** oleh **{{ $user->name }}**.

**Detail:**  
- **Email:** {{ $user->email }}  
- **Tanggal:** {{ now()->format('d M Y H:i') }}

Silakan tinjau pengajuan ini di dashboard admin.

@component('mail::button', ['url' => url('/admin/index')])
Cek Pengajuan
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
