<?php
declare(strict_types=1);

require_once('./src/homepage/controller.php');
require_once('./src/login/controller.php');
require_once('./src/register/controller.php');
require_once('./utils/bdd.php');

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

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$logFile = $_ENV['LOG_FILE'];

function handleShutdown() {
    $error = error_get_last();
    if ($error && ($error['type'] === E_ERROR || $error['type'] === E_USER_ERROR)) {
        error_log("[ " . date("Y-m-d H:i:s") . " ] FErreur Fatale: " . $error['message'], $_ENV['LOG_FILE']);
    }
}

register_shutdown_function('handleShutdown');


route_request();
?>
