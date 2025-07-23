<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = DB::table('albums')->orderByDesc('created_at')->get();
        return view('albums.index', compact('albums'));
    }

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

    public function edit($id)
    {
        $album = DB::table('albums')->find($id);
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $coverPath = DB::table('albums')->where('id', $id)->value('cover');

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = 'cover-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('covers'), $filename);
            $coverPath = 'covers/' . $filename;
        }

        DB::table('albums')->where('id', $id)->update([
            'title'      => $request->title,
            'cover'      => $coverPath,
            'updated_at' => now(),
        ]);

        return redirect()->route('albums.index')->with('success', 'Album mis à jour !');
}


}
