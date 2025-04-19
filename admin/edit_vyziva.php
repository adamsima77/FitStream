<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/produkt.php';
use produkt\Produkt;

$vypis_Produktov = new Produkt();
$vypis_vyzivy = $vypis_Produktov->vypis_vyziva();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_vyzivy.php"?>





<?php include "parts/footer.php"; ?>