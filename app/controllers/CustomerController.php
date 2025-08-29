<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Validation;
use App\Models\Customer;

class CustomerController extends Controller {
    public function index(): void {
        Auth::requireLogin();                           // Nur eingeloggte User
        $customers = Customer::allByUser(Auth::id());   // Nur eigene Kunden laden
        $this->view('customers/index', compact('customers'));
    }

    public function create(): void {
        Auth::requireLogin();           // Login erforderlich
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Csrf::verify($_POST['csrf'] ?? '')) {
                $error = 'Ungültiger CSRF-Token.';
            } else {

                // Formulardaten holen
                $number  = trim($_POST['customer_number'] ?? '');
                $name    = trim($_POST['name'] ?? '');
                $address = trim($_POST['address'] ?? '');
                $phone   = trim($_POST['phone'] ?? '');

                // Validierung

                if (!Validation::required($number) || !Validation::required($name)
                    || !Validation::max($number, 50) || !Validation::max($name, 100)) {
                    $error = 'Bitte Pflichtfelder korrekt ausfüllen.';
                } else {

                    // Neuen Kunden speichern
                    Customer::create(Auth::id(), $number, $name, $address ?: null, $phone ?: null);
                    $this->redirect('/customer_app/public/customers');
                }
            }
        }

        $this->view('customers/create', compact('error'));
    }

    public function edit(int $id): void {
        Auth::requireLogin();
        $error = null;
        $customer = Customer::findOwned($id, Auth::id());
        if (!$customer) { http_response_code(404); echo "Kunde nicht gefunden."; return; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // CSRF prüfen
            if (!Csrf::verify($_POST['csrf'] ?? '')) {
                $error = 'Ungültiger CSRF-Token.';
            } else {

                // Formulardaten holen
                $number  = trim($_POST['customer_number'] ?? '');
                $name    = trim($_POST['name'] ?? '');
                $address = trim($_POST['address'] ?? '');
                $phone   = trim($_POST['phone'] ?? '');

                if (!Validation::required($number) || !Validation::required($name)
                    || !Validation::max($number, 50) || !Validation::max($name, 100)) {
                    $error = 'Bitte Pflichtfelder korrekt ausfüllen.';
                } else {

                    // Kunden aktualisieren
                    Customer::update($id, Auth::id(), $number, $name, $address ?: null, $phone ?: null);
                    $this->redirect('/customer_app/public/customers');
                }
            }
        }

        $this->view('customers/edit', compact('customer','error'));
    }

    public function delete(int $id): void {
        Auth::requireLogin();

         // Nur POST und gültiger CSRF
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Csrf::verify($_POST['csrf'] ?? '')) {
            Customer::delete($id, Auth::id());
        }
        $this->redirect('/customer_app/public/customers');
    }
}
