<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/Uzivatel.php');
use uzivatel\Uzivatel;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
?>