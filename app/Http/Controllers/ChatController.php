<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')
            ->orderBy('created_at', 'desc')
            ->take(100)
            ->get()
            ->reverse();

        return view('chat.index', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $user = Auth::user();

        $message = Message::create([
            'user_id' => $user->id,
            'message' => $request->message,
            'is_admin' => $user->hasRole('admin') // Sesuaikan dengan role system Anda
        ]);

        broadcast(new NewMessage($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'user_id' => $message->user_id,
                'message' => $message->message,
                'is_admin' => $message->is_admin,
                'sender_name' => $user->name,
                'formatted_name' => $message->is_admin
                    ? "👑 Admin: " . $user->name
                    : "👤 User: " . $user->name,
                'created_at' => $message->created_at->format('H:i')
            ]
        ]);
    }

    public function getMessages()
    {
        $messages = Message::with('user')
            ->orderBy('created_at', 'desc')
            ->take(100)
            ->get()
            ->reverse()
            ->map(function ($message) {
                return [
                    'id' => $message->id,
                    'user_id' => $message->user_id,
                    'message' => $message->message,
                    'is_admin' => $message->is_admin,
                    'sender_name' => $message->user->name,
                    'formatted_name' => $message->is_admin
                        ? "👑 Admin: " . $message->user->name
                        : "👤 User: " . $message->user->name,
                    'created_at' => $message->created_at->format('H:i')
                ];
            });

        return response()->json($messages);
    }
}
