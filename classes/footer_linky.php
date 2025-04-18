<?php
namespace footer;
use database\Database;
require_once dirname(__FILE__) . "/database_con.php";

class Footer extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function footer_Vypis(){
      try {
         $sql = "SELECT * FROM footer_ikony";
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

   public function vytvorenie_Zaznamu($ikona,$farba_bg,$farba_ikony,$url){


      
      try {

         $sql = "INSERT INTO footer_ikony(
           ikona,farba_bg,farba_ikony,url
         ) VALUES (?, ?, ?, ?)";
  
       
         $st = $this->conn->prepare($sql);
  
         $st->bindParam(1, $ikona);
         $st->bindParam(2, $farba_bg);
         $st->bindParam(3, $farba_ikony);
         $st->bindParam(4, $url);
        
  
         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_footer.php");
  
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
         $sql = "SELECT * FROM footer_ikony WHERE idfooter = ?";
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

   public function editaciaRiadku($id,$ikona, $farba_pozadia,  $farba_ikony,  $url){


      if($this->conn == null){


         $this->connect();
         $this->conn = $this->get_connection();

      }

      try{

         $sql = "UPDATE footer_ikony SET ikona = ?, farba_bg = ?, farba_ikony = ?, url = ? WHERE idfooter = ? ";
         $datum_editu = date('Y-m-d H:i:s');
         $st = $this->conn->prepare($sql);
         $st->bindParam(1,$ikona);
         $st->bindParam(2,$farba_pozadia);
         $st->bindParam(3,$farba_ikony);
         $st->bindParam(4,$url);
         $st->bindParam(5,$id);
         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_footer.php");

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

         $sql = "DELETE FROM footer_ikony WHERE idfooter = ?;";
         $st = $this->conn->prepare($sql);
         $st->bindParam(1,$id);

         $st->execute();
         session_start();
         $_SESSION['stav'] = "uspech";
         header("Location: edit_footer.php");

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