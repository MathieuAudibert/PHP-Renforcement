<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

use Google\Cloud\Firestore\FirestoreClient;

class Bdd
{
    private static ?FirestoreClient $client = null;

    public static function getClient(): FirestoreClient
    {
        if (self::$client === null) {
            $projectId = $_ENV['PROJECT_ID'];
            self::$client = new FirestoreClient([
                'projectId' => $projectId
            ]);
        }
        return self::$client;
    }
}