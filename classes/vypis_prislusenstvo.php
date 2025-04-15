<?php
namespace vypis_prislusenstvo;
use database\Database;
require_once "classes/database_con.php";

class vypis_prislusenstvo extends Database {

   protected $conn;

   public function __construct(){
      $this->connect();
      $this->conn = $this->get_connection();
   }

   public function vypis_prislusenstvo(){
      try {
         $sql = "SELECT p.idprodukty, p.nazov AS produkt_nazov, 
         k.nazov AS kategoria_nazov, p.popis, p.img_hlavna, p.cena, p.img_alt, hlavny_popis FROM produkty p
         INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty INNER JOIN kategorie k
          ON khp.kategorie_idkategorie = k.idkategorie WHERE k.idkategorie = 2 ORDER BY p.datum_upravy DESC";
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