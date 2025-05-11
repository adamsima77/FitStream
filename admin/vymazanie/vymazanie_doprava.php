<?php
use FitStream\Uzivatel\Uzivatel;
use FitStream\Doprava\Doprava;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$doprava = new Doprava();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $doprava->vymazanieZaznamu($_GET['id']);
}




?>