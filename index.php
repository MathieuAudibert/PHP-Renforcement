<?php

declare(strict_types=1);

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

require_once __DIR__ . '/src/homepage/controller.php';
require_once __DIR__ . '/src/login/controller.php';
require_once __DIR__ . '/src/register/controller.php';
require_once __DIR__ . '/src/about/controller.php';
require_once __DIR__ . '/src/artists/controller.php';
require_once __DIR__ . '/src/library/controller.php';
require_once __DIR__ . '/src/likes/controller.php';
require_once __DIR__ . '/utils/bdd.php';

function route_request(): void
{
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
            case '/about':
                controller_about();
                break;
            case '/library':
                controller_library();
                break;
            case '/likes':
                controller_likes();
                break;
            case '/artists':
                controller_artists();
                break;
            case '/logout':
                require('logout.php');
                break;
            default:
                http_response_code(404);
                echo "Page non trouvée";
                error_log(message: "Route invalide: $uri", message_type: 3, destination: '/utils/logs/errors.log');
                break;
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "Erreur serveur interne";
        error_log(message: "Erreur $uri: " . $e->getMessage(), message_type: 3, destination: '/utils/logs/errors.log');
    }
}

route_request();
