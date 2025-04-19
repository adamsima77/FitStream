<?php
declare(strict_types=1);
namespace uzivatel;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Uzivatel extends Database
{
    protected $conn;
    protected int $rola;

    public function __construct()
    {
        session_start();
        $this->connect();
        $this->conn = $this->getConnection();
        $this->rola = 1;
    }

    public function registraciaUzivatela(
        string $meno,
        string $priezvisko,
        string $email,
        string $heslo,
        string $opakovanie_hesla,
        string $datum
    ): void {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            if ($heslo !== $opakovanie_hesla) {
                throw new Exception("Heslá sa nezhodujú.");
            }

            $hashedPassword = password_hash($heslo, PASSWORD_BCRYPT);
            $sql = "SELECT * FROM uzivatelia WHERE email = ? LIMIT 1;";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1, $email);
            $statement->execute();
            $existingUser = $statement->fetch();

            if ($existingUser) {
                throw new Exception("Používateľ s týmto e-mailom už existuje.");
            }

            $datum_sql = date('Y-m-d', strtotime($datum));

            if (!$datum_sql) {
                throw new Exception("Neplatný formát dátumu.");
            }

         
            $sql = "INSERT INTO uzivatelia (meno, priezvisko, email, heslo, datum_narodenia, rola) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1, $meno);
            $statement->bindParam(2, $priezvisko);
            $statement->bindParam(3, $email);
            $statement->bindParam(4, $hashedPassword);
            $statement->bindParam(5, $datum_sql);
            $statement->bindParam(6, $this->rola);
            $statement->execute();

            $_SESSION['stav'] = "uspech";
            header("Location: login.php");
            die();
        } catch (Exception $e) {
            $_SESSION['stav'] = "neuspech";
            header("Location: register.php");
            die("Chyba pri registrácii: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function uzivatelPrihlasenie(string $email, string $heslo): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "SELECT * FROM uzivatelia WHERE email = ? LIMIT 1;";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1, $email);
            $statement->execute();

            $user = $statement->fetch();

            if (!$user) {
                throw new Exception("Užívateľ s týmto emailom neexistuje.");
            }

            if (!password_verify($heslo, $user['heslo'])) {
                throw new Exception("Zle zadané heslo.");
            }

          
            $_SESSION['user_id'] = $user['iduzivatelia'];
            $_SESSION['user_meno'] = $user['meno'];
            $_SESSION['user_priezvisko'] = $user['priezvisko'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_rola'] = $user['rola'];

           
            if ($user['rola'] === 0) {
                header("Location: admin/edit_vyziva.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }
        } catch (Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function odhlasenieUzivatela(): void
    {
        session_unset();
        session_destroy();
        $_SESSION['odhlasenie'] = "odhlaseny";
        header("Location: ../index.php");
        exit();
    }

    public function overenieAdmina(): void
    {
        if (!isset($_SESSION['user_rola']) || !isset($_SESSION['user_id'])) {
            header("Location: ../login.php");
            die();
        }

        if ($_SESSION['user_rola'] === 1) {
            header("Location: index.php");
            die();
        }
    }

    public function getAdmin(): string
    {
        return $_SESSION['user_meno'] . ' ' . $_SESSION['user_priezvisko'];
    }

    public function getadminRola(): string
    {
        return $_SESSION['user_rola'] === 0 ? "Admin" : '';
    }

    public function zobrazenieStavu(): void
    {
        if (isset($_SESSION['stav']) && $_SESSION['stav'] === "uspech") {
            echo '<div class="uspech">Registrácia bola úspešna môžte sa prihlásiť.</div>';
        } elseif (isset($_SESSION['stav']) && $_SESSION['stav'] === "neuspech") {
            echo '<div class="neuspech">Registrácia bola neúspešná.</div>';
        }
        unset($_SESSION['stav']);
    }
}
?>