<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
   public function index()
{
    $musics = DB::table('musics')
        ->leftJoin('albums', 'musics.album_id', '=', 'albums.id')
        ->select('musics.*', 'albums.title as album_name')
        ->orderBy('musics.created_at', 'desc')
        ->get();

    $albums = DB::table('albums')->orderBy('created_at', 'desc')->get();

    return view('home', compact('musics', 'albums'));
}

}
