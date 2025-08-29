// --- Live Search & Sort for the customers table ---
(function(){
  const table = document.getElementById('customers-table');
  if (!table) return; // Abbrechen falls keine Tabelle da ist

  const tbody = table.querySelector('tbody');
  const rows = Array.from(tbody.querySelectorAll('tr'));
  const search = document.getElementById('table-search');
  const countBadge = document.getElementById('count-badge');

  // Live filter
  function filter() {
    const q = (search?.value || '').toLowerCase().trim();
    let visible = 0;
    rows.forEach(tr => {
      const text = tr.innerText.toLowerCase();
      const show = !q || text.includes(q); // nur passende anzeigen
      tr.style.display = show ? '' : 'none';
      if (show) visible++;
    });
    if (countBadge) countBadge.textContent = `${visible} Einträge`; // Badge aktualisieren
  }
  search?.addEventListener('input', filter);

  // Sort by clicking header (Kundennummer/Name)
  let sortDir = 1;  // 1 = aufsteigend, -1 = absteigend
  function sortByIndex(index) {
    const currentRows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.style.display !== 'none');
    currentRows.sort((a,b) => {
      const ta = a.children[index].innerText.trim().toLowerCase();
      const tb = b.children[index].innerText.trim().toLowerCase();
      if (ta < tb) return -1 * sortDir;
      if (ta > tb) return  1 * sortDir;
      return 0;
    });
    sortDir *= -1; // Richtung umschalten
    currentRows.forEach(r => tbody.appendChild(r)); // sortierte Zeilen anhängen
  }

  // Event-Handler für sortierbare Spalten
  table.querySelectorAll('thead th[data-sort]').forEach((th, i) => {
    th.addEventListener('click', () => sortByIndex(i));
  });
})();
