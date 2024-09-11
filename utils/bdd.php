<?php

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

use Dotenv\Dotenv;

use Google\Cloud\Firestore\FirestoreClient;

class Bdd
{
    private static ?FirestoreClient $client = null;

    public static function getFirestoreClient(): FirestoreClient
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        
        try {
            if (self::$client === null) {
            $projectId = $_ENV['PROJECT_ID'];
            self::$client = new FirestoreClient([
                'projectId' => $projectId
            ]);
            echo "";
            }
        } catch (Exception $e) {
            error_log($e->getMessage(), 3, '../utils/logs/serv-error.log');
            echo "Erreur server";
        }
        return self::$client;
        }
}