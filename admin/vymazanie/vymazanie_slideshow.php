<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\Slideshow\Slideshow;
$overenie_admina = new Uzivatel();
$slideshow = new Slideshow();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $slideshow_img_cesta = $slideshow->vypisjednehoZaznamu($_GET['id']);
    $cesta = $_SERVER['DOCUMENT_ROOT']. '/FitStream/' . $slideshow_img_cesta['img_url']; 

   if(file_exists($cesta)){
        if (!unlink($cesta)) {
            die("Súbor neexistuje");
        }
    }
    
    $slideshow->vymazanieRiadku($_GET['id']);
    
}





?>