<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Slideshow.php';
use uzivatel\Uzivatel;
use slideshow\Slideshow;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$slideshow = new Slideshow();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $slideshow_img_cesta = $slideshow->vypisjednehoZaznamu($_GET['id']);
    $cesta = $_SERVER['DOCUMENT_ROOT']. '/FitStream/' . $slideshow_img_cesta['img_url']; 

    if (!unlink($cesta)) {
        die("Súbor neexistuje");
    }
    
    $slideshow->vymazanieRiadku($_GET['id']);
    
}





?>