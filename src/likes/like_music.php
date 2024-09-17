<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once __DIR__ . '/../../utils/bdd.php';

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $musicId = $input['id'];

    try {
        $firestore = Bdd::getFirestoreClient();
        $musiqueCollection = $firestore->collection('Musiques');

        $documentReference = $musiqueCollection->document($musicId);
        $documentSnapshot = $documentReference->snapshot();

        if ($documentSnapshot->exists()) {
            $documentReference->update([
                ['path' => 'liked', 'value' => true]
            ]);
            echo json_encode(['status' => 'success', 'message' => 'Musique likée']);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Musique non trouvée']);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'ID de musique manquant']);
}
?>
