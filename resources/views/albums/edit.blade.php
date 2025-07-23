@extends('layouts.base')

@section('content')
<div class="container">
    <h2>Modifier l'album</h2>

    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" value="{{ old('title', $album->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Nouvelle couverture (facultatif)</label>
            <input type="file" name="cover" class="form-control">
            @if($album->cover)
                <p class="mt-2">Actuelle : <img src="{{ asset($album->cover) }}" width="100" class="rounded"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">💾 Sauvegarder</button>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">↩️ Retour</a>
    </form>
</div>
@endsection
