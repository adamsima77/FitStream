<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/vendor/autoload.php');
use FitStream\Uzivatel\Uzivatel;
$odhlasenie = new Uzivatel();
$odhlasenie->odhlasenieUzivatela();
?>