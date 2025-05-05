<?php
require_once("_inc/classes/Database.php");
class wood {
    private $db;
    public function __construct() {
        $db = new Database();
        $this->db = $db->getConnection();
    }

    public function getWoodTypes() {
        $stmt = $this->db->query("SELECT * FROM wood_types");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNastroje(){
        $stmt = $this->db->query("SELECT * FROM nastroje");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}