<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message->load('user');
    }

    public function broadcastOn()
    {
        return new Channel('chat.global');
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->message->id,
            'user_id' => $this->message->user_id,
            'message' => $this->message->message,
            'is_admin' => $this->message->is_admin,
            'sender_name' => $this->message->user->name,
            'formatted_name' => $this->message->is_admin
                ? "👑 Admin: " . $this->message->user->name
                : "👤 User: " . $this->message->user->name,
            'badge_color' => $this->message->is_admin ? 'badge-danger' : 'badge-primary',
            'created_at' => $this->message->created_at->format('H:i')
        ];
    }
}
