<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    public function create()
    {
        // Récupère tous les albums pour le menu déroulant
        $albums = DB::table('albums')->get();
        return view('music.upload', compact('albums'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title'     => 'required|string',
        'artist'    => 'required|string',
        'album_id'  => 'nullable|integer|exists:albums,id',
        'music'     => 'required|file|mimes:mp3,wav,ogg|max:20480',
    ]);

    // Chemin complet dans le dossier public
    $filename = Str::slug($request->title) . '-' . time() . '.' . $request->music->getClientOriginalExtension();
    $destinationPath = public_path('musics');

    // Créer le dossier s’il n’existe pas
    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0775, true);
    }

    // Déplacer le fichier
    $request->music->move($destinationPath, $filename);

    // Enregistrer le chemin relatif
    DB::table('musics')->insert([
        'title'     => $request->title,
        'artist'    => $request->artist,
        'file_path' => 'musics/' . $filename,
        'album_id'  => $request->album_id,
        'created_at'=> now(),
        'updated_at'=> now(),
    ]);

    return redirect()->back()->with('success', 'Musique ajoutée dans public/musics avec succès !');
}

public function index()
{
   $musics = DB::table('musics')
    ->leftJoin('albums', 'musics.album_id', '=', 'albums.id')
    ->select('musics.*', 'albums.title as album_name', 'albums.cover as album_cover')
    ->orderBy('musics.created_at', 'desc')
    ->get();

$albums = DB::table('albums')->orderBy('created_at', 'desc')->get();

return view('music.index', compact('musics', 'albums'));
}


}
