<?php
namespace App\Models;

use App\Config\Database;

class User {

    // Neuen Benutzer mit gehashtem Passwort anlegen
    public static function create(string $email, string $password): bool {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare("INSERT INTO users(email, password_hash) VALUES (?, ?)");
        return $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    // Benutzer anhand der Email laden
    public static function findByEmail(string $email): ?array {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $u = $stmt->fetch();
        return $u ?: null;
    }
}
