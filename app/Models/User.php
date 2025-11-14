<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'status',
        'payment_proof',
        'coins',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Cek apakah user sedang online berdasarkan cache.
     *
     * @return bool
     */
    
    public function addCoins($amount)
    {
        $this->coins += $amount;
        $this->save();

        // Optional: Log penambahan koin
        \Log::info("User {$this->name} mendapatkan {$amount} koin. Total: {$this->coins}");
    }

    public function deductCoins($amount)
    {
        $this->coins -= $amount;
        $this->save();
    }

    // RELASI BARU
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'pendaftar_id');
    }

    public function eventParticipations()
    {
        return $this->hasMany(UserEventParticipation::class);
    }
    public function isonline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
