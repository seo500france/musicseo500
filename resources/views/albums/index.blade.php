@extends('layouts.base')

@section('content')
<div class="container">
    <h2 class="mb-4">Tous les albums</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($albums as $album)
            <div class="col-md-3 mb-4">
                <div class="card bg-dark text-white">
                    @if($album->cover)
                        <img src="{{ asset($album->cover) }}" class="card-img-top" alt="{{ $album->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->title }}</h5>
                        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-outline-light btn-sm">✏️ Éditer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
