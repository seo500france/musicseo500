<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $coverPath = null;

    if ($request->hasFile('cover')) {
        $file = $request->file('cover');
        $filename = 'cover-' . time() . '.' . $file->getClientOriginalExtension();

        // Déplace le fichier manuellement dans public/covers
        $file->move(public_path('covers'), $filename);

        $coverPath = 'covers/' . $filename; // pas "storage/" ici
    }

    DB::table('albums')->insert([
        'title'      => $request->title,
        'cover'      => $coverPath,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Album créé avec succès !');
}

}
