@component('mail::message')
# Status Pengajuan {{ $type }}

Halo, **{{ $user->name }}**  

Pengajuan Anda untuk **{{ $type }}** telah ditinjau oleh admin.

**Status:**  
@if($status == 'approved')
✅ **Disetujui**
@elseif($status == 'rejected')
❌ **Ditolak**
@else
⚠️ **Menunggu Konfirmasi**
@endif

**Pesan dari Admin:**  
> {{ $message }}

@component('mail::button', ['url' => url('/')])
Lihat Pengajuan
@endcomponent

Terima kasih,  
**{{ config('app.name') }}**
@endcomponent
