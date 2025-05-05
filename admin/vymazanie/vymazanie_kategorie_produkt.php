<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/KategoriaProdukty.php';
use uzivatel\Uzivatel;
use kategoriaprodukty\KategoriaProdukty;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$kategoriablog = new KategoriaProdukty();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $kategoriablog->vymazanieZaznamu($_GET['id']);
}




?>