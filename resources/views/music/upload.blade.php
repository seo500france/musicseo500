@extends('layouts.base')

@section('content')
<h2>🎶 Ajouter un album</h2>

@if(session('album_success'))
    <div class="alert alert-success">{{ session('album_success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <input type="text" name="title" placeholder="Nom de l'album" class="form-control mb-2" required>
    <input type="file" name="cover" class="form-control mb-2" accept="image/*">
    <button class="btn btn-primary">Créer l'album</button>
</form>

<h2>Uploader une musique</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Titre" class="form-control mb-2" required>
    <input type="text" name="artist" placeholder="Artiste" class="form-control mb-2" required>

    <select name="album_id" class="form-control mb-2">
        <option value="">— Aucun album —</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}">{{ $album->title }}</option>
        @endforeach
    </select>

    <input type="file" name="music" class="form-control mb-2" required>
    <button class="btn btn-success">Upload</button>
</form>
@endsection
