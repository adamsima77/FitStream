<?php
declare(strict_types=1);
namespace FitStream\Slideshow;
use FitStream\Database\Database;
use Exception;

class Slideshow extends Database
{
    protected $conn;

    public function __construct()
    {
        $this->connect();
        $this->conn = $this->getConnection();
    }

    public function slideshowVypis(): array
    {
        try {
            $sql = "SELECT * FROM slideshow";
            $st = $this->conn->prepare($sql);
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $e) {
            die("Nastala chyba");
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
            echo '<div class="uspech">'. $_SESSION['uspech'] .'</div>';
            unset($_SESSION['uspech']);
        } elseif (isset($_SESSION['neuspech'])) {
            echo '<div class="neuspech">'. $_SESSION['neuspech'] .'</div>';
            unset($_SESSION['neuspech']);
        } 
    }

    public function vytvorenieZaznamu(string $img, string $preklik): void
    {
        try {
            $sql = "INSERT INTO slideshow(img_url,img_preklik)  VALUES (?, ?)";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $img);
            $st->bindParam(2, $preklik);
            $st->execute();

           
            $_SESSION['uspech'] = "Záznam bol úspešne vytvorený.";
            header("Location: /FitStream/admin/edit_slideshow.php");
            exit;
        } catch (Exception $e) {
           
            $_SESSION['neuspech'] = "Pri vytváraní záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function spracovanieFotky(): string
    {
        if (isset($_POST['submit'])) { 
            $subor = $_FILES['img'];
            $nazov_suboru = $_FILES['img']['name'];
            $docasna_adresa = $_FILES['img']['tmp_name'];
            $velkost_suboru = $_FILES['img']['size'];
            $chyba_suboru = $_FILES['img']['error'];
            $typ_suboru = $_FILES['img']['type'];
            
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
                        $relativna_cesta = 'img/slideshow/' . $nazov . "." . $upravena_kon;
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

    public function vymazanieRiadku(int $id): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
        try {
            $sql = "DELETE FROM slideshow WHERE idslideshow = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne vymazaný.";
            header("Location: /FitStream/admin/edit_slideshow.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri mazaní záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function editaciaRiadku(int $id, string $img, string $preklik): void
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }

        try {
            $sql = "UPDATE slideshow SET img_url = ?, img_preklik = ? WHERE idslideshow = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $img);
            $st->bindParam(2, $preklik);
            $st->bindParam(3, $id);
            $st->execute();
            $_SESSION['uspech'] = "Záznam bol úspešne upravený.";
            header("Location: /FitStream/admin/edit_slideshow.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['neuspech'] = "Pri úprave záznamu nastala chyba.";
            die;
        } finally {
            $this->conn = null;
        }
    }

    public function overenieFotoEdit(int $id): array|bool
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
    
        try {
            $sql = "SELECT img_url FROM slideshow WHERE idslideshow = ?";
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

    public function vypisJednehoZaznamu(int $id): array|false
    {
        if ($this->conn === null) {
            $this->connect();
            $this->conn = $this->getConnection();
        }
        try {
            $sql = "SELECT * FROM slideshow WHERE idslideshow = ?";
            $st = $this->conn->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $zaznam = $st->fetch();
            if(empty($zaznam)){
                $_SESSION['neuspech'] = "Tento záznam neexistuje";
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
}
?>
