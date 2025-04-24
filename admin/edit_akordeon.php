<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/akordeon_class.php';
use akordeon\Akordeon;




$akordeon = new Akordeon();
$vypis_akordeon = $akordeon->vypisAkordeon();
?>
<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>



<?php include "parts/uprava_akordeon.php"?>





<?php include "parts/footer.php"; ?>