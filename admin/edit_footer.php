<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/footer_linky.php");
use uzivatel\Uzivatel;
use footer\Footer;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();



$footer = new Footer();
$vypis_footer = $footer->footer_Vypis();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_footer.php"?>





<?php include "parts/footer.php"; ?>