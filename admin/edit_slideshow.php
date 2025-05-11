<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Slideshow.php';
use slideshow\Slideshow;
$slideshow = new Slideshow();
$vypis_slideshow = $slideshow->slideshowVypis();
?>

<?php include "parts/header.php"; ?>
<?php include "parts/navbar.php"; ?>
<?php include "parts/sidebar.php"; ?>
<?php include "parts/uprava_slideshow.php"?>
<?php include "parts/footer.php"; ?>