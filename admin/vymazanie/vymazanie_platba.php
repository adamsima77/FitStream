<?php
use FitStream\Uzivatel\Uzivatel;
use FitStream\Platba\Platba;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$platba = new Platba();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $platba->vymazanieZaznamu($_GET['id']);
}




?>