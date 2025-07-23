<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MusicSEO500</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<link rel="manifest" href="/site.webmanifest" />
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      padding-bottom: 80px;
    }

    .footer-player {
      position: fixed;
      bottom: 0;
      left: 250px;
      right: 0;
      background-color: #181818;
      padding: 10px 20px;
      border-top: 1px solid #333;
      z-index: 1030;
    }

    @media (max-width: 768px) {
      .main {
        margin-left: 0;
        padding-top: 70px;
      }

      .footer-player {
        left: 0;
      }
    }

    .offcanvas {
      background-color: #121212;
      color: white;
    }

    .nav-link {
      color: white !important;
    }

    .nav-link:hover {
      background-color: #333;
    }

    .logo-small {
      max-width: 150px;
    }
  </style>
</head>
<body>

  <!-- Bouton de menu mobile (visible uniquement sur mobile) -->
  <nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
      <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
        ☰
      </button>
      <span class="navbar-brand mb-0 h1">MusicSEO500</span>
    </div>
  </nav>

  <!-- Sidebar desktop -->
  <div class="d-none d-md-block position-fixed top-0 start-0 h-100 bg-dark text-white p-3" style="width: 250px;">
    <img src="/logo.png" class="img-fluid rounded mb-4" />
    <ul class="nav flex-column">
      <li class="nav-item"><a href="/" class="nav-link">🏠 Accueil</a></li>
      <li class="nav-item"><a href="/musics" class="nav-link">📀 Musique</a></li>
      <li class="nav-item"><a href="/albums" class="nav-link">📀 Albums</a></li>
      <li class="nav-item"><a href="/upload" class="nav-link">⬆️ Charger</a></li>
    </ul>

  </div>

  <!-- Offcanvas mobile menu -->
  <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menu</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <img src="/logo.png" class="img-fluid rounded mb-4" />
      <ul class="nav flex-column">
        <li class="nav-item"><a href="/" class="nav-link">🏠 Accueil</a></li>
        <li class="nav-item"><a href="/musics" class="nav-link">📀 Musique</a></li>
        <li class="nav-item"><a href="/upload" class="nav-link">⬆️ Charger</a></li>
      </ul>
    </div>
  </div>

  <!-- Contenu principal -->
  <div class="main bg-dark text-white">
    @yield('content')
  </div>

  <!-- Lecteur bas -->
  <div class="footer-player d-flex justify-content-between align-items-center text-white">
    <div><strong>Aucune musique</strong></div>
    <div class="d-flex gap-3">
      <button class="btn btn-outline-light btn-sm">⏮</button>
      <button class="btn btn-light btn-sm">⏯</button>
      <button class="btn btn-outline-light btn-sm">⏭</button>
    </div>
    <div class="text-muted">🔊 0%</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
