<?php
namespace App\Core;

class Controller {
    protected function view(string $path, array $data = []): void {

        // Daten ins View-Template extrahieren
        extract($data, EXTR_SKIP);

         // Pfad zur View-Datei bestimmen
        $viewFile = __DIR__ . '/../views/' . $path . '.php';

         // Falls View fehlt -> Fehler
        if (!file_exists($viewFile)) { http_response_code(500); echo "View not found: $path"; return; }

        // Layout laden (bindet View ein)
        include __DIR__ . '/../views/layout.php';
    }
    protected function redirect(string $path): void {

        // HTTP-Redirect
        header("Location: {$path}"); exit;
    }
}
