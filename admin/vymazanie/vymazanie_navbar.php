<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/navbar_links.php';
use uzivatel\Uzivatel;
use navbar\Navbar;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$navbar = new Navbar();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $navbar_vymazanie = $navbar->vymazanie_Riadku($_GET['id']);
}




?>