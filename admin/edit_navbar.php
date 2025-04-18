<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/navbar_links.php");
use uzivatel\Uzivatel;
use navbar\Navbar;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();



$navbar = new Navbar();
$vypis_navbar = $navbar->navbar_Links();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_navbar.php"?>





<?php include "parts/footer.php"; ?>