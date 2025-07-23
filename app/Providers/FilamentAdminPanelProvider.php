<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament; // ✅ Ajout de l'import manquant

class FilamentAdminPanelProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                // Ajoute ici tes liens custom si besoin
            ]);
        });

        // ✅ Utiliser ton modèle User existant
        Filament::setUserModel(\App\Models\User::class);

        // ✅ (Optionnel) Restreindre l'accès aux admins
        Filament::auth(function () {
            return auth()->check() && auth()->user()->is_admin;
        });
    }
}
