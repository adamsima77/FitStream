<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');
use FitStream\Produkt\Produkt;
$sprava = new Produkt();

include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/header.php'; 
include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/navbar.php'; 
include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/sidebar.php'; 


echo '<div class = "stred">';
$sprava->zobrazenieStavu();
echo '</div>';



include $_SERVER['DOCUMENT_ROOT'] . '/FitStream/parts/footer.php'; 
?>

