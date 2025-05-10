<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Navbar.php';
use uzivatel\Uzivatel;
use navbar\Navbar;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$navbar = new Navbar();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
   $navbar->vymazanieRiadku($_GET['id']);
}




?>