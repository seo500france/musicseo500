<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics'; // Nom explicite, ok si tu veux l’imposer

    protected $fillable = [
        'title',
        'artist',
        'album_id',       // ✅ On utilise album_id pour la relation
        'file_path',
        'cover_image',
    ];

    /**
     * Relation avec le modèle Album
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
