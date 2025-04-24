<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/slideshow_vypis.php';
use uzivatel\Uzivatel;
use slideshow\Slideshow;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$slideshow = new Slideshow();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $slideshow_vymazanie = $slideshow->vymazanieRiadku($_GET['id']);
}




?>