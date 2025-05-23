<?php
declare(strict_types=1);
namespace FitStream\KategoriaBlog;
use FitStream\Database\Database;
use Exception;

class KategoriaBlog extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function kategoriaBlogVypis(): array{
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }    
       
        try{
            $sql = "SELECT * FROM blog_kategorie ORDER BY datum_upravy DESC;";
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

    public function vytvorenieZaznamu(string $nazov)
    {
        try {
            $sql = "INSERT INTO blog_kategorie(nazov_kategorie_blog) VALUES (?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_kategoria_blog.php");
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
        try {
            $sql = "UPDATE blog SET id_kategorie = NULL WHERE id_kategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $sql = "DELETE FROM blog_kategorie WHERE id_kategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne zmazaný.";
            header("Location: /FitStream/admin/edit_kategoria_blog.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri mazaní záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vypisJednehoZaznamu(int $id): array|false
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
        try {
            $sql = "SELECT * FROM blog_kategorie WHERE id_kategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $zaznam = $st->fetch();
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
            $sql = "UPDATE blog_kategorie SET nazov_kategorie_blog = ? WHERE id_kategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_kategoria_blog.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri úprave záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

   public function pocetProduktov(int $id): int|bool
   {
       if ($this->conn == null) {
           $this->connect();
           $this->conn = $this->getConnection();
       }

       try {
           $sql = "SELECT COUNT(*) as pocet FROM blog WHERE id_kategorie = ?";
           $st = $this->conn->prepare($sql);
           $st->bindParam(1, $id);
           $st->execute();
           $pole = $st->fetch();
           return (int) $pole['pocet'];
       } catch (Exception $e) {
           $_SESSION['neuspech'] = "Nastala chyba";
           return false;
       } finally {
           $this->conn = null;
       }
    }
}
?>