<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/musique/fabrique.php';

function model_homepage(): array
{
    $searchTerm = $_GET['search'] ?? '';

    try {
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');
        $images = $musiqueCollection->documents();
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur de l'import de musiques";
        return [];
    }

    if ($images->isEmpty()) {
        echo "Pas de musiques";
        return [];
    } else {
        echo "";
    }

    $resultats = [];
    foreach ($images as $document) {
        $data = $document->data();
        if (isset($data['titre'], $data['artiste'], $data['album'], $data['cover'], $data['audioSrc'])) {
            if (
                stripos($data['titre'], $searchTerm) !== false ||
                stripos($data['artiste'], $searchTerm) !== false ||
                stripos($data['album'], $searchTerm) !== false
            ) {
                $resultats[] = MusiqueFabrique::createMusique(
                    $data['titre'],
                    $data['artiste'],
                    $data['album'],
                    $data['cover'],
                    $data['audioSrc']
                );
            }
        } else {
            echo "Données manquantes : " . $document->id() . "<br>";
        }
    }

    return $resultats;
}
