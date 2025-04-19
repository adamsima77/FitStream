<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/navbar_links.php';

use navbar\Navbar;
$navbar = new Navbar();
$vypis_navbar = $navbar->navbar_Links();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_navbar.php"?>





<?php include "parts/footer.php"; ?>