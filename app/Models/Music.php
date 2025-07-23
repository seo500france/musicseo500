<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics'; // 👈 ici tu forces le nom de la table


    protected $fillable = [
        'title',
        'artist',
        'album',
        'file_path',
        'cover_image',
    ];


}
