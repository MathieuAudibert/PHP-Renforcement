<?php


require_once dirname(__DIR__, 1) . '\vendor\autoload.php';

use Dotenv\Dotenv;

// J'ai essayé le singleton si ca passe c insane 

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

        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASS'];
        $this->logFile = __DIR__ . '\logs\serv-error.log';

        try {
            $this->conn = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}", 
                $this->user, 
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            die("Erreur de co a la bdd: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    private function logError($message): void {
        error_log("[ " . date("Y-m-d H:i:s") . " ] " . $message, 3, $this->logFile);
    }
}

?>
