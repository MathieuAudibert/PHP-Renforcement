<?php
declare(strict_types=1);

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Google\Cloud\Firestore\FirestoreClient;

class Bdd {
    private static ?FirestoreClient $client = null;

    public static function getFirestoreClient(): FirestoreClient{
        $dotEnv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotEnv->load();
        
        try {
            if (self::$client === null) {
                $projectId = $_ENV['PROJECT_ID'];
                self::$client = new FirestoreClient([
                    'projectId' => $projectId
                ]);

                echo "";
            }    
            } catch (Exception $e) {
                error_log(message: $e->getMessage(), message_type: 3, destination: '../utils/logs/serv-error.log');
                echo "Erreur server";
            }
            return self::$client;
        }
}