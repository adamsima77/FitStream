<?php
declare(strict_types=1);
namespace produkt;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Produkt extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function vypis_vyziva(): array
    {
        try {
            $sql = "SELECT * FROM produkty p
                    INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty
                    INNER JOIN kategorie k ON khp.kategorie_idkategorie = k.idkategorie
                    WHERE k.idkategorie = 3
                    ORDER BY p.datum_upravy DESC";

            $st = $this->conn->prepare($sql);
            $st->execute();

            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vypisHlavna(): array
    {
        try {
            $sql = "SELECT idprodukty, nazov, popis, cena, img_hlavna, img_alt, hlavny_popis
                    FROM produkty
                    ORDER BY datum_upravy DESC
                    LIMIT 4";

            $st = $this->conn->prepare($sql);
            $st->execute();

            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vypisOblecenie(): array
    {
        try {
            $sql = "SELECT p.idprodukty, p.nazov AS produkt_nazov, 
                           k.nazov AS kategoria_nazov, p.popis, p.img_hlavna,
                           p.cena, p.img_alt, hlavny_popis
                    FROM produkty p
                    INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty
                    INNER JOIN kategorie k ON khp.kategorie_idkategorie = k.idkategorie
                    WHERE k.idkategorie = 1
                    ORDER BY p.datum_upravy DESC";

            $st = $this->conn->prepare($sql);
            $st->execute();

            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vypisPrislusentvo(): array
    {
        try {
            $sql = "SELECT p.idprodukty, p.nazov AS produkt_nazov, 
                           k.nazov AS kategoria_nazov, p.popis, p.img_hlavna,
                           p.cena, p.img_alt, hlavny_popis
                    FROM produkty p
                    INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty
                    INNER JOIN kategorie k ON khp.kategorie_idkategorie = k.idkategorie
                    WHERE k.idkategorie = 2
                    ORDER BY p.datum_upravy DESC";

            $st = $this->conn->prepare($sql);
            $st->execute();

            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function produktDetail(int $id): array|false
    {
        try {
            $sql = "SELECT nazov, popis, img_hlavna, cena, img_alt, hlavny_popis
                    FROM produkty
                    WHERE idprodukty = ?";

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

    public function vytvorenieProduktu(
        string $nazov,
        string $znacka,
        string $popis_produktu,
        string $klucovy_popis,
        float $cena,
        int $pocet_kusov,
        string $velkost,
        string $farba,
        string $img,
        string $img_popis,
        int $kategoria,
        int $podkategoria
    ): void {

        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "INSERT INTO produkty (
                        nazov, znacka, popis, cena, pocet_kusov,
                        velkost, farba, datum_vytvorenia, datum_upravy,
                        img_hlavna, img_alt, hlavny_popis
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $st = $this->conn->prepare($sql);

            $datum_vytvorenia = date("Y-m-d H:i:s");
            $datum_upravy = " ";

            $st->bindParam(1, $nazov);
            $st->bindParam(2, $znacka);
            $st->bindParam(3, $popis_produktu);
            $st->bindParam(4, $cena);
            $st->bindParam(5, $pocet_kusov);
            $st->bindParam(6, $velkost);
            $st->bindParam(7, $farba);
            $st->bindParam(8, $datum_vytvorenia);
            $st->bindParam(9, $datum_upravy);
            $st->bindParam(10, $img);
            $st->bindParam(11, $img_popis);
            $st->bindParam(12, $klucovy_popis);
            $st->execute();

             
            
            $produktID= $this->conn->lastInsertId();
            $sql_1 = "INSERT INTO kategorie_has_produkty VALUES(?,?);";
            $statement = $this->conn->prepare($sql_1);
            $statement->bindParam(1,$kategoria);
            $statement->bindParam(2,$produktID);
            $statement->execute();

            $sql_2 = "INSERT INTO kategorie_has_produkty VALUES(?,?);";
            $statement = $this->conn->prepare($sql_1);
            $statement->bindParam(1,$podkategoria);
            $statement->bindParam(2,$produktID);
            $statement->execute();

            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_vyziva.php");

        } catch (Exception $e) {
            $_SESSION['stav'] = "neuspech";
            header("Location: /FitStream/admin/edit_vyziva.php");
            die("Nastala chyba: " . $e->getMessage());
        } finally {
           
        }
    }

    public function spracovanieFotky(): string
    {
        if (isset($_POST['submit'])) {
            
            $subor = $_FILES['foto'];
            $nazov_suboru = $_FILES['foto']['name'];
            $docasna_adresa = $_FILES['foto']['tmp_name'];
            $velkost_suboru = $_FILES['foto']['size'];
            $chyba_suboru = $_FILES['foto']['error'];
            $typ_suboru = $_FILES['foto']['type'];

            $nazov_kon = explode('.',$nazov_suboru);
            $upravena_kon = strtolower(end($nazov_kon));

            $nazov = basename($nazov_suboru);

            $povolene_kon = ['jpeg','jpg','png','webp'];
            if (in_array($upravena_kon,$povolene_kon)) {
                if ($chyba_suboru === 0) {
                    if ($velkost_suboru <= 3145728) {
                        $relativna_cesta = 'img/produkty/' . $nazov;
                        $absolutna_cesta = $_SERVER['DOCUMENT_ROOT'] . '/FitStream/' . $relativna_cesta;
                        move_uploaded_file($docasna_adresa, $absolutna_cesta);
                        return $relativna_cesta;           

                    } else {
                        
                        die("Fotka je veľmi veľká povolená velkosť je 3MB.");


                    }




                } else {

                    die("Nastala chyba pri nahrávaní súboru.");


                }
                
            } else {

                die("Nepovolená koncovka používajte len jpeg, jpg, png, webp.");


            }


        }



    }


    public function vypisProduktyAdmin() : array{
        try {
            $sql = "SELECT * FROM produkty ORDER BY datum_vytvorenia DESC";

            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
            
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }    

    public function vymazanieRiadku(int $id): void
    {
        try {

            $sql_1 = "DELETE FROM kategorie_has_produkty WHERE produkty_idprodukty = ?";
            $statement = $this->conn->prepare($sql_1);
            $statement->bindParam(1, $id);
            $statement->execute();

            $sql = "DELETE FROM produkty WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();

          
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_vyziva.php");
        } catch (Exception $e) {
            
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypisKategorie() : array
    {
        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }    

        try {
            $sql = "SELECT idkategorie,nazov FROM kategorie WHERE kategorie_idkategorie IS NULL;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            
            return $st->fetchAll();


        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {

            $this->conn = null;
        }



    }

    public function spracovanieKategorii($id): array {

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }    
       
        try {
        
        $kategorie = []; 
        $podkategorie = []; 
        $sql = "SELECT nazov FROM kategorie 
               INNER JOIN kategorie_has_produkty ON kategorie.idkategorie = kategorie_has_produkty.kategorie_idkategorie
               WHERE kategorie.kategorie_idkategorie IS NULL AND
               kategorie_has_produkty.produkty_idprodukty = ?;";

        $st = $this->conn->prepare($sql);
        $st->bindParam(1,$id);
        $st->execute();
        $kategoria = $st->fetch();

        $sql_1 = "SELECT nazov FROM kategorie 
               INNER JOIN kategorie_has_produkty ON kategorie.idkategorie = kategorie_has_produkty.kategorie_idkategorie
               WHERE kategorie.kategorie_idkategorie IS NOT NULL AND
               kategorie_has_produkty.produkty_idprodukty = ?;";

        
        $st = $this->conn->prepare($sql_1);
        $st->bindParam(1,$id);
        $st->execute();
        $podkategoria = $st->fetch();
        
        return ['kategorie' => $kategoria, 'podkategorie' => $podkategoria,];

    } catch(Exception $e){

        die("Nastala chyba: " . $e->getMessage());

    } finally {

          $this->conn = null;

    }
    }

    public function zobrazenieStavu(): void
    {
        

        if (isset($_SESSION['stav']) && $_SESSION['stav'] === "uspech") {
            echo '<div class="uspech">Akcia bola úspešna.</div>';
        } elseif (isset($_SESSION['stav']) && $_SESSION['stav'] === "neuspech") {
            echo '<div class="neuspech">Akcia bola neúspešná.</div>';
        }

        unset($_SESSION['stav']);
    }


    public function editaciaRiadku(
    int $id,
    string $nazov,
    string $znacka,
    string $popis_produktu,
    string $klucovy_popis,
    float $cena,
    int $pocet_kusov,
    string $velkost,
    string $farba,
    string $img,
    string $img_popis,
    int $kategoria): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql_1 = "UPDATE kategorie_has_produkty SET kategorie_idkategorie = ? WHERE produkty_idprodukty = ?;";
            $st = $this->conn->prepare($sql_1);
            $st->bindParam(1,$kategoria);
            $st->bindParam(2,$id);
            $st->execute();


            $sql = "UPDATE produky SET 
            nazov = ?, 
            znacka = ?, 
            popis_produktu = ?, 
            cena = ?, 
            pocet_kusov = ?, 
            velkost = ?, 
            farba = ?, 
            datum_editu = ?, 
            img = ?, 
            img_popis = ?, 
            klucovy_popis = ? 
            WHERE idprodukty = ?";

            $st = $this->conn->prepare($sql);
            $datum_editu = date('Y-m-d H:i:s');

            $st->bindParam(1, $nazov);
            $st->bindParam(2, $znacka);
            $st->bindParam(3, $popis_produktu);
            $st->bindParam(4, $cena);
            $st->bindParam(5, $pocet_kusov);
            $st->bindParam(6, $velkost);
            $st->bindParam(7, $farba);
            $st->bindParam(8, $datum_editu);
            $st->bindParam(9, $img);
            $st->bindParam(10, $img_popis);
            $st->bindParam(11, $klucovy_popis);
            $st->bindParam(12,$id);
            $st->execute();

          
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_navbar.php");
        } catch (Exception $e) {
            
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }


    public function vypisJednehoZaznamu(int $id): array|false
    {

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }    
        try {
            $sql = "SELECT * FROM produkty WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            return $st->fetch();
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
            return false;
        } finally {
            $this->conn = null;
        }
    }
    
    public function vypisKategorieHasProdukty($id) : array|false {
        
        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }
        
        try {
            $sql = "SELECT * FROM kategorie_has_produkty WHERE produkty_idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            return $st->fetch();


        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
            return false;
        } finally {
            $this->conn = null;
        }
    


    }

    public function vypisPodKategorie() : array
    {
        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }    

        try {
            $sql = "SELECT idkategorie,nazov FROM kategorie WHERE kategorie_idkategorie IS NOT NULL;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            
            return $st->fetchAll();


        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {

            $this->conn = null;
        }



    }


}