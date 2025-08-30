<?php $viewFile = __FILE__; ?>
<section class="card">
  <h2>Registrieren</h2>
  <form method="post" action="">
    <?= \App\Core\Csrf::input() ?>  <!-- CSRF-Schutzfeld -->
    <label>Email
      <input type="email" name="email" required> <!-- Pflichtfeld: Email -->
    </label>
    <label>Passwort
      <input type="password" name="password" required>   <!-- Pflichtfeld: Passwort -->
    </label>

    <div class="form-actions">
        
        <!-- Link zurück zum Login -->
      <a class="btn ghost" href="<?= BASE_PATH ?>/login">Zum Login</a> 

      <!-- Registrierung absenden -->
      <button type="submit" class="btn">Konto erstellen</button>  
    </div>
  </form>
</section>
