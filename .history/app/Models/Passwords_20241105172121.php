<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passwords extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'encryped_password',
        'description',
        'type',
    ];
}
