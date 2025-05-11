<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/vendor/autoload.php');
use FitStream\Uzivatel\Uzivatel;
$overenie_admina = new Uzivatel();
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/config/auth_admin.php');
?>