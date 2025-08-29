<?php $viewFile = __FILE__; ?>
<section class="card">
  <h2>Neuer Kunde</h2>
  <form method="post" action="">
    <?= \App\Core\Csrf::input() ?>
    <label>Kundennummer
      <input name="customer_number" maxlength="50" required>
    </label>
    <label>Name
      <input name="name" maxlength="100" required>
    </label>
    <label>Adresse
      <input name="address">
    </label>
    <label>Telefon
      <input name="phone">
    </label>
    <div class="right">
      <a class="btn ghost" href="/customer_app/public/customers">Abbrechen</a>
      <button type="submit" class="btn">Speichern</button>
    </div>
  </form>
</section>
