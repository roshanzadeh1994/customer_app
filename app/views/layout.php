<?php use App\Core\Auth; use App\Core\Csrf; ?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Kunden-App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= BASE_PATH ?>/assets/style.css" rel="stylesheet"> <!-- zentrales CSS -->
</head>
<body>
  <header>
    <div class="inner">
      <div class="brand">
        <span class="dot"></span>
        <h1>Kunden-App</h1>
      </div>
      <nav>
        <?php if (Auth::check()): ?>
          <a href="<?= BASE_PATH ?>/customers">Meine Kunden</a> <!-- Link zur Kundenliste -->
          <form action="<?= BASE_PATH ?>/logout" method="post" style="display:inline">
            <?= Csrf::input() ?> <!-- CSRF-Schutz beim Logout -->
            <button type="submit" class="linklike">Logout</button>
          </form>
        <?php else: ?>
          <a href="<?= BASE_PATH ?>/login">Login</a> <!-- Login-Link -->
          <a href="<?= BASE_PATH ?>/register">Register</a> <!-- Registrierung-Link -->
        <?php endif; ?>
      </nav>
    </div>
  </header>
  <main class="container">
    <?php if (isset($error) && $error): ?>
      <div class="alert"><?= htmlspecialchars($error) ?></div> <!-- Fehlermeldung -->
    <?php endif; ?>
    <?php require $viewFile; ?>
  </main>
  <script src="<?= BASE_PATH ?>/assets/app.js"></script>  <!-- JS für Suche/Sortierung -->
</body>
</html>
