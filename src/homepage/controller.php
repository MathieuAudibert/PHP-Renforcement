<?php
require_once __DIR__ . '\model.php';
require_once __DIR__ . '\view.php';

function controller_homepage(): void
{
    try {
        $musiqueList = model_homepage(); 
        view_homepage($musiqueList);
    }
    catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}
