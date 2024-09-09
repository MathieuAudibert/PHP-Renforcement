<?php
require_once('./src/homepage/controller.php');
require_once('./src/login/controller.php');
require_once('./src/register/controller.php');

function route_request()
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
