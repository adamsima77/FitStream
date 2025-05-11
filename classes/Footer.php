<?php
declare(strict_types=1);
namespace FitStream\Footer;
use FitStream\Database\Database;
use Exception;

class Footer extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function footerVypis(): array
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

    public function vytvorenieZaznamu(string $ikona, string $farba_bg, string $farba_ikony, string $url): void
    {
        try {
            $sql = "INSERT INTO footer_ikony (ikona, farba_bg, farba_ikony, url) VALUES (?, ?, ?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $ikona);
            $st->bindParam(2, $farba_bg);
            $st->bindParam(3, $farba_ikony);
            $st->bindParam(4, $url);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_footer.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri vytváraní záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vypisJednehoZaznamu(int $id): array|false
    {
        try {
            $sql = "SELECT * FROM footer_ikony WHERE idfooter = ?";
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
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_footer.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri úprave záznamu nastala chyba.";
            die;
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
            $_SESSION['uspech'] = "Záznam bol úspešne zmazaný.";
            header("Location: /FitStream/admin/edit_footer.php");
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
            echo '<div class="uspech">'. $_SESSION['uspech'] .'</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        }   
    }   
}
?>