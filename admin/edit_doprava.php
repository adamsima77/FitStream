<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Doprava\Doprava;
$doprava = new Doprava();


    $vypis = $doprava->dopravaVypis();

?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_doprava.php"?>
<?php include "parts/footer.php"; ?>