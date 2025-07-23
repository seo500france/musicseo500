<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MusicController extends Controller
{
    public function create()
    {
        $albums = DB::table('albums')->get();
        return view('music.upload', compact('albums'));
    }

    public function store(Request $request)
    {
        // 🔎 Étape 1 : log infos du fichier reçu
        if (!$request->hasFile('music')) {
            return back()->with('error', 'Aucun fichier reçu');
        }

        $file = $request->file('music');
        logger()->info('Fichier reçu', [
            'originalName' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
        ]);

        // 🔒 Validation
        $request->validate([
    'title'     => 'required|string',
    'artist'    => 'required|string',
    'album_id'  => 'nullable|integer|exists:albums,id',
    'music'     => 'required|file|mimes:mp3,wav,ogg|max:51200', // ← clé ici
]);


        // 📁 Destination
        $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('musics');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true);
        }

        // 🔄 Tentative d’upload
        try {
            $file->move($destinationPath, $filename);
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l’enregistrement du fichier : ' . $e->getMessage());
        }

        // 🧠 Enregistrement en DB
        DB::table('musics')->insert([
            'title'     => $request->title,
            'artist'    => $request->artist,
            'file_path' => 'musics/' . $filename,
            'album_id'  => $request->album_id,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        return redirect()->back()->with('success', 'Musique ajoutée avec succès dans public/musics !');
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
