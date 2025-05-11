<?php
declare(strict_types=1);
namespace doprava;
use database\Database;
use Exception;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Database.php';

class Doprava extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function dopravaVypis(): array
    {    
        if ($this->conn === null) {
    
            $this->connect();
            $this->conn = $this->getConnection();
            
        }    
       
        try{
            $sql = "SELECT * FROM doprava;";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $rs = $statement->fetchAll();
            return $rs;
        } catch(Exception $e){
    
            die;
    
        } finally{

            $this->conn = null;
        }
    }

    public function zobrazenieStavu(): void
    {
        if (isset($_SESSION['uspech'])) {
            echo '<div class = "uspech">' . $_SESSION['uspech'] . '</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class = "neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        }

  
    }

    public function vytvorenieZaznamu(string $nazov): void
    {
        try {
            $sql = "INSERT INTO doprava(nazov) VALUES (?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_doprava.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba pri vytváraní záznamu.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vymazanieZaznamu(int $id): void
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "DELETE FROM doprava WHERE iddoprava = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vymazaný.";
            header("Location: /FitStream/admin/edit_doprava.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri mazaní záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vypisJednehoZaznamu(int $id): array
    {
        try {
            $sql = "SELECT nazov FROM doprava WHERE iddoprava = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $zaznam =  $st->fetch();
            if(empty($zaznam)){
                $_SESSION['neuspech'] = "Tento záznam neexistuje";
                header("Location: /FitStream/config/error.php");
                exit;
            } else{
                return $zaznam;
            }
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
        } finally {
            $this->conn = null;
        }
    }

    public function editaciaRiadku(int $id, string $nazov): void
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE doprava SET nazov = ? WHERE iddoprava = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_doprava.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri úprave záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }
}
?>