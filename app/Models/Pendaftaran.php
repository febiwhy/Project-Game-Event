<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';

    protected $fillable = [
        'event_pendaftaran_id',
        'pendaftar_id',
        'game_pendaftar_id',
        'nama',
        'email',
        'id_number',
        'whatsapp',
        'alamat',
        'status',
        'foto',
    ];

    public function gameEvent(){
        return $this->belongsTo(GameEvent::class,'event_pendaftaran_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'pendaftar_id');
    }
    
    protected static function boot()
    {
        parent::boot();
        
        static::created(function ($pendaftaran) {
            $pendaftaran->gameEvent->increment('slot_filled');
        });
        
        static::deleted(function ($pendaftaran) {
            $pendaftaran->gameEvent->decrement('slot_filled');
        });
    }

    public function pendaftarEvent(){
        return $this->belongsTo(GameEvent::class, 'game_pendaftar_id');
    }
    
}
