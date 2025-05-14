<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\KategoriaBlog\KategoriaBlog;
$overenie_admina = new Uzivatel();
$kategoriablog = new KategoriaBlog();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $kategoriablog->vymazanieZaznamu($_GET['id']);
}




?>