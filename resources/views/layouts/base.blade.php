<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MusicSEO500</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #000; color: #fff; font-family: 'Segoe UI', sans-serif; }
        .sidebar { background-color: #121212; height: 100vh; position: fixed; width: 250px; overflow-y: auto; }
        .main { margin-left: 250px; padding-bottom: 80px; }
        .footer-player { position: fixed; bottom: 0; left: 250px; right: 0; background-color: #181818; padding: 10px 20px; border-top: 1px solid #333; }
        .song-table tr:hover { background-color: #2a2a2a; }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column p-3 text-white">
        <h4 class="mb-4">MusicSEO500</h4>
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="/" class="nav-link text-white">🏠 Accueil</a></li>
            <li><a href="/upload" class="nav-link text-white">⬆️ Uploader</a></li>
            <li><a href="/musics" class="nav-link text-white">Mes Musics</a></li>
        </ul>
        <div class="mt-auto">
            <img src="/logo.png" class="img-fluid mt-3 rounded">
        </div>
    </div>

    <div class="main bg-dark text-white p-4">
        @yield('content')
    </div>

    <div class="footer-player d-flex justify-content-between align-items-center text-white">
        <div><strong>Aucune musique</strong></div>
        <div class="d-flex gap-3">
            <button class="btn btn-outline-light btn-sm">⏮</button>
            <button class="btn btn-light btn-sm">⏯</button>
            <button class="btn btn-outline-light btn-sm">⏭</button>
        </div>
        <div class="text-muted">🔊 0%</div>
    </div>
</body>
</html>
