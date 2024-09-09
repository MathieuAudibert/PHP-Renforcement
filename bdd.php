<?php
require_once('./cred.env');

$host = $_ENV['DB_HOST'];
$port = 5432;
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

try {
    $bdd = new PDO("pgsql:host={$host};port=5432;dbname={$dbname}, {$user}, {$password}");
} catch (PDOException $e) {
    echo $e->getMessage();
    echo "Pas connecté ";
}
return $bdd;

?>