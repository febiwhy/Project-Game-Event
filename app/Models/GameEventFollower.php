<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameEventFollower extends Model
{
    use HasFactory;
    // protected $table = 'game_event_followers';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // protected $keyType = 'int';
    protected $fillable = [
        'game_event_id',
        'user_id',
        'owner_id',
        'name_community',
        'platform',
        'member',
        'description',
        'is_following'
    ];

    protected $casts = [
        'member' => 'array', // Supaya Laravel tahu bahwa "member" adalah array
    ];
    
    public function gameEvent()
    {
        return $this->belongsTo(GameEvent::class, 'game_event_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'game_event_id', 'game_event_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    
}
