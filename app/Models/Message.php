<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'receiver_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'message_id');
    }
}

