<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\Footer\Footer;
$overenie_admina = new Uzivatel();
$footer = new Footer();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $footer->vymazanieRiadku($_GET['id']);
}




?>