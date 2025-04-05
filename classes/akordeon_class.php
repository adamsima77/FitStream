<?php

namespace akordeon;
use database\Database;
require_once "classes/database_con.php";

class Akordeon extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function vypis_akordeon(){
      try {
         $sql = "SELECT otazka, odpoved FROM akordeon";
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