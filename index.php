<?php
declare(strict_types=1);

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

require_once __DIR__ . '/src/homepage/controller.php';
require_once __DIR__ . '/src/login/controller.php';
require_once __DIR__ . '/src/register/controller.php';
require_once __DIR__ . '/utils/bdd.php';

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
                echo "Page non trouvée";
                error_log("Route invalide: $uri", 3, '/utils/logs/errors.log');
                break;
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "Erreur serveur interne";
        error_log("Erreur $uri: " . $e->getMessage(), 3, '/utils/logs/errors.log');
    }
}
    
route_request();
