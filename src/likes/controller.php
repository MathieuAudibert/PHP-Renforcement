<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_likes(): void
{
    try {
        $likedMusics = model_likes(); 
        view_likes($likedMusics);     
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}
