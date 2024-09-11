<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_homepage(): void
{
    try {
        $musiqueList = model_homepage(); 
        view_homepage($musiqueList);
    }
    catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur interne";
    }
}

?>