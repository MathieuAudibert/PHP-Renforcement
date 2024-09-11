<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

class Database {
    private static $instance = null;
    private $conn;

    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    private $logFile;

    private function __construct() {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
    
        $this->host = $_ENV['DB_HOST'] ?? 'localhost';
        $this->port = $_ENV['DB_PORT'] ?? '3306';
        $this->dbname = $_ENV['DB_DATABASE'] ?? 'audiora';
        $this->user = $_ENV['DB_USERNAME'] ?? 'root';
        $this->pass = $_ENV['DB_PASSWORD'] ?? '';
        $this->logFile = dirname(__DIR__) . '/logs/serv-error.log';
    
        echo 'Host: ' . htmlspecialchars($this->host) . '<br>';
        echo 'Port: ' . htmlspecialchars($this->port) . '<br>';
        echo 'Database: ' . htmlspecialchars($this->dbname) . '<br>';
        echo 'User: ' . htmlspecialchars($this->user) . '<br>';
        echo 'Password: ' . htmlspecialchars($this->pass) . '<br>';
    
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}", 
                $this->user, 
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->conn;
    }

    private function logError(string $message): void {
        error_log("[ " . date("Y-m-d H:i:s") . " ] " . $message . PHP_EOL, 3, $this->logFile);
    }
}

?>
