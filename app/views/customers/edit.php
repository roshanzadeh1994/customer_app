<?php $viewFile = __FILE__; ?>
<section class="card">
  <h2>Kunde bearbeiten</h2>
  <form method="post" action="">
    <?= \App\Core\Csrf::input() ?>
    <label>Kundennummer
      <input name="customer_number" value="<?= htmlspecialchars($customer['customer_number']) ?>" maxlength="50" required>
    </label>
    <label>Name
      <input name="name" value="<?= htmlspecialchars($customer['name']) ?>" maxlength="100" required>
    </label>
    <label>Adresse
      <input name="address" value="<?= htmlspecialchars($customer['address'] ?? '') ?>">
    </label>
    <label>Telefon
      <input name="phone" value="<?= htmlspecialchars($customer['phone'] ?? '') ?>">
    </label>
    <div class="right">
      <a class="btn ghost" href="<?= BASE_PATH ?>/customers">Abbrechen</a> <!-- zurück ohne Änderungen -->
      <button type="submit" class="btn">Aktualisieren</button> <!-- zurück ohne Änderungen -->
    </div>
  </form>
</section>
