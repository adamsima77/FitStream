<?php
namespace slideshow;
use database\Database;
require_once "classes/database_con.php";

class slideshow extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function slideshow_vypis(){
      try {
         $sql = "SELECT img_url FROM slideshow";
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
}
?>