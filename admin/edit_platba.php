<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Platba\Platba;
$platba = new Platba();


    $vypis = $platba->platbaVypis();

?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_platba.php"?>
<?php include "parts/footer.php"; ?>