<?php
include(dirname(__FILE__) . "/../classes/uzivatel.php");
include(dirname(__FILE__) . "/../classes/akordeon_class.php");

use uzivatel\Uzivatel;
use akordeon\Akordeon;
$overenie_admina = new Uzivatel();
$overenie_admina->overenie_Admina();
$Akordeon = new Akordeon();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    $akordeon_vymazanie = $Akordeon->vymazanie_Riadku($_GET['id']);
}




?>