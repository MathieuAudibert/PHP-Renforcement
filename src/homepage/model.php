<?php
require_once dirname(__DIR__, 2) . '\utils\bdd.php';
require_once dirname(__DIR__, 2) . '\utils\classes\musique\fabrique.php';

function getMusiqueByGenre(string $genre): array
{
    $firestore = getFirestoreClient();
    $musiqueCollection = $firestore->collection('musique');
    $query = $musiqueCollection->where('genre', '=', $genre);
    $snapshot = $query->documents();

    $result = [];
    foreach ($snapshot as $document) {
        $data = $document->data();
        $result[] = MusiqueFabrique::createMusique(
            $data['genre'],
            $data['titre'],
            $data['artiste'],
            $data['album'],
            $data['duree'],
            $data['niveau_acces']
        );
    }

    return $result;
}