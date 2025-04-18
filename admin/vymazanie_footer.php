<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/footer_linky.php");

use uzivatel\Uzivatel;
use footer\Footer;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();
$footer = new Footer();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $footer_vymazanie = $footer->vymazanie_Riadku($_GET['id']);
}




?>