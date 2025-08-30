# Kunden-App (Testaufgabe Edd-ON)

Dies ist eine kleine **Testaufgabe** für die Firma **Edd-ON**.  
Ziel war die Erstellung einer Mini-Webapplikation (**PHP + MySQL**) mit folgenden Funktionen:

## Funktionen
- 🔑 Login und Registrierung  
- 👤 Kunden anlegen, anzeigen, bearbeiten, löschen  
- 🔒 Jeder User sieht nur seine eigenen Kunden  

---

## Technologien
- 🐘 **PHP 8** (getestet mit XAMPP)  
- 🗄️ **MySQL** (phpMyAdmin)  
- 📦 **Composer** (PSR-4 Autoload)  
- 🌐 HTML, CSS, JavaScript  

---

## Installation und Start

### 1. Repository klonen

1. **XAMPP installieren**  
   Installiere zuerst XAMPP auf deinem Rechner.

2. **In das `htdocs`-Verzeichnis wechseln**  
   Öffne die terminal und führe folgenden Befehl aus:
   ```bash
   cd C:\xampp\htdocs
   ```

```bash
    git clone https://github.com/roshanzadeh1994/test1
```
 

### 2. Composer-Abhängigkeiten installieren
in project verzeichnis (z b in vs code in path:  (cd C:\xampp\htdocs) :
führen Sie diese befehle :
```bash
composer install
```
### 3. In **XAMPP** Apache und MySQL starten  
  
### 4. Datenbank einrichten
- phpMyAdmin öffnen unter http://localhost/phpmyadmin
- Neue Datenbank mit dem Namen **`customer_app`** anlegen
- in verzeinnis projekt in path --> cd C:\xampp\htdocs\customer_app\database\schema.sql
- Die Datei **`database/schema.sql`** in customer_app DB in sql scripts  importieren

 ### 5.server starten
- Im Browser öffnen:  
  http://localhost/customer_app/public/login

---

## Hinweise
- ⚙️ **Datenbank-Config**: in `app/Config/Database.php` kann Benutzername und Passwort angepasst werden  
  *(Standard: user=root, pass=leer)*  
- 🌍 **Base-URL**: in `public/index.php` ist die Variable `$base` gesetzt  
  *(Standard: /customer_app/public)*  
- Nach der Registrierung kann man sich einloggen und Kunden verwalten.  

---

## Features (Kurzfassung)
- 🛡️ CSRF-Schutz bei allen Formularen  
- 🔑 Passwort-Hashing mit `password_hash` und Prüfung mit `password_verify`  
- 💾 Prepared Statements mit **PDO** gegen SQL-Injection  
- 📂 Klare Struktur (**MVC-ähnlich, PSR-4 Autoload**)  

---

✅ **Fertig!** Jetzt ist die App einsatzbereit 
