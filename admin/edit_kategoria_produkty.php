<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\KategoriaProdukty\KategoriaProdukty;
$kategoriaprodukty = new KategoriaProdukty();


    $kategoria_vypis = $kategoriaprodukty->kategoriaProduktyVypis();

?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_kategoria_produkty.php"?>
<?php include "parts/footer.php"; ?>