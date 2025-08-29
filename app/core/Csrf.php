<?php
namespace App\Core;

class Csrf {
    public static function token(): string {
        Auth::start();

        // Neues Token generieren falls nicht vorhanden
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    public static function verify(string $token): bool {
        Auth::start();

        // Token prüfen (Timing-sicher)
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    public static function input(): string {

        // Token als verstecktes Feld fürs Formular
        $t = htmlspecialchars(self::token(), ENT_QUOTES, 'UTF-8');
        return "<input type='hidden' name='csrf' value='{$t}'>";
    }
}
