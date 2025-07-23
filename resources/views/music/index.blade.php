@extends('layouts.base')

@section('content')
<h2 class="mb-4">Mes Musiques 🎵</h2>

@if($musics->isEmpty())a
<div class="alert alert-warning">Aucune musique enregistrée.</div>
@else
<table class="table table-dark table-hover align-middle">
    <thead>
        <tr>
            <th>Pochette</th>
            <th>Titre</th>
            <th>Artiste</th>
            <th>Album</th>
            <th>Écouter</th>
            <th>Date</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($musics as $music)
        <tr>
            <td>
                @if($music->album_cover)
                <img src="{{ asset($music->album_cover) }}" alt="Cover" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                @else
                <span class="text-muted">—</span>
                @endif
            </td>
            <td>{{ $music->title }}</td>
            <td>{{ $music->artist }}</td>
            <td>{{ $music->album_name ?? '—' }}</td>
            <td>
                <audio controls style="height: 30px;">
                    <source src="{{ asset($music->file_path) }}" type="audio/mpeg">
                    Ton navigateur ne supporte pas l’audio.
                </audio>
            </td>
            <td>{{ \Carbon\Carbon::parse($music->created_at)->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('music.edit', $music->id) }}" class="btn btn-outline-light btn-sm">✏️</a>

                <form action="{{ route('music.destroy', $music->id) }}" method="POST" onsubmit="return confirm('Supprimer cette musique ?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger btn-sm">🗑️</button>
    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

{{-- 🔽 Liste des albums --}}
<h3 class="mt-5">Mes Albums 📀</h3>
@if($albums->isEmpty())
<div class="alert alert-info">Aucun album enregistré.</div>
@else
<div class="row">
    @foreach($albums as $album)
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card bg-dark text-white border-secondary">
            @if($album->cover)
            <img src="{{ asset($album->cover) }}" class="card-img-top" alt="Cover {{ $album->title }}" style="height: 200px; object-fit: cover;">
            @else
            <div class="bg-secondary text-center py-5">Pas de cover</div>
            @endif
            <div class="card-body">
                <h5 class="card-title text-center">{{ $album->title }}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection