<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Footer\Footer;
$footer = new Footer();
$vypis_footer = $footer->footerVypis();
?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_footer.php"?>
<?php include "parts/footer.php"; ?>