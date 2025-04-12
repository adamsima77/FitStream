<?php
namespace footer_linky;
use database\Database;
require_once "classes/database_con.php";

class footer_linky extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function footer_vypis(){
      try {
         $sql = "SELECT ikona,farba_bg,farba_ikony,url FROM footer_ikony";
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