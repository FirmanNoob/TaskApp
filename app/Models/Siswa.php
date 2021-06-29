<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['name', 'email', 'jabatan'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/download.jpg');
        }
        return asset('images/' . $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimestamps();
    }
}
