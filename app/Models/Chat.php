<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $fillable = ['chat', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
