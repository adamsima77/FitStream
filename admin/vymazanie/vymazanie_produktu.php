<?php
use FitStream\Uzivatel\Uzivatel;
use FitStream\Produkt\Produkt;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$produkt = new Produkt();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {

    $produkt_cesta = $produkt->vypisJednehoZaznamu($_GET['id']);
    $absolutna_cesta = $_SERVER['DOCUMENT_ROOT']. '/FitStream/' . $produkt_cesta['img_hlavna']; 

    if (!unlink($absolutna_cesta)) {
        die("Súbor neexistuje");
    }
  

   $produkt->vymazanieRiadku($_GET['id']);
}




?>