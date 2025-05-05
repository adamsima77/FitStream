<?php
declare(strict_types=1);
namespace objednavky;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Objednavky extends Database{

    protected $conn;
    private $pole = [];
    private $vysledna_cena = 0;
    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
        $this->inicializaciaKosika();
        
    }
    

   private function inicializaciaKosika(): void
   {


    if (isset($_COOKIE['kosik'])) {
        $this->pole = json_decode($_COOKIE['kosik'], true);
    } else {
        $this->pole = [];
    }


   } 
   private function aktualizaciaKosika(): void
   {
       $data = json_encode($this->pole);
   
       if ($data === false) {
           throw new \Exception('Chyba pri serializácii košíka.');
       }
   
       setcookie('kosik', $data, time() + (86400 * 30), "/");
   }

   public function pridanieDoKosika(int $id, int $pocet_kusov): void{

    if($pocet_kusov > $this->getAktualnyPocetKusov($id)){

         die("Väčší počet produktov ako na sklade.");

    }

    $this->inicializaciaKosika();


      $najdene = false;
      foreach ($this->pole as &$polozka) {
          if ($polozka['id'] === $id) {
              $polozka['pocet_kusov'] += $pocet_kusov;
              $najdene = true;
              break;
          }
      }

       if (!$najdene) {
          $this->pole[] = ['id' => $id, 'pocet_kusov' => $pocet_kusov];
       }

       $this->aktualizaciaKosika();

       header("Location: produkt.php?id=" . $id);
       exit;
   }

   public function velkostKosika(): int{
      
      
      return count($this->pole);

   }

 
    
   public function vypisPoloziek(): array{
    
    if ($this->conn === null) {

        $this->connect();
        $this->conn = $this->getConnection();
        
    }    
    $kosik = [];
    try{
        
     foreach($this->pole as $polozka){
        $sql = "SELECT * FROM produkty WHERE idprodukty = ?;";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$polozka['id']);
        $statement->execute();
        $produkt = $statement->fetch();

        if ($produkt) {
            $produkt['pocet_kusov'] = $polozka['pocet_kusov'];
            $produkt['cena_produktu'] = $produkt['cena'] * $produkt['pocet_kusov'];
            $kosik[] = $produkt;
        }
     }
        return $kosik;
        
    }catch(Exception $e){

        die;

    }
    
   }

   public function vymazanieProduktu(int $id): void
   {
    
    if ($this->conn === null) {

        $this->connect();
        $this->conn = $this->getConnection();
        
    }    
        
        foreach($this->pole as $polozka => $hodnota){

              if($hodnota['id'] === $id){

                  unset($this->pole[$polozka]);
                  break;
              }

        }

        $this->pole = array_values($this->pole);
         $this->aktualizaciaKosika();


   }
   
   
  public function spracovanieUdajov(): void{

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(!empty($_POST['email']) && !empty($_POST['meno']) && !empty($_POST['priezvisko']) && 
          !empty($_POST['telefonne_cislo']) && !empty($_POST['mesto']) && !empty($_POST['ulica'])
          && !empty($_POST['psc']) && !empty($_POST['platba']) && !empty($_POST['doprava'])){
      
              $_SESSION['kosik_email'] = $_POST['email'];
              $_SESSION['kosik_meno'] = $_POST['meno'];
              $_SESSION['kosik_priezvisko'] = $_POST['priezvisko'];
              $_SESSION['kosik_telefonne_cislo'] = $_POST['telefonne_cislo'];
              $_SESSION['kosik_mesto'] = $_POST['mesto'];
              $_SESSION['kosik_ulica'] = $_POST['ulica'];
              $_SESSION['kosik_psc'] = $_POST['psc'];
              $_SESSION['kosik_platba'] = $_POST['platba'];
              $_SESSION['kosik_doprava'] = $_POST['doprava'];
              header("Location: /FitStream/kosik/vypis_udajov.php");
              exit;
      
          } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    die("Zlý formát emailu");

          } else{
      
              die("Prázdne polia.");
        
      }
      
      }


  }

  public function vypisDoprava(): array{

    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT * FROM doprava";
        $st = $this->conn->prepare($sql);
        $st->execute();
        return $st->fetchAll();
    } catch (Exception $e) {
        die("Nastala chyba");
    } finally {
        $this->conn = null;
    }

  }

  public function vypisPlatba(): array{

    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT * FROM platba";
        $st = $this->conn->prepare($sql);
        $st->execute();
        return $st->fetchAll();
    } catch (Exception $e) {
        die("Nastala chyba");
    } finally {
        $this->conn = null;
    }

  }

  public function getPlatba(int $id){

    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT nazov FROM platba WHERE idplatba = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1,$id);
        $st->execute();
        return $st->fetch();
    } catch (Exception $e) {
        die("Nastala chyba");
    } finally {
        $this->conn = null;
    }


  }

  public function getDoprava(int $id){

    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT nazov FROM doprava WHERE iddoprava = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1,$id);
        $st->execute();
        return $st->fetch();
    } catch (Exception $e) {
        die("Nastala chyba");
    } finally {
        $this->conn = null;
    }


  }

  public function ukladanieDoDatabazy(string $email,string $meno, string $priezvisko,
  string $telefonne_cislo, string $mesto, string $ulica, string $psc, int $platba,int $doprava, ?int $id_uzivatela): void{

    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        $sql = "INSERT INTO adresa(mesto,ulica,psc) VALUES(?,?,?);";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$mesto);
        $statement->bindParam(2,$ulica);
        $statement->bindParam(3,$psc);
        $statement->execute();

        $id_adresa = $this->conn->lastInsertId();

        $sql = "INSERT INTO zakaznici(email,meno,priezvisko,telefonne_cislo,id_uzivatelia) VALUES(?,?,?,?,?);";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$email);
        $statement->bindParam(2,$meno);
        $statement->bindParam(3,$priezvisko);
        $statement->bindParam(4,$telefonne_cislo);
        $statement->bindParam(5,$id_uzivatela);
        $statement->execute();

        $id_zakaznik = $this->conn->lastInsertId();
        
        $cena = 0;
        $polozky = $this->vypisPoloziek();
        foreach($polozky as $polozka){

                  $cena += $polozka['cena']  * $polozka['pocet_kusov'];


        }

        $status = "V príprave";
        $sql = "INSERT INTO objednavky(id_adresa, id_platba, id_doprava, id_zakaznici, cena, status) 
        VALUES(?,?,?,?,?,?);";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$id_adresa);
        $statement->bindParam(2,$platba);
        $statement->bindParam(3,$doprava);
        $statement->bindParam(4,$id_zakaznik);
        $statement->bindParam(5,$cena);
        $statement->bindParam(6,$status);
        $statement->execute();

        $id_objednavky = $this->conn->lastInsertId();

        
      

          


    $id_produktu = 0;
    $pocet_ks = 0;
    foreach($polozky as $polozka){
        $id_produktu = (int) $polozka['idprodukty'];
        $pocet_ks = $polozka['pocet_kusov'];
        $sql = "INSERT INTO objednavky_produkty(id_objednavky,id_produkt,mnozstvo) 
        VALUES(?,?,?);";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$id_objednavky);
        $statement->bindParam(2,$id_produktu);
        $statement->bindParam(3,$pocet_ks);
        $statement->execute();

    }


    $update_kusov = $this->pole;
    foreach($update_kusov as $polozka) {

        $id = (int) $polozka['id'];
        $pocet_ks = $polozka['pocet_kusov'];
        $aktualny_pocet_kusov = $this->getAktualnyPocetKusov($id) - $pocet_ks;

        $sql = "UPDATE produkty set pocet_kusov = ? WHERE idprodukty = ?;";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$aktualny_pocet_kusov);
        $statement->bindParam(2,$id);
        $statement->execute();



    }
       

       setcookie('kosik', '', time() - 3600, '/');
       header("Location: uspesna_objednavka.php"); 
       exit;

    }



    } catch (Exception $e) {
        die("Nastala chyba");
    } 


  }

  public function getAktualnyPocetKusov(int $id): int
  {
    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT pocet_kusov FROM produkty WHERE idprodukty = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1,$id);
        $st->execute();
        $kusy = $st->fetch();
        return $kusy['pocet_kusov'];

    } catch (Exception $e) {
        die("Nastala chyba");
    } 

  }

  public function zobrazeniePoctu(): void{
     
    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }
    $pocet_poloziek = $this->velkostKosika();
    if($pocet_poloziek != 0){
          
        echo '<div class = "pocet_poloziek">' . $pocet_poloziek .'</div>';

    }

  }
  public function historiaNakupov(int $id): array {
    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT * FROM objednavky
                INNER JOIN zakaznici ON objednavky.id_zakaznici = zakaznici.id WHERE zakaznici.id_uzivatelia = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
        return $st->fetchAll();

    } catch (Exception $e) {
        die("Nastala chyba pri načítaní histórie");
    }
}

public function historiaProdukty($id): array|bool{
    
    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT id_produkt FROM objednavky_produkty WHERE id_objednavky = ?";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
        $id_pr = $st->fetchAll();

        $array = [];
        foreach ($id_pr as $id_p){

            $id = $id_p['id_produkt'];
            $sql = "SELECT * FROM produkty WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            $produkty = $st->fetch();


            if ($produkty) {
                $array[] = $produkty;
            }

        }

        return $array;

    

    } catch (Exception $e) {
        die("Nastala chyba pri načítaní histórie");
    }




}

public function cenaProduktov(int $id_produktu, int $id_objednavky): float{

    if ($this->conn === null) {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    try {
        $sql = "SELECT mnozstvo FROM objednavky_produkty WHERE id_produkt = ? AND id_objednavky = ?;";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1,$id_produktu);
        $st->bindParam(2,$id_objednavky);
        $st->execute();
        $poc = $st->fetch();

        $pocet = $poc['mnozstvo'];
        
        $sql = "SELECT cena FROM produkty WHERE idprodukty = ?;";
        $st = $this->conn->prepare($sql);
        $st->bindParam(1,$id_produktu);
        $st->execute();
        $cena_pole = $st->fetch();

        $cena = $cena_pole['cena'];

        return $cena * $pocet;


    } catch (Exception $e) {
        die("Nastala chyba");
    } finally {
        $this->conn = null;
    }


    
}



public function getCena(int $id): float{

    if ($this->conn === null) {

        $this->connect();
        $this->conn = $this->getConnection();
        
    }


    try{
        $sql = "SELECT cena FROM produkty WHERE idprodukty = ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        $vysledna_cena = $statement->fetch();
        return (float) $vysledna_cena['cena'];

    } catch(Exception $e) {

        die("Nastala chyba");
    }
     


}

public function overeniePodstranokKosika(): void{

    if(!isset($_COOKIE['kosik'])){

          header("Location: /FitStream/index.php");

    }
}


}