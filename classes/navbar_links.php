<?php
namespace navbar;
use database\Database;
require_once "classes/database_con.php";

class navbar extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function navbar_links(){
      try {
         $sql = "SELECT nazov, url FROM navbar";
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