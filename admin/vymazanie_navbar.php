<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/navbar_links.php");

use uzivatel\Uzivatel;
use navbar\Navbar;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();
$navbar = new Navbar();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $navbar_vymazanie = $navbar->vymazanie_Riadku($_GET['id']);
}




?>