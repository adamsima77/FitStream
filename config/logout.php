<?php
require_once dirname(__FILE__) . "/../classes/uzivatel.php";
use uzivatel\Uzivatel;
$odhlasenie = new Uzivatel();
$odhlasenie->odhlasenie_Uzivatela();


?>