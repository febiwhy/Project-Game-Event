<?php

namespace App\Http\Controllers\Email;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AdminResponseMail;
use App\Http\Controllers\Controller;
use App\Mail\EmailAdminNotification;
use Illuminate\Support\Facades\Mail;

class AdminNotificationController extends Controller
{
    public function requestCommunityCreation(Request $request)
    {
        $user = auth()->user(); // User yang sedang login
        $adminEmail = 'febiwahyu469@gmail.com'; // Email admin tujuan

        // Kirim email ke admin
        Mail::to($adminEmail)->send(new EmailAdminNotification($user, 'Komunitas'));

        return back()->with('success', 'Pengajuan komunitas telah dikirim ke admin.');
    }

    public function requestGameCreation(Request $request)
    {
        $user = auth()->user();
        $adminEmail = 'febiwahyu469@gmail.com';

        Mail::to($adminEmail)->send(new EmailAdminNotification($user, 'Game'));

        return back()->with('success', 'Pengajuan game telah dikirim ke admin.');
    }

    public function respondToSubmission(Request $request, $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $type = $request->input('type'); // Komunitas atau Game
        $status = $request->input('status'); // Disetujui atau Ditolak
        $message = $request->input('message'); // Pesan dari admin

        // Kirim email ke user
        Mail::to($user->email)->send(new AdminResponseMail($user, $type, $status, $message));

        return redirect()->back()->with('success', 'Balasan telah dikirim ke user.');
    }
}
