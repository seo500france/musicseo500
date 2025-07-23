<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover', 'user_id'];

    public function musics()
    {
        return $this->hasMany(Music::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
