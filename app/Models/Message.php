<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'is_admin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk format nama berdasarkan role
    public function getSenderNameAttribute()
    {
        if ($this->is_admin) {
            return "👑 Admin: " . $this->user->name;
        }
        return "👤 User: " . $this->user->name;
    }

    public function getBadgeColorAttribute()
    {
        return $this->is_admin ? 'badge-danger' : 'badge-primary';
    }
    
}
