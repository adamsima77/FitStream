<?php
namespace uzivatel;
use database\Database;
require_once "classes/database_con.php";

class Uzivatel extends Database {
    protected $conn;
    protected $rola;

    public function __construct() {
        $this->connect();
        $this->conn = $this->get_connection();
        $this->rola = 1; 
    }

    public function registracia_Uzivatela($meno, $priezvisko, $email, $heslo, $opakovanie_hesla, $datum){
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

          
            $sql = "INSERT INTO uzivatelia (meno, priezvisko, email, heslo, datum_narodenia, rola) VALUES (?, ?, ?, ?, ?, ?)";
            $statement = $this->conn->prepare($sql); 
            $statement->bindParam(1, $meno);
            $statement->bindParam(2, $priezvisko);
            $statement->bindParam(3, $email);
            $statement->bindParam(4, $hashedPassword);
            $statement->bindParam(5, $datum_sql); 
            $statement->bindParam(6, $this->rola); 
            $statement->execute();

        } catch (Exception $e) {
            echo "Chyba pri registrácii: " . $e->getMessage();
        } finally {
            $this->conn = null; 
        }
    }
}
?>