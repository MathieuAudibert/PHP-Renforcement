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
        $documents = $musiqueCollection->documents();
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur de l'import de musiques";
        return [];
    }

    if ($documents->isEmpty()) {
        echo "Pas de musiques";
        return [];
    }

    $resultats = [];
    foreach ($documents as $document) {
        $data = $document->data();
        if (isset($data['titre'], $data['artiste'], $data['album'], $data['cover'], $data['audioSrc'])) {
            // Passer l'ID du document à la fabrique
            $resultats[] = MusiqueFabrique::createMusique(
                $document->id(), // ID du document Firestore
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
