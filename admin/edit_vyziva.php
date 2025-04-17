<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/produkt.php");
use uzivatel\Uzivatel;
use produkt\Produkt;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();



$vypis_Produktov = new Produkt();
$vypis_vyzivy = $vypis_Produktov->vypis_vyziva();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_vyzivy.php"?>





<?php include "parts/footer.php"; ?>