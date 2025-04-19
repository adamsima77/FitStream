<?php
namespace database;
use PDO;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/db.php';

class Database {

   private $connection;

   public function __construct(){
      $this->connect();
   }

   protected function connect(){
      $config = DATABASE;
      $options = array(
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      );

      try {
         $this->connection = new PDO('mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . 
         ';port=' . $config['PORT'], $config['USER_NAME'], $config['PASSWORD'], $options);
      } catch (PDOException $e) {
         die($e->getMessage()); 
      }
   }

   public function get_connection(){
      return $this->connection;
   }
}




?>