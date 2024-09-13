<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/musique/fabrique.php';

function model_likes(): array
{
    try {
        $firestore = Bdd::getFirestoreClient();
        // Requête pour récupérer uniquement les musiques qui sont likées
        $musiqueCollection = $firestore->collection('Musiques');
        $likedMusics = $musiqueCollection->where('liked', '=', true)->documents();
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur de l'import des musiques likées";
        return [];
    }

    if ($likedMusics->isEmpty()) {
        echo "Aucune musique likée.";
        return [];
    }

    $resultats = [];
    foreach ($likedMusics as $document) {
        $data = $document->data();
        if (isset($data['titre'], $data['artiste'], $data['album'], $data['cover'], $data['audioSrc'])) {
            // Ajout de l'ID du document à la création de la musique
            $resultats[] = MusiqueFabrique::createMusique(
                $document->id(),   // Ajout de l'ID du document Firestore
                $data['titre'],
                $data['artiste'],
                $data['album'],
                $data['cover'],
                $data['audioSrc']
            );
        } else {
            echo "Données manquantes pour la musique ID : " . $document->id() . "<br>";
        }
    }

    return $resultats;
}
