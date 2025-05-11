<?php
declare(strict_types=1);
namespace FitStream\Navbar;
use FitStream\Database\Database;
use Exception;

class Navbar extends Database
{
    protected $conn = null;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function navbarLinks(): array
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

    public function vytvorenieZaznamu(string $nazov, string $url): void
    {
        try {
            $sql = "INSERT INTO navbar(nazov,url) VALUES (?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $url);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_navbar.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri vytváraní záznamu nastala chyba";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vypisJednehoZaznamu(int $id): array|bool
    {
        try {
            $sql = "SELECT * FROM navbar WHERE idnavbar = ?";
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
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_navbar.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba pri úprave záznamu.";
            die;
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
            $_SESSION['uspech'] = "Záznam bol úspešne zmazaný.";
            header("Location: /FitStream/admin/edit_navbar.php");
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
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
        if (isset($_SESSION['uspech'])) {
            echo '<div class="uspech">'. $_SESSION['uspech'] .'</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        }
    }

    public function overenieUzivatela(): void
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_rola'] == 1) {
            echo '<a href="' . BASE_URL . 'config/logout.php"style="font-size: 20px;" ><i class="fa fa-sign-out"></i></a>';

            echo '<a href="' . BASE_URL . 'nastavenia/nastavenia.php?id=' . $_SESSION['user_id'] . '"><i class="fa fa-gear"></i></a>';
        } else if (isset($_SESSION['user_id']) && $_SESSION['user_rola'] == 0) {
            echo '<a href="' . BASE_URL . 'nastavenia/nastavenia.php?id=' . $_SESSION['user_id'] . '"><i class="fa fa-gear"></i></a>';
        } else {
            echo '<a href="' . BASE_URL . 'login.php"><i class="fa fa-user" style="font-size: 20px;" id="log"></i></a>';
        }
    }

    public function navratDoAdmina(): void
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_rola'] == 0) {
            echo '<a href="' . BASE_URL . 'admin/edit_vyziva.php">Admin</a>';
        }
    }
}
?>