<?php include_once "classes/produkt.php"; ?>
<?php include_once "classes/slideshow_vypis.php"; ?>
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


<?php include 'parts/header.php';?>
<?php include 'parts/navbar.php';?>
<?php require 'parts/sidebar.php';?>

<body>

<?php include_once "parts/slideshow.php"?>

<?php include_once "parts/box_hlavna.php"?>
<?php include_once "parts/box_blog.php"?>    




<?php include 'parts/footer.php';?>
    
