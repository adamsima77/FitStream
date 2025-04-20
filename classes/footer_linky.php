<?php
declare(strict_types=1);
namespace footer;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Footer extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function footer_Vypis(): array
    {
        try {
            $sql = "SELECT * FROM footer_ikony";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vytvorenie_Zaznamu(string $ikona, string $farba_bg, string $farba_ikony, string $url): void
    {
        try {
            $sql = "INSERT INTO footer_ikony (ikona, farba_bg, farba_ikony, url) VALUES (?, ?, ?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $ikona);
            $st->bindParam(2, $farba_bg);
            $st->bindParam(3, $farba_ikony);
            $st->bindParam(4, $url);
            $st->execute();

           
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_footer.php");
        } catch (Exception $e) {
           
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypis_jedneho_Zaznamu(int $id): array|false
    {
        try {
            $sql = "SELECT * FROM footer_ikony WHERE idfooter = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            return $st->fetch();
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
            return false;
        } finally {
            $this->conn = null;
        }
    }

    public function editaciaRiadku(int $id, string $ikona, string $farba_pozadia, string $farba_ikony, string $url): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE footer_ikony SET ikona = ?, farba_bg = ?, farba_ikony = ?, url = ? WHERE idfooter = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $ikona);
            $st->bindParam(2, $farba_pozadia);
            $st->bindParam(3, $farba_ikony);
            $st->bindParam(4, $url);
            $st->bindParam(5, $id);
            $st->execute();

           
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_footer.php");
        } catch (Exception $e) {
          
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vymazanieRiadku(int $id): void
    {
        try {
            $sql = "DELETE FROM footer_ikony WHERE idfooter = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();

          
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_footer.php");
        } catch (Exception $e) {
            
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function zobrazenieStavu(): void
    {
        

        if (isset($_SESSION['stav']) && $_SESSION['stav'] === "uspech") {
            echo '<div class="uspech">Akcia bola úspešna.</div>';
        } elseif (isset($_SESSION['stav']) && $_SESSION['stav'] === "neuspech") {
            echo '<div class="neuspech">Akcia bola neúspešná.</div>';
        }

        unset($_SESSION['stav']);
    }

    
}