<?php
require_once dirname(__DIR__, 2) . '\utils\bdd.php';
require_once dirname(__DIR__, 2) . '\utils\classes\musique\fabrique.php';

function model_homepage(): array
{
    try {
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');
        $snapshot = $musiqueCollection->documents();
    } catch (Exception $e) {
        echo "Erreur lors de la récupération des musiques : " . $e->getMessage();
        return [];
    }

    if ($snapshot->isEmpty()) {
        echo "Aucune musique trouvée.";
        return [];
    } else {
        echo "Musiques trouvées : " . count($snapshot) . "<br>";
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
            echo "Document ID: " . $document->id() . "<br>";
            echo "Titre: " . $data['titre'] . "<br>";
            echo "Artiste: " . $data['artiste'] . "<br>";
            echo "Album: " . $data['album'] . "<br>";
            echo "Durée: " . $data['duree'] . "<br><br>";
        } else {
            echo "Données manquantes pour ce document : " . $document->id() . "<br>";
        }
    }

    return $result;
}