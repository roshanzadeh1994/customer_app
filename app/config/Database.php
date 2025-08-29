<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    // Singleton für DB-Verbindung
    private static ?PDO $instance = null;

    public static function pdo(): PDO {
        // Verbindung nur einmal aufbauen
        if (!self::$instance) {
            $host = 'localhost';
            $db   = 'customer_app';
            $user = 'root'; 
            $pass = '';      

            try {
                // Neue PDO-Verbindung
                self::$instance = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // Exceptions aktivieren
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Arrays als Ergebnis
                ]);
            } catch (PDOException $e) {
                // Fehler → Abbruch
                exit('DB Connection failed: ' . $e->getMessage());
            }
        }
        // Verbindung zurückgeben
        return self::$instance;
    }
}
