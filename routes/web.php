<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

use App\Http\Controllers\MusicController;
use App\Http\Controllers\AlbumController;

Route::get('/upload', [MusicController::class, 'create'])->name('music.create');
Route::post('/upload', [MusicController::class, 'store'])->name('music.store');
Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');



Route::get('/musics', [MusicController::class, 'index'])->name('music.index');
require __DIR__.'/auth.php';

