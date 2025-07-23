@extends('layouts.base')

@section('content')
<div class="container py-5">


    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- CONNEXION --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow bg-dark text-white border-0">
                <div class="card-header text-center border-0">
                    <h1 class="fw-bold">Connexion</h1>
                </div>
                <div class="card-body">

                    {{-- Status de session --}}
                    <x-auth-session-status class="mb-3" :status="session('status')" />

                    {{-- Erreurs de validation --}}
                    <x-auth-validation-errors class="mb-3" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                        </div>

                        {{-- Remember me --}}
                        <div class="form-check mb-3">
                            <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                            <label for="remember_me" class="form-check-label">
                                Se souvenir de moi
                            </label>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-muted" href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif

                            <button class="btn btn-success px-4">
                                Connexion
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Optional bottom content --}}
    <div class="text-center text-white mt-5 small">
        Développé avec ❤️ par toi, propulsé par Laravel.
    </div>
</div>
@endsection
