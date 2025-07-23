@extends('layouts.base')

@section('content')
<div class="container py-5">



    {{-- MESSAGE DE SUCCÈS --}}
    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">{{ session('success') }}</div>
    @endif

    {{-- CONNEXION / INSCRIPTION --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg bg-dark text-white border-0 rounded-4">
                <div class="card-header text-center border-0 bg-transparent">
                    <h1 class="fw-bold mb-0">Créer un compte</h1>
                </div>
                <div class="card-body px-4 py-5">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nom -->
                        <div class="mb-3">
                            <x-label for="name" :value="__('Nom')" class="form-label text-light" />
                            <x-input id="name" class="form-control bg-secondary text-white border-0 rounded-pill" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <x-label for="email" :value="__('Adresse Email')" class="form-label text-light" />
                            <x-input id="email" class="form-control bg-secondary text-white border-0 rounded-pill" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <x-label for="password" :value="__('Mot de passe')" class="form-label text-light" />
                            <x-input id="password" class="form-control bg-secondary text-white border-0 rounded-pill" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirmation -->
                        <div class="mb-4">
                            <x-label for="password_confirmation" :value="__('Confirmation du mot de passe')" class="form-label text-light" />
                            <x-input id="password_confirmation" class="form-control bg-secondary text-white border-0 rounded-pill" type="password" name="password_confirmation" required />
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}" class="text-decoration-none text-light small">
                                Déjà inscrit ? Se connecter
                            </a>
                            <x-button class="btn btn-success rounded-pill px-4 py-2">
                                {{ __('S’inscrire') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- PIED DE PAGE --}}
    <div class="text-center text-white mt-5 small">
        Créé avec ❤️ par toi & Laravel — Code libre, vibes illimitées 🎶
    </div>

</div>
@endsection
