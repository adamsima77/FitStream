<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\Blog\Blog;
$overenie_admina = new Uzivatel();
$blog = new Blog();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {

    
    $blog_cesta = $blog->vypisJednehoZaznamu($_GET['id']);
    $absolutna_cesta = $_SERVER['DOCUMENT_ROOT']. '/FitStream/' . $blog_cesta['img_blog']; 

    if(file_exists($absolutna_cesta)){
        if (!unlink($absolutna_cesta)) {
            die("Súbor neexistuje");
        }
    }
    $blog->vymazanieRiadku($_GET['id']);
}




?>