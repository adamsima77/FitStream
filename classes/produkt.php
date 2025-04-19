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
        string $img_popis
    ): void {

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
        } catch (Exception $e) {
            die("Nastala chyba: " . $e->getMessage());
        } finally {
            $this->conn = null;
        }
    }
}