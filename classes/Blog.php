<?php
declare(strict_types=1);
namespace FitStream\Blog;
use FitStream\Database\Database;
use Exception;

class Blog extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function blogVypis(): array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "SELECT * FROM blog ORDER BY datum_vytvorenia DESC";
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

    public function vypisAutora(int $id): array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();        
        }

        try {
            $sql = "SELECT meno, priezvisko FROM uzivatelia
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

    public function vypisKategorie(int $id):array|string
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
            if(empty($rs)){
                return 'Žiadna kategória';
            } else{
            return $rs;
            }
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
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_blog.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba pri vytvorení záznamu.";
            die();
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
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
        
        try {
            $sql = "DELETE FROM blog WHERE idblog = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vymazaný.";
            header("Location: /FitStream/admin/edit_blog.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba pri mazaní záznamu.";
            die();
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
        if (isset($_SESSION['uspech'])) {
            echo '<div class="uspech">' . $_SESSION['uspech'] . '</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">' . $_SESSION['neuspech'] . '</div>';
            unset($_SESSION['neuspech']);
        }
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
            $zaznam =  $st->fetch();
            if(empty($zaznam)){
                $_SESSION['neuspech'] = "Tento článok neexistuje";
                header("Location: /FitStream/config/error.php");
                exit;
            } else{
                return $zaznam;
            }
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
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
            $sql = "UPDATE blog SET nazov = ?, popis = ?, img_blog = ?, img_alt = ?, 
                    id_kategorie = ?, id_uzivatel = ? WHERE idblog = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $nazov);
            $st->bindParam(2, $popis);
            $st->bindParam(3, $fotka);
            $st->bindParam(4, $popis_fotky);
            $st->bindParam(5, $kategoria);
            $st->bindParam(6, $uzivatel);
            $st->bindParam(7, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_blog.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Nastala chyba pri editácii záznamu";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function vypisHlavna(): array
    {
        try {
            $sql = "SELECT * FROM blog ORDER BY datum_upravy DESC LIMIT 4";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
        } finally {
            $this->conn = null;
        }
    }

    public function blogClanok(int $id): array|bool
    {
        try {
            $sql = "SELECT nazov, popis, img_blog FROM blog WHERE idblog = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $clanok = $st->fetch();
            if(empty($clanok)){
                $_SESSION['neuspech'] = "Tento článok neexistuje";
                header("Location: /FitStream/config/error.php");
                exit;
            } else{
                return $clanok;
            }
        } catch (Exception $e) {
            die("Chyba pri načítaní produktu");
        } finally {
            $this->conn = null;
        }
    }

    public function filtrovanie($id): array
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try{
            $sql = "SELECT * FROM blog INNER JOIN blog_kategorie ON blog.id_kategorie = 
                    blog_kategorie.id_kategorie WHERE blog_kategorie.id_kategorie = ? 
                    ORDER BY blog.datum_vytvorenia DESC;"; 
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1,$id);
            $statement->execute();
            return $statement->fetchAll();
        } catch(Exception $e) {
            die("Nastala chyba");
        }
    }
}
?>