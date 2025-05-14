<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\uzivatel;
use FitStream\Navbar\Navbar;
$overenie_admina = new Uzivatel();
$navbar = new Navbar();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
   $navbar->vymazanieRiadku($_GET['id']);
}




?>