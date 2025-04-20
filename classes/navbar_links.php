<?php
declare(strict_types=1);
namespace navbar;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Navbar extends Database
{
    protected $conn = null;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function navbar_Links(): array
    {
        try {
            $sql = "SELECT * FROM navbar";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vytvorenie_Zaznamu(string $nazov, string $url): void
    {
        try {
            $sql = "INSERT INTO navbar (nazov, url) VALUES (?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $url);
            $st->execute();

           
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_navbar.php");
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
            $sql = "SELECT * FROM navbar WHERE idnavbar = ?";
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

    public function editaciaRiadku(int $id, string $nazov, string $url): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE navbar SET nazov = ?, url = ? WHERE idnavbar = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $url);
            $st->bindParam(3, $id);
            $st->execute();

          
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_navbar.php");
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
            $sql = "DELETE FROM navbar WHERE idnavbar = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();

            
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_navbar.php");
        } catch (Exception $e) {
        
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function zobrazenieStavu(): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

       

        if (isset($_SESSION['stav']) && $_SESSION['stav'] === "uspech") {
            echo '<div class="uspech">Akcia bola úspešná.</div>';
        } elseif (isset($_SESSION['stav']) && $_SESSION['stav'] === "neuspech") {
            echo '<div class="neuspech">Akcia bola neúspešná.</div>';
        }

        unset($_SESSION['stav']);
    }

    public function overenieUzivatela(): void
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_rola'] == 1) {
            echo '<a href="config/logout.php"><i class="fa fa-sign-out" style="font-size: 20px;" id="log"></i></a>';
        } else {
            echo '<a href="login.php"><i class="fa fa-user" style="font-size: 20px;" id="log"></i></a>';
        }
    }

   
}