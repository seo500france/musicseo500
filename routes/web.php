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


use App\Http\Controllers\MusicController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;


Route::get('/musics/{id}/edit', [MusicController::class, 'edit'])->name('music.edit');
Route::post('/musics/{id}/update', [MusicController::class, 'update'])->name('music.update');
Route::delete('/musics/{id}/delete', [MusicController::class, 'destroy'])->name('music.destroy');

Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::post('/albums/{id}/update', [AlbumController::class, 'update'])->name('albums.update');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/upload', [MusicController::class, 'create'])->name('music.create');
Route::post('/upload', [MusicController::class, 'store'])->name('music.store');
Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');



Route::get('/musics', [MusicController::class, 'index'])->name('music.index');
require __DIR__.'/auth.php';

