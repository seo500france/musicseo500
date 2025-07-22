@extends('layouts.base')

@section('content')
<h2>Uploader une musique</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@endsection
