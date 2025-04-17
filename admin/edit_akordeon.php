<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/akordeon_class.php");
use uzivatel\Uzivatel;
use akordeon\Akordeon;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();



$akordeon = new Akordeon();
$vypis_akordeon = $akordeon->vypis_Akordeon();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_akordeon.php"?>





<?php include "parts/footer.php"; ?>