<?php
namespace vypis_hlavna;
use database\Database;
require_once "classes/database_con.php";

class vypis_hlavna extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function vypis_na_hlavnej(){
      try {
         $sql = "SELECT nazov,popis,img_url,cena,img_alt FROM produkty ORDER BY datum_upravy DESC LIMIT 4";
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