<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Objednavky.php');?>
<?php use objednavky\Objednavky?>
<?php

$objednavky = new Objednavky();
$vymazanie = $objednavky->vymazanieProduktu($_GET['id']);
header("Location: /FitStream/Kosik.php");
exit;

?>