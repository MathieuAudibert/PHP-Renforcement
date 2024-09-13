<?php
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_homepage(): void
{
    try {
        $musiqueList = model_homepage();
        view_homepage($musiqueList);
    } catch (Exception $e) {
        error_log(message: $e->getMessage(), message_type: 3, destination: '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}
