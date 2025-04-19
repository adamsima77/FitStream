<?php
declare(strict_types=1);
namespace akordeon;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Akordeon extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function vypisAkordeon()
    {
        try {
            $sql = "SELECT * FROM akordeon";
            $st = $this->conn->prepare($sql);
            $st->execute();
            $rs = $st->fetchAll();
            return $rs;
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vytvorenieRiadku($otazka, $odpoved)
    {
        try {
            $sql = "INSERT INTO akordeon(otazka,odpoved,datum_vytvorenia,datum_upravy) VALUES (?, ?, ?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $otazka);
            $st->bindParam(2, $odpoved);
            $datum_vytvorenia = date("Y-m-d H:i:s");
            $datum_upravy = " ";
            $st->bindParam(3, $datum_vytvorenia);
            $st->bindParam(4, $datum_upravy);
            $st->execute();
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_akordeon.php");
        } catch (Exception $e) {
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function editaciaRiadku($id, $otazka, $odpoved)
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE akordeon SET otazka = ?, odpoved = ?, datum_upravy = ? WHERE idakordeon = ?";
            $datum_editu = date('Y-m-d H:i:s');
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $otazka);
            $st->bindParam(2, $odpoved);
            $st->bindParam(3, $datum_editu);
            $st->bindParam(4, $id);
            $st->execute();
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_akordeon.php");
        } catch (Exception $e) {
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypisJednehoZaznamu($id)
    {
        try {
            $sql = "SELECT otazka,odpoved FROM akordeon WHERE idakordeon = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            return $st->fetch();
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
        } finally {
            $this->conn = null;
        }
    }

    public function vymazanieRiadku($id)
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "DELETE FROM akordeon WHERE idakordeon = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_akordeon.php");
            die();

        } catch (Exception $e) {
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());

        } finally {
            $this->conn = null;
        }
    }

    public function zobrazenieStavu()
    {
        if (isset($_SESSION['stav']) && $_SESSION['stav'] == "uspech") {
            echo '<div class = "uspech">Akcia bola úspešna.</div>';
        } elseif (isset($_SESSION['stav']) && $_SESSION['stav'] == "neuspech") {
            echo '<div class = "neuspech">Akcia bola neúspešná.</div>';
        }

        unset($_SESSION['stav']);
    }
}