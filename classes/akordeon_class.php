<?php
namespace akordeon;
use database\Database;
require_once dirname(__FILE__) . "/database_con.php";

class Akordeon extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function vypis_Akordeon(){
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


   public function vytvorenieRiadku($otazka,$odpoved){


      try {

         $sql = "INSERT INTO akordeon(
            otazka,odpoved,datum_vytvorenia,datum_upravy
         ) VALUES (?, ?, ?, ?)";
  
       
         $st = $this->conn->prepare($sql);
  
         $st->bindParam(1, $otazka);
         $st->bindParam(2, $odpoved);
     
  
         $datum_vytvorenia = date("Y-m-d H:i:s");
         $datum_upravy = " ";
  
         $st->bindParam(3, $datum_vytvorenia);
         $st->bindParam(4, $datum_upravy);
        
  
         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_akordeon.php");
  
     } catch (Exception $e) {
      session_start();
      $_SESSION['stav'] = "neuspech";
         die("Nastala chyba: " . $e->getMessage());
     } finally {
         $this->conn = null;
     }



   }


   public function editaciaRiadku($id,$otazka,$odpoved){

      if($this->conn == null){


         $this->connect();
         $this->conn = $this->get_connection();

      }

      try{

         $sql = "UPDATE akordeon SET otazka = ?, odpoved = ?, datum_upravy = ? WHERE idakordeon = ? ";
         $datum_editu = date('Y-m-d H:i:s');
         $st = $this->conn->prepare($sql);
         $st->bindParam(1,$otazka);
         $st->bindParam(2,$odpoved);
         $st->bindParam(3,$datum_editu);
         $st->bindParam(4,$id);
         

         $st->execute();

         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_akordeon.php");

      }
      
      catch(Exception $e){
         session_start();
         $_SESSION['stav'] = "neuspech";
         die("Nastala chyba: " . $e->getMessage());
      }
      
      finally{

         $this->conn = null;
      }

   }

   public function vypis_jedneho_Zaznamu($id){

      try {
         $sql = "SELECT otazka,odpoved FROM akordeon WHERE idakordeon = ?";
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


    public function vymazanie_Riadku($id){

      if($this->conn == null){


         $this->connect();
         $this->conn = $this->get_connection();

      }

      try{

         $sql = "DELETE FROM akordeon WHERE idakordeon = ?";
         $st = $this->conn->prepare($sql);
         $st->bindParam(1,$id);
         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_akordeon.php");

      }
      
      catch(Exception $e){
         session_start();
         $_SESSION['stav'] = "neuspech";
         die("Nastala chyba: " . $e->getMessage());
      }
      
      finally{

         $this->conn = null;
      }

      
    }

    public function zobrazenieStavu(){

      if($this->conn == null){


         $this->connect();
         $this->conn = $this->get_connection();

      }

      if(isset($_SESSION['stav']) && $_SESSION['stav'] == "uspech"){


         echo '<div class = "uspech">Akcia bola úspešna.</div>';
       
       
       } else if(isset($_SESSION['stav']) && $_SESSION['stav'] == "neuspech"){
       
       
         echo '<div class = "neuspech">Akcia bola neúspešná.</div>';
       
       }
       
       unset($_SESSION['stav']); 



   }




}
?>