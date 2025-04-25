<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/produkt.php';
use produkt\Produkt;
$vypis_Produktov = new Produkt();


?>
<?php
$filter = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $filter = $vypis_Produktov->filtrovanie($_GET['id']);
} else {
    $filter = $vypis_Produktov->vypisProduktyAdmin();
}
?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_vyzivy.php"?>
<?php include "parts/footer.php"; ?>