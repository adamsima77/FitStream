<?php
declare(strict_types=1);
namespace FitStream\Produkt;
use FitStream\Database\Database;

class Produkt extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function vypis_vyziva(): array|bool
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }  

        try {
            $sql = "SELECT * FROM produkty p
                    INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty
                    INNER JOIN kategorie k ON khp.kategorie_idkategorie = k.idkategorie
                    WHERE k.idkategorie = 3 AND p.vymazane = 0
                    ORDER BY p.datum_upravy DESC";
            $st = $this->conn->prepare($sql);
            $st->execute();
            $produkt =  $st->fetchAll();
            if(empty($produkt)){
            $_SESSION['neuspech'] = "Žiadne produkty";
            return false;
            exit;
            } else{
                return $produkt;
            }
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
                    WHERE vymazane = 0
                    ORDER BY datum_upravy DESC
                    LIMIT 5";
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
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();    
        }    

        try {
            $sql = "SELECT p.idprodukty, p.nazov, 
                    k.nazov_kategorie AS kategoria_nazov, p.popis, p.img_hlavna,
                    p.cena, p.img_alt, hlavny_popis
                    FROM produkty p
                    INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty
                    INNER JOIN kategorie k ON khp.kategorie_idkategorie = k.idkategorie
                    WHERE k.idkategorie = 1 AND p.vymazane = 0
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
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();   
        }   

        try {
            $sql = "SELECT p.idprodukty, p.nazov, 
                    k.nazov_kategorie AS kategoria_nazov, p.popis, p.img_hlavna,
                    p.cena, p.img_alt, hlavny_popis
                    FROM produkty p
                    INNER JOIN kategorie_has_produkty khp ON p.idprodukty = khp.produkty_idprodukty
                    INNER JOIN kategorie k ON khp.kategorie_idkategorie = k.idkategorie
                    WHERE k.idkategorie = 2 AND p.vymazane = 0
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

    public function produktDetail(int $id): array
    {
         if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();   
         }   

        try {
            $sql = "SELECT nazov, popis, img_hlavna, cena, img_alt, hlavny_popis, vymazane
                    FROM produkty
                    WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $produkt = $st->fetch();
            if(empty($produkt)){
                $_SESSION['neuspech'] = "Tento produkt neexistuje";
                header("Location: /FitStream/config/error.php");
                exit;               
            } else{
                return $produkt;
            }
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
        } finally {
            $this->conn = null;
        }
    }

    public function vytvorenieProduktu(string $nazov, string $znacka, string $popis_produktu, string $klucovy_popis,
                                       float $cena, int $pocet_kusov, string $img, 
                                       string $img_popis, int $kategoria, int $podkategoria): void 
    {

        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $this->conn->beginTransaction();
            $sql = "INSERT INTO produkty (
                    nazov, znacka, popis, cena, pocet_kusov,
                    img_hlavna, img_alt, hlavny_popis
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $znacka);
            $st->bindParam(3, $popis_produktu);
            $st->bindParam(4, $cena);
            $st->bindParam(5, $pocet_kusov);
            $st->bindParam(6, $img);
            $st->bindParam(7, $img_popis);
            $st->bindParam(8, $klucovy_popis);
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
            
            $this->conn->commit();
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený";
            header("Location: /FitStream/admin/edit_vyziva.php");
            exit;

        } catch (Exception $e) {
            $this->conn->rollBack();
            $_SESSION['neuspech'] = "Pri vytváraní záznamu nastala chyba.";
            header("Location: /FitStream/admin/edit_vyziva.php");
            die;
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
            if ($chyba_suboru === UPLOAD_ERR_NO_FILE) {
                return '';
            }

            $nazov_kon = explode('.',$nazov_suboru);
            $upravena_kon = strtolower(end($nazov_kon));
            $nazov = uniqid('', true);
            $povolene_kon = ['jpeg','jpg','png','webp'];
            if (in_array($upravena_kon,$povolene_kon)) {
                if ($chyba_suboru === 0) {
                    if ($velkost_suboru <= 3145728) {
                        $relativna_cesta = 'img/produkty/' . $nazov . "." . $upravena_kon;
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
            $sql = "SELECT * FROM produkty WHERE vymazane = 0 ORDER BY datum_upravy DESC";
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
         if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }  

        try {
            $this->conn->beginTransaction();
            $sql_1 = "DELETE FROM kategorie_has_produkty WHERE produkty_idprodukty = ?";
            $statement = $this->conn->prepare($sql_1);
            $statement->bindParam(1, $id);
            $statement->execute();
            $vymazane = 1;
            $sql_2 = "UPDATE produkty SET vymazane = ? WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql_2);
            $st->bindParam(1, $vymazane);
            $st->bindParam(2, $id);
            $st->execute();
          
            $this->conn->commit();
            $_SESSION['uspech'] = "Záznam bol úspešne vymazaný.";
            header("Location: /FitStream/admin/edit_vyziva.php");
            exit;
        } catch (Exception $e) {
            $this->conn->rollBack();
            $_SESSION['neuspech'] = "Nastala chyba pri mazaní záznamu.";
            die();
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
            $sql = "SELECT idkategorie,nazov_kategorie FROM kategorie WHERE kategorie_idkategorie IS NULL;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function spracovanieKategorii($id): array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection(); 
        }    
       
        try {
            $kategorie = []; 
            $podkategorie = []; 
            $sql = "SELECT nazov_kategorie FROM kategorie 
                    INNER JOIN kategorie_has_produkty ON kategorie.idkategorie = 
                    kategorie_has_produkty.kategorie_idkategorie
                    WHERE kategorie.kategorie_idkategorie IS NULL AND
                    kategorie_has_produkty.produkty_idprodukty = ?;";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            $kategoria = $st->fetch();

            $sql_1 = "SELECT nazov_kategorie FROM kategorie 
                      INNER JOIN kategorie_has_produkty ON kategorie.idkategorie = 
                      kategorie_has_produkty.kategorie_idkategorie
                      WHERE kategorie.kategorie_idkategorie IS NOT NULL AND
                      kategorie_has_produkty.produkty_idprodukty = ?;";
            $st = $this->conn->prepare($sql_1);
            $st->bindParam(1,$id);
            $st->execute();
            $podkategoria = $st->fetch();

            if ($kategoria && !$podkategoria) {
                return ['kategorie' => $kategoria, 'podkategorie' => "Žiadna kategória"];
            } else if (!$kategoria && $podkategoria) {
                return ['kategorie' => "Žiadna kategória", 'podkategorie' => $podkategoria];
            } else if (!$kategoria && !$podkategoria) {
                return ['kategorie' => "Žiadna kategória", 'podkategorie' => "Žiadna kategória"];
            } else {
                return ['kategorie' => $kategoria, 'podkategorie' => $podkategoria];
            }

        } catch(Exception $e){
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function zobrazenieStavu(): void
    {
        if (isset($_SESSION['uspech'])) {
            echo '<div class="uspech">' . $_SESSION['uspech'] . '</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        }  
    }


    public function editaciaRiadku(int $id, string $nazov, string $znacka, string $popis_produktu, string $klucovy_popis,
                                   float $cena, int $pocet_kusov, string $img,
                                   string $img_popis, int $kategoria, int $podkategoria): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $this->conn->beginTransaction();
            $sql = "UPDATE produkty SET nazov = ?, znacka = ?, popis = ?, cena = ?, pocet_kusov = ?, datum_upravy = ?, 
                   img_hlavna = ?, img_alt = ?, hlavny_popis = ? WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $datum_upravy = date('Y-m-d H:i:s');
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $znacka);
            $st->bindParam(3, $popis_produktu);
            $st->bindParam(4, $cena);
            $st->bindParam(5, $pocet_kusov);
            $st->bindParam(6, $datum_upravy);
            $st->bindParam(7, $img);
            $st->bindParam(8, $img_popis);
            $st->bindParam(9, $klucovy_popis);
            $st->bindParam(10,$id);
            $st->execute();

            $produktID= $id;
            $sql_1 = "DELETE FROM kategorie_has_produkty WHERE produkty_idprodukty = ?;";
            $statement = $this->conn->prepare($sql_1);
            $statement->bindParam(1,$produktID);
            $statement->execute();

            $sql_3 = "INSERT INTO kategorie_has_produkty VALUES(?,?);";
            $statement = $this->conn->prepare($sql_3);
            $statement->bindParam(1,$kategoria);
            $statement->bindParam(2,$produktID);
            $statement->execute();

            $sql_4 = "INSERT INTO kategorie_has_produkty VALUES(?,?);";
            $statement = $this->conn->prepare($sql_4);
            $statement->bindParam(1,$podkategoria);
            $statement->bindParam(2,$produktID);
            $statement->execute();

            $this->conn->commit();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_vyziva.php");
            exit;
        } catch (Exception $e) {
            $this->conn->rollBack();
            $_SESSION['neuspech'] = "Nastala chyba pri úprave záznamu.";
            die;
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
    
    public function vypisKategorieHasProdukty($id) : array|false 
    {    
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
            $sql = "SELECT idkategorie,nazov_kategorie FROM kategorie WHERE kategorie_idkategorie IS NOT NULL;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function getCategoryEdit($id): array|false
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();   
        }    

        try {
            $sql = "SELECT kategorie.idkategorie, kategorie.nazov_kategorie FROM kategorie 
                    INNER JOIN kategorie_has_produkty ON kategorie.idkategorie = kategorie_has_produkty.kategorie_idkategorie
                    WHERE kategorie.kategorie_idkategorie IS NULL
                    AND kategorie_has_produkty.produkty_idprodukty = ?;";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            $kat = $st->fetch();
           
                return $kat;
          
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {

            $this->conn = null;
        }
    }

    public function getPodCategoryEdit($id): array|null
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }    

        try {
            $sql = "SELECT kategorie.idkategorie, kategorie.nazov_kategorie FROM kategorie 
                    INNER JOIN kategorie_has_produkty ON kategorie.idkategorie = kategorie_has_produkty.kategorie_idkategorie
                    WHERE kategorie.kategorie_idkategorie IS NOT NULL
                    AND kategorie_has_produkty.produkty_idprodukty = ?;";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            return $st->fetch() ?: null;
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function overenieFotoEdit(int $id): array|false
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
    
        try {
            $sql = "SELECT img_hlavna FROM produkty WHERE idprodukty = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            return $st->fetch();
        } catch (Exception $e) {
            die("Chyba pri načítaní obrázka produktu: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypisPodKategorieVyziva() : array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }    

        try {
            $sql = "SELECT idkategorie,nazov_kategorie FROM kategorie WHERE kategorie_idkategorie = 3;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypisPodKategorieOblecenie() : array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();   
        }    

        try {
            $sql = "SELECT idkategorie,nazov_kategorie FROM kategorie WHERE kategorie_idkategorie = 1;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypisPodKategoriePrislusenstvo() : array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection(); 
        }    

        try {
            $sql = "SELECT idkategorie,nazov_kategorie FROM kategorie WHERE kategorie_idkategorie = 2;";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function filtrovanie($id){
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try{
            $sql = "SELECT * FROM produkty AS p
            INNER JOIN kategorie_has_produkty AS khp ON p.idprodukty = khp.produkty_idprodukty
            INNER JOIN kategorie AS k ON khp.kategorie_idkategorie = k.idkategorie
            WHERE k.idkategorie = ? AND p.vymazane = ? ORDER BY p.datum_vytvorenia DESC;";
            $vymazane = 0;
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1,$id);
            $statement->bindParam(2,$vymazane);
            $statement->execute();
            return $statement->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba");
        }
    }

    public function overenieIdProduktu(int $id): void
    {
        $overenie = $this->produktDetail($id);
        if ($overenie['vymazane'] == 1) {
            $_SESSION['neuspech'] = "Tento produkt neexistuje.";
            header("Location: /FitStream/config/error.php");
            exit;
        }
    }
}