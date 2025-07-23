MusicSEO500 — Mini Spotify en Laravel

MusicSEO500 est une application web légère construite avec Laravel, permettant d'uploader, organiser et écouter de la musique directement dans le navigateur. L’objectif est de fournir une interface simple et élégante pour gérer vos morceaux et albums comme dans une bibliothèque musicale personnelle.
Fonctionnalités principales

    Upload de fichiers audio (.mp3, .wav, etc.)

    Création et gestion d’albums avec image de couverture

    Association d’un morceau à un album existant

    Interface responsive compatible mobile et desktop

    Lecteur audio intégré en HTML5

    Affichage des pochettes dans les listings

    Système d’authentification utilisateur

    Panneau d'administration sécurisé avec Filament

    Upload sécurisé avec attribution automatique à l’utilisateur connecté

Installation
1. Cloner le projet

git clone https://github.com/seo500france/musicseo500.git
cd musicseo500

2. Installer les dépendances

composer install
npm install && npm run dev

3. Configurer l'environnement

cp .env.example .env
php artisan key:generate

Modifier ensuite le fichier .env pour indiquer vos accès à la base de données et configurer le disque public :

DB_DATABASE=musicseo500
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public

4. Lancer les migrations

php artisan migrate

5. Créer un utilisateur admin (facultatif)

php artisan tinker

>>> \App\Models\User::factory()->create(['email' => 'admin@example.com', 'is_admin' => true])

Accès à l'administration

Filament est accessible uniquement aux utilisateurs administrateurs.

http://localhost:8000/admin

Structure des fichiers audio

Les fichiers sont stockés dans le dossier public/musics, et les covers dans public/albums. Laravel gère l’upload via le disque public, avec accès via asset().
Personnalisation

Vous pouvez modifier :

    Les styles dans resources/css ou directement dans les templates Blade

    Le menu latéral dans resources/views/layout.blade.php

    Les ressources Filament dans app/Filament/Resources/

Crédits

Ce projet est conçu et maintenu par seo500france.com — expert en développement web et SEO haute performance.