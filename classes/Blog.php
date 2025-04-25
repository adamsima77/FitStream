<?php
declare(strict_types=1);
namespace blog;
use database\Database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/database_con.php';

class Blog extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function blogVypis()
    {

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }
        try {
            $sql = "SELECT * FROM blog";
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

    public function vypisAutora(int $id)
    {

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }
        try {
            $sql = "SELECT meno,priezvisko FROM uzivatelia
                   INNER JOIN blog ON uzivatelia.iduzivatelia = blog.id_uzivatel
                   WHERE idblog = ?;";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            $rs = $st->fetch();
            return $rs;
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function vypisKategorie(int $id)
    {

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }
        try {
            $sql = "SELECT nazov_kategorie_blog FROM blog_kategorie
                   INNER JOIN blog ON blog_kategorie.id_kategorie = blog.id_kategorie
                   WHERE idblog = ?;";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            $rs = $st->fetch();
            return $rs;
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    
    public function spracovanieFotky(): string
    {

      

        if (isset($_POST['submit'])) {
            
            $subor = $_FILES['fotka'];
            $nazov_suboru = $_FILES['fotka']['name'];
            $docasna_adresa = $_FILES['fotka']['tmp_name'];
            $velkost_suboru = $_FILES['fotka']['size'];
            $chyba_suboru = $_FILES['fotka']['error'];
            $typ_suboru = $_FILES['fotka']['type'];
            
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
                        $relativna_cesta = 'img/blog/' . $nazov . "." . $upravena_kon;
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

    
    public function vytvorenieZaznamu(string $nazov, string $popis, string $fotka, string $popis_fotky,int $id_uzivatel,
    int $id_kategorie): void
    {

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }
        try {
            $sql = "INSERT INTO blog (nazov, popis, img_blog, img_alt,id_kategorie,id_uzivatel) VALUES (?, ?, ?, ?, ?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $popis);
            $st->bindParam(3, $fotka);
            $st->bindParam(4, $popis_fotky);
            $st->bindParam(5, $id_kategorie);
            $st->bindParam(6, $id_uzivatel);
            $st->execute();
         
           
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_blog.php");
        } catch (Exception $e) {
           
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function vypisKategorii() : array
    {
        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }    

        try {
            $sql = "SELECT id_kategorie, nazov_kategorie_blog FROM blog_kategorie;";
            $st = $this->conn->prepare($sql);
            $st->execute();

            return $st->fetchAll();


        } catch(Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {

            $this->conn = null;
        }



    }


    public function vymazanieRiadku(int $id): void
    {
        try {
            $sql = "DELETE FROM blog WHERE idblog = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();

            
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_blog.php");
        } catch (Exception $e) {
        
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }

    public function zobrazenieStavu(): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

       

        if (isset($_SESSION['stav']) && $_SESSION['stav'] === "uspech") {
            echo '<div class="uspech">Akcia bola úspešná.</div>';
        } elseif (isset($_SESSION['stav']) && $_SESSION['stav'] === "neuspech") {
            echo '<div class="neuspech">Akcia bola neúspešná.</div>';
        }

        unset($_SESSION['stav']);
    }

    public function vypisJednehoZaznamu(int $id): array|false
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
        try {
            $sql = "SELECT * FROM blog WHERE idblog= ?";
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

    public function getCategoryEdit($id): array|false{

        if ($this->conn === null) {

            $this->connect();
            $this->conn = $this->getConnection();
            
        }    

        try {
            $sql = "SELECT blog_kategorie.id_kategorie, blog_kategorie.nazov_kategorie_blog 
            FROM blog_kategorie
            INNER JOIN blog ON blog_kategorie.id_kategorie = blog.id_kategorie
            WHERE blog.idblog = ?;";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1,$id);
            $st->execute();
            
            return $st->fetch();


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
            $sql = "SELECT img_blog FROM blog WHERE idblog = ?";
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


    public function editaciaRiadku(string $nazov, string $popis, string $fotka, string $popis_fotky, 
    int $uzivatel, int $kategoria, int $id): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE blog SET nazov = ?, popis = ?, img_blog = ?, img_alt = ?, id_kategorie = ?, id_uzivatel = ?
            WHERE idblog = ?";

            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $popis);
            $st->bindParam(3, $fotka);
            $st->bindParam(4, $popis_fotky);
            $st->bindParam(5, $kategoria);
            $st->bindParam(6, $uzivatel);
            $st->bindParam(7, $id);
            $st->execute();

           
            $_SESSION['stav'] = "uspech";
            header("Location: /FitStream/admin/edit_blog.php");
        } catch (Exception $e) {
          
            $_SESSION['stav'] = "neuspech";
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }


}