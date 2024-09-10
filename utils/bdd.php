<?php

declare(strict_types=1);

require_once ('../.env');

class Database {
    private static ?Database $instance = null;
    private PDO $connexion;

    private function __construct() {
        global $host, $user, $dbname, $dbpassword;
        try {
            $this->connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbpassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            die("Erreur de conexion: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connexion;
    }
}
?>
