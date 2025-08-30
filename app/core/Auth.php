<?php
namespace App\Core;

class Auth {
    public static function start(): void {

         // Session starten falls noch nicht aktiv
        if (session_status() === PHP_SESSION_NONE) session_start();
    }
    public static function login(int $userId): void {
        self::start(); $_SESSION['user_id'] = $userId; // User-ID merken
    }
    public static function logout(): void {
        self::start(); session_destroy(); // Session beenden
    }
    public static function check(): bool {
        self::start(); return isset($_SESSION['user_id']); // Eingeloggt?
    }
    public static function id(): ?int {
        self::start(); return $_SESSION['user_id'] ?? null; // Aktuelle User-ID
    }
    public static function requireLogin(): void {

        // Weiterleitung wenn nicht eingeloggt
        if (!self::check()) { header('Location: ' . (defined('BASE_PATH') ? BASE_PATH : '') . '/login');
         exit; }
    }
}
