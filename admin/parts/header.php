<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/classes/uzivatel.php');
use uzivatel\Uzivatel;
$overenie_admina = new Uzivatel();
?>



<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>admin/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
    <title>FitStream</title>
</head>
<body>
