<?php

require_once dirname(__DIR__, 1) . '\vendor\autoload.php';


class Database
{
    private static $instance = null;
    private $conn;

    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    private $logFile;

    private function __construct()
    {
        $this->host = "localhost";
        $this->port = "5432";
        $this->dbname = "postgres";
        $this->user = "postgres";
        $this->pass = "unitywebaudiora";
        $this->logFile = "/utils/logs/serv-error.log";

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

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    private function logError($message): void
    {
        error_log("[ " . date("Y-m-d H:i:s") . " ] " . $message, 3, $this->logFile);
    }
}
