<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $fillable = [
    'foto',
    'location',
    'telepon',
    'email'
    ];
}
