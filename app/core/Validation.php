<?php
namespace App\Core;

class Validation {

        // Prüft ob gültige E-Mail
    public static function email(string $v): bool { return (bool) filter_var($v, FILTER_VALIDATE_EMAIL); }

        // Prüft ob Pflichtfeld ausgefüllt
    public static function required(string $v): bool { return trim($v) !== ''; }

       // Maximale Länge prüfen
    public static function max(string $v, int $len): bool { return mb_strlen($v) <= $len; }
}
