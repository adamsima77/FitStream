<?php
declare(strict_types=1);
namespace platba;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Platba.php';

class Platba extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }


    public function platbaVypis(): array{
    
        if ($this->conn === null) {
    
            $this->connect();
            $this->conn = $this->getConnection();
            
        }    
       
        try{
            
        
            $sql = "SELECT * FROM platba;";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $rs = $statement->fetchAll();
    
            return $rs;
            
        }catch(Exception $e){
    
            die;
    
        } finally{

            $this->conn = null;
        }
        
}

public function zobrazenieStavu()
{
    if (isset($_SESSION['uspech'])) {
        echo '<div class = "uspech">' . $_SESSION['uspech'] . '</div>';
        unset($_SESSION['uspech']);
    } elseif (isset($_SESSION['neuspech'])) {
        echo '<div class = "neuspech">'. $_SESSION['neuspech'] .'</div>';
        unset($_SESSION['neuspech']);
    }

  
}

public function vytvorenieZaznamu(string $nazov)
{
    try {
        $sql = "INSERT INTO platba(nazov) VALUES (?)";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1, $nazov);
        $st->execute();
        $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
        header("Location: /FitStream/admin/edit_platba.php");
        exit;
    } catch (Exception $e) {
        $_SESSION['neuspech'] = "Nastala chyba pri vytváraní záznamu.";
        die;
    } finally {
        $this->conn = null;
    }
}

public function vymazanieZaznamu(int $id)
{
    if ($this->conn == null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "DELETE FROM platba WHERE idplatba = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
        $_SESSION['uspech'] = "Záznam bol úspešne vymazaný.";
        header("Location: /FitStream/admin/edit_platba.php");
        exit;

    } catch (Exception $e) {
        $_SESSION['neuspech'] = "Pri mazaní záznamu nastala chyba.";
        die;

    } finally {
        $this->conn = null;
    }
}


public function vypisJednehoZaznamu(int $id)
{
    try {
        $sql = "SELECT nazov FROM platba WHERE idplatba = ?";
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

public function editaciaRiadku(int $id, string $nazov)
{
    if ($this->conn == null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "UPDATE platba SET nazov = ? WHERE idplatba = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1, $nazov);
        $st->bindParam(2, $id);
        $st->execute();
        $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
        header("Location: /FitStream/admin/edit_platba.php");
        exit;
    } catch (Exception $e) {
        $_SESSION['neuspech'] = "Pri úprave záznamu nastala chyba.";
        die;
    } finally {
        $this->conn = null;
    }
}

}