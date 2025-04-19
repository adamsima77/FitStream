<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php');
use uzivatel\Uzivatel;
$odhlasenie = new Uzivatel();
$odhlasenie->odhlasenieUzivatela();
?>