<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\Doprava\Doprava;
$overenie_admina = new Uzivatel();
$doprava = new Doprava();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $doprava->vymazanieZaznamu($_GET['id']);
}




?>