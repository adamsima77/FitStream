<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Blog.php';
use uzivatel\Uzivatel;
use blog\Blog;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$blog = new Blog();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {

    
    $blog_cesta = $blog->vypisJednehoZaznamu($_GET['id']);
    $absolutna_cesta = $_SERVER['DOCUMENT_ROOT']. '/FitStream/' . $blog_cesta['img_blog']; 

    if (!unlink($absolutna_cesta)) {
        die("Súbor neexistuje");
    }
    $blog->vymazanieRiadku($_GET['id']);
}




?>