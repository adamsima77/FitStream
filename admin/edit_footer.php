<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/footer_linky.php';
use footer\Footer;



$footer = new Footer();
$vypis_footer = $footer->footer_Vypis();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_footer.php"?>





<?php include "parts/footer.php"; ?>