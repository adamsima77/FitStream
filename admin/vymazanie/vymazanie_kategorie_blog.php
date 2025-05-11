<?php
use FitStream\Uzivatel\Uzivatel;
use FitStream\KategoriaBlog\KategoriaBlog;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$kategoriablog = new KategoriaBlog();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $kategoriablog->vymazanieZaznamu($_GET['id']);
}




?>