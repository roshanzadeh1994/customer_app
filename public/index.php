<?php
require __DIR__ . '/../vendor/autoload.php'; // Composer Autoloader laden

use App\Controllers\AuthController;
use App\Controllers\CustomerController;
use App\Core\Auth;

$uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // aktuelle URL (Pfad)
$base = '/customer_app/public';                           // Basis-Pfad der App


// Kleiner Router-Helfer: vergleicht aktuelle URL mit Zielpfad
$route = function(string $path) use ($uri, $base) {
    return rtrim($uri, '/') === rtrim($base . $path, '/');
};

// Root → Login
if ($route('') || $route('/')) { header("Location: {$base}/login"); exit; }

if ($route('/login'))    { (new AuthController())->login(); exit; }
if ($route('/register')) { (new AuthController())->register(); exit; }
if ($route('/logout') && $_SERVER['REQUEST_METHOD']==='POST') { (new AuthController())->logout(); exit; }

if ($route('/customers'))        { Auth::requireLogin(); (new CustomerController())->index(); exit; }
if ($route('/customers/create')) { Auth::requireLogin(); (new CustomerController())->create(); exit; }

// Dynamische Routen mit ID (Edit/Delete)
if (preg_match("#^{$base}/customers/(\d+)/edit$#", $uri, $m)) {
    Auth::requireLogin(); (new CustomerController())->edit((int)$m[1]); exit;
}
if (preg_match("#^{$base}/customers/(\d+)/delete$#", $uri, $m) && $_SERVER['REQUEST_METHOD']==='POST') {
    Auth::requireLogin(); (new CustomerController())->delete((int)$m[1]); exit;
}

// Fallback 404
http_response_code(404);
echo "404 Not Found";
