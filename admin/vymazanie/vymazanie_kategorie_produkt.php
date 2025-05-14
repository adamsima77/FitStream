<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\KategoriaProdukty\KategoriaProdukty;
$overenie_admina = new Uzivatel();
$kategoriablog = new KategoriaProdukty();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $kategoriablog->vymazanieZaznamu($_GET['id']);
}




?>