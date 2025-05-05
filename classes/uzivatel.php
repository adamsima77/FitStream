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
                $_SESSION['neuspech'] = "Heslá sa nezhodujú.";
                header("Location: /FitStream/register.php");
                die;
            }

            $hashedPassword = password_hash($heslo, PASSWORD_BCRYPT);
            $sql = "SELECT * FROM uzivatelia WHERE email = ? LIMIT 1;";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1, $email);
            $statement->execute();
            $existingUser = $statement->fetch();

            if ($existingUser) {
                $_SESSION['neuspech'] = "Používateľ s týmto e-mailom už existuje.";
                header("Location: /FitStream/register.php");
                die;
            }

            $overeny_datum = $this->overenieDatumu($datum);

            

         
            $sql = "INSERT INTO uzivatelia (meno, priezvisko, email, heslo, datum_narodenia, rola) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1, $meno);
            $statement->bindParam(2, $priezvisko);
            $statement->bindParam(3, $email);
            $statement->bindParam(4, $hashedPassword);
            $statement->bindParam(5, $overeny_datum);
            $statement->bindParam(6, $this->rola);
            $statement->execute();

            $_SESSION['uspech'] = "Boli ste úspešne registrovaní môžete sa prihlásiť.";
            header("Location: login.php");
            exit;
        } catch (Exception $e) {

             
            $_SESSION['neuspech'] = "Nastala chyba pri registrácii.";
            header("Location: register.php");
            die;
            
           
            
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
                $_SESSION['neuspech'] = "Užívateľ s týmto e-mailom neexistuje.";
                header("Location: /FitStream/login.php");
                die;
            }

            if (!password_verify($heslo, $user['heslo'])) {
                $_SESSION['neuspech'] = "Zle zadané heslo.";
                header("Location: /FitStream/login.php");
                die;
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
            $_SESSION['neuspech'] = "Nastala chyba pri prihlasovaní.";
            header("Location: /FitStream/login.php");
            die;
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
        exit;
    }

    public function overenieAdmina(): void
    {
        if (!isset($_SESSION['user_rola']) || !isset($_SESSION['user_id'])) {
            header("Location: ../login.php");
            die;
        }

        if ($_SESSION['user_rola'] === 1) {
            header("Location: index.php");
            die;
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
        if (isset($_SESSION['uspech'])) {
            echo '<div class="uspech">'. $_SESSION['uspech'] .'</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        }
        
    }

    private function overenieDatumu(string $datum): string{

        // Použitie prefixu \ pretože namespace užívateľ nemá objekt datetime
        try {
            $datumNarodenia = new \DateTime($datum);
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Neplatný formát dátumu.";
            header("Location: /FitStream/register.php");
            die;
        }
    
        if ($datumNarodenia->diff(new \DateTime())->y < 18) {
            $_SESSION['neuspech'] = "Vek pod 18 rokov !";
            header("Location: /FitStream/register.php");
            die;
        }
    
        return $datum;

    }


    public function overenieNastavenia(int $id_uzivatela, int $id_url): void{

           if($id_uzivatela != $id_url){

             header("Location: /FitStream/nastavenia/nastavenia.php?id=$id_uzivatela");
             exit;


           } 

    }

    public function vymazatUcet(int $id): void
{

  if ($this->conn === null) {

      $this->connect();
      $this->conn = $this->getConnection();
      
  }

  try{
      $sql = "DELETE FROM uzivatelia WHERE iduzivatelia = ?;";
               
      $statement = $this->conn->prepare($sql);
      $statement->bindParam(1,$id);
      $statement->execute();

      session_unset();
      session_destroy();
      header("Location: /FitStream/index.php");
      exit;


  } catch(Exception $e) {

      die;
  }

}
 

  public function editaciaUzivatela(string $email,string $meno,string $priezvisko, int $id): void
  {

    if ($this->conn === null) {

        $this->connect();
        $this->conn = $this->getConnection();
        
    }
  
    try{
        $sql = "UPDATE uzivatelia SET email = ?, meno = ?, priezvisko = ? WHERE iduzivatelia = ?;";
                 
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$email);
        $statement->bindParam(2,$meno);
        $statement->bindParam(3,$priezvisko);
        $statement->bindParam(4,$id);
        $statement->execute();
        header("Location: /FitStream/nastavenia/nastavenia.php?id=" . $_SESSION['user_id']);
  
        exit;
  
  
    } catch(Exception $e) {
  
        die;
    }


  }

  public function vypisUzivatela(int $id):array
  {
    if ($this->conn === null) {

        $this->connect();
        $this->conn = $this->getConnection();
        
    }
  
    try{
        $sql = "SELECT email,meno,priezvisko FROM uzivatelia WHERE iduzivatelia = ?";
                 
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetch();
        exit;
  
  
    } catch(Exception $e) {
  
        die;
    }


  }

}




?>