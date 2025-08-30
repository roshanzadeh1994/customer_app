<?php $viewFile = __FILE__; use App\Core\Csrf; ?>
<section class="card">
  <div class="toolbar">
    <div class="left">
      <h2 class="section-title">Meine Kunden</h2>
      <span class="badge" id="count-badge"><?= count($customers) ?> Einträge</span>  <!-- Anzahl Kunden -->
    </div>
    <div class="right">
      <input id="table-search" type="search" placeholder="Suchen (Name, Nr, Adresse, Telefon) …" aria-label="Suchen"> <!-- Suchfeld -->
      <a class="btn" href="<?= BASE_PATH ?>/customers/create">+ Neuer Kunde</a>  <!-- Neuer Kunde anlegen -->
    </div>
  </div>

  <?php if (empty($customers)): ?>
    <div class="empty">
      <h3>Noch keine Kunden</h3>  <!-- leere Liste -->
      <p>Lege deinen ersten Kundendatensatz an.</p>
      <a class="btn" href="<?= BASE_PATH ?>/customers/create">Jetzt anlegen</a>
    </div>
  <?php else: ?>
    <div class="table-wrap">
      <table class="table" id="customers-table">
        <thead>
          <tr>
            <th data-sort="nr">Kundennummer</th>
            <th data-sort="name">Name</th>
            <th>Adresse</th>
            <th>Telefon</th>
            <th class="nowrap">Aktionen</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($customers as $c): ?>
            <tr>
              <td><?= htmlspecialchars($c['customer_number']) ?></td>
              <td><?= htmlspecialchars($c['name']) ?></td>
              <td><?= htmlspecialchars($c['address'] ?? '') ?></td>
              <td><?= htmlspecialchars($c['phone'] ?? '') ?></td>
              <td class="actions nowrap">
                <a class="link" href="<?= BASE_PATH ?>/customers/<?= (int)$c['id'] ?>/edit">Bearbeiten</a> <!-- Kunde bearbeiten -->
                <form action="<?= BASE_PATH ?>/customers/<?= (int)$c['id'] ?>/delete" method="post" onsubmit="return confirm('Sicher löschen?')" style="display:inline">
                  <?= Csrf::input() ?>
                  <button type="submit" class="linklike">Löschen</button> <!-- Kunde löschen -->
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</section>
