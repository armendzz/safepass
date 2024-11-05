<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passwords extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'created_by',
        'encryped_password',
        'description',
        'type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_password', 'password_id', 'user_id')->withTimestamps();
    }
}
