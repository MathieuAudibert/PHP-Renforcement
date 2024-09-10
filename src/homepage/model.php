<?php
require_once ('../utils/bdd.php');

class MusiqueModel {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllMusique() {
        $query = $this->db->prepare("SELECT * FROM musiques");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
