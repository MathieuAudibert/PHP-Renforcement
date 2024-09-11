<?php
require_once dirname(__DIR__, 2) . '/utils/bdd.php';
require_once dirname(__DIR__, 2) . '/utils/classes/musique/fabrique.php';

function model_homepage(): array
{
    try {
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');
        $snapshot = $musiqueCollection->documents();
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '../../utils/logs/errors.log');
        echo "Erreur de l'import de musiques";
        return [];
    }

    if ($snapshot->isEmpty()) {
        echo "Pas de musiques";
        return [];
    } else {
        echo "";
    }

    $result = [];
    foreach ($snapshot as $document) {
        $data = $document->data();
        if (isset($data['titre'], $data['artiste'], $data['album'], $data['duree'])) {
            $result[] = MusiqueFabrique::createMusique(
                $data['titre'],
                $data['artiste'],
                $data['album'],
                $data['duree']
            );
        } else {
            echo "Donnes manquantes : " . $document->id() . "<br>";
        }
    }

    return $result;
}
