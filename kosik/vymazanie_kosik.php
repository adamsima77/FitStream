<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
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