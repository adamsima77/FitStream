<?php use FitStream\Objednavky\Objednavky;?>
<?php

$objednavky = new Objednavky();
$objednavky->overeniePodstranokKosika();

if(empty($_GET['id'])){

    die("Nastala chyba");
}

$vymazanie = $objednavky->vymazanieProduktu($_GET['id']);

header("Location: /FitStream/Kosik.php");
exit;

?>