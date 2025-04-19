<?php
declare(strict_types=1);
namespace slideshow;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Slideshow extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function slideshow_vypis(): array
    {
        try {
            $sql = "SELECT img_url FROM slideshow";
            $st = $this->conn->prepare($sql);
            $st->execute();

            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }
}
