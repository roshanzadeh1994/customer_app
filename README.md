# Kunden-App (Testaufgabe Edd-ON)

Dies ist eine kleine **Testaufgabe** für die Firma **Edd-ON IT & E-Commerce GmbH**.  
Ziel war die Erstellung einer Mini-Webapplikation (**PHP + MySQL**) mit folgenden Funktionen:

## Funktionen
- Loginsystem mit Registrierfunktion
- Kundendatensatz anlegen (zB Kundennummer, Adresse etc)
- Tabellarische Ansicht von Kunden 
- Kunden löschen, editieren 
- Eingeloggter user sollte nur seine eigenen, angelegten Kunden sehen können

---

## Technologien
- **PHP 8** (getestet mit XAMPP)  
- **MySQL** (phpMyAdmin)  
- **Composer** (PSR-4 Autoload)  
- **HTML**, **CSS**, **JavaScript**  

---

## Installation und Start

### 1. Repository klonen

1. **XAMPP installieren**  
   Installieren Sie zuerst XAMPP auf Ihrem Rechner.

2. **In das `htdocs`-Verzeichnis wechseln**  
```bash
cd C:\xampp\htdocs
git clone https://github.com/roshanzadeh1994/customer_app.git
 ```

### 2. **XAMPP** Apache und MySQL starten
Öffnen Sie das XAMPP Control Panel und klicken Sie auf Start bei Apache und MySQL

### 3. Composer-Abhängigkeiten installieren
Nachdem Sie das Projekt geklont und im VS Code geöffnet haben, öffnen Sie im Projektverzeichnis (z.B. C:\xampp\htdocs\customer_app) ein Terminal und führen Sie folgenden Befehl aus
```bash
composer install
```
  
### 4. Datenbank einrichten
- Öffnen Sie phpMyAdmin unter 
   ```bash
  http://localhost/phpmyadmin ```
- Erstellen Sie eine neue Datenbank mit dem Namen **`customer_app`** 
- Wählen Sie diese Datenbank aus, gehen Sie zum Tab SQL, öffnen Sie die Datei database/schema.sql, kopieren Sie den Inhalt und fügen Sie ihn dort ein.
- Klicken Sie anschließend auf OK / Ausführen, um die Tabellen zu erstellen

 ### 5.server starten
- Im Browser öffnen:  
  ```bash
   http://localhost/customer_app/public/login
 ```

 ```
## Features (Kurzfassung)
- CSRF-Schutz bei allen Formularen  
- Passwort-Hashing mit `password_hash` und Prüfung mit `password_verify`  
- Prepared Statements mit **PDO** gegen SQL-Injection  
- Klare Struktur (**MVC-ähnlich, PSR-4 Autoload**)  

---

✅ **Fertig!** Jetzt ist die App einsatzbereit 
