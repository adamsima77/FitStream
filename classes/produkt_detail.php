<?php
namespace produkt;
require_once "classes/database_con.php";
use database\Database;

class ProduktDetail extends Database {
    protected $conn;

    public function __construct() {
        $this->connect();
        $this->conn = $this->get_connection();
    }

    public function getProduktById($id) {
        try {
            $sql = "SELECT nazov, popis, img_url, cena, img_alt FROM produkty WHERE idprodukty = :id";
            $st = $this->conn->prepare($sql);
            $st->bindParam(':id', $id, \PDO::PARAM_INT);
            $st->execute();
            return $st->fetch();
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
        } finally {
            $this->conn = null;
        }
    }
}