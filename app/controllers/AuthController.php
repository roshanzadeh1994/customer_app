<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Validation;
use App\Models\User;

class AuthController extends Controller {
    public function login(): void {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

             // CSRF prüfen
            if (!Csrf::verify($_POST['csrf'] ?? '')) {
                $error = 'Ungültiger CSRF-Token.';
            } else {
                $email = trim($_POST['email'] ?? '');
                $pass  = $_POST['password'] ?? '';

                // Basis-Validierung
                if (!Validation::email($email) || !Validation::required($pass)) {
                    $error = 'Bitte gültige Email und Passwort eingeben.';
                } else {

                    // User laden und Passwort prüfen
                    $user = User::findByEmail($email);
                    if ($user && password_verify($pass, $user['password_hash'])) {
                        Auth::login((int)$user['id']);
                        $this->redirect('/customer_app/public/customers');
                    } else {
                        $error = 'Login fehlgeschlagen.';
                    }
                }
            }
        }

        // Login-View laden
        $this->view('auth/login', compact('error'));
    }

    public function register(): void {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Csrf::verify($_POST['csrf'] ?? '')) {
                $error = 'Ungültiger CSRF-Token.';
            } else {
                $email = trim($_POST['email'] ?? '');
                $pass  = $_POST['password'] ?? '';

                 // Basis-Validierung
                if (!Validation::email($email) || !Validation::required($pass)) {
                    $error = 'Bitte gültige Email und Passwort eingeben.';
                } else {
                    try {
                        User::create($email, $pass);
                        $this->redirect('/customer_app/public/login');
                    } catch (\Throwable $e) {
                        $error = 'Registrierung fehlgeschlagen (Email evtl. schon vergeben).';
                    }
                }
            }
        }

         // Register-View laden
        $this->view('auth/register', compact('error'));
    }

    public function logout(): void {
        Auth::logout();
        $this->redirect('/customer_app/public/login');
    }
}
