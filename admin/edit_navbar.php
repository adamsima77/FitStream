<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Navbar\Navbar;
$navbar = new Navbar();
$vypis_navbar = $navbar->navbarLinks();
?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_navbar.php"?>
<?php include "parts/footer.php"; ?>