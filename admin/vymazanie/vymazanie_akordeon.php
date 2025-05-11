<?php
use FitStream\Uzivatel\Uzivatel;
use FitStream\Akordeon\Akordeon;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
$Akordeon = new Akordeon();



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Zlé ID");
} else {
    
     $Akordeon->vymazanieRiadku($_GET['id']);
}




?>