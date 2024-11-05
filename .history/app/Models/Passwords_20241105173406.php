<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'created_by',
        'encrypted_password', // Fixed typo here
        'description',
        'type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_password', 'password_id', 'user_id')->withTimestamps();
    }

    // Relationship to get the user who created this password
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
