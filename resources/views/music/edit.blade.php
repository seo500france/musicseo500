@extends('layouts.base')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Modifier la musique</h2>

    <form action="{{ route('music.update', $music->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $music->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Artiste</label>
            <input type="text" name="artist" class="form-control" value="{{ old('artist', $music->artist) }}" required>
        </div>

        <div class="mb-3">
            <label>Album</label>
            <select name="album_id" class="form-control">
                <option value="">— Aucun album —</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ $music->album_id == $album->id ? 'selected' : '' }}>
                        {{ $album->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Changer le fichier (facultatif)</label>
            <input type="file" name="music" class="form-control">
            <p class="text-muted mt-1">Fichier actuel : {{ $music->file_path }}</p>
        </div>

        <button class="btn btn-success">💾 Enregistrer</button>
        <a href="{{ route('music.index') }}" class="btn btn-secondary">↩️ Retour</a>
    </form>
</div>
@endsection
