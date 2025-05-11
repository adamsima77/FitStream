<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/uzivatel_session.php');?>
<?php include_once "classes/Produkt.php"; ?>
<?php include_once "classes/Slideshow.php"; ?>
<?php include_once "classes/Blog.php"; ?>
<?php use slideshow\slideshow?>
<?php use produkt\Produkt?>
<?php use blog\Blog?>

<?php $slideshow = new slideshow();
$vypis_na_hlavnej = new Produkt();
?>

<?php

$blog = new Blog();
$vypis_blog = $blog->vypisHlavna();
?>
<?php 
$vypis = $vypis_na_hlavnej->vypisHlavna();

?>

<?php include 'parts/header.php';?>
<?php include 'parts/navbar.php';?>
<?php require 'parts/sidebar.php';?>

<body>

<?php include_once "parts/slideshow.php"?>

<?php include_once "parts/box_hlavna.php"?>
<?php include_once "parts/box_blog.php"?>    




<?php include 'parts/footer.php';?>
    
