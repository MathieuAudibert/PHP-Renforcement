<?php
declare(strict_types=1);

require_once __DIR__ . '/src/homepage/controller.php';
require_once __DIR__ . '/src/login/controller.php';
require_once __DIR__ . '/src/register/controller.php';
require_once __DIR__ . '/utils/bdd.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function route_request() {
    $uri = $_SERVER['REQUEST_URI'];

    try {
        switch ($uri) {
            case '/':
                controller_homepage();
                break;
            case '/login':
                controller_login();
                break;
            case '/register':
                controller_register();
                break;
            default:
                http_response_code(404);
                echo "Page non trouvé";
                error_log("Route invalide: $uri", 3, 'errors.log');
                break;
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "Erreur serveur interne";
        error_log("Erreur $uri: " . $e->getMessage(), 3, 'errors.log');
    }
}


route_request();
?>
