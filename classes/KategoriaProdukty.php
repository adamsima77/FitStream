<?php
declare(strict_types=1);
namespace FitStream\KategoriaProdukty;
use FitStream\Database\Database;
use Exception;

class KategoriaProdukty extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function kategoriaProduktyVypis(): array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }    
       
        try{
            $sql = "SELECT * FROM kategorie ORDER BY datum_upravy DESC;";
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

    public function vytvorenieZaznamu(string $nazov, int $id): void
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        
        if ($id == -1) {
            $id = NULL;
        }

        try {
            $sql = "INSERT INTO kategorie(nazov_kategorie,kategorie_idkategorie) VALUES (?,?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2,$id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_kategoria_produkty.php");
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
            $this->conn->beginTransaction();
            
            $sql = "UPDATE kategorie SET kategorie_idkategorie = ? WHERE kategorie_idkategorie = ?";
            $st = $this->conn->prepare($sql);
            $hodnota = NULL;
            $st->bindParam(1, $hodnota);
            $st->bindParam(2, $id);
            $st->execute();

            $sql = "DELETE FROM kategorie_has_produkty WHERE kategorie_idkategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();

            $sql = "DELETE FROM kategorie WHERE idkategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $this->conn->commit();
            $_SESSION['uspech'] = "Záznam bol úspešne zmazaný.";
            header("Location: /FitStream/admin/edit_kategoria_produkty.php");
            exit;
        } catch (Exception $e) {
            $this->conn->rollBack();
            $_SESSION['neuspech'] = "Pri mazaní záznamu nastala chyba." . $e->getMessage();
            header("Location: /FitStream/admin/edit_kategoria_produkty.php");
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
            $sql = "SELECT * FROM kategorie WHERE idkategorie = ?";
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

    public function editaciaRiadku(int $id, string $nazov, int $id_nadkategorie): void
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        if($id_nadkategorie == -1){
            $id_nadkategorie = NULL;
        }

        try {
            $sql = "UPDATE kategorie SET nazov_kategorie = ?, kategorie_idkategorie = ? WHERE idkategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2,$id_nadkategorie);
            $st->bindParam(3, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_kategoria_produkty.php");
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
            $sql = "SELECT COUNT(*) as pocet FROM kategorie_has_produkty WHERE kategorie_idkategorie = ?";
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

    public function vypisNadKategorie(int $id): array|string
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "SELECT kategorie_idkategorie FROM kategorie WHERE idkategorie = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $pole = $st->fetch(); 
            if ($pole['kategorie_idkategorie'] == NULL) {
                return "Žiadna kategória";
            } else{
                $nadkategoria_id = $pole['kategorie_idkategorie'];
                $sql = "SELECT * FROM kategorie WHERE idkategorie = ?";
                $st = $this->conn->prepare($sql);
                $st->bindParam(1, $nadkategoria_id);
                $st->execute();
                return $st->fetch();
            }
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba";
            return false;
        } finally {
            $this->conn = null;
        }
    }
}
?>