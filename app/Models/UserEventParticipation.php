<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEventParticipation extends Model
{
    use HasFactory;

    protected $table = 'user_event_participation';

    protected $fillable = [
        'user_id',
        'game_event_id',
        'participation_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gameEvent()
    {
        return $this->belongsTo(GameEvent::class);
    }
}
