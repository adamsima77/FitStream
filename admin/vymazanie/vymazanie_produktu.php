<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\Produkt\Produkt;
$overenie_admina = new Uzivatel();
$produkt = new Produkt();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {

    $produkt_cesta = $produkt->vypisJednehoZaznamu($_GET['id']);
    $absolutna_cesta = $_SERVER['DOCUMENT_ROOT']. '/FitStream/' . $produkt_cesta['img_hlavna']; 

    if(file_exists($absolutna_cesta)){
        if (!unlink($absolutna_cesta)) {
            die("Súbor neexistuje");
        }
    }

   $produkt->vymazanieRiadku($_GET['id']);
}




?>