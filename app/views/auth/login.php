<?php $viewFile = __FILE__; ?>
<section class="card">
  <h2>Login</h2>
  <form method="post" action="">
    <?= \App\Core\Csrf::input() ?>  <!-- CSRF-Schutzfeld -->
    <label>Email
      <input type="email" name="email" required>  <!-- Pflichtfeld: Email -->
    </label>
    <label>Passwort
      <input type="password" name="password" required>  <!-- Pflichtfeld: Passwort -->
    </label>

    <div class="form-actions">
      <button type="submit" class="btn">Login</button>  <!-- Login-Button -->
    </div>
  </form>

  <!-- Link zur Registrierung für neue User -->
  <p class="auth-alt">
    Neu hier? <a href="/customer_app/public/register">Konto erstellen</a>
  </p>
</section>
