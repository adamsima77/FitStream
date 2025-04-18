<?php
namespace navbar;
use database\Database;
require_once dirname(__FILE__) . "/database_con.php";

class Navbar extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function navbar_Links(){
      try {
         $sql = "SELECT * FROM navbar";
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


   public function vytvorenie_Zaznamu($nazov,$url){


      
      try {

         $sql = "INSERT INTO navbar(
           nazov,url
         ) VALUES (?, ?)";
  
       
         $st = $this->conn->prepare($sql);
  
         $st->bindParam(1, $nazov);
         $st->bindParam(2, $url);
        
        
  
         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_navbar.php");
  
     } catch (Exception $e) {
         session_start();
         $_SESSION['stav'] = "neuspech";
         die("Nastala chyba: " . $e->getMessage());
     } finally {
         $this->conn = null;
     }
   }


   public function vypis_jedneho_Zaznamu($id){

      try {
         $sql = "SELECT * FROM navbar WHERE idnavbar = ?";
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

   public function editaciaRiadku($id,$nazov, $url){


      if($this->conn == null){


         $this->connect();
         $this->conn = $this->get_connection();

      }

      try{

         $sql = "UPDATE navbar SET nazov = ?, url = ? WHERE idnavbar = ? ";
         $st = $this->conn->prepare($sql);
         $st->bindParam(1,$nazov);
         $st->bindParam(2,$url);
         $st->bindParam(3,$id);

         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_navbar.php");

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

   public function vymazanie_Riadku($id){

      try{

         $sql = "DELETE FROM navbar WHERE idnavbar = ?;";
         $st = $this->conn->prepare($sql);
         $st->bindParam(1,$id);

         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_navbar.php");

      }catch(Exception $e){

         session_start();
         $_SESSION['stav'] = "neuspech";
         die("Nastala chyba: " . $e -> getMessage());

      }finally{


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