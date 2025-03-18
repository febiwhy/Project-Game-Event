<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameEvent extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'thumbnail',
        'description',
        'slot_limit',
        'slot_filled',
        'organizer',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id', );          // ngambil user_id dari model ini 1 data
    //     // return $this->hasOne()                                       // ngambil id dari model ini, ke model yang diambil tapi 1 data
    //     // return $this->hasMany();                                     // ngambil id dari model ini, tapi model yang diambil tapi banyak data 
    // }

    public function game_event_follower(){
        return $this->hasMany(GameEventFollower::class, 'game_event_id', 'id');
    }

    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class, 'event_pendaftaran_id', 'id');
    }
    
    public function slotFilled(){
        $this->slot_filled = $this->pendaftaran()->count();
        $this->save();
    }
    
    public function eventPendaftar(){
        return $this->hasMany(Pendaftaran::class, 'game_pendaftar_id');
    }

}
