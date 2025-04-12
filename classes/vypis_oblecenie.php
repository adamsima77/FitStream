<?php
namespace vypis_oblecenie;
use database\Database;
require_once "classes/database_con.php";

class vypis_oblecenie extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function vypis_oblecenie(){
      try {
         $sql = "SELECT nazov,popis,img_url,cena,img_alt FROM produkty WHERE kategorie_idkategorie = 3 ORDER BY datum_upravy";
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