<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_likes(): void
{
    try {
        $likedMusics = model_likes(); // Récupération des musiques likées
        view_likes($likedMusics);     // Affichage de ces musiques dans la vue
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}
