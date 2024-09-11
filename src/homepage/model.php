<?php
require_once dirname(__DIR__, 2) . '\utils\bdd.php';
require_once dirname(__DIR__, 2) . '\utils\classes\musique\fabrique.php';

function model_homepage(): array
{
    $firestore = getFirestoreClient();
    $musiqueCollection = $firestore->collection('Musiques');
    $snapshot = $musiqueCollection->documents(); 

    $result = [];
    foreach ($snapshot as $document) {
        $data = $document->data();
        $result[] = MusiqueFabrique::createMusique(
            $data['titre'],
            $data['artiste'],
            $data['album'],
            $data['duree']
        );
    }

    return $result;
}
