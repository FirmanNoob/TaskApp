<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
use \App\Models\Chat;
use \App\Models\Task;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
        'role',
        'jabatan',
        'avatar',
    ];
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/user.png');
        }
        return asset('images/' . $this->avatar);
    }
    public function chat()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }
    public function task()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
