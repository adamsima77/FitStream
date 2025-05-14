<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/inicializacia_admin.php');
use FitStream\Uzivatel\Uzivatel;
use FitStream\Platba\Platba;
$overenie_admina = new Uzivatel();
$platba = new Platba();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $platba->vymazanieZaznamu($_GET['id']);
}




?>