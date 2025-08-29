<?php
namespace App\Models;

use App\Config\Database;

class Customer {

    // Alle Kunden des eingeloggten Nutzers
    public static function allByUser(int $userId): array {
        $pdo = Database::pdo();  // DB-Verbindung holen
        $stmt = $pdo->prepare("SELECT * FROM customers WHERE user_id = ? ORDER BY id DESC");
        $stmt->execute([$userId]);  // Nur eigene Datensätze laden
        return $stmt->fetchAll();   // Ergebnisliste
    }

    // Neuen Kunden für einen Nutzer anlegen
    public static function create(int $userId, string $number, string $name, ?string $address, ?string $phone): bool {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare(
            "INSERT INTO customers(user_id, customer_number, name, address, phone) VALUES (?, ?, ?, ?, ?)"
        );
        return $stmt->execute([$userId, $number, $name, $address, $phone]);
    }

     // Einzelnen Kunden laden, aber nur wenn er dem Nutzer gehört
    public static function findOwned(int $id, int $userId): ?array {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare("SELECT * FROM customers WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        $c = $stmt->fetch();
        return $c ?: null;
    }

     // Kunden aktualisieren
    public static function update(int $id, int $userId, string $number, string $name, ?string $address, ?string $phone): bool {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare(
            "UPDATE customers SET customer_number=?, name=?, address=?, phone=?, updated_at=NOW()
             WHERE id=? AND user_id=?"
        );
        return $stmt->execute([$number, $name, $address, $phone, $id, $userId]);
    }

    // Kunden löschen
    public static function delete(int $id, int $userId): bool {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare("DELETE FROM customers WHERE id=? AND user_id=?");
        return $stmt->execute([$id, $userId]);
    }
}
