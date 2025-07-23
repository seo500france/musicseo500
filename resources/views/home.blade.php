@extends('layouts.base')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-white">🎧 MusicSEO500</h1>
        <p class="lead text-secondary">
            Marre de payer Spotify ? Crée ta propre appli musicale 100% gratuite, open-source et sans pub !
        </p>
        <a href="{{ route('music.create') }}" class="btn btn-success btn-lg mt-3">
            ⬆️ Uploader une musique
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-white">🎵 Dernières musiques ajoutées</h2>
            @if($musics->isEmpty())
                <div class="alert alert-warning mt-3">Aucune musique encore disponible.</div>
            @else
                <div class="list-group bg-dark rounded p-3">
                    @foreach($musics->take(5) as $music)
                        <div class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $music->title }}</strong> — {{ $music->artist }}
                                @if($music->album_name)
                                    <span class="badge bg-secondary ms-2">{{ $music->album_name }}</span>
                                @endif
                            </div>
                            <audio controls style="height: 30px; width: 200px;">
                                <source src="{{ asset($music->file_path) }}" type="audio/mpeg">
                                Ton navigateur ne supporte pas l’audio.
                            </audio>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <h2 class="text-white">📀 Albums récents</h2>
        @forelse($albums as $album)
            <div class="col-md-3 mb-4">
                <div class="card bg-dark text-white">
                    @if($album->cover)
                        <img src="{{ asset('covers/' . $album->cover) }}" class="card-img-top" alt="{{ $album->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->title }}</h5>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning mt-3">Aucun album pour le moment.</div>
        @endforelse
    </div>
</div>
@endsection
