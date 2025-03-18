<?php

namespace App\Http\Controllers\Email;

use App\Models\GameEvent;
use Illuminate\Http\Request;
use App\Mail\TurnamentReportEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TurnamentReportMailController extends Controller
{
 
    public function report(Request $request)
    {

        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'reason' => 'required|string|max:255',
        ]);

        $adminEmail = 'febiwahyu469@gmail.com'; // Ganti dengan email admin yang valid
        $user = auth()->user(); // Mendapatkan user yang sedang login

        // Data yang dikirim ke email
        $data = [
            'user_name' => $user->name,
            'user_email' => $user->email,
            'tournament_name' => GameEvent::find($request->id)->name,
            'reason' => $request->reason,
        ];
        
        // Kirim email ke admin
        Mail::to($adminEmail)->send(new TurnamentReportEmail($data));
        
        return redirect()->back()->with('success', 'Laporan telah dikirim ke admin.');
    }
}
