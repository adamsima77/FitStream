<?php
declare(strict_types=1);
namespace FitStream\Akordeon;
use FitStream\Database\Database;
use Exception;

class Akordeon extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function vypisAkordeon(): array
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

    public function vytvorenieRiadku(string $otazka, string $odpoved): void
    {
        try {
            $sql = "INSERT INTO akordeon (otazka,odpoved) VALUES (?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $otazka);
            $st->bindParam(2, $odpoved);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_akordeon.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba pri vytváraní záznamu.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function editaciaRiadku(int $id, string $otazka, string $odpoved): void
    {
        if ($this->conn == null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE akordeon SET otazka = ?, odpoved = ? WHERE idakordeon = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $otazka);
            $st->bindParam(2, $odpoved);
            $st->bindParam(3, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_akordeon.php");
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri úprave záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vypisJednehoZaznamu(int $id): array
    {
        try {
            $sql = "SELECT otazka, odpoved FROM akordeon WHERE idakordeon = ?";
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

    public function vymazanieRiadku(int $id): void
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
            $_SESSION['uspech'] = "Záznam bol úspešne vymazaný.";
            header("Location: /FitStream/admin/edit_akordeon.php");
            exit;

        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri mazaní záznamu nastala chyba.";
            die;

        } finally {
            $this->conn = null;
        }
    }

    public function zobrazenieStavu(): void
    {
        if (isset($_SESSION['uspech'])) {
            echo '<div class="uspech">' . $_SESSION['uspech'] . '</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        }
    }
}
?>